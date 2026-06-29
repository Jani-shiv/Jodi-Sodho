<?php
$page_title = "Received Connection Invites";
include 'includes/header.php';
?>
<main class="dashboard-container">
    <?php include 'includes/user-sidebar.php'; ?>
    <div class="dashboard-content">
        <div class="container-fluid px-0">
            <div class="card p-4 border shadow-sm bg-white rounded-3">
                <h4 class="fw-bold mb-4"><i class="bi bi-envelope-open-fill text-primary me-2"></i>Received Connection Invites</h4>
                
                <div class="table-responsive">
                    <table class="table align-middle">
                        <thead>
                            <tr class="text-muted">
                                <th>Match Profile</th>
                                <th>Received Date</th>
                                <th>Caste / Location</th>
                                <th>State Outcome</th>
                                <th>Action Controls</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr id="received-row-1">
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <img src="https://images.unsplash.com/photo-1580489944761-15a19d654956?w=80&auto=format&fit=crop&q=80" class="rounded-circle" style="width: 40px; height: 40px; object-fit: cover;">
                                        <strong>Jaspreet Kaur</strong>
                                    </div>
                                </td>
                                <td>June 29, 2026</td>
                                <td>Jat Sikh, Chandigarh</td>
                                <td><span class="badge bg-info text-dark" id="status-received-1">New Invitation</span></td>
                                <td>
                                    <div class="d-flex gap-2" id="action-received-1">
                                        <button class="btn btn-sm btn-success rounded-pill px-3" onclick="alert('Invitation accepted!'); document.getElementById('status-received-1').textContent='Accepted'; document.getElementById('action-received-1').remove();">Accept</button>
                                        <button class="btn btn-sm btn-danger rounded-pill px-3" onclick="alert('Invitation declined.'); document.getElementById('received-row-1').remove();">Decline</button>
                                    </div>
                                </td>
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