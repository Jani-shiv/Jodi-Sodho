<?php
if (file_exists(__DIR__ . '/db.php')) {
    include_once __DIR__ . '/db.php';
}
$current_page = basename($_SERVER['PHP_SELF']);
$is_admin = (strpos($current_page, 'admin-') === 0);
$is_user = (
    strpos($current_page, 'user-') === 0 || 
    strpos($current_page, 'profile-') === 0 || 
    strpos($current_page, 'partner-') === 0 || 
    strpos($current_page, 'member-') === 0 || 
    strpos($current_page, 'matches-') === 0 || 
    strpos($current_page, 'interests-') === 0 || 
    strpos($current_page, 'subscription-') === 0 || 
    strpos($current_page, 'settings-') === 0 || 
    $current_page === 'messages.php' || 
    $current_page === 'notifications.php' || 
    $current_page === 'payment-history.php'
);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($page_title) ? $page_title : "Jodi Sodho Matrimonial"; ?> | Jodi Sodho Matrimonial</title>
    <!-- Google Fonts Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Custom Style System -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<?php if ($is_admin): ?>
    <!-- Admin Navbar -->
    <nav class="navbar navbar-expand-lg navbar-custom sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand text-secondary" href="admin-dashboard.php">
                <i class="bi bi-shield-lock-fill"></i> Jodi Sodho <span class="badge bg-secondary font-monospace" style="font-size:0.65rem; padding: 0.2rem 0.5rem; border-radius: 4px; vertical-align: middle; margin-left: 5px;">ADMIN</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#adminNavbarContent">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="adminNavbarContent">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link" href="../website/index.php"><i class="bi bi-globe me-1"></i>View Site</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center gap-2" href="#" role="button" data-bs-toggle="dropdown">
                            <div class="rounded-circle bg-secondary text-white d-flex align-items-center justify-content-center" style="width: 32px; height: 32px; font-weight:600; font-size: 0.85rem;">AD</div>
                            <span>Administrator</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end shadow border-0" style="border-radius: var(--border-radius-md);">
                            <li><a class="dropdown-item py-2" href="admin-settings.php"><i class="bi bi-gear me-2"></i>System Settings</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item py-2 text-danger" href="../website/index.php"><i class="bi bi-box-arrow-right me-2"></i>Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<?php elseif ($is_user): ?>
    <!-- Authenticated Member Navbar -->
    <nav class="navbar navbar-expand-lg navbar-custom sticky-top">
        <div class="container-fluid px-lg-4">
            <a class="navbar-brand" href="user-dashboard.php">
                <i class="bi bi-heart-fill text-primary"></i> Jodi Sodho
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#userNavbarContent">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="userNavbarContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($current_page == 'user-dashboard.php') ? 'active' : ''; ?>" href="user-dashboard.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo (strpos($current_page, 'matches-') === 0) ? 'active' : ''; ?>" href="matches-all.php">My Matches</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($current_page == 'messages.php') ? 'active' : ''; ?>" href="messages.php">
                            Messages <span class="badge bg-danger rounded-pill" style="font-size:0.65rem; vertical-align:top; margin-left: 2px;">1</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($current_page == 'search.php') ? 'active' : ''; ?>" href="search.php">Search Partner</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto align-items-center gap-2">
                    <li class="nav-item me-2 position-relative">
                        <a class="nav-link p-2 bg-light rounded-circle text-dark d-flex align-items-center justify-content-center" href="notifications.php" style="width: 40px; height: 40px;">
                            <i class="bi bi-bell-fill text-muted"></i>
                            <span class="position-absolute top-0 start-100 translate-middle p-1 bg-danger border border-light rounded-circle" style="margin-left:-8px; margin-top:8px;"></span>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center gap-2 border rounded-pill pe-3 ps-2 py-1 bg-white" href="#" role="button" data-bs-toggle="dropdown">
                            <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=100&auto=format&fit=crop&q=80" alt="Self Profile" class="rounded-circle" style="width: 32px; height: 32px; object-fit: cover;">
                            <span class="d-none d-lg-inline" style="font-size: 0.9rem;">Rohan V.</span>
                            <span class="badge bg-warning text-dark font-monospace" style="font-size:0.65rem;">GOLD</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end shadow border-0" style="border-radius: var(--border-radius-md);">
                            <li><a class="dropdown-item py-2" href="user-profile.php"><i class="bi bi-person me-2"></i>My Profile</a></li>
                            <li><a class="dropdown-item py-2" href="profile-edit.php"><i class="bi bi-pencil-square me-2"></i>Edit Profile</a></li>
                            <li><a class="dropdown-item py-2" href="partner-preferences.php"><i class="bi bi-sliders me-2"></i>Partner Expectations</a></li>
                            <li><a class="dropdown-item py-2" href="subscription-plans.php"><i class="bi bi-award me-2"></i>My Subscriptions</a></li>
                            <li><a class="dropdown-item py-2" href="settings-password.php"><i class="bi bi-gear me-2"></i>Account Settings</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item py-2 text-danger" href="../website/index.php"><i class="bi bi-box-arrow-right me-2"></i>Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<?php else: ?>
    <!-- Public Guest Navbar -->
    <nav class="navbar navbar-expand-lg navbar-custom sticky-top">
        <div class="container">
            <a class="navbar-brand" href="../website/index.php">
                <i class="bi bi-heart-fill text-primary"></i> Jodi Sodho
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#guestNavbarContent">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="guestNavbarContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item"><a class="nav-link <?php echo ($current_page == 'index.php') ? 'active' : ''; ?>" href="../website/index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link <?php echo ($current_page == 'search.php') ? 'active' : ''; ?>" href="search.php">Search</a></li>
                    <li class="nav-item"><a class="nav-link <?php echo ($current_page == 'pricing.php') ? 'active' : ''; ?>" href="pricing.php">Pricing</a></li>
                    <li class="nav-item"><a class="nav-link <?php echo ($current_page == 'stories.php') ? 'active' : ''; ?>" href="stories.php">Success Stories</a></li>
                    <li class="nav-item"><a class="nav-link <?php echo ($current_page == 'blog.php') ? 'active' : ''; ?>" href="blog.php">Blog</a></li>
                    <li class="nav-item"><a class="nav-link <?php echo ($current_page == 'faq.php') ? 'active' : ''; ?>" href="faq.php">FAQ</a></li>
                    <li class="nav-item"><a class="nav-link <?php echo ($current_page == 'contact.php') ? 'active' : ''; ?>" href="contact.php">Contact</a></li>
                </ul>
                <div class="d-flex gap-2">
                    <a href="login.php" class="btn btn-outline-primary px-4 py-2" style="font-size:0.9rem;">Sign In</a>
                    <a href="register.php" class="btn btn-primary px-4 py-2" style="font-size:0.9rem;">Register Free</a>
                </div>
            </div>
        </div>
    </nav>
<?php endif; ?>