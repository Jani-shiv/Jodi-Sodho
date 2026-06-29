<?php
$page_title = "Blog Articles CMS Manager";
include 'includes/header.php';
?>
<main class="dashboard-container">
    <?php include 'includes/admin-sidebar.php'; ?>
    <div class="dashboard-content">
        <div class="container-fluid px-0">
            <div class="card p-4 border bg-white shadow-sm rounded-3">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="fw-bold mb-0"><i class="bi bi-journal-text text-info me-2"></i>Blog Articles CMS Manager</h4>
                    <button class="btn btn-sm btn-primary rounded-pill px-4" onclick="alert('Launch Blog Editor modal')"><i class="bi bi-plus-circle me-1"></i>Publish New Article</button>
                </div>
                
                <div class="table-responsive">
                    <table class="table align-middle text-muted small">
                        <thead>
                            <tr class="text-dark">
                                <th>Article Title Headline</th>
                                <th>Author Publisher</th>
                                <th>Category Tag</th>
                                <th>Publishing Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Top 5 Safety Tips for Online Matrimony Dating</strong></td>
                                <td>Admin Security Team</td>
                                <td>Safety & Security</td>
                                <td>June 25, 2026</td>
                                <td>
                                    <button class="btn btn-sm btn-outline-secondary" onclick="alert('Article editor opened')">Edit</button>
                                    <button class="btn btn-sm btn-outline-danger" onclick="confirm('Delete article?')">Delete</button>
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