<?php

include '../database/connection.php';

// Check if form was submitted
if (isset($_POST['save_settings'])) {

    // Get form data
    $siteName = $_POST['site_name'];
    $aboutText = $_POST['about_text'];

    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $facebookUrl = $_POST['facebook_url'];
    $instagramUrl = $_POST['instagram_url'];
    $twitterUrl = $_POST['twitter_url'];
    $youtubeUrl = $_POST['youtube_url'];
    $linkedinUrl = $_POST['linkedin_url'];

    $primaryColor = $_POST['primary_color'];

    $copyrightText = $_POST['copyright_text'];

    // Get existing logo from database
    $logoSql = "SELECT site_logo FROM site_settings WHERE id = 1 LIMIT 1";
    $logoResult = mysqli_query($conn, $logoSql);

    if (!$logoResult) {
        die("Failed to fetch existing logo: " . mysqli_error($conn));
    }

    $logoRow = mysqli_fetch_assoc($logoResult);
    $siteLogo = $logoRow['site_logo'] ?? '';

    // Handle logo upload
    if (
        isset($_FILES['site_logo']) &&
        $_FILES['site_logo']['error'] !== UPLOAD_ERR_NO_FILE
    ) {

        if ($_FILES['site_logo']['error'] !== UPLOAD_ERR_OK) {
            die("Logo upload failed. Please try again.");
        }

        // Check file size (maximum 2 MB)
        if ($_FILES['site_logo']['size'] > 2 * 1024 * 1024) {
            die("Logo size must not exceed 2 MB.");
        }

        // Validate that the uploaded file is an image
        $imageInfo = getimagesize($_FILES['site_logo']['tmp_name']);

        if ($imageInfo === false) {
            die("Please upload a valid image.");
        }

        // Allow only specific image formats
        $allowedTypes = [
            'image/jpeg' => 'jpg',
            'image/png'  => 'png',
            'image/webp' => 'webp',
            'image/gif'  => 'gif'
        ];

        $mimeType = $imageInfo['mime'];

        if (!isset($allowedTypes[$mimeType])) {
            die("Only JPG, PNG, WEBP, and GIF images are allowed.");
        }

        // Upload directory
        // This assumes the project has a root-level uploads folder
        // alongside the dashboard and validations folders.
        $uploadDir = dirname(__DIR__) . '/uploads/site/';

        if (
            !is_dir($uploadDir) &&
            !mkdir($uploadDir, 0755, true)
        ) {
            die("Unable to create the logo upload directory.");
        }

        if (!is_writable($uploadDir)) {
            die("The logo upload directory is not writable.");
        }

        // Generate a unique filename
        $fileName = 'site_logo_' . bin2hex(random_bytes(8))
                  . '.' . $allowedTypes[$mimeType];

        $targetPath = $uploadDir . $fileName;

        // Move uploaded file to the upload directory
        if (!move_uploaded_file(
            $_FILES['site_logo']['tmp_name'],
            $targetPath
        )) {
            die("Unable to save the uploaded logo.");
        }

        // Store the relative path in the database
        $siteLogo = 'uploads/site/' . $fileName;
    }

    // Update database, including the logo path
    $stmt = mysqli_prepare($conn, "UPDATE site_settings SET
        site_name = ?,
        site_logo = ?,
        about_text = ?,
        email = ?,
        phone = ?,
        address = ?,
        facebook_url = ?,
        instagram_url = ?,
        twitter_url = ?,
        youtube_url = ?,
        linkedin_url = ?,
        primary_color = ?,
        copyright_text = ?
        WHERE id = 1");

    if (!$stmt) {
        die("Database prepare failed: " . mysqli_error($conn));
    }

    mysqli_stmt_bind_param(
        $stmt,
        "sssssssssssss",
        $siteName,
        $siteLogo,
        $aboutText,
        $email,
        $phone,
        $address,
        $facebookUrl,
        $instagramUrl,
        $twitterUrl,
        $youtubeUrl,
        $linkedinUrl,
        $primaryColor,
        $copyrightText
    );

    $result = mysqli_stmt_execute($stmt);

    if ($result) {

        mysqli_stmt_close($stmt);

        header("Location: ../dashboard/site-setting.php");
        exit;

    } else {

        echo "Database update failed: " . mysqli_stmt_error($stmt);
        mysqli_stmt_close($stmt);
    }
}
?>
