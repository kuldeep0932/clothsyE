<?php include('./templates/header.php'); ?>

<!-- page header section banner start -->
<section class="clothsy-shop-banner">
    <div class="container">

        <div class="clothsy-shop-banner-content">

            <h1>Shop</h1>

            <div class="clothsy-breadcrumb">
                <a href="/">Home</a>
                <span class="arrow">›</span>
                <span class="current">Shop</span>
            </div>

        </div>
    </div>
</section>
<!-- page header section banner end -->

<!-- filter and products section start -->
<section class="filter_prod_section py-4">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <!-- Bootstrap CSS -->


                <div class="border sidebar_filter rounded-3 p-4 bg-white shadow-sm">

                    <!-- Categories -->
                    <h5 class="fw-bold mb-4">Categories</h5>

                    <div class="d-flex justify-content-between mb-3">
                        <span>All Categories</span>
                        <span>(120)</span>
                    </div>

                    <div class="d-flex justify-content-between mb-3">
                        <span>Men</span>
                        <span>(30)</span>
                    </div>

                    <div class="d-flex justify-content-between mb-3">
                        <span>Women</span>
                        <span>(40)</span>
                    </div>

                    <div class="d-flex justify-content-between mb-3">
                        <span>Kids</span>
                        <span>(15)</span>
                    </div>

                    <div class="d-flex justify-content-between mb-3">
                        <span>Shoes</span>
                        <span>(20)</span>
                    </div>

                    <div class="d-flex justify-content-between mb-3">
                        <span>Bags</span>
                        <span>(10)</span>
                    </div>

                    <div class="d-flex justify-content-between mb-4">
                        <span>Accessories</span>
                        <span>(5)</span>
                    </div>

                    <hr>

                    <!-- Filter By -->
                    <h5 class="fw-bold my-4">Filter By</h5>

                    <!-- Price -->
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <strong>Price</strong>
                    </div>

                    <input type="range" class="form-range" min="20" max="200" value="200">

                    <div class="d-flex justify-content-between small text-muted mb-4">
                        <span>$20</span>
                        <span>$200</span>
                    </div>

                    <!-- Size -->
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <strong>Size</strong>
                    </div>

                    <div class="form-check d-flex justify-content-between mb-3">
                        <div>
                            <input class="form-check-input me-2" type="checkbox" id="xs">
                            <label class="form-check-label" for="xs">XS</label>
                        </div>
                        <span>(20)</span>
                    </div>

                    <div class="form-check d-flex justify-content-between mb-3">
                        <div>
                            <input class="form-check-input me-2" type="checkbox" id="s">
                            <label class="form-check-label" for="s">S</label>
                        </div>
                        <span>(40)</span>
                    </div>

                    <div class="form-check d-flex justify-content-between mb-3">
                        <div>
                            <input class="form-check-input me-2" type="checkbox" id="m">
                            <label class="form-check-label" for="m">M</label>
                        </div>
                        <span>(60)</span>
                    </div>

                    <div class="form-check d-flex justify-content-between mb-3">
                        <div>
                            <input class="form-check-input me-2" type="checkbox" id="l">
                            <label class="form-check-label" for="l">L</label>
                        </div>
                        <span>(50)</span>
                    </div>

                    <div class="form-check d-flex justify-content-between mb-3">
                        <div>
                            <input class="form-check-input me-2" type="checkbox" id="xl">
                            <label class="form-check-label" for="xl">XL</label>
                        </div>
                        <span>(30)</span>
                    </div>

                    <div class="form-check d-flex justify-content-between">
                        <div>
                            <input class="form-check-input me-2" type="checkbox" id="xxl">
                            <label class="form-check-label" for="xxl">XXL</label>
                        </div>
                        <span>(20)</span>
                    </div>

                </div>


            </div>

            <div class="col-md-9">
                <div class="product_grid_cont">
                    <!-- product card start -->
                    <div class="card product_card">
                        <img src="./assets/images/category4.jpg" class="card-img-top" alt="product img 1">
                        <span class="product_trendtext">Trending</span>
                        <div class="card-body">
                            <a href="#">
                                <h5 class="card-title">Stylish Summer Outfit</h5>
                            </a>
                            <div class="product_price d-flex align-items-center justify-content-between">
                                <strong class="price">$59.00 </strong>
                                <div class="d-flex gap-2 align-items-center">
                                    <button class="btn cart_btn" data-bs-toggle="tooltip" data-bs-placement="top"
                                        aria-label="Add to cart" data-bs-original-title="Add to cart">
                                        <i class="fa-solid fa-cart-shopping"></i>
                                    </button>
                                    <button class="btn icon_btn" data-bs-toggle="tooltip" data-bs-placement="top"
                                        aria-label="Quick view " data-bs-original-title="Quick view ">
                                        <i class="fa-solid fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- product card end -->
                    <!-- product card start -->
                    <div class="card product_card">
                        <img src="./assets/images/category5.jpg" class="card-img-top" alt="product img 1">
                        <span class="product_trendtext">Trending</span>
                        <div class="card-body">
                            <a href="#">
                                <h5 class="card-title">Stylish Summer Outfit</h5>
                            </a>
                            <div class="product_price d-flex align-items-center justify-content-between">
                                <strong class="price">$59.00 </strong>
                                <div class="d-flex gap-2 align-items-center">
                                    <button class="btn cart_btn" data-bs-toggle="tooltip" data-bs-placement="top"
                                        aria-label="Add to cart" data-bs-original-title="Add to cart">
                                        <i class="fa-solid fa-cart-shopping"></i>
                                    </button>
                                    <button class="btn icon_btn" data-bs-toggle="tooltip" data-bs-placement="top"
                                        aria-label="Quick view " data-bs-original-title="Quick view ">
                                        <i class="fa-solid fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- product card end -->
                    <!-- product card start -->
                    <div class="card product_card">
                        <img src="./assets/images/category3.jpg" class="card-img-top" alt="product img 1">
                        <span class="product_trendtext">Trending</span>
                        <div class="card-body">
                            <a href="#">
                                <h5 class="card-title">Stylish Summer Outfit</h5>
                            </a>
                            <div class="product_price d-flex align-items-center justify-content-between">
                                <strong class="price">$59.00 </strong>
                                <div class="d-flex gap-2 align-items-center">
                                    <button class="btn cart_btn" data-bs-toggle="tooltip" data-bs-placement="top"
                                        aria-label="Add to cart" data-bs-original-title="Add to cart">
                                        <i class="fa-solid fa-cart-shopping"></i>
                                    </button>
                                    <button class="btn icon_btn" data-bs-toggle="tooltip" data-bs-placement="top"
                                        aria-label="Quick view " data-bs-original-title="Quick view ">
                                        <i class="fa-solid fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- product card end -->
                    <!-- product card start -->
                    <div class="card product_card">
                        <img src="./assets/images/category2.avif" class="card-img-top" alt="product img 1">
                        <span class="product_trendtext">Trending</span>
                        <div class="card-body">
                            <a href="#">
                                <h5 class="card-title">Stylish Summer Outfit</h5>
                            </a>
                            <div class="product_price d-flex align-items-center justify-content-between">
                                <strong class="price">$59.00 </strong>
                                <div class="d-flex gap-2 align-items-center">
                                    <button class="btn cart_btn" data-bs-toggle="tooltip" data-bs-placement="top"
                                        aria-label="Add to cart" data-bs-original-title="Add to cart">
                                        <i class="fa-solid fa-cart-shopping"></i>
                                    </button>
                                    <button class="btn icon_btn" data-bs-toggle="tooltip" data-bs-placement="top"
                                        aria-label="Quick view " data-bs-original-title="Quick view ">
                                        <i class="fa-solid fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- product card end -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- filter and products section end -->

<?php include('./templates/footer.php'); ?>