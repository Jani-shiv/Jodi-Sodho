/* Jodi Sodho – Interactive JavaScript Engine */

document.addEventListener("DOMContentLoaded", function() {
    // 1. Initialize Profile Lists dynamically on matches pages
    initMatchesList();

    // 2. Initialize Success Stories on public pages
    initSuccessStories();

    // 3. Initialize Blogs list
    initBlogsList();

    // 4. Initialize Interactive Chat Inbox
    initChatInbox();

    // 5. Initialize Multi-Step Registration Wizard
    initRegistrationWizard();

    // 6. Initialize Verification Approval buttons (Admin)
    initAdminVerificationQueue();

    // 7. General Interactive Components (Shortlist, Interest Express)
    initQuickActions();
});

/* Matches and Search Results Populator */
function initMatchesList() {
    const listContainer = document.getElementById("matches-list-container");
    if (!listContainer) return;

    // Determine filter criteria based on current page
    const path = window.location.pathname;
    const page = path.substring(path.lastIndexOf('/') + 1);
    
    let filteredProfiles = JodiSodhoData.profiles;
    
    if (page === 'matches-daily.php') {
        // Daily matches (limit to 3 profiles)
        filteredProfiles = JodiSodhoData.profiles.slice(0, 3);
    } else if (page === 'matches-mutual.php') {
        // Mutual matches (matching specific profiles)
        filteredProfiles = JodiSodhoData.profiles.filter(p => p.premium);
    } else if (page === 'matches-shortlisted.php') {
        // Mock shortlisted profiles
        filteredProfiles = JodiSodhoData.profiles.slice(2, 5);
    } else if (page === 'matches-visitors.php') {
        // Profile visitors (random select)
        filteredProfiles = JodiSodhoData.profiles.slice(4, 7);
    }

    renderProfileGrid(listContainer, filteredProfiles);
}

function renderProfileGrid(container, profilesList) {
    if (profilesList.length === 0) {
        container.innerHTML = `
            <div class="col-12 text-center py-5">
                <i class="bi bi-people text-muted fs-1 mb-3"></i>
                <h5>No Profiles Found</h5>
                <p class="text-muted">Try adjusting your partner preferences or checking back tomorrow.</p>
            </div>
        `;
        return;
    }

    container.innerHTML = profilesList.map(profile => `
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="profile-card">
                <div class="profile-card-img-wrapper">
                    <img src="${profile.photo}" alt="${profile.name}" class="profile-card-img">
                    <div class="profile-card-badges">
                        ${profile.verified ? '<span class="badge-verified"><i class="bi bi-patch-check-fill"></i> Verified</span>' : ''}
                        ${profile.premium ? '<span class="badge-premium"><i class="bi bi-gem"></i> Premium</span>' : ''}
                    </div>
                    <div class="profile-card-overlay">
                        <h5 class="mb-0 text-white">${profile.name}</h5>
                        <p class="small mb-0 text-white-50"><i class="bi bi-geo-alt-fill me-1"></i>${profile.location}</p>
                    </div>
                </div>
                <div class="profile-card-details">
                    <div class="row g-2 mb-3 font-monospace small" style="font-size:0.8rem;">
                        <div class="col-6"><i class="bi bi-calendar-event me-1"></i>${profile.age} Yrs, ${profile.height}</div>
                        <div class="col-6"><i class="bi bi-book me-1"></i>${profile.motherTongue}</div>
                        <div class="col-6"><i class="bi bi-bank me-1"></i>${profile.religion} (${profile.caste})</div>
                        <div class="col-6"><i class="bi bi-briefcase me-1"></i>${profile.occupation}</div>
                    </div>
                    <p class="text-muted text-truncate-2 small mb-0" style="height: 40px; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                        "${profile.about}"
                    </p>
                </div>
                <div class="profile-card-actions">
                    <button class="profile-card-action-btn action-interest" data-id="${profile.id}" title="Send Interest">
                        <i class="bi bi-heart me-1"></i>Connect
                    </button>
                    <button class="profile-card-action-btn action-shortlist" data-id="${profile.id}" title="Shortlist">
                        <i class="bi bi-star me-1"></i>Shortlist
                    </button>
                    <a href="member-profile.php?id=${profile.id}" class="profile-card-action-btn text-center d-flex align-items-center justify-content-center" title="View Profile">
                        <i class="bi bi-eye me-1"></i>Profile
                    </a>
                </div>
            </div>
        </div>
    `).join('');
}

/* Public Success Stories rendering */
function initSuccessStories() {
    const listContainer = document.getElementById("stories-list-container");
    if (!listContainer) return;
    
    listContainer.innerHTML = JodiSodhoData.stories.map(story => `
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card-premium h-100 d-flex flex-column">
                <img src="${story.image}" alt="${story.names}" class="card-img-top" style="height: 200px; object-fit: cover;">
                <div class="p-4 flex-grow-1 d-flex flex-column">
                    <div class="text-muted small mb-2"><i class="bi bi-calendar3 me-1"></i>${story.date}</div>
                    <h5 class="card-title text-secondary mb-2">${story.names}</h5>
                    <h6 class="card-subtitle text-dark fw-bold mb-3">${story.title}</h6>
                    <p class="text-muted small flex-grow-1">${story.excerpt}</p>
                    <a href="story-single.php?id=${story.id}" class="btn btn-outline-primary btn-sm mt-3 w-100" style="border-radius: 20px;">Read Full Story</a>
                </div>
            </div>
        </div>
    `).join('');
}

/* Public Blogs rendering */
function initBlogsList() {
    const listContainer = document.getElementById("blogs-list-container");
    if (!listContainer) return;

    listContainer.innerHTML = JodiSodhoData.blogs.map(blog => `
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card-premium h-100 d-flex flex-column">
                <img src="${blog.image}" alt="${blog.title}" class="card-img-top" style="height: 200px; object-fit: cover;">
                <div class="p-4 flex-grow-1 d-flex flex-column">
                    <div class="d-flex justify-content-between text-muted small mb-2">
                        <span><i class="bi bi-tag-fill text-primary me-1"></i>${blog.category}</span>
                        <span><i class="bi bi-calendar3 me-1"></i>${blog.date}</span>
                    </div>
                    <h5 class="card-title fw-bold text-dark mb-3">${blog.title}</h5>
                    <p class="text-muted small flex-grow-1">${blog.excerpt}</p>
                    <a href="blog-single.php?id=${blog.id}" class="btn btn-outline-primary btn-sm mt-3 w-100" style="border-radius: 20px;">Read Article</a>
                </div>
            </div>
        </div>
    `).join('');
}

/* Interactive Messages/Chat Inbox Engine */
let activeConversation = null;
function initChatInbox() {
    const chatListContainer = document.getElementById("chat-users-list-container");
    if (!chatListContainer) return;

    // Load initial list
    renderChatUsersList(chatListContainer);
    
    // Select first conversation by default
    selectConversation(JodiSodhoData.messages[0].userId);

    // Setup input message submit
    const chatForm = document.getElementById("chat-send-form");
    if (chatForm) {
        chatForm.addEventListener("submit", function(e) {
            e.preventDefault();
            const inputField = document.getElementById("chat-message-input");
            const messageText = inputField.value.trim();
            if (!messageText) return;

            // Push to current conversation
            const activeMsg = JodiSodhoData.messages.find(m => m.userId == activeConversation);
            if (activeMsg) {
                const now = new Date();
                const timeStr = now.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
                activeMsg.conversation.push({
                    sender: "sent",
                    text: messageText,
                    time: timeStr
                });
                
                inputField.value = '';
                renderChatArea();
                
                // Trigger simulated reply from partner after 1.5 seconds
                setTimeout(() => {
                    activeMsg.conversation.push({
                        sender: "received",
                        text: `Thank you for your message! This is a mock interactive reply. Let's arrange a time to speak on the phone soon!`,
                        time: new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' })
                    });
                    renderChatArea();
                }, 1500);
            }
        });
    }
}

function renderChatUsersList(container) {
    container.innerHTML = JodiSodhoData.messages.map(chat => `
        <div class="chat-user-item ${activeConversation == chat.userId ? 'active' : ''}" onclick="selectConversation(${chat.userId})">
            <img src="${chat.avatar}" alt="${chat.name}" class="chat-user-avatar border border-2 border-white shadow-sm">
            <div class="flex-grow-1 overflow-hidden">
                <div class="d-flex justify-content-between align-items-center mb-1">
                    <h6 class="mb-0 text-truncate" style="font-size:0.95rem; font-weight:600;">${chat.name}</h6>
                    <span class="text-muted small font-monospace" style="font-size:0.75rem;">${chat.time}</span>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <p class="mb-0 text-muted text-truncate small" style="font-size:0.8rem;">
                        ${chat.conversation[chat.conversation.length - 1].text}
                    </p>
                    ${chat.unread > 0 ? `<span class="badge bg-primary rounded-circle px-2 py-1" style="font-size:0.7rem;">${chat.unread}</span>` : ''}
                </div>
            </div>
        </div>
    `).join('');
}

function selectConversation(userId) {
    activeConversation = userId;
    
    // Clear unread count
    const chatObj = JodiSodhoData.messages.find(m => m.userId == userId);
    if (chatObj) chatObj.unread = 0;
    
    // Re-render chat list to update selections
    const chatListContainer = document.getElementById("chat-users-list-container");
    if (chatListContainer) renderChatUsersList(chatListContainer);
    
    renderChatArea();
}

function renderChatArea() {
    const activeHeader = document.getElementById("chat-active-header");
    const messagesBox = document.getElementById("chat-messages-box");
    if (!activeHeader || !messagesBox) return;

    const currentChat = JodiSodhoData.messages.find(m => m.userId == activeConversation);
    if (!currentChat) return;

    // Header Detail
    activeHeader.innerHTML = `
        <div class="d-flex align-items-center gap-3">
            <img src="${currentChat.avatar}" alt="${currentChat.name}" class="rounded-circle border border-2 border-white shadow-sm" style="width: 44px; height: 44px; object-fit: cover;">
            <div>
                <h6 class="mb-0 fw-bold" style="font-size:1.05rem;">${currentChat.name}</h6>
                <span class="text-success small d-flex align-items-center gap-1"><span class="bg-success rounded-circle" style="width:8px; height:8px; display:inline-block;"></span>Online</span>
            </div>
        </div>
        <div class="d-flex gap-2">
            <button class="btn btn-outline-secondary btn-sm rounded-circle p-2" onclick="alert('Mock Calling: Initiating secure audio connection...')"><i class="bi bi-telephone-fill"></i></button>
            <button class="btn btn-outline-secondary btn-sm rounded-circle p-2" onclick="alert('Mock Video: Initiating verified video call...')"><i class="bi bi-camera-video-fill"></i></button>
            <button class="btn btn-outline-danger btn-sm rounded-circle p-2" onclick="alert('User reported. Our support team will investigate.')"><i class="bi bi-exclamation-triangle-fill"></i></button>
        </div>
    `;

    // Messages Box Bubbles
    messagesBox.innerHTML = currentChat.conversation.map(bubble => `
        <div class="chat-message-bubble ${bubble.sender === 'sent' ? 'chat-message-sent' : 'chat-message-received'} shadow-sm">
            <div class="message-text" style="font-size:0.9rem;">${bubble.text}</div>
            <div class="text-end small opacity-75 mt-1" style="font-size: 0.7rem;">${bubble.time}</div>
        </div>
    `).join('');

    // Scroll to bottom
    messagesBox.scrollTop = messagesBox.scrollHeight;
}

/* Multi-step Registration Wizard */
let currentWizardStep = 1;
function initRegistrationWizard() {
    const wizardForm = document.getElementById("registration-wizard-form");
    if (!wizardForm) return;

    const nextBtn = document.getElementById("wizard-next-btn");
    const prevBtn = document.getElementById("wizard-prev-btn");

    if (nextBtn) {
        nextBtn.addEventListener("click", function() {
            if (currentWizardStep === 1) {
                // Navigate to step 2 file
                window.location.href = "register-step2.php";
            } else if (currentWizardStep === 2) {
                // Navigate to step 3 file
                window.location.href = "register-step3.php";
            } else if (currentWizardStep === 3) {
                alert("Account created successfully! Redirecting to your personal partner recommendation dashboard...");
                window.location.href = "user-dashboard.php";
            }
        });
    }

    if (prevBtn) {
        prevBtn.addEventListener("click", function() {
            if (currentWizardStep === 3) {
                window.location.href = "register-step2.php";
            } else if (currentWizardStep === 2) {
                window.location.href = "register.php";
            }
        });
    }

    // Determine current step based on page filename
    const path = window.location.pathname;
    const page = path.substring(path.lastIndexOf('/') + 1);
    
    if (page === 'register.php') {
        currentWizardStep = 1;
    } else if (page === 'register-step2.php') {
        currentWizardStep = 2;
    } else if (page === 'register-step3.php') {
        currentWizardStep = 3;
    }
}

/* Quick Actions (Stars, Likes, Interests) */
function initQuickActions() {
    document.addEventListener("click", function(e) {
        // Express Interest Action
        if (e.target.classList.contains("action-interest") || e.target.closest(".action-interest")) {
            const btn = e.target.classList.contains("action-interest") ? e.target : e.target.closest(".action-interest");
            const profileId = btn.getAttribute("data-id");
            const profile = getProfileById(profileId);
            const name = profile ? profile.name : "Match";
            
            // Check if already active
            if (btn.classList.contains("interest-sent")) {
                alert(`Interest already sent to ${name}. We will notify you when they accept.`);
                return;
            }

            btn.classList.add("interest-sent");
            btn.innerHTML = `<i class="bi bi-heart-fill me-1"></i>Sent`;
            btn.style.color = "var(--primary)";
            btn.style.backgroundColor = "var(--primary-light)";

            // Show Toast Alert (Simulated)
            alert(`Interest Sent! We have notified ${name}. They can now accept your connection request.`);
        }

        // Shortlist Action
        if (e.target.classList.contains("action-shortlist") || e.target.closest(".action-shortlist")) {
            const btn = e.target.classList.contains("action-shortlist") ? e.target : e.target.closest(".action-shortlist");
            
            if (btn.classList.contains("shortlisted")) {
                btn.classList.remove("shortlisted");
                btn.innerHTML = `<i class="bi bi-star me-1"></i>Shortlist`;
                btn.style.color = "";
                btn.style.backgroundColor = "";
                alert("Removed from shortlisted matches.");
            } else {
                btn.classList.add("shortlisted");
                btn.innerHTML = `<i class="bi bi-star-fill me-1"></i>Shortlisted`;
                btn.style.color = "var(--accent)";
                btn.style.backgroundColor = "var(--accent-light)";
                alert("Match successfully added to your shortlisted list!");
            }
        }
    });
}

/* Admin Verification Queue Actions */
function initAdminVerificationQueue() {
    const verifyQueueContainer = document.getElementById("admin-verify-queue-container");
    if (!verifyQueueContainer) return;

    renderVerificationQueue(verifyQueueContainer);
}

function renderVerificationQueue(container) {
    if (JodiSodhoData.adminVerifications.length === 0) {
        container.innerHTML = `
            <tr>
                <td colspan="6" class="text-center py-4 text-muted">Verification queue is empty. Good job!</td>
            </tr>
        `;
        return;
    }

    container.innerHTML = JodiSodhoData.adminVerifications.map(item => `
        <tr id="verify-row-${item.id}">
            <td><strong class="text-dark">${item.name}</strong></td>
            <td><span class="badge bg-info text-dark">${item.docType}</span></td>
            <td><code>${item.docNumber}</code></td>
            <td>
                <a href="${item.docImage}" target="_blank" class="btn btn-sm btn-outline-secondary py-1" style="font-size:0.8rem;"><i class="bi bi-image me-1"></i>View Document</a>
            </td>
            <td><span class="text-muted small">${item.date}</span></td>
            <td>
                <div class="d-flex gap-2">
                    <button class="btn btn-sm btn-success py-1 px-3 rounded-pill" onclick="approveDocument(${item.id})"><i class="bi bi-check2 me-1"></i>Approve</button>
                    <button class="btn btn-sm btn-danger py-1 px-3 rounded-pill" onclick="rejectDocument(${item.id})"><i class="bi bi-x2 me-1"></i>Reject</button>
                </div>
            </td>
        </tr>
    `).join('');
}

// Global functions for inline actions (simpler than bindings for static mockup)
window.approveDocument = function(id) {
    alert(`Identity Document APPROVED. User profile will receive the 'Verified Identity' checkmark badge.`);
    const row = document.getElementById(`verify-row-${id}`);
    if (row) {
        row.remove();
        JodiSodhoData.adminVerifications = JodiSodhoData.adminVerifications.filter(v => v.id != id);
        if (JodiSodhoData.adminVerifications.length === 0) {
            document.getElementById("admin-verify-queue-container").innerHTML = `
                <tr>
                    <td colspan="6" class="text-center py-4 text-muted">Verification queue is empty. Good job!</td>
                </tr>
            `;
        }
    }
};

window.rejectDocument = function(id) {
    const reason = prompt("Enter rejection reason to notify the user:", "Uploaded image is blurred. Please scan clearly.");
    if (reason !== null) {
        alert(`Document Rejected. Notification sent to user with reason: "${reason}"`);
        const row = document.getElementById(`verify-row-${id}`);
        if (row) {
            row.remove();
            JodiSodhoData.adminVerifications = JodiSodhoData.adminVerifications.filter(v => v.id != id);
            if (JodiSodhoData.adminVerifications.length === 0) {
                document.getElementById("admin-verify-queue-container").innerHTML = `
                    <tr>
                        <td colspan="6" class="text-center py-4 text-muted">Verification queue is empty. Good job!</td>
                    </tr>
                `;
            }
        }
    }
};

window.adminActionUser = function(action, name) {
    if (action === 'suspend') {
        const confirmAction = confirm(`Are you sure you want to SUSPEND the account of ${name}?`);
        if (confirmAction) alert(`Account of ${name} has been suspended.`);
    } else if (action === 'delete') {
        const confirmAction = confirm(`CRITICAL: Are you sure you want to PERMANENTLY DELETE the account of ${name}?`);
        if (confirmAction) alert(`Account of ${name} has been deleted from system databases.`);
    } else if (action === 'verify') {
        alert(`Profile photo and records for ${name} marked as manually verified.`);
    }
};
