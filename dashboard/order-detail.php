<?php
$pageTitle = "Order Details";

include '../database/connection.php';

/* Escape output */
function orderEscape($value)
{
    return htmlspecialchars((string) ($value ?? ''), ENT_QUOTES, 'UTF-8');
}

/* Format currency */
function orderMoney($amount)
{
    return '₹' . number_format((float) $amount, 2);
}
/* Product image path */
function orderImagePath($image)
{
    $image = trim((string) $image);

    if (empty($image)) {
        return '../assets/img/products/default.png';
    }

    // Keep external image URLs unchanged
    if (preg_match('/^(https?:)?\/\//i', $image)) {
        return $image;
    }

    // Convert database image path into dashboard-relative path
    return '../' . ltrim($image, '/');
}
/* Order status badge */
function orderStatusBadge($status)
{
    $status = strtolower(trim((string) $status));

    $classes = [
        'pending' => 'bg-label-warning',
        'processing' => 'bg-label-info',
        'shipped' => 'bg-label-primary',
        'out_for_delivery' => 'bg-label-primary',
        'delivered' => 'bg-label-success',
        'cancelled' => 'bg-label-secondary',
        'refunded' => 'bg-label-danger'
    ];

    $class = $classes[$status] ?? 'bg-label-secondary';
    $label = ucwords(str_replace('_', ' ', $status ?: 'pending'));

    return '<span class="badge ' . $class . '">' . orderEscape($label) . '</span>';
}

/* Payment status */
function paymentStatusHtml($status)
{
    $status = strtolower(trim((string) $status));

    $classes = [
        'pending' => 'text-warning',
        'paid' => 'text-success',
        'failed' => 'text-danger',
        'refunded' => 'text-info'
    ];

    $class = $classes[$status] ?? 'text-secondary';
    $label = ucfirst($status ?: 'pending');

    return '<span class="' . $class . ' fw-medium">'
        . orderEscape($label) . '</span>';
}

/* Get available table columns */
function getTableColumns($conn, $table)
{
    $columns = [];

    $result = $conn->query("SHOW COLUMNS FROM `$table`");

    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $columns[] = $row['Field'];
        }
    }

    return $columns;
}

/* Find matching column */
function findColumn($columns, $possibleNames)
{
    foreach ($possibleNames as $name) {
        foreach ($columns as $column) {
            if (strtolower($column) === strtolower($name)) {
                return $column;
            }
        }
    }

    return null;
}

/* Get order ID */
$orderId = (int) ($_GET['id'] ?? 0);

if ($orderId <= 0) {
    header("Location: orders.php");
    exit;
}

/* Delete order */
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_order'])) {

    $deleteStmt = $conn->prepare("DELETE FROM orders WHERE id = ?");

    if ($deleteStmt) {
        $deleteStmt->bind_param("i", $orderId);
        $deleteStmt->execute();
        $deleteStmt->close();
    }

    header("Location: orders.php");
    exit;
}

/* Fetch order */
$orderStmt = $conn->prepare("SELECT * FROM orders WHERE id = ? LIMIT 1");

if (!$orderStmt) {
    die("Unable to prepare order query.");
}

$orderStmt->bind_param("i", $orderId);
$orderStmt->execute();

$orderResult = $orderStmt->get_result();
$order = $orderResult->fetch_assoc();

$orderStmt->close();

if (!$order) {
    header("Location: orders.php");
    exit;
}

/* Order information */
$orderNumber = $order['order_number'] ?? $order['id'];
$customerName = $order['customer_name'] ?? 'Unknown Customer';
$customerEmail = $order['customer_email'] ?? '';
$customerPhone = $order['customer_phone'] ?? '';

$paymentStatus = $order['payment_status'] ?? 'pending';
$orderStatus = $order['order_status'] ?? 'pending';
$paymentMethod = strtoupper($order['payment_method'] ?? 'COD');

$subtotal = (float) ($order['subtotal'] ?? 0);
$shipping = (float) ($order['shipping_amount'] ?? 0);
$total = (float) ($order['total_amount'] ?? 0);

$createdAt = !empty($order['created_at'])
    ? date('M d, Y, g:i A', strtotime($order['created_at']))
    : 'N/A';

$shippingAddress = $order['shipping_address'] ?? '';

/* Customer order count */
$customerOrders = 0;

if (!empty($customerEmail)) {

    $customerStmt = $conn->prepare(
        "SELECT COUNT(*) AS total FROM orders WHERE customer_email = ?"
    );

    if ($customerStmt) {
        $customerStmt->bind_param("s", $customerEmail);
        $customerStmt->execute();

        $customerResult = $customerStmt->get_result();
        $customerData = $customerResult->fetch_assoc();

        $customerOrders = (int) ($customerData['total'] ?? 0);

        $customerStmt->close();
    }
}

/*
|--------------------------------------------------------------------------
| Detect order items table
|--------------------------------------------------------------------------
| Common supported names:
| order_items, order_products, order_details
*/

$items = [];

$itemsTable = null;

$possibleTables = [
    'order_items',
    'order_products',
    'order_details'
];

foreach ($possibleTables as $table) {

    $checkTable = $conn->query("SHOW TABLES LIKE '$table'");

    if ($checkTable && $checkTable->num_rows > 0) {
        $itemsTable = $table;
        break;
    }
}

if ($itemsTable) {

    $itemColumns = getTableColumns($conn, $itemsTable);

    $orderIdColumn = findColumn($itemColumns, [
        'order_id',
        'orderId'
    ]);

    $productIdColumn = findColumn($itemColumns, [
        'product_id',
        'productId'
    ]);

    $nameColumn = findColumn($itemColumns, [
        'product_name',
        'name',
        'title'
    ]);

    $priceColumn = findColumn($itemColumns, [
        'price',
        'product_price',
        'unit_price'
    ]);

    $quantityColumn = findColumn($itemColumns, [
        'quantity',
        'qty'
    ]);

    $imageColumn = findColumn($itemColumns, [
        'product_image',
        'image',
        'image_url'
    ]);

    $itemStmt = null;

    if ($orderIdColumn) {

        $itemSql = "SELECT * FROM `$itemsTable`
                    WHERE `$orderIdColumn` = ?";

        $itemStmt = $conn->prepare($itemSql);

        if ($itemStmt) {

            $itemStmt->bind_param("i", $orderId);
            $itemStmt->execute();

            $itemResult = $itemStmt->get_result();

            while ($item = $itemResult->fetch_assoc()) {

                $productName = $nameColumn
                    ? ($item[$nameColumn] ?? '')
                    : '';

                $productImage = $imageColumn
                    ? ($item[$imageColumn] ?? '')
                    : '';

                $productPrice = $priceColumn
                    ? (float) ($item[$priceColumn] ?? 0)
                    : 0;

                $quantity = $quantityColumn
                    ? (int) ($item[$quantityColumn] ?? 1)
                    : 1;

                /* Fetch product information if necessary */
                if (
                    ($productName === '' || $productImage === '')
                    && $productIdColumn
                    && !empty($item[$productIdColumn])
                ) {

                    $productId = (int) $item[$productIdColumn];

                    $productColumns = getTableColumns($conn, 'products');

                    $productIdField = findColumn($productColumns, ['id']);

                    $productNameField = findColumn($productColumns, [
                        'product_name',
                        'productName',
                        'name',
                        'title'
                    ]);

                    $productImageField = findColumn($productColumns, [
                        'main_image',
                        'product_image',
                        'image',
                        'image_url'
                    ]);

                    if ($productIdField) {

                        $productStmt = $conn->prepare(
                            "SELECT * FROM products WHERE `$productIdField` = ? LIMIT 1"
                        );

                        if ($productStmt) {

                            $productStmt->bind_param("i", $productId);
                            $productStmt->execute();

                            $productResult = $productStmt->get_result();
                            $productData = $productResult->fetch_assoc();

                            if ($productData) {

                                if ($productName === '' && $productNameField) {
                                    $productName = $productData[$productNameField] ?? '';
                                }

                                if ($productImage === '' && $productImageField) {
                                    $productImage = $productData[$productImageField] ?? '';
                                }
                            }

                            $productStmt->close();
                        }
                    }
                }

                $items[] = [
                    'name' => $productName ?: 'Product #' . ($item[$productIdColumn] ?? ''),
                    'image' => $productImage,
                    'price' => $productPrice,
                    'quantity' => max(1, $quantity),
                    'total' => $productPrice * max(1, $quantity)
                ];
            }

            $itemStmt->close();
        }
    }
}


/* Product image fallback */
$defaultImage = '../assets/img/products/default.png';

/* Order timeline */
$statusSteps = [
    'pending' => [
        'Order placed',
        'Your order has been placed successfully.'
    ],
    'processing' => [
        'Processing',
        'Your order is being prepared.'
    ],
    'shipped' => [
        'Shipped',
        'Your order has been shipped.'
    ],
    'out_for_delivery' => [
        'Out for delivery',
        'Your order is out for delivery.'
    ],
    'delivered' => [
        'Delivered',
        'Your order has been delivered successfully.'
    ],
    'cancelled' => [
        'Cancelled',
        'This order has been cancelled.'
    ],
    'refunded' => [
        'Refunded',
        'The order has been refunded.'
    ]
];

include './components/head_html.php';
?>

<main class="main_page layout-wrapper layout-content-navbar">

    <div class="layout_container layout-container">

        <?php include('./components/sidebar.php'); ?>

        <div class="main_content_container layout-page">

            <?php include('./components/nav_bar.php'); ?>

            <div class="content-wrapper">

                <div class="container-xxl flex-grow-1 container-p-y">

                    <!-- Order Header -->

                    <div
                        class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-6 row-gap-4">

                        <div class="d-flex flex-column justify-content-center">

                            <div class="mb-1">

                                <span class="h5">
                                    Order #<?= orderEscape($orderNumber) ?>
                                </span>

                                <span class="ms-2">
                                    <?= paymentStatusHtml($paymentStatus) ?>
                                </span>

                                <span class="ms-2">
                                    <?= orderStatusBadge($orderStatus) ?>
                                </span>

                            </div>

                            <p class="mb-0">
                                <?= orderEscape($createdAt) ?>
                            </p>

                        </div>

                        <div class="d-flex align-content-center flex-wrap gap-2">

                            <form method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this order?');">

                                <button type="submit" name="delete_order" value="1" class="btn btn-label-danger">

                                    Delete Order

                                </button>

                            </form>

                        </div>

                    </div>


                    <!-- Order Details -->

                    <div class="row">

                        <div class="col-12 col-lg-8">

                            <div class="card mb-6">

                                <div class="card-header border-bottom">

                                    <h5 class="card-title mb-0">
                                        Order Details
                                    </h5>

                                </div>

                                <div class="card-datatable table-responsive">

                                    <table class="table mb-0">

                                        <thead>

                                            <tr>
                                                <th>
                                                    <input type="checkbox" class="form-check-input"
                                                        id="selectAllProducts">
                                                </th>

                                                <th>Products</th>
                                                <th>Price</th>
                                                <th>Qty</th>
                                                <th>Total</th>
                                            </tr>

                                        </thead>

                                        <tbody>

                                            <?php if (!empty($items)): ?>

                                                <?php foreach ($items as $item): ?>

                                                    <tr>

                                                        <td>
                                                            <input type="checkbox" class="form-check-input product-checkbox">
                                                        </td>

                                                        <td>

                                                            <div
                                                                class="d-flex justify-content-start align-items-center text-nowrap">

                                                                <div class="avatar-wrapper">

                                                                    <div class="avatar me-3">

                                                                        <img src="<?= orderEscape(orderImagePath($item['image'])) ?>"
                                                                            alt="<?= orderEscape($item['name']) ?>"
                                                                            class="rounded-2"
                                                                            onerror="this.onerror=null; this.src='<?= orderEscape($defaultImage) ?>';">

                                                                    </div>

                                                                </div>

                                                                <div class="d-flex flex-column">

                                                                    <h6 class="text-body mb-0">
                                                                        <?= orderEscape($item['name']) ?>
                                                                    </h6>

                                                                </div>

                                                            </div>

                                                        </td>

                                                        <td>
                                                            <?= orderMoney($item['price']) ?>
                                                        </td>

                                                        <td>
                                                            <?= (int) $item['quantity'] ?>
                                                        </td>

                                                        <td>
                                                            <?= orderMoney($item['total']) ?>
                                                        </td>

                                                    </tr>

                                                <?php endforeach; ?>

                                            <?php else: ?>

                                                <tr>
                                                    <td colspan="5" class="text-center py-5">
                                                        No product items found for this order.
                                                    </td>
                                                </tr>

                                            <?php endif; ?>

                                        </tbody>

                                    </table>

                                </div>


                                <!-- Order Calculations -->

                                <div class="d-flex justify-content-end align-items-center m-6 mb-2">

                                    <div class="order-calculations">

                                        <div class="d-flex justify-content-start mb-2">

                                            <span class="w-px-100 text-heading">
                                                Subtotal:
                                            </span>

                                            <h6 class="mb-0">
                                                <?= orderMoney($subtotal) ?>
                                            </h6>

                                        </div>

                                        <div class="d-flex justify-content-start mb-2">

                                            <span class="w-px-100 text-heading">
                                                Shipping:
                                            </span>

                                            <h6 class="mb-0">
                                                <?= orderMoney($shipping) ?>
                                            </h6>

                                        </div>

                                        <div class="d-flex justify-content-start">

                                            <h6 class="w-px-100 mb-0">
                                                Total:
                                            </h6>

                                            <h6 class="mb-0">
                                                <?= orderMoney($total) ?>
                                            </h6>

                                        </div>

                                    </div>

                                </div>

                            </div>


                            <!-- Shipping Activity -->

                            <div class="card mb-6">

                                <div class="card-header">

                                    <h5 class="card-title m-0">
                                        Shipping Activity
                                    </h5>

                                </div>

                                <div class="card-body pt-1">

                                    <ul class="timeline pb-0 mb-0">

                                        <li class="timeline-item timeline-item-transparent border-primary">

                                            <span class="timeline-point timeline-point-primary"></span>

                                            <div class="timeline-event">

                                                <div class="timeline-header">

                                                    <h6 class="mb-0">
                                                        Order placed
                                                        (Order ID: #<?= orderEscape($orderNumber) ?>)
                                                    </h6>

                                                    <small class="text-body-secondary">
                                                        <?= orderEscape($createdAt) ?>
                                                    </small>

                                                </div>

                                                <p class="mt-3 mb-0">
                                                    Your order has been placed successfully.
                                                </p>

                                            </div>

                                        </li>

                                        <?php if (isset($statusSteps[strtolower($orderStatus)])): ?>

                                            <li class="timeline-item timeline-item-transparent border-primary">

                                                <span class="timeline-point timeline-point-primary"></span>

                                                <div class="timeline-event">

                                                    <div class="timeline-header">

                                                        <h6 class="mb-0">
                                                            <?= orderEscape($statusSteps[strtolower($orderStatus)][0]) ?>
                                                        </h6>

                                                        <small class="text-body-secondary">
                                                            <?= orderEscape($order['updated_at'] ?? $createdAt) ?>
                                                        </small>

                                                    </div>

                                                    <p class="mt-3 mb-0">
                                                        <?= orderEscape($statusSteps[strtolower($orderStatus)][1]) ?>
                                                    </p>

                                                </div>

                                            </li>

                                        <?php endif; ?>

                                    </ul>

                                </div>

                            </div>

                        </div>


                        <!-- Customer Information -->

                        <div class="col-12 col-lg-4">

                            <div class="card mb-6">

                                <div class="card-header">

                                    <h5 class="card-title m-0">
                                        Customer Details
                                    </h5>

                                </div>

                                <div class="card-body">

                                    <div class="d-flex justify-content-start align-items-center mb-6">

                                        <div class="avatar me-3">

                                            <span class="avatar-initial rounded-circle bg-label-primary">
                                                <?= orderEscape(strtoupper(substr($customerName, 0, 1))) ?>
                                            </span>

                                        </div>

                                        <div class="d-flex flex-column">

                                            <h6 class="mb-0">
                                                <?= orderEscape($customerName) ?>
                                            </h6>

                                            <span>
                                                Customer ID: #<?= (int) ($order['customer_id'] ?? 0) ?: 'N/A' ?>
                                            </span>

                                        </div>

                                    </div>


                                    <div class="d-flex justify-content-start align-items-center mb-6">

                                        <span
                                            class="avatar rounded-circle bg-label-success me-3 d-flex align-items-center justify-content-center">

                                            <i class="icon-base bx bx-cart icon-lg"></i>

                                        </span>

                                        <h6 class="text-nowrap mb-0">
                                            <?= $customerOrders ?> Orders
                                        </h6>

                                    </div>


                                    <div class="d-flex justify-content-between">

                                        <h6 class="mb-1">
                                            Contact Info
                                        </h6>

                                    </div>

                                    <p class="mb-1">
                                        Email: <?= orderEscape($customerEmail ?: 'N/A') ?>
                                    </p>

                                    <p class="mb-0">
                                        Mobile: <?= orderEscape($customerPhone ?: 'N/A') ?>
                                    </p>

                                </div>

                            </div>


                            <!-- Shipping Address -->

                            <div class="card mb-6">

                                <div class="card-header">

                                    <h5 class="card-title m-0">
                                        Shipping Address
                                    </h5>

                                </div>

                                <div class="card-body">

                                    <p class="mb-0">
                                        <?= nl2br(orderEscape($shippingAddress ?: 'Shipping address not available.')) ?>
                                    </p>

                                </div>

                            </div>


                            <!-- Billing Address -->

                            <div class="card mb-6">

                                <div class="card-header">

                                    <h5 class="card-title m-0">
                                        Billing Address
                                    </h5>

                                </div>

                                <div class="card-body">

                                    <p class="mb-3">

                                        <?php
                                        $billingAddress = $order['billing_address']
                                            ?? $shippingAddress;
                                        ?>

                                        <?= nl2br(orderEscape($billingAddress ?: 'Billing address not available.')) ?>

                                    </p>

                                    <h6 class="mb-1">
                                        Payment Method
                                    </h6>

                                    <p class="mb-0">
                                        <?= orderEscape($paymentMethod) ?>
                                    </p>

                                    <p class="mb-0 mt-2">
                                        Payment Status:
                                        <?= paymentStatusHtml($paymentStatus) ?>
                                    </p>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</main>


<script>

    /* Select all products */

    document.getElementById('selectAllProducts')?.addEventListener('change', function () {

        document.querySelectorAll('.product-checkbox').forEach(function (checkbox) {

            checkbox.checked = this.checked;

        }, this);

    });

</script>


<?php

include './components/dash_footer.php';

?>