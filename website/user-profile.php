<?php
$page_title = "My Profile Details";
include 'includes/header.php';
?>
<main class="dashboard-container">
    <?php include 'includes/user-sidebar.php'; ?>
    <div class="dashboard-content">
        <div class="container-fluid px-0">
            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="card p-3 border shadow-sm text-center bg-white rounded-3">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=300&auto=format&fit=crop&q=80" alt="Profile" class="img-fluid rounded-3 mb-3 border border-3 border-light w-100" style="height:300px; object-fit:cover;">
                        <h5 class="fw-bold mb-1">Rohan Verma</h5>
                        <p class="text-muted small mb-3">ID: JS90283 | Registered: Feb 2026</p>
                        <div class="d-flex gap-2 justify-content-center mb-3">
                            <span class="badge-verified"><i class="bi bi-patch-check-fill"></i> Verified</span>
                            <span class="badge-premium"><i class="bi bi-gem"></i> Gold Plan</span>
                        </div>
                        <a href="profile-edit.php" class="btn btn-primary w-100 py-2"><i class="bi bi-pencil-square me-2"></i>Edit Profile</a>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card p-4 border shadow-sm bg-white rounded-3">
                        <h4 class="fw-bold text-primary mb-3">Profile Information Details</h4>
                        
                        <h6 class="border-bottom pb-2 mb-3 text-secondary"><i class="bi bi-person me-2"></i>About Myself</h6>
                        <p class="text-muted">Passionate about tech, travel, and fitness. I am looking for a partner who is career-driven, independent, and has a strong sense of humor.</p>

                        <h6 class="border-bottom pb-2 mb-3 text-secondary mt-4"><i class="bi bi-bank me-2"></i>Religious & Astro Records</h6>
                        <div class="row g-3 text-muted small mb-2">
                            <div class="col-6"><strong>Religion:</strong> Hindu</div>
                            <div class="col-6"><strong>Caste / Sect:</strong> Khatri</div>
                            <div class="col-6"><strong>Mother Tongue:</strong> Hindi</div>
                            <div class="col-6"><strong>Manglik:</strong> No Manglik</div>
                            <div class="col-6"><strong>Horoscope Match:</strong> Mandatory Requirement</div>
                        </div>

                        <h6 class="border-bottom pb-2 mb-3 text-secondary mt-4"><i class="bi bi-briefcase me-2"></i>Professional Details</h6>
                        <div class="row g-3 text-muted small">
                            <div class="col-6"><strong>Highest Degree:</strong> MBA (Product Mgt)</div>
                            <div class="col-6"><strong>Occupation:</strong> Senior Product Manager</div>
                            <div class="col-6"><strong>Company Name:</strong> Microsoft India</div>
                            <div class="col-6"><strong>Annual Earnings:</strong> ₹32 Lakhs Per Annum</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php
include 'includes/footer.php';
?>