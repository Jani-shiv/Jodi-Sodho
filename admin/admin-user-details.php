<?php
$page_title = "Edit Account profile details";
include 'includes/header.php';
?>
<main class="dashboard-container">
    <?php include 'includes/admin-sidebar.php'; ?>
    <div class="dashboard-content">
        <div class="container-fluid px-0">
            <div class="card p-4 border bg-white shadow-sm rounded-3">
                <h4 class="fw-bold mb-4"><i class="bi bi-person-lines-fill text-secondary me-2"></i>Inspect & Edit User Account Profile</h4>
                
                <form onsubmit="event.preventDefault(); alert('User profile modifications saved successfully!');">
                    <div class="row g-3 mb-4">
                        <div class="col-md-6"><label class="form-label small">First Name</label><input type="text" class="form-control" value="Rohan"></div>
                        <div class="col-md-6"><label class="form-label small">Last Name</label><input type="text" class="form-control" value="Verma"></div>
                        <div class="col-md-6"><label class="form-label small">Email Address</label><input type="email" class="form-control" value="rohan.verma@example.com"></div>
                        <div class="col-md-6"><label class="form-label small">Mobile phone Number</label><input type="text" class="form-control" value="9876543210"></div>
                        <div class="col-md-6">
                            <label class="form-label small">Account Plan</label>
                            <select class="form-select">
                                <option>Free Trial Member</option>
                                <option selected>Gold Premium Subscriber</option>
                                <option>VIP Personal Client</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small">Verified Identity checkmark</label>
                            <select class="form-select">
                                <option>Pending Verification</option>
                                <option selected>Verified Checkmark Approved</option>
                                <option>Rejected / Re-upload Required</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-secondary px-5 py-2">Save User records</button>
                    <a href="admin-users.php" class="btn btn-outline-secondary px-4 py-2 ms-2">Back to Users list</a>
                </form>
            </div>
        </div>
    </div>
</main>
<?php
include 'includes/footer.php';
?>