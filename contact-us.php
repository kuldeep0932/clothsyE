<?php
$pageTitle = "Contact Us - Clothsy";
$pageDescription = "Welcome to the homepage of My Website. Discover amazing content.";
$pageKeywords = "home, my website, awesome content";

include('./templates/header.php'); ?>

<!-- page header section banner start -->
<section class="clothsy-shop-banner">
    <div class="container">

        <div class="clothsy-shop-banner-content">

            <h1>Contact Us</h1>

            <div class="clothsy-breadcrumb">
                <a href="/">Home</a>
                <span class="arrow">›</span>
                <span class="current">Contact Us</span>
            </div>

        </div>
    </div>
</section>
<!-- page header section banner end -->


<!-- contact page section start -->
<section class="contact-section">

    <div class="container-fluid contact-wrapper">

        <div class="row g-4">

            <!-- LEFT CONTACT FORM -->

            <div class="col-lg-7">

                <div class="contact-card">

                    <h2 class="contact-title">
                        We’d Love To Hear From You!
                    </h2>

                    <p class="contact-description">
                        Have a question, feedback, or need help with your order?<br>
                        Our team is here to assist you. Fill out the form and<br>
                        we’ll get back to you as soon as possible.
                    </p>


                    <form class="contact-form">

                        <!-- NAME -->

                        <div class="form-group">

                            <label for="name" class="form-label">
                                Your Name
                            </label>

                            <div class="input-wrapper">

                                <input type="text" id="name" class="form-control" placeholder="Enter your name">

                                <i class="fa-regular fa-user input-icon"></i>

                            </div>

                        </div>


                        <!-- EMAIL -->

                        <div class="form-group">

                            <label for="email" class="form-label">
                                Email Address
                            </label>

                            <div class="input-wrapper">

                                <input type="email" id="email" class="form-control" placeholder="Enter your email">

                                <i class="fa-regular fa-envelope input-icon"></i>

                            </div>

                        </div>


                        <!-- SUBJECT -->

                        <div class="form-group">

                            <label for="subject" class="form-label">
                                Subject
                            </label>

                            <div class="select-wrapper">

                                <select id="subject" class="form-select">
                                    <option selected>
                                        How can we help you?
                                    </option>

                                    <option>
                                        Order Support
                                    </option>

                                    <option>
                                        General Question
                                    </option>

                                    <option>
                                        Feedback
                                    </option>

                                    <option>
                                        Other
                                    </option>

                                </select>

                                <i class="fa-solid fa-chevron-down select-arrow"></i>

                            </div>

                        </div>


                        <!-- MESSAGE -->

                        <div class="message-group">

                            <label for="message" class="form-label">
                                Message
                            </label>

                            <textarea id="message" class="form-control"
                                placeholder="Write your message here..."></textarea>

                        </div>


                        <!-- SEND -->

                        <button type="submit" class="send-btn btn btn_fill">
                            <span>Send Message</span>
                            <i class="fa-solid fa-paper-plane"></i>
                        </button>

                    </form>

                </div>

            </div>


            <!-- RIGHT CONTACT INFORMATION -->

            <div class="col-lg-5">

                <div class="contact-card info-card">

                    <h2 class="info-title">
                        Contact Information
                    </h2>


                    <!-- ADDRESS -->

                    <div class="info-item">

                        <div class="info-icon">
                            <i class="fa-solid fa-location-dot"></i>
                        </div>

                        <div class="info-content">

                            <div class="info-label">
                                Our Address
                            </div>

                            <p class="info-text">
                                123 Fashion Street, Style City,<br>
                                SC 12345, United States
                            </p>

                        </div>

                    </div>


                    <!-- PHONE -->

                    <div class="info-item">

                        <div class="info-icon">
                            <i class="fa-solid fa-phone"></i>
                        </div>

                        <div class="info-content">

                            <div class="info-label">
                                Phone Number
                            </div>

                            <p class="info-text">
                                +1 234 567 890<br>
                                Mon - Fri, 9:00 AM - 6:00 PM
                            </p>

                        </div>

                    </div>


                    <!-- EMAIL -->

                    <div class="info-item">

                        <div class="info-icon">
                            <i class="fa-regular fa-envelope"></i>
                        </div>

                        <div class="info-content">

                            <div class="info-label">
                                Email Address
                            </div>

                            <p class="info-text">
                                info@clothsy.com<br>
                                support@clothsy.com
                            </p>

                        </div>

                    </div>


                    <!-- SUPPORT -->

                    <div class="info-item">

                        <div class="info-icon">
                            <i class="fa-solid fa-headset"></i>
                        </div>

                        <div class="info-content">

                            <div class="info-label">
                                Customer Support
                            </div>

                            <p class="info-text">
                                We are available 24/7<br>
                                for your support
                            </p>

                        </div>

                    </div>


                    <!-- FOLLOW -->

                    <h3 class="follow-title">
                        Follow Us
                    </h3>


                    <div class="social-links">

                        <a href="#" class="social-link" aria-label="Instagram">
                            <i class="fa-brands fa-instagram"></i>
                        </a>

                        <a href="#" class="social-link" aria-label="Facebook">
                            <i class="fa-brands fa-facebook-f"></i>
                        </a>

                        <a href="#" class="social-link" aria-label="X">
                            <i class="fa-brands fa-x-twitter"></i>
                        </a>

                        <a href="#" class="social-link" aria-label="Pinterest">
                            <i class="fa-brands fa-pinterest-p"></i>
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>
<!-- contact page section end -->

<!-- service section start -->
<section class="service_sect pb-3 d-md-block d-none pt-3 px-2">
    <div class="container p-4 rounded-4 shadow-sm serv_main_cont mt-0 sect_bg about_page_serve contact-wrapper">
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
<!-- service section end -->

<section class="map_section py-3">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="map-main_inner position-relative">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d109744.05905926712!2d76.68831194438661!3d30.7324019832769!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390fed0be66ec96b%3A0xa5ff67f9527319fe!2sChandigarh!5e0!3m2!1sen!2sin!4v1789070195013!5m2!1sen!2sin"
                        width="600" height="450" style="border:0;"></iframe>
                    <!-- store-direction card -->
                    <div class="store-card card p-3">

                        <div class="d-flex align-items-start gap-3">
                            <!-- Location Icon -->
                            <div class="store-icon">
                                <i class="fa-solid fa-location-dot"></i>
                            </div>

                            <div>
                                <!-- Title -->
                                <h5 class="store-title">Visit Our Store</h5>

                                <!-- Address -->
                                <div class="store-address">
                                    123 Fashion Street,<br>
                                    Style City, SC 12345,<br>
                                    United States
                                </div>

                                <!-- Button -->
                                <a href="https://maps.app.goo.gl/KfKX1mZZWVLZjqje8" class="directions-btn btn btn_fill">
                                    Get Directions
                                    <i class="fa-solid fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include('./templates/footer.php'); ?>