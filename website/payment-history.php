<?php
$page_title = "Payment Invoice History";
include 'includes/header.php';
?>
<main class="dashboard-container">
    <?php include 'includes/user-sidebar.php'; ?>
    <div class="dashboard-content">
        <div class="container-fluid px-0">
            <div class="card p-4 border shadow-sm bg-white rounded-3">
                <h4 class="fw-bold mb-4"><i class="bi bi-currency-exchange text-primary me-2"></i>My Payment Transactions History</h4>
                
                <div class="table-responsive">
                    <table class="table align-middle text-muted small">
                        <thead>
                            <tr class="text-dark">
                                <th>Invoice Reference</th>
                                <th>Billing Date</th>
                                <th>Premium Plan Category</th>
                                <th>Price Amount</th>
                                <th>Status Flag</th>
                                <th>Action Panel</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>INV-2026-004</strong></td>
                                <td>June 10, 2026</td>
                                <td>Gold Premium Plan (3 Months)</td>
                                <td>₹4,999</td>
                                <td><span class="badge bg-success">Transaction Paid</span></td>
                                <td><button class="btn btn-sm btn-outline-secondary py-1" onclick="alert('PDF receipt downloaded!')"><i class="bi bi-file-earmark-pdf me-1"></i>Download Receipt</button></td>
                            </tr>
                            <tr>
                                <td><strong>INV-2026-001</strong></td>
                                <td>March 10, 2026</td>
                                <td>Silver Premium Plan (1 Month)</td>
                                <td>₹1,999</td>
                                <td><span class="badge bg-success">Transaction Paid</span></td>
                                <td><button class="btn btn-sm btn-outline-secondary py-1" onclick="alert('PDF receipt downloaded!')"><i class="bi bi-file-earmark-pdf me-1"></i>Download Receipt</button></td>
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