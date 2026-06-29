<?php
$page_title = "Relationship Blog Feed";
include 'includes/header.php';
?>
<main>
    <section class="py-5 text-center text-white" style="background: var(--gradient-primary);">
                <div class="container py-4">
                    <h2 class="fw-bold mb-2">Relationship & Matchmaking Insights</h2>
                    <p class="mb-0 opacity-90">Expert tips on finding the right match, safety guidelines, and success stories advice.</p>
                </div>
            </section>
            
            <section class="py-5">
                <div class="container py-4">
                    <div class="row" id="blogs-list-container">
                        <!-- Loaded dynamically via javascript -->
                    </div>
                </div>
            </section>
</main>
<?php
include 'includes/footer.php';
?>