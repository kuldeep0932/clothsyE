
<?php
$pageTitle = "Invoices";

include '../database/connection.php';

/* Escape output */
function invoiceEscape($value)
{
    return htmlspecialchars((string) ($value ?? ''), ENT_QUOTES, 'UTF-8');
}

/* Format currency */
function invoiceMoney($amount)
{
    return '₹' . number_format((float) $amount, 2);
}

/* Payment status badge */
function invoiceStatusBadge($status)
{
    $status = strtolower(trim((string) $status));

    $classes = [
        'paid'     => 'bg-label-success',
        'pending'  => 'bg-label-warning',
        'failed'   => 'bg-label-danger',
        'refunded' => 'bg-label-info'
    ];

    $icons = [
        'paid'     => 'bx-check',
        'pending'  => 'bx-time-five',
        'failed'   => 'bx-error',
        'refunded' => 'bx-refresh'
    ];

    $class = $classes[$status] ?? 'bg-label-secondary';
    $icon = $icons[$status] ?? 'bx-file';

    $label = ucfirst($status ?: 'pending');

    return '<span class="badge p-1_5 rounded-pill ' . $class . '">
                <i class="icon-base icon-16px bx ' . $icon . '"></i>
            </span>
            <span class="ms-1">' . invoiceEscape($label) . '</span>';
}

/* Get invoice ID */
$search = trim($_GET['search'] ?? '');
$status = strtolower(trim($_GET['status'] ?? ''));

/* Allowed payment statuses */
$allowedStatuses = ['pending', 'paid', 'failed', 'refunded'];

if (!in_array($status, $allowedStatuses, true)) {
    $status = '';
}

/* Pagination */
$perPage = (int) ($_GET['per_page'] ?? 10);
$allowedPerPage = [10, 25, 50, 100];

if (!in_array($perPage, $allowedPerPage, true)) {
    $perPage = 10;
}

$page = max(1, (int) ($_GET['page'] ?? 1));

/* Build query conditions */
$where = [];
$params = [];
$types = '';

if ($search !== '') {
    $where[] = "(
        order_number LIKE ?
        OR customer_name LIKE ?
        OR customer_email LIKE ?
    )";

    $searchValue = "%$search%";

    $params[] = $searchValue;
    $params[] = $searchValue;
    $params[] = $searchValue;

    $types .= 'sss';
}

if ($status !== '') {
    $where[] = "payment_status = ?";
    $params[] = $status;
    $types .= 's';
}

$whereSql = !empty($where)
    ? 'WHERE ' . implode(' AND ', $where)
    : '';

/* Bind dynamic parameters */
function invoiceBindParams($stmt, $types, &$params)
{
    if (!empty($params)) {
        $bindParams = [$types];

        foreach ($params as &$param) {
            $bindParams[] = &$param;
        }

        call_user_func_array([$stmt, 'bind_param'], $bindParams);
    }
}

/* Delete invoice / order */
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_invoice'])) {

    $deleteId = (int) $_POST['delete_invoice'];

    if ($deleteId > 0) {

        $deleteStmt = $conn->prepare(
            "DELETE FROM orders WHERE id = ?"
        );

        if ($deleteStmt) {
            $deleteStmt->bind_param("i", $deleteId);
            $deleteStmt->execute();
            $deleteStmt->close();
        }
    }

    header("Location: invoice.php");
    exit;
}

/* Summary statistics */
$summarySql = "
    SELECT
        COUNT(*) AS total_invoices,
        COUNT(DISTINCT NULLIF(customer_email, '')) AS total_clients,

        COALESCE(
            SUM(CASE
                WHEN payment_status = 'paid'
                THEN total_amount ELSE 0
            END), 0
        ) AS paid_amount,

        COALESCE(
            SUM(CASE
                WHEN payment_status = 'pending'
                THEN total_amount ELSE 0
            END), 0
        ) AS unpaid_amount

    FROM orders
";

$summaryResult = $conn->query($summarySql);
$summary = $summaryResult
    ? $summaryResult->fetch_assoc()
    : [];

$totalClients = (int) ($summary['total_clients'] ?? 0);
$totalInvoices = (int) ($summary['total_invoices'] ?? 0);
$paidAmount = (float) ($summary['paid_amount'] ?? 0);
$unpaidAmount = (float) ($summary['unpaid_amount'] ?? 0);

/* Total matching invoices */
$countSql = "SELECT COUNT(*) AS total FROM orders $whereSql";

$countStmt = $conn->prepare($countSql);

if (!$countStmt) {
    die("Unable to prepare invoice count query.");
}

invoiceBindParams($countStmt, $types, $params);

$countStmt->execute();

$countResult = $countStmt->get_result();
$countData = $countResult->fetch_assoc();

$totalRecords = (int) ($countData['total'] ?? 0);

$countStmt->close();

/* Calculate pagination */
$totalPages = (int) ceil($totalRecords / $perPage);

if ($totalPages > 0 && $page > $totalPages) {
    $page = $totalPages;
}

$offset = ($page - 1) * $perPage;

/* Fetch invoices */
$invoiceSql = "
    SELECT *
    FROM orders
    $whereSql
    ORDER BY created_at DESC
    LIMIT ? OFFSET ?
";

$invoiceStmt = $conn->prepare($invoiceSql);

if (!$invoiceStmt) {
    die("Unable to prepare invoice query.");
}

$invoiceParams = $params;
$invoiceTypes = $types . 'ii';

$invoiceParams[] = $perPage;
$invoiceParams[] = $offset;

invoiceBindParams($invoiceStmt, $invoiceTypes, $invoiceParams);

$invoiceStmt->execute();

$invoiceResult = $invoiceStmt->get_result();

$invoices = [];

while ($row = $invoiceResult->fetch_assoc()) {
    $invoices[] = $row;
}

$invoiceStmt->close();

/* Pagination URL */
function invoicePageUrl($pageNumber)
{
    $query = $_GET;
    $query['page'] = $pageNumber;

    return '?' . http_build_query($query);
}

include './components/head_html.php';
?>

<main class="main_page layout-wrapper layout-content-navbar">

    <div class="layout_container layout-container">

        <?php include('./components/sidebar.php'); ?>

        <div class="main_content_container layout-page">

            <?php include('./components/nav_bar.php'); ?>

            <div class="content-wrapper">

                <div class="container-xxl flex-grow-1 container-p-y">

                    <!-- Invoice Summary -->

                    <div class="card mb-6">

                        <div class="card-widget-separator-wrapper">

                            <div class="card-body card-widget-separator">

                                <div class="row gy-4 gy-sm-1">

                                    <!-- Clients -->

                                    <div class="col-sm-6 col-lg-3">

                                        <div class="d-flex justify-content-between align-items-center card-widget-1 border-end pb-4 pb-sm-0">

                                            <div>
                                                <h4 class="mb-0">
                                                    <?= $totalClients ?>
                                                </h4>

                                                <p class="mb-0">Clients</p>
                                            </div>

                                            <div class="avatar me-sm-6 w-px-42 h-px-42">

                                                <span class="avatar-initial rounded bg-label-secondary text-heading">
                                                    <i class="icon-base bx bx-user icon-26px"></i>
                                                </span>

                                            </div>

                                        </div>

                                        <hr class="d-none d-sm-block d-lg-none me-6">

                                    </div>

                                    <!-- Invoices -->

                                    <div class="col-sm-6 col-lg-3">

                                        <div class="d-flex justify-content-between align-items-center card-widget-2 border-end pb-4 pb-sm-0">

                                            <div>
                                                <h4 class="mb-0">
                                                    <?= $totalInvoices ?>
                                                </h4>

                                                <p class="mb-0">Invoices</p>
                                            </div>

                                            <div class="avatar me-lg-6 w-px-42 h-px-42">

                                                <span class="avatar-initial rounded bg-label-secondary text-heading">
                                                    <i class="icon-base bx bx-file icon-26px"></i>
                                                </span>

                                            </div>

                                        </div>

                                        <hr class="d-none d-sm-block d-lg-none">

                                    </div>

                                    <!-- Paid -->

                                    <div class="col-sm-6 col-lg-3">

                                        <div class="d-flex justify-content-between align-items-center border-end pb-4 pb-sm-0 card-widget-3">

                                            <div>
                                                <h4 class="mb-0">
                                                    <?= invoiceMoney($paidAmount) ?>
                                                </h4>

                                                <p class="mb-0">Paid</p>
                                            </div>

                                            <div class="avatar me-sm-6 w-px-42 h-px-42">

                                                <span class="avatar-initial rounded bg-label-secondary text-heading">
                                                    <i class="icon-base bx bx-check-double icon-26px"></i>
                                                </span>

                                            </div>

                                        </div>

                                    </div>

                                    <!-- Unpaid -->

                                    <div class="col-sm-6 col-lg-3">

                                        <div class="d-flex justify-content-between align-items-center">

                                            <div>
                                                <h4 class="mb-0">
                                                    <?= invoiceMoney($unpaidAmount) ?>
                                                </h4>

                                                <p class="mb-0">Unpaid</p>
                                            </div>

                                            <div class="avatar w-px-42 h-px-42">

                                                <span class="avatar-initial rounded bg-label-secondary text-heading">
                                                    <i class="icon-base bx bx-error-circle icon-26px"></i>
                                                </span>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>


                    <!-- Invoice List -->

                    <div class="card">

                        <!-- Search and Filters -->

                        <div class="row mx-3 justify-content-between align-items-center">

                            <div class="col-md-auto d-flex align-items-center gap-3 mt-4 mb-4">

                                <form method="GET" class="d-flex align-items-center gap-2">

                                    <label for="per_page">Show</label>

                                    <select name="per_page"
                                        id="per_page"
                                        class="form-select"
                                        onchange="this.form.submit()">

                                        <?php foreach ($allowedPerPage as $limit): ?>

                                            <option value="<?= $limit ?>"
                                                <?= $perPage === $limit ? 'selected' : '' ?>>

                                                <?= $limit ?>

                                            </option>

                                        <?php endforeach; ?>

                                    </select>

                                    <input type="hidden" name="search" value="<?= invoiceEscape($search) ?>">

                                    <input type="hidden" name="status" value="<?= invoiceEscape($status) ?>">

                                </form>

                            </div>

                            <div class="col-md-auto d-flex flex-wrap align-items-center gap-3 mt-4 mb-4">

                                <form method="GET" class="d-flex flex-wrap align-items-center gap-3">

                                    <input type="hidden" name="per_page" value="<?= $perPage ?>">

                                    <!-- Search -->

                                    <input type="search"
                                        name="search"
                                        class="form-control"
                                        placeholder="Search Invoice"
                                        value="<?= invoiceEscape($search) ?>">

                                    <!-- Status Filter -->

                                    <select name="status"
                                        class="form-select"
                                        onchange="this.form.submit()">

                                        <option value="">Invoice Status</option>

                                        <option value="paid" <?= $status === 'paid' ? 'selected' : '' ?>>
                                            Paid
                                        </option>

                                        <option value="pending" <?= $status === 'pending' ? 'selected' : '' ?>>
                                            Pending
                                        </option>

                                        <option value="failed" <?= $status === 'failed' ? 'selected' : '' ?>>
                                            Failed
                                        </option>

                                        <option value="refunded" <?= $status === 'refunded' ? 'selected' : '' ?>>
                                            Refunded
                                        </option>

                                    </select>

                                    <button type="submit" class="btn btn-primary">
                                        Search
                                    </button>

                                    <a href="invoice.php" class="btn btn-label-secondary">
                                        Reset
                                    </a>

                                </form>

                            </div>

                        </div>


                        <!-- Invoice Table -->

                        <div class="card-datatable table-responsive">

                            <table class="invoice-list-table table border-top">

                                <thead>

                                    <tr>

                                        <th>
                                            <input type="checkbox"
                                                class="form-check-input"
                                                id="selectAllInvoices">
                                        </th>

                                        <th>#</th>

                                        <th>Status</th>

                                        <th>Client</th>

                                        <th>Total</th>

                                        <th>Issued Date</th>

                                        <th>Balance</th>

                                        <th>Actions</th>

                                    </tr>

                                </thead>

                                <tbody>

                                    <?php if (!empty($invoices)): ?>

                                        <?php foreach ($invoices as $invoice): ?>

                                            <?php

                                            $invoiceId = (int) $invoice['id'];

                                            $invoiceNumber = $invoice['order_number']
                                                ?? $invoiceId;

                                            $customerName = $invoice['customer_name']
                                                ?? 'Unknown Customer';

                                            $customerEmail = $invoice['customer_email']
                                                ?? '';

                                            $paymentStatus = strtolower(
                                                $invoice['payment_status'] ?? 'pending'
                                            );

                                            $invoiceTotal = (float) ($invoice['total_amount'] ?? 0);

                                            $balance = $paymentStatus === 'paid'
                                                || $paymentStatus === 'refunded'
                                                ? 0
                                                : $invoiceTotal;

                                            $issuedDate = !empty($invoice['created_at'])
                                                ? date('d M Y', strtotime($invoice['created_at']))
                                                : 'N/A';

                                            $initials = strtoupper(
                                                substr(trim($customerName), 0, 1)
                                            );

                                            ?>

                                            <tr>

                                                <!-- Checkbox -->

                                                <td>
                                                    <input type="checkbox"
                                                        class="form-check-input invoice-checkbox">
                                                </td>

                                                <!-- Invoice Number -->

                                                <td>

                                                    <a href="order-detail.php?id=<?= $invoiceId ?>"
                                                        class="text-heading fw-medium">

                                                        #<?= invoiceEscape($invoiceNumber) ?>

                                                    </a>

                                                </td>

                                                <!-- Status -->

                                                <td>

                                                    <?= invoiceStatusBadge($paymentStatus) ?>

                                                </td>

                                                <!-- Customer -->

                                                <td>

                                                    <div class="d-flex justify-content-start align-items-center">

                                                        <div class="avatar-wrapper">

                                                            <div class="avatar avatar-sm me-3">

                                                                <span class="avatar-initial rounded-circle bg-label-primary">

                                                                    <?= invoiceEscape($initials) ?>

                                                                </span>

                                                            </div>

                                                        </div>

                                                        <div class="d-flex flex-column">

                                                            <span class="text-heading text-truncate fw-medium">

                                                                <?= invoiceEscape($customerName) ?>

                                                            </span>

                                                            <small class="text-truncate">

                                                                <?= invoiceEscape($customerEmail) ?>

                                                            </small>

                                                        </div>

                                                    </div>

                                                </td>

                                                <!-- Total -->

                                                <td>
                                                    <?= invoiceMoney($invoiceTotal) ?>
                                                </td>

                                                <!-- Issued Date -->

                                                <td>
                                                    <?= invoiceEscape($issuedDate) ?>
                                                </td>

                                                <!-- Balance -->

                                                <td>

                                                    <?php if ($balance > 0): ?>

                                                        <span class="text-heading fw-medium">
                                                            <?= invoiceMoney($balance) ?>
                                                        </span>

                                                    <?php else: ?>

                                                        <span class="badge bg-label-success">
                                                            Paid
                                                        </span>

                                                    <?php endif; ?>

                                                </td>

                                                <!-- Actions -->

                                                <td>

                                                    <div class="d-flex align-items-center">

                                                        <!-- Delete -->

                                                        <form method="POST"
                                                            onsubmit="return confirm('Are you sure you want to delete this invoice?');">

                                                            <input type="hidden"
                                                                name="delete_invoice"
                                                                value="<?= $invoiceId ?>">

                                                            <button type="submit"
                                                                class="btn btn-icon"
                                                                title="Delete">

                                                                <i class="icon-base bx bx-trash icon-md"></i>

                                                            </button>

                                                        </form>

                                                        <!-- View Invoice -->

                                                        <a href="order-detail.php?id=<?= $invoiceId ?>"
                                                            class="btn btn-icon"
                                                            title="View Invoice">

                                                            <i class="icon-base bx bx-show icon-md"></i>

                                                        </a>

                                                        <!-- More Actions -->

                                                        <div class="dropdown">

                                                            <button type="button"
                                                                class="btn dropdown-toggle hide-arrow btn-icon p-0"
                                                                data-bs-toggle="dropdown">

                                                                <i class="icon-base bx bx-dots-vertical-rounded icon-md"></i>

                                                            </button>

                                                            <div class="dropdown-menu dropdown-menu-end">

                                                                <a href="order-detail.php?id=<?= $invoiceId ?>"
                                                                    class="dropdown-item">

                                                                    View Details

                                                                </a>

                                                            </div>

                                                        </div>

                                                    </div>

                                                </td>

                                            </tr>

                                        <?php endforeach; ?>

                                    <?php else: ?>

                                        <tr>

                                            <td colspan="8" class="text-center py-5">

                                                No invoices found.

                                            </td>

                                        </tr>

                                    <?php endif; ?>

                                </tbody>

                            </table>

                        </div>


                        <!-- Pagination -->

                        <div class="row mx-3 justify-content-between align-items-center">

                            <div class="col-md-auto mt-4 mb-4">

                                <p class="mb-0">

                                    Showing

                                    <?= $totalRecords > 0 ? $offset + 1 : 0 ?>

                                    to

                                    <?= min($offset + $perPage, $totalRecords) ?>

                                    of <?= $totalRecords ?> entries

                                </p>

                            </div>

                            <div class="col-md-auto mt-4 mb-4">

                                <?php if ($totalPages > 1): ?>

                                    <nav aria-label="Invoice pagination">

                                        <ul class="pagination mb-0">

                                            <!-- Previous -->

                                            <li class="page-item <?= $page <= 1 ? 'disabled' : '' ?>">

                                                <a class="page-link"
                                                    href="<?= $page > 1 ? invoicePageUrl($page - 1) : '#' ?>">

                                                    <i class="icon-base bx bx-chevron-left"></i>

                                                </a>

                                            </li>

                                            <!-- Page Numbers -->

                                            <?php for ($i = 1; $i <= $totalPages; $i++): ?>

                                                <li class="page-item <?= $page === $i ? 'active' : '' ?>">

                                                    <a class="page-link"
                                                        href="<?= invoicePageUrl($i) ?>">

                                                        <?= $i ?>

                                                    </a>

                                                </li>

                                            <?php endfor; ?>

                                            <!-- Next -->

                                            <li class="page-item <?= $page >= $totalPages ? 'disabled' : '' ?>">

                                                <a class="page-link"
                                                    href="<?= $page < $totalPages ? invoicePageUrl($page + 1) : '#' ?>">

                                                    <i class="icon-base bx bx-chevron-right"></i>

                                                </a>

                                            </li>

                                        </ul>

                                    </nav>

                                <?php endif; ?>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</main>


<script>

/* Select all invoices */

document.getElementById('selectAllInvoices')?.addEventListener('change', function () {

    document.querySelectorAll('.invoice-checkbox').forEach(function (checkbox) {

        checkbox.checked = this.checked;

    }, this);

});

</script>


<?php

include './components/dash_footer.php';

?>
