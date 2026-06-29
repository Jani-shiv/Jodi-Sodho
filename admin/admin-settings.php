<?php
$page_title = "Platform System settings";
include 'includes/header.php';
?>
<main class="dashboard-container">
    <?php include 'includes/admin-sidebar.php'; ?>
    <div class="dashboard-content">
        <div class="container-fluid px-0">
            <div class="card p-4 border bg-white shadow-sm rounded-3 col-lg-8">
                <h4 class="fw-bold mb-4"><i class="bi bi-gear-fill text-secondary me-2"></i>Platform System configurations</h4>
                
                <form onsubmit="event.preventDefault(); alert('Global system configurations updated successfully!');">
                    <div class="mb-3">
                        <label class="form-label small">Matrimonial Platform Brand Name</label>
                        <input type="text" class="form-control" value="Jodi Sodho">
                    </div>
                    <div class="mb-3">
                        <label class="form-label small">Support contact phone number</label>
                        <input type="text" class="form-control" value="+91 80 4920 1800">
                    </div>
                    <div class="mb-3">
                        <label class="form-label small">Identity proof requirements checklist</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="checkAad" checked>
                            <label class="form-check-label small" for="checkAad">Aadhaar Card (India)</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="checkPass" checked>
                            <label class="form-check-label small" for="checkPass">Passport Identity Document</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-secondary px-5 py-2">Save Platform Settings</button>
                </form>
            </div>
        </div>
    </div>
</main>
<?php
include 'includes/footer.php';
?>