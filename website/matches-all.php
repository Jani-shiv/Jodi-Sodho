<?php
$page_title = "All Matches";
include 'includes/header.php';
?>
<main class="dashboard-container">
    <?php include 'includes/user-sidebar.php'; ?>
    <div class="dashboard-content">
        <div class="container-fluid px-0">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="fw-bold mb-0">All Potential Matches</h4>
                <select class="form-select form-select-sm" style="width: auto;">
                    <option>Filter: Best Matches</option>
                    <option>Filter: Newly Signed Up</option>
                </select>
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