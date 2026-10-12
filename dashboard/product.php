<!-- dashboard head tag code or body start tag -->
<?php

$pageTitle = "Products";

/*
|--------------------------------------------------------------------------
| DATABASE CONNECTION
|--------------------------------------------------------------------------
*/

include '.././database/connection.php';


/*
|--------------------------------------------------------------------------
| EDIT PRODUCT
|--------------------------------------------------------------------------
| If ?edit_id=5 is present, fetch product ID 5 from database.
|--------------------------------------------------------------------------
*/

$editProduct = null;

if (isset($_GET['edit_id']) && is_numeric($_GET['edit_id'])) {

    $editId = (int) $_GET['edit_id'];

    $stmt = mysqli_prepare(
        $conn,
        "SELECT * FROM products WHERE id = ? LIMIT 1"
    );

    if ($stmt) {

        mysqli_stmt_bind_param($stmt, "i", $editId);

        mysqli_stmt_execute($stmt);

        $editResult = mysqli_stmt_get_result($stmt);

        if ($editResult && mysqli_num_rows($editResult) > 0) {

            $editProduct = mysqli_fetch_assoc($editResult);

        }

        mysqli_stmt_close($stmt);
    }
}


include './components/head_html.php';

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

                    <!-- Products List Table -->
                    <div class="card">

                        <div class="card-datatable table-responsive">

                            <div id="DataTables_Table_0_wrapper"
                                class="dt-container dt-bootstrap5 dt-empty-footer">

                                <!-- Table Top -->
                                <div class="row m-3 my-0 justify-content-between">

                                    <div
                                        class="d-md-flex justify-content-between align-items-center dt-layout-start col-md-auto me-auto mt-0">

                                        <div class="dt-search">

                                            <input type="search"
                                                class="form-control ms-0"
                                                id="dt-search-0"
                                                placeholder="Search Product"
                                                aria-controls="DataTables_Table_0">

                                        </div>

                                    </div>


                                    <div
                                        class="d-md-flex justify-content-between align-items-center dt-layout-end col-md-auto ms-auto gap-2 mt-0 mb-md-0 mb-4">

                                        <div class="dt-length mt-0 mt-md-6">

                                            <select name="DataTables_Table_0_length"
                                                aria-controls="DataTables_Table_0"
                                                class="form-select"
                                                id="dt-length-0">

                                                <option value="10">10</option>
                                                <option value="25">25</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>

                                            </select>

                                            <label for="dt-length-0"></label>

                                        </div>


                                        <div class="dt-buttons btn-group flex-wrap gap-4">

                                            <div class="btn-group">

                                                <button
                                                    class="btn create-new btn-primary"
                                                    tabindex="0"
                                                    aria-controls="DataTables_Table_0"
                                                    type="button"
                                                    data-bs-toggle="offcanvas"
                                                    data-bs-target="#offcanvasEcommerceProductAdd">

                                                    <span>

                                                        <span class="d-flex align-items-center gap-2">

                                                            <i class="icon-base bx bx-plus icon-sm"></i>

                                                            <span class="d-none d-sm-inline-block">
                                                                Add Product
                                                            </span>

                                                        </span>

                                                    </span>

                                                </button>

                                            </div>

                                        </div>

                                    </div>

                                </div>


                                <!-- Product Table -->

                                <div class="justify-content-between dt-layout-table">

                                    <div
                                        class="d-md-flex justify-content-between align-items-center dt-layout-full table-responsive">

                                        <table
                                            class="datatables-products table border-top dataTable dtr-column"
                                            id="DataTables_Table_0"
                                            aria-describedby="DataTables_Table_0_info"
                                            style="width: 100%;">

                                            <thead>

                                                <tr>

                                                    <!-- ID -->
                                                    <th
                                                        class="text-nowrap dt-orderable-asc dt-orderable-desc text-center"
                                                        data-dt-column="1">

                                                        <span class="dt-column-title">
                                                            ID
                                                        </span>

                                                        <span class="dt-column-order"></span>

                                                    </th>


                                                    <!-- Product -->
                                                    <th
                                                        data-dt-column="2"
                                                        class="dt-orderable-asc dt-orderable-desc">

                                                        <span class="dt-column-title">
                                                            Product
                                                        </span>

                                                        <span class="dt-column-order"></span>

                                                    </th>


                                                    <!-- SKU -->
                                                    <th
                                                        class="text-nowrap dt-orderable-asc dt-orderable-desc">

                                                        <span class="dt-column-title">
                                                            SKU
                                                        </span>

                                                        <span class="dt-column-order"></span>

                                                    </th>


                                                    <!-- Collection -->
                                                    <th
                                                        class="text-nowrap dt-orderable-asc dt-orderable-desc">

                                                        <span class="dt-column-title">
                                                            Collection
                                                        </span>

                                                        <span class="dt-column-order"></span>

                                                    </th>


                                                    <!-- Price -->
                                                    <th
                                                        class="text-nowrap dt-orderable-asc dt-orderable-desc">

                                                        <span class="dt-column-title">
                                                            Price
                                                        </span>

                                                        <span class="dt-column-order"></span>

                                                    </th>


                                                    <!-- Stock -->
                                                    <th
                                                        class="text-nowrap dt-orderable-asc dt-orderable-desc">

                                                        <span class="dt-column-title">
                                                            Stock
                                                        </span>

                                                        <span class="dt-column-order"></span>

                                                    </th>


                                                    <!-- Status -->
                                                    <th
                                                        class="text-nowrap dt-orderable-asc dt-orderable-desc">

                                                        <span class="dt-column-title">
                                                            Status
                                                        </span>

                                                        <span class="dt-column-order"></span>

                                                    </th>


                                                    <!-- Action -->
                                                    <th
                                                        class="text-nowrap dt-orderable-asc dt-orderable-desc">

                                                        <span class="dt-column-title">
                                                            Action
                                                        </span>

                                                        <span class="dt-column-order"></span>

                                                    </th>

                                                </tr>

                                            </thead>


                                            <tbody>

                                                <?php

                                                /*
                                                |--------------------------------------------------------------------------
                                                | GET ALL PRODUCTS
                                                |--------------------------------------------------------------------------
                                                */

                                                $sql = "SELECT * FROM products ORDER BY id ASC";

                                                $result = mysqli_query($conn, $sql);

                                                while ($row = mysqli_fetch_assoc($result)) {

                                                    $productName = $row['name'] ?? '';
                                                    $sku = $row['sku'] ?? '';
                                                    $collection = $row['collection'] ?? '';
                                                    $price = $row['price'] ?? 0;
                                                    $stock = $row['stock_quantity'] ?? 0;
                                                    $status = $row['status'] ?? '';

                                                ?>

                                                    <tr>

                                                        <!-- Product ID -->

                                                        <td style="text-align:center;">

                                                            <span class="text-heading">

                                                                #
                                                                <?= htmlspecialchars($row['id']) ?>

                                                            </span>

                                                        </td>


                                                        <!-- Product -->

                                                        <td>

                                                            <div
                                                                class="d-flex justify-content-start align-items-center customer-name">

                                                                <div class="avatar-wrapper">

                                                                    <div class="avatar avatar-sm me-3">

                                                                        <?php if (!empty($row['main_image'])) { ?>

                                                                            <img
                                                                                src="<?= htmlspecialchars($row['main_image']) ?>"
                                                                                alt="<?= htmlspecialchars($productName) ?>"
                                                                                class="rounded">

                                                                        <?php } else { ?>

                                                                            <span
                                                                                class="avatar-initial rounded bg-label-primary">

                                                                                <?= strtoupper(
                                                                                    substr($productName, 0, 1)
                                                                                ) ?>

                                                                            </span>

                                                                        <?php } ?>

                                                                    </div>

                                                                </div>


                                                                <div class="d-flex flex-column">

                                                                    <a href="#" class="text-heading">

                                                                        <span class="fw-medium">

                                                                            <?= htmlspecialchars($productName) ?>

                                                                        </span>

                                                                    </a>

                                                                    <small>

                                                                        <?= htmlspecialchars(
                                                                            $row['category'] ?? ''
                                                                        ) ?>

                                                                    </small>

                                                                </div>

                                                            </div>

                                                        </td>


                                                        <!-- SKU -->

                                                        <td>

                                                            <span class="fw-medium text-heading">

                                                                <?= htmlspecialchars($sku) ?>

                                                            </span>

                                                        </td>


                                                        <!-- Collection -->

                                                        <td>

                                                            <span class="badge bg-label-primary">

                                                                <?= htmlspecialchars($collection) ?>

                                                            </span>

                                                        </td>


                                                        <!-- Price -->

                                                        <td>

                                                            <span class="fw-medium text-heading">

                                                                $<?= number_format(
                                                                    (float) $price,
                                                                    2
                                                                ) ?>

                                                            </span>

                                                            <?php if (!empty($row['old_price'])) { ?>

                                                                <small
                                                                    class="text-muted text-decoration-line-through ms-1">

                                                                    $<?= number_format(
                                                                        (float) $row['old_price'],
                                                                        2
                                                                    ) ?>

                                                                </small>

                                                            <?php } ?>

                                                        </td>


                                                        <!-- Stock -->

                                                        <td>

                                                            <span class="fw-medium text-heading">

                                                                <?= htmlspecialchars($stock) ?>

                                                            </span>

                                                        </td>


                                                        <!-- Status -->

                                                        <td>

                                                            <?php

                                                            if ($status == 'active') {

                                                                echo '<span class="badge bg-label-success">Active</span>';

                                                            } elseif ($status == 'draft') {

                                                                echo '<span class="badge bg-label-warning">Draft</span>';

                                                            } else {

                                                                echo '<span class="badge bg-label-secondary">Inactive</span>';

                                                            }

                                                            ?>

                                                        </td>


                                                        <!-- Action -->

                                                        <td>

                                                            <!--
                                                            IMPORTANT:
                                                            Instead of JavaScript editProduct(),
                                                            send the product ID to PHP.
                                                            -->

                                                            <a
                                                                href="?edit_id=<?= (int) $row['id'] ?>"
                                                                class="btn btn-icon"
                                                                title="Edit Product">

                                                                <i class="icon-base bx bx-edit icon-md"></i>

                                                            </a>

                                                        </td>

                                                    </tr>

                                                <?php

                                                }

                                                ?>

                                            </tbody>

                                            <tfoot></tfoot>

                                        </table>

                                    </div>

                                </div>


                                <!-- Pagination -->

                                <div class="row mx-3 justify-content-between">

                                    <div
                                        class="d-md-flex justify-content-between align-items-center dt-layout-start col-md-auto me-auto mt-0">

                                        <div
                                            class="dt-info"
                                            aria-live="polite"
                                            id="DataTables_Table_0_info"
                                            role="status">

                                            Showing products

                                        </div>

                                    </div>


                                    <div
                                        class="d-md-flex justify-content-between align-items-center dt-layout-end col-md-auto ms-auto gap-2 mt-0 mb-md-0 mb-4">

                                        <div class="dt-paging">

                                            <nav aria-label="pagination">

                                                <ul class="pagination">

                                                    <li class="dt-paging-button page-item disabled">

                                                        <button
                                                            class="page-link previous"
                                                            type="button"
                                                            aria-label="Previous">

                                                            <i
                                                                class="icon-base bx bx-chevron-left scaleX-n1-rtl icon-18px">
                                                            </i>

                                                        </button>

                                                    </li>


                                                    <li class="dt-paging-button page-item active">

                                                        <button class="page-link" type="button">

                                                            1

                                                        </button>

                                                    </li>


                                                    <li class="dt-paging-button page-item">

                                                        <button class="page-link" type="button">

                                                            2

                                                        </button>

                                                    </li>


                                                    <li class="dt-paging-button page-item">

                                                        <button class="page-link" type="button">

                                                            3

                                                        </button>

                                                    </li>


                                                    <li class="dt-paging-button page-item">

                                                        <button class="page-link" type="button">

                                                            4

                                                        </button>

                                                    </li>


                                                    <li class="dt-paging-button page-item">

                                                        <button class="page-link" type="button">

                                                            5

                                                        </button>

                                                    </li>


                                                    <li class="dt-paging-button page-item disabled">

                                                        <button
                                                            class="page-link ellipsis"
                                                            type="button">

                                                            …

                                                        </button>

                                                    </li>


                                                    <li class="dt-paging-button page-item">

                                                        <button class="page-link" type="button">

                                                            10

                                                        </button>

                                                    </li>


                                                    <li class="dt-paging-button page-item">

                                                        <button
                                                            class="page-link next"
                                                            type="button"
                                                            aria-label="Next">

                                                            <i
                                                                class="icon-base bx bx-chevron-right scaleX-n1-rtl icon-18px">
                                                            </i>

                                                        </button>

                                                    </li>

                                                </ul>

                                            </nav>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>


                        <!-- ===================================== -->
                        <!-- ADD PRODUCT OFFCANVAS -->
                        <!-- ===================================== -->

                        <div
                            class="offcanvas offcanvas-end"
                            tabindex="-1"
                            id="offcanvasEcommerceProductAdd"
                            aria-labelledby="offcanvasEcommerceProductAddLabel">

                            <div class="offcanvas-header">

                                <h5
                                    id="offcanvasEcommerceProductAddLabel"
                                    class="offcanvas-title">

                                    Add Product

                                </h5>

                                <button
                                    type="button"
                                    class="btn-close text-reset"
                                    data-bs-dismiss="offcanvas"
                                    aria-label="Close">
                                </button>

                            </div>


                            <div
                                class="offcanvas-body border-top mx-0 flex-grow-0">

                                <form
                                    id="eCommerceProductAddForm"
                                    class="pt-0">


                                    <!-- ================================= -->
                                    <!-- BASIC INFORMATION -->
                                    <!-- ================================= -->

                                    <div class="mb-4">

                                        <h6 class="mb-4">
                                            Basic Information
                                        </h6>


                                        <!-- Product Name -->

                                        <div class="mb-4">

                                            <label
                                                for="product-name"
                                                class="form-label">

                                                Product Name
                                                <span class="text-danger">*</span>

                                            </label>

                                            <input
                                                type="text"
                                                id="product-name"
                                                name="productName"
                                                class="form-control"
                                                placeholder="Stylish Summer Outfit">

                                        </div>


                                        <!-- SKU -->

                                        <div class="mb-4">

                                            <label
                                                for="product-sku"
                                                class="form-label">

                                                SKU
                                                <span class="text-danger">*</span>

                                            </label>

                                            <input
                                                type="text"
                                                id="product-sku"
                                                name="sku"
                                                class="form-control"
                                                placeholder="SSO-2024-BLUE">

                                        </div>


                                        <!-- Category -->

                                        <div class="mb-4">

                                            <label
                                                for="product-category"
                                                class="form-label">

                                                Category

                                            </label>

                                            <input
                                                type="text"
                                                id="product-category"
                                                name="category"
                                                class="form-control"
                                                placeholder="Men">

                                        </div>


                                        <!-- Collection -->

                                        <div class="mb-4">

                                            <label
                                                for="product-collection"
                                                class="form-label">

                                                Collection

                                            </label>

                                            <input
                                                type="text"
                                                id="product-collection"
                                                name="collection"
                                                class="form-control"
                                                placeholder="Trending">

                                        </div>


                                        <!-- Description -->

                                        <div class="mb-4">

                                            <label
                                                for="product-description"
                                                class="form-label">

                                                Description

                                            </label>

                                            <textarea
                                                id="product-description"
                                                name="description"
                                                class="form-control"
                                                rows="4"
                                                placeholder="Product description"></textarea>

                                        </div>

                                    </div>


                                    <!-- ================================= -->
                                    <!-- PRICING -->
                                    <!-- ================================= -->

                                    <div class="mb-4 pt-3">

                                        <h6 class="mb-4">
                                            Pricing
                                        </h6>


                                        <div class="mb-4">

                                            <label
                                                for="product-price"
                                                class="form-label">

                                                Price
                                                <span class="text-danger">*</span>

                                            </label>

                                            <input
                                                type="number"
                                                step="0.01"
                                                id="product-price"
                                                name="price"
                                                class="form-control"
                                                placeholder="59.00">

                                        </div>


                                        <div class="mb-4">

                                            <label
                                                for="product-old-price"
                                                class="form-label">

                                                Old Price

                                            </label>

                                            <input
                                                type="number"
                                                step="0.01"
                                                id="product-old-price"
                                                name="old_price"
                                                class="form-control"
                                                placeholder="79.00">

                                        </div>


                                        <div>

                                            <label
                                                for="product-discount"
                                                class="form-label">

                                                Discount %

                                            </label>

                                            <input
                                                type="number"
                                                step="0.01"
                                                id="product-discount"
                                                name="discount_percentage"
                                                class="form-control"
                                                placeholder="25">

                                        </div>

                                    </div>


                                    <!-- ================================= -->
                                    <!-- PRODUCT INFORMATION -->
                                    <!-- ================================= -->

                                    <div class="mb-4 pt-3">

                                        <h6 class="mb-4">
                                            Product Information
                                        </h6>


                                        <!-- Brand -->

                                        <div class="mb-4">

                                            <label
                                                for="product-brand"
                                                class="form-label">

                                                Brand

                                            </label>

                                            <input
                                                type="text"
                                                id="product-brand"
                                                name="brand"
                                                class="form-control"
                                                placeholder="Stylish Summer">

                                        </div>


                                        <!-- Color -->

                                        <div class="mb-4">

                                            <label
                                                for="product-color"
                                                class="form-label">

                                                Color

                                            </label>

                                            <input
                                                type="text"
                                                id="product-color"
                                                name="color"
                                                class="form-control"
                                                placeholder="Blue">

                                        </div>


                                        <!-- Material -->

                                        <div class="mb-4">

                                            <label
                                                for="product-material"
                                                class="form-label">

                                                Material

                                            </label>

                                            <input
                                                type="text"
                                                id="product-material"
                                                name="material"
                                                class="form-control"
                                                placeholder="Denim Cotton">

                                        </div>


                                        <!-- Fit -->

                                        <div class="mb-4">

                                            <label
                                                for="product-fit"
                                                class="form-label">

                                                Fit

                                            </label>

                                            <input
                                                type="text"
                                                id="product-fit"
                                                name="fit"
                                                class="form-control"
                                                placeholder="Regular Fit">

                                        </div>


                                        <!-- Pattern -->

                                        <div class="mb-4">

                                            <label
                                                for="product-pattern"
                                                class="form-label">

                                                Pattern

                                            </label>

                                            <input
                                                type="text"
                                                id="product-pattern"
                                                name="pattern"
                                                class="form-control"
                                                placeholder="Solid">

                                        </div>


                                        <!-- Occasion -->

                                        <div class="mb-4">

                                            <label
                                                for="product-occasion"
                                                class="form-label">

                                                Occasion

                                            </label>

                                            <input
                                                type="text"
                                                id="product-occasion"
                                                name="occasion"
                                                class="form-control"
                                                placeholder="Casual, Travel, Weekend Wear">

                                        </div>


                                        <!-- Care -->

                                        <div>

                                            <label
                                                for="product-care"
                                                class="form-label">

                                                Care

                                            </label>

                                            <input
                                                type="text"
                                                id="product-care"
                                                name="care"
                                                class="form-control"
                                                placeholder="Machine wash cold">

                                        </div>

                                    </div>


                                    <!-- ================================= -->
                                    <!-- OTHER DETAILS -->
                                    <!-- ================================= -->

                                    <div class="mb-4 pt-3">

                                        <h6 class="mb-4">
                                            Other Details
                                        </h6>


                                        <div class="mb-4">

                                            <label
                                                for="product-neck"
                                                class="form-label">

                                                Neck Type

                                            </label>

                                            <input
                                                type="text"
                                                id="product-neck"
                                                name="neck_type"
                                                class="form-control"
                                                placeholder="Collar Neck">

                                        </div>


                                        <div>

                                            <label
                                                for="product-sleeve"
                                                class="form-label">

                                                Sleeve Style

                                            </label>

                                            <input
                                                type="text"
                                                id="product-sleeve"
                                                name="sleeve_style"
                                                class="form-control"
                                                placeholder="Full Sleeve">

                                        </div>

                                    </div>


                                    <!-- ================================= -->
                                    <!-- SIZES & STOCK -->
                                    <!-- ================================= -->

                                    <div class="mb-4 pt-3">

                                        <h6 class="mb-4">
                                            Sizes & Stock
                                        </h6>


                                        <div class="mb-4">

                                            <label
                                                for="product-sizes"
                                                class="form-label">

                                                Available Sizes

                                            </label>

                                            <input
                                                type="text"
                                                id="product-sizes"
                                                name="sizes"
                                                class="form-control"
                                                placeholder="XS,S,M,L,XL,XXL">

                                            <small class="text-muted">
                                                Separate sizes with commas.
                                            </small>

                                        </div>


                                        <div class="mb-4">

                                            <label
                                                for="product-stock"
                                                class="form-label">

                                                Stock Quantity

                                            </label>

                                            <input
                                                type="number"
                                                id="product-stock"
                                                name="stock_quantity"
                                                class="form-control"
                                                placeholder="100">

                                        </div>


                                        <div>

                                            <label
                                                for="product-stock-status"
                                                class="form-label">

                                                Stock Status

                                            </label>

                                            <select
                                                id="product-stock-status"
                                                name="stock_status"
                                                class="form-select">

                                                <option value="in_stock">
                                                    In Stock
                                                </option>

                                                <option value="low_stock">
                                                    Low Stock
                                                </option>

                                                <option value="out_of_stock">
                                                    Out of Stock
                                                </option>

                                            </select>

                                        </div>

                                    </div>


                                    <!-- ================================= -->
                                    <!-- PRODUCT IMAGE -->
                                    <!-- ================================= -->

                                    <div class="mb-4 pt-3">

                                        <h6 class="mb-4">
                                            Product Image
                                        </h6>

                                        <label
                                            for="product-image"
                                            class="form-label">

                                            Main Image

                                        </label>

                                        <input
                                            type="text"
                                            id="product-image"
                                            name="main_image"
                                            class="form-control"
                                            placeholder="/uploads/product-image.jpg">

                                    </div>


                                    <!-- ================================= -->
                                    <!-- FEATURES -->
                                    <!-- ================================= -->

                                    <div class="mb-4 pt-3">

                                        <h6 class="mb-4">
                                            Product Features
                                        </h6>


                                        <div class="mb-3">

                                            <input
                                                type="text"
                                                name="feature_1"
                                                class="form-control"
                                                placeholder="Premium quality fabric">

                                        </div>


                                        <div class="mb-3">

                                            <input
                                                type="text"
                                                name="feature_2"
                                                class="form-control"
                                                placeholder="Lightweight & breathable">

                                        </div>


                                        <div class="mb-3">

                                            <input
                                                type="text"
                                                name="feature_3"
                                                class="form-control"
                                                placeholder="Perfect for summer">

                                        </div>


                                        <div class="mb-3">

                                            <input
                                                type="text"
                                                name="feature_4"
                                                class="form-control"
                                                placeholder="Modern and stylish fit">

                                        </div>


                                        <div>

                                            <input
                                                type="text"
                                                name="feature_5"
                                                class="form-control"
                                                placeholder="Easy to wash and maintain">

                                        </div>

                                    </div>


                                    <!-- ================================= -->
                                    <!-- SHIPPING & RETURNS -->
                                    <!-- ================================= -->

                                    <div class="mb-4 pt-3">

                                        <h6 class="mb-4">
                                            Shipping & Returns
                                        </h6>


                                        <div class="mb-4">

                                            <label
                                                for="shipping-description"
                                                class="form-label">

                                                Description

                                            </label>

                                            <textarea
                                                id="shipping-description"
                                                name="shipping_return_description"
                                                class="form-control"
                                                rows="4"
                                                placeholder="Shipping and return information"></textarea>

                                        </div>


                                        <div class="mb-3">

                                            <input
                                                type="text"
                                                name="shipping_return_point_1"
                                                class="form-control"
                                                placeholder="Free shipping on orders over $50">

                                        </div>


                                        <div class="mb-3">

                                            <input
                                                type="text"
                                                name="shipping_return_point_2"
                                                class="form-control"
                                                placeholder="Orders are processed within 1–2 business days">

                                        </div>


                                        <div class="mb-3">

                                            <input
                                                type="text"
                                                name="shipping_return_point_3"
                                                class="form-control"
                                                placeholder="Standard delivery takes 3–5 business days">

                                        </div>


                                        <div class="mb-3">

                                            <input
                                                type="text"
                                                name="shipping_return_point_4"
                                                class="form-control"
                                                placeholder="30-day return policy">

                                        </div>


                                        <div>

                                            <input
                                                type="text"
                                                name="shipping_return_point_5"
                                                class="form-control"
                                                placeholder="Product must be unused and in original packaging">

                                        </div>

                                    </div>


                                    <!-- ================================= -->
                                    <!-- STATUS -->
                                    <!-- ================================= -->

                                    <div class="mb-4 pt-3">

                                        <h6 class="mb-4">
                                            Product Status
                                        </h6>

                                        <select
                                            name="status"
                                            id="product-status"
                                            class="form-select">

                                            <option value="active">
                                                Active
                                            </option>

                                            <option value="draft">
                                                Draft
                                            </option>

                                            <option value="inactive">
                                                Inactive
                                            </option>

                                        </select>

                                    </div>


                                    <!-- ================================= -->
                                    <!-- ACTIONS -->
                                    <!-- ================================= -->

                                    <div class="d-flex gap-2">

                                        <button
                                            type="submit"
                                            class="btn btn-primary">

                                            Add Product

                                        </button>


                                        <button
                                            type="reset"
                                            class="btn btn-label-danger"
                                            data-bs-dismiss="offcanvas">

                                            Discard

                                        </button>

                                    </div>

                                </form>

                            </div>

                        </div>


                        <!-- ===================================== -->
                        <!-- EDIT PRODUCT OFFCANVAS -->
                        <!-- ===================================== -->

                        <div
                            class="offcanvas offcanvas-end"
                            tabindex="-1"
                            id="offcanvasEcommerceProductEdit"
                            aria-labelledby="offcanvasEcommerceProductEditLabel">

                            <div class="offcanvas-header">

                                <h5
                                    id="offcanvasEcommerceProductEditLabel"
                                    class="offcanvas-title">

                                    Edit Product

                                </h5>

                                <button
                                    type="button"
                                    class="btn-close text-reset"
                                    data-bs-dismiss="offcanvas"
                                    aria-label="Close">
                                </button>

                            </div>


                            <div
                                class="offcanvas-body border-top mx-0 flex-grow-0">

                                <form
                                    id="eCommerceProductEditForm"
                                    class="pt-0">


                                    <!-- Hidden Product ID -->

                                    <input
                                        type="hidden"
                                        id="edit-product-id"
                                        name="product_id"
                                        value="<?= htmlspecialchars(
                                            $editProduct['id'] ?? ''
                                        ) ?>">


                                    <!-- ================================= -->
                                    <!-- BASIC INFORMATION -->
                                    <!-- ================================= -->

                                    <div class="mb-4">

                                        <h6 class="mb-4">
                                            Basic Information
                                        </h6>


                                        <!-- Product Name -->

                                        <div class="mb-4">

                                            <label
                                                for="edit-product-name"
                                                class="form-label">

                                                Product Name
                                                <span class="text-danger">*</span>

                                            </label>

                                            <input
                                                type="text"
                                                id="edit-product-name"
                                                name="productName"
                                                class="form-control"
                                                value="<?= htmlspecialchars(
                                                    $editProduct['name'] ?? ''
                                                ) ?>"
                                                placeholder="Stylish Summer Outfit">

                                        </div>


                                        <!-- SKU -->

                                        <div class="mb-4">

                                            <label
                                                for="edit-product-sku"
                                                class="form-label">

                                                SKU
                                                <span class="text-danger">*</span>

                                            </label>

                                            <input
                                                type="text"
                                                id="edit-product-sku"
                                                name="sku"
                                                class="form-control"
                                                value="<?= htmlspecialchars(
                                                    $editProduct['sku'] ?? ''
                                                ) ?>"
                                                placeholder="SSO-2024-BLUE">

                                        </div>


                                        <!-- Category -->

                                        <div class="mb-4">

                                            <label
                                                for="edit-product-category"
                                                class="form-label">

                                                Category

                                            </label>

                                            <input
                                                type="text"
                                                id="edit-product-category"
                                                name="category"
                                                class="form-control"
                                                value="<?= htmlspecialchars(
                                                    $editProduct['category'] ?? ''
                                                ) ?>"
                                                placeholder="Men">

                                        </div>


                                        <!-- Collection -->

                                        <div class="mb-4">

                                            <label
                                                for="edit-product-collection"
                                                class="form-label">

                                                Collection

                                            </label>

                                            <input
                                                type="text"
                                                id="edit-product-collection"
                                                name="collection"
                                                class="form-control"
                                                value="<?= htmlspecialchars(
                                                    $editProduct['collection'] ?? ''
                                                ) ?>"
                                                placeholder="Trending">

                                        </div>


                                        <!-- Description -->

                                        <div class="mb-4">

                                            <label
                                                for="edit-product-description"
                                                class="form-label">

                                                Description

                                            </label>

                                            <textarea
                                                id="edit-product-description"
                                                name="description"
                                                class="form-control"
                                                rows="4"
                                                placeholder="Product description"><?= htmlspecialchars(
                                                    $editProduct['description'] ?? ''
                                                ) ?></textarea>

                                        </div>

                                    </div>


                                    <!-- ================================= -->
                                    <!-- PRICING -->
                                    <!-- ================================= -->

                                    <div class="mb-4 pt-3">

                                        <h6 class="mb-4">
                                            Pricing
                                        </h6>


                                        <!-- Price -->

                                        <div class="mb-4">

                                            <label
                                                for="edit-product-price"
                                                class="form-label">

                                                Price
                                                <span class="text-danger">*</span>

                                            </label>

                                            <input
                                                type="number"
                                                step="0.01"
                                                id="edit-product-price"
                                                name="price"
                                                class="form-control"
                                                value="<?= htmlspecialchars(
                                                    $editProduct['price'] ?? ''
                                                ) ?>"
                                                placeholder="59.00">

                                        </div>


                                        <!-- Old Price -->

                                        <div class="mb-4">

                                            <label
                                                for="edit-product-old-price"
                                                class="form-label">

                                                Old Price

                                            </label>

                                            <input
                                                type="number"
                                                step="0.01"
                                                id="edit-product-old-price"
                                                name="old_price"
                                                class="form-control"
                                                value="<?= htmlspecialchars(
                                                    $editProduct['old_price'] ?? ''
                                                ) ?>"
                                                placeholder="79.00">

                                        </div>


                                        <!-- Discount -->

                                        <div>

                                            <label
                                                for="edit-product-discount"
                                                class="form-label">

                                                Discount %

                                            </label>

                                            <input
                                                type="number"
                                                step="0.01"
                                                id="edit-product-discount"
                                                name="discount_percentage"
                                                class="form-control"
                                                value="<?= htmlspecialchars(
                                                    $editProduct['discount_percentage'] ?? ''
                                                ) ?>"
                                                placeholder="25">

                                        </div>

                                    </div>


                                    <!-- ================================= -->
                                    <!-- PRODUCT INFORMATION -->
                                    <!-- ================================= -->

                                    <div class="mb-4 pt-3">

                                        <h6 class="mb-4">
                                            Product Information
                                        </h6>


                                        <!-- Brand -->

                                        <div class="mb-4">

                                            <label
                                                for="edit-product-brand"
                                                class="form-label">

                                                Brand

                                            </label>

                                            <input
                                                type="text"
                                                id="edit-product-brand"
                                                name="brand"
                                                class="form-control"
                                                value="<?= htmlspecialchars(
                                                    $editProduct['brand'] ?? ''
                                                ) ?>"
                                                placeholder="Stylish Summer">

                                        </div>


                                        <!-- Color -->

                                        <div class="mb-4">

                                            <label
                                                for="edit-product-color"
                                                class="form-label">

                                                Color

                                            </label>

                                            <input
                                                type="text"
                                                id="edit-product-color"
                                                name="color"
                                                class="form-control"
                                                value="<?= htmlspecialchars(
                                                    $editProduct['color'] ?? ''
                                                ) ?>"
                                                placeholder="Blue">

                                        </div>


                                        <!-- Material -->

                                        <div class="mb-4">

                                            <label
                                                for="edit-product-material"
                                                class="form-label">

                                                Material

                                            </label>

                                            <input
                                                type="text"
                                                id="edit-product-material"
                                                name="material"
                                                class="form-control"
                                                value="<?= htmlspecialchars(
                                                    $editProduct['material'] ?? ''
                                                ) ?>"
                                                placeholder="Denim Cotton">

                                        </div>


                                        <!-- Fit -->

                                        <div class="mb-4">

                                            <label
                                                for="edit-product-fit"
                                                class="form-label">

                                                Fit

                                            </label>

                                            <input
                                                type="text"
                                                id="edit-product-fit"
                                                name="fit"
                                                class="form-control"
                                                value="<?= htmlspecialchars(
                                                    $editProduct['fit'] ?? ''
                                                ) ?>"
                                                placeholder="Regular Fit">

                                        </div>


                                        <!-- Pattern -->

                                        <div class="mb-4">

                                            <label
                                                for="edit-product-pattern"
                                                class="form-label">

                                                Pattern

                                            </label>

                                            <input
                                                type="text"
                                                id="edit-product-pattern"
                                                name="pattern"
                                                class="form-control"
                                                value="<?= htmlspecialchars(
                                                    $editProduct['pattern'] ?? ''
                                                ) ?>"
                                                placeholder="Solid">

                                        </div>


                                        <!-- Occasion -->

                                        <div class="mb-4">

                                            <label
                                                for="edit-product-occasion"
                                                class="form-label">

                                                Occasion

                                            </label>

                                            <input
                                                type="text"
                                                id="edit-product-occasion"
                                                name="occasion"
                                                class="form-control"
                                                value="<?= htmlspecialchars(
                                                    $editProduct['occasion'] ?? ''
                                                ) ?>"
                                                placeholder="Casual, Travel, Weekend Wear">

                                        </div>


                                        <!-- Care -->

                                        <div>

                                            <label
                                                for="edit-product-care"
                                                class="form-label">

                                                Care

                                            </label>

                                            <input
                                                type="text"
                                                id="edit-product-care"
                                                name="care"
                                                class="form-control"
                                                value="<?= htmlspecialchars(
                                                    $editProduct['care'] ?? ''
                                                ) ?>"
                                                placeholder="Machine wash cold">

                                        </div>

                                    </div>


                                    <!-- ================================= -->
                                    <!-- OTHER DETAILS -->
                                    <!-- ================================= -->

                                    <div class="mb-4 pt-3">

                                        <h6 class="mb-4">
                                            Other Details
                                        </h6>


                                        <!-- Neck -->

                                        <div class="mb-4">

                                            <label
                                                for="edit-product-neck"
                                                class="form-label">

                                                Neck Type

                                            </label>

                                            <input
                                                type="text"
                                                id="edit-product-neck"
                                                name="neck_type"
                                                class="form-control"
                                                value="<?= htmlspecialchars(
                                                    $editProduct['neck_type'] ?? ''
                                                ) ?>"
                                                placeholder="Collar Neck">

                                        </div>


                                        <!-- Sleeve -->

                                        <div>

                                            <label
                                                for="edit-product-sleeve"
                                                class="form-label">

                                                Sleeve Style

                                            </label>

                                            <input
                                                type="text"
                                                id="edit-product-sleeve"
                                                name="sleeve_style"
                                                class="form-control"
                                                value="<?= htmlspecialchars(
                                                    $editProduct['sleeve_style'] ?? ''
                                                ) ?>"
                                                placeholder="Full Sleeve">

                                        </div>

                                    </div>


                                    <!-- ================================= -->
                                    <!-- SIZES & STOCK -->
                                    <!-- ================================= -->

                                    <div class="mb-4 pt-3">

                                        <h6 class="mb-4">
                                            Sizes & Stock
                                        </h6>


                                        <!-- Sizes -->

                                        <div class="mb-4">

                                            <label
                                                for="edit-product-sizes"
                                                class="form-label">

                                                Available Sizes

                                            </label>

                                            <input
                                                type="text"
                                                id="edit-product-sizes"
                                                name="sizes"
                                                class="form-control"
                                                value="<?= htmlspecialchars(
                                                    $editProduct['sizes'] ?? ''
                                                ) ?>"
                                                placeholder="XS,S,M,L,XL,XXL">

                                            <small class="text-muted">
                                                Separate sizes with commas.
                                            </small>

                                        </div>


                                        <!-- Stock Quantity -->

                                        <div class="mb-4">

                                            <label
                                                for="edit-product-stock"
                                                class="form-label">

                                                Stock Quantity

                                            </label>

                                            <input
                                                type="number"
                                                id="edit-product-stock"
                                                name="stock_quantity"
                                                class="form-control"
                                                value="<?= htmlspecialchars(
                                                    $editProduct['stock_quantity'] ?? ''
                                                ) ?>"
                                                placeholder="100">

                                        </div>


                                        <!-- Stock Status -->

                                        <div>

                                            <label
                                                for="edit-product-stock-status"
                                                class="form-label">

                                                Stock Status

                                            </label>

                                            <select
                                                id="edit-product-stock-status"
                                                name="stock_status"
                                                class="form-select">

                                                <option
                                                    value="in_stock"
                                                    <?= (($editProduct['stock_status'] ?? '') === 'in_stock')
                                                        ? 'selected'
                                                        : '' ?>>

                                                    In Stock

                                                </option>

                                                <option
                                                    value="low_stock"
                                                    <?= (($editProduct['stock_status'] ?? '') === 'low_stock')
                                                        ? 'selected'
                                                        : '' ?>>

                                                    Low Stock

                                                </option>

                                                <option
                                                    value="out_of_stock"
                                                    <?= (($editProduct['stock_status'] ?? '') === 'out_of_stock')
                                                        ? 'selected'
                                                        : '' ?>>

                                                    Out of Stock

                                                </option>

                                            </select>

                                        </div>

                                    </div>


                                    <!-- ================================= -->
                                    <!-- PRODUCT IMAGE -->
                                    <!-- ================================= -->

                                    <div class="mb-4 pt-3">

                                        <h6 class="mb-4">
                                            Product Image
                                        </h6>

                                        <label
                                            for="edit-product-image"
                                            class="form-label">

                                            Main Image

                                        </label>

                                        <input
                                            type="text"
                                            id="edit-product-image"
                                            name="main_image"
                                            class="form-control"
                                            value="<?= htmlspecialchars(
                                                $editProduct['main_image'] ?? ''
                                            ) ?>"
                                            placeholder="/uploads/product-image.jpg">

                                    </div>


                                    <!-- ================================= -->
                                    <!-- FEATURES -->
                                    <!-- ================================= -->

                                    <div class="mb-4 pt-3">

                                        <h6 class="mb-4">
                                            Product Features
                                        </h6>


                                        <div class="mb-3">

                                            <input
                                                type="text"
                                                id="edit-feature-1"
                                                name="feature_1"
                                                class="form-control"
                                                value="<?= htmlspecialchars(
                                                    $editProduct['feature_1'] ?? ''
                                                ) ?>"
                                                placeholder="Premium quality fabric">

                                        </div>


                                        <div class="mb-3">

                                            <input
                                                type="text"
                                                id="edit-feature-2"
                                                name="feature_2"
                                                class="form-control"
                                                value="<?= htmlspecialchars(
                                                    $editProduct['feature_2'] ?? ''
                                                ) ?>"
                                                placeholder="Lightweight & breathable">

                                        </div>


                                        <div class="mb-3">

                                            <input
                                                type="text"
                                                id="edit-feature-3"
                                                name="feature_3"
                                                class="form-control"
                                                value="<?= htmlspecialchars(
                                                    $editProduct['feature_3'] ?? ''
                                                ) ?>"
                                                placeholder="Perfect for summer">

                                        </div>


                                        <div class="mb-3">

                                            <input
                                                type="text"
                                                id="edit-feature-4"
                                                name="feature_4"
                                                class="form-control"
                                                value="<?= htmlspecialchars(
                                                    $editProduct['feature_4'] ?? ''
                                                ) ?>"
                                                placeholder="Modern and stylish fit">

                                        </div>


                                        <div>

                                            <input
                                                type="text"
                                                id="edit-feature-5"
                                                name="feature_5"
                                                class="form-control"
                                                value="<?= htmlspecialchars(
                                                    $editProduct['feature_5'] ?? ''
                                                ) ?>"
                                                placeholder="Easy to wash and maintain">

                                        </div>

                                    </div>


                                    <!-- ================================= -->
                                    <!-- SHIPPING & RETURNS -->
                                    <!-- ================================= -->

                                    <div class="mb-4 pt-3">

                                        <h6 class="mb-4">
                                            Shipping & Returns
                                        </h6>


                                        <!-- Description -->

                                        <div class="mb-4">

                                            <label
                                                for="edit-shipping-description"
                                                class="form-label">

                                                Description

                                            </label>

                                            <textarea
                                                id="edit-shipping-description"
                                                name="shipping_return_description"
                                                class="form-control"
                                                rows="4"
                                                placeholder="Shipping and return information"><?= htmlspecialchars(
                                                    $editProduct['shipping_return_description'] ?? ''
                                                ) ?></textarea>

                                        </div>


                                        <!-- Point 1 -->

                                        <div class="mb-3">

                                            <input
                                                type="text"
                                                id="edit-shipping-point-1"
                                                name="shipping_return_point_1"
                                                class="form-control"
                                                value="<?= htmlspecialchars(
                                                    $editProduct['shipping_return_point_1'] ?? ''
                                                ) ?>"
                                                placeholder="Free shipping on orders over $50">

                                        </div>


                                        <!-- Point 2 -->

                                        <div class="mb-3">

                                            <input
                                                type="text"
                                                id="edit-shipping-point-2"
                                                name="shipping_return_point_2"
                                                class="form-control"
                                                value="<?= htmlspecialchars(
                                                    $editProduct['shipping_return_point_2'] ?? ''
                                                ) ?>"
                                                placeholder="Orders are processed within 1–2 business days">

                                        </div>


                                        <!-- Point 3 -->

                                        <div class="mb-3">

                                            <input
                                                type="text"
                                                id="edit-shipping-point-3"
                                                name="shipping_return_point_3"
                                                class="form-control"
                                                value="<?= htmlspecialchars(
                                                    $editProduct['shipping_return_point_3'] ?? ''
                                                ) ?>"
                                                placeholder="Standard delivery takes 3–5 business days">

                                        </div>


                                        <!-- Point 4 -->

                                        <div class="mb-3">

                                            <input
                                                type="text"
                                                id="edit-shipping-point-4"
                                                name="shipping_return_point_4"
                                                class="form-control"
                                                value="<?= htmlspecialchars(
                                                    $editProduct['shipping_return_point_4'] ?? ''
                                                ) ?>"
                                                placeholder="30-day return policy">

                                        </div>


                                        <!-- Point 5 -->

                                        <div>

                                            <input
                                                type="text"
                                                id="edit-shipping-point-5"
                                                name="shipping_return_point_5"
                                                class="form-control"
                                                value="<?= htmlspecialchars(
                                                    $editProduct['shipping_return_point_5'] ?? ''
                                                ) ?>"
                                                placeholder="Product must be unused and in original packaging">

                                        </div>

                                    </div>


                                    <!-- ================================= -->
                                    <!-- STATUS -->
                                    <!-- ================================= -->

                                    <div class="mb-4 pt-3">

                                        <h6 class="mb-4">
                                            Product Status
                                        </h6>

                                        <select
                                            name="status"
                                            id="edit-product-status"
                                            class="form-select">

                                            <option
                                                value="active"
                                                <?= (($editProduct['status'] ?? '') === 'active')
                                                    ? 'selected'
                                                    : '' ?>>

                                                Active

                                            </option>

                                            <option
                                                value="draft"
                                                <?= (($editProduct['status'] ?? '') === 'draft')
                                                    ? 'selected'
                                                    : '' ?>>

                                                Draft

                                            </option>

                                            <option
                                                value="inactive"
                                                <?= (($editProduct['status'] ?? '') === 'inactive')
                                                    ? 'selected'
                                                    : '' ?>>

                                                Inactive

                                            </option>

                                        </select>

                                    </div>


                                    <!-- ================================= -->
                                    <!-- ACTIONS -->
                                    <!-- ================================= -->

                                    <div class="d-flex gap-2">

                                        <button
                                            type="submit"
                                            class="btn btn-primary">

                                            Update Product

                                        </button>


                                        <button
                                            type="button"
                                            class="btn btn-label-danger"
                                            data-bs-dismiss="offcanvas">

                                            Cancel

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


<!-- ===================================== -->
<!-- OPEN EDIT OFFCANVAS AUTOMATICALLY -->
<!-- ===================================== -->

<?php if ($editProduct): ?>

<script>

document.addEventListener('DOMContentLoaded', function () {

    const editOffcanvasElement =
        document.getElementById('offcanvasEcommerceProductEdit');

    if (editOffcanvasElement) {

        const editOffcanvas =
            new bootstrap.Offcanvas(editOffcanvasElement);

        editOffcanvas.show();

    }

});

</script>

<?php endif; ?>
