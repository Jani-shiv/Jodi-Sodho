<?php
$page_title = "Success Stories";
include 'includes/header.php';
?>
<main>
    <section class="py-5 text-center text-white" style="background: var(--gradient-primary);">
                <div class="container py-4">
                    <h2 class="fw-bold mb-2">Happily Married Success Stories</h2>
                    <p class="mb-0 opacity-90">Read the inspiring stories of couples who found their soulmate matchmaking on Jodi Sodho.</p>
                </div>
            </section>
            
            <section class="py-5">
                <div class="container py-4">
                    <div class="row" id="stories-list-container">
                        <!-- Loaded dynamically via javascript -->
                    </div>
                </div>
            </section>
</main>
<?php
include 'includes/footer.php';
?>