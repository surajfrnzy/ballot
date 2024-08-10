<?php include('templates/header.php'); ?>
<div class="signup-container">
    <h2 class="signup-heading">Sign Up</h2>
    <form action="php/register.php" method="POST" id="signupForm" class="signup-form">
        <div class="form-group">
            <label for="name" class="form-label">Name:</label>
            <div class="input-container">
                <i class="fas fa-user input-icon"></i>
                <input type="text" id="name" name="name" class="form-input" required>
            </div>
        </div>
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
                <button type="button" id="toggle-password" class="toggle-password-btn">
                    <i class="fas fa-eye"></i>
                </button>
            </div>
        </div>
        <div class="form-group">
            <label for="confirm_password" class="form-label">Confirm Password:</label>
            <div class="password-container">
                <i class="fas fa-lock input-icon"></i>
                <input type="password" id="confirm_password" name="confirm_password" class="form-input" required>
                 <button type="button" id="c-toggle-password" class="toggle-password-btn">
                    <i class="fas fa-eye"></i>
                </button>
                <span id="message" class="password-message"></span>
            </div>
        </div>
        <button type="submit" class="submit-btn">Sign Up</button>
    </form>
    <div class="login-container">
        <p>Already have an account? <a href="login.php" class="login-link">Login here</a></p>
    </div>
</div>

<?php include('templates/footer.php'); ?>
