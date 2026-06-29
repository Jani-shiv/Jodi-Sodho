<?php
$page_title = "Privacy Visibility Controls";
include 'includes/header.php';
?>
<main class="dashboard-container">
    <?php include 'includes/user-sidebar.php'; ?>
    <div class="dashboard-content">
        <div class="container-fluid px-0">
            <div class="card p-4 border shadow-sm bg-white rounded-3 col-lg-8">
                <h4 class="fw-bold mb-4"><i class="bi bi-eye-slash-fill text-primary me-2"></i>Privacy & Visibility Controls</h4>
                <form onsubmit="event.preventDefault(); alert('Privacy visibility controls saved!');">
                    
                    <div class="mb-4">
                        <h6 class="fw-bold text-secondary border-bottom pb-2">Profile Contact Numbers Visibility</h6>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="phonePriv" id="phonePub" checked>
                            <label class="form-check-label small" for="phonePub">Show number to matches whom I have accepted interests with (Recommended).</label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="phonePriv" id="phonePremOnly">
                            <label class="form-check-label small" for="phonePremOnly">Show number to premium subscribers only.</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="phonePriv" id="phoneSec">
                            <label class="form-check-label small" for="phoneSec">Keep phone number hidden completely (I will initiate contacts).</label>
                        </div>
                    </div>

                    <div class="mb-4">
                        <h6 class="fw-bold text-secondary border-bottom pb-2">Search Visibility Indices</h6>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" id="searchInd" checked>
                            <label class="form-check-label small" for="searchInd">Enable search engine indexing (Google, Bing can index my profile info details).</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="profileBoostCheck" checked>
                            <label class="form-check-label small" for="profileBoostCheck">Boost profile matching recommendation frequencies.</label>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary px-5 py-2">Save Privacy Settings</button>
                </form>
            </div>
        </div>
    </div>
</main>
<?php
include 'includes/footer.php';
?>