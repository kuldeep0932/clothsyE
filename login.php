<?php 
include('./templates/header.php'); 
?>

<!-- Login Form -->
<section class="register-section">
    <div class="form-container">
        <h2>Login to Clothsy</h2>
        <p>Welcome back! Please enter your details</p>

        <form action="./validations/user_login.php" method="POST">

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
                    <input type="password" id="password" placeholder="Enter your password" name="password" required />
                </div>
            </div>

            <div class="form-group checkbox">
                <input type="checkbox" id="remember" name="remember" />
                <label for="remember">Remember Me</label>
            </div>

            <button type="submit" class="submit-btn">Login</button>

        </form>

        <p class="signin-link">Don't have an account? <a href="<?php echo('./register.php') ?>">Create one</a></p>
    </div>
</section>

<?php include('./templates/footer.php'); ?>
