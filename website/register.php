<?php
$page_title = "Register Free - Step 1";
include 'includes/header.php';
?>
<main>
    <section class="py-5">
                <div class="container py-4">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="form-card">
                                <h3 class="mb-2 text-center fw-bold">Create Matrimony Profile</h3>
                                <p class="text-muted text-center mb-4">Let's find your perfect life partner. Step 1 of 3</p>
                                
                                <div class="wizard-steps">
                                    <div class="wizard-step-node active">1</div>
                                    <div class="wizard-step-node">2</div>
                                    <div class="wizard-step-node">3</div>
                                </div>

                                <form id="registration-wizard-form" onsubmit="event.preventDefault();">
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label class="form-label small">Profile Created For</label>
                                            <select class="form-select" required>
                                                <option>Self</option>
                                                <option>Son</option>
                                                <option>Daughter</option>
                                                <option>Brother</option>
                                                <option>Sister</option>
                                                <option>Friend</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label small">Gender</label>
                                            <select class="form-select" required>
                                                <option>Male</option>
                                                <option>Female</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label small">First Name</label>
                                            <input type="text" class="form-control" placeholder="First Name" required value="Rohan">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label small">Last Name</label>
                                            <input type="text" class="form-control" placeholder="Last Name" required value="Verma">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label small">Date of Birth</label>
                                            <input type="date" class="form-control" required value="1998-05-15">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label small">Mobile Phone Number</label>
                                            <input type="tel" class="form-control" placeholder="Enter 10-digit number" required value="9876543210">
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label small">Email Address</label>
                                            <input type="email" class="form-control" placeholder="name@example.com" required value="rohan.verma@example.com">
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label small">Create Password</label>
                                            <input type="password" class="form-control" placeholder="Choose a secure password" required value="supersecurepassword1">
                                        </div>
                                    </div>
                                    <div class="mt-4 pt-2 border-top d-flex justify-content-end">
                                        <button type="button" class="btn btn-primary px-5 py-2" id="wizard-next-btn">Next: Career & Religion Details <i class="bi bi-arrow-right ms-2"></i></button>
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