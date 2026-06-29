<?php
// $is_admin is defined in header.php
?>
<?php if (isset($is_admin) && $is_admin): ?>
    <footer class="bg-white border-top py-3 text-center text-muted" style="font-size: 0.85rem;">
        <div class="container-fluid">
            <p class="mb-0">© 2026 Jodi Sodho Matrimonial Administration Portal. All Rights Reserved.</p>
        </div>
    </footer>
<?php else: ?>
    <footer class="footer-custom">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <h4 class="text-white mb-3" style="font-weight: 700;"><i class="bi bi-heart-fill text-primary"></i> Jodi Sodho</h4>
                    <p class="text-muted-light pe-3">Jodi Sodho is India's premium and trusted matrimony matchmaking platform, designed to connect progressive yet family-oriented individuals seeking their perfect life partner.</p>
                    <div class="social-icons mt-3">
                        <a href="#"><i class="bi bi-facebook"></i></a>
                        <a href="#"><i class="bi bi-instagram"></i></a>
                        <a href="#"><i class="bi bi-twitter"></i></a>
                        <a href="#"><i class="bi bi-youtube"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6">
                    <h5>Explore</h5>
                    <ul class="list-unstyled">
                        <li><a href="index.php" class="d-block mb-2">Home</a></li>
                        <li><a href="search.php" class="d-block mb-2">Advanced Search</a></li>
                        <li><a href="pricing.php" class="d-block mb-2">Membership Plans</a></li>
                        <li><a href="stories.php" class="d-block mb-2">Success Stories</a></li>
                        <li><a href="blog.php" class="d-block mb-2">Relationship Blogs</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-6">
                    <h5>Help & Legal</h5>
                    <ul class="list-unstyled">
                        <li><a href="contact.php" class="d-block mb-2">Contact Support</a></li>
                        <li><a href="faq.php" class="d-block mb-2">FAQs</a></li>
                        <li><a href="safety.php" class="d-block mb-2">Safe Matrimony Tips</a></li>
                        <li><a href="privacy.php" class="d-block mb-2">Privacy Policy</a></li>
                        <li><a href="terms.php" class="d-block mb-2">Terms & Conditions</a></li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-6">
                    <h5>Newsletter Subscription</h5>
                    <p>Subscribe to receive matchmaking guidelines, success stories, and platform updates.</p>
                    <form class="input-group mt-3" onsubmit="event.preventDefault(); alert('Thank you for subscribing!'); this.reset();">
                        <input type="email" class="form-control border-0" placeholder="Your Email Address" required style="border-radius: 30px 0 0 30px; padding-left: 1.2rem;">
                        <button class="btn btn-primary" type="submit" style="border-radius: 0 30px 30px 0; border: none; padding: 0 1.5rem;">Join</button>
                    </form>
                    <div class="mt-4 text-muted" style="font-size:0.8rem;">
                        <a href="admin-dashboard.php" class="text-secondary opacity-50"><i class="bi bi-lock-fill me-1"></i>Admin Access</a>
                    </div>
                </div>
            </div>
            <hr class="border-secondary mt-5 mb-4">
            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-start mb-2 mb-md-0">
                    <p class="mb-0">© 2026 Jodi Sodho Matrimonial Platform. All Rights Reserved.</p>
                </div>
                <div class="col-md-6 text-center text-md-end text-muted" style="font-size:0.8rem;">
                    <span class="me-2">100% Secure Payments via Razorpay</span>
                    <i class="bi bi-shield-fill-check text-success fs-5 align-middle"></i>
                </div>
            </div>
        </div>
    </footer>
<?php endif; ?>

<!-- Bootstrap 5 JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Dynamic Data Helper -->
<script src="assets/js/data.js"></script>
<!-- Platform Engine Logic -->
<script src="assets/js/main.js"></script>
</body>
</html>