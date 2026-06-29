<?php
$page_title = "Deactivate Account Status";
include 'includes/header.php';
?>
<main class="dashboard-container">
    <?php include 'includes/user-sidebar.php'; ?>
    <div class="dashboard-content">
        <div class="container-fluid px-0">
            <div class="card p-4 border shadow-sm bg-white rounded-3 col-lg-8">
                <h4 class="fw-bold mb-4 text-danger"><i class="bi bi-exclamation-triangle-fill me-2"></i>Deactivate Account Status</h4>
                
                <div class="mb-4">
                    <h6 class="fw-bold text-dark mb-2">Option A: Pause Profile Visibility (Temporary)</h6>
                    <p class="text-muted small">Pausing profile removes you from match recommendations list and search result cards. Your data remains safe, and you can resume anytime.</p>
                    <button class="btn btn-outline-secondary btn-sm" onclick="alert('Account paused. You can log in later to resume.')">Pause My Profile Visibility</button>
                </div>

                <hr class="my-4">

                <div>
                    <h6 class="fw-bold text-danger mb-2">Option B: Permanent Account Deletion</h6>
                    <p class="text-muted small">This is permanent and cannot be reversed. All matchmaking history records, message logs, photos, and billing documents will be deleted from system servers.</p>
                    
                    <form onsubmit="event.preventDefault(); const conf = confirm('CRITICAL: Are you sure you want to delete your profile account forever?'); if (conf) { alert('Account deleted.'); window.location.href='index.php'; }">
                        <div class="mb-3">
                            <label class="form-label small text-muted">Reason for deletion</label>
                            <select class="form-select" required>
                                <option>Found partner on Jodi Sodho</option>
                                <option>Found partner elsewhere</option>
                                <option>Unsatisfied with services</option>
                                <option>Other reasons</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-danger btn-sm">Delete Account Permanently</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
<?php
include 'includes/footer.php';
?>