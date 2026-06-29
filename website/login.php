<?php
$page_title = "Sign In";
include 'includes/header.php';
?>
<main>
    <section class="py-5" style="background: linear-gradient(135deg, #fff 0%, #fff0f3 100%); min-height: calc(100vh - 73px); display: flex; align-items: center;">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-6 col-lg-5">
                            <div class="form-card">
                                <div class="text-center mb-4">
                                    <h3 class="fw-bold text-primary"><i class="bi bi-heart-fill"></i> Jodi Sodho</h3>
                                    <p class="text-muted">Welcome back! Sign in to match with your partner.</p>
                                </div>
                                <form onsubmit="event.preventDefault(); window.location.href='user-dashboard.php';">
                                    <div class="form-floating mb-3">
                                        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" required value="rohan.verma@example.com">
                                        <label for="floatingInput">Email Address / Phone Number</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="password" class="form-control" id="floatingPassword" placeholder="Password" required value="supersecurepassword1">
                                        <label for="floatingPassword">Password</label>
                                    </div>
                                    
                                    <div class="d-flex justify-content-between align-items-center mb-4" style="font-size:0.85rem;">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="rememberMeCheck" checked>
                                            <label class="form-check-label text-muted" for="rememberMeCheck">Remember Me</label>
                                        </div>
                                        <a href="forgot-password.php">Forgot Password?</a>
                                    </div>

                                    <button class="btn btn-primary w-100 py-3 mb-3" type="submit"><i class="bi bi-box-arrow-in-right me-2"></i>Sign In</button>

                                    <div class="text-center mb-3 text-muted small">Or Sign In with</div>
                                    <div class="d-flex gap-2 mb-4">
                                        <button type="button" class="btn btn-outline-secondary w-50 py-2" onclick="alert('Mock Google OAuth: Connecting account...')"><i class="bi bi-google text-danger me-2"></i>Google</button>
                                        <button type="button" class="btn btn-outline-secondary w-50 py-2" onclick="alert('Mock Facebook OAuth: Connecting account...')"><i class="bi bi-facebook text-primary me-2"></i>Facebook</button>
                                    </div>

                                    <div class="text-center small text-muted">
                                        New to Jodi Sodho? <a href="register.php" class="fw-bold text-primary">Register Free</a>
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