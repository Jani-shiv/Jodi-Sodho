<?php
$page_title = "Search Results";
include 'includes/header.php';
?>
<main>
    <section class="py-5">
                <div class="container-fluid px-lg-5">
                    <div class="row">
                        <!-- Filters Sidebar -->
                        <div class="col-lg-3 mb-4">
                            <div class="card p-4 border shadow-sm rounded-3">
                                <h5 class="fw-bold mb-3 d-flex justify-content-between align-items-center">
                                    <span><i class="bi bi-funnel-fill text-primary me-2"></i>Filters</span>
                                    <a href="#" class="small text-muted" style="font-size:0.75rem;">Clear All</a>
                                </h5>
                                <hr class="mt-0">
                                
                                <div class="mb-4">
                                    <h6 class="fw-bold mb-2">Age Limit</h6>
                                    <div class="d-flex gap-2 align-items-center">
                                        <input type="number" class="form-control form-control-sm" value="21">
                                        <span>to</span>
                                        <input type="number" class="form-control form-control-sm" value="35">
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <h6 class="fw-bold mb-2">Religion</h6>
                                    <div class="form-check"><input class="form-check-input" type="checkbox" checked><label class="form-check-label small">Hindu</label></div>
                                    <div class="form-check"><input class="form-check-input" type="checkbox"><label class="form-check-label small">Sikh</label></div>
                                    <div class="form-check"><input class="form-check-input" type="checkbox"><label class="form-check-label small">Muslim</label></div>
                                    <div class="form-check"><input class="form-check-input" type="checkbox"><label class="form-check-label small">Christian</label></div>
                                </div>

                                <div class="mb-4">
                                    <h6 class="fw-bold mb-2">Annual Income</h6>
                                    <div class="form-check"><input class="form-check-input" type="checkbox" checked><label class="form-check-label small">₹10+ LPA</label></div>
                                    <div class="form-check"><input class="form-check-input" type="checkbox"><label class="form-check-label small">₹15+ LPA</label></div>
                                    <div class="form-check"><input class="form-check-input" type="checkbox"><label class="form-check-label small">₹25+ LPA</label></div>
                                </div>

                                <div class="mb-4">
                                    <h6 class="fw-bold mb-2">Verification Badges</h6>
                                    <div class="form-check"><input class="form-check-input" type="checkbox" checked><label class="form-check-label small">Verified Identity</label></div>
                                    <div class="form-check"><input class="form-check-input" type="checkbox"><label class="form-check-label small">Premium Subscribers</label></div>
                                </div>
                            </div>
                        </div>

                        <!-- Results List -->
                        <div class="col-lg-9">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h4 class="fw-bold mb-0">Search Results matches</h4>
                                <div class="d-flex align-items-center gap-2">
                                    <span class="small text-muted text-nowrap">Sort By</span>
                                    <select class="form-select form-select-sm">
                                        <option>Relevance Compatibility</option>
                                        <option>Most Recent Signups</option>
                                        <option>Age (Low to High)</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row" id="matches-list-container">
                                <!-- Rendered dynamically by Javascript -->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
</main>
<?php
include 'includes/footer.php';
?>