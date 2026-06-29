<?php
$page_title = "Change Password settings";
include 'includes/header.php';
?>
<main class="dashboard-container">
    <?php include 'includes/user-sidebar.php'; ?>
    <div class="dashboard-content">
        <div class="container-fluid px-0">
            <div class="card p-4 border shadow-sm bg-white rounded-3 col-lg-7">
                <h4 class="fw-bold mb-4"><i class="bi bi-key-fill text-primary me-2"></i>Update Account Password</h4>
                <form onsubmit="event.preventDefault(); alert('Security password updated successfully!'); this.reset();">
                    <div class="mb-3">
                        <label class="form-label small">Current Password</label>
                        <input type="password" class="form-control" required value="supersecurepassword1">
                    </div>
                    <div class="mb-3">
                        <label class="form-label small">New Secure Password</label>
                        <input type="password" class="form-control" required minlength="8">
                    </div>
                    <div class="mb-4">
                        <label class="form-label small">Confirm New Password</label>
                        <input type="password" class="form-control" required minlength="8">
                    </div>
                    <button type="submit" class="btn btn-primary px-5 py-2">Update Account Password</button>
                </form>
            </div>
        </div>
    </div>
</main>
<?php
include 'includes/footer.php';
?>