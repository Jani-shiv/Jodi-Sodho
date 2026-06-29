<?php
$page_title = "Subscription Payments ledger";
include 'includes/header.php';
?>
<main class="dashboard-container">
    <?php include 'includes/admin-sidebar.php'; ?>
    <div class="dashboard-content">
        <div class="container-fluid px-0">
            <div class="card p-4 border bg-white shadow-sm rounded-3">
                <h4 class="fw-bold mb-4"><i class="bi bi-currency-exchange text-danger me-2"></i>Payments & Subscription Ledger</h4>
                
                <div class="table-responsive">
                    <table class="table align-middle text-muted small">
                        <thead>
                            <tr class="text-dark">
                                <th>Transaction Ref</th>
                                <th>User Candidate</th>
                                <th>Plan Details</th>
                                <th>Price Amount</th>
                                <th>Gateway Provider</th>
                                <th>Payment Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>TXN9203847291</strong></td>
                                <td>Rohan Verma</td>
                                <td>Gold Premium Plan (3 Months)</td>
                                <td>₹4,999.00</td>
                                <td>Razorpay Checkout</td>
                                <td>June 10, 2026</td>
                                <td><span class="badge bg-success">Success / Settled</span></td>
                            </tr>
                            <tr>
                                <td><strong>TXN7392748293</strong></td>
                                <td>Ananya Sharma</td>
                                <td>Gold Premium Plan (3 Months)</td>
                                <td>₹4,999.00</td>
                                <td>Razorpay Checkout</td>
                                <td>June 08, 2026</td>
                                <td><span class="badge bg-success">Success / Settled</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
<?php
include 'includes/footer.php';
?>