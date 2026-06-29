<?php
$page_title = "Success Stories CMS";
include 'includes/header.php';
?>
<main class="dashboard-container">
    <?php include 'includes/admin-sidebar.php'; ?>
    <div class="dashboard-content">
        <div class="container-fluid px-0">
            <div class="card p-4 border bg-white shadow-sm rounded-3">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="fw-bold mb-0"><i class="bi bi-stars text-primary me-2"></i>Success Stories CMS</h4>
                    <button class="btn btn-sm btn-primary rounded-pill px-4" onclick="alert('Launch Story Editor modal')"><i class="bi bi-plus-circle me-1"></i>Publish New Story</button>
                </div>
                
                <div class="table-responsive">
                    <table class="table align-middle text-muted small">
                        <thead>
                            <tr class="text-dark">
                                <th>Couples Name</th>
                                <th>Story Title Headline</th>
                                <th>Publication Date</th>
                                <th>Visible Options</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Meera & Dev</strong></td>
                                <td>Love Found at First Click</td>
                                <td>June 15, 2025</td>
                                <td><span class="badge bg-success">Live on Homepage</span></td>
                                <td>
                                    <button class="btn btn-sm btn-outline-secondary" onclick="alert('Story editor opened')">Edit</button>
                                    <button class="btn btn-sm btn-outline-danger" onclick="confirm('Delete story?')">Delete</button>
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