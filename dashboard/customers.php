<!-- dashboard head tag code or body start tag -->
<?php
$pageTitle = "Customers";
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

                    <!-- customers List Table -->
                    <div class="card">
                        <div class="card-datatable table-responsive">
                            <div id="DataTables_Table_0_wrapper" class="dt-container dt-bootstrap5 dt-empty-footer">
                                <div class="row m-3 my-0 justify-content-between">
                                    <div
                                        class="d-md-flex justify-content-between align-items-center dt-layout-start col-md-auto me-auto mt-0">
                                        <div class="dt-search"><input type="search" class="form-control ms-0"
                                                id="dt-search-0" placeholder="Search Order"
                                                aria-controls="DataTables_Table_0">
                                        </div>
                                    </div>
                                    <div
                                        class="d-md-flex justify-content-between align-items-center dt-layout-end col-md-auto ms-auto gap-2 mt-0 mb-md-0 mb-4">
                                        <div class="dt-length mt-0 mt-md-6"><select name="DataTables_Table_0_length"
                                                aria-controls="DataTables_Table_0" class="form-select" id="dt-length-0">
                                                <option value="10">10</option>
                                                <option value="25">25</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                            </select><label for="dt-length-0"></label></div>
                                        <div class="dt-buttons btn-group flex-wrap gap-4">
                                            <div class="btn-group"><button class="btn create-new btn-primary"
                                                    tabindex="0" aria-controls="DataTables_Table_0" type="button"
                                                    data-bs-toggle="offcanvas"
                                                    data-bs-target="#offcanvasEcommerceCustomerAdd"><span><span
                                                            class="d-flex align-items-center gap-2"><i
                                                                class="icon-base bx bx-plus icon-sm"></i> <span
                                                                class="d-none d-sm-inline-block">Add
                                                                Customer</span></span></span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="justify-content-between dt-layout-table">
                                    <div
                                        class="d-md-flex justify-content-between align-items-center dt-layout-full table-responsive">
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

                                                    <!-- Created At (replacing Total Spent) -->
                                                    <th class="text-nowrap dt-orderable-asc dt-orderable-desc dt-type-numeric"
                                                        data-dt-column="6" rowspan="1" colspan="1"
                                                        aria-label="Created At: Activate to sort" tabindex="0">
                                                        <span class="dt-column-title" role="button">Address</span>
                                                        <span class="dt-column-order"></span>
                                                    </th>

                                                    <!-- city -->
                                                    <th class="text-nowrap dt-orderable-asc dt-orderable-desc dt-type-numeric"
                                                        data-dt-column="6" rowspan="1" colspan="1"
                                                        aria-label="Created At: Activate to sort" tabindex="0">
                                                        <span class="dt-column-title" role="button">City</span>
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
                                                    
                                                    <!-- Actions -->
                                                    <th class="text-nowrap dt-orderable-asc dt-orderable-desc dt-type-numeric"
                                                        data-dt-column="6" rowspan="1" colspan="1"
                                                        aria-label="Created At: Activate to sort" tabindex="0">
                                                        <span class="dt-column-title" role="button">Action</span>
                                                        <span class="dt-column-order"></span>
                                                    </th>


                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                include '.././database/connection.php';

                                                $sql = "SELECT * FROM users ORDER BY id ASC";
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

                                                        <!-- Address -->
                                                        <td class="dt-type-numeric">
                                                            <span class="fw-medium text-heading">
                                                                <?= $row['Address'] ?>
                                                            </span>
                                                        </td>
                                                        <!-- City -->
                                                        <td class="dt-type-numeric">
                                                            <span class="fw-medium text-heading">
                                                                <?= $row['city'] ?>
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
                                                         <!-- action button -->
                                                        <td>
                                                            <button class="btn btn-icon" data-bs-toggle="offcanvas"
                                                                data-bs-target="#offcanvasEcommerceCustomerEdit"
                                                                onclick="editCustomer(<?= $row['id'] ?>)"
                                                                title="Edit Customer"><i
                                                                    class="icon-base bx bx-edit icon-md"></i></button>
                                                            <button class="btn btn-icon"
                                                                onclick="deleteCustomer(<?= $row['id'] ?>)"
                                                                title="Delete Customer"><i
                                                                    class="icon-base bx bx-trash icon-md"></i></button>

                                                        </td>

                                                    </tr>

                                                <?php } ?>

                                            </tbody>
                                            <tfoot></tfoot>
                                        </table>
                                    </div>
                                </div>
                                <div class="row mx-3 justify-content-between">
                                    <div
                                        class="d-md-flex justify-content-between align-items-center dt-layout-start col-md-auto me-auto mt-0">
                                        <div class="dt-info" aria-live="polite" id="DataTables_Table_0_info"
                                            role="status">Showing 1 to 10 of 100 entries</div>
                                    </div>
                                    <div
                                        class="d-md-flex justify-content-between align-items-center dt-layout-end col-md-auto ms-auto gap-2 mt-0 mb-md-0 mb-4">
                                        <div class="dt-paging">
                                            <nav aria-label="pagination">
                                                <ul class="pagination">
                                                    <li class="dt-paging-button page-item disabled"><button
                                                            class="page-link previous" role="link" type="button"
                                                            aria-controls="DataTables_Table_0" aria-disabled="true"
                                                            aria-label="Previous" data-dt-idx="previous"
                                                            tabindex="-1"><i
                                                                class="icon-base bx bx-chevron-left scaleX-n1-rtl icon-18px"></i></button>
                                                    </li>
                                                    <li class="dt-paging-button page-item active"><button
                                                            class="page-link" role="link" type="button"
                                                            aria-controls="DataTables_Table_0" aria-current="page"
                                                            data-dt-idx="0">1</button></li>
                                                    <li class="dt-paging-button page-item"><button class="page-link"
                                                            role="link" type="button" aria-controls="DataTables_Table_0"
                                                            data-dt-idx="1">2</button></li>
                                                    <li class="dt-paging-button page-item"><button class="page-link"
                                                            role="link" type="button" aria-controls="DataTables_Table_0"
                                                            data-dt-idx="2">3</button></li>
                                                    <li class="dt-paging-button page-item"><button class="page-link"
                                                            role="link" type="button" aria-controls="DataTables_Table_0"
                                                            data-dt-idx="3">4</button></li>
                                                    <li class="dt-paging-button page-item"><button class="page-link"
                                                            role="link" type="button" aria-controls="DataTables_Table_0"
                                                            data-dt-idx="4">5</button></li>
                                                    <li class="dt-paging-button page-item disabled"><button
                                                            class="page-link ellipsis" role="link" type="button"
                                                            aria-controls="DataTables_Table_0" aria-disabled="true"
                                                            data-dt-idx="ellipsis" tabindex="-1">…</button></li>
                                                    <li class="dt-paging-button page-item"><button class="page-link"
                                                            role="link" type="button" aria-controls="DataTables_Table_0"
                                                            data-dt-idx="9">10</button></li>
                                                    <li class="dt-paging-button page-item"><button
                                                            class="page-link next" role="link" type="button"
                                                            aria-controls="DataTables_Table_0" aria-label="Next"
                                                            data-dt-idx="next"><i
                                                                class="icon-base bx bx-chevron-right scaleX-n1-rtl icon-18px"></i></button>
                                                    </li>
                                                </ul>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Offcanvas to add new customer -->
                        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEcommerceCustomerAdd"
                            aria-labelledby="offcanvasEcommerceCustomerAddLabel">
                            <div class="offcanvas-header">
                                <h5 id="offcanvasEcommerceCustomerAddLabel" class="offcanvas-title">Add Customer
                                </h5>
                                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                                    aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body border-top mx-0 flex-grow-0">
                                <form id="eCommerceCustomerAddForm" class="pt-0">

                                    <!-- Basic Information -->
                                    <div class="mb-4">
                                        <h6 class="mb-4">Basic Information</h6>

                                        <div class="mb-4">
                                            <label for="customer-name" class="form-label">
                                                Name <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" id="customer-name" name="customerName"
                                                class="form-control" placeholder="John Doe">
                                        </div>

                                        <div class="mb-4">
                                            <label for="customer-email" class="form-label">
                                                Email <span class="text-danger">*</span>
                                            </label>
                                            <input type="email" id="customer-email" name="customerEmail"
                                                class="form-control" placeholder="john.doe@example.com">
                                        </div>

                                        <div>
                                            <label for="customer-contact" class="form-label">
                                                Mobile
                                            </label>
                                            <input type="tel" id="customer-contact" name="customerContact"
                                                class="form-control" placeholder="+(123) 456-7890">
                                        </div>
                                    </div>

                                    <!-- Shipping Information -->
                                    <!-- Shipping Information -->
                                    <div class="mb-4 pt-3">
                                        <h6 class="mb-4">Shipping Information</h6>

                                        <div class="mb-4">
                                            <label for="customer-address-1" class="form-label">
                                                Address
                                            </label>
                                            <input type="text" id="customer-address-1" name="customerAddress1"
                                                class="form-control" placeholder="House No., Street">
                                        </div>

                                        <div class="mb-4">
                                            <label for="customer-town" class="form-label">
                                                City
                                            </label>
                                            <input type="text" id="customer-town" name="customerTown"
                                                class="form-control" placeholder="Amritsar">
                                        </div>

                                        <div class="mb-4">
                                            <label for="customer-state" class="form-label">
                                                State
                                            </label>
                                            <input type="text" id="customer-state" name="customerState"
                                                class="form-control" placeholder="Punjab">
                                        </div>

                                        <div>
                                            <label for="customer-pincode" class="form-label">
                                                PIN Code
                                            </label>
                                            <input type="text" id="customer-pincode" name="pin" class="form-control"
                                                placeholder="143001" maxlength="6" inputmode="numeric">
                                        </div>
                                    </div>

                                    <!-- Billing Address -->
                                    <div class="d-flex align-items-center justify-content-between mb-4">
                                        <div>
                                            <h6 class="mb-1">Use as a billing address?</h6>
                                            <small class="text-muted">
                                                Use the shipping address as the billing address.
                                            </small>
                                        </div>

                                        <div class="form-check form-switch">
                                            <input type="checkbox" id="billing-address" name="useAsBillingAddress"
                                                class="form-check-input" checked>
                                        </div>
                                    </div>

                                    <!-- Actions -->
                                    <div class="d-flex gap-2">
                                        <button type="submit" class="btn btn-primary">
                                            Add
                                        </button>

                                        <button type="reset" class="btn btn-label-danger" data-bs-dismiss="offcanvas">
                                            Discard
                                        </button>
                                    </div>

                                </form>
                            </div>
                        </div>
                        <!-- Offcanvas to edit customer -->
                        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEcommerceCustomerEdit"
                            aria-labelledby="offcanvasEcommerceCustomerEditLabel">
                            <div class="offcanvas-header">
                                <h5 id="offcanvasEcommerceCustomerEditLabel" class="offcanvas-title">Edit Customer
                                </h5>
                                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                                    aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body border-top mx-0 flex-grow-0">
                                <form id="offcanvasEcommerceCustomerEditForm" class="pt-0">

                                    <!-- Basic Information -->
                                    <div class="mb-4">
                                        <h6 class="mb-4">Basic Information</h6>

                                        <div class="mb-4">
                                            <label for="customer-name" class="form-label">
                                                Name <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" id="customer-name" name="customerName"
                                                class="form-control" placeholder="John Doe">
                                        </div>

                                        <div class="mb-4">
                                            <label for="customer-email" class="form-label">
                                                Email <span class="text-danger">*</span>
                                            </label>
                                            <input type="email" id="customer-email" name="customerEmail"
                                                class="form-control" placeholder="john.doe@example.com">
                                        </div>

                                        <div>
                                            <label for="customer-contact" class="form-label">
                                                Mobile
                                            </label>
                                            <input type="tel" id="customer-contact" name="customerContact"
                                                class="form-control" placeholder="+(123) 456-7890">
                                        </div>
                                    </div>

                                    <!-- Shipping Information -->
                                    <!-- Shipping Information -->
                                    <div class="mb-4 pt-3">
                                        <h6 class="mb-4">Shipping Information</h6>

                                        <div class="mb-4">
                                            <label for="customer-address-1" class="form-label">
                                                Address
                                            </label>
                                            <input type="text" id="customer-address-1" name="customerAddress1"
                                                class="form-control" placeholder="House No., Street">
                                        </div>

                                        <div class="mb-4">
                                            <label for="customer-town" class="form-label">
                                                City
                                            </label>
                                            <input type="text" id="customer-town" name="customerTown"
                                                class="form-control" placeholder="Amritsar">
                                        </div>

                                        <div class="mb-4">
                                            <label for="customer-state" class="form-label">
                                                State
                                            </label>
                                            <input type="text" id="customer-state" name="customerState"
                                                class="form-control" placeholder="Punjab">
                                        </div>

                                        <div>
                                            <label for="customer-pincode" class="form-label">
                                                PIN Code
                                            </label>
                                            <input type="text" id="customer-pincode" name="pin" class="form-control"
                                                placeholder="143001" maxlength="6" inputmode="numeric">
                                        </div>
                                    </div>

                                    <!-- Billing Address -->
                                    <div class="d-flex align-items-center justify-content-between mb-4">
                                        <div>
                                            <h6 class="mb-1">Use as a billing address?</h6>
                                            <small class="text-muted">
                                                Use the shipping address as the billing address.
                                            </small>
                                        </div>

                                        <div class="form-check form-switch">
                                            <input type="checkbox" id="billing-address" name="useAsBillingAddress"
                                                class="form-check-input" checked>
                                        </div>
                                    </div>

                                    <!-- Actions -->
                                    <div class="d-flex gap-2">
                                        <button type="submit" class="btn btn-primary">
                                            Add
                                        </button>

                                        <button type="reset" class="btn btn-label-danger" data-bs-dismiss="offcanvas">
                                            Discard
                                        </button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- / Content -->



                <div class="content-backdrop fade"></div>
            </div>
        </div>
    </div>
</main>

<?php include('./components/dash_footer.php') ?>