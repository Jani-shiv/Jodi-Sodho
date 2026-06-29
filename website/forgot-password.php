<?php
$page_title = "Forgot Password";
include 'includes/header.php';
?>
<main>
    <section class="py-5" style="min-height: calc(100vh - 73px); display: flex; align-items: center;">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-6 col-lg-5">
                            <div class="form-card">
                                <div class="text-center mb-4">
                                    <i class="bi bi-key-fill text-primary fs-1 mb-2 d-block"></i>
                                    <h3 class="fw-bold">Forgot Password</h3>
                                    <p class="text-muted">Enter your registered email or phone to reset your password.</p>
                                </div>
                                <form id="forgotForm" onsubmit="event.preventDefault(); document.getElementById('otp-stage').style.display='block'; document.getElementById('init-stage').style.display='none';">
                                    <div id="init-stage">
                                        <div class="form-floating mb-3">
                                            <input type="email" class="form-control" placeholder="name@example.com" required value="rohan.verma@example.com">
                                            <label>Email Address / Phone Number</label>
                                        </div>
                                        <button class="btn btn-primary w-100 py-3 mb-3" type="submit">Send Verification Link</button>
                                    </div>
                                    
                                    <div id="otp-stage" style="display:none;">
                                        <div class="alert alert-success text-center small mb-3">We have sent a verification code to your email!</div>
                                        <div class="form-group mb-3">
                                            <label class="form-label small text-muted">Enter 4-Digit OTP Code</label>
                                            <div class="d-flex gap-2 justify-content-center">
                                                <input type="text" class="form-control text-center" style="width: 50px; font-size:1.4rem;" maxlength="1" value="1">
                                                <input type="text" class="form-control text-center" style="width: 50px; font-size:1.4rem;" maxlength="1" value="2">
                                                <input type="text" class="form-control text-center" style="width: 50px; font-size:1.4rem;" maxlength="1" value="3">
                                                <input type="text" class="form-control text-center" style="width: 50px; font-size:1.4rem;" maxlength="1" value="4">
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-primary w-100 py-3 mb-2" onclick="window.location.href='reset-password.php'">Verify & Proceed</button>
                                        <div class="text-center mt-2"><a href="#" class="small text-secondary" onclick="alert('Code resent successfully')">Resend Code</a></div>
                                    </div>

                                    <div class="text-center small text-muted mt-3">
                                        Back to <a href="login.php" class="fw-bold">Sign In</a>
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