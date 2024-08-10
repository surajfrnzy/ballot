<?php
session_start();
if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] != 'voter') {
    header("Location: login.php");
    exit();
}
include('templates/header.php');
include('php/db.php');

$view = isset($_GET['view']) ? $_GET['view'] : 'elections';
?>

<div class="dashboard-container">
    <h2 class="dashboard-heading">Voter Dashboard</h2>
    <nav class="dashboard-nav">
        <ul class="nav-list">
            <li class="nav-item">
                <a href="voter.php?view=elections" class="nav-link <?php echo $view == 'elections' ? 'active' : ''; ?>">
                    <i class="fas fa-calendar-check nav-icon"></i>
                    Available Elections
                </a>
            </li>
            <li class="nav-item">
                <a href="voter.php?view=results" class="nav-link <?php echo $view == 'results' ? 'active' : ''; ?>">
                    <i class="fas fa-trophy nav-icon"></i>
                    View Results
                </a>
            </li>
        </ul>
    </nav>

    <div class="content">
        <?php
        if ($view == 'elections') {
            include('php/available_elections.php');
        } elseif ($view == 'results') {
            include('php/view_results_voter.php');
        } elseif ($view == 'vote' && isset($_GET['election_id'])) {
            include('vote.php');
        } else {
            include('php/available_elections.php');
        }
        ?>
    </div>
</div>

<?php include('templates/footer.php'); ?>
