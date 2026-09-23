<!-- dashboard head tag code or body start tag -->
<?php
$pageTitle = "Dashboard";
include('./components/head_html.php');
?>

<main class="main_page layout-wrapper layout-content-navbar">
    <div class="layout_container layout-container">
        <?php include('./components/sidebar.php'); ?>
        <div class="main_content_container layout-page">
            <?php include('./components/nav_bar.php') ?>


            <!-- dashboard content container -->
            <div class="content-wrapper">
                <!-- Content -->
                <div class="container-xxl flex-grow-1 container-p-y">

                    <div class="row">
                        <div class="col-md-12 col-xxl-4 mb-6">
                            <div class="card h-100">
                                <div class="d-flex align-items-end row">
                                    <div class="col-7">
                                        <div class="card-body">
                                            <h5 class="card-title mb-1 text-nowrap">Congratulations
                                                <?php echo $_SESSION['user_name']; ?>! 🎉
                                            </h5>
                                            <p class="card-subtitle text-nowrap mb-3">Best seller of the month</p>

                                            <h5 class="card-title text-primary mb-0">₹48.9k</h5>
                                            <p class="mb-3">78% of target 🚀</p>

                                            <a href="javascript:;" class="btn btn-sm btn-primary mb-1">View
                                                sales</a>
                                        </div>
                                    </div>
                                    <div class="col-5">
                                        <div class="card-body pb-0 text-end">
                                            <img src="./components/img/prize-light.png" width="91" height="144"
                                                class="rounded-start" alt="View Sales">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- New visitors & activity -->
                        <div class="col-xxl-8 mb-6">
                            <div class="card h-100">
                                <div class="card-body row g-4 p-0">
                                    <div class="col-md-6 card-separator">
                                        <div class="p-6">
                                            <div class="card-title d-flex align-items-start justify-content-between">
                                                <h5 class="mb-0">New Visitors</h5>
                                                <small>Last Week</small>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <div class="mt-auto">
                                                    <h3 class="mb-1">23%</h3>
                                                    <small class="text-danger text-nowrap fw-medium"><i
                                                            class="icon-base bx bx-down-arrow-alt"></i> -13.24%</small>
                                                </div>
                                                <div id="visitorsChart" class="" style="min-height: 120px;">
                                                    <div id="weeklyChart" style="width:200px;height:100px"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="p-6">
                                            <div class="card-title d-flex align-items-start justify-content-between">
                                                <h5 class="mb-0">Activity</h5>
                                                <small>Last Week</small>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <div class="mt-auto">
                                                    <h3 class="mb-1">82%</h3>
                                                    <small class="text-success text-nowrap fw-medium"><i
                                                            class="icon-base bx bx-up-arrow-alt"></i> 24.8%</small>
                                                </div>
                                                <div id="activityChart"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- sales and profit and expenses section -->
                        <div class="col-lg-12 col-xxl-4">
                            <div class="row">
                                <div class="col-xxl-6 col-md-3 col-sm-6 col-12 mb-6">
                                    <div class="card h-100">
                                        <div class="card-body">
                                            <div
                                                class="card-title d-flex align-items-start justify-content-between mb-4">
                                                <div class="avatar flex-shrink-0 w-px-40 h-px-40">
                                                    <img src="./components/img/wallet-info.png" alt="wallet info"
                                                        class="rounded">
                                                </div>
                                                <div class="dropdown">
                                                    <button class="btn p-0" type="button" id="cardOpt6"
                                                        data-bs-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <i
                                                            class="icon-base bx bx-dots-vertical-rounded text-body-secondary"></i>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end"
                                                        aria-labelledby="cardOpt6">
                                                        <a class="dropdown-item" href="javascript:void(0);">View
                                                            More</a>
                                                        <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="mb-1">Sales</p>
                                            <h4 class="card-title mb-3">₹4,679</h4>
                                            <small class="text-success fw-medium"><i
                                                    class="icon-base bx bx-up-arrow-alt"></i> +28.42%</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-md-3 col-sm-6 col-12 mb-6">
                                    <div class="card h-100">
                                        <div class="card-body pb-2">
                                            <span class="d-block fw-medium mb-1">Profit</span>
                                            <h4 class="card-title mb-0">624k</h4>
                                            <div id="profitChart">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-md-3 col-sm-6 col-12 mb-6">
                                    <div class="card h-100">
                                        <div class="card-body pb-0">
                                            <span class="d-block fw-medium mb-1">Expenses</span>
                                        </div>
                                        <div id="expensesChart" class="mb-2" style="min-height: 69px;margin:0 auto;">

                                        </div>
                                        <div class="p-4 pt-2">
                                            <small class="d-block text-center">₹21k Expenses more than last
                                                month</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-md-3 col-sm-6 col-12 mb-6">
                                    <div class="card h-100">
                                        <div class="card-body">
                                            <div
                                                class="card-title d-flex align-items-start justify-content-between mb-4">
                                                <div class="avatar flex-shrink-0">
                                                    <img src="./components/img/cc-primary.png" alt="Credit Card"
                                                        class="rounded">
                                                </div>
                                                <div class="dropdown">
                                                    <button class="btn p-0" type="button" id="cardOpt1"
                                                        data-bs-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <i
                                                            class="icon-base bx bx-dots-vertical-rounded text-body-secondary"></i>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="cardOpt1">
                                                        <a class="dropdown-item" href="javascript:void(0);">View
                                                            More</a>
                                                        <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="mb-1">Transactions</p>
                                            <h4 class="card-title mb-3">₹14,857</h4>
                                            <small class="text-success fw-medium"><i
                                                    class="icon-base bx bx-up-arrow-alt"></i> +28.14%</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Total income -->
                        <div class="col-md-12 col-xxl-8 mb-6">
                            <div class="card h-100">
                                <div class="row row-bordered g-0">
                                    <div class="col-md-8">
                                        <div class="card-header d-flex justify-content-between">
                                            <div>
                                                <h5 class="card-title mb-1">Total Income</h5>
                                                <p class="card-subtitle">Yearly report overview</p>
                                            </div>
                                            <div class="dropdown">
                                                <button class="btn p-0" type="button" id="totalIncome"
                                                    data-bs-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <i
                                                        class="icon-base bx bx-dots-vertical-rounded icon-lg text-body-secondary"></i>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-end"
                                                    aria-labelledby="totalIncome" style="">
                                                    <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
                                                    <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                                                    <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div id="totalIncomeChart" style="min-height: 305px;" class="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card-header d-flex justify-content-between">
                                            <div>
                                                <h5 class="card-title mb-1">Report</h5>
                                                <p class="card-subtitle">Monthly Avg. $45.578k</p>
                                            </div>
                                            <div class="dropdown">
                                                <button class="btn p-0" type="button" id="totalReport"
                                                    data-bs-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <i
                                                        class="icon-base bx bx-dots-vertical-rounded icon-lg text-body-secondary"></i>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-end"
                                                    aria-labelledby="totalReport" style="">
                                                    <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
                                                    <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                                                    <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body pt-lg-6">
                                            <div class="report-list">
                                                <div class="report-list-item rounded-2 mb-4">
                                                    <div class="d-flex align-items-center">
                                                        <div class="report-list-icon shadow-xs me-4">
                                                            <img src="./components/img/paypal-icon.svg" width="22"
                                                                height="22" alt="Paypal">
                                                        </div>
                                                        <div
                                                            class="d-flex justify-content-between align-items-center w-100 flex-wrap gap-2">
                                                            <div class="d-flex flex-column">
                                                                <span>Income</span>
                                                                <h5 class="mb-0">$42,845</h5>
                                                            </div>
                                                            <small class="text-success">+2.34k</small>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="report-list-item rounded-2 mb-4">
                                                    <div class="d-flex align-items-center">
                                                        <div class="report-list-icon shadow-xs me-4">
                                                            <img src="./components/img/credit-card-icon.svg" width="22"
                                                                height="22" alt="Shopping Bag">
                                                        </div>
                                                        <div
                                                            class="d-flex justify-content-between align-items-center w-100 flex-wrap gap-2">
                                                            <div class="d-flex flex-column">
                                                                <span>Expense</span>
                                                                <h5 class="mb-0">$38,658</h5>
                                                            </div>
                                                            <small class="text-danger">-1.15k</small>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="report-list-item rounded-2">
                                                    <div class="d-flex align-items-center">
                                                        <div class="report-list-icon shadow-xs me-4">
                                                            <img src="./components/img/wallet-icon.svg" width="22"
                                                                height="22" alt="Wallet">
                                                        </div>
                                                        <div
                                                            class="d-flex justify-content-between align-items-center w-100 flex-wrap gap-2">
                                                            <div class="d-flex flex-column">
                                                                <span>Profit</span>
                                                                <h5 class="mb-0">$18,220</h5>
                                                            </div>
                                                            <small class="text-success">+1.35k</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/ Total Income -->
                        </div>

                        <div class="content-backdrop fade"></div>
                    </div>
                    <div class="row">
                        <!-- performance  -->
                        <div class="col-md-6 col-xxl-4 mb-6">
                            <div class="card h-100">
                                <div class="card-header d-flex align-items-center justify-content-between">
                                    <h5 class="card-title m-0 me-2">Performance</h5>
                                    <div class="dropdown">
                                        <button class="btn p-0" type="button" id="performanceId"
                                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i
                                                class="icon-base bx bx-dots-vertical-rounded icon-lg text-body-secondary"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="performanceId">
                                            <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
                                            <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                                            <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row justify-content-between mb-5">
                                        <div class="col-6">
                                            <p class="mb-0">Earnings: $846.17</p>
                                        </div>
                                        <div class="col-6">
                                            <p class="mb-0 text-end">Sales: 25.7M</p>
                                        </div>
                                    </div>
                                    <div id="performanceChart"></div>
                                </div>
                            </div>
                        </div>

                        <!-- conversion rate  -->
                        <div class="col-md-6 col-xxl-4 mb-6">
                            <div class="card h-100">
                                <div class="card-header d-flex justify-content-between">
                                    <div class="card-title mb-0">
                                        <h5 class="mb-1 me-2">Conversion Rate</h5>
                                        <p class="card-subtitle">Compared To Last Month</p>
                                    </div>
                                    <div class="dropdown">
                                        <button class="btn text-body-secondary p-0" type="button" id="conversionRate"
                                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="icon-base bx bx-dots-vertical-rounded icon-lg"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="conversionRate">
                                            <a class="dropdown-item" href="javascript:void(0);">Select All</a>
                                            <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                                            <a class="dropdown-item" href="javascript:void(0);">Share</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body pt-4">
                                    <div class="d-flex justify-content-between align-items-center mb-6">
                                        <div class="d-flex flex-row align-items-center gap-2">
                                            <h3 class="mb-0">8.72%</h3>
                                            <small class="text-success">
                                                <i class="icon-base bx bx-chevron-up icon-lg"></i>
                                                4.8%
                                            </small>
                                        </div>
                                        <div id="conversionRateChart">
                                        </div>
                                    </div>
                                    <ul class="p-0 m-0">
                                        <li class="d-flex mb-6">
                                            <div class="d-flex w-100 flex-wrap justify-content-between gap-2">
                                                <div class="me-2">
                                                    <h6 class="mb-0 fw-normal">Impressions</h6>
                                                    <small>12.4k Visits</small>
                                                </div>
                                                <div class="user-progress"><i
                                                        class="icon-base bx icon-lg bx-up-arrow-alt text-success me-2"></i>
                                                    <span>12.8%</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="d-flex mb-6">
                                            <div class="d-flex w-100 flex-wrap justify-content-between gap-2">
                                                <div class="me-2">
                                                    <h6 class="mb-0 fw-normal">Added To Cart</h6>
                                                    <small>32 Product in cart</small>
                                                </div>
                                                <div class="user-progress"><i
                                                        class="icon-base bx icon-lg bx-down-arrow-alt text-danger me-2"></i>
                                                    <span>- 8.5% </span>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="d-flex mb-6">
                                            <div class="d-flex w-100 flex-wrap justify-content-between gap-2">
                                                <div class="me-2">
                                                    <h6 class="mb-0 fw-normal">Checkout</h6>
                                                    <small>21 Products checkout</small>
                                                </div>
                                                <div class="user-progress"><i
                                                        class="icon-base bx icon-lg bx-up-arrow-alt text-success me-2"></i>
                                                    <span>9.12%</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="d-flex">
                                            <div class="d-flex w-100 flex-wrap justify-content-between gap-2">
                                                <div class="me-2">
                                                    <h6 class="mb-0 fw-normal">Purchased</h6>
                                                    <small>12 Orders</small>
                                                </div>
                                                <div class="user-progress"><i
                                                        class="icon-base bx icon-lg bx-up-arrow-alt text-success me-2"></i>
                                                    <span>2.83%</span>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- total balance -->
                        <div class="col-md-6 col-xxl-4 mb-6">
                            <div class="card h-100">
                                <div class="card-header d-flex align-items-center justify-content-between">
                                    <h5 class="card-title m-0 me-2">Total Balance</h5>
                                    <div class="dropdown">
                                        <button class="btn p-0" type="button" id="totalBalance"
                                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i
                                                class="icon-base bx bx-dots-vertical-rounded icon-lg text-body-secondary"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="totalBalance">
                                            <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
                                            <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                                            <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body pb-0">
                                    <div class="row">
                                        <div class="col d-flex">
                                            <div class="me-3">
                                                <span class="badge rounded-2 bg-label-warning p-2"><i
                                                        class="icon-base bx bx-wallet icon-lg text-warning"></i></span>
                                            </div>
                                            <div>
                                                <h6 class="mb-0">$2.54k</h6>
                                                <small>Wallet</small>
                                            </div>
                                        </div>
                                        <div class="col d-flex">
                                            <div class="me-3">
                                                <span class="badge rounded-2 bg-label-secondary p-2"><i
                                                        class="icon-base bx bx-dollar icon-lg text-secondary"></i></span>
                                            </div>
                                            <div>
                                                <h6 class="mb-0">$4.2k</h6>
                                                <small>Paypal</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="totalBalanceChart"></div>
                                </div>
                                <hr class="m-0">
                                <div class="card-footer">
                                    <div class="d-flex justify-content-between">
                                        <small class="text-body">You have done 57.6% more sales.<br>Check your new badge
                                            in your profile.</small>
                                        <div>
                                            <span class="badge bg-label-warning rounded-2 p-2"><i
                                                    class="icon-base bx bx-chevron-right icon-md text-warning"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- customers table -->

                        <div class="col-lg-7 col-xxl-8 mb-6 mb-lg-0">
                            <div class="card">
                                <div class="table-responsive text-nowrap">
                                    <table class="datatables-customers table border-top dataTable dtr-column"
                                        id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info"
                                        style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th data-dt-column="0" class="control dt-orderable-none dtr-hidden"
                                                    rowspan="1" colspan="1" aria-label="" style="display: none;">
                                                    <span class="dt-column-title"></span><span
                                                        class="dt-column-order"></span>
                                                </th>

                                                <!-- Customer ID -->
                                                <th class="text-nowrap dt-orderable-asc dt-orderable-desc text-center"
                                                    data-dt-column="3" rowspan="1" colspan="1"
                                                    aria-label="ID: Activate to sort" tabindex="0">
                                                    <span class="dt-column-title" role="button">ID</span>
                                                    <span class="dt-column-order"></span>
                                                </th>

                                                <!-- Customer Name -->
                                                <th data-dt-column="2" rowspan="1" colspan="1"
                                                    class="dt-orderable-asc dt-orderable-desc"
                                                    aria-label="User: Activate to sort" tabindex="0">
                                                    <span class="dt-column-title" role="button">Customer</span>
                                                    <span class="dt-column-order"></span>
                                                </th>


                                                <!-- Created At (replacing Total Spent) -->
                                                <th class="text-nowrap dt-orderable-asc dt-orderable-desc dt-type-numeric"
                                                    data-dt-column="6" rowspan="1" colspan="1"
                                                    aria-label="Created At: Activate to sort" tabindex="0">
                                                    <span class="dt-column-title" role="button">Phone Number</span>
                                                    <span class="dt-column-order"></span>
                                                </th>

                                                <!-- state -->
                                                <th class="text-nowrap dt-orderable-asc dt-orderable-desc dt-type-numeric"
                                                    data-dt-column="6" rowspan="1" colspan="1"
                                                    aria-label="Created At: Activate to sort" tabindex="0">
                                                    <span class="dt-column-title" role="button">State</span>
                                                    <span class="dt-column-order"></span>
                                                </th>

                                                <!-- pin code -->
                                                <th class="text-nowrap dt-orderable-asc dt-orderable-desc dt-type-numeric"
                                                    data-dt-column="6" rowspan="1" colspan="1"
                                                    aria-label="Created At: Activate to sort" tabindex="0">
                                                    <span class="dt-column-title" role="button">PIN Code</span>
                                                    <span class="dt-column-order"></span>
                                                </th>

                                            
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            include '.././database/connection.php';

                                            $sql = "SELECT * FROM users ORDER BY id ASC LIMIT 5";
                                            $result = mysqli_query($conn, $sql);

                                            while ($row = mysqli_fetch_assoc($result)) {

                                                // safe initials (prevents error if empty)
                                                $first = $row['first_name'] ?? '';
                                                $last = $row['last_name'] ?? '';
                                                $phone = $row['Phone_no'] ?? '';
                                                $Address = $row['Address'] ?? '';

                                                $initials = strtoupper(substr($first, 0, 1) . substr($last, 0, 1));

                                                $agreeStatus = ($row['agree'] == 1) ? "Yes" : "No";
                                                ?>

                                                <tr>

                                                    <td class="control dtr-hidden" tabindex="0" style="display: none;">
                                                    </td>

                                                    <!-- Checkbox
                                                                <td class="dt-select">
                                                                    <input aria-label="Select row" class="form-check-input"
                                                                        type="checkbox">
                                                                </td> -->


                                                    <!-- Customer ID -->
                                                    <td style="text-align:center;">
                                                        <span class="text-heading">#
                                                            <?= $row['id'] ?>
                                                        </span>
                                                    </td>

                                                    <!-- Customer -->
                                                    <td class="sorting_1">
                                                        <div
                                                            class="d-flex justify-content-start align-items-center customer-name">

                                                            <div class="avatar-wrapper">
                                                                <div class="avatar avatar-sm me-3">
                                                                    <span
                                                                        class="avatar-initial rounded-circle bg-label-primary">
                                                                        <?= $initials ?>
                                                                    </span>
                                                                </div>
                                                            </div>

                                                            <div class="d-flex flex-column">
                                                                <a href="#" class="text-heading">
                                                                    <span class="fw-medium">
                                                                        <?= $row['first_name'] . " " . $row['last_name'] ?>
                                                                    </span>
                                                                </a>
                                                                <small>
                                                                    <?= $row['email_add'] ?>
                                                                </small>
                                                            </div>

                                                        </div>
                                                    </td>


                                                    <!-- Phone No -->
                                                    <td class="dt-type-numeric">
                                                        <span class="fw-medium text-heading">
                                                            <?= $row['Phone_no'] ?>
                                                        </span>
                                                    </td>
                                                    <!-- State -->
                                                    <td class="dt-type-numeric">
                                                        <span class="fw-medium text-heading">
                                                            <?= $row['state'] ?>
                                                        </span>
                                                    </td>
                                                    <!-- PIN Code -->
                                                    <td class="dt-type-numeric">
                                                        <span class="fw-medium text-heading">
                                                            <?= $row['pin'] ?>
                                                        </span>
                                                    </td>

                                                    


                                                </tr>

                                            <?php } ?>

                                        </tbody>
                                        <tfoot></tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>



                    </div>
                </div>
            </div>
</main>
<?php include('./components/dash_footer.php') ?>