<?php
$page_title = "Advanced Search";
include 'includes/header.php';
?>
<main>
    <section class="py-5">
                <div class="container py-4">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="form-card">
                                <h3 class="mb-4 text-center fw-bold"><i class="bi bi-search text-primary me-2"></i>Advanced Partner Search</h3>
                                <form action="search-results.php" method="GET">
                                    
                                    <h5 class="border-bottom pb-2 mb-3 text-secondary">Basic Preferences</h5>
                                    <div class="row g-3 mb-4">
                                        <div class="col-md-6">
                                            <label class="form-label">Looking for a</label>
                                            <select class="form-select">
                                                <option>Bride (Female)</option>
                                                <option>Groom (Male)</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Marital Status</label>
                                            <select class="form-select">
                                                <option>Never Married</option>
                                                <option>Divorced</option>
                                                <option>Widowed</option>
                                                <option>Any Status</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Age Range</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" value="21">
                                                <span class="input-group-text">to</span>
                                                <input type="number" class="form-control" value="35">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Height Range</label>
                                            <div class="input-group">
                                                <select class="form-select"><option>4'8"</option><option selected>5'0"</option></select>
                                                <span class="input-group-text">to</span>
                                                <select class="form-select"><option>6'0"</option><option selected>6'4"</option></select>
                                            </div>
                                        </div>
                                    </div>

                                    <h5 class="border-bottom pb-2 mb-3 text-secondary">Religion & Mother Tongue</h5>
                                    <div class="row g-3 mb-4">
                                        <div class="col-md-6">
                                            <label class="form-label">Religion</label>
                                            <select class="form-select">
                                                <option>Hindu</option>
                                                <option>Sikh</option>
                                                <option>Muslim</option>
                                                <option>Christian</option>
                                                <option>Jain</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Caste / Sect</label>
                                            <input type="text" class="form-control" placeholder="E.g. Brahmin, Khatri, Patel, Jat, or Any">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Mother Tongue</label>
                                            <select class="form-select">
                                                <option>Hindi</option>
                                                <option>Punjabi</option>
                                                <option>Gujarati</option>
                                                <option>Bengali</option>
                                                <option>Telugu</option>
                                                <option>Tamil</option>
                                                <option>Malayalam</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Horoscope Requirements</label>
                                            <select class="form-select">
                                                <option>Must Match (Manglik check)</option>
                                                <option>No Bar / Astrological details optional</option>
                                            </select>
                                        </div>
                                    </div>

                                    <h5 class="border-bottom pb-2 mb-3 text-secondary">Education & Profession</h5>
                                    <div class="row g-3 mb-4">
                                        <div class="col-md-6">
                                            <label class="form-label">Education Level</label>
                                            <select class="form-select">
                                                <option>Any Level</option>
                                                <option>Bachelors Degree</option>
                                                <option>Masters Degree</option>
                                                <option>Doctorate / Ph.D.</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Occupation Group</label>
                                            <select class="form-select">
                                                <option>Any Occupation</option>
                                                <option>Software & IT Profession</option>
                                                <option>Medical Doctor / Healthcare</option>
                                                <option>Business Owner / Entrepreneur</option>
                                                <option>Government / Civil Servant</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Annual Income (Minimum)</label>
                                            <select class="form-select">
                                                <option>No bar</option>
                                                <option>₹5+ LPA</option>
                                                <option>₹10+ LPA</option>
                                                <option>₹15+ LPA</option>
                                                <option>₹25+ LPA</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Location / City</label>
                                            <input type="text" class="form-control" placeholder="E.g. Bangalore, Delhi, Mumbai, Hyderabad">
                                        </div>
                                    </div>

                                    <div class="form-check mb-4">
                                        <input class="form-check-input" type="checkbox" id="photosOnly" checked>
                                        <label class="form-check-label" for="photosOnly">
                                            Show profiles with photos only
                                        </label>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary btn-lg px-5 py-3 w-100"><i class="bi bi-search me-2"></i>Search Partner matches</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
</main>
<?php
include 'includes/footer.php';
?>