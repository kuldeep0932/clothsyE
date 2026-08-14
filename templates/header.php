<?php 
  $pageTitle = "Home - Clothsy";
  $pageDescription = "Welcome to the homepage of My Website. Discover amazing content.";
  $pageKeywords = "home, my website, awesome content";
  session_start();
$isLoggedIn = isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?php echo $pageTitle ?? 'Default Title'; ?></title>
  <meta name="description" content="<?php echo $pageDescription ?? 'Default description here'; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords ?? 'default, keywords, here'; ?>">

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Source+Sans+3:ital,wght@0,200..900;1,200..900&family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap"
    rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
  <link rel="stylesheet" href="./assets/css/style.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
</head>

<body>
  <!-- header section start -->
  <!-- <section class="header_section">
      <div class="header-top_section"></div>
    </section> -->
  <header class="main_header">
    <div class="container">
      <div class="d-flex align-items-center flex-wrap justify-content-between">
        <a href="#" class="logo">Clothsy</a>
        <nav class="main_navigation d-flex align-items-center">
          <div class="overlay_menu"></div>
          <ul class="navigation_links list-unstyled">
            <li><a href="./index.php">Home</a></li>
            <li><a href="./shop.php">Shop</a></li>
            <li><a href="#">Collection</a></li>
            <li><a href="#">About Us</a></li>
            <li><a href="#">Contact Us</a></li>
          </ul>
          <ul class="icon_lists list-unstyled">
            <li class="d-md-none menu_togg_btn">
              <a href="#"><i class="fa-solid fa-bars-staggered menuTogg_main_btn"></i></a>
            </li>
            <li>
              <a href="#"><i class="fa-brands fa-instagram"></i></a>
            </li>
            <li>
              <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
            </li>
            <li>
              <a href="#"><i class="fa-solid fa-cart-shopping"></i></a>
            </li>
            
            
            <?php if($isLoggedIn): ?>
              <li>
                <a href="#" style="display:flex;align-items:center;gap:10px;"><i class="fa-solid fa-user" ></i><?php echo $_SESSION['user_name']; ?></a>

                <ul>
                  <li>
                    <a href="#"><i class="fa-regular fa-circle-user"></i> My Profile</a>
                  </li>
                  <li>
                    <a href="#"><i class="fa-solid fa-gauge"></i> Dashboard</a>
                  </li>
                  <li>
                    <a href="#"><i class="fa-solid fa-gear"></i> Settings</a>
                  </li>
                  <li>
                    <a href="<?php echo('./validations/logout.php') ?>"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</a>
                  </li>
                </ul>
              </li>
          <?php else: ?>
            <li>
              <a href="<?php echo('./register.php') ?>"><i class="fa-solid fa-user"></i></a>
            </li>
           <?php endif; ?>
          </ul>
        </nav>
      </div>
    </div>
  </header>
  <!-- header section end -->
