<?php
$page_title = "Identity Document verification queue";
include 'includes/header.php';
?>
<main class="dashboard-container">
    <?php include 'includes/admin-sidebar.php'; ?>
    <div class="dashboard-content">
        <div class="container-fluid px-0">
            <div class="card p-4 border bg-white shadow-sm rounded-3">
                <h4 class="fw-bold mb-3"><i class="bi bi-check-circle-fill text-success me-2"></i>Identity Verification Document Queue</h4>
                <p class="text-muted small">Verify scans of Aadhaar card, Passports, or driving licenses submitted by candidates.</p>
                
                <div class="table-responsive">
                    <table class="table align-middle text-muted small">
                        <thead>
                            <tr class="text-dark">
                                <th>Candidate Name</th>
                                <th>Document Type</th>
                                <th>Document / Passport ID</th>
                                <th>Document Scan Image</th>
                                <th>Uploaded Date</th>
                                <th>Verification Action Control</th>
                            </tr>
                        </thead>
                        <tbody id="admin-verify-queue-container">
                            <!-- Loaded dynamically via Javascript -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
<?php
include 'includes/footer.php';
?>