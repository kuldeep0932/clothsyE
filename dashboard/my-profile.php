<?php

$pageTitle = "My Profile";
include './components/head_html.php';

/* Get logged-in user ID */
$userId = $_SESSION['user_id'] ?? $_SESSION['customer_id'] ?? 0;

/* Fetch logged-in user details */
$user = [];

if ($userId > 0) {
    $sql = "SELECT * FROM users WHERE id = ? LIMIT 1";
    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param($stmt, "i", $userId);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_assoc($result) ?: [];

    mysqli_stmt_close($stmt);
}

/* Escape output */
function profileEscape($value)
{
    return htmlspecialchars((string) ($value ?? ''), ENT_QUOTES, 'UTF-8');
}

/* Customer details */
$firstName = $user['first_name'] ?? '';
$lastName = $user['last_name'] ?? '';
$fullName = trim($firstName . ' ' . $lastName);

$email = $user['email_add'] ?? '';
$phone = $user['Phone_no'] ?? '';
$address = $user['Address'] ?? '';
$city = $user['city'] ?? '';
$state = $user['state'] ?? '';
$pin = $user['pin'] ?? '';

$initials = strtoupper(
    substr($firstName, 0, 1) . substr($lastName, 0, 1)
);

$joinedDate = !empty($user['created_at'])
    ? date('d F Y', strtotime($user['created_at']))
    : 'Not available';

$fullAddress = implode(', ', array_filter([
    $address,
    $city,
    $state,
    $pin
]));


?>
<style>
    /* profile page css */
.user-profile-header-banner img {
    block-size: 250px;
    inline-size: 100%;
    object-fit: cover
}

.user-profile-header {
    margin-block-start:-2rem}

.user-profile-header .user-profile-img {
    border: 5px solid;
    border-color: var(--bs-paper-bg);
    inline-size: 120px
}

@media(max-width: 767.98px) {
    .user-profile-header-banner img {
        block-size:150px
    }

    .user-profile-header .user-profile-img {
        inline-size: 100px
    }
}

</style>
<main class="main_page layout-wrapper layout-content-navbar">
    <div class="layout_container layout-container">

        <?php include './components/sidebar.php'; ?>

        <div class="main_content_container layout-page">

            <?php include './components/nav_bar.php'; ?>

            <div class="content-wrapper">

                <div class="container-xxl flex-grow-1 container-p-y">

                    <?php if (empty($user)) { ?>

                        <div class="card">
                            <div class="card-body text-center py-5">
                                <i class="bx bx-user-x fs-1 mb-3"></i>
                                <h5>User Profile Not Found</h5>
                                <p class="text-muted mb-0">
                                    Please log in to view your profile details.
                                </p>
                            </div>
                        </div>

                    <?php } else { ?>

                        <!-- Profile Header -->
                        <div class="row">
                            <div class="col-12">

                                <div class="card mb-6">

                                    <div class="user-profile-header-banner">
                                        <img src="./components/img/profile-banner.png" alt="Profile Banner"
                                            class="rounded-top w-100">
                                    </div>

                                    <div
                                        class="user-profile-header d-flex flex-column flex-lg-row text-sm-start text-center mb-8">
                                        <div class="flex-shrink-0 mt-1 mx-sm-0 mx-auto">
                                            <img src="./components/img/user.png" alt="user image"
                                                class="d-block h-auto ms-0 ms-sm-6 rounded-3 user-profile-img">
                                        </div>
                                        <!-- <div class="flex-shrink-0 mt-1 mx-sm-0 mx-auto">

                                            <div class="avatar avatar-xl">
                                                <span class="avatar-initial rounded-circle bg-label-primary"
                                                    style="width: 100px; height: 100px; font-size: 32px;">
                                                    <?= profileEscape($initials ?: 'U') ?>
                                                </span>
                                            </div>

                                        </div> -->

                                        <div class="flex-grow-1 mt-3 mt-lg-5">

                                            <div
                                                class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-5 flex-md-row flex-column gap-4">

                                                <div class="user-profile-info">

                                                    <h4 class="mb-2 mt-lg-7">
                                                        <?= profileEscape($fullName) ?>
                                                    </h4>

                                                    <ul
                                                        class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-4 mt-4">

                                                        <li class="list-inline-item">
                                                            <i class="bx bx-envelope me-2 align-top"></i>
                                                            <span class="fw-medium">
                                                                <?= profileEscape($email) ?>
                                                            </span>
                                                        </li>

                                                        <li class="list-inline-item">
                                                            <i class="bx bx-map me-2 align-top"></i>
                                                            <span class="fw-medium">
                                                                <?= profileEscape($city ?: 'Location not added') ?>
                                                            </span>
                                                        </li>

                                                        <li class="list-inline-item">
                                                            <i class="bx bx-calendar me-2 align-top"></i>
                                                            <span class="fw-medium">
                                                                Joined <?= profileEscape($joinedDate) ?>
                                                            </span>
                                                        </li>

                                                    </ul>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div>
                        <!-- / Profile Header -->


                        <!-- Profile Details -->
                        <div class="row">

                            <div class="col-xl-4 col-lg-5 col-md-5">

                                <!-- About Customer -->
                                <div class="card mb-6">

                                    <div class="card-body">

                                        <small class="card-text text-uppercase text-body-secondary small">
                                            About
                                        </small>

                                        <ul class="list-unstyled my-3 py-1">

                                            <li class="d-flex align-items-center mb-4">
                                                <i class="bx bx-user"></i>
                                                <span class="fw-medium mx-2">Full Name:</span>
                                                <span><?= profileEscape($fullName ?: 'Not available') ?></span>
                                            </li>

                                            <li class="d-flex align-items-center mb-4">
                                                <i class="bx bx-id-card"></i>
                                                <span class="fw-medium mx-2">Customer ID:</span>
                                                <span>#<?= profileEscape($user['id']) ?></span>
                                            </li>

                                            <li class="d-flex align-items-center mb-4">
                                                <i class="bx bx-calendar"></i>
                                                <span class="fw-medium mx-2">Joined:</span>
                                                <span><?= profileEscape($joinedDate) ?></span>
                                            </li>

                                            <li class="d-flex align-items-center mb-2">
                                                <i class="bx bx-check-circle"></i>
                                                <span class="fw-medium mx-2">Terms Accepted:</span>
                                                <span>
                                                    <?= !empty($user['agree']) ? 'Yes' : 'No' ?>
                                                </span>
                                            </li>

                                        </ul>

                                        <hr>

                                        <small class="card-text text-uppercase text-body-secondary small">
                                            Contact Information
                                        </small>

                                        <ul class="list-unstyled my-3 py-1">

                                            <li class="d-flex align-items-center mb-4">
                                                <i class="bx bx-phone"></i>
                                                <span class="fw-medium mx-2">Phone:</span>
                                                <span><?= profileEscape($phone ?: 'Not available') ?></span>
                                            </li>

                                            <li class="d-flex align-items-center mb-2">
                                                <i class="bx bx-envelope"></i>
                                                <span class="fw-medium mx-2">Email:</span>
                                                <span><?= profileEscape($email ?: 'Not available') ?></span>
                                            </li>

                                        </ul>

                                    </div>

                                </div>
                                <!-- / About Customer -->

                            </div>


                            <div class="col-xl-8 col-lg-7 col-md-7">

                                <!-- Address Details -->
                                <div class="card mb-6">

                                    <div class="card-header">
                                        <h5 class="mb-0">
                                            <i class="bx bx-map me-2"></i>
                                            Address Information
                                        </h5>
                                    </div>

                                    <div class="card-body">

                                        <div class="row">

                                            <div class="col-md-12 mb-4">

                                                <label class="form-label text-muted">
                                                    Complete Address
                                                </label>

                                                <p class="fw-medium mb-0">
                                                    <?= profileEscape($fullAddress ?: 'Address not available') ?>
                                                </p>

                                            </div>

                                            <div class="col-md-6 mb-4">

                                                <label class="form-label text-muted">
                                                    City
                                                </label>

                                                <p class="fw-medium mb-0">
                                                    <?= profileEscape($city ?: 'Not available') ?>
                                                </p>

                                            </div>

                                            <div class="col-md-6 mb-4">

                                                <label class="form-label text-muted">
                                                    State
                                                </label>

                                                <p class="fw-medium mb-0">
                                                    <?= profileEscape($state ?: 'Not available') ?>
                                                </p>

                                            </div>

                                            <div class="col-md-6">

                                                <label class="form-label text-muted">
                                                    PIN Code
                                                </label>

                                                <p class="fw-medium mb-0">
                                                    <?= profileEscape($pin ?: 'Not available') ?>
                                                </p>

                                            </div>

                                        </div>

                                    </div>

                                </div>
                                <!-- / Address Details -->

                            </div>

                        </div>
                        <!-- / Profile Details -->

                    <?php } ?>

                </div>

                <div class="content-backdrop fade"></div>

            </div>

        </div>

    </div>
</main>

<?php include './components/dash_footer.php'; ?>