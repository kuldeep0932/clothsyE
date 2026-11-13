<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$pageTitle = "Manage Reviews";

include '../database/connection.php';

/* =========================================
   HELPER FUNCTIONS
========================================= */

function reviewEscape($value)
{
    return htmlspecialchars((string) ($value ?? ''), ENT_QUOTES, 'UTF-8');
}

function reviewBindParams($stmt, $types, &$params)
{
    if (!empty($params)) {
        $stmt->bind_param($types, ...$params);
    }
}

/* =========================================
   REVIEW ACTIONS
========================================= */

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    /* Approve review */
    if (isset($_POST['approve_review'])) {

        $reviewId = (int) $_POST['approve_review'];

        $stmt = $conn->prepare(
            "UPDATE reviews SET status = 'approved' WHERE id = ?"
        );

        $stmt->bind_param("i", $reviewId);
        $stmt->execute();
        $stmt->close();

        header("Location: manage-reviews.php");
        exit;
    }

    /* Reject review */
    if (isset($_POST['reject_review'])) {

        $reviewId = (int) $_POST['reject_review'];

        $stmt = $conn->prepare(
            "UPDATE reviews SET status = 'rejected' WHERE id = ?"
        );

        $stmt->bind_param("i", $reviewId);
        $stmt->execute();
        $stmt->close();

        header("Location: manage-reviews.php");
        exit;
    }

    /* Delete review */
    if (isset($_POST['delete_review'])) {

        $reviewId = (int) $_POST['delete_review'];

        $stmt = $conn->prepare(
            "DELETE FROM reviews WHERE id = ?"
        );

        $stmt->bind_param("i", $reviewId);
        $stmt->execute();
        $stmt->close();

        header("Location: manage-reviews.php");
        exit;
    }
}

/* =========================================
   SEARCH AND FILTER
========================================= */

$search = trim($_GET['search'] ?? '');
$status = $_GET['status'] ?? '';

$allowedStatuses = ['pending', 'approved', 'rejected'];

if (!in_array($status, $allowedStatuses, true)) {
    $status = '';
}

/* Pagination */

$allowedPerPage = [10, 25, 50, 100];

$perPage = isset($_GET['per_page'])
    ? (int) $_GET['per_page']
    : 10;

if (!in_array($perPage, $allowedPerPage, true)) {
    $perPage = 10;
}

$page = max(1, (int) ($_GET['page'] ?? 1));

/* =========================================
   BUILD WHERE CONDITION
========================================= */

$where = [];
$params = [];
$types = '';

if ($search !== '') {

    $where[] = "(
        p.name LIKE ?
        OR u.first_name LIKE ?
        OR u.last_name LIKE ?
        OR u.email_add LIKE ?
        OR r.review_title LIKE ?
        OR r.review_text LIKE ?
    )";

    $searchTerm = "%{$search}%";

    for ($i = 0; $i < 6; $i++) {
        $params[] = $searchTerm;
        $types .= 's';
    }
}

if ($status !== '') {

    $where[] = "r.status = ?";

    $params[] = $status;
    $types .= 's';
}

$whereSql = !empty($where)
    ? "WHERE " . implode(" AND ", $where)
    : "";

/* =========================================
   SUMMARY STATISTICS
========================================= */

$summarySql = "
    SELECT
        COUNT(*) AS total_reviews,

        COALESCE(AVG(r.rating), 0) AS average_rating,

        SUM(CASE
            WHEN r.status = 'pending' THEN 1
            ELSE 0
        END) AS pending_reviews,

        SUM(CASE
            WHEN r.status = 'approved' THEN 1
            ELSE 0
        END) AS approved_reviews,

        SUM(CASE
            WHEN r.status = 'rejected' THEN 1
            ELSE 0
        END) AS rejected_reviews,

        SUM(CASE
            WHEN DATE(r.created_at) >= CURDATE() - INTERVAL 6 DAY
            THEN 1 ELSE 0
        END) AS weekly_reviews

    FROM reviews r
";

$summaryResult = $conn->query($summarySql);
$summary = $summaryResult->fetch_assoc();

$totalReviews = (int) $summary['total_reviews'];
$averageRating = (float) $summary['average_rating'];
$pendingReviews = (int) $summary['pending_reviews'];
$approvedReviews = (int) $summary['approved_reviews'];
$rejectedReviews = (int) $summary['rejected_reviews'];
$weeklyReviews = (int) $summary['weekly_reviews'];

/* =========================================
   STAR DISTRIBUTION
========================================= */

$starCounts = [1 => 0, 2 => 0, 3 => 0, 4 => 0, 5 => 0];

$starSql = "
    SELECT rating, COUNT(*) AS total
    FROM reviews
    GROUP BY rating
";

$starResult = $conn->query($starSql);

while ($star = $starResult->fetch_assoc()) {

    $rating = (int) $star['rating'];

    if ($rating >= 1 && $rating <= 5) {
        $starCounts[$rating] = (int) $star['total'];
    }
}

/* =========================================
   TOTAL MATCHING REVIEWS
========================================= */

$countSql = "
    SELECT COUNT(*) AS total

    FROM reviews r

    LEFT JOIN products p
        ON r.product_id = p.id

    LEFT JOIN users u
        ON r.user_id = u.id

    $whereSql
";

$countStmt = $conn->prepare($countSql);

if (!$countStmt) {
    die("Unable to prepare review count query: " . $conn->error);
}

reviewBindParams($countStmt, $types, $params);

$countStmt->execute();

$countResult = $countStmt->get_result();
$countData = $countResult->fetch_assoc();

$totalRecords = (int) $countData['total'];

$countStmt->close();

/* =========================================
   PAGINATION
========================================= */

$totalPages = (int) ceil($totalRecords / $perPage);

if ($totalPages > 0 && $page > $totalPages) {
    $page = $totalPages;
}

$offset = ($page - 1) * $perPage;

/* =========================================
   FETCH REVIEWS WITH PRODUCTS AND USERS
========================================= */

$reviewSql = "
    SELECT

        r.id AS review_id,
        r.product_id,
        r.user_id,
        r.order_id,
        r.rating,
        r.review_title,
        r.review_text,
        r.status,
        r.created_at,

        p.name AS product_name,
        p.main_image AS product_image,
        p.sku AS product_sku,

        u.first_name,
        u.last_name,
        u.email_add AS customer_email

    FROM reviews r

    LEFT JOIN products p
        ON r.product_id = p.id

    LEFT JOIN users u
        ON r.user_id = u.id

    $whereSql

    ORDER BY r.created_at DESC

    LIMIT ? OFFSET ?
";

$reviewStmt = $conn->prepare($reviewSql);

if (!$reviewStmt) {
    die("Unable to prepare review query: " . $conn->error);
}

$reviewParams = $params;
$reviewTypes = $types . 'ii';

$reviewParams[] = $perPage;
$reviewParams[] = $offset;

reviewBindParams(
    $reviewStmt,
    $reviewTypes,
    $reviewParams
);

$reviewStmt->execute();

$reviewResult = $reviewStmt->get_result();

$reviews = [];

while ($row = $reviewResult->fetch_assoc()) {
    $reviews[] = $row;
}

$reviewStmt->close();

/* =========================================
   PAGINATION URL
========================================= */

function reviewPageUrl($pageNumber)
{
    $query = $_GET;
    $query['page'] = $pageNumber;

    return '?' . http_build_query($query);
}

/* =========================================
   INCLUDE HEADER
========================================= */

include './components/head_html.php';

?>

<main class="main_page layout-wrapper layout-content-navbar">

    <div class="layout_container layout-container">

        <?php include('./components/sidebar.php'); ?>

        <div class="main_content_container layout-page">

            <?php include('./components/nav_bar.php'); ?>

            <div class="content-wrapper">

                <div class="container-xxl flex-grow-1 container-p-y">

                    <!-- Review Statistics -->

                    <div class="row mb-6 g-6">

                        <div class="col-md-6">

                            <div class="card h-100">

                                <div class="card-body row widget-separator g-0">

                                    <div class="col-sm-5 border-shift border-end pe-sm-6">

                                        <h3 class="text-primary d-flex align-items-center gap-2 mb-2">

                                            <?= number_format($averageRating, 2) ?>

                                            <i class="bx bxs-star icon-30px"></i>

                                        </h3>

                                        <p class="h6 mb-2">
                                            Total <?= $totalReviews ?> reviews
                                        </p>

                                        <p class="pe-2 mb-2">
                                            All reviews from your customers
                                        </p>

                                        <span class="badge bg-label-primary mb-4 mb-sm-0">

                                            +<?= $weeklyReviews ?> This week

                                        </span>

                                        <hr class="d-sm-none">

                                    </div>

                                    <div
                                        class="col-sm-7 gap-2 text-nowrap d-flex flex-column justify-content-between ps-sm-6 pt-2 py-sm-2">

                                        <?php for ($i = 5; $i >= 1; $i--): ?>

                                            <?php
                                            $count = $starCounts[$i];

                                            $percentage = $totalReviews > 0
                                                ? ($count / $totalReviews) * 100
                                                : 0;
                                            ?>

                                            <div class="d-flex align-items-center gap-2">

                                                <small><?= $i ?> Star</small>

                                                <div class="progress w-100 bg-label-primary" style="height:8px;">

                                                    <div class="progress-bar bg-primary" role="progressbar"
                                                        style="width: <?= $percentage ?>%"
                                                        aria-valuenow="<?= $percentage ?>" aria-valuemin="0"
                                                        aria-valuemax="100">
                                                    </div>

                                                </div>

                                                <small class="w-px-20 text-end">
                                                    <?= $count ?>
                                                </small>

                                            </div>

                                        <?php endfor; ?>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <!-- Review Statistics Card -->

                        <div class="col-md-6">

                            <div class="card h-100">

                                <div class="card-body row">

                                    <div class="col-sm-5">

                                        <div class="mb-12">

                                            <h5 class="mb-2 text-nowrap">
                                                Reviews statistics
                                            </h5>

                                            <p class="mb-0">

                                                <span class="me-2">
                                                    <?= $pendingReviews ?> Pending reviews
                                                </span>

                                                <span class="badge bg-label-success">
                                                    <?= $approvedReviews ?> Approved
                                                </span>

                                            </p>

                                        </div>

                                        <?php
                                        $positivePercentage = $totalReviews > 0
                                            ? (($starCounts[4] + $starCounts[5]) / $totalReviews) * 100
                                            : 0;
                                        ?>

                                        <div>

                                            <h6 class="mb-2 fw-normal">

                                                <span class="text-success me-1">
                                                    <?= round($positivePercentage) ?>%
                                                </span>

                                                Positive reviews

                                            </h6>

                                            <small>All-time Report</small>

                                        </div>

                                    </div>

                                    <div class="col-sm-7 d-flex justify-content-sm-end align-items-end">

                                        <div id="reviewsChart" style="min-height:175px;">

                                            <div class="d-flex flex-column gap-3 text-end">

                                                <h3 class="text-primary mb-0">
                                                    <?= $totalReviews ?>
                                                </h3>

                                                <span class="text-muted">
                                                    Total Reviews
                                                </span>

                                                <span class="badge bg-label-warning">
                                                    <?= $pendingReviews ?> Pending
                                                </span>

                                                <span class="badge bg-label-success">
                                                    <?= $approvedReviews ?> Published
                                                </span>

                                                <span class="badge bg-label-danger">
                                                    <?= $rejectedReviews ?> Rejected
                                                </span>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>


                    <!-- Reviews Table -->

                    <div class="card">

                        <div class="card-datatable table-responsive">
                            <div id="DataTables_Table_0_wrapper" class="dt-container dt-bootstrap5 dt-empty-footer">
                                
<div class="row m-3 my-0 justify-content-between">

    <form method="GET" action="manage-reviews.php"
        class="d-md-flex justify-content-between align-items-center w-100 gap-3">

        <div class="dt-search mb-md-6 mb-0">
            <input
                type="search"
                name="search"
                class="form-control ms-0"
                id="dt-search-0"
                placeholder="Search Review"
                value="<?= reviewEscape($search) ?>"
            >
        </div>

        <div class="d-flex flex-md-row flex-column gap-3 align-items-center">

            <div class="dt-length mb-md-6 mb-0">

                <select
                    name="per_page"
                    class="form-select me-md-4 me-0"
                    onchange="this.form.submit()"
                >
                    <?php foreach ([10, 25, 50, 100] as $limit): ?>
                        <option value="<?= $limit ?>"
                            <?= $perPage === $limit ? 'selected' : '' ?>>
                            <?= $limit ?>
                        </option>
                    <?php endforeach; ?>
                </select>

            </div>

            <div class="review_filter me-md-4">

                <select
                    name="status"
                    class="form-select"
                    onchange="this.form.submit()"
                >
                    <option value="" <?= $status === '' ? 'selected' : '' ?>>
                        All
                    </option>

                    <option value="pending" <?= $status === 'pending' ? 'selected' : '' ?>>
                        Pending
                    </option>

                    <option value="approved" <?= $status === 'approved' ? 'selected' : '' ?>>
                        Published
                    </option>

                    <option value="rejected" <?= $status === 'rejected' ? 'selected' : '' ?>>
                        Rejected
                    </option>

                </select>

            </div>

            <button type="submit" class="btn btn-primary">
                Search
            </button>

            <a href="manage-reviews.php" class="btn btn-label-secondary">
                Reset
            </a>

        </div>

    </form>

</div>

                                <div class="justify-content-between dt-layout-table">
                                    <div
                                        class="d-md-flex justify-content-between align-items-center dt-layout-full table-responsive">
                                        <table class="table">

                                            <thead>

                                                <tr>

                                                    <th>Product</th>

                                                    <th>Customer</th>

                                                    <th>Review</th>

                                                    <th>Date</th>

                                                    <th>Status</th>

                                                    <th>Actions</th>

                                                </tr>

                                            </thead>

                                            <tbody>

                                                <?php if (!empty($reviews)): ?>

                                                    <?php foreach ($reviews as $review): ?>

                                                        <?php

                                                        $productName = $review['product_name']
                                                            ?? 'Product not found';

                                                        $productImage = $review['product_image']
                                                            ?? '';

                                                        $customerName = trim(
                                                            ($review['first_name'] ?? '') . ' ' .
                                                            ($review['last_name'] ?? '')
                                                        );

                                                        if ($customerName === '') {
                                                            $customerName = 'Unknown Customer';
                                                        }

                                                        $customerEmail = $review['customer_email']
                                                            ?? 'No email';

                                                        $rating = (int) $review['rating'];

                                                        $reviewStatus = $review['status'];

                                                        $reviewDate = !empty($review['created_at'])
                                                            ? date('M d, Y', strtotime($review['created_at']))
                                                            : '-';

                                                        ?>

                                                        <tr>

                                                            <!-- Product -->

                                                            <td>

                                                                <div
                                                                    class="d-flex justify-content-start align-items-center customer-name">

                                                                    <div class="avatar-wrapper">

                                                                        <div class="avatar me-4 rounded-2 bg-label-secondary">

                                                                            <?php if (!empty($productImage)): ?>

                                                                                <img src="../<?= reviewEscape($productImage) ?>"
                                                                                    alt="<?= reviewEscape($productName) ?>"
                                                                                    class="rounded"
                                                                                    style="width:45px;height:45px;object-fit:cover;">

                                                                            <?php else: ?>

                                                                                <span class="avatar-initial rounded">
                                                                                    <i class="bx bx-image"></i>
                                                                                </span>

                                                                            <?php endif; ?>

                                                                        </div>

                                                                    </div>

                                                                    <div class="d-flex flex-column">

                                                                        <span class="fw-medium text-nowrap text-heading">

                                                                            <?= reviewEscape($productName) ?>

                                                                        </span>

                                                                        <small>
                                                                            <?= reviewEscape($review['product_sku'] ?? '') ?>
                                                                        </small>

                                                                    </div>

                                                                </div>

                                                            </td>


                                                            <!-- Customer -->

                                                            <td>

                                                                <div
                                                                    class="d-flex justify-content-start align-items-center customer-name">

                                                                    <div class="avatar-wrapper">

                                                                        <div class="avatar avatar-sm me-4">

                                                                            <span
                                                                                class="avatar-initial rounded-circle bg-label-primary">

                                                                                <?= strtoupper(substr($customerName, 0, 2)) ?>

                                                                            </span>

                                                                        </div>

                                                                    </div>

                                                                    <div class="d-flex flex-column">

                                                                        <span class="fw-medium">
                                                                            <?= reviewEscape($customerName) ?>
                                                                        </span>

                                                                        <small class="text-nowrap">
                                                                            <?= reviewEscape($customerEmail) ?>
                                                                        </small>

                                                                    </div>

                                                                </div>

                                                            </td>


                                                            <!-- Rating and Review -->

                                                            <td>

                                                                <div>

                                                                    <div class="d-flex align-items-center mb-1">

                                                                        <?php for ($i = 1; $i <= 5; $i++): ?>

                                                                            <i class="bx bxs-star"
                                                                                style="color:<?= $i <= $rating ? '#FFD700' : '#dce0e5' ?>;font-size:17px;">
                                                                            </i>

                                                                        <?php endfor; ?>

                                                                        <small class="ms-2">
                                                                            (<?= $rating ?>/5)
                                                                        </small>

                                                                    </div>

                                                                    <p class="h6 mb-1 text-truncate">

                                                                        <?= reviewEscape(
                                                                            $review['review_title'] ?: 'Customer Review'
                                                                        ) ?>

                                                                    </p>

                                                                    <small class="text-break">

                                                                        <?= nl2br(reviewEscape($review['review_text'])) ?>

                                                                    </small>

                                                                </div>

                                                            </td>


                                                            <!-- Date -->

                                                            <td>

                                                                <span class="text-nowrap">

                                                                    <?= reviewEscape($reviewDate) ?>

                                                                </span>

                                                            </td>


                                                            <!-- Status -->

                                                            <td>

                                                                <?php if ($reviewStatus === 'approved'): ?>

                                                                    <span class="badge bg-label-success">
                                                                        Published
                                                                    </span>

                                                                <?php elseif ($reviewStatus === 'pending'): ?>

                                                                    <span class="badge bg-label-warning">
                                                                        Pending
                                                                    </span>

                                                                <?php else: ?>

                                                                    <span class="badge bg-label-danger">
                                                                        Rejected
                                                                    </span>

                                                                <?php endif; ?>

                                                            </td>


                                                            <!-- Actions -->

                                                            <td>

                                                                <div class="text-xxl-center">

                                                                    <div class="dropdown">

                                                                        <a href="javascript:void(0);"
                                                                            class="btn btn-icon dropdown-toggle hide-arrow p-0"
                                                                            data-bs-toggle="dropdown">

                                                                            <i class="bx bx-dots-vertical-rounded icon-md"></i>

                                                                        </a>

                                                                        <div class="dropdown-menu dropdown-menu-end">

                                                                            <?php if ($reviewStatus !== 'approved'): ?>

                                                                                <form method="POST">

                                                                                    <button type="submit" name="approve_review"
                                                                                        value="<?= (int) $review['review_id'] ?>"
                                                                                        class="dropdown-item">

                                                                                        <i class="bx bx-check-circle me-2"></i>
                                                                                        Approve Review

                                                                                    </button>

                                                                                </form>

                                                                            <?php endif; ?>


                                                                            <?php if ($reviewStatus !== 'rejected'): ?>

                                                                                <form method="POST">

                                                                                    <button type="submit" name="reject_review"
                                                                                        value="<?= (int) $review['review_id'] ?>"
                                                                                        class="dropdown-item">

                                                                                        <i class="bx bx-x-circle me-2"></i>
                                                                                        Reject Review

                                                                                    </button>

                                                                                </form>

                                                                            <?php endif; ?>


                                                                            <div class="dropdown-divider"></div>


                                                                            <form method="POST"
                                                                                onsubmit="return confirm('Are you sure you want to delete this review?');">

                                                                                <button type="submit" name="delete_review"
                                                                                    value="<?= (int) $review['review_id'] ?>"
                                                                                    class="dropdown-item delete-record text-danger">

                                                                                    <i class="bx bx-trash me-2"></i>
                                                                                    Delete

                                                                                </button>

                                                                            </form>

                                                                        </div>

                                                                    </div>

                                                                </div>

                                                            </td>

                                                        </tr>

                                                    <?php endforeach; ?>

                                                <?php else: ?>

                                                    <tr>

                                                        <td colspan="6" class="text-center py-5">

                                                            <i class="bx bx-message-square-x fs-1 text-muted"></i>

                                                            <h6 class="mt-2 mb-1">
                                                                No reviews found
                                                            </h6>

                                                            <small class="text-muted">
                                                                Customer reviews will appear here.
                                                            </small>

                                                        </td>

                                                    </tr>

                                                <?php endif; ?>

                                            </tbody>

                                        </table>
                                    </div>
                                </div>

                                
<div class="row mx-3 justify-content-between">

    <!-- Showing Entries -->

    <div class="d-md-flex justify-content-between align-items-center dt-layout-start col-md-auto me-auto px-3">

        <div class="dt-info" aria-live="polite" role="status">

            <?php
            $startEntry = $totalRecords > 0
                ? $offset + 1
                : 0;

            $endEntry = min($offset + $perPage, $totalRecords);
            ?>

            Showing <?= $startEntry ?> to <?= $endEntry ?>
            of <?= $totalRecords ?> entries

        </div>

    </div>

    <!-- Dynamic Pagination -->

    <div class="d-md-flex justify-content-between align-items-center dt-layout-end col-md-auto ms-auto d-flex flex-md-row flex-column gap-md-0 gap-5 px-3 mb-md-0 mb-5 mt-0">

        <div class="dt-paging">

            <nav aria-label="pagination">

                <ul class="pagination">

                    <!-- Previous -->

                    <li class="page-item <?= $page <= 1 ? 'disabled' : '' ?>">

                        <a class="page-link previous"
                            href="<?= $page > 1 ? reviewPageUrl($page - 1) : '#' ?>"
                            aria-label="Previous">

                            <i class="icon-base bx bx-chevron-left scaleX-n1-rtl icon-18px"></i>

                        </a>

                    </li>

                    <!-- Page Numbers -->

                    <?php if ($totalPages > 0): ?>

                        <?php
                        $startPage = max(1, $page - 2);
                        $endPage = min($totalPages, $page + 2);
                        ?>

                        <?php if ($startPage > 1): ?>

                            <li class="page-item">

                                <a class="page-link" href="<?= reviewPageUrl(1) ?>">
                                    1
                                </a>

                            </li>

                            <?php if ($startPage > 2): ?>

                                <li class="page-item disabled">
                                    <span class="page-link">...</span>
                                </li>

                            <?php endif; ?>

                        <?php endif; ?>

                        <?php for ($i = $startPage; $i <= $endPage; $i++): ?>

                            <li class="page-item <?= $page === $i ? 'active' : '' ?>">

                                <a class="page-link"
                                    href="<?= reviewPageUrl($i) ?>"
                                    <?= $page === $i ? 'aria-current="page"' : '' ?>>

                                    <?= $i ?>

                                </a>

                            </li>

                        <?php endfor; ?>

                        <?php if ($endPage < $totalPages): ?>

                            <?php if ($endPage < $totalPages - 1): ?>

                                <li class="page-item disabled">
                                    <span class="page-link">...</span>
                                </li>

                            <?php endif; ?>

                            <li class="page-item">

                                <a class="page-link"
                                    href="<?= reviewPageUrl($totalPages) ?>">

                                    <?= $totalPages ?>

                                </a>

                            </li>

                        <?php endif; ?>

                    <?php endif; ?>

                    <!-- Next -->

                    <li class="page-item <?= $page >= $totalPages ? 'disabled' : '' ?>">

                        <a class="page-link next"
                            href="<?= $page < $totalPages ? reviewPageUrl($page + 1) : '#' ?>"
                            aria-label="Next">

                            <i class="icon-base bx bx-chevron-right scaleX-n1-rtl icon-18px"></i>

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


<?php

include './components/dash_footer.php';

?>