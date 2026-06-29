<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>
<div class="sidebar-custom shadow-sm bg-dark text-white border-0" style="min-height: calc(100vh - 73px);">
    <div class="text-center mb-4 text-white border-bottom border-secondary pb-3">
        <div class="rounded-circle bg-secondary mx-auto d-flex align-items-center justify-content-center" style="width: 64px; height: 64px; font-weight:700; font-size: 1.4rem;">A</div>
        <h6 class="mt-3 mb-1 text-white">Platform Control</h6>
        <p class="text-secondary small mb-0">Role: Super Admin</p>
    </div>
    
    <div class="sidebar-menu-wrapper">
        <a href="admin-dashboard.php" class="sidebar-link text-white <?php echo ($current_page == 'admin-dashboard.php') ? 'active-admin' : ''; ?>">
            <i class="bi bi-speedometer2 text-info"></i>
            <span>Dashboard Home</span>
        </a>
        <a href="admin-users.php" class="sidebar-link text-white <?php echo ($current_page == 'admin-users.php' || $current_page == 'admin-user-details.php') ? 'active-admin' : ''; ?>">
            <i class="bi bi-people-fill text-warning"></i>
            <span>User Management</span>
        </a>
        <a href="admin-user-verify.php" class="sidebar-link text-white <?php echo ($current_page == 'admin-user-verify.php') ? 'active-admin' : ''; ?>">
            <i class="bi bi-check-circle-fill text-success"></i>
            <span>Verify Queue</span>
        </a>
        <a href="admin-payments.php" class="sidebar-link text-white <?php echo ($current_page == 'admin-payments.php') ? 'active-admin' : ''; ?>">
            <i class="bi bi-currency-exchange text-danger"></i>
            <span>Subscription Billing</span>
        </a>
        
        <hr class="my-2 border-secondary">
        <div class="px-3 my-2 text-secondary small fw-bold uppercase">CMS Management</div>
        
        <a href="admin-stories.php" class="sidebar-link text-white <?php echo ($current_page == 'admin-stories.php') ? 'active-admin' : ''; ?>">
            <i class="bi bi-stars text-primary"></i>
            <span>Success Stories</span>
        </a>
        <a href="admin-blog.php" class="sidebar-link text-white <?php echo ($current_page == 'admin-blog.php') ? 'active-admin' : ''; ?>">
            <i class="bi bi-journal-text text-info"></i>
            <span>Platform Blog</span>
        </a>
        
        <hr class="my-2 border-secondary">
        <div class="px-3 my-2 text-secondary small fw-bold uppercase">Support & Reports</div>
        
        <a href="admin-tickets.php" class="sidebar-link text-white <?php echo ($current_page == 'admin-tickets.php') ? 'active-admin' : ''; ?>">
            <i class="bi bi-ticket-detailed-fill text-warning"></i>
            <span>Tickets & Reports</span>
        </a>
        <a href="admin-analytics.php" class="sidebar-link text-white <?php echo ($current_page == 'admin-analytics.php') ? 'active-admin' : ''; ?>">
            <i class="bi bi-graph-up-arrow text-success"></i>
            <span>Platform Analytics</span>
        </a>
        <a href="admin-settings.php" class="sidebar-link text-white <?php echo ($current_page == 'admin-settings.php') ? 'active-admin' : ''; ?>">
            <i class="bi bi-sliders2 text-secondary"></i>
            <span>System Settings</span>
        </a>
    </div>
</div>