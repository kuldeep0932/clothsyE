<?php
$pageTitle = "Cart - Clothsy";
$pageDescription = "Welcome to the homepage of My Website. Discover amazing content.";
$pageKeywords = "home, my website, awesome content";

include('./templates/header.php'); ?>

<style>
    /* =========================================
   TABLET
========================================= */

    @media (max-width: 991px) {

        .cart-box {
            padding-left: 18px;
            padding-right: 18px;
        }

        .product-img {
            width: 78px;
            height: 84px;
            flex-basis: 78px;
        }

    }


    /* =========================================
   MOBILE
========================================= */

    @media (max-width: 767px) {

        .cart-section {
            padding-top: 15px !important;
        }

        .cart-box {
            padding: 0 15px 15px;
        }

        .cart-item {
            padding-top: 20px !important;
            padding-bottom: 20px !important;
        }

        .product-img {
            width: 75px;
            height: 82px;
            flex-basis: 75px;
        }

        .product-info h6 {
            font-size: 13px;
        }

        .delete-product {
            right: 0;
            top: 32px;
            transform: none;
        }

        .summary-box {
            padding: 22px 18px;
        }

    }


    /* =========================================
   SMALL MOBILE
========================================= */

    @media (max-width: 480px) {

        .product-img {
            width: 70px;
            height: 76px;
            flex-basis: 70px;
        }

        .product-info h6 {
            font-size: 12px;
        }

        .product-info p {
            font-size: 10px;
        }

        .product-price {
            font-size: 13px;
        }

    }
</style>

<!-- page header section banner start -->
<section class="clothsy-shop-banner">
    <div class="container">

        <div class="clothsy-shop-banner-content">

            <h1>Cart</h1>

            <div class="clothsy-breadcrumb">
                <a href="/">Home</a>
                <span class="arrow">›</span>
                <span class="current">Cart</span>
            </div>

        </div>
    </div>
</section>
<!-- page header section banner end -->


<section class="cart-section py-4">
    <div class="container">

        <div class="row g-4">

            <!--------------- LEFT CART ------------>
            <div class="col-lg-8">

                <div class="cart-box">

                    <!-- Cart Header -->
                    <div class="row cart-heading align-items-center d-none d-md-flex">

                        <div class="col-md-6 fw-bold fs-6">
                            Product
                        </div>

                        <div class="col-md-2 text-center fw-bold fs-6">
                            Price
                        </div>

                        <div class="col-md-2 text-center fw-bold fs-6">
                            Quantity
                        </div>

                        <div class="col-md-2 text-center fw-bold fs-6">
                            Total
                        </div>

                    </div>


                    <!------ PRODUCT 1 ---------->
                    <div class="cart-item py-3">

                        <div class="row align-items-center g-3">

                            <!-- Product -->
                            <div class="col-md-6">

                                <div class="d-flex align-items-center gap-3">

                                    <div class="product-img">
                                        <img src="./assets/images/category4.jpg" alt="Stylish Denim Shirt"
                                            class="img-fluid">
                                    </div>

                                    <div class="product-info">

                                        <h6>
                                            Stylish Denim Shirt
                                        </h6>


                                    </div>

                                </div>

                            </div>


                            <!-- Price -->
                            <div class="col-6 col-md-2 text-md-center">

                                <span class="mobile-title d-md-none">
                                    Price
                                </span>

                                <strong class="product-price">
                                    $59.00
                                </strong>

                            </div>


                            <!-- Quantity -->
                            <div class="col-6 col-md-2">

                                <span class="mobile-title d-md-none">
                                    Quantity
                                </span>

                                <div class="quantity-box mx-md-auto">

                                    <button type="button">
                                        −
                                    </button>

                                    <span>1</span>

                                    <button type="button">
                                        +
                                    </button>

                                </div>

                            </div>


                            <!-- Total -->
                            <div class="col-6 col-md-2 text-md-center">

                                <span class="mobile-title d-md-none">
                                    Total
                                </span>

                                <strong class="product-price">
                                    $59.00
                                </strong>

                            </div>


                            <!-- Delete -->
                            <button class="delete-product" type="button" aria-label="Remove product">

                                <i class="fa-regular fa-trash-can"></i>

                            </button>

                        </div>

                    </div>


                    <!------ PRODUCT 2 ---------->
                    <div class="cart-item py-3">

                        <div class="row align-items-center g-3">

                            <!-- Product -->
                            <div class="col-md-6">

                                <div class="d-flex align-items-center gap-3">

                                    <div class="product-img">
                                        <img src="./assets/images/category3.jpg" alt="Cotton Polo T-Shirt"
                                            class="img-fluid">
                                    </div>

                                    <div class="product-info">

                                        <h6>
                                            Cotton Polo T-Shirt
                                        </h6>


                                    </div>

                                </div>

                            </div>


                            <!-- Price -->
                            <div class="col-6 col-md-2 text-md-center">

                                <span class="mobile-title d-md-none">
                                    Price
                                </span>

                                <strong class="product-price">
                                    $29.00
                                </strong>

                            </div>


                            <!-- Quantity -->
                            <div class="col-6 col-md-2">

                                <span class="mobile-title d-md-none">
                                    Quantity
                                </span>

                                <div class="quantity-box mx-md-auto">

                                    <button type="button">
                                        −
                                    </button>

                                    <span>1</span>

                                    <button type="button">
                                        +
                                    </button>

                                </div>

                            </div>


                            <!-- Total -->
                            <div class="col-6 col-md-2 text-md-center">

                                <span class="mobile-title d-md-none">
                                    Total
                                </span>

                                <strong class="product-price">
                                    $29.00
                                </strong>

                            </div>


                            <!-- Delete -->
                            <button class="delete-product" type="button" aria-label="Remove product">

                                <i class="fa-regular fa-trash-can"></i>

                            </button>

                        </div>

                    </div>


                    <!------ PRODUCT 3 ---------->
                    <div class="cart-item py-3">

                        <div class="row align-items-center g-3">

                            <!-- Product -->
                            <div class="col-md-6">

                                <div class="d-flex align-items-center gap-3">

                                    <div class="product-img">
                                        <img src="./assets/images/category1.jpg" alt="Black Denim Jacket"
                                            class="img-fluid">
                                    </div>

                                    <div class="product-info">

                                        <h6>
                                            Black Denim Jacket
                                        </h6>

                                    </div>

                                </div>

                            </div>


                            <!-- Price -->
                            <div class="col-6 col-md-2 text-md-center">

                                <span class="mobile-title d-md-none">
                                    Price
                                </span>

                                <strong class="product-price">
                                    $75.00
                                </strong>

                            </div>


                            <!-- Quantity -->
                            <div class="col-6 col-md-2">

                                <span class="mobile-title d-md-none">
                                    Quantity
                                </span>

                                <div class="quantity-box mx-md-auto">

                                    <button type="button">
                                        −
                                    </button>

                                    <span>1</span>

                                    <button type="button">
                                        +
                                    </button>

                                </div>

                            </div>


                            <!-- Total -->
                            <div class="col-6 col-md-2 text-md-center">

                                <span class="mobile-title d-md-none">
                                    Total
                                </span>

                                <strong class="product-price">
                                    $75.00
                                </strong>

                            </div>


                            <!-- Delete -->
                            <button class="delete-product" type="button" aria-label="Remove product">

                                <i class="fa-regular fa-trash-can"></i>

                            </button>

                        </div>

                    </div>


                    <!-- Continue Shopping -->
                    <div class="continue-shopping pt-3">

                        <a href="#">

                            <i class="fa-solid fa-arrow-left"></i>

                            <span>
                                Continue Shopping
                            </span>

                        </a>

                    </div>

                </div>

            </div>


            <!-- RIGHT ORDER SUMMARY -->
            <div class="col-lg-4">

                <div class="summary-box">

                    <h2>
                        Order Summary
                    </h2>


                    <!-- Subtotal -->
                    <div class="d-flex justify-content-between summary-row">

                        <span>
                            Subtotal
                        </span>

                        <strong>
                            $163.00
                        </strong>

                    </div>


                    <!-- Shipping -->
                    <div class="d-flex justify-content-between summary-row">

                        <span>
                            Shipping
                        </span>

                        <strong>
                            $5.00
                        </strong>

                    </div>


                    <!-- Tax -->
                    <div class="d-flex justify-content-between summary-row">

                        <span>
                            Tax (10%)
                        </span>

                        <strong>
                            $16.80
                        </strong>

                    </div>


                    <!-- Divider -->
                    <hr class="summary-divider">


                    <!-- Total -->
                    <div class="d-flex justify-content-between align-items-center">

                        <span class="final-total-title">
                            Total
                        </span>

                        <strong class="final-total">
                            $184.80
                        </strong>

                    </div>


                    <!-- Checkout Button -->
                    <a href="#" class="checkout-button btn btn_fill w-100 mt-2">

                        <i class="fa-solid fa-lock"></i>

                        <span>
                            Proceed to Checkout
                        </span>

                        <i class="fa-solid fa-arrow-right"></i>

                    </a>


                    <!-- Secure Checkout -->
                    <div class="secure-box mt-4">

                        <div class="secure-icon">

                            <i class="fa-solid fa-shield-halved"></i>

                        </div>

                        <div>

                            <strong>
                                Secure Checkout
                            </strong>

                            <p class="mb-0">
                                Your information is safe with us.
                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>
</section>


<?php include('./templates/footer.php'); ?>