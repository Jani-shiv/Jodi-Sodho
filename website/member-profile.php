<?php
$page_title = "Match Profile Preview";
include 'includes/header.php';
?>
<main class="dashboard-container">
    <?php include 'includes/user-sidebar.php'; ?>
    <div class="dashboard-content">
        <div class="container-fluid px-0">
            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="card p-3 border shadow-sm text-center bg-white rounded-3">
                        <img id="detail-profile-img" src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=300&auto=format&fit=crop&q=80" alt="Member Photo" class="img-fluid rounded-3 mb-3 border border-3 border-light w-100" style="height:300px; object-fit:cover;">
                        <h5 class="fw-bold mb-1" id="detail-profile-name">Ananya Sharma</h5>
                        <p class="text-muted small mb-3">ID: JS29103 | Connected Matching</p>
                        
                        <div class="d-flex gap-2 justify-content-center mb-3">
                            <span class="badge-verified"><i class="bi bi-patch-check-fill"></i> Verified</span>
                            <span class="badge-premium"><i class="bi bi-gem"></i> Premium</span>
                        </div>

                        <div class="d-flex flex-column gap-2">
                            <button class="btn btn-primary w-100 action-interest" data-id="1"><i class="bi bi-heart-fill me-2"></i>Express Interest</button>
                            <button class="btn btn-outline-primary w-100 action-shortlist" data-id="1"><i class="bi bi-star me-2"></i>Shortlist profile</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card p-4 border shadow-sm bg-white rounded-3 mb-4">
                        <h4 class="fw-bold text-primary mb-3">Full Partner Profile Overview</h4>
                        
                        <h6 class="border-bottom pb-2 mb-3 text-secondary"><i class="bi bi-person me-2"></i>Profile Biography Description</h6>
                        <p class="text-muted">I am a warm, ambitious, and family-oriented person who values honesty and traditional Indian values. Looking for a partner who is progressive yet grounded.</p>

                        <h6 class="border-bottom pb-2 mb-3 text-secondary mt-4"><i class="bi bi-person-lines-fill me-2"></i>Private Contact Records</h6>
                        <div class="p-3 bg-light rounded-3 text-center border">
                            <i class="bi bi-lock-fill text-muted fs-4 mb-2 d-block"></i>
                            <h6 class="fw-bold text-dark">Contact Information Locked</h6>
                            <p class="text-muted small mb-3">You must upgrade to Gold Premium Membership Plan to view direct mobile numbers and verify addresses.</p>
                            <a href="subscription-plans.php" class="btn btn-sm btn-secondary rounded-pill px-4">Upgrade Now</a>
                        </div>

                        <h6 class="border-bottom pb-2 mb-3 text-secondary mt-4"><i class="bi bi-stars me-2"></i>Astro compatibility checks</h6>
                        <div class="row g-3 text-muted small">
                            <div class="col-6"><strong>Religion:</strong> Hindu</div>
                            <div class="col-6"><strong>Caste / Sect:</strong> Brahmin</div>
                            <div class="col-6"><strong>Manglik Check:</strong> Manglik No</div>
                            <div class="col-6"><strong>Horoscope Match:</strong> 92% Compatibility Index</div>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                // Load specific profile from query string if available
                document.addEventListener("DOMContentLoaded", function() {
                    const urlParams = new URLSearchParams(window.location.search);
                    const id = urlParams.get('id') || 1;
                    const profile = getProfileById(id);
                    if (profile) {
                        document.getElementById('detail-profile-img').src = profile.photo;
                        document.getElementById('detail-profile-name').textContent = profile.name;
                    }
                });
            </script>
        </div>
    </div>
</main>
<?php
include 'includes/footer.php';
?>