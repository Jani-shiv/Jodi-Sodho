<?php
$page_title = "Member Dashboard";
include 'includes/header.php';
?>
<main class="dashboard-container">
    <?php include 'includes/user-sidebar.php'; ?>
    <div class="dashboard-content">
        <div class="container-fluid px-0">
            <div class="row g-4 mb-4">
                <div class="col-12">
                    <div class="alert alert-custom-purple alert-dismissible fade show shadow-sm border-0 d-flex align-items-center gap-3 py-3" role="alert" style="border-radius: var(--border-radius-md);">
                        <i class="bi bi-award-fill fs-3 text-secondary"></i>
                        <div>
                            <strong class="text-dark">Upgrade to Gold Premium Today!</strong> Get unlimited connection invites, direct chats, and unlock horoscope compatibility reports instantly.
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            </div>

            <!-- Stats Widgets -->
            <div class="row g-3 mb-4">
                <div class="col-6 col-lg-3">
                    <div class="widget-stat-card">
                        <div class="widget-stat-icon pink"><i class="bi bi-people-fill"></i></div>
                        <div>
                            <h4 class="mb-0 fw-bold">428</h4>
                            <p class="text-muted small mb-0">Total Matches</p>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="widget-stat-card">
                        <div class="widget-stat-icon purple"><i class="bi bi-heart-fill"></i></div>
                        <div>
                            <h4 class="mb-0 fw-bold">18</h4>
                            <p class="text-muted small mb-0">Likes Received</p>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="widget-stat-card">
                        <div class="widget-stat-icon orange"><i class="bi bi-eye-fill"></i></div>
                        <div>
                            <h4 class="mb-0 fw-bold">56</h4>
                            <p class="text-muted small mb-0">Profile Visitors</p>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="widget-stat-card">
                        <div class="widget-stat-icon success"><i class="bi bi-chat-dots-fill"></i></div>
                        <div>
                            <h4 class="mb-0 fw-bold">1</h4>
                            <p class="text-muted small mb-0">Unread Chat</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Match Recommendations -->
            <div class="row">
                <div class="col-12 mb-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="fw-bold mb-0">New Recommendations for You</h5>
                        <a href="matches-all.php" class="small fw-bold">View All Matches</a>
                    </div>
                </div>
            </div>
            
            <div class="row" id="matches-list-container">
                <!-- Populated dynamically via Javascript -->
            </div>
        </div>
    </div>
</main>
<?php
include 'includes/footer.php';
?>