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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <nav class="navbar">
        <div class="navcontainer">
            <div class="logo-container">
                <img src="assets/ballot.png" class="logo" alt="Ballot Logo">

            </div>
            <?php if (isset($_SESSION['user_role'])) : ?>
                <button class="logout-btn" onclick="window.location.href='php/logout.php'">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </button>
            <?php endif; ?>
        </div>
    </nav>
</body>

</html>