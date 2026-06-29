<?php
$page_title = "Contact Us";
include 'includes/header.php';
?>
<main>
    <section class="py-5">
                <div class="container py-4">
                    <div class="row g-5">
                        <div class="col-lg-5">
                            <h2 class="fw-bold mb-3">Get in Touch</h2>
                            <p class="text-muted mb-4">Have questions about registration, identity verification documents, or subscription plans? Our support agents are here to assist you 24/7.</p>
                            
                            <div class="d-flex gap-3 mb-4">
                                <div class="bg-primary-light text-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 48px; height: 48px; flex-shrink: 0;">
                                    <i class="bi bi-geo-alt-fill fs-5"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-1">Corporate Headquarters</h6>
                                    <p class="text-muted mb-0">8th Floor, Cyber Plaza Tower C, Tech Park Phase-2, Bangalore - 560103, Karnataka, India</p>
                                </div>
                            </div>

                            <div class="d-flex gap-3 mb-4">
                                <div class="bg-primary-light text-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 48px; height: 48px; flex-shrink: 0;">
                                    <i class="bi bi-telephone-fill fs-5"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-1">Support Contact Numbers</h6>
                                    <p class="text-muted mb-0">+91 80 4920 1800 (Support Desk)<br>+91 99887 76655 (Toll-Free Partner Search)</p>
                                </div>
                            </div>

                            <div class="d-flex gap-3 mb-4">
                                <div class="bg-primary-light text-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 48px; height: 48px; flex-shrink: 0;">
                                    <i class="bi bi-envelope-fill fs-5"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-1">Electronic Support Mail</h6>
                                    <p class="text-muted mb-0">support@jodisodho.com<br>info@jodisodho.com</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-7">
                            <div class="form-card">
                                <h4 class="fw-bold mb-4">Send Us a Message</h4>
                                <form onsubmit="event.preventDefault(); alert('Message successfully sent to our support desk! Ticket reference generated.'); this.reset();">
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" placeholder="Name" required>
                                                <label>Your Full Name</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input type="email" class="form-control" placeholder="Email" required>
                                                <label>Email Address</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" placeholder="Subject" required>
                                                <label>Subject Topic</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-floating mb-3">
                                                <textarea class="form-control" placeholder="Message" style="height: 120px;" required></textarea>
                                                <label>How can we help you?</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary btn-lg px-5 py-3 w-100">Send Support Inquiry</button>
                                        </div>
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