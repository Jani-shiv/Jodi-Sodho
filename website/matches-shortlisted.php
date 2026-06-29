<?php
$page_title = "Shortlisted Match lists";
include 'includes/header.php';
?>
<main class="dashboard-container">
    <?php include 'includes/user-sidebar.php'; ?>
    <div class="dashboard-content">
        <div class="container-fluid px-0">
            <div class="mb-4">
                <h4 class="fw-bold mb-1"><i class="bi bi-star-fill text-warning me-2"></i>Shortlisted Match Lists</h4>
                <p class="text-muted small mb-0">Matches you have bookmarked for future connectivity checks.</p>
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