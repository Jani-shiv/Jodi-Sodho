<?php
$page_title = "System Analytics reports";
include 'includes/header.php';
?>
<main class="dashboard-container">
    <?php include 'includes/admin-sidebar.php'; ?>
    <div class="dashboard-content">
        <div class="container-fluid px-0">
            <div class="mb-4">
                <h3 class="fw-bold">Platform Analytics & Growth</h3>
                <p class="text-muted small">Signups distributions, conversions indexes, and regional registration charts.</p>
            </div>

            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="card p-4 border bg-white shadow-sm rounded-3">
                        <h5 class="fw-bold mb-3 border-bottom pb-2">Regional Signups demographics (Top Cities)</h5>
                        <ul class="list-group list-group-flush small text-muted">
                            <li class="list-group-item d-flex justify-content-between py-2 border-light"><span>Bangalore, Karnataka</span><strong>32%</strong></li>
                            <li class="list-group-item d-flex justify-content-between py-2 border-light"><span>Delhi NCR</span><strong>28%</strong></li>
                            <li class="list-group-item d-flex justify-content-between py-2 border-light"><span>Hyderabad, Telangana</span><strong>18%</strong></li>
                            <li class="list-group-item d-flex justify-content-between py-2 border-light"><span>Mumbai, Maharashtra</span><strong>12%</strong></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card p-4 border bg-white shadow-sm rounded-3">
                        <h5 class="fw-bold mb-3 border-bottom pb-2">Age Distribution index</h5>
                        <ul class="list-group list-group-flush small text-muted">
                            <li class="list-group-item d-flex justify-content-between py-2 border-light"><span>21 - 25 Years</span><strong>24%</strong></li>
                            <li class="list-group-item d-flex justify-content-between py-2 border-light"><span>26 - 30 Years</span><strong>54%</strong></li>
                            <li class="list-group-item d-flex justify-content-between py-2 border-light"><span>31 - 35 Years</span><strong>16%</strong></li>
                            <li class="list-group-item d-flex justify-content-between py-2 border-light"><span>35+ Years</span><strong>6%</strong></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php
include 'includes/footer.php';
?>