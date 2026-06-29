<?php
$page_title = "Reset Password";
include 'includes/header.php';
?>
<main>
    <section class="py-5" style="min-height: calc(100vh - 73px); display: flex; align-items: center;">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-6 col-lg-5">
                            <div class="form-card">
                                <div class="text-center mb-4">
                                    <i class="bi bi-shield-lock-fill text-primary fs-1 mb-2 d-block"></i>
                                    <h3 class="fw-bold">Create New Password</h3>
                                    <p class="text-muted">Enter your secure password below to restore access.</p>
                                </div>
                                <form onsubmit="event.preventDefault(); alert('Password successfully changed! Redirecting to sign in page.'); window.location.href='login.php';">
                                    <div class="form-floating mb-3">
                                        <input type="password" class="form-control" placeholder="New Password" required minlength="8">
                                        <label>New Secure Password</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="password" class="form-control" placeholder="Confirm Password" required minlength="8">
                                        <label>Confirm Password</label>
                                    </div>
                                    
                                    <div class="mb-3 small text-muted">
                                        Password guidelines: Must have at least 8 characters, one upper case, one number, and one symbol.
                                    </div>

                                    <button class="btn btn-primary w-100 py-3" type="submit">Update Password</button>
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