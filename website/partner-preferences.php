<?php
$page_title = "Partner Expectations Settings";
include 'includes/header.php';
?>
<main class="dashboard-container">
    <?php include 'includes/user-sidebar.php'; ?>
    <div class="dashboard-content">
        <div class="container-fluid px-0">
            <div class="card p-4 border shadow-sm bg-white rounded-3">
                <h4 class="fw-bold mb-4"><i class="bi bi-sliders text-primary me-2"></i>Partner Expectations Preferences</h4>
                <form onsubmit="event.preventDefault(); alert('Expectation preferences updated successfully!');">
                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <label class="form-label small">Age Preference</label>
                            <div class="input-group">
                                <input type="number" class="form-control" value="22">
                                <span class="input-group-text">to</span>
                                <input type="number" class="form-control" value="28">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small">Height Preference</label>
                            <div class="input-group">
                                <select class="form-select"><option>5'0"</option></select>
                                <span class="input-group-text">to</span>
                                <select class="form-select"><option>5'8"</option></select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small">Religion Group</label>
                            <select class="form-select"><option>Hindu</option><option>Sikh</option><option>Any Religion</option></select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small">Mother Tongue</label>
                            <select class="form-select"><option>Hindi</option><option>Punjabi</option><option>Any Language</option></select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small">Minimum Education Requirement</label>
                            <select class="form-select"><option>Bachelors Degree</option><option>Masters Degree</option><option>No Bar</option></select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small">Minimum Annual Income Bracket</label>
                            <select class="form-select"><option>₹10+ LPA</option><option>₹15+ LPA</option><option>No Bar</option></select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary px-5 py-2">Save Preferences Criteria</button>
                </form>
            </div>
        </div>
    </div>
</main>
<?php
include 'includes/footer.php';
?>