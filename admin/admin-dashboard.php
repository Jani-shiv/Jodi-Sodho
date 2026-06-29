<?php
$page_title = "Admin Dashboard hub";
include 'includes/header.php';
?>
<main class="dashboard-container">
    <?php include 'includes/admin-sidebar.php'; ?>
    <div class="dashboard-content">
        <div class="container-fluid px-0">
            <div class="mb-4">
                <h3 class="fw-bold">Platform Status Overview</h3>
                <p class="text-muted small mb-0">System status checks, registrations indexes, and verified accounts records.</p>
            </div>

            <!-- Status Widgets -->
            <div class="row g-3 mb-4">
                <div class="col-6 col-lg-3">
                    <div class="widget-stat-card">
                        <div class="widget-stat-icon purple"><i class="bi bi-people-fill"></i></div>
                        <div>
                            <h4 class="mb-0 fw-bold">14,809</h4>
                            <p class="text-muted small mb-0">Total Users Registered</p>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="widget-stat-card">
                        <div class="widget-stat-icon success"><i class="bi bi-check-circle-fill"></i></div>
                        <div>
                            <h4 class="mb-0 fw-bold">12,290</h4>
                            <p class="text-muted small mb-0">Identity Verified Users</p>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="widget-stat-card">
                        <div class="widget-stat-icon pink"><i class="bi bi-award-fill"></i></div>
                        <div>
                            <h4 class="mb-0 fw-bold">2,492</h4>
                            <p class="text-muted small mb-0">Paid Premium Users</p>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="widget-stat-card">
                        <div class="widget-stat-icon orange"><i class="bi bi-ticket-detailed-fill"></i></div>
                        <div>
                            <h4 class="mb-0 fw-bold">4</h4>
                            <p class="text-muted small mb-0">Open Support Tickets</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Activity Logs & Charts -->
            <div class="row g-4 mb-4">
                <div class="col-lg-6">
                    <div class="card p-4 border bg-white shadow-sm rounded-3 h-100">
                        <h5 class="fw-bold mb-3 border-bottom pb-2">Recent Platform Actions</h5>
                        <ul class="list-group list-group-flush" id="admin-actions-log">
                            <li class="list-group-item d-flex justify-content-between align-items-center py-3 border-light">
                                <div><strong>Ketan Mehta Registered</strong><p class="text-muted small mb-0">New candidate signup from Bangalore</p></div>
                                <span class="text-muted small">5 mins ago</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center py-3 border-light">
                                <div><strong>Payment Received (Gold Plan)</strong><p class="text-muted small mb-0">Arjun Reddy paid ₹4,999 online</p></div>
                                <span class="text-muted small">15 mins ago</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center py-3 border-light">
                                <div><strong>Passport scan Verification</strong><p class="text-muted small mb-0">Neha Deshmukh uploaded ID verification proof</p></div>
                                <span class="text-muted small">42 mins ago</span>
                            </li>
                        </ul>
                    </div>
                </div>
                
                <div class="col-lg-6">
                    <div class="card p-4 border bg-white shadow-sm rounded-3 h-100">
                        <h5 class="fw-bold mb-3 border-bottom pb-2">Growth Charts Indices (Mock)</h5>
                        <!-- Custom CSS/SVG Chart -->
                        <div class="d-flex align-items-end justify-content-between pt-4 px-2" style="height: 180px;">
                            <div class="text-center" style="width: 14%;"><div class="bg-primary rounded-top" style="height: 40px;" title="Jan: 1.2k"></div><span class="small text-muted font-monospace" style="font-size:0.7rem;">Jan</span></div>
                            <div class="text-center" style="width: 14%;"><div class="bg-primary rounded-top" style="height: 60px;" title="Feb: 1.8k"></div><span class="small text-muted font-monospace" style="font-size:0.7rem;">Feb</span></div>
                            <div class="text-center" style="width: 14%;"><div class="bg-primary rounded-top" style="height: 90px;" title="Mar: 2.4k"></div><span class="small text-muted font-monospace" style="font-size:0.7rem;">Mar</span></div>
                            <div class="text-center" style="width: 14%;"><div class="bg-primary rounded-top" style="height: 110px;" title="Apr: 3.1k"></div><span class="small text-muted font-monospace" style="font-size:0.7rem;">Apr</span></div>
                            <div class="text-center" style="width: 14%;"><div class="bg-primary rounded-top" style="height: 140px;" title="May: 4.2k"></div><span class="small text-muted font-monospace" style="font-size:0.7rem;">May</span></div>
                            <div class="text-center" style="width: 14%;"><div class="bg-primary rounded-top" style="height: 160px;" title="Jun: 5.6k"></div><span class="small text-muted font-monospace" style="font-size:0.7rem;">Jun</span></div>
                        </div>
                        <p class="text-center text-muted small mt-3 mb-0">Candidate registration index trends over current semester.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php
include 'includes/footer.php';
?>