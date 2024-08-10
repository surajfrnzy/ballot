<?php
session_start();
if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'admin') {
    header("Location: admin.php");
    exit();
} elseif (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'voter') {
    header("Location: voter.php");
    exit();
}
?>

<?php include('templates/header.php'); ?>

<style>
    .main-container {
        text-align: center;
        margin-top: 50px;
        padding: 0 20px;
    }

    .main-heading {
        font-size: 36px;
        color: #333;
        margin-bottom: 20px;
    }

    .btn-group {
        display: flex;
        justify-content: center;
        gap: 20px;
        margin-top: 20px;
    }

    .btn {
        padding: 12px 24px;
        font-size: 18px;
        text-decoration: none;
        color: white;
        border-radius: 5px;
        transition: background-color 0.3s, transform 0.3s;
    }

    .btn-login {
        background-color: #007bff; 
    }

    .btn-signup {
        background-color: #28a745; 
    }

    .btn-login:hover,
    .btn-signup:hover {
        opacity: 0.9;
        transform: scale(1.05);
    }

    .btn-login:focus,
    .btn-signup:focus {
        outline: none;
    }

    @media (max-width: 768px) {
        .main-heading {
            font-size: 28px;
        }

        .btn {
            padding: 10px 20px;
            font-size: 16px;
        }
    }
</style>

<div class="main-container">
    <h1 class="main-heading">Welcome to The Ballot: An Online Voting System</h1>
    <div class="btn-group">
        <a href="login.php" class="btn btn-login" id="login-btn">Login</a>
        <a href="signup.php" class="btn btn-signup" id="signup-btn">Sign Up</a>
    </div>
</div>

<?php include('templates/footer.php'); ?>
