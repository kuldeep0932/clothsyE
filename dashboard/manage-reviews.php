<?php
/*
 * manage-reviews.php
 *
 * IMPORTANT:
 * 1. Set the session keys below to the exact keys used by your login code.
 * 2. This file assumes the existing tables/columns shown in your original
 *    file: users, products and reviews.
 * 3. Admins can manage every review. Normal users can manage only their own.
 */

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$pageTitle = "Manage Reviews";
include '../database/connection.php';


/* ========================= USER AUTHENTICATION ========================= */

$currentUserId = (int) ($_SESSION['user_id'] ?? 0);

if ($currentUserId <= 0) {
    header("Location: ../login.php");
    exit;
}

$sessionUserId = $currentUserId;

// User ID 1 is the admin
$isAdmin = ($currentUserId === 1);


/* If your admin login does not store a role, you may set this explicitly
   after checking your actual login/session structure. Do NOT leave this
   enabled for a public-facing user page. */
// $isAdmin = !empty($_SESSION['is_admin']);

if ($sessionUserId <= 0) {
    http_response_code(401);
    exit('Please log in to manage reviews.');
}

function reviewEscape($value)
{
    return htmlspecialchars((string)($value ?? ''), ENT_QUOTES, 'UTF-8');
}

function reviewRedirect()
{
    $url = strtok($_SERVER['REQUEST_URI'], '?');
    $query = $_GET;
    unset($query['page']);
    if ($query) {
        $url .= '?' . http_build_query($query);
    }
    header('Location: ' . $url);
    exit;
}

function reviewBindParams($stmt, $types, &$params)
{
    if ($types !== '' && $params) {
        $stmt->bind_param($types, ...$params);
    }
}

if (empty($_SESSION['reviews_csrf'])) {
    $_SESSION['reviews_csrf'] = bin2hex(random_bytes(32));
}
$csrfToken = $_SESSION['reviews_csrf'];

$flashMessage = '';
$flashType = 'success';

/* ========================= POST ACTIONS ========================= */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!hash_equals($csrfToken, (string)($_POST['csrf_token'] ?? ''))) {
        http_response_code(403);
        exit('Invalid request token. Please refresh the page and try again.');
    }

    /* Admin-only: approve/reject */
    if (isset($_POST['approve_review']) || isset($_POST['reject_review'])) {
        if (!$isAdmin) {
            http_response_code(403);
            exit('You are not allowed to perform this action.');
        }

        $reviewId = (int)($_POST['approve_review'] ?? $_POST['reject_review']);
        $newStatus = isset($_POST['approve_review']) ? 'approved' : 'rejected';

        $stmt = $conn->prepare("UPDATE reviews SET status = ? WHERE id = ?");
        $stmt->bind_param("si", $newStatus, $reviewId);
        $stmt->execute();
        $stmt->close();
        reviewRedirect();
    }

    /* Delete: admin can delete any; user only their own */
    if (isset($_POST['delete_review'])) {
        $reviewId = (int)$_POST['delete_review'];

        if ($isAdmin) {
            $stmt = $conn->prepare("DELETE FROM reviews WHERE id = ?");
            $stmt->bind_param("i", $reviewId);
        } else {
            $stmt = $conn->prepare("DELETE FROM reviews WHERE id = ? AND user_id = ?");
            $stmt->bind_param("ii", $reviewId, $sessionUserId);
        }

        $stmt->execute();
        $affected = $stmt->affected_rows;
        $stmt->close();

        if (!$affected) {
            http_response_code(403);
            exit('Review not found or you are not allowed to delete it.');
        }
        reviewRedirect();
    }

    /* Add or edit review */
    if (isset($_POST['save_review'])) {
        $reviewId = (int)($_POST['review_id'] ?? 0);
        $productId = (int)($_POST['product_id'] ?? 0);
        $rating = (int)($_POST['rating'] ?? 0);
        $title = trim((string)($_POST['review_title'] ?? ''));
        $body = trim((string)($_POST['review_text'] ?? ''));

        if ($productId <= 0 || $rating < 1 || $rating > 5 || $title === '' || $body === '') {
            http_response_code(422);
            exit('Please select a product, rating, title and review text.');
        }

        /* Confirm product exists */
        $productCheck = $conn->prepare("SELECT id FROM products WHERE id = ?");
        $productCheck->bind_param("i", $productId);
        $productCheck->execute();
        $productExists = $productCheck->get_result()->num_rows > 0;
        $productCheck->close();

        if (!$productExists) {
            http_response_code(422);
            exit('Selected product does not exist.');
        }

        if ($reviewId > 0) {
            if ($isAdmin) {
                $stmt = $conn->prepare(
                    "UPDATE reviews SET product_id = ?, rating = ?, review_title = ?, review_text = ? WHERE id = ?"
                );
                $stmt->bind_param("iissi", $productId, $rating, $title, $body, $reviewId);
            } else {
                $stmt = $conn->prepare(
                    "UPDATE reviews SET product_id = ?, rating = ?, review_title = ?, review_text = ?, status = 'pending' WHERE id = ? AND user_id = ?"
                );
                $stmt->bind_param("iissii", $productId, $rating, $title, $body, $reviewId, $sessionUserId);
            }
            $stmt->execute();
            $affected = $stmt->affected_rows;
            $stmt->close();

            if (!$isAdmin && $affected === 0) {
                /* Distinguish unchanged data from an unauthorized/missing record. */
                $check = $conn->prepare("SELECT id FROM reviews WHERE id = ? AND user_id = ?");
                $check->bind_param("ii", $reviewId, $sessionUserId);
                $check->execute();
                $owned = $check->get_result()->num_rows > 0;
                $check->close();
                if (!$owned) {
                    http_response_code(403);
                    exit('Review not found or you are not allowed to edit it.');
                }
            }
        } else {
            $newUserId = $isAdmin && !empty($_POST['user_id'])
                ? (int)$_POST['user_id']
                : $sessionUserId;

            if ($newUserId <= 0) {
                exit('Please select a valid customer.');
            }

            $statusForInsert = 'pending';
            $stmt = $conn->prepare(
                "INSERT INTO reviews (product_id, user_id, rating, review_title, review_text, status, created_at)
                 VALUES (?, ?, ?, ?, ?, ?, NOW())"
            );
            $stmt->bind_param("iiisss", $productId, $newUserId, $rating, $title, $body, $statusForInsert);
            $stmt->execute();
            $stmt->close();
        }

        reviewRedirect();
    }
}

/* ========================= PRODUCTS / CUSTOMERS FOR MODALS ========================= */
$products = [];
$productResult = $conn->query("SELECT id, name FROM products ORDER BY name ASC");
if ($productResult) {
    while ($product = $productResult->fetch_assoc()) {
        $products[] = $product;
    }
}

$customers = [];
if ($isAdmin) {
    $customerResult = $conn->query(
        "SELECT id, first_name, last_name, email_add FROM users ORDER BY first_name, last_name"
    );
    if ($customerResult) {
        while ($customer = $customerResult->fetch_assoc()) {
            $customers[] = $customer;
        }
    }
}

/* ========================= SEARCH / FILTER / PAGINATION ========================= */
$search = trim((string)($_GET['search'] ?? ''));
$status = (string)($_GET['status'] ?? '');
$allowedStatuses = ['pending', 'approved', 'rejected'];
if (!in_array($status, $allowedStatuses, true)) {
    $status = '';
}

$allowedPerPage = [10, 25, 50, 100];
$perPage = (int)($_GET['per_page'] ?? 10);
if (!in_array($perPage, $allowedPerPage, true)) {
    $perPage = 10;
}
$page = max(1, (int)($_GET['page'] ?? 1));

$where = [];
$params = [];
$types = '';

if (!$isAdmin) {
    $where[] = "r.user_id = ?";
    $params[] = $sessionUserId;
    $types .= 'i';
}
if ($search !== '') {
    $where[] = "(p.name LIKE ? OR u.first_name LIKE ? OR u.last_name LIKE ? OR u.email_add LIKE ? OR r.review_title LIKE ? OR r.review_text LIKE ?)";
    $term = '%' . $search . '%';
    for ($i = 0; $i < 6; $i++) {
        $params[] = $term;
        $types .= 's';
    }
}
if ($status !== '') {
    $where[] = "r.status = ?";
    $params[] = $status;
    $types .= 's';
}
$whereSql = $where ? 'WHERE ' . implode(' AND ', $where) : '';

/* ========================= STATISTICS (role-scoped) ========================= */
$statsSql = "
    SELECT COUNT(*) AS total_reviews,
           COALESCE(AVG(r.rating), 0) AS average_rating,
           SUM(CASE WHEN r.status='pending' THEN 1 ELSE 0 END) AS pending_reviews,
           SUM(CASE WHEN r.status='approved' THEN 1 ELSE 0 END) AS approved_reviews,
           SUM(CASE WHEN r.status='rejected' THEN 1 ELSE 0 END) AS rejected_reviews,
           SUM(CASE WHEN DATE(r.created_at) >= CURDATE() - INTERVAL 6 DAY THEN 1 ELSE 0 END) AS weekly_reviews
    FROM reviews r
    $whereSql";
$statsStmt = $conn->prepare($statsSql);
$statsParams = $params;
reviewBindParams($statsStmt, $types, $statsParams);
$statsStmt->execute();
$summary = $statsStmt->get_result()->fetch_assoc() ?: [];
$statsStmt->close();

$totalReviews = (int)($summary['total_reviews'] ?? 0);
$averageRating = (float)($summary['average_rating'] ?? 0);
$pendingReviews = (int)($summary['pending_reviews'] ?? 0);
$approvedReviews = (int)($summary['approved_reviews'] ?? 0);
$rejectedReviews = (int)($summary['rejected_reviews'] ?? 0);
$weeklyReviews = (int)($summary['weekly_reviews'] ?? 0);

$starCounts = [1 => 0, 2 => 0, 3 => 0, 4 => 0, 5 => 0];
$starSql = "SELECT r.rating, COUNT(*) AS total FROM reviews r $whereSql GROUP BY r.rating";
$starStmt = $conn->prepare($starSql);
$starParams = $params;
reviewBindParams($starStmt, $types, $starParams);
$starStmt->execute();
$starResult = $starStmt->get_result();
while ($star = $starResult->fetch_assoc()) {
    $starRating = (int)$star['rating'];
    if ($starRating >= 1 && $starRating <= 5) {
        $starCounts[$starRating] = (int)$star['total'];
    }
}
$starStmt->close();

/* ========================= COUNT AND FETCH ========================= */
$countSql = "
    SELECT COUNT(*) AS total
    FROM reviews r
    LEFT JOIN products p ON r.product_id = p.id
    LEFT JOIN users u ON r.user_id = u.id
    $whereSql";
$countStmt = $conn->prepare($countSql);
$countParams = $params;
reviewBindParams($countStmt, $types, $countParams);
$countStmt->execute();
$totalRecords = (int)($countStmt->get_result()->fetch_assoc()['total'] ?? 0);
$countStmt->close();

$totalPages = (int)ceil($totalRecords / $perPage);
if ($totalPages > 0 && $page > $totalPages) {
    $page = $totalPages;
}
$offset = ($page - 1) * $perPage;

$reviewSql = "
    SELECT r.id AS review_id, r.product_id, r.user_id, r.order_id,
           r.rating, r.review_title, r.review_text, r.status, r.created_at,
           p.name AS product_name, p.main_image AS product_image, p.sku AS product_sku,
           u.first_name, u.last_name, u.email_add AS customer_email
    FROM reviews r
    LEFT JOIN products p ON r.product_id = p.id
    LEFT JOIN users u ON r.user_id = u.id
    $whereSql
    ORDER BY r.created_at DESC
    LIMIT ? OFFSET ?";
$reviewStmt = $conn->prepare($reviewSql);
$reviewParams = $params;
$reviewTypes = $types . 'ii';
$reviewParams[] = $perPage;
$reviewParams[] = $offset;
reviewBindParams($reviewStmt, $reviewTypes, $reviewParams);
$reviewStmt->execute();
$reviewResult = $reviewStmt->get_result();
$reviews = [];
while ($row = $reviewResult->fetch_assoc()) {
    $reviews[] = $row;
}
$reviewStmt->close();

function reviewPageUrl($pageNumber)
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

                    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-3">
                        <div>
                            <h4 class="mb-1"><?= $isAdmin ? 'Manage Reviews' : 'My Reviews' ?></h4>
                            <p class="text-muted mb-0"><?= $isAdmin ? 'Review and manage customer feedback.' : 'View and manage the reviews you have submitted.' ?></p>
                        </div>
                        <button type="button" class="btn btn-primary" onclick="openReviewModal()">
                            <i class="bx bx-plus me-1"></i> Add Review
                        </button>
                    </div>

                    <!-- Existing review statistics layout retained -->
                    <div class="row mb-6 g-6">
                        <div class="col-md-6">
                            <div class="card h-100">
                                <div class="card-body row widget-separator g-0">
                                    <div class="col-sm-5 border-shift border-end pe-sm-6">
                                        <h3 class="text-primary d-flex align-items-center gap-2 mb-2">
                                            <?= number_format($averageRating, 2) ?>
                                            <i class="bx bxs-star icon-30px"></i>
                                        </h3>
                                        <p class="h6 mb-2">Total <?= $totalReviews ?> reviews</p>
                                        <p class="pe-2 mb-2"><?= $isAdmin ? 'All reviews from your customers' : 'Your submitted reviews' ?></p>
                                        <span class="badge bg-label-primary mb-4 mb-sm-0">+<?= $weeklyReviews ?> This week</span>
                                        <hr class="d-sm-none">
                                    </div>
                                    <div class="col-sm-7 gap-2 text-nowrap d-flex flex-column justify-content-between ps-sm-6 pt-2 py-sm-2">
                                        <?php for ($i = 5; $i >= 1; $i--):
                                            $count = $starCounts[$i];
                                            $percentage = $totalReviews > 0 ? ($count / $totalReviews) * 100 : 0;
                                        ?>
                                            <div class="d-flex align-items-center gap-2">
                                                <small><?= $i ?> Star</small>
                                                <div class="progress w-100 bg-label-primary" style="height:8px;">
                                                    <div class="progress-bar bg-primary" role="progressbar" style="width: <?= $percentage ?>%" aria-valuenow="<?= $percentage ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <small class="w-px-20 text-end"><?= $count ?></small>
                                            </div>
                                        <?php endfor; ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card h-100">
                                <div class="card-body row">
                                    <div class="col-sm-5">
                                        <div class="mb-12">
                                            <h5 class="mb-2 text-nowrap">Reviews statistics</h5>
                                            <p class="mb-0">
                                                <span class="me-2"><?= $pendingReviews ?> Pending reviews</span>
                                                <span class="badge bg-label-success"><?= $approvedReviews ?> Approved</span>
                                            </p>
                                        </div>
                                        <?php $positivePercentage = $totalReviews > 0 ? (($starCounts[4] + $starCounts[5]) / $totalReviews) * 100 : 0; ?>
                                        <div>
                                            <h6 class="mb-2 fw-normal"><span class="text-success me-1"><?= round($positivePercentage) ?>%</span> Positive reviews</h6>
                                            <small>All-time Report</small>
                                        </div>
                                    </div>
                                    <div class="col-sm-7 d-flex justify-content-sm-end align-items-end">
                                        <div id="reviewsChart" style="min-height:175px;">
                                            <div class="d-flex flex-column gap-3 text-end">
                                                <h3 class="text-primary mb-0"><?= $totalReviews ?></h3>
                                                <span class="text-muted">Total Reviews</span>
                                                <span class="badge bg-label-warning"><?= $pendingReviews ?> Pending</span>
                                                <span class="badge bg-label-success"><?= $approvedReviews ?> Published</span>
                                                <span class="badge bg-label-danger"><?= $rejectedReviews ?> Rejected</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Reviews table -->
                    <div class="card">
                        <div class="card-datatable table-responsive">
                            <div id="DataTables_Table_0_wrapper" class="dt-container dt-bootstrap5 dt-empty-footer">
                                <div class="row m-3 my-0 justify-content-between">
                                    <form method="GET" action="" class="d-md-flex justify-content-between align-items-center w-100 gap-3">
                                        <div class="dt-search mb-md-6 mb-0">
                                            <input type="search" name="search" class="form-control ms-0" placeholder="Search Review" value="<?= reviewEscape($search) ?>">
                                        </div>
                                        <div class="d-flex flex-md-row flex-column gap-3 align-items-center">
                                            <div class="dt-length mb-md-6 mb-0">
                                                <select name="per_page" class="form-select me-md-4 me-0" onchange="this.form.submit()">
                                                    <?php foreach ($allowedPerPage as $limit): ?>
                                                        <option value="<?= $limit ?>" <?= $perPage === $limit ? 'selected' : '' ?>><?= $limit ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="review_filter me-md-4">
                                                <select name="status" class="form-select" onchange="this.form.submit()">
                                                    <option value="" <?= $status === '' ? 'selected' : '' ?>>All</option>
                                                    <option value="pending" <?= $status === 'pending' ? 'selected' : '' ?>>Pending</option>
                                                    <option value="approved" <?= $status === 'approved' ? 'selected' : '' ?>>Published</option>
                                                    <option value="rejected" <?= $status === 'rejected' ? 'selected' : '' ?>>Rejected</option>
                                                </select>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Search</button>
                                            <a href="<?= reviewEscape(strtok($_SERVER['REQUEST_URI'], '?')) ?>" class="btn btn-label-secondary">Reset</a>
                                        </div>
                                    </form>
                                </div>

                                <div class="justify-content-between dt-layout-table">
                                    <div class="d-md-flex justify-content-between align-items-center dt-layout-full table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Product</th>
                                                    <?php if ($isAdmin): ?><th>Customer</th><?php endif; ?>
                                                    <th>Review</th>
                                                    <th>Date</th>
                                                    <th>Status</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php if ($reviews): ?>
                                                <?php foreach ($reviews as $review):
                                                    $productName = $review['product_name'] ?? 'Product not found';
                                                    $customerName = trim(($review['first_name'] ?? '') . ' ' . ($review['last_name'] ?? ''));
                                                    if ($customerName === '') $customerName = 'Unknown Customer';
                                                    $rating = (int)$review['rating'];
                                                    $reviewStatus = $review['status'] ?? 'pending';
                                                    $reviewDate = !empty($review['created_at']) ? date('M d, Y', strtotime($review['created_at'])) : '-';
                                                    $reviewJson = htmlspecialchars(json_encode([
                                                        'id' => (int)$review['review_id'],
                                                        'product_id' => (int)$review['product_id'],
                                                        'product_name' => $productName,
                                                        'rating' => $rating,
                                                        'title' => $review['review_title'],
                                                        'text' => $review['review_text'],
                                                        'status' => $reviewStatus
                                                    ], JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP), ENT_QUOTES, 'UTF-8');
                                                ?>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="avatar me-3 rounded-2 bg-label-secondary">
                                                                <?php if (!empty($review['product_image'])): ?>
                                                                    <img src="../<?= reviewEscape($review['product_image']) ?>" alt="<?= reviewEscape($productName) ?>" class="rounded" style="width:45px;height:45px;object-fit:cover;">
                                                                <?php else: ?>
                                                                    <span class="avatar-initial rounded"><i class="bx bx-image"></i></span>
                                                                <?php endif; ?>
                                                            </div>
                                                            <div class="d-flex flex-column">
                                                                <span class="fw-medium text-heading"><?= reviewEscape($productName) ?></span>
                                                                <small><?= reviewEscape($review['product_sku'] ?? '') ?></small>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <?php if ($isAdmin): ?>
                                                    <td>
                                                        <div class="d-flex flex-column">
                                                            <span class="fw-medium"><?= reviewEscape($customerName) ?></span>
                                                            <small><?= reviewEscape($review['customer_email'] ?? 'No email') ?></small>
                                                        </div>
                                                    </td>
                                                    <?php endif; ?>
                                                    <td>
                                                        <div class="d-flex align-items-center mb-1">
                                                            <?php for ($i=1; $i<=5; $i++): ?>
                                                                <i class="bx bxs-star" style="color:<?= $i <= $rating ? '#FFD700' : '#dce0e5' ?>;font-size:17px;"></i>
                                                            <?php endfor; ?>
                                                            <small class="ms-2">(<?= $rating ?>/5)</small>
                                                        </div>
                                                        <p class="h6 mb-1 text-truncate"><?= reviewEscape($review['review_title'] ?: 'Customer Review') ?></p>
                                                        <small class="text-muted"><?= reviewEscape(mb_strimwidth((string)$review['review_text'], 0, 85, '…')) ?></small>
                                                    </td>
                                                    <td><span class="text-nowrap"><?= reviewEscape($reviewDate) ?></span></td>
                                                    <td>
                                                        <?php if ($reviewStatus === 'approved'): ?>
                                                            <span class="badge bg-label-success">Published</span>
                                                        <?php elseif ($reviewStatus === 'pending'): ?>
                                                            <span class="badge bg-label-warning">Pending</span>
                                                        <?php else: ?>
                                                            <span class="badge bg-label-danger">Rejected</span>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button type="button" class="btn btn-icon dropdown-toggle hide-arrow p-0" data-bs-toggle="dropdown">
                                                                <i class="bx bx-dots-vertical-rounded icon-md"></i>
                                                            </button>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <button type="button" class="dropdown-item" onclick='viewReview(<?= $reviewJson ?>)'>
                                                                    <i class="bx bx-show me-2"></i>View Review
                                                                </button>
                                                                <button type="button" class="dropdown-item" onclick='editReview(<?= $reviewJson ?>)'>
                                                                    <i class="bx bx-edit me-2"></i>Edit Review
                                                                </button>
                                                                <?php if ($isAdmin && $reviewStatus !== 'approved'): ?>
                                                                    <form method="POST">
                                                                        <input type="hidden" name="csrf_token" value="<?= reviewEscape($csrfToken) ?>">
                                                                        <button type="submit" name="approve_review" value="<?= (int)$review['review_id'] ?>" class="dropdown-item">
                                                                            <i class="bx bx-check-circle me-2"></i>Approve Review
                                                                        </button>
                                                                    </form>
                                                                <?php endif; ?>
                                                                <?php if ($isAdmin && $reviewStatus !== 'rejected'): ?>
                                                                    <form method="POST">
                                                                        <input type="hidden" name="csrf_token" value="<?= reviewEscape($csrfToken) ?>">
                                                                        <button type="submit" name="reject_review" value="<?= (int)$review['review_id'] ?>" class="dropdown-item">
                                                                            <i class="bx bx-x-circle me-2"></i>Reject Review
                                                                        </button>
                                                                    </form>
                                                                <?php endif; ?>
                                                                <div class="dropdown-divider"></div>
                                                                <form method="POST" onsubmit="return confirm('Are you sure you want to delete this review?');">
                                                                    <input type="hidden" name="csrf_token" value="<?= reviewEscape($csrfToken) ?>">
                                                                    <button type="submit" name="delete_review" value="<?= (int)$review['review_id'] ?>" class="dropdown-item text-danger">
                                                                        <i class="bx bx-trash me-2"></i>Delete
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php endforeach; ?>
                                            <?php else: ?>
                                                <tr><td colspan="<?= $isAdmin ? 6 : 5 ?>" class="text-center py-5">
                                                    <i class="bx bx-message-square-x fs-1 text-muted"></i>
                                                    <h6 class="mt-2 mb-1">No reviews found</h6>
                                                    <small class="text-muted"><?= $isAdmin ? 'Customer reviews will appear here.' : 'You have not submitted any reviews yet.' ?></small>
                                                </td></tr>
                                            <?php endif; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="row mx-3 justify-content-between">
                                    <div class="d-md-flex justify-content-between align-items-center dt-layout-start col-md-auto me-auto px-3">
                                        <?php $startEntry = $totalRecords > 0 ? $offset + 1 : 0; $endEntry = min($offset + $perPage, $totalRecords); ?>
                                        <div class="dt-info" aria-live="polite" role="status">Showing <?= $startEntry ?> to <?= $endEntry ?> of <?= $totalRecords ?> entries</div>
                                    </div>
                                    <div class="d-md-flex justify-content-between align-items-center dt-layout-end col-md-auto ms-auto d-flex flex-md-row flex-column gap-md-0 gap-5 px-3 mb-md-0 mb-5 mt-0">
                                        <nav aria-label="pagination">
                                            <ul class="pagination">
                                                <li class="page-item <?= $page <= 1 ? 'disabled' : '' ?>">
                                                    <a class="page-link" href="<?= $page > 1 ? reviewPageUrl($page - 1) : '#' ?>"><i class="bx bx-chevron-left"></i></a>
                                                </li>
                                                <?php if ($totalPages > 0):
                                                    $startPage = max(1, $page - 2);
                                                    $endPage = min($totalPages, $page + 2);
                                                    for ($i = $startPage; $i <= $endPage; $i++): ?>
                                                        <li class="page-item <?= $page === $i ? 'active' : '' ?>">
                                                            <a class="page-link" href="<?= reviewPageUrl($i) ?>"><?= $i ?></a>
                                                        </li>
                                                    <?php endfor; ?>
                                                <?php endif; ?>
                                                <li class="page-item <?= $page >= $totalPages ? 'disabled' : '' ?>">
                                                    <a class="page-link" href="<?= $page < $totalPages ? reviewPageUrl($page + 1) : '#' ?>"><i class="bx bx-chevron-right"></i></a>
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
</main>

<!-- Add/Edit Review Modal -->
<div class="modal fade" id="reviewFormModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form method="POST" id="reviewForm">
                <div class="modal-header">
                    <h5 class="modal-title" id="reviewFormTitle">Add Review</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="csrf_token" value="<?= reviewEscape($csrfToken) ?>">
                    <input type="hidden" name="save_review" value="1">
                    <input type="hidden" name="review_id" id="form_review_id" value="0">

                    <div class="mb-3">
                        <label class="form-label" for="form_product_id">Product</label>
                        <select class="form-select" name="product_id" id="form_product_id" required>
                            <option value="">Select product</option>
                            <?php foreach ($products as $product): ?>
                                <option value="<?= (int)$product['id'] ?>"><?= reviewEscape($product['name']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <?php if ($isAdmin): ?>
                    <div class="mb-3">
                        <label class="form-label" for="form_user_id">Customer</label>
                        <select class="form-select" name="user_id" id="form_user_id">
                            <option value="">Use my account</option>
                            <?php foreach ($customers as $customer):
                                $fullName = trim($customer['first_name'] . ' ' . $customer['last_name']);
                            ?>
                                <option value="<?= (int)$customer['id'] ?>"><?= reviewEscape($fullName . ' — ' . $customer['email_add']) ?></option>
                            <?php endforeach; ?>
                        </select>
                        <small class="text-muted">Select a customer for whom this review is being entered.</small>
                    </div>
                    <?php endif; ?>

                    <div class="mb-3">
                        <label class="form-label d-block">Rating</label>
                        <div class="review-rating-input" aria-label="Choose rating">
                            <?php for ($i=1; $i<=5; $i++): ?>
                                <input type="radio" class="btn-check" name="rating" id="rating<?= $i ?>" value="<?= $i ?>" required>
                                <label class="btn btn-outline-warning btn-sm" for="rating<?= $i ?>"><i class="bx bxs-star"></i> <?= $i ?></label>
                            <?php endfor; ?>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="form_review_title">Review Title</label>
                        <input type="text" class="form-control" name="review_title" id="form_review_title" maxlength="255" required>
                    </div>

                    <div class="mb-0">
                        <label class="form-label" for="form_review_text">Review</label>
                        <textarea class="form-control" name="review_text" id="form_review_text" rows="5" required></textarea>
                    </div>
                    <?php if (!$isAdmin): ?>
                        <small class="text-muted d-block mt-2">Your review will be submitted for admin approval. Editing a review sends it back to pending.</small>
                    <?php endif; ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save Review</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- View Review Modal -->
<div class="modal fade" id="reviewViewModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Review Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h6 id="view_product" class="mb-2"></h6>
                <div id="view_stars" class="mb-3"></div>
                <h5 id="view_title"></h5>
                <p id="view_text" class="text-break mb-3" style="white-space:pre-wrap;"></p>
                <div>Status: <span id="view_status" class="badge"></span></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
(function () {
    const formModalElement = document.getElementById('reviewFormModal');
    const viewModalElement = document.getElementById('reviewViewModal');

    window.openReviewModal = function () {
        document.getElementById('reviewForm').reset();
        document.getElementById('form_review_id').value = '0';
        document.getElementById('reviewFormTitle').textContent = 'Add Review';
        <?php if ($isAdmin): ?>
        document.getElementById('form_user_id').value = '';
        <?php endif; ?>
        bootstrap.Modal.getOrCreateInstance(formModalElement).show();
    };

    window.editReview = function (review) {
        document.getElementById('reviewForm').reset();
        document.getElementById('form_review_id').value = review.id;
        document.getElementById('form_product_id').value = review.product_id;
        document.getElementById('form_review_title').value = review.title || '';
        document.getElementById('form_review_text').value = review.text || '';
        const ratingInput = document.querySelector('input[name="rating"][value="' + review.rating + '"]');
        if (ratingInput) ratingInput.checked = true;
        document.getElementById('reviewFormTitle').textContent = 'Edit Review';
        <?php if ($isAdmin): ?>
        document.getElementById('form_user_id').value = '';
        <?php endif; ?>
        bootstrap.Modal.getOrCreateInstance(formModalElement).show();
    };

    window.viewReview = function (review) {
        document.getElementById('view_product').textContent = review.product_name || 'Product';
        document.getElementById('view_title').textContent = review.title || 'Customer Review';
        document.getElementById('view_text').textContent = review.text || '';
        document.getElementById('view_stars').textContent = '★'.repeat(Number(review.rating)) + '☆'.repeat(5 - Number(review.rating)) + ' (' + review.rating + '/5)';
        const status = document.getElementById('view_status');
        status.textContent = review.status || 'pending';
        status.className = 'badge ' + (review.status === 'approved' ? 'bg-label-success' : (review.status === 'rejected' ? 'bg-label-danger' : 'bg-label-warning'));
        bootstrap.Modal.getOrCreateInstance(viewModalElement).show();
    };
})();
</script>

<?php include './components/dash_footer.php'; ?>
