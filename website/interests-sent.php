<?php
$page_title = "Sent Connection Invites";
include 'includes/header.php';
?>
<main class="dashboard-container">
    <?php include 'includes/user-sidebar.php'; ?>
    <div class="dashboard-content">
        <div class="container-fluid px-0">
            <div class="card p-4 border shadow-sm bg-white rounded-3">
                <h4 class="fw-bold mb-4"><i class="bi bi-send-fill text-primary me-2"></i>Sent Connection Invites</h4>
                
                <div class="table-responsive">
                    <table class="table align-middle">
                        <thead>
                            <tr class="text-muted">
                                <th>Match Profile</th>
                                <th>Sent Date</th>
                                <th>Category / Role</th>
                                <th>Outcome Status</th>
                                <th>Action Panel</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=80&auto=format&fit=crop&q=80" class="rounded-circle" style="width: 40px; height: 40px; object-fit: cover;">
                                        <strong>Ananya Sharma</strong>
                                    </div>
                                </td>
                                <td>June 28, 2026</td>
                                <td>Brahmin, IT professional</td>
                                <td><span class="badge bg-success">Accepted Invite</span></td>
                                <td><a href="messages.php" class="btn btn-sm btn-outline-primary py-1 px-3 rounded-pill"><i class="bi bi-chat-dots me-1"></i>Start Chat</a></td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <img src="https://images.unsplash.com/photo-1594744803329-e58b31de215f?w=80&auto=format&fit=crop&q=80" class="rounded-circle" style="width: 40px; height: 40px; object-fit: cover;">
                                        <strong>Priyanka Patel</strong>
                                    </div>
                                </td>
                                <td>June 25, 2026</td>
                                <td>Patel, Medical Doctor</td>
                                <td><span class="badge bg-warning text-dark">Pending Approval</span></td>
                                <td><button class="btn btn-sm btn-outline-secondary py-1 px-3 rounded-pill" onclick="alert('Invitation cancelled')">Cancel Invite</button></td>
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