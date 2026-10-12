<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme" data-bg-class="bg-menu-theme">
  <div class="app-brand demo">
    <a href="#" class="foot_logo display-2 text-dark">
      <img src="<?= htmlspecialchars($siteLogo) ?>" alt="Clothsy Logo" width="150px">
    </a>
    <a href="/home" class="layout-menu-toggle menu-link text-large ms-auto">
      <i class="bx bx-chevron-left d-block d-xl-none align-middle"></i>
    </a>
  </div>

  <div class="menu-divider mt-0"></div>

  <div class="menu-inner-shadow"></div>

  <ul class="menu-inner py-1 ps ps--active-y">
    <!-- Dashboards -->
    <!-- <li class="menu-item active open" style="">
              <a href="./index.php" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-home-smile"></i>
                <div class="text-truncate" data-i18n="Dashboards">Dashboards</div>
                <span class="badge rounded-pill bg-danger ms-auto">5</span>
              </a>
              <ul class="menu-sub">
                <li class="menu-item active">
                  <a href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/html/vertical-menu-template/app-ecommerce-dashboard.html" target="_blank" class="menu-link">
                    <div class="text-truncate" data-i18n="eCommerce">eCommerce</div>
                  </a>
                </li>
              </ul>
            </li> -->

    <?php
    $currentPage = basename($_SERVER['REQUEST_URI']);
    ?>

    <li class="menu-item <?php echo ($currentPage == 'index.php') ? 'active open' : ''; ?>">
      <a href="./index.php" class="menu-link">
        <i class="menu-icon tf-icons bx bx-home-smile"></i>
        <div>Dashboard</div>
      </a>
    </li>


    <li class="menu-item <?php echo ($currentPage == 'customers.php') ? 'active open' : ''; ?>">
      <a href="./customers.php" class="menu-link">
        <i class="menu-icon tf-icons bx bx-user"></i>
        <div>Customers</div>
      </a>
    </li>
    <li class="menu-item <?php echo ($currentPage == 'product.php') ? 'active open' : ''; ?>">
      <a href="./product.php" class="menu-link">
        <i class="menu-icon tf-icons bx bx-box"></i>
        <div>Products</div>
      </a>
    </li>
    <li class="menu-item <?php echo ($currentPage == 'ecommerce.php') ? 'active open' : ''; ?>">
      <a href="./ecommerce.php" class="menu-link">
        <i class="menu-icon tf-icons bx bx-cart"></i>
        <div>Order</div>
      </a>
    </li>
    <li class="menu-item <?php echo ($currentPage == 'ecommerce.php') ? 'active open' : ''; ?>">
      <a href="./ecommerce.php" class="menu-link">
        <i class="menu-icon tf-icons bx bx-cog"></i>
        <div>Settings</div>
      </a>
    </li>


    <!-- Website Details -->
    <li class="menu-header small text-uppercase"><span class="menu-header-text">Website Details</span></li>
    <li class="menu-item <?php echo ($currentPage == 'site-setting.php') ? 'active open' : ''; ?>">
      <a href="./site-setting.php" target="_blank" class="menu-link">
        <i class="menu-icon tf-icons bx bx-layout"></i>
        <div class="text-truncate" data-i18n="setting">Site Setting</div>
      </a>
    </li>
    <!-- Misc -->
    <li class="menu-header small text-uppercase"><span class="menu-header-text">Misc</span></li>
    <li class="menu-item">
      <a href="https://github.com/themeselection/sneat-bootstrap-html-admin-template-free/issues" target="_blank"
        class="menu-link">
        <i class="menu-icon tf-icons bx bx-support"></i>
        <div class="text-truncate" data-i18n="Support">Support</div>
      </a>
    </li>
    <li class="menu-item">
      <a href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/documentation/" target="_blank"
        class="menu-link">
        <i class="menu-icon tf-icons bx bx-file"></i>
        <div class="text-truncate" data-i18n="Documentation">Documentation</div>
      </a>
    </li>
  </ul>
</aside>