<?php
$page_title = "Chat Inbox Messages";
include 'includes/header.php';
?>
<main class="dashboard-container">
    <?php include 'includes/user-sidebar.php'; ?>
    <div class="dashboard-content">
        <div class="container-fluid px-0">
            <div class="chat-window">
                <!-- User Contacts List -->
                <div class="chat-users-list">
                    <div class="p-3 border-bottom bg-light">
                        <div class="input-group">
                            <span class="input-group-text bg-white border-end-0"><i class="bi bi-search text-muted"></i></span>
                            <input type="text" class="form-control border-start-0" placeholder="Search matches..." onkeyup="alert('Filtering contact list...')">
                        </div>
                    </div>
                    <div class="flex-grow-1 overflow-y-auto" id="chat-users-list-container">
                        <!-- Loaded dynamically via Javascript -->
                    </div>
                </div>
                
                <!-- Chat Feed area -->
                <div class="chat-messages-container">
                    <div class="p-3 border-bottom bg-white d-flex justify-content-between align-items-center" id="chat-active-header">
                        <!-- Loaded dynamically via Javascript -->
                    </div>
                    
                    <div class="flex-grow-1 p-3 overflow-y-auto d-flex flex-column" id="chat-messages-box" style="height: 400px;">
                        <!-- Messages bubbles injected dynamically -->
                    </div>
                    
                    <div class="p-3 bg-white border-top">
                        <form id="chat-send-form" class="d-flex gap-2">
                            <button type="button" class="btn btn-outline-secondary rounded-circle" onclick="alert('Mock File Upload: Select photograph to share in chat.')" title="Share Photo"><i class="bi bi-image"></i></button>
                            <input type="text" class="form-control rounded-pill px-4" id="chat-message-input" placeholder="Type a message details here..." required>
                            <button class="btn btn-primary rounded-circle px-3 py-2" type="submit"><i class="bi bi-send-fill"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php
include 'includes/footer.php';
?>