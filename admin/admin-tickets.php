<?php
$page_title = "Support Tickets & Reports";
include 'includes/header.php';
?>
<main class="dashboard-container">
    <?php include 'includes/admin-sidebar.php'; ?>
    <div class="dashboard-content">
        <div class="container-fluid px-0">
            <div class="card p-4 border bg-white shadow-sm rounded-3">
                <h4 class="fw-bold mb-4"><i class="bi bi-ticket-detailed-fill text-warning me-2"></i>Support Tickets & Reports</h4>
                
                <div class="table-responsive">
                    <table class="table align-middle text-muted small">
                        <thead>
                            <tr class="text-dark">
                                <th>Ticket ID</th>
                                <th>User Candidate</th>
                                <th>Subject Topic</th>
                                <th>Priority</th>
                                <th>Status Flag</th>
                                <th>Date Raised</th>
                                <th>Action Control</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><code>T-809</code></td>
                                <td>Vikram Malhotra</td>
                                <td>Unable to upload ID proof scan</td>
                                <td><span class="badge bg-danger">High Priority</span></td>
                                <td><span class="badge bg-warning text-dark">Open / Unresolved</span></td>
                                <td>June 28, 2026</td>
                                <td><button class="btn btn-sm btn-outline-secondary" onclick="alert('Ticket T-809: Open Response modal')">Respond</button></td>
                            </tr>
                            <tr>
                                <td><code>T-795</code></td>
                                <td>Rajesh Kumar</td>
                                <td>Report Profile: spam profile sending links</td>
                                <td><span class="badge bg-dark">Critical Priority</span></td>
                                <td><span class="badge bg-secondary">Closed Ticket</span></td>
                                <td>June 25, 2026</td>
                                <td><button class="btn btn-sm btn-outline-secondary" disabled>Resolved</button></td>
                            </tr>
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