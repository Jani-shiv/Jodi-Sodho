<?php
$page_title = "Register Free - Step 2";
include 'includes/header.php';
?>
<main>
    <section class="py-5">
                <div class="container py-4">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="form-card">
                                <h3 class="mb-2 text-center fw-bold">Religious & Professional Details</h3>
                                <p class="text-muted text-center mb-4">Let's find your perfect life partner. Step 2 of 3</p>
                                
                                <div class="wizard-steps">
                                    <div class="wizard-step-node completed"><i class="bi bi-check2"></i></div>
                                    <div class="wizard-step-node active">2</div>
                                    <div class="wizard-step-node">3</div>
                                </div>

                                <form id="registration-wizard-form" onsubmit="event.preventDefault();">
                                    <h5 class="mb-3 text-secondary border-bottom pb-2">Religion & Background</h5>
                                    <div class="row g-3 mb-4">
                                        <div class="col-md-6">
                                            <label class="form-label small">Religion</label>
                                            <select class="form-select" required>
                                                <option selected>Hindu</option>
                                                <option>Sikh</option>
                                                <option>Muslim</option>
                                                <option>Christian</option>
                                                <option>Jain</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label small">Mother Tongue</label>
                                            <select class="form-select" required>
                                                <option selected>Hindi</option>
                                                <option>Punjabi</option>
                                                <option>Gujarati</option>
                                                <option>Bengali</option>
                                                <option>Telugu</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label small">Caste / Sect</label>
                                            <input type="text" class="form-control" placeholder="E.g. Khatri, Brahmin" required value="Khatri">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label small">Manglik Status</label>
                                            <select class="form-select" required>
                                                <option>No</option>
                                                <option>Yes</option>
                                                <option>Don't Know / No Bar</option>
                                            </select>
                                        </div>
                                    </div>

                                    <h5 class="mb-3 text-secondary border-bottom pb-2">Education & Profession</h5>
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label class="form-label small">Highest Education</label>
                                            <select class="form-select" required>
                                                <option selected>MBA</option>
                                                <option>B.Tech / B.E.</option>
                                                <option>M.Tech / M.E.</option>
                                                <option>MBBS / Doctor</option>
                                                <option>B.Com / M.Com</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label small">Occupation</label>
                                            <select class="form-select" required>
                                                <option selected>Product Manager</option>
                                                <option>Software Engineer</option>
                                                <option>Medical Practitioner</option>
                                                <option>Business/Entrepreneur</option>
                                                <option>Civil Services/Govt</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label small">Annual Income</label>
                                            <select class="form-select" required>
                                                <option>Under ₹5 LPA</option>
                                                <option>₹5 - ₹10 LPA</option>
                                                <option>₹10 - ₹15 LPA</option>
                                                <option>₹15 - ₹25 LPA</option>
                                                <option selected>₹25+ LPA</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label small">City, State of Residence</label>
                                            <input type="text" class="form-control" placeholder="E.g. Delhi NCR" required value="Delhi NCR">
                                        </div>
                                    </div>

                                    <div class="mt-4 pt-2 border-top d-flex justify-content-between">
                                        <button type="button" class="btn btn-outline-secondary px-4 py-2" id="wizard-prev-btn"><i class="bi bi-arrow-left me-2"></i>Back</button>
                                        <button type="button" class="btn btn-primary px-5 py-2" id="wizard-next-btn">Next: Upload Photos & Bios <i class="bi bi-arrow-right ms-2"></i></button>
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