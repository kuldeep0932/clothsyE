<?php
session_start();
$isLoggedIn = isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;

include './../database/connection.php';

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

$copyrightText = $row['copyright_text'] ?? '';

$primaryColor = $row['primary_color'] ?? '#ef2d19';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle ?? 'Default Title'; ?></title>



    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />
  <link
    href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Source+Sans+3:ital,wght@0,200..900;1,200..900&family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap"
    rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/5.3.5/apexcharts-legend.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/5.3.5/apexcharts.min.css"/>
    <link rel="stylesheet" href="./components/dashboard.css">
    <style>
      :root{
         --bs-primary: <?= htmlspecialchars($primaryColor) ?>;
      }
    </style>
      <!-- ApexCharts CDN -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
</head>

<body>
