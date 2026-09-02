<?php
$pageTitle = "About Us - Clothsy";
$pageDescription = "Welcome to the homepage of My Website. Discover amazing content.";
$pageKeywords = "home, my website, awesome content";
?>
<?php include('./templates/header.php'); ?>
<!-- page header section banner start -->
<section class="clothsy-shop-banner">
    <div class="container">

        <div class="clothsy-shop-banner-content">

            <h1>About Us</h1>

            <div class="clothsy-breadcrumb">
                <a href="/">Home</a>
                <span class="arrow">›</span>
                <span class="current">About Us</span>
            </div>

        </div>
    </div>
</section>
<!-- page header section banner end -->

<!-- our story section start -->
<section class="story-section section_padding">
    <div class="container">

        <!-- Left Image -->
        <div class="row gap-5 align-items-center flex-md-nowrap flex-wrap justify-content-between">
            <div class="story-image col-md-6">
                <img src="./assets/images/our_story.jpeg" alt="Clothing store interior" class="img-fluid rounded-4" />
            </div>

            <!-- Right Content -->
            <div class="story-content col-md-6 heading_cont text-start">

                <h4 class="story-label sect_top_heading mx-0">Our Story</h4>

                <h2 class="sect_main_heading mx-0">
                    We're More Than<br />
                    Just a Clothing Store
                </h2>

                <p class="sect_main_para">
                    Clothsy was born out of a passion for fashion and a desire to
                    make stylish, high-quality clothing accessible to everyone.
                    We believe that what you wear is a reflection of who you are,
                    and our mission is to help you express your unique style
                    with confidence.
                </p>

                <p class="sect_main_para">
                    From timeless classics to the latest trends, we carefully
                    curate every piece to ensure the perfect mix of style,
                    comfort, and quality.
                </p>

                <a href="#" class="story-button btn btn_fill btn-lg px-4 me-md-2">
                    Discover Our Collection
                    <span>→</span>
                </a>

            </div>

        </div>

    </div>
</section>
<!-- our story section end -->
<!-- sevices section start -->
<section class="service_sect pb-3 d-md-block d-none">
    <div class="container p-4 rounded-4 shadow-sm serv_main_cont mt-0 sect_bg about_page_serve">
        <div class="row row-gap-4">
            <div class="col-md-4 col-xl-3">
                <div class="card border-0 serv_card bg-transparent">
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
                <div class="card border-0 serv_card bg-transparent">
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
                <div class="card border-0 serv_card bg-transparent">
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
                <div class="card border-0 serv_card bg-transparent">
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
</section>
<!-- sevices section end -->

<!-- why choose us section start -->
<section class="why_choose-section section_padding">
    <div class="container">

        <div class="row gap-5 align-items-center flex-md-nowrap flex-wrap justify-content-between">
            <!-- Left Image -->
            <div class="why_choose-content col-md-5 heading_cont text-start">

                <h4 class="story-label sect_top_heading mx-0">WHY CHOOSE US</h4>

                <h2 class="sect_main_heading mx-0">
                    Quality, Style &</br />
                    Customer Satisfaction
                </h2>

                <p class="sect_main_para">
                    We are committed to providing our customers with the best shopping experience. From premium fabrics
                    to exceptional customer service, we ensure you get the best in every order.
                </p>
                <ul class="ps-4">
                    <li>High-quality fashion at affordable prices</li>
                    <li>Handpicked styles for every occasion</li>
                    <li>Sustainable &amp; ethically sourced materials</li>
                    <li>Dedicated customer support</li>
                </ul>

            </div>

            <!-- Right Content -->
            <div class="why_choose-image col-md-6">
                <img src="./assets/images/why_choose_about.jpeg" alt="Clothing store interior" class="img-fluid rounded-4" />
            </div>
        </div>

    </div>
</section>
<!-- why choose us section end -->

<?php include('./templates/footer.php'); ?>