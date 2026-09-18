<?php
$pageTitle = "Single product - Clothsy";
$pageDescription = "Welcome to the homepage of My Website. Discover amazing content.";
$pageKeywords = "home, my website, awesome content";

include('./templates/header.php'); ?>

<style>
    /* -------------------------
       RESPONSIVE
    ------------------------- */

    @media (max-width: 991.98px) {

        .product-tabs {
            height: auto;
            padding-left: 20px;
            flex-wrap: wrap;
        }

        .product-tabs .nav-item {
            margin-right: 15px;
        }

        .product-tabs .nav-link {
            height: 50px;
            font-size: 12px;
        }

        #description {
            padding: 20px;
        }

        .description-left {
            padding-right: 0;
        }

        .product-info {
            margin: 20px 0 0;
        }

        #reviews,
        #shipping {
            padding: 20px;
        }

        .reviews-wrapper,
        .shipping-wrapper {
            padding-top: 0;
        }
    }

    @media (max-width: 575.98px) {

        .product-tabs {
            padding-left: 10px;
        }

        .product-tabs .nav-item {
            margin-right: 5px;
        }

        .product-tabs .nav-link {
            padding: 0 7px;
            font-size: 11px;
        }

        .info-label,
        .info-value {
            font-size: 12px;
            padding: 8px 10px;
        }

        #reviews,
        #shipping {
            padding: 15px;
        }

        .reviews-header h5,
        .shipping-section h5 {
            font-size: 14px;
        }

        .review-item p,
        .shipping-section p,
        .shipping-section ul li {
            font-size: 12px;
        }

        .review-top strong,
        .reviews-header span {
            font-size: 12px;
        }
    }
</style>


<section class="product-single-section section_padding pt-5">
    <div class="container">
        <div class="row ">
            <!-- bredcrumb section start -->
            <div class="col-12 pb-3">
                <div class="clothsy-breadcrumb">
                    <a href="/">Home</a>
                    <span class="arrow">›</span>
                    <span class="current">Stylish Summer Outfit</span>
                </div>
            </div>
            <!-- bredcrumb section end -->

            <!-- ========================= PRODUCT IMAGES ========================== -->

            <div class="col-lg-6">

                <img src="http://localhost/clothsyE/assets/images/category3.jpg"
                    class="img-fluid rounded h-100 object-fit-cover" alt="Product Name">


            </div>


            <!-- ========================= PRODUCT DETAILS ========================== -->

            <div class="col-lg-6">

                <!-- Product Badge -->
                <span class="badge bottom-0 top-0 start-0 mb-3 product_trendtext position-relative">
                    Trending
                </span>


                <!-- Product Name -->
                <h2 class="fw-bold" id="productQuickViewLabel">
                    Stylish Summer Outfit
                </h2>


                <!-- Rating -->
                <div class="d-flex align-items-center gap-2 mb-3">

                    <span class="text-warning">
                        ★★★★★
                    </span>

                    <span class="text-muted">
                        (48 reviews)
                    </span>

                    <span class="text-success">
                        Available In Stock
                    </span>

                </div>


                <!-- Price -->
                <div class="mb-3">

                    <span class="fs-3 fw-bold text-danger">
                        $59.00
                    </span>

                    <span class="text-muted text-decoration-line-through ms-2">
                        $79.00
                    </span>

                    <span class="badge bg-danger-subtle text-danger ms-2">
                        -25%
                    </span>

                </div>


                <!-- Description -->
                <p class="text-muted">
                    Stay cool and stylish this summer with our
                    premium quality outfit. Lightweight, breathable
                    and perfect for any casual occasion.
                </p>


                <!-- ========================= SIZE ========================== -->

                <div class="mb-4">

                    <div class="d-flex justify-content-between">

                        <h6 class="fw-bold">
                            Size:
                        </h6>

                    </div>


                    <div class="d-flex flex-wrap gap-2 size_btn_group">

                        <button type="button" class="btn btn-outline-secondary">
                            XS
                        </button>

                        <button type="button" class="btn btn-outline-secondary active">
                            S
                        </button>

                        <button type="button" class="btn btn-outline-secondary">
                            M
                        </button>

                        <button type="button" class="btn btn-outline-secondary">
                            L
                        </button>

                        <button type="button" class="btn btn-outline-secondary">
                            XL
                        </button>

                        <button type="button" class="btn btn-outline-secondary">
                            XXL
                        </button>

                    </div>

                </div>


                <!-- ========================= QUANTITY ========================== -->

                <div class="mb-4">

                    <h6 class="fw-bold">
                        Quantity:
                    </h6>

                    <div class="input-group quantity_inputsbox" style="max-width: 150px;">

                        <button class="btn btn-outline-secondary" type="button">
                            −
                        </button>

                        <input type="text" class="form-control text-center" value="1">

                        <button class="btn btn-outline-secondary" type="button">
                            +
                        </button>

                    </div>

                </div>


                <!-- ========================= ACTION BUTTONS ========================== -->
                <div class="d-flex align-items-center gap-3">
                    <a href="#" class="btn btn_fill w-100" tabindex="0"><i
                            class="fa-solid fa-cart-shopping me-2"></i>Add To
                        Cart</a>
                    <a href="#" class="btn btn_outline w-100" tabindex="0"><i class="fa-solid fa-bag-shopping me-2"></i>
                        Buy
                        Now</a>
                </div>

            </div>

        </div>
    </div>

    <!-- service provide cards start -->
    <div class="container p-4 rounded-4 shadow-md serv_main_cont  my-4 d-md-block d-none">
        <div class="row row-gap-4">
            <div class="col-md-4 col-xl-3">
                <div class="card border-0 serv_card">
                    <div class="card-body p-0">
                        <div class="service_content_card d-flex align-items-center justify-content-center gap-3">
                            <div class="service_icon">
                                <img src="./assets/images/free_ship.png" alt="service icon" width="40px" height="40px">
                            </div>
                            <div class="service_content">
                                <h3 class="mb-0">Free Shipping</h3>
                                <p class="mb-0">On orders over $50</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-xl-3">
                <div class="card border-0 serv_card">
                    <div class="card-body p-0">
                        <div class="service_content_card d-flex align-items-center justify-content-center gap-3">
                            <div class="service_icon">
                                <img src="./assets/images/easy_return.png" alt="service icon" width="40px"
                                    height="40px">
                            </div>
                            <div class="service_content">
                                <h3 class="mb-0">Easy Return</h3>
                                <p class="mb-0">30 days return policy</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-xl-3">
                <div class="card border-0 serv_card">
                    <div class="card-body p-0">
                        <div class="service_content_card d-flex align-items-center justify-content-center gap-3">
                            <div class="service_icon">
                                <img src="./assets/images/secure-payment.png" alt="service icon" width="40px"
                                    height="40px">
                            </div>
                            <div class="service_content">
                                <h3 class="mb-0">Secure Payment</h3>
                                <p class="mb-0">100% secure checkout</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-xl-3">
                <div class="card border-0 serv_card">
                    <div class="card-body p-0">
                        <div class="service_content_card d-flex align-items-center justify-content-center gap-3">
                            <div class="service_icon">
                                <img src="./assets/images/support.png" alt="service icon" width="40px" height="40px">
                            </div>
                            <div class="service_content">
                                <h3 class="mb-0">24/7 Support</h3>
                                <p class="mb-0">Dedicated support</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- service provide cards end -->

    <!-- Product Description start -->
    <div class="container py-2">
        <div class="product-details">

            <!-- Tabs -->
            <ul class="nav nav-tabs product-tabs" id="productTabs" role="tablist">

                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="description-tab" data-bs-toggle="tab"
                        data-bs-target="#description" type="button" role="tab" aria-controls="description"
                        aria-selected="true">
                        Description
                    </button>
                </li>

                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="additional-tab" data-bs-toggle="tab" data-bs-target="#additional"
                        type="button" role="tab" aria-controls="additional" aria-selected="false">
                        Additional Information
                    </button>
                </li>

                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews"
                        type="button" role="tab" aria-controls="reviews" aria-selected="false">
                        Reviews (48)
                    </button>
                </li>

                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="shipping-tab" data-bs-toggle="tab" data-bs-target="#shipping"
                        type="button" role="tab" aria-controls="shipping" aria-selected="false">
                        Shipping &amp; Returns
                    </button>
                </li>

            </ul>

            <!-- Tab Content -->
            <div class="tab-content product-tab-content" id="productTabsContent">

                <!-- Description -->
                <div class="tab-pane fade show active" id="description" role="tabpanel"
                    aria-labelledby="description-tab">

                    <div class="row g-0">

                        <!-- Left Description -->
                        <div class="col-lg-5 description-left">

                            <p class="description-text">
                                This stylish summer outfit is crafted with high-quality fabric to
                                keep you comfortable all day long. Its modern design makes it a
                                perfect choice for casual outings, travel, or weekend wear.
                            </p>

                            <ul class="feature-list">

                                <li>
                                    <span class="check-icon">✓</span>
                                    <span>Premium quality fabric</span>
                                </li>

                                <li>
                                    <span class="check-icon">✓</span>
                                    <span>Lightweight &amp; breathable</span>
                                </li>

                                <li>
                                    <span class="check-icon">✓</span>
                                    <span>Perfect for summer</span>
                                </li>

                                <li>
                                    <span class="check-icon">✓</span>
                                    <span>Modern and stylish fit</span>
                                </li>

                                <li>
                                    <span class="check-icon">✓</span>
                                    <span>Easy to wash and maintain</span>
                                </li>

                            </ul>
                        </div>

                        <!-- Product Information -->
                        <div class="col-lg-7">

                            <div class="product-info">

                                <div class="info-row">
                                    <div class="info-label">SKU:</div>
                                    <div class="info-value">SSO-2024-BLUE</div>
                                </div>

                                <div class="info-row">
                                    <div class="info-label">Category:</div>
                                    <div class="info-value">Men</div>
                                </div>

                                <div class="info-row">
                                    <div class="info-label">Tags:</div>
                                    <div class="info-value">
                                        Summer, Casual, Shirt, Denim
                                    </div>
                                </div>

                                <div class="info-row">
                                    <div class="info-label">Material:</div>
                                    <div class="info-value">Denim Cotton</div>
                                </div>

                                <div class="info-row">
                                    <div class="info-label">Fit:</div>
                                    <div class="info-value">Regular Fit</div>
                                </div>

                                <div class="info-row">
                                    <div class="info-label">Neck Type:</div>
                                    <div class="info-value">Collar Neck</div>
                                </div>

                                <div class="info-row">
                                    <div class="info-label">Sleeve Style:</div>
                                    <div class="info-value">Full Sleeve</div>
                                </div>

                                <div class="info-row">
                                    <div class="info-label">Care Instructions:</div>
                                    <div class="info-value">Machine wash cold</div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>

                <!-- Additional Information -->
                <div class="tab-pane fade" id="additional" role="tabpanel" aria-labelledby="additional-tab">

                    <div class="product-info">

                        <div class="info-row">
                            <div class="info-label">Brand:</div>
                            <div class="info-value">Stylish Summer</div>
                        </div>

                        <div class="info-row">
                            <div class="info-label">Color:</div>
                            <div class="info-value">Blue</div>
                        </div>

                        <div class="info-row">
                            <div class="info-label">Material:</div>
                            <div class="info-value">Denim Cotton</div>
                        </div>

                        <div class="info-row">
                            <div class="info-label">Fit:</div>
                            <div class="info-value">Regular Fit</div>
                        </div>

                        <div class="info-row">
                            <div class="info-label">Pattern:</div>
                            <div class="info-value">Solid</div>
                        </div>

                        <div class="info-row">
                            <div class="info-label">Occasion:</div>
                            <div class="info-value">Casual, Travel, Weekend Wear</div>
                        </div>

                        <div class="info-row">
                            <div class="info-label">Care:</div>
                            <div class="info-value">Machine wash cold</div>
                        </div>

                    </div>
                </div>


                <!-- Reviews -->
                <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">

                    <div class="reviews-wrapper">

                        <div class="reviews-header">
                            <h5>Customer Reviews</h5>
                            <span>48 Reviews</span>
                        </div>

                        <div class="review-item">
                            <div class="review-top">
                                <strong>John D.</strong>
                                <span class="stars">★★★★★</span>
                            </div>

                            <p>
                                Great quality and very comfortable. The fabric feels lightweight
                                and is perfect for summer.
                            </p>
                        </div>

                        <div class="review-item">
                            <div class="review-top">
                                <strong>Michael R.</strong>
                                <span class="stars">★★★★★</span>
                            </div>

                            <p>
                                Really liked the fitting and overall quality. Looks stylish
                                and feels comfortable to wear.
                            </p>
                        </div>

                        <div class="review-item">
                            <div class="review-top">
                                <strong>David S.</strong>
                                <span class="stars">★★★★☆</span>
                            </div>

                            <p>
                                Nice summer outfit with good fabric quality. Fits as expected.
                            </p>
                        </div>

                    </div>
                </div>


                <!-- Shipping & Returns -->
                <div class="tab-pane fade" id="shipping" role="tabpanel" aria-labelledby="shipping-tab">

                    <div class="shipping-wrapper">

                        <div class="shipping-section">
                            <h5>Shipping Information</h5>

                            <p>
                                We offer fast and reliable shipping on all orders. Your order
                                will be carefully packed and dispatched after confirmation.
                            </p>

                            <ul>
                                <li>Free shipping on eligible orders</li>
                                <li>Orders are usually dispatched within 1–2 business days</li>
                                <li>Delivery time may vary depending on your location</li>
                                <li>Tracking details will be provided after dispatch</li>
                            </ul>
                        </div>

                        <div class="shipping-section">
                            <h5>Returns &amp; Exchanges</h5>

                            <p>
                                If you are not satisfied with your purchase, you can request
                                a return or exchange according to our return policy.
                            </p>

                            <ul>
                                <li>Items must be unused and in original condition</li>
                                <li>Original tags and packaging should be retained</li>
                                <li>Return requests must be submitted within the eligible period</li>
                                <li>Refunds are processed after the returned item is inspected</li>
                            </ul>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Product Description end -->

    <!-- you may also like start -->
    <div class="container mt-3">
        <div class="row m-0 sect_bg py-md-5 py-3 px-md-4 px-2 rounded-3">
            <div class="col-12">
                <!-- heading section start -->
                <div class="heading_cont">
                    <h2 class="sect_main_heading">You May Also Like</h2>
                </div>
                <!-- heading section end -->
            </div>
            <div class="col-12 product_grid_cont d-block also_like_slider pt-md-5 pt-5">
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
            </div>
        </div>
    </div>
    <!-- you may also like end -->

</section>


<?php include('./templates/footer.php'); ?>