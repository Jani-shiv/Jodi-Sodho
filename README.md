# 💖 Jodi Sodho – Find Your Perfect Life Partner

Jodi Sodho is a premium, modern Indian matrimonial platform designed with a high-end, visual-first front-end. The platform features two fully isolated, self-contained sections: the consumer-facing **Matrimonial Website** and the **Super Admin Management Portal**. 

The entire platform is built with **Core PHP**, **Vanilla CSS (Custom Neobrutalist Glassmorphism Theme)**, and **Vanilla JavaScript**, delivering an elegant, fast, and responsive mobile-first experience.

---

## 🎨 Design Language: Neobrutalist Glassmorphism

Jodi Sodho utilizes a custom-engineered visual design system that fuses high-contrast Neobrutalist components with soft, elegant Glassmorphic backdrops:

*   **Outlines & Borders:** Thick, solid structural outlines (`border: 3px solid #1f1a24;`) around panels, sidebar columns, inputs, and cards.
*   **Solid Shadows:** Flat, unblurry offset drop shadows (`box-shadow: 6px 6px 0px #1f1a24;`) replacing standard CSS soft blurs.
*   **Tactile Transforms:** Action buttons and cards shift down-right on hover/click (`transform: translate(3px, 3px)`), while reducing the shadow offset to create a mechanical keypress feedback.
*   **Glassmorphic Backdrops:** Translucent blurred backdrops (`background: rgba(255, 255, 255, 0.75); backdrop-filter: blur(12px)`) that let pastel pink backing gradients glow through.
*   **Poppins Typography:** Strict sans-serif font weights with high-contrast header outlines.

---

## 📂 Project Architecture & Namespaces

The project is segregated into two clean, self-contained directories:

```text
i:/jivansathi/
├── admin/                     # Administrative Control Center
│   ├── assets/                # Local Styles, Scripts, and JSON Data
│   │   ├── css/style.css      # Neobrutalist CSS Tokens
│   │   └── js/main.js         # Admin Verification & Table Interactions
│   ├── includes/              # Server-Side Layout Inclusions
│   │   ├── header.php, footer.php
│   │   └── admin-sidebar.php  # Sidebar Navigation Toggles
│   └── [admin-*.php pages]    # Verification Queues, Analytics, Tickets...
│
└── website/                   # Consumer Matrimonial Portal
    ├── assets/                # Local Styles, Scripts, and JSON Data
    │   ├── css/style.css      # Matrimonial Site CSS
    │   └── js/main.js         # Wizard Redirection & Live Chat Inbox
    ├── includes/              # Server-Side Layout Inclusions
    │   ├── header.php, footer.php
    │   └── user-sidebar.php   # User Dashboard Sidebar
    └── [All public & user pages] # Homepage, Onboarding, Chat, Matches...
```

---

## ✨ Key Features & Interactive Flows

### 1. Consumer Website (`website/`)
*   **Multi-Step Onboarding Wizard (`register.php`):** A 3-step registration wizard collecting basic info, astro/career details, and photo uploads, which redirects to the main recommendations dashboard.
*   **Matchmaking Search Filters (`search.php`, `search-results.php`):** Advanced matching filters sorting profiles by religion, caste, annual income, horoscopes, and location.
*   **Dynamic Match Categories (`matches-*.php`):** Isolated views for handpicked **Daily Matches**, **Mutual Matches**, **Shortlisted Members**, and recent **Profile Visitors**.
*   **Interactive Live Chat Inbox (`messages.php`):** A custom messaging workspace where you can click on active contacts, send details, and receive automated, simulated chat replies after a 1.5-second wait.
*   **Payment & Subscription Invoicing (`subscription-*.php`, `payment-history.php`):** Secure mock checkout screens (Card, UPI QR, Net Banking) and downloadable transaction logs.

### 2. Admin Portal (`admin/`)
*   **Super Admin Control Dashboard (`admin-dashboard.php`):** Performance metric summaries tracking total users, verification backlogs, revenue growth, and live support tickets.
*   **Document Verification Queue (`admin-user-verify.php`):** Review identity documents (Passport/Aadhaar) and instantly approve (attaching the 'Verified Identity' checkmark badge to user profiles) or reject with notification feedback.
*   **User Management Data-Table (`admin-users.php`):** Sort, suspend, verify, or permanently delete member accounts.
*   **CMS Blog & Success Stories Managers (`admin-blog.php`, `admin-stories.php`):** CRUD editors to post dating guides and matrimonial success announcements.

---

## 🚀 Setup & Local Deployment

Since the website is constructed with server-side layout inclusions, it requires a PHP parser running locally:

### 1. Start the PHP Server
Navigate to the root directory `jivansathi/` in your terminal and run PHP's built-in web server:
```bash
php -S localhost:8000
```

### 2. Open in your Browser
Once the server is running, access the portals using the following local links:
*   **Main Website:** [http://localhost:8000/website/index.php](http://localhost:8000/website/index.php)
*   **Admin Dashboard:** [http://localhost:8000/admin/admin-dashboard.php](http://localhost:8000/admin/admin-dashboard.php)

---

## 🛠️ Stack & Dependencies
*   **Core:** PHP 7.4+
*   **Styles:** Bootstrap v5.3.0 (CSS) & Vanilla Custom CSS Rules
*   **Icons:** Bootstrap Icons (CDN)
*   **Fonts:** Poppins (Google Fonts CDN)
*   **Logic:** Vanilla ES6 Javascript
