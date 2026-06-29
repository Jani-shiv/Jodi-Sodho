<?php
$page_title = "Checkout & Premium billing";
include 'includes/header.php';
?>
<main class="dashboard-container">
    <?php include 'includes/user-sidebar.php'; ?>
    <div class="dashboard-content">
        <div class="container-fluid px-0">
            <div class="row g-4">
                <div class="col-lg-7">
                    <div class="card p-4 border shadow-sm bg-white rounded-3">
                        <h4 class="fw-bold mb-4"><i class="bi bi-shield-check text-primary me-2"></i>Secure Premium Checkout</h4>
                        
                        <form onsubmit="event.preventDefault(); document.getElementById('btn-success-modal').click();">
                            <h6 class="fw-bold mb-3 border-bottom pb-2 text-secondary">Select Payment Mode</h6>
                            
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="radio" name="payMode" id="payCard" checked onclick="document.getElementById('card-fields').style.display='block'; document.getElementById('upi-fields').style.display='none';">
                                <label class="form-check-label font-monospace small" for="payCard">Credit / Debit Card Payments</label>
                            </div>
                            
                            <div id="card-fields" class="mb-4">
                                <div class="row g-3">
                                    <div class="col-12">
                                        <label class="form-label small">Cardholder Name</label>
                                        <input type="text" class="form-control" placeholder="Name on card" required value="Rohan Verma">
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label small">Card Number</label>
                                        <input type="text" class="form-control" placeholder="16-Digit Card Number" required value="4320 8934 8923 1039">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label small">Expiry Date</label>
                                        <input type="text" class="form-control" placeholder="MM/YY" required value="12/29">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label small">CVV Number</label>
                                        <input type="password" class="form-control" placeholder="3 Digits" required value="920">
                                    </div>
                                </div>
                            </div>

                            <div class="form-check mb-3">
                                <input class="form-check-input" type="radio" name="payMode" id="payUPI" onclick="document.getElementById('card-fields').style.display='none'; document.getElementById('upi-fields').style.display='block';">
                                <label class="form-check-label font-monospace small" for="payUPI">UPI Transaction (GPay, PhonePe, Paytm)</label>
                            </div>

                            <div id="upi-fields" class="mb-4 text-center p-3 bg-light border rounded-3" style="display:none;">
                                <i class="bi bi-qr-code fs-1 text-dark mb-2"></i>
                                <span class="d-block fw-bold text-secondary mb-1">Scan QR Code using UPI App</span>
                                <span class="text-muted small">UPI ID: jodisodho@razorpay</span>
                            </div>

                            <button type="submit" class="btn btn-primary w-100 py-3 mt-3">Complete secure payment transaction</button>
                        </form>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="card p-4 border shadow-sm bg-white rounded-3">
                        <h5 class="fw-bold mb-3">Invoice Details Summary</h5>
                        <ul class="list-unstyled text-muted small">
                            <li class="d-flex justify-content-between mb-2"><span>Gold Premium Plan (3 Months)</span><strong>₹4,999.00</strong></li>
                            <li class="d-flex justify-content-between mb-2"><span>GST Tax @ 18%</span><strong>₹899.82</strong></li>
                            <li class="d-flex justify-content-between mb-2"><span>Discount Campaign Code</span><strong class="text-success">-₹500.00</strong></li>
                            <hr>
                            <li class="d-flex justify-content-between text-dark fw-bold mb-0"><span>Grand Total Payable</span><strong>₹5,398.82</strong></li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Transaction Success modal activator button -->
            <button type="button" class="btn d-none" id="btn-success-modal" data-bs-toggle="modal" data-bs-target="#paymentSuccessModal"></button>
            <div class="modal fade" id="paymentSuccessModal" tabindex="-1" aria-hidden="true" data-bs-backdrop="static">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content text-center p-4 border-0" style="border-radius: var(--border-radius-md);">
                        <div class="modal-body">
                            <i class="bi bi-check-circle-fill text-success" style="font-size: 4rem;"></i>
                            <h4 class="fw-bold text-dark mt-3">Payment Successful!</h4>
                            <p class="text-muted small mb-4">Transaction ID: TXN9203847291. Your profile account has been upgraded to Gold Premium Membership.</p>
                            <button type="button" class="btn btn-primary px-5 rounded-pill" onclick="window.location.href='user-dashboard.php'">Back to Dashboard</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php
include 'includes/footer.php';
?>