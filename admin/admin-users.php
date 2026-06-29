<?php
$page_title = "Manage Platform Accounts";
include 'includes/header.php';
?>
<main class="dashboard-container">
    <?php include 'includes/admin-sidebar.php'; ?>
    <div class="dashboard-content">
        <div class="container-fluid px-0">
            <div class="card p-4 border bg-white shadow-sm rounded-3">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="fw-bold mb-0">Platform User Accounts</h4>
                    <div class="input-group" style="max-width: 300px;">
                        <input type="text" class="form-control form-control-sm" placeholder="Search accounts by name...">
                        <button class="btn btn-sm btn-secondary"><i class="bi bi-search"></i></button>
                    </div>
                </div>
                
                <div class="table-responsive">
                    <table class="table align-middle text-muted small">
                        <thead>
                            <tr class="text-dark">
                                <th>Name</th>
                                <th>Email / Contact</th>
                                <th>Religion & Caste</th>
                                <th>Income Details</th>
                                <th>Verified Identity</th>
                                <th>Account Status</th>
                                <th>Action Panel</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Rohan Verma</strong></td>
                                <td>rohan.verma@example.com</td>
                                <td>Hindu (Khatri)</td>
                                <td>₹32 LPA</td>
                                <td><span class="badge bg-success">Verified Identity</span></td>
                                <td><span class="badge bg-info text-dark">Gold Plan Active</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown">Actions</button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="admin-user-details.php?id=2">Edit Profile Details</a></li>
                                            <li><button class="dropdown-item" onclick="adminActionUser('verify', 'Rohan Verma')">Toggle Verified Status</button></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><button class="dropdown-item text-danger" onclick="adminActionUser('suspend', 'Rohan Verma')">Suspend User</button></li>
                                            <li><button class="dropdown-item text-danger" onclick="adminActionUser('delete', 'Rohan Verma')">Delete Account</button></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Ananya Sharma</strong></td>
                                <td>ananya@example.com</td>
                                <td>Hindu (Brahmin)</td>
                                <td>₹24 LPA</td>
                                <td><span class="badge bg-success">Verified Identity</span></td>
                                <td><span class="badge bg-info text-dark">Gold Plan Active</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown">Actions</button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="admin-user-details.php?id=1">Edit Profile Details</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><button class="dropdown-item text-danger" onclick="adminActionUser('suspend', 'Ananya Sharma')">Suspend User</button></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
<?php
include 'includes/footer.php';
?>