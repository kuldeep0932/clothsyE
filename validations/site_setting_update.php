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


    // Update database
    $sql = "UPDATE site_settings SET

        site_name = '$siteName',
        about_text = '$aboutText',
        email = '$email',
        phone = '$phone',
        address = '$address',
        facebook_url = '$facebookUrl',
        instagram_url = '$instagramUrl',
        twitter_url = '$twitterUrl',
        youtube_url = '$youtubeUrl',
        linkedin_url = '$linkedinUrl',
        primary_color = '$primaryColor',
        copyright_text = '$copyrightText'
        
        WHERE id = 1";


    $result = mysqli_query($conn, $sql);


    // Check update
    if ($result) {

        header("Location: ../dashboard/site-setting.php");

        exit;

    } else {

        echo "Database update failed: " . mysqli_error($conn);

    }

}

?>
