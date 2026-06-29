<?php
$page_title = "Daily Matches Recommendations";
include 'includes/header.php';
?>
<main class="dashboard-container">
    <?php include 'includes/user-sidebar.php'; ?>
    <div class="dashboard-content">
        <div class="container-fluid px-0">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h4 class="fw-bold mb-1"><i class="bi bi-magic text-primary me-2"></i>Daily Recommendations</h4>
                    <p class="text-muted small mb-0">10 Handpicked partner matches loaded specifically for Rohan today.</p>
                </div>
            </div>
            <div class="row" id="matches-list-container">
                <!-- Loaded dynamically by main.js matches loader -->
            </div>
        </div>
    </div>
</main>
<?php
include 'includes/footer.php';
?>