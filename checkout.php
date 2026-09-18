<?php
$pageTitle = "Checkout - Clothsy";
$pageDescription = "Welcome to the homepage of My Website. Discover amazing content.";
$pageKeywords = "home, my website, awesome content";

include('./templates/header.php'); ?>

<style>
    /* =========================================
   RESPONSIVE
========================================= */

    @media (max-width: 991.98px) {

        .clothsy-checkout-card-body {
            padding: 18px;
        }

        .clothsy-checkout-title {
            font-size: 22px;
        }

    }


    @media (max-width: 767.98px) {

        .clothsy-checkout-section {
            padding-top: 15px !important;
            padding-bottom: 15px !important;
        }

        .clothsy-checkout-card-body {
            padding: 16px;
        }

        .clothsy-checkout-title {
            font-size: 21px;
        }

        .clothsy-form-control,
        .clothsy-form-select {
            min-height: 40px;
        }

        .clothsy-product-image {
            width: 52px;
            height: 52px;
            flex-basis: 52px;
        }

    }


    @media (max-width: 575.98px) {

        .clothsy-checkout-card-body {
            padding: 14px;
        }

        .clothsy-checkout-title {
            font-size: 20px;
        }

        .clothsy-product-name {
            font-size: 11px;
        }

        .clothsy-product-price {
            font-size: 11px;
        }

    }
</style>



<!-- page header section banner start -->
<section class="clothsy-shop-banner">
    <div class="container">

        <div class="clothsy-shop-banner-content">

            <h1>Checkout</h1>

            <div class="clothsy-breadcrumb">
                <a href="/">Home</a>
                <span class="arrow">›</span>
                <span class="current">Checkout</span>
            </div>

        </div>
    </div>
</section>
<!-- page header section banner end -->



<section class="clothsy-checkout-section py-4">
    <div class="container px-3 px-md-4">

        <div class="row">

            <!-- Billing Details -->
            <div class="col-lg-7">
                <div class="card clothsy-checkout-card h-100">
                    <div class="card-body clothsy-checkout-card-body">

                        <h2 class="clothsy-checkout-title mb-4">
                            Billing Details
                        </h2>

                        <form class="clothsy-billing-form">

                            <!-- First Name / Last Name -->
                            <div class="row g-3 mb-3">

                                <div class="col-md-6">
                                    <label class="clothsy-form-label">
                                        First Name
                                        <span class="text-danger">*</span>
                                    </label>

                                    <input type="text" class="form-control clothsy-form-control"
                                        placeholder="Enter your first name">
                                </div>

                                <div class="col-md-6">
                                    <label class="clothsy-form-label">
                                        Last Name
                                        <span class="text-danger">*</span>
                                    </label>

                                    <input type="text" class="form-control clothsy-form-control"
                                        placeholder="Enter your last name">
                                </div>

                            </div>

                            <!-- Email -->
                            <div class="mb-3">

                                <label class="clothsy-form-label">
                                    Email Address
                                    <span class="text-danger">*</span>
                                </label>

                                <input type="email" class="form-control clothsy-form-control"
                                    placeholder="you@example.com">

                            </div>

                            <!-- Phone -->
                            <div class="mb-3">

                                <label class="clothsy-form-label">
                                    Phone
                                    <span class="text-danger">*</span>
                                </label>

                                <input type="tel" class="form-control clothsy-form-control"
                                    placeholder="+91 98765 43210">

                            </div>

                            <!-- Country -->
                            <div class="mb-3">

                                <label class="clothsy-form-label">
                                    Country
                                    <span class="text-danger">*</span>
                                </label>

                                <select class="form-select clothsy-form-select">
                                    <option selected>India</option>
                                    <option>United States</option>
                                    <option>United Kingdom</option>
                                    <option>Canada</option>
                                </select>

                            </div>

                            <!-- Street Address -->
                            <div class="mb-3">

                                <label class="clothsy-form-label">
                                    Street Address
                                    <span class="text-danger">*</span>
                                </label>

                                <input type="text" class="form-control clothsy-form-control"
                                    placeholder="House number and street name">

                            </div>

                            <!-- City / State / ZIP -->
                            <div class="row g-3 mb-3">

                                <div class="col-md-4">

                                    <label class="clothsy-form-label">
                                        City
                                        <span class="text-danger">*</span>
                                    </label>

                                    <input type="text" class="form-control clothsy-form-control"
                                        placeholder="Enter your city">

                                </div>

                                <div class="col-md-4">

                                    <label class="clothsy-form-label">
                                        State
                                        <span class="text-danger">*</span>
                                    </label>

                                    <select class="form-select clothsy-form-select">
                                        <option selected disabled>
                                            Select state
                                        </option>
                                        <option>Haryana</option>
                                        <option>Delhi</option>
                                        <option>Punjab</option>
                                        <option>Uttar Pradesh</option>
                                        <option>Rajasthan</option>
                                    </select>

                                </div>

                                <div class="col-md-4">

                                    <label class="clothsy-form-label">
                                        ZIP Code
                                        <span class="text-danger">*</span>
                                    </label>

                                    <input type="text" class="form-control clothsy-form-control"
                                        placeholder="Enter ZIP code">

                                </div>

                            </div>

                            <!-- Order Notes -->
                            <div class="mb-3">

                                <label class="clothsy-form-label">
                                    Order Notes
                                </label>

                                <textarea class="form-control clothsy-form-control clothsy-order-notes" rows="3"
                                    placeholder="Notes about your order, e.g. special instructions..."></textarea>

                            </div>

                            <!-- Different Address -->
                            <div class="form-check clothsy-different-address">

                                <input class="form-check-input clothsy-checkbox" type="checkbox"
                                    id="clothsyDifferentAddress">

                                <label class="form-check-label clothsy-checkbox-label" for="clothsyDifferentAddress">
                                    Ship to a different address
                                </label>

                            </div>

                        </form>

                    </div>
                </div>
            </div>


            <!-- Order -->
            <div class="col-lg-5">

                <div class="card clothsy-checkout-card">
                    <div class="card-body clothsy-checkout-card-body">

                        <h2 class="clothsy-checkout-title mb-4">
                            Your Order
                        </h2>


                        <!-- Product 1 -->
                        <div class="clothsy-order-product">

                            <img src="./assets/images/category3.jpg" alt="Stylish Denim Shirt" class="clothsy-product-image">

                            <div class="clothsy-product-info">

                                <h6 class="clothsy-product-name">
                                    Stylish Denim Shirt
                                </h6>

                                <span class="clothsy-product-qty">
                                    Qty: 1
                                </span>

                            </div>

                            <span class="clothsy-product-price">
                                $59.00
                            </span>

                        </div>


                        <!-- Product 2 -->
                        <div class="clothsy-order-product">

                            <img src="./assets/images/category4.jpg" alt="Cotton Polo T-Shirt" class="clothsy-product-image">

                            <div class="clothsy-product-info">

                                <h6 class="clothsy-product-name">
                                    Cotton Polo T-Shirt
                                </h6>

                                <span class="clothsy-product-qty">
                                    Qty: 1
                                </span>

                            </div>

                            <span class="clothsy-product-price">
                                $29.00
                            </span>

                        </div>


                        <!-- Product 3 -->
                        <div class="clothsy-order-product">

                            <img src="./assets/images/category1.jpg" alt="Black Denim Jacket" class="clothsy-product-image">

                            <div class="clothsy-product-info">

                                <h6 class="clothsy-product-name">
                                    Black Denim Jacket
                                </h6>

                                <span class="clothsy-product-qty">
                                    Qty: 1
                                </span>

                            </div>

                            <span class="clothsy-product-price">
                                $75.00
                            </span>

                        </div>


                        <!-- Price Summary -->
                        <div class="clothsy-price-summary">

                            <div class="clothsy-price-row">
                                <span>Subtotal</span>
                                <span>$163.00</span>
                            </div>

                            <div class="clothsy-price-row">
                                <span>Shipping</span>
                                <span>$5.00</span>
                            </div>

                            <div class="clothsy-price-row">
                                <span>Tax (10%)</span>
                                <span>$16.80</span>
                            </div>

                        </div>


                        <!-- Total -->
                        <div class="clothsy-total-row">

                            <h5 class="clothsy-total-label">
                                Total
                            </h5>

                            <h4 class="clothsy-total-price">
                                $184.80
                            </h4>

                        </div>


                        <!-- Payment -->
                        <h2 class="clothsy-payment-title">
                            Payment Method
                        </h2>


                        <div class="clothsy-payment-methods">

                            <!-- Credit Card -->
                            <div class="clothsy-payment-option">

                                <input class="form-check-input clothsy-payment-radio" type="radio" name="paymentMethod"
                                    id="clothsyCreditCard" checked>

                                <label class="form-check-label clothsy-payment-label" for="clothsyCreditCard">

                                    <strong>
                                        Credit/Debit Card
                                    </strong>

                                    <small>
                                        Pay securely with your card.
                                    </small>

                                </label>

                            </div>


                            <!-- UPI -->
                            <div class="clothsy-payment-option">

                                <input class="form-check-input clothsy-payment-radio" type="radio" name="paymentMethod"
                                    id="clothsyUpi">

                                <label class="form-check-label clothsy-payment-label" for="clothsyUpi">

                                    <strong>
                                        UPI
                                    </strong>

                                    <small>
                                        Pay with UPI apps like Google Pay, PhonePe, etc.
                                    </small>

                                </label>

                            </div>


                            <!-- Cash on Delivery -->
                            <div class="form-check clothsy-payment-option">

                                <input class="form-check-input clothsy-payment-radio" type="radio" name="paymentMethod"
                                    id="clothsyCod">

                                <label class="form-check-label clothsy-payment-label" for="clothsyCod">

                                    <strong>
                                        Cash on Delivery
                                    </strong>

                                    <small>
                                        Pay when you receive your order.
                                    </small>

                                </label>

                            </div>

                        </div>


                        <!-- Place Order -->
                        <button type="submit" class="btn clothsy-place-order-btn btn_fill w-100">Place Order</button>
                    </div>
                </div>

            </div>

        </div>

    </div>
</section>

<?php include('./templates/footer.php'); ?>