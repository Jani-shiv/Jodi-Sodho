<?php
$page_title = "Membership Plans Selection";
include 'includes/header.php';
?>
<main class="dashboard-container">
    <?php include 'includes/user-sidebar.php'; ?>
    <div class="dashboard-content">
        <div class="container-fluid px-0">
            <div class="card p-4 border shadow-sm bg-white rounded-3">
                <h4 class="fw-bold mb-2">Upgrade Membership Account</h4>
                <p class="text-muted mb-4">Choose from our premium matchmaking plans to unlock advanced features.</p>
                
                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="pricing-card">
                            <h5 class="fw-bold">Gold Plan</h5>
                            <div class="pricing-price" style="font-size:2rem; margin:1rem 0;">₹4,999<span>/ 3 Months</span></div>
                            <hr class="my-3">
                            <ul class="pricing-features small" style="margin:1rem 0;">
                                <li><i class="bi bi-check-circle-fill"></i> Unlimited Interests</li>
                                <li><i class="bi bi-check-circle-fill"></i> View 50 Contact Details</li>
                                <li><i class="bi bi-check-circle-fill"></i> Chat with Matches</li>
                            </ul>
                            <a href="subscription-billing.php?plan=Gold" class="btn btn-primary btn-sm w-100 py-2">Select Gold</a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="pricing-card premium-tier">
                            <h5 class="fw-bold">Platinum Plan</h5>
                            <div class="pricing-price" style="font-size:2rem; margin:1rem 0; color:var(--primary)">₹7,999<span>/ 6 Months</span></div>
                            <hr class="my-3">
                            <ul class="pricing-features small" style="margin:1rem 0;">
                                <li><i class="bi bi-check-circle-fill"></i> Unlimited Interests</li>
                                <li><i class="bi bi-check-circle-fill"></i> View 100 Contact Details</li>
                                <li><i class="bi bi-check-circle-fill"></i> Chat with Matches</li>
                                <li><i class="bi bi-check-circle-fill"></i> Profile Booster (1/mo)</li>
                            </ul>
                            <a href="subscription-billing.php?plan=Platinum" class="btn btn-primary btn-sm w-100 py-2">Select Platinum</a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="pricing-card">
                            <h5 class="fw-bold">VIP Personal</h5>
                            <div class="pricing-price" style="font-size:2rem; margin:1rem 0;">₹14,999<span>/ 12 Months</span></div>
                            <hr class="my-3">
                            <ul class="pricing-features small" style="margin:1rem 0;">
                                <li><i class="bi bi-check-circle-fill"></i> Personal Matchmaker</li>
                                <li><i class="bi bi-check-circle-fill"></i> Unlimited Contacts View</li>
                                <li><i class="bi bi-check-circle-fill"></i> Chat with Matches</li>
                            </ul>
                            <a href="subscription-billing.php?plan=VIP" class="btn btn-primary btn-sm w-100 py-2">Select VIP</a>
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