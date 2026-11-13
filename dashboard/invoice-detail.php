<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$pageTitle = "Invoice Details";

include '../database/connection.php';

/* -------------------------------------------------
   USER AUTHENTICATION
------------------------------------------------- */

$currentUserId = (int) ($_SESSION['user_id'] ?? 0);
$isAdmin = ($currentUserId === 1);

if ($currentUserId <= 0) {
    header("Location: ./login.php");
    exit;
}

/* -------------------------------------------------
   HELPER FUNCTIONS
------------------------------------------------- */

function detailEscape($value)
{
    return htmlspecialchars((string) ($value ?? ''), ENT_QUOTES, 'UTF-8');
}

function detailMoney($amount)
{
    return '₹' . number_format((float) $amount, 2);
}

function detailDate($date)
{
    if (empty($date)) {
        return 'N/A';
    }

    $timestamp = strtotime($date);

    return $timestamp ? date('d M Y', $timestamp) : 'N/A';
}

function detailStatusBadge($status)
{
    $status = strtolower(trim((string) $status));

    $statuses = [
        'paid' => [
            'class' => 'bg-label-success',
            'icon' => 'bx-check-circle'
        ],
        'pending' => [
            'class' => 'bg-label-warning',
            'icon' => 'bx-time'
        ],
        'failed' => [
            'class' => 'bg-label-danger',
            'icon' => 'bx-error-circle'
        ],
        'refunded' => [
            'class' => 'bg-label-info',
            'icon' => 'bx-refresh'
        ]
    ];

    $item = $statuses[$status] ?? [
        'class' => 'bg-label-secondary',
        'icon' => 'bx-file'
    ];

    return '
        <span class="badge ' . $item['class'] . '">
            <i class="icon-base bx ' . $item['icon'] . ' me-1"></i>
            ' . detailEscape(ucfirst($status ?: 'pending')) . '
        </span>
    ';
}

/* -------------------------------------------------
   GET INVOICE ID
------------------------------------------------- */

$invoiceId = (int) ($_GET['id'] ?? 0);

if ($invoiceId <= 0) {
    die("Invalid invoice ID.");
}

/* -------------------------------------------------
   FETCH LOGGED-IN USER EMAIL
------------------------------------------------- */

$currentUserEmail = '';

if (!$isAdmin) {

    $userStmt = $conn->prepare(
        "SELECT email_add FROM users WHERE id = ? LIMIT 1"
    );

    if (!$userStmt) {
        die("Unable to prepare user query: " . $conn->error);
    }

    $userStmt->bind_param("i", $currentUserId);
    $userStmt->execute();

    $userResult = $userStmt->get_result();
    $userData = $userResult->fetch_assoc();

    $currentUserEmail = $userData['email_add'] ?? '';

    $userStmt->close();

    if (empty($currentUserEmail)) {
        die("User email not found.");
    }
}

/* -------------------------------------------------
   FETCH INVOICE DETAILS
------------------------------------------------- */

if ($isAdmin) {

    $invoiceStmt = $conn->prepare(
        "SELECT * FROM orders WHERE id = ? LIMIT 1"
    );

    $invoiceStmt->bind_param("i", $invoiceId);

} else {

    $invoiceStmt = $conn->prepare(
        "SELECT * FROM orders
         WHERE id = ?
         AND customer_email = ?
         LIMIT 1"
    );

    $invoiceStmt->bind_param(
        "is",
        $invoiceId,
        $currentUserEmail
    );
}

if (!$invoiceStmt) {
    die("Unable to prepare invoice query: " . $conn->error);
}

$invoiceStmt->execute();

$invoiceResult = $invoiceStmt->get_result();

$invoice = $invoiceResult->fetch_assoc();

$invoiceStmt->close();

/* Invoice not found or unauthorized */

if (!$invoice) {
    http_response_code(404);
    die("Invoice not found or you do not have permission to view it.");
}

/* -------------------------------------------------
   INVOICE INFORMATION
------------------------------------------------- */

$invoiceNumber = !empty($invoice['order_number'])
    ? $invoice['order_number']
    : $invoice['id'];

$customerName = $invoice['customer_name'] ?? 'Unknown Customer';

$customerEmail = $invoice['customer_email'] ?? '';

$customerPhone = $invoice['customer_phone'] ?? '';

$shippingAddress = $invoice['shipping_address'] ?? '';

$paymentMethod = $invoice['payment_method'] ?? 'N/A';

$paymentStatus = strtolower(
    trim($invoice['payment_status'] ?? 'pending')
);

$issuedDate = detailDate($invoice['created_at'] ?? '');

$subtotal = (float) ($invoice['subtotal'] ?? 0);

$shippingAmount = (float) ($invoice['shipping_amount'] ?? 0);

$invoiceTotal = (float) ($invoice['total_amount'] ?? 0);

/* -------------------------------------------------
   FETCH ORDER PRODUCTS
------------------------------------------------- */

$itemsStmt = $conn->prepare(
    "SELECT
        id,
        order_id,
        product_id,
        product_name,
        product_image,
        price,
        quantity
    FROM order_items
    WHERE order_id = ?
    ORDER BY id ASC"
);

if (!$itemsStmt) {
    die("Unable to prepare invoice products query: " . $conn->error);
}

$itemsStmt->bind_param("i", $invoiceId);

$itemsStmt->execute();

$itemsResult = $itemsStmt->get_result();

$invoiceItems = [];

$calculatedSubtotal = 0;

while ($item = $itemsResult->fetch_assoc()) {

    $itemPrice = (float) ($item['price'] ?? 0);

    $itemQuantity = (int) ($item['quantity'] ?? 0);

    $itemTotal = $itemPrice * $itemQuantity;

    $item['item_total'] = $itemTotal;

    $invoiceItems[] = $item;

    $calculatedSubtotal += $itemTotal;
}

$itemsStmt->close();

/* Use item calculation if stored subtotal is unavailable */

if ($subtotal <= 0 && $calculatedSubtotal > 0) {
    $subtotal = $calculatedSubtotal;
}

/* -------------------------------------------------
   FETCH COMPANY INFORMATION
------------------------------------------------- */

$companyName = 'Clothsy';

$companyLogo = '';
$companyAddress = '';
$companyEmail = '';
$companyPhone = '';

$settingsStmt = $conn->prepare(
    "SELECT site_name, site_logo, email, phone, address
     FROM site_settings
     WHERE id = 1
     LIMIT 1"
);

if ($settingsStmt) {

    $settingsStmt->execute();

    $settingsResult = $settingsStmt->get_result();

    if ($settings = $settingsResult->fetch_assoc()) {

        $companyName = $settings['site_name'] ?: $companyName;
        $companyLogo = $settings['logo'] ?? '';
        $companyAddress = $settings['address'] ?? '';
        $companyEmail = $settings['email'] ?? '';
        $companyPhone = $settings['phone'] ?? '';
    }

    $settingsStmt->close();
}

/* -------------------------------------------------
   LOAD HEADER
------------------------------------------------- */

include './components/head_html.php';

?>

<main class="main_page layout-wrapper layout-content-navbar">

    <div class="layout_container layout-container">

        <?php include('./components/sidebar.php'); ?>

        <div class="main_content_container layout-page">

            <?php include('./components/nav_bar.php'); ?>

            <div class="content-wrapper">

                <div class="container-xxl flex-grow-1 container-p-y">

                    <!-- Page Heading -->

                    <div class="d-flex justify-content-between align-items-center flex-wrap mb-5">

                        <div>
                            <h4 class="mb-1">Invoice Details</h4>

                            <p class="mb-0 text-muted">
                                Invoice #<?= detailEscape($invoiceNumber) ?>
                            </p>
                        </div>

                        <a href="invoice.php" class="btn btn-label-secondary">
                            <i class="icon-base bx bx-arrow-back me-1"></i>
                            Back to Invoices
                        </a>

                    </div>


                    <div class="row invoice-preview">

                        <!-- ==================================
                             INVOICE PREVIEW
                        =================================== -->

                        <div class="col-xl-9 col-md-8 col-12 mb-md-0 mb-6">

                            <div class="card invoice-preview-card p-sm-12 p-6">

                                <!-- Company and Invoice Header -->

                                <div class="card-body invoice-preview-header rounded">

                                    <div
                                        class="d-flex justify-content-between flex-xl-row flex-md-column flex-sm-row flex-column align-items-xl-center align-items-md-start align-items-sm-center align-items-start">

                                        <!-- Company Details -->

                                        <div class="mb-xl-0 mb-6 text-heading">

                                            <div class="d-flex align-items-center mb-4 gap-2">

                                                <?php if (!empty($companyLogo)): ?>

                                                     <img src="../<?= htmlspecialchars($siteLogo) ?>" alt="Clothsy Logo" width="150px">

                                                <?php else: ?>

                                                    <img src="../<?= htmlspecialchars($siteLogo) ?>" alt="Clothsy Logo"
                                                        width="150px">
                                                    <!-- <span class="avatar avatar-md bg-label-primary">
                                                        <i class="icon-base bx bx-store icon-26px"></i>
                                                    </span>

                                                    <span class="fw-bold fs-4">
                                                        <?= detailEscape($companyName) ?>
                                                    </span> -->

                                                <?php endif; ?>

                                            </div>

                                            <?php if (!empty($companyAddress)): ?>

                                                <p class="mb-2">
                                                    <?= nl2br(detailEscape($companyAddress)) ?>
                                                </p>

                                            <?php endif; ?>

                                            <?php if (!empty($companyEmail)): ?>

                                                <p class="mb-2">
                                                    <?= detailEscape($companyEmail) ?>
                                                </p>

                                            <?php endif; ?>

                                            <?php if (!empty($companyPhone)): ?>

                                                <p class="mb-0">
                                                    <?= detailEscape($companyPhone) ?>
                                                </p>

                                            <?php endif; ?>

                                        </div>


                                        <!-- Invoice Information -->

                                        <div>

                                            <h5 class="mb-4">
                                                Invoice #<?= detailEscape($invoiceNumber) ?>
                                            </h5>

                                            <div class="mb-2 text-heading">

                                                <span>Issue Date:</span>

                                                <span class="fw-medium">
                                                    <?= detailEscape($issuedDate) ?>
                                                </span>

                                            </div>

                                            <div class="mb-2 text-heading">

                                                <span>Order ID:</span>

                                                <span class="fw-medium">
                                                    #<?= (int) $invoice['id'] ?>
                                                </span>

                                            </div>

                                            <div class="text-heading">

                                                <span>Payment Status:</span>

                                                <?= detailStatusBadge($paymentStatus) ?>

                                            </div>

                                        </div>

                                    </div>

                                </div>


                                <!-- Customer and Billing Details -->

                                <div class="card-body px-0">

                                    <div class="row">

                                        <!-- Invoice To -->

                                        <div class="col-xl-6 col-md-12 col-sm-5 col-12 mb-xl-0 mb-md-6 mb-sm-0 mb-6">

                                            <h6>Invoice To:</h6>

                                            <p class="mb-1 fw-medium">
                                                <?= detailEscape($customerName) ?>
                                            </p>

                                            <?php if (!empty($shippingAddress)): ?>

                                                <p class="mb-1">
                                                    <?= nl2br(detailEscape($shippingAddress)) ?>
                                                </p>

                                            <?php endif; ?>

                                            <?php if (!empty($customerPhone)): ?>

                                                <p class="mb-1">
                                                    <?= detailEscape($customerPhone) ?>
                                                </p>

                                            <?php endif; ?>

                                            <?php if (!empty($customerEmail)): ?>

                                                <p class="mb-0">
                                                    <?= detailEscape($customerEmail) ?>
                                                </p>

                                            <?php endif; ?>

                                        </div>


                                        <!-- Bill To -->

                                        <div class="col-xl-6 col-md-12 col-sm-7 col-12">

                                            <h6>Bill To:</h6>

                                            <table>

                                                <tbody>

                                                    <tr>
                                                        <td class="pe-4">Subtotal:</td>

                                                        <td class="fw-medium">
                                                            <?= detailMoney($subtotal) ?>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td class="pe-4">Shipping:</td>

                                                        <td class="fw-medium">
                                                            <?= detailMoney($shippingAmount) ?>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td class="pe-4">Payment Method:</td>

                                                        <td class="fw-medium text-uppercase">
                                                            <?= detailEscape($paymentMethod) ?>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td class="pe-4">Payment Status:</td>

                                                        <td>
                                                            <?= detailEscape(ucfirst($paymentStatus)) ?>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td class="pe-4 fw-bold">Total:</td>

                                                        <td class="fw-bold text-heading">
                                                            <?= detailMoney($invoiceTotal) ?>
                                                        </td>
                                                    </tr>

                                                </tbody>

                                            </table>

                                        </div>

                                    </div>

                                </div>


                                <!-- ==================================
                                     ORDER PRODUCTS TABLE
                                =================================== -->

                                <div class="table-responsive border border-bottom-0 border-top-0 rounded">

                                    <table class="table m-0">

                                        <thead>

                                            <tr>

                                                <th>Item</th>

                                                <th>Description</th>

                                                <th>Cost</th>

                                                <th>Qty</th>

                                                <th class="text-end">Price</th>

                                            </tr>

                                        </thead>


                                        <tbody>

                                            <?php if (!empty($invoiceItems)): ?>

                                                <?php foreach ($invoiceItems as $item): ?>

                                                    <?php

                                                    $productName = $item['product_name'] ?? 'Product';

                                                    $productImage = $item['product_image'] ?? '';

                                                    $productPrice = (float) $item['price'];

                                                    $productQuantity = (int) $item['quantity'];

                                                    $productTotal = (float) $item['item_total'];

                                                    ?>

                                                    <tr>

                                                        <!-- Product Name -->

                                                        <td class="text-nowrap text-heading fw-medium">

                                                            <?= detailEscape($productName) ?>

                                                        </td>


                                                        <!-- Product Image -->

                                                        <td>

                                                            <?php if (!empty($productImage)): ?>

                                                                <img src="../<?= detailEscape($productImage) ?>"
                                                                    alt="../<?= detailEscape($productName) ?>" width="45" height="45"
                                                                    style="object-fit:cover;border-radius:6px;">

                                                            <?php else: ?>

                                                                <span class="text-muted">No Image</span>

                                                            <?php endif; ?>

                                                        </td>


                                                        <!-- Product Price -->

                                                        <td class="text-nowrap">

                                                            <?= detailMoney($productPrice) ?>

                                                        </td>


                                                        <!-- Quantity -->

                                                        <td>

                                                            <?= $productQuantity ?>

                                                        </td>


                                                        <!-- Total Price -->

                                                        <td class="text-end fw-medium">

                                                            <?= detailMoney($productTotal) ?>

                                                        </td>

                                                    </tr>

                                                <?php endforeach; ?>

                                            <?php else: ?>

                                                <tr>

                                                    <td colspan="5" class="text-center py-5">

                                                        No products found for this invoice.

                                                    </td>

                                                </tr>

                                            <?php endif; ?>

                                        </tbody>

                                    </table>

                                </div>


                                <!-- ==================================
                                     INVOICE TOTALS
                                =================================== -->

                                <div class="table-responsive">

                                    <table class="table m-0 table-borderless">

                                        <tbody>

                                            <tr>

                                                <td class="align-top pe-6 ps-0 py-6 text-body">

                                                    <p class="mb-1">

                                                        <span class="me-2 h6">
                                                            Payment Method:
                                                        </span>

                                                        <span>
                                                            <?= detailEscape(ucfirst($paymentMethod)) ?>
                                                        </span>

                                                    </p>

                                                    <span>
                                                        Thank you for your purchase!
                                                    </span>

                                                </td>


                                                <td class="px-0 py-6 w-px-100">

                                                    <p class="mb-2">Subtotal:</p>

                                                    <p class="mb-2">Shipping:</p>

                                                    <p class="mb-0 fw-bold">Total:</p>

                                                </td>


                                                <td class="text-end px-0 py-6 w-px-100 fw-medium text-heading">

                                                    <p class="fw-medium mb-2">
                                                        <?= detailMoney($subtotal) ?>
                                                    </p>

                                                    <p class="fw-medium mb-2">
                                                        <?= detailMoney($shippingAmount) ?>
                                                    </p>

                                                    <p class="fw-bold mb-0">
                                                        <?= detailMoney($invoiceTotal) ?>
                                                    </p>

                                                </td>

                                            </tr>

                                        </tbody>

                                    </table>

                                </div>


                                <hr class="mt-0 mb-6">


                                <!-- Invoice Note -->

                                <div class="card-body p-0">

                                    <div class="row">

                                        <div class="col-12">

                                            <span class="fw-medium text-heading">
                                                Note:
                                            </span>

                                            <span>
                                                Thank you for shopping with
                                                <?= detailEscape($companyName) ?>.
                                                We appreciate your business!
                                            </span>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>


                        <!-- ==================================
                             INVOICE ACTIONS
                        =================================== -->

                        <div class="col-xl-3 col-md-4 col-12 invoice-actions">

                            <div class="card">

                                <div class="card-body">

                                    <!-- Print -->

                                    <button type="button" onclick="window.print()"
                                        class="btn btn-primary d-grid w-100 mb-4">

                                        <span class="d-flex align-items-center justify-content-center">

                                            <i class="icon-base bx bx-printer icon-sm me-2"></i>

                                            Print Invoice

                                        </span>

                                    </button>


                                    <!-- Download PDF -->

                                    <button type="button" onclick="window.print()"
                                        class="btn btn-label-secondary d-grid w-100 mb-4">

                                        <i class="icon-base bx bx-download me-1"></i>

                                        Download / Save PDF

                                    </button>


                                    <!-- Other Actions -->

                                    <div class="d-flex mb-4">

                                        <a href="invoice.php" class="btn btn-label-secondary d-grid w-100 me-2">

                                            Back

                                        </a>

                                        <a href="order-detail.php?id=<?= (int) $invoice['id'] ?>"
                                            class="btn btn-label-secondary d-grid w-100">

                                            Order Details

                                        </a>

                                    </div>


                                    <!-- Payment Status -->

                                    <div class="border rounded p-3">

                                        <p class="mb-2 fw-medium">
                                            Payment Status
                                        </p>

                                        <?= detailStatusBadge($paymentStatus) ?>

                                        <hr>

                                        <p class="mb-1 text-muted">
                                            Invoice Total
                                        </p>

                                        <h4 class="mb-0">
                                            <?= detailMoney($invoiceTotal) ?>
                                        </h4>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</main>


<!-- Print Styling -->

<style>
    @media print {

        body {
            background: #fff !important;
        }

        .layout_container,
        .main_content_container,
        .content-wrapper {
            width: 100% !important;
            margin: 0 !important;
            padding: 0 !important;
        }

        .layout_container {
            display: block !important;
        }

        .invoice-actions,
        .layout_container>.layout_container,
        .main_page .layout-menu,
        .main_page .layout-navbar,
        .main_page .navbar,
        .main_page .sidebar,
        .main_page .content-wrapper>.container-xxl>.d-flex:first-child {
            display: none !important;
        }

        .invoice-preview>div:first-child {
            width: 100% !important;
            max-width: 100% !important;
            flex: 0 0 100% !important;
        }

        .invoice-preview-card {
            border: none !important;
            box-shadow: none !important;
            padding: 0 !important;
        }

        .card {
            box-shadow: none !important;
        }

        table {
            width: 100% !important;
        }

        tr {
            page-break-inside: avoid;
        }

    }
</style>


<?php

include './components/dash_footer.php';

?>