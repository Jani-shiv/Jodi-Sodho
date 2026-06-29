<?php
$page_title = "Pricing & Membership Plans";
include 'includes/header.php';
?>
<main>
    <section class="py-5 bg-light">
                <div class="container py-4 text-center">
                    <h2 class="fw-bold mb-2">Upgrade to Premium Membership</h2>
                    <p class="text-muted mb-5 col-lg-6 mx-auto">Get verified badges, direct message options, match compatibility profiles, and find your life partner faster.</p>
                    
                    <div class="row g-4 justify-content-center mb-5">
                        <!-- Silver Plan -->
                        <div class="col-md-6 col-lg-3">
                            <div class="pricing-card">
                                <h4 class="fw-bold text-muted">Silver Plan</h4>
                                <div class="pricing-price">₹1,999<span>/ 1 Month</span></div>
                                <hr class="border-light my-4">
                                <ul class="pricing-features">
                                    <li><i class="bi bi-check-circle-fill"></i> Send 50 Interests</li>
                                    <li><i class="bi bi-check-circle-fill"></i> View 15 Contact Details</li>
                                    <li><i class="bi bi-check-circle-fill"></i> Chat with Matches</li>
                                    <li class="disabled"><i class="bi bi-x-circle"></i> Horoscope Matching</li>
                                    <li class="disabled"><i class="bi bi-x-circle"></i> Profile Booster</li>
                                </ul>
                                <a href="subscription-billing.php?plan=Silver" class="btn btn-outline-primary w-100 py-2">Select Silver</a>
                            </div>
                        </div>
                        
                        <!-- Gold Plan (Recommended) -->
                        <div class="col-md-6 col-lg-3">
                            <div class="pricing-card premium-tier">
                                <h4 class="fw-bold text-primary">Gold Plan</h4>
                                <div class="pricing-price" style="color:var(--primary)">₹4,999<span>/ 3 Months</span></div>
                                <hr class="border-light my-4">
                                <ul class="pricing-features">
                                    <li><i class="bi bi-check-circle-fill"></i> Unlimited Interests</li>
                                    <li><i class="bi bi-check-circle-fill"></i> View 50 Contact Details</li>
                                    <li><i class="bi bi-check-circle-fill"></i> Chat with Matches</li>
                                    <li><i class="bi bi-check-circle-fill"></i> Horoscope Matching</li>
                                    <li class="disabled"><i class="bi bi-x-circle"></i> Profile Booster</li>
                                </ul>
                                <a href="subscription-billing.php?plan=Gold" class="btn btn-primary w-100 py-2">Select Gold</a>
                            </div>
                        </div>

                        <!-- Platinum Plan -->
                        <div class="col-md-6 col-lg-3">
                            <div class="pricing-card">
                                <h4 class="fw-bold text-secondary">Platinum Plan</h4>
                                <div class="pricing-price">₹7,999<span>/ 6 Months</span></div>
                                <hr class="border-light my-4">
                                <ul class="pricing-features">
                                    <li><i class="bi bi-check-circle-fill"></i> Unlimited Interests</li>
                                    <li><i class="bi bi-check-circle-fill"></i> View 100 Contact Details</li>
                                    <li><i class="bi bi-check-circle-fill"></i> Chat with Matches</li>
                                    <li><i class="bi bi-check-circle-fill"></i> Horoscope Matching</li>
                                    <li><i class="bi bi-check-circle-fill"></i> Profile Booster (1/mo)</li>
                                </ul>
                                <a href="subscription-billing.php?plan=Platinum" class="btn btn-outline-primary w-100 py-2">Select Platinum</a>
                            </div>
                        </div>

                        <!-- VIP Plan -->
                        <div class="col-md-6 col-lg-3">
                            <div class="pricing-card">
                                <h4 class="fw-bold" style="color:var(--accent);">VIP Personal</h4>
                                <div class="pricing-price">₹14,999<span>/ 12 Months</span></div>
                                <hr class="border-light my-4">
                                <ul class="pricing-features">
                                    <li><i class="bi bi-check-circle-fill"></i> Personal Matchmaker</li>
                                    <li><i class="bi bi-check-circle-fill"></i> Unlimited Contacts View</li>
                                    <li><i class="bi bi-check-circle-fill"></i> VIP Exclusive Matches</li>
                                    <li><i class="bi bi-check-circle-fill"></i> Horoscope Matching</li>
                                    <li><i class="bi bi-check-circle-fill"></i> Top Search Standout</li>
                                </ul>
                                <a href="subscription-billing.php?plan=VIP" class="btn btn-outline-primary w-100 py-2">Select VIP Plan</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
</main>
<?php
include 'includes/footer.php';
?>