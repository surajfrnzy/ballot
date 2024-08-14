<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Voting System</title>
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <nav class="navbar">
        <div class="navcontainer">
            <div class="logo-container">
                <img src="assets/ballot.png" class="logo" alt="Ballot Logo">

            </div>
            <?php if (isset($_SESSION['user_role'])) : ?>
                <button class="logout-btn" aria-label="Logout" onclick="window.location.href='php/logout.php'">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </button>
            <?php endif; ?>
        </div>
    </nav>
</body>

</html>