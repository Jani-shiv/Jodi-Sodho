<?php
$page_title = "Blocked Member Accounts";
include 'includes/header.php';
?>
<main class="dashboard-container">
    <?php include 'includes/user-sidebar.php'; ?>
    <div class="dashboard-content">
        <div class="container-fluid px-0">
            <div class="card p-4 border shadow-sm bg-white rounded-3">
                <h4 class="fw-bold mb-4"><i class="bi bi-slash-circle text-danger me-2"></i>Blocked Member Accounts</h4>
                <p class="text-muted small">Members listed here cannot view your photographs, send interests, or start inbox messaging conversations.</p>
                
                <div class="table-responsive">
                    <table class="table align-middle text-muted small">
                        <thead>
                            <tr class="text-dark">
                                <th>Member Profile</th>
                                <th>Blocked Date</th>
                                <th>Reason For Block</th>
                                <th>Action Panel</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr id="block-row-1">
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="rounded-circle bg-secondary text-white d-flex align-items-center justify-content-center" style="width:36px; height:36px; font-weight:600;">VK</div>
                                        <strong>Vikram Malhotra</strong>
                                    </div>
                                </td>
                                <td>June 12, 2026</td>
                                <td>Abusive Chat Messages Behavior</td>
                                <td><button class="btn btn-sm btn-outline-success py-1 px-3 rounded-pill" onclick="alert('Vikram Malhotra has been unblocked.'); document.getElementById('block-row-1').remove();">Unblock User</button></td>
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