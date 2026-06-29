<?php
$page_title = "Edit Profile details";
include 'includes/header.php';
?>
<main class="dashboard-container">
    <?php include 'includes/user-sidebar.php'; ?>
    <div class="dashboard-content">
        <div class="container-fluid px-0">
            <div class="card p-4 border shadow-sm bg-white rounded-3">
                <h4 class="fw-bold mb-4"><i class="bi bi-pencil-square text-primary me-2"></i>Edit My Profile Records</h4>
                
                <ul class="nav nav-tabs mb-4" id="editProfileTabs" role="tablist">
                    <li class="nav-item"><button class="nav-link active" data-bs-toggle="tab" data-bs-target="#tab-basic">Basic Details</button></li>
                    <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-religion">Religious Info</button></li>
                    <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-career">Career Info</button></li>
                </ul>

                <form onsubmit="event.preventDefault(); alert('Profile records updated successfully!');">
                    <div class="tab-content" id="editProfileTabsContent">
                        <div class="tab-pane fade show active" id="tab-basic">
                            <div class="row g-3">
                                <div class="col-md-6"><label class="form-label small">First Name</label><input type="text" class="form-control" value="Rohan"></div>
                                <div class="col-md-6"><label class="form-label small">Last Name</label><input type="text" class="form-control" value="Verma"></div>
                                <div class="col-md-6"><label class="form-label small">Height</label><input type="text" class="form-control" value="5'11\""></div>
                                <div class="col-md-6"><label class="form-label small">Marital Status</label><select class="form-select"><option>Never Married</option><option>Divorced</option></select></div>
                                <div class="col-12"><label class="form-label small">Write Biography</label><textarea class="form-control" rows="3">Passionate about tech, travel, and fitness. I am looking for a partner who is career-driven, independent, and has a strong sense of humor.</textarea></div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-religion">
                            <div class="row g-3">
                                <div class="col-md-6"><label class="form-label small">Religion</label><select class="form-select"><option>Hindu</option><option>Sikh</option></select></div>
                                <div class="col-md-6"><label class="form-label small">Caste</label><input type="text" class="form-control" value="Khatri"></div>
                                <div class="col-md-6"><label class="form-label small">Mother Tongue</label><select class="form-select"><option>Hindi</option><option>Punjabi</option></select></div>
                                <div class="col-md-6"><label class="form-label small">Horoscope Check</label><select class="form-select"><option>Manglik (No)</option><option>Manglik (Yes)</option></select></div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-career">
                            <div class="row g-3">
                                <div class="col-md-6"><label class="form-label small">Education Level</label><input type="text" class="form-control" value="MBA"></div>
                                <div class="col-md-6"><label class="form-label small">Occupation</label><input type="text" class="form-control" value="Product Manager"></div>
                                <div class="col-md-6"><label class="form-label small">Company</label><input type="text" class="form-control" value="Microsoft"></div>
                                <div class="col-md-6"><label class="form-label small">Income Range</label><input type="text" class="form-control" value="₹32 LPA"></div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 pt-3 border-top text-end">
                        <button type="submit" class="btn btn-primary px-5 py-2">Save Profile details</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
<?php
include 'includes/footer.php';
?>