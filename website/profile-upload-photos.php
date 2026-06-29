<?php
$page_title = "Manage Photographs";
include 'includes/header.php';
?>
<main class="dashboard-container">
    <?php include 'includes/user-sidebar.php'; ?>
    <div class="dashboard-content">
        <div class="container-fluid px-0">
            <div class="card p-4 border shadow-sm bg-white rounded-3">
                <h4 class="fw-bold mb-3"><i class="bi bi-camera-fill text-primary me-2"></i>My Photographs Manager</h4>
                <p class="text-muted">Manage your profile images and private gallery folders visibility controls.</p>
                
                <div class="row g-4 mb-4">
                    <div class="col-md-4">
                        <div class="gallery-thumbnail border border-primary border-3">
                            <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=300&auto=format&fit=crop&q=80" class="gallery-thumbnail-img" style="height: 220px;">
                            <div class="gallery-thumbnail-overlay"><i class="bi bi-eye"></i></div>
                            <span class="badge bg-primary position-absolute top-0 start-0 m-2">Primary Profile Photo</span>
                        </div>
                        <div class="mt-2 text-center">
                            <button class="btn btn-sm btn-outline-danger" disabled>Delete</button>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="gallery-thumbnail">
                            <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=300&auto=format&fit=crop&q=80" class="gallery-thumbnail-img" style="height: 220px;">
                            <div class="gallery-thumbnail-overlay"><i class="bi bi-eye"></i></div>
                        </div>
                        <div class="mt-2 text-center">
                            <button class="btn btn-sm btn-outline-secondary me-2" onclick="alert('Set as primary profile picture.')">Make Primary</button>
                            <button class="btn btn-sm btn-outline-danger" onclick="alert('Photo deleted')">Delete</button>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="border border-2 border-dashed rounded-3 p-5 text-center d-flex flex-column align-items-center justify-content-center" style="height: 220px; background-color: var(--light);" onclick="alert('Select photograph file to upload')">
                            <i class="bi bi-plus-circle text-primary fs-1 mb-2"></i>
                            <span class="fw-bold small text-secondary">Upload New Photo</span>
                        </div>
                    </div>
                </div>

                <div class="border-top pt-4">
                    <h6 class="fw-bold mb-3"><i class="bi bi-eye-slash-fill me-2 text-secondary"></i>Gallery Visibility Settings</h6>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="galleryPrivacy" id="privPublic" checked>
                        <label class="form-check-label small" for="privPublic"><strong>Visible to Everyone:</strong> All signups can see my uploaded graphics.</label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="galleryPrivacy" id="privPremium">
                        <label class="form-check-label small" for="privPremium"><strong>Premium Only:</strong> Only paid membership users can view my graphics.</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="galleryPrivacy" id="privAccept">
                        <label class="form-check-label small" for="privAccept"><strong>Visible on Acceptance:</strong> Only members where connection invitations are accepted can view.</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php
include 'includes/footer.php';
?>