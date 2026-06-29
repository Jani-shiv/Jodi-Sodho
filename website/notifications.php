<?php
$page_title = "Platform Notifications Alerts";
include 'includes/header.php';
?>
<main class="dashboard-container">
    <?php include 'includes/user-sidebar.php'; ?>
    <div class="dashboard-content">
        <div class="container-fluid px-0">
            <div class="card p-4 border shadow-sm bg-white rounded-3">
                <h4 class="fw-bold mb-4"><i class="bi bi-bell-fill text-primary me-2"></i>Notifications Log Center</h4>
                
                <div class="list-group list-group-flush">
                    <div class="list-group-item py-3 px-0 border-light d-flex align-items-center gap-3">
                        <span class="bg-primary-light text-primary rounded-circle p-2"><i class="bi bi-chat-dots-fill"></i></span>
                        <div class="flex-grow-1">
                            <h6 class="mb-1 text-dark fw-bold">New Message from Ananya Sharma</h6>
                            <p class="text-muted small mb-0">Ananya sent you a direct message in your inbox chat window.</p>
                        </div>
                        <span class="text-muted small">5 mins ago</span>
                    </div>
                    <div class="list-group-item py-3 px-0 border-light d-flex align-items-center gap-3">
                        <span class="bg-secondary-light text-secondary rounded-circle p-2"><i class="bi bi-heart-fill"></i></span>
                        <div class="flex-grow-1">
                            <h6 class="mb-1 text-dark fw-bold">Interest Received from Jaspreet Kaur</h6>
                            <p class="text-muted small mb-0">Jaspreet expressed matchmaking interest. Review under Received Connections.</p>
                        </div>
                        <span class="text-muted small">1 hour ago</span>
                    </div>
                    <div class="list-group-item py-3 px-0 border-light d-flex align-items-center gap-3">
                        <span class="bg-success text-white rounded-circle p-2" style="background:#d4edda !important; color:#28a745 !important;"><i class="bi bi-check-circle-fill"></i></span>
                        <div class="flex-grow-1">
                            <h6 class="mb-1 text-dark fw-bold">Identity Verification Document Approved</h6>
                            <p class="text-muted small mb-0">Your Aadhaar verification document was approved. Green Badge added.</p>
                        </div>
                        <span class="text-muted small">Yesterday</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php
include 'includes/footer.php';
?>