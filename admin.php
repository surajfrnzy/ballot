<?php
session_start();
if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] != 'admin') {
    if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'voter') {
        header("Location: index.php");
    } else {
        header("Location: login.php");
    }
    exit();
}
include('templates/header.php');
include('php/db.php');
$view = isset($_GET['view']) ? $_GET['view'] : 'elections';
?>

<div class="dashboard-container">
    <h2 class="dashboard-heading"><i class="fas fa-tachometer-alt"></i> Admin Dashboard</h2>
    <nav class="dashboard-nav">
        <ul class="nav-list">
            <li><a href="admin.php?view=elections" class='nav-link <?php echo $view == "elections" ? "active" : ""; ?>'><i class="fas fa-calendar-alt"></i> Manage Elections</a></li>
            <li><a href="admin.php?view=candidates" class='nav-link <?php echo $view == "candidates" ? "active" : ""; ?>'><i class="fas fa-user-tie"></i> Manage Candidates</a></li>
            <li><a href="admin.php?view=results" class='nav-link <?php echo $view == "results" ? "active" : ""; ?>'><i class="fas fa-chart-line"></i> View Results</a></li>
        </ul>
    </nav>

    <div class="content">
        <?php
        if (isset($_GET['view'])) {
            $view = $_GET['view'];
            if ($view == 'elections') {
                include('php/manage_elections.php');
            } elseif ($view == 'candidates') {
                include('php/manage_candidates.php');
            } elseif ($view == 'results') {
                include('php/view_results.php');
            }
        } else {
            include('php/manage_elections.php');
        }
        ?>
    </div>
</div>

<?php include('templates/footer.php'); ?>