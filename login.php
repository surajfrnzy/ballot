<?php include('templates/header.php'); ?>
<div class="login-container">
    <h2 class="login-heading">Login</h2>
    <form action="php/login.php" method="POST" class="login-form">
        <div class="form-group">
            <label for="email" class="form-label">Email:</label>
            <div class="input-container">
                <i class="fas fa-envelope input-icon"></i>
                <input type="email" id="email" name="email" class="form-input" required>
            </div>
        </div>
        <div class="form-group">
            <label for="password" class="form-label">Password:</label>
            <div class="password-container">
                <i class="fas fa-lock input-icon"></i>
                <input type="password" id="password" name="password" class="form-input" required>
                <button type="button" id="toggle-password" class="toggle-password-btn"><i class="fas fa-eye"></i></button>
            </div>
        </div>
        <button type="submit" class="submit-btn">Login</button>
    </form>
    <div class="register-container">
        <p>Don't have an account? <a href="signup.php" class="register-link">Register Here</a></p>
    </div>
</div>
<?php include('templates/footer.php'); ?>
