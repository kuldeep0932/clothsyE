<?php include('./templates/header.php'); ?>

<!-- Registration Form -->
<section class="register-section">
    <div class="form-container">
        <h2>Join Clothsy</h2>
        <p>Create your account and start your style journey</p>
        <form action="./validations/user_register.php" method="POST">
            <div class="form_main_group">
                <div class="form-group">
                    <label for="firstName">First Name</label>
                    <div class="input_box">
                        <i class="fa-solid fa-user icon"></i>
                        <input type="text" id="firstName" placeholder="John" name="first_name" required />
                    </div>
                </div>
                <div class="form-group">
                    <label for="lastName">Last Name</label>
                    <div class="input_box">
                        <i class="fa-solid fa-user icon"></i>
                        <input type="text" id="lastName" placeholder="Doe" name="last_name" required />
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="email">Email Address</label>
                <div class="input_box">
                    <i class="fa-solid fa-envelope"></i>
                    <input type="email" id="email" placeholder="john@example.com" name="email_add" required />
                </div>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <div class="input_box">
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" id="password" placeholder="Create a strong password" name="password" required />
                </div>
            </div>
            <div class="form-group checkbox">
                <input type="checkbox" id="agree" name="agree" required />
                <label for="agree">I agree to the <a href="/terms">Terms of Service</a> and <a href="/privacy">Privacy Policy</a></label>
            </div>
            <button type="submit" class="submit-btn">Create Account</button>
        </form>
        <p class="signin-link">Already have an account? <a href="<?php echo('./login.php') ?>">Sign in here</a></p>
    </div>
</section>

<?php include('./templates/footer.php'); ?>