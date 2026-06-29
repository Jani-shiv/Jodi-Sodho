<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>
<div class="sidebar-custom shadow-sm">
    <div class="text-center mb-4">
        <div class="position-relative d-inline-block">
            <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=150&auto=format&fit=crop&q=80" alt="Self avatar" class="rounded-circle border border-primary border-3" style="width: 84px; height: 84px; object-fit: cover;">
            <a href="profile-upload-photos.php" class="position-absolute bottom-0 end-0 bg-primary text-white p-1 rounded-circle d-flex align-items-center justify-content-center" style="width: 28px; height: 28px;" title="Upload Photos">
                <i class="bi bi-camera-fill" style="font-size:0.8rem;"></i>
            </a>
        </div>
        <h6 class="mt-3 mb-1">Rohan Verma</h6>
        <p class="text-muted small mb-2">ID: JS90283</p>
        <div class="px-3">
            <div class="d-flex justify-content-between mb-1" style="font-size: 0.75rem;">
                <span class="text-muted">Profile Complete</span>
                <span class="fw-bold text-primary">85%</span>
            </div>
            <div class="progress" style="height: 6px;">
                <div class="progress-bar bg-primary" role="progressbar" style="width: 85%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        </div>
    </div>
    
    <div class="sidebar-menu-wrapper">
        <a href="user-dashboard.php" class="sidebar-link <?php echo ($current_page == 'user-dashboard.php') ? 'active' : ''; ?>">
            <i class="bi bi-grid-fill"></i>
            <span>Dashboard</span>
        </a>
        <a href="user-profile.php" class="sidebar-link <?php echo ($current_page == 'user-profile.php' || $current_page == 'profile-edit.php' || $current_page == 'profile-upload-photos.php') ? 'active' : ''; ?>">
            <i class="bi bi-person-fill"></i>
            <span>My Profile</span>
        </a>
        <a href="partner-preferences.php" class="sidebar-link <?php echo ($current_page == 'partner-preferences.php') ? 'active' : ''; ?>">
            <i class="bi bi-sliders"></i>
            <span>Partner Preferences</span>
        </a>
        
        <hr class="my-2 border-light">
        
        <a href="matches-all.php" class="sidebar-link <?php echo ($current_page == 'matches-all.php') ? 'active' : ''; ?>">
            <i class="bi bi-people-fill"></i>
            <span>All Matches</span>
        </a>
        <a href="matches-daily.php" class="sidebar-link <?php echo ($current_page == 'matches-daily.php') ? 'active' : ''; ?>">
            <i class="bi bi-magic"></i>
            <span>Daily Matches</span>
        </a>
        <a href="matches-mutual.php" class="sidebar-link <?php echo ($current_page == 'matches-mutual.php') ? 'active' : ''; ?>">
            <i class="bi bi-arrow-left-right"></i>
            <span>Mutual Matches</span>
        </a>
        <a href="matches-shortlisted.php" class="sidebar-link <?php echo ($current_page == 'matches-shortlisted.php') ? 'active' : ''; ?>">
            <i class="bi bi-star-fill"></i>
            <span>Shortlisted</span>
        </a>
        <a href="matches-visitors.php" class="sidebar-link <?php echo ($current_page == 'matches-visitors.php') ? 'active' : ''; ?>">
            <i class="bi bi-eye-fill"></i>
            <span>Profile Visitors</span>
        </a>
        
        <hr class="my-2 border-light">
        
        <a href="interests-received.php" class="sidebar-link <?php echo ($current_page == 'interests-received.php') ? 'active' : ''; ?>">
            <i class="bi bi-envelope-open-fill"></i>
            <span>Interests Received</span>
        </a>
        <a href="interests-sent.php" class="sidebar-link <?php echo ($current_page == 'interests-sent.php') ? 'active' : ''; ?>">
            <i class="bi bi-send-fill"></i>
            <span>Interests Sent</span>
        </a>
        <a href="messages.php" class="sidebar-link <?php echo ($current_page == 'messages.php') ? 'active' : ''; ?>">
            <i class="bi bi-chat-dots-fill"></i>
            <span>Inbox Chat</span>
        </a>
        
        <hr class="my-2 border-light">
        
        <a href="subscription-plans.php" class="sidebar-link <?php echo ($current_page == 'subscription-plans.php' || $current_page == 'subscription-billing.php' || $current_page == 'payment-history.php') ? 'active' : ''; ?>">
            <i class="bi bi-gem"></i>
            <span>Subscription Premium</span>
        </a>
        <a href="settings-password.php" class="sidebar-link <?php echo (strpos($current_page, 'settings-') === 0) ? 'active' : ''; ?>">
            <i class="bi bi-gear-fill"></i>
            <span>Account Settings</span>
        </a>
    </div>
</div>