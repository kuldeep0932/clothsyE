<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$pageTitle = "Account Settings";

include '../database/connection.php';

/* Check login */
if (
    empty($_SESSION['logged_in']) ||
    $_SESSION['logged_in'] !== true
) {
    header("Location: ../login.php");
    exit;
}

/* Get logged-in user ID */
$userId = $_SESSION['user_id'] ?? $_SESSION['customer_id'] ?? 0;

if (!$userId) {
    die("User session not found. Please check your login code.");
}

/* Escape output */
function settingsEscape($value)
{
    return htmlspecialchars((string) ($value ?? ''), ENT_QUOTES, 'UTF-8');
}

$successMessage = '';
$errorMessage = '';

/* Fetch logged-in user */
$stmt = mysqli_prepare($conn, "SELECT * FROM users WHERE id = ? LIMIT 1");
mysqli_stmt_bind_param($stmt, "i", $userId);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
$user = mysqli_fetch_assoc($result);

mysqli_stmt_close($stmt);

if (!$user) {
    die("User account not found.");
}

/* Handle form submissions */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    /* Update account details */
    if (isset($_POST['update_profile'])) {

        $firstName = trim($_POST['first_name'] ?? '');
        $lastName = trim($_POST['last_name'] ?? '');
        $email = trim($_POST['email_add'] ?? '');
        $phone = trim($_POST['Phone_no'] ?? '');
        $address = trim($_POST['Address'] ?? '');
        $city = trim($_POST['city'] ?? '');
        $state = trim($_POST['state'] ?? '');
        $pin = trim($_POST['pin'] ?? '');

        if (
            $firstName === '' ||
            $lastName === '' ||
            $email === ''
        ) {
            $errorMessage = "First name, last name and email are required.";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errorMessage = "Please enter a valid email address.";
        } else {

            /* Check duplicate email */
            $check = mysqli_prepare(
                $conn,
                "SELECT id FROM users WHERE email_add = ? AND id != ? LIMIT 1"
            );

            mysqli_stmt_bind_param($check, "si", $email, $userId);
            mysqli_stmt_execute($check);
            mysqli_stmt_store_result($check);

            if (mysqli_stmt_num_rows($check) > 0) {
                $errorMessage = "This email address is already registered.";
            }

            mysqli_stmt_close($check);

            if ($errorMessage === '') {

                $update = mysqli_prepare(
                    $conn,
                    "UPDATE users SET
                        first_name = ?,
                        last_name = ?,
                        email_add = ?,
                        Phone_no = ?,
                        Address = ?,
                        city = ?,
                        state = ?,
                        pin = ?
                    WHERE id = ?"
                );

                mysqli_stmt_bind_param(
                    $update,
                    "ssssssssi",
                    $firstName,
                    $lastName,
                    $email,
                    $phone,
                    $address,
                    $city,
                    $state,
                    $pin,
                    $userId
                );

                if (mysqli_stmt_execute($update)) {
                    $successMessage = "Your account details have been updated successfully.";
                } else {
                    $errorMessage = "Unable to update your account. Please try again.";
                }

                mysqli_stmt_close($update);
            }
        }

        /* Refresh user details */
        if ($errorMessage === '') {
            $stmt = mysqli_prepare($conn, "SELECT * FROM users WHERE id = ? LIMIT 1");
            mysqli_stmt_bind_param($stmt, "i", $userId);
            mysqli_stmt_execute($stmt);

            $result = mysqli_stmt_get_result($stmt);
            $user = mysqli_fetch_assoc($result);

            mysqli_stmt_close($stmt);
        }
    }

    /* Change password */
    if (isset($_POST['change_password'])) {

        $currentPassword = $_POST['currentPassword'] ?? '';
        $newPassword = $_POST['newPassword'] ?? '';
        $confirmPassword = $_POST['confirmPassword'] ?? '';

        if ($currentPassword === '' || $newPassword === '' || $confirmPassword === '') {
            $errorMessage = "Please fill in all password fields.";
        } elseif (!password_verify($currentPassword, $user['password'])) {
            $errorMessage = "Your current password is incorrect.";
        } elseif (strlen($newPassword) < 8) {
            $errorMessage = "New password must be at least 8 characters long.";
        } elseif ($newPassword !== $confirmPassword) {
            $errorMessage = "New password and confirm password do not match.";
        } else {

            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

            $updatePassword = mysqli_prepare(
                $conn,
                "UPDATE users SET password = ? WHERE id = ?"
            );

            mysqli_stmt_bind_param(
                $updatePassword,
                "si",
                $hashedPassword,
                $userId
            );

            if (mysqli_stmt_execute($updatePassword)) {
                $successMessage = "Your password has been changed successfully.";
                $user['password'] = $hashedPassword;
            } else {
                $errorMessage = "Unable to change password. Please try again.";
            }

            mysqli_stmt_close($updatePassword);
        }
    }
}

include './components/head_html.php';
?>
<main class="main_page layout-wrapper layout-content-navbar">
    <div class="layout_container layout-container">

        <?php include './components/sidebar.php'; ?>

        <div class="main_content_container layout-page">

            <?php include './components/nav_bar.php'; ?>

            <div class="content-wrapper">

                <div class="container-xxl flex-grow-1 container-p-y">

                    <!-- Success Message -->
                    <?php if ($successMessage): ?>
                        <div class="alert alert-success alert-dismissible fade show">
                            <?= settingsEscape($successMessage) ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    <?php endif; ?>

                    <!-- Error Message -->
                    <?php if ($errorMessage): ?>
                        <div class="alert alert-danger alert-dismissible fade show">
                            <?= settingsEscape($errorMessage) ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    <?php endif; ?>

                    <div class="row">
                        <div class="col-md-12">

                            <!-- Tabs Navigation -->
                            <ul class="nav nav-pills flex-column flex-md-row mb-4 gap-2" id="settingsTabs"
                                role="tablist">

                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="account-tab" data-bs-toggle="pill"
                                        data-bs-target="#account" type="button" role="tab" aria-controls="account"
                                        aria-selected="true">

                                        <i class="bx bx-user me-1"></i> Account
                                    </button>
                                </li>

                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="security-tab" data-bs-toggle="pill"
                                        data-bs-target="#security" type="button" role="tab" aria-controls="security"
                                        aria-selected="false">

                                        <i class="bx bx-lock-alt me-1"></i> Security
                                    </button>
                                </li>

                            </ul>

                            <!-- Tabs Content -->
                            <div class="tab-content p-0 border-0" id="settingsTabsContent">

                                <!-- ACCOUNT TAB -->
                                <div class="tab-pane fade show active" id="account" role="tabpanel"
                                    aria-labelledby="account-tab">

                                    <div class="card mb-5">

                                        <div class="card-header">
                                            <h5 class="mb-0">Profile Information</h5>
                                            <small class="text-muted">
                                                Update your personal account details.
                                            </small>
                                        </div>

                                        <div class="card-body">

                                            <form method="POST">

                                                <div class="row g-4">

                                                    <div class="col-md-6">
                                                        <label class="form-label" for="first_name">First Name</label>
                                                        <input type="text" class="form-control" id="first_name"
                                                            name="first_name"
                                                            value="<?= settingsEscape($user['first_name']) ?>" required>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label class="form-label" for="last_name">Last Name</label>
                                                        <input type="text" class="form-control" id="last_name"
                                                            name="last_name"
                                                            value="<?= settingsEscape($user['last_name']) ?>" required>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label class="form-label" for="email_add">Email Address</label>
                                                        <input type="email" class="form-control" id="email_add"
                                                            name="email_add"
                                                            value="<?= settingsEscape($user['email_add']) ?>" required>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label class="form-label" for="Phone_no">Phone Number</label>
                                                        <input type="text" class="form-control" id="Phone_no"
                                                            name="Phone_no"
                                                            value="<?= settingsEscape($user['Phone_no']) ?>">
                                                    </div>

                                                    <div class="col-md-12">
                                                        <label class="form-label" for="Address">Address</label>
                                                        <input type="text" class="form-control" id="Address"
                                                            name="Address"
                                                            value="<?= settingsEscape($user['Address']) ?>">
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label class="form-label" for="city">City</label>
                                                        <input type="text" class="form-control" id="city" name="city"
                                                            value="<?= settingsEscape($user['city']) ?>">
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label class="form-label" for="state">State</label>
                                                        <input type="text" class="form-control" id="state" name="state"
                                                            value="<?= settingsEscape($user['state']) ?>">
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label class="form-label" for="pin">PIN Code</label>
                                                        <input type="text" class="form-control" id="pin" name="pin"
                                                            value="<?= settingsEscape($user['pin']) ?>">
                                                    </div>

                                                </div>

                                                <div class="mt-4">
                                                    <button type="submit" name="update_profile"
                                                        class="btn btn-primary me-2">
                                                        Save Changes
                                                    </button>

                                                    <button type="reset" class="btn btn-label-secondary">
                                                        Reset
                                                    </button>
                                                </div>

                                            </form>

                                        </div>
                                    </div>

                                </div>

                                <!-- SECURITY TAB -->
                                <div class="tab-pane fade" id="security" role="tabpanel" aria-labelledby="security-tab">

                                    <div class="card mb-5">

                                        <div class="card-header">
                                            <h5 class="mb-0">Change Password</h5>
                                            <small class="text-muted">
                                                Update your account password.
                                            </small>
                                        </div>

                                        <div class="card-body">

                                            <form method="POST">

                                                <div class="row g-4">

                                                    <div class="col-md-6">
                                                        <label class="form-label" for="currentPassword">
                                                            Current Password
                                                        </label>

                                                        <input type="password" class="form-control" id="currentPassword"
                                                            name="currentPassword" placeholder="Enter current password"
                                                            required>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label class="form-label" for="newPassword">
                                                            New Password
                                                        </label>

                                                        <input type="password" class="form-control" id="newPassword"
                                                            name="newPassword" placeholder="Enter new password"
                                                            minlength="8" required>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label class="form-label" for="confirmPassword">
                                                            Confirm New Password
                                                        </label>

                                                        <input type="password" class="form-control" id="confirmPassword"
                                                            name="confirmPassword" placeholder="Confirm new password"
                                                            minlength="8" required>
                                                    </div>

                                                </div>

                                                <div class="mt-4">
                                                    <h6>Password Requirements:</h6>

                                                    <ul class="ps-4 text-muted">
                                                        <li>Minimum 8 characters long.</li>
                                                        <li>Use a combination of letters and numbers.</li>
                                                        <li>Choose a strong password.</li>
                                                    </ul>
                                                </div>

                                                <div class="mt-4">
                                                    <button type="submit" name="change_password"
                                                        class="btn btn-primary me-2">
                                                        Update Password
                                                    </button>

                                                    <button type="reset" class="btn btn-label-secondary">
                                                        Reset
                                                    </button>
                                                </div>

                                            </form>

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

<?php include './components/dash_footer.php'; ?>