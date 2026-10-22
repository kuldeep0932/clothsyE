<!-- dashboard head tag code or body start tag -->
<?php
$pageTitle = "Site Setting";
include('./components/head_html.php');

include '.././database/connection.php';

$sql = "SELECT * FROM site_settings WHERE id = 1 LIMIT 1";

$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);

$siteName = $row['site_name'] ?? '';
$siteLogo = $row['site_logo'] ?? '';
$aboutText = $row['about_text'] ?? '';

$email = $row['email'] ?? '';
$phone = $row['phone'] ?? '';
$address = $row['address'] ?? '';

$facebookUrl = $row['facebook_url'] ?? '';
$instagramUrl = $row['instagram_url'] ?? '';
$twitterUrl = $row['twitter_url'] ?? '';
$youtubeUrl = $row['youtube_url'] ?? '';
$linkedinUrl = $row['linkedin_url'] ?? '';
$primaryColor = $row['primary_color'] ?? '#ef2d19';

$copyrightText = $row['copyright_text'] ?? '';

?>

<main class="main_page layout-wrapper layout-content-navbar">

    <div class="layout_container layout-container">

        <?php include('./components/sidebar.php'); ?>

        <div class="main_content_container layout-page">

            <?php include('./components/nav_bar.php'); ?>


            <!-- Dashboard Content -->
            <div class="content-wrapper">

                <div class="container-xxl flex-grow-1 container-p-y">


                    <!-- Site Settings Card -->
                    <div class="card">

                        <div class="card-header d-flex align-items-center justify-content-between">

                            <div class="title_box">
                                <h5 class="card-title mb-0">
                                    Site Settings
                                </h5>

                                <p class="text-muted mb-0 mt-1">
                                    Manage your website information, logo, contact details and social links.
                                </p>
                            </div>
                            <?php if (!empty($siteLogo)) { ?>

                                <div class="mt-3">
                                    <img src="../<?= htmlspecialchars($siteLogo) ?>" alt="Site Logo"
                                        style="max-height:60px; max-width:200px;">
                                </div>

                            <?php } ?>
                        </div>


                        <div class="card-body">

                            <form method="POST" action="../validations/site_setting_update.php" enctype="multipart/form-data">

                                <!-- ================================= -->
                                <!-- GENERAL INFORMATION -->
                                <!-- ================================= -->

                                <div class="mb-5">

                                    <h6 class="mb-4">
                                        General Information
                                    </h6>

                                    <div class="row">


                                        <!-- Site Name -->
                                        <div class="col-md-6 mb-4">

                                            <label for="site-name" class="form-label">
                                                Site Name
                                            </label>

                                            <input type="text" id="site-name" name="site_name" class="form-control"
                                                placeholder="Clothsy" value="<?= htmlspecialchars($siteName) ?>"
                                                required>

                                        </div>


                                        <!-- Site Logo -->
                                        <div class="col-md-6 mb-4">

                                            <label for="site-logo" class="form-label">
                                                Site Logo
                                            </label>

                                            <input type="file" id="site-logo" name="site_logo" class="form-control"
                                                accept="image/*" value="<?= htmlspecialchars($siteLogo) ?>">
                                        </div>


                                        <!-- About -->
                                        <div class="col-12 mb-4">

                                            <label for="about-text" class="form-label">
                                                About Website
                                            </label>

                                            <textarea id="about-text" name="about_text" class="form-control" rows="5"
                                                placeholder="Enter website about information..."><?= htmlspecialchars($aboutText) ?></textarea>

                                        </div>

                                    </div>

                                </div>


                                <!-- ================================= -->
                                <!-- CONTACT INFORMATION -->
                                <!-- ================================= -->

                                <div class="mb-5">

                                    <h6 class="mb-4">
                                        Contact Information
                                    </h6>

                                    <div class="row">


                                        <!-- Email -->
                                        <div class="col-md-6 mb-4">

                                            <label for="email" class="form-label">
                                                Email
                                            </label>

                                            <input type="email" id="email" name="email" class="form-control"
                                                placeholder="info@clothsy.com" value="<?= htmlspecialchars($email) ?>">

                                        </div>


                                        <!-- Phone -->
                                        <div class="col-md-6 mb-4">

                                            <label for="phone" class="form-label">
                                                Phone
                                            </label>

                                            <input type="text" id="phone" name="phone" class="form-control"
                                                placeholder="+91 9876543210" value="<?= htmlspecialchars($phone) ?>">

                                        </div>


                                        <!-- Address -->
                                        <div class="col-12 mb-4">

                                            <label for="address" class="form-label">
                                                Address
                                            </label>

                                            <textarea id="address" name="address" class="form-control" rows="3"
                                                placeholder="Enter business address..."><?= htmlspecialchars($address) ?></textarea>

                                        </div>

                                    </div>

                                </div>


                                <!-- ================================= -->
                                <!-- SOCIAL MEDIA -->
                                <!-- ================================= -->

                                <div class="mb-5">

                                    <h6 class="mb-4">
                                        Social Media Links
                                    </h6>

                                    <div class="row">


                                        <!-- Facebook -->
                                        <div class="col-md-6 mb-4">

                                            <label for="facebook-url" class="form-label">
                                                Facebook URL
                                            </label>

                                            <input type="url" id="facebook-url" name="facebook_url" class="form-control"
                                                placeholder="https://facebook.com/clothsy"
                                                value="<?= htmlspecialchars($facebookUrl) ?>">

                                        </div>


                                        <!-- Instagram -->
                                        <div class="col-md-6 mb-4">

                                            <label for="instagram-url" class="form-label">
                                                Instagram URL
                                            </label>

                                            <input type="url" id="instagram-url" name="instagram_url"
                                                class="form-control" placeholder="https://instagram.com/clothsy"
                                                value="<?= htmlspecialchars($instagramUrl) ?>">

                                        </div>


                                        <!-- Twitter -->
                                        <div class="col-md-6 mb-4">

                                            <label for="twitter-url" class="form-label">
                                                Twitter URL
                                            </label>

                                            <input type="url" id="twitter-url" name="twitter_url" class="form-control"
                                                placeholder="https://twitter.com/clothsy"
                                                value="<?= htmlspecialchars($twitterUrl) ?>">

                                        </div>


                                        <!-- YouTube -->
                                        <div class="col-md-6 mb-4">

                                            <label for="youtube-url" class="form-label">
                                                YouTube URL
                                            </label>

                                            <input type="url" id="youtube-url" name="youtube_url" class="form-control"
                                                placeholder="https://youtube.com/@clothsy"
                                                value="<?= htmlspecialchars($youtubeUrl) ?>">

                                        </div>


                                        <!-- LinkedIn -->
                                        <div class="col-md-6 mb-4">

                                            <label for="linkedin-url" class="form-label">
                                                LinkedIn URL
                                            </label>

                                            <input type="url" id="linkedin-url" name="linkedin_url" class="form-control"
                                                placeholder="https://linkedin.com/company/clothsy"
                                                value="<?= htmlspecialchars($linkedinUrl) ?>">

                                        </div>

                                        <div class="col-md-6 mb-4">

                                            <label for="primary-color" class="form-label">
                                                Primary Color
                                            </label>

                                            <div class="d-flex align-items-center gap-2">

                                                <input type="color" id="primary-color" name="primary_color"
                                                    class="form-control form-control-color"
                                                    value="<?= htmlspecialchars($primaryColor) ?>"
                                                    title="Choose primary color">

                                                <input type="text" class="form-control"
                                                    value="<?= htmlspecialchars($primaryColor) ?>" readonly>

                                            </div>

                                            <small class="text-muted">
                                                Select the primary color for your website.
                                            </small>

                                        </div>


                                    </div>

                                </div>


                                <!-- ================================= -->
                                <!-- FOOTER -->
                                <!-- ================================= -->

                                <div class="mb-5">

                                    <h6 class="mb-4">
                                        Footer Settings
                                    </h6>


                                    <div class="row">

                                        <div class="col-12 mb-4">

                                            <label for="copyright-text" class="form-label">
                                                Copyright Text
                                            </label>

                                            <input type="text" id="copyright-text" name="copyright_text"
                                                class="form-control" placeholder="© 2026 Clothsy. All Rights Reserved."
                                                value="<?= htmlspecialchars($copyrightText) ?>">

                                        </div>

                                    </div>

                                </div>


                                <!-- ================================= -->
                                <!-- BUTTON -->
                                <!-- ================================= -->

                                <div class="d-flex gap-2">

                                    <button type="submit" name="save_settings" class="btn btn-primary">

                                        <i class="icon-base bx bx-save me-1"></i>

                                        Save Settings

                                    </button>


                                    <button type="reset" class="btn btn-label-danger">

                                        Reset

                                    </button>

                                </div>


                            </form>

                        </div>

                    </div>


                </div>

                <div class="content-backdrop fade"></div>

            </div>

        </div>

    </div>

</main>


<?php include('./components/dash_footer.php'); ?>