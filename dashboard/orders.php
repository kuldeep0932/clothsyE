<?php
$pageTitle = "Orders";

include '../database/connection.php';

/* Escape output */
function orderEscape($value)
{
    return htmlspecialchars((string) ($value ?? ''), ENT_QUOTES, 'UTF-8');
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

    return '<span class="badge px-2 ' . $class . ' text-capitalized">'
        . orderEscape($label) . '</span>';
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

    return '<h6 class="mb-0 align-items-center d-flex w-px-100 ' . $class . '">
        <i class="icon-base bx bxs-circle icon-8px me-1"></i>'
        . orderEscape($label) . '</h6>';
}

/* Delete order */
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_order_id'])) {
    $deleteId = (int) $_POST['delete_order_id'];

    if ($deleteId > 0) {
        $deleteStmt = $conn->prepare("DELETE FROM orders WHERE id = ?");

        if ($deleteStmt) {
            $deleteStmt->bind_param("i", $deleteId);
            $deleteStmt->execute();
            $deleteStmt->close();
        }
    }

    header("Location: orders.php");
    exit;
}

/* Search */
$search = trim($_GET['search'] ?? '');

/* Pagination */
$allowedPerPage = [7, 10, 25, 50, 100];
$perPage = (int) ($_GET['per_page'] ?? 10);

if (!in_array($perPage, $allowedPerPage, true)) {
    $perPage = 10;
}

$page = max(1, (int) ($_GET['page'] ?? 1));

/* Search conditions */
$where = "";
$searchTerm = "%{$search}%";

if ($search !== '') {
    $where = " WHERE (
        order_number LIKE ?
        OR customer_name LIKE ?
        OR customer_email LIKE ?
        OR customer_phone LIKE ?
        OR payment_method LIKE ?
        OR payment_status LIKE ?
        OR order_status LIKE ?
    )";
}

/* Count matching orders */
$countSql = "SELECT COUNT(*) AS total FROM orders" . $where;
$countStmt = $conn->prepare($countSql);

if (!$countStmt) {
    die("Unable to prepare order count query.");
}

if ($search !== '') {
    $countStmt->bind_param(
        "sssssss",
        $searchTerm,
        $searchTerm,
        $searchTerm,
        $searchTerm,
        $searchTerm,
        $searchTerm,
        $searchTerm
    );
}

if (!$countStmt->execute()) {
    die("Unable to count orders.");
}

$countResult = $countStmt->get_result();
$countRow = $countResult->fetch_assoc();

$totalOrders = (int) ($countRow['total'] ?? 0);
$countStmt->close();

/* Calculate pagination */
$totalPages = max(1, (int) ceil($totalOrders / $perPage));
$page = min($page, $totalPages);
$offset = ($page - 1) * $perPage;

/* Fetch orders */
$sql = "SELECT * FROM orders" . $where .
    " ORDER BY created_at DESC LIMIT ? OFFSET ?";

$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("Unable to prepare orders query.");
}

if ($search !== '') {
    $stmt->bind_param(
        "sssssssii",
        $searchTerm,
        $searchTerm,
        $searchTerm,
        $searchTerm,
        $searchTerm,
        $searchTerm,
        $searchTerm,
        $perPage,
        $offset
    );
} else {
    $stmt->bind_param("ii", $perPage, $offset);
}

if (!$stmt->execute()) {
    die("Unable to fetch orders.");
}

$result = $stmt->get_result();

if ($result === false) {
    die("Unable to read orders. Check that your PHP MySQL driver supports get_result().");
}

/* Summary cards */
$summarySql = "
    SELECT
        COALESCE(SUM(CASE WHEN payment_status = 'pending' THEN 1 ELSE 0 END), 0) AS pending_payment,
        COALESCE(SUM(CASE WHEN order_status = 'delivered' THEN 1 ELSE 0 END), 0) AS completed,
        COALESCE(SUM(CASE WHEN payment_status = 'refunded' THEN 1 ELSE 0 END), 0) AS refunded,
        COALESCE(SUM(CASE WHEN payment_status = 'failed' THEN 1 ELSE 0 END), 0) AS failed
    FROM orders
";

$summaryResult = $conn->query($summarySql);
$summary = $summaryResult ? $summaryResult->fetch_assoc() : [];

$pendingPayment = (int) ($summary['pending_payment'] ?? 0);
$completed = (int) ($summary['completed'] ?? 0);
$refunded = (int) ($summary['refunded'] ?? 0);
$failed = (int) ($summary['failed'] ?? 0);

include './components/head_html.php';
?>


<main class="main_page layout-wrapper layout-content-navbar">

    <div class="layout_container layout-container">

        <?php include('./components/sidebar.php'); ?>

        <div class="main_content_container layout-page">

            <?php include('./components/nav_bar.php') ?>

            <!-- dashboard content container -->
            <div class="content-wrapper">

                <div class="container-xxl flex-grow-1 container-p-y">

                    <!-- Order List Widget -->

                    <div class="card mb-6">
                        <div class="card-widget-separator-wrapper">
                            <div class="card-body card-widget-separator">
                                <div class="row gy-4 gy-sm-1">

                                    <div class="col-sm-6 col-lg-3">
                                        <div
                                            class="d-flex justify-content-between align-items-start card-widget-1 border-end pb-4 pb-sm-0">
                                            <div>
                                                <h4 class="mb-0"><?= number_format($pendingPayment) ?></h4>
                                                <p class="mb-0">Pending Payment</p>
                                            </div>
                                            <span class="avatar w-px-40 h-px-40 me-sm-6">
                                                <span class="avatar-initial bg-label-secondary rounded">
                                                    <i class="icon-base bx bx-calendar icon-lg text-heading"></i>
                                                </span>
                                            </span>
                                        </div>
                                        <hr class="d-none d-sm-block d-lg-none me-6">
                                    </div>

                                    <div class="col-sm-6 col-lg-3">
                                        <div
                                            class="d-flex justify-content-between align-items-start card-widget-2 border-end pb-4 pb-sm-0">
                                            <div>
                                                <h4 class="mb-0"><?= number_format($completed) ?></h4>
                                                <p class="mb-0">Completed</p>
                                            </div>
                                            <span class="avatar w-px-40 h-px-40 p-2 me-lg-6">
                                                <span class="avatar-initial bg-label-secondary rounded">
                                                    <i class="icon-base bx bx-check-double icon-lg text-heading"></i>
                                                </span>
                                            </span>
                                        </div>
                                        <hr class="d-none d-sm-block d-lg-none">
                                    </div>

                                    <div class="col-sm-6 col-lg-3">
                                        <div
                                            class="d-flex justify-content-between align-items-start border-end pb-4 pb-sm-0 card-widget-3">
                                            <div>
                                                <h4 class="mb-0"><?= number_format($refunded) ?></h4>
                                                <p class="mb-0">Refunded</p>
                                            </div>
                                            <span class="avatar w-px-40 h-px-40 p-2 me-sm-6">
                                                <span class="avatar-initial bg-label-secondary rounded">
                                                    <i class="icon-base bx bx-wallet icon-lg text-heading"></i>
                                                </span>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 col-lg-3">
                                        <div class="d-flex justify-content-between align-items-start">
                                            <div>
                                                <h4 class="mb-0"><?= number_format($failed) ?></h4>
                                                <p class="mb-0">Failed</p>
                                            </div>
                                            <span class="avatar w-px-40 h-px-40 p-2">
                                                <span class="avatar-initial bg-label-secondary rounded">
                                                    <i class="icon-base bx bx-error-alt icon-lg text-heading"></i>
                                                </span>
                                            </span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Order List Table -->

                    <div class="card">
                        <div class="card-datatable table-responsive">

                            <div id="DataTables_Table_0_wrapper" class="dt-container dt-bootstrap5 dt-empty-footer">

                                <div class="row ms-3 my-0 justify-content-between">

                                    <div
                                        class="d-md-flex justify-content-between align-items-center dt-layout-start col-md-auto me-auto px-3 mt-0">
                                        <div class="dt-search">
                                            <form method="GET" action="orders.php">
                                                <input type="search" name="search" class="form-control ms-0"
                                                    id="dt-search-0" placeholder="Search Order"
                                                    value="<?= orderEscape($search) ?>"
                                                    aria-controls="DataTables_Table_0">
                                                <input type="hidden" name="per_page" value="<?= $perPage ?>">
                                            </form>
                                        </div>
                                    </div>

                                    <div
                                        class="d-md-flex justify-content-between align-items-center dt-layout-end col-md-auto ms-auto px-3 mt-0">

                                        <div class="dt-length mt-md-6 mt-0">
                                            <form method="GET" action="orders.php" id="perPageForm">
                                                <input type="hidden" name="search" value="<?= orderEscape($search) ?>">

                                                <select name="per_page" aria-controls="DataTables_Table_0"
                                                    class="form-select" id="dt-length-0"
                                                    onchange="document.getElementById('perPageForm').submit()">
                                                    <?php foreach ($allowedPerPage as $option): ?>
                                                        <option value="<?= $option ?>" <?= $perPage === $option ? 'selected' : '' ?>>
                                                            <?= $option ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </form>
                                        </div>

                                        <div class="dt-buttons btn-group flex-wrap gap-2 px-3 mt-0 mb-md-0 mb-6">
                                            <button
                                                class="btn buttons-collection btn-label-primary dropdown-toggle btn-label-secondary"
                                                type="button" onclick="window.print()">
                                                <span>
                                                    <span class="d-flex align-items-center gap-2">
                                                        <i class="icon-base bx bx-export icon-sm"></i>
                                                        <span class="d-none d-sm-inline-block">Export / Print</span>
                                                    </span>
                                                </span>
                                            </button>
                                        </div>

                                    </div>
                                </div>

                                <div class="justify-content-between dt-layout-table">
                                    <div
                                        class="d-md-flex justify-content-between align-items-center dt-layout-full table-responsive">

                                        <table class="datatables-order table border-top dataTable dtr-column"
                                            id="DataTables_Table_0" style="width: 100%;">

                                            <thead>
                                                <tr>
                                                    <th class="control dtr-hidden" style="display:none;"></th>
                                                    <th>
                                                        <input class="form-check-input" type="checkbox"
                                                            id="selectAllOrders" aria-label="Select all rows">
                                                    </th>
                                                    <th>order</th>
                                                    <th>date</th>
                                                    <th>customers</th>
                                                    <th>payment</th>
                                                    <th>status</th>
                                                    <th>method</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php if ($result && $result->num_rows > 0): ?>
                                                    <?php while ($order = $result->fetch_assoc()): ?>

                                                        <?php
                                                        $customerName = trim($order['customer_name'] ?? '');
                                                        $customerEmail = trim($order['customer_email'] ?? '');

                                                        if ($customerName === '') {
                                                            $customerName = 'Unknown Customer';
                                                        }

                                                        $nameParts = preg_split('/\s+/', $customerName);
                                                        $initials = '';

                                                        foreach (array_slice($nameParts, 0, 2) as $part) {
                                                            $initials .= strtoupper(substr($part, 0, 1));
                                                        }

                                                        $paymentMethod = strtolower($order['payment_method'] ?? 'cod');
                                                        $paymentLabel = $paymentMethod === 'upi' ? 'UPI' : 'COD';

                                                        $createdAt = !empty($order['created_at'])
                                                            ? date('M d, Y, g:i A', strtotime($order['created_at']))
                                                            : 'N/A';
                                                        ?>

                                                        <tr>
                                                            <td class="control dtr-hidden" style="display:none;"></td>

                                                            <td>
                                                                <input class="form-check-input order-checkbox" type="checkbox"
                                                                    aria-label="Select row" value="<?= (int) $order['id'] ?>">
                                                            </td>

                                                            <!-- Order Number -->
                                                            <td>
                                                                <a href="order-details.php?id=<?= (int) $order['id'] ?>">
                                                                    <span>#<?= orderEscape($order['order_number'] ?? '') ?></span>
                                                                </a>
                                                            </td>

                                                            <!-- Order Date -->
                                                            <td>
                                                                <span class="text-nowrap">
                                                                    <?= orderEscape($createdAt) ?>
                                                                </span>
                                                            </td>

                                                            <!-- Customer Details -->
                                                            <td>
                                                                <div
                                                                    class="d-flex justify-content-start align-items-center order-name text-nowrap">

                                                                    <div class="avatar-wrapper">
                                                                        <div class="avatar avatar-sm me-3">
                                                                            <span
                                                                                class="avatar-initial rounded-circle bg-label-primary">
                                                                                <?= orderEscape($initials ?: 'C') ?>
                                                                            </span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="d-flex flex-column">
                                                                        <h6 class="m-0">
                                                                            <a href="order-details.php?id=<?= (int) $order['id'] ?>"
                                                                                class="text-heading">
                                                                                <?= orderEscape($customerName) ?>
                                                                            </a>
                                                                        </h6>

                                                                        <small>
                                                                            <?= orderEscape($customerEmail) ?>
                                                                        </small>
                                                                    </div>

                                                                </div>
                                                            </td>

                                                            <!-- Payment Status -->
                                                            <td>
                                                                <?= paymentStatusHtml($order['payment_status'] ?? 'pending') ?>
                                                            </td>

                                                            <!-- Order Status -->
                                                            <td>
                                                                <?= orderStatusBadge($order['order_status'] ?? 'pending') ?>
                                                            </td>

                                                            <!-- Payment Method -->
                                                            <td>
                                                                <div class="d-flex align-items-center text-nowrap">

                                                                    <?php if ($paymentMethod === 'upi'): ?>
                                                                        <i class="icon-base bx bx-mobile-alt icon-md me-2"></i>
                                                                    <?php else: ?>
                                                                        <i class="icon-base bx bx-money icon-md me-2"></i>
                                                                    <?php endif; ?>

                                                                    <span><?= orderEscape($paymentLabel) ?></span>
                                                                </div>
                                                            </td>

                                                            <!-- Actions -->
                                                            <td>
                                                                <div
                                                                    class="d-flex justify-content-sm-start align-items-sm-center">

                                                                    <button class="btn btn-icon dropdown-toggle hide-arrow"
                                                                        type="button" data-bs-toggle="dropdown"
                                                                        aria-expanded="false">
                                                                        <i
                                                                            class="icon-base bx bx-dots-vertical-rounded icon-md"></i>
                                                                    </button>

                                                                    <div class="dropdown-menu dropdown-menu-end m-0">

                                                                        <a href="order-details.php?id=<?= (int) $order['id'] ?>"
                                                                            class="dropdown-item">
                                                                            View
                                                                        </a>

                                                                        <form method="POST" action="orders.php"
                                                                            onsubmit="return confirm('Are you sure you want to delete this order?');">

                                                                            <input type="hidden" name="delete_order_id"
                                                                                value="<?= (int) $order['id'] ?>">

                                                                            <button type="submit"
                                                                                class="dropdown-item text-danger">
                                                                                Delete
                                                                            </button>

                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>

                                                    <?php endwhile; ?>

                                                <?php else: ?>

                                                    <tr>
                                                        <td colspan="9" class="text-center py-5">
                                                            No orders found.
                                                        </td>
                                                    </tr>

                                                <?php endif; ?>
                                            </tbody>

                                            <tfoot></tfoot>
                                        </table>



                                    </div>
                                </div>

                                <div class="row mx-3 justify-content-between">

                                    <div
                                        class="d-md-flex justify-content-between align-items-center dt-layout-start col-md-auto me-auto px-3 mt-0">
                                        <div class="dt-info" aria-live="polite" role="status">
                                            <?php
                                            $start = $totalOrders > 0 ? $offset + 1 : 0;
                                            $end = min($offset + $perPage, $totalOrders);
                                            ?>
                                            Showing <?= $start ?> to <?= $end ?> of <?= $totalOrders ?> entries
                                        </div>
                                    </div>

                                    <div
                                        class="d-md-flex justify-content-between align-items-center dt-layout-end col-md-auto ms-auto px-3 mt-0">

                                        <div class="dt-paging">
                                            <nav aria-label="pagination">
                                                <ul class="pagination">

                                                    <li class="page-item <?= $page <= 1 ? 'disabled' : '' ?>">
                                                        <a class="page-link"
                                                            href="?page=<?= max(1, $page - 1) ?>&per_page=<?= $perPage ?>&search=<?= urlencode($search) ?>"
                                                            aria-label="Previous">
                                                            <i
                                                                class="icon-base bx bx-chevron-left scaleX-n1-rtl icon-18px"></i>
                                                        </a>
                                                    </li>

                                                    <?php for ($i = 1; $i <= $totalPages; $i++): ?>

                                                        <li class="page-item <?= $page === $i ? 'active' : '' ?>">
                                                            <a class="page-link"
                                                                href="?page=<?= $i ?>&per_page=<?= $perPage ?>&search=<?= urlencode($search) ?>">
                                                                <?= $i ?>
                                                            </a>
                                                        </li>

                                                    <?php endfor; ?>

                                                    <li class="page-item <?= $page >= $totalPages ? 'disabled' : '' ?>">
                                                        <a class="page-link"
                                                            href="?page=<?= min($totalPages, $page + 1) ?>&per_page=<?= $perPage ?>&search=<?= urlencode($search) ?>"
                                                            aria-label="Next">
                                                            <i
                                                                class="icon-base bx bx-chevron-right scaleX-n1-rtl icon-18px"></i>
                                                        </a>
                                                    </li>

                                                </ul>
                                            </nav>
                                        </div>

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
<script>
    document.getElementById('selectAllOrders')?.addEventListener('change', function () {
        document.querySelectorAll('.order-checkbox').forEach(function (checkbox) {
            checkbox.checked = document.getElementById('selectAllOrders').checked;
        });
    });
</script>

<?php
$stmt->close();

include './components/dash_footer.php';
?>