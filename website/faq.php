<?php
$page_title = "Frequently Asked Questions";
include 'includes/header.php';
?>
<main>
    <section class="py-5">
                <div class="container py-4 col-lg-8">
                    <h2 class="fw-bold mb-4 text-center">Frequently Asked Questions</h2>
                    <div class="accordion shadow-sm border rounded-3 overflow-hidden bg-white" id="faqAccordion">
                        <div class="accordion-item border-0 border-bottom">
                            <h2 class="accordion-header">
                                <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true">
                                    How do I get my profile verified?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                                <div class="accordion-body text-muted">
                                    To verify your profile, navigate to My Profile dashboard and upload a scanned image of a Government issued identification card (Aadhaar Card, Passport, or PAN card). Our administrative team reviews uploads within 24 hours. Once checked, you'll receive the green 'Verified Identity' checkmark.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item border-0 border-bottom">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false">
                                    Is my personal phone number visible to everyone?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body text-muted">
                                    No. By default, your contact information is protected and hidden. It is only accessible to premium users whom you have accepted matching interests with, or you can adjust these visibility conditions in your Account Privacy Settings dashboard.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item border-0 border-bottom">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false">
                                    How do I pause or temporarily deactivate my account?
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body text-muted">
                                    You can pause your profile by visiting Account Settings > Deactivate Account. Pausing hides your profile completely from search results and match grids, but retains all existing connection lists if you choose to reactivate later.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
</main>
<?php
include 'includes/footer.php';
?>