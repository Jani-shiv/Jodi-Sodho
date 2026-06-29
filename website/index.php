<?php
$page_title = "Home - Find Your Perfect Life Partner";
include 'includes/header.php';
?>
<main>
    <!-- Hero Banner -->
            <section class="hero-section text-center text-lg-start">
                <div class="container">
                    <div class="row align-items-center g-5">
                        <div class="col-lg-6">
                            <span class="badge bg-primary-light text-primary mb-3 px-3 py-2 rounded-pill fw-bold">#1 Matrimonial Service in India</span>
                            <h1 class="display-4 fw-bold mb-3" style="color: var(--dark);">Find Your Perfect <span class="text-primary">Life Partner</span> Today</h1>
                            <p class="lead text-muted mb-4">Jodi Sodho is a premium, verified matchmaking platform designed to help you connect with progressive, educated, and family-oriented Indian matches.</p>
                            <div class="d-flex flex-wrap gap-3 justify-content-center justify-content-lg-start">
                                <a href="register.php" class="btn btn-primary btn-lg px-5 py-3">Get Started For Free</a>
                                <a href="about.php" class="btn btn-outline-primary btn-lg px-5 py-3">Learn More</a>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="hero-search-card">
                                <h4 class="mb-4 text-center"><i class="bi bi-search text-primary me-2"></i>Quick Partner Search</h4>
                                <form action="search-results.php" method="GET">
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label class="form-label small">I am seeking a</label>
                                            <select class="form-select" name="gender">
                                                <option value="Female">Bride (Female)</option>
                                                <option value="Male">Groom (Male)</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label small">Religion</label>
                                            <select class="form-select" name="religion">
                                                <option value="Hindu">Hindu</option>
                                                <option value="Sikh">Sikh</option>
                                                <option value="Muslim">Muslim</option>
                                                <option value="Christian">Christian</option>
                                                <option value="Jain">Jain</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label small">Age Range</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="21" value="21" name="age_min">
                                                <span class="input-group-text">to</span>
                                                <input type="number" class="form-control" placeholder="35" value="30" name="age_max">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label small">Mother Tongue</label>
                                            <select class="form-select" name="language">
                                                <option value="Hindi">Hindi</option>
                                                <option value="Punjabi">Punjabi</option>
                                                <option value="Bengali">Bengali</option>
                                                <option value="Telugu">Telugu</option>
                                                <option value="Gujarati">Gujarati</option>
                                            </select>
                                        </div>
                                        <div class="col-12 mt-4">
                                            <button type="submit" class="btn btn-primary w-100 py-3"><i class="bi bi-heart-fill me-2"></i>Find Matches</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- How it works -->
            <section class="py-5 bg-white border-top border-bottom border-light">
                <div class="container text-center py-4">
                    <h2 class="fw-bold mb-2">How Jodi Sodho Works</h2>
                    <p class="text-muted mb-5">Start your path towards a happy marriage in three simple steps</p>
                    <div class="row g-4">
                        <div class="col-md-4">
                            <div class="p-4 card-premium border-0 h-100">
                                <div class="bg-primary-light text-primary rounded-circle mx-auto d-flex align-items-center justify-content-center mb-4" style="width: 72px; height: 72px;">
                                    <i class="bi bi-person-plus-fill fs-3"></i>
                                </div>
                                <h5 class="fw-bold">1. Create Profile</h5>
                                <p class="text-muted small">Register for free and list your details, career goals, hobbies, family ideals, and verification papers.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="p-4 card-premium border-0 h-100">
                                <div class="bg-secondary-light text-secondary rounded-circle mx-auto d-flex align-items-center justify-content-center mb-4" style="width: 72px; height: 72px;">
                                    <i class="bi bi-sliders fs-3"></i>
                                </div>
                                <h5 class="fw-bold">2. Set Preferences</h5>
                                <p class="text-muted small">Specify partner expectations (age, caste, location, income). Our algorithm filters matching profiles instantly.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="p-4 card-premium border-0 h-100">
                                <div class="bg-success text-white rounded-circle mx-auto d-flex align-items-center justify-content-center mb-4" style="width: 72px; height: 72px; background: linear-gradient(135deg, #28a745 0%, #20c997 100%) !important;">
                                    <i class="bi bi-chat-heart-fill fs-3"></i>
                                </div>
                                <h5 class="fw-bold">3. Start Connecting</h5>
                                <p class="text-muted small">Send interest requests, view verified contact numbers, and converse through our premium chat inbox safely.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Success Stories Carousel Header -->
            <section class="py-5">
                <div class="container py-4">
                    <div class="d-flex justify-content-between align-items-end mb-5">
                        <div>
                            <h2 class="fw-bold mb-2">Our Success Stories</h2>
                            <p class="text-muted mb-0">Discover matches who found their soulmate on our platform</p>
                        </div>
                        <a href="stories.php" class="btn btn-outline-primary rounded-pill d-none d-md-inline-block">View All Stories</a>
                    </div>
                    <div class="row" id="stories-list-container">
                        <!-- Loaded dynamically via JavaScript -->
                    </div>
                </div>
            </section>

            <!-- CTA Upgrade -->
            <section class="py-5 text-white text-center position-relative overflow-hidden" style="background: var(--gradient-primary);">
                <div class="container py-4">
                    <h2 class="display-6 fw-bold mb-3">Begin Your Search for Happiness</h2>
                    <p class="lead mb-4 opacity-90">Join millions of Indian brides and grooms who have found their perfect life partners on Jodi Sodho.</p>
                    <a href="register.php" class="btn btn-light text-primary btn-lg px-5 py-3 rounded-pill fw-bold border-0 shadow">Register Free Now</a>
                </div>
            </section>
</main>
<?php
include 'includes/footer.php';
?>