<?php
$page_title = "Register Free - Step 3";
include 'includes/header.php';
?>
<main>
    <section class="py-5">
                <div class="container py-4">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="form-card">
                                <h3 class="mb-2 text-center fw-bold">Biography & Photo Upload</h3>
                                <p class="text-muted text-center mb-4">Let's find your perfect life partner. Step 3 of 3</p>
                                
                                <div class="wizard-steps">
                                    <div class="wizard-step-node completed"><i class="bi bi-check2"></i></div>
                                    <div class="wizard-step-node completed"><i class="bi bi-check2"></i></div>
                                    <div class="wizard-step-node active">3</div>
                                </div>

                                <form id="registration-wizard-form" onsubmit="event.preventDefault();">
                                    <div class="mb-4">
                                        <label class="form-label small">Tell us about yourself (Bio)</label>
                                        <textarea class="form-control" rows="4" placeholder="Briefly describe your values, hobbies, career, and partner expectations..." required>Passionate about tech, travel, and fitness. I am looking for a partner who is career-driven, independent, and has a strong sense of humor.</textarea>
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label small d-block">Upload Profile Photograph</label>
                                        <div class="border border-2 border-dashed p-5 text-center bg-light rounded-3 cursor-pointer" onclick="alert('Mock File Dialog: Select a handsome portrait photo')">
                                            <i class="bi bi-cloud-arrow-up-fill text-primary fs-1 mb-2 d-block"></i>
                                            <span class="d-block fw-bold text-secondary mb-1">Drag and drop profile picture here</span>
                                            <span class="text-muted small">Supports JPG, PNG formats, maximum file size 5MB.</span>
                                        </div>
                                    </div>

                                    <div class="form-check mb-4">
                                        <input class="form-check-input" type="checkbox" id="termsCheck" checked required>
                                        <label class="form-check-label small" for="termsCheck">
                                            I agree to the <a href="terms.php" target="_blank">Terms of Use</a> and <a href="privacy.php" target="_blank">Privacy Policy</a> of Jodi Sodho.
                                        </label>
                                    </div>

                                    <div class="mt-4 pt-2 border-top d-flex justify-content-between">
                                        <button type="button" class="btn btn-outline-secondary px-4 py-2" id="wizard-prev-btn"><i class="bi bi-arrow-left me-2"></i>Back</button>
                                        <button type="button" class="btn btn-primary px-5 py-2" id="wizard-next-btn">Complete & Find Matches <i class="bi bi-check2-circle ms-2"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
</main>
<?php
include 'includes/footer.php';
?>