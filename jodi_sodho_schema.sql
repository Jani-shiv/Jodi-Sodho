-- =====================================================
-- Jodi Sodho Matrimonial Platform Database Schema
-- DBMS: MySQL 8.0+
-- Storage Engine: InnoDB
-- Charset: utf8mb4 / Collation: utf8mb4_unicode_ci
-- =====================================================

DROP DATABASE IF EXISTS jodi_sodho;
CREATE DATABASE jodi_sodho;
USE jodi_sodho;

SET FOREIGN_KEY_CHECKS = 0;

-- =====================================================
-- MODULE 8: GEOSPATIAL DICTIONARIES
-- =====================================================

CREATE TABLE IF NOT EXISTS countries (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    iso2 CHAR(2) NOT NULL UNIQUE,
    phone_code VARCHAR(10) NOT NULL,
    status VARCHAR(30) DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL DEFAULT NULL,
    INDEX idx_countries_status (status)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS states (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    country_id INT UNSIGNED NOT NULL,
    name VARCHAR(100) NOT NULL,
    status VARCHAR(30) DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL DEFAULT NULL,
    INDEX idx_states_status (status),
    CONSTRAINT fk_states_country FOREIGN KEY (country_id) REFERENCES countries (id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS cities (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    state_id INT UNSIGNED NOT NULL,
    name VARCHAR(100) NOT NULL,
    status VARCHAR(30) DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL DEFAULT NULL,
    INDEX idx_cities_status (status),
    CONSTRAINT fk_cities_state FOREIGN KEY (state_id) REFERENCES states (id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- =====================================================
-- MODULE 1: AUTHENTICATION
-- =====================================================

CREATE TABLE IF NOT EXISTS users (
    id BINARY(16) PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    password_hash VARCHAR(255) NOT NULL,
    is_verified_email BOOLEAN DEFAULT FALSE,
    is_verified_phone BOOLEAN DEFAULT FALSE,
    is_2fa_enabled BOOLEAN DEFAULT FALSE,
    totp_secret VARCHAR(100) NULL DEFAULT NULL,
    status VARCHAR(30) DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL DEFAULT NULL,
    UNIQUE KEY uq_users_email (email, deleted_at),
    UNIQUE KEY uq_users_phone (phone, deleted_at),
    INDEX idx_users_status (status),
    INDEX idx_users_created (created_at)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS failed_logins (
    id BINARY(16) PRIMARY KEY,
    ip_address VARCHAR(45) NOT NULL,
    email_attempted VARCHAR(255) NOT NULL,
    attempt_count INT UNSIGNED DEFAULT 1,
    locked_until TIMESTAMP NULL DEFAULT NULL,
    status VARCHAR(30) DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL DEFAULT NULL,
    INDEX idx_failed_logins_ip (ip_address),
    INDEX idx_failed_logins_email (email_attempted)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS login_history (
    id BINARY(16) PRIMARY KEY,
    user_id BINARY(16) NOT NULL,
    ip_address VARCHAR(45) NOT NULL,
    device_details VARCHAR(255) NOT NULL,
    browser VARCHAR(100) NOT NULL,
    login_status VARCHAR(30) NOT NULL,
    failure_reason VARCHAR(255) NULL DEFAULT NULL,
    status VARCHAR(30) DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL DEFAULT NULL,
    INDEX idx_login_history_user (user_id),
    INDEX idx_login_history_created (created_at),
    CONSTRAINT fk_login_history_user FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS user_sessions (
    id BINARY(16) PRIMARY KEY,
    user_id BINARY(16) NOT NULL,
    jwt_token TEXT NOT NULL,
    ip_address VARCHAR(45) NOT NULL,
    user_agent VARCHAR(255) NOT NULL,
    expires_at TIMESTAMP NOT NULL,
    status VARCHAR(30) DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL DEFAULT NULL,
    INDEX idx_user_sessions_user (user_id),
    CONSTRAINT fk_user_sessions_user FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS remember_tokens (
    id BINARY(16) PRIMARY KEY,
    user_id BINARY(16) NOT NULL,
    token_hash VARCHAR(64) NOT NULL UNIQUE,
    ip_address VARCHAR(45) NOT NULL,
    expires_at TIMESTAMP NOT NULL,
    status VARCHAR(30) DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL DEFAULT NULL,
    INDEX idx_remember_tokens_user (user_id),
    CONSTRAINT fk_remember_tokens_user FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS otp_verifications (
    id BINARY(16) PRIMARY KEY,
    user_id BINARY(16) NOT NULL,
    type VARCHAR(20) NOT NULL, -- 'email' or 'phone'
    code VARCHAR(6) NOT NULL,
    expires_at TIMESTAMP NOT NULL,
    status VARCHAR(30) DEFAULT 'pending', -- 'pending', 'verified', 'expired'
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL DEFAULT NULL,
    INDEX idx_otp_verifications_user (user_id),
    CONSTRAINT fk_otp_verifications_user FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS password_resets (
    id BINARY(16) PRIMARY KEY,
    user_id BINARY(16) NOT NULL,
    token VARCHAR(100) NOT NULL UNIQUE,
    expires_at TIMESTAMP NOT NULL,
    status VARCHAR(30) DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL DEFAULT NULL,
    INDEX idx_password_resets_user (user_id),
    CONSTRAINT fk_password_resets_user FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- =====================================================
-- MODULE 2: USER PROFILE MANAGEMENT
-- =====================================================

CREATE TABLE IF NOT EXISTS user_profiles (
    id BINARY(16) PRIMARY KEY,
    user_id BINARY(16) NOT NULL,
    gender VARCHAR(20) NOT NULL,
    date_of_birth DATE NOT NULL,
    height_cm DECIMAL(5,2) NOT NULL,
    weight_kg DECIMAL(5,2) NOT NULL,
    mother_tongue VARCHAR(50) NOT NULL,
    marital_status VARCHAR(30) NOT NULL,
    children_count INT UNSIGNED DEFAULT 0,
    about_me TEXT NULL,
    verified_status BOOLEAN DEFAULT FALSE,
    premium_status BOOLEAN DEFAULT FALSE,
    status VARCHAR(30) DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL DEFAULT NULL,
    UNIQUE KEY uq_user_profiles_user (user_id, deleted_at),
    INDEX idx_user_profiles_gender (gender),
    INDEX idx_user_profiles_verified (verified_status),
    INDEX idx_user_profiles_premium (premium_status),
    INDEX idx_user_profiles_status (status),
    CONSTRAINT fk_user_profiles_user FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS user_educations (
    id BINARY(16) PRIMARY KEY,
    user_id BINARY(16) NOT NULL,
    education_level VARCHAR(100) NOT NULL, -- e.g. B.Tech, MBA
    degree_name VARCHAR(150) NOT NULL,
    college_name VARCHAR(255) NULL,
    status VARCHAR(30) DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL DEFAULT NULL,
    INDEX idx_user_educations_user (user_id),
    INDEX idx_user_educations_level (education_level),
    CONSTRAINT fk_user_educations_user FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS user_occupations (
    id BINARY(16) PRIMARY KEY,
    user_id BINARY(16) NOT NULL,
    occupation_name VARCHAR(100) NOT NULL, -- e.g. Software Engineer, Doctor
    sector VARCHAR(100) NOT NULL, -- e.g. Private, Public, Business
    annual_income DECIMAL(15,2) NOT NULL,
    status VARCHAR(30) DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL DEFAULT NULL,
    INDEX idx_user_occupations_user (user_id),
    INDEX idx_user_occupations_name (occupation_name),
    CONSTRAINT fk_user_occupations_user FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS user_lifestyles (
    id BINARY(16) PRIMARY KEY,
    user_id BINARY(16) NOT NULL,
    food_habit VARCHAR(50) NOT NULL, -- e.g. Vegetarian, Non-Vegetarian, Eggetarian
    smoking_habit VARCHAR(50) NOT NULL, -- e.g. Non-Smoker, Occasional, Regular
    drinking_habit VARCHAR(50) NOT NULL, -- e.g. Non-Drinker, Social Drinker, Regular
    hobbies TEXT NULL,
    status VARCHAR(30) DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL DEFAULT NULL,
    INDEX idx_user_lifestyles_user (user_id),
    CONSTRAINT fk_user_lifestyles_user FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS user_families (
    id BINARY(16) PRIMARY KEY,
    user_id BINARY(16) NOT NULL,
    family_values VARCHAR(50) NOT NULL, -- e.g. Liberal, Moderate, Traditional
    father_occupation VARCHAR(100) NULL,
    mother_occupation VARCHAR(100) NULL,
    annual_family_income DECIMAL(15,2) NULL,
    siblings_count INT UNSIGNED DEFAULT 0,
    status VARCHAR(30) DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL DEFAULT NULL,
    INDEX idx_user_families_user (user_id),
    CONSTRAINT fk_user_families_user FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS user_religions (
    id BINARY(16) PRIMARY KEY,
    user_id BINARY(16) NOT NULL,
    religion_name VARCHAR(100) NOT NULL,
    caste_name VARCHAR(100) NOT NULL,
    sub_caste_name VARCHAR(100) NULL DEFAULT NULL,
    gotra VARCHAR(100) NULL DEFAULT NULL,
    manglik_status VARCHAR(30) DEFAULT 'unknown', -- e.g. Manglik, Non-Manglik, Anshik, Unknown
    status VARCHAR(30) DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL DEFAULT NULL,
    INDEX idx_user_religions_user (user_id),
    CONSTRAINT fk_user_religions_user FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS user_locations (
    id BINARY(16) PRIMARY KEY,
    user_id BINARY(16) NOT NULL,
    country_id INT UNSIGNED NOT NULL,
    state_id INT UNSIGNED NOT NULL,
    city_id INT UNSIGNED NOT NULL,
    citizenship VARCHAR(100) NOT NULL,
    status VARCHAR(30) DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL DEFAULT NULL,
    INDEX idx_user_locations_user (user_id),
    CONSTRAINT fk_user_locations_user FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT fk_user_locations_country FOREIGN KEY (country_id) REFERENCES countries (id) ON DELETE RESTRICT ON UPDATE CASCADE,
    CONSTRAINT fk_user_locations_state FOREIGN KEY (state_id) REFERENCES states (id) ON DELETE RESTRICT ON UPDATE CASCADE,
    CONSTRAINT fk_user_locations_city FOREIGN KEY (city_id) REFERENCES cities (id) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS profile_photos (
    id BINARY(16) PRIMARY KEY,
    user_id BINARY(16) NOT NULL,
    photo_url VARCHAR(255) NOT NULL,
    is_primary BOOLEAN DEFAULT FALSE,
    is_approved BOOLEAN DEFAULT FALSE,
    status VARCHAR(30) DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL DEFAULT NULL,
    INDEX idx_profile_photos_user (user_id),
    CONSTRAINT fk_profile_photos_user FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS profile_galleries (
    id BINARY(16) PRIMARY KEY,
    user_id BINARY(16) NOT NULL,
    photo_url VARCHAR(255) NOT NULL,
    description VARCHAR(255) NULL,
    is_approved BOOLEAN DEFAULT FALSE,
    status VARCHAR(30) DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL DEFAULT NULL,
    INDEX idx_profile_galleries_user (user_id),
    CONSTRAINT fk_profile_galleries_user FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS verification_documents (
    id BINARY(16) PRIMARY KEY,
    user_id BINARY(16) NOT NULL,
    document_type VARCHAR(50) NOT NULL, -- e.g. Aadhaar, Passport, driving_license
    document_number VARCHAR(100) NOT NULL,
    file_url VARCHAR(255) NOT NULL,
    is_approved BOOLEAN DEFAULT FALSE,
    status VARCHAR(30) DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL DEFAULT NULL,
    INDEX idx_verification_documents_user (user_id),
    CONSTRAINT fk_verification_documents_user FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- =====================================================
-- MODULE 3: PREFERENCES & MATCHING ENGINE
-- =====================================================

CREATE TABLE IF NOT EXISTS partner_preferences (
    id BINARY(16) PRIMARY KEY,
    user_id BINARY(16) NOT NULL,
    min_age INT UNSIGNED NOT NULL DEFAULT 18,
    max_age INT UNSIGNED NOT NULL DEFAULT 60,
    min_height_cm DECIMAL(5,2) NOT NULL DEFAULT 120.00,
    max_height_cm DECIMAL(5,2) NOT NULL DEFAULT 220.00,
    marital_status VARCHAR(255) NULL, -- comma separated list
    religion VARCHAR(255) NULL,       -- comma separated list
    caste VARCHAR(255) NULL,          -- comma separated list
    education VARCHAR(255) NULL,      -- comma separated list
    occupation VARCHAR(255) NULL,     -- comma separated list
    min_annual_income DECIMAL(15,2) NOT NULL DEFAULT 0.00,
    country_id INT UNSIGNED NULL,
    state_id INT UNSIGNED NULL,
    city_id INT UNSIGNED NULL,
    status VARCHAR(30) DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL DEFAULT NULL,
    UNIQUE KEY uq_partner_preferences_user (user_id, deleted_at),
    CONSTRAINT fk_partner_preferences_user FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT fk_partner_preferences_country FOREIGN KEY (country_id) REFERENCES countries (id) ON DELETE SET NULL ON UPDATE CASCADE,
    CONSTRAINT fk_partner_preferences_state FOREIGN KEY (state_id) REFERENCES states (id) ON DELETE SET NULL ON UPDATE CASCADE,
    CONSTRAINT fk_partner_preferences_city FOREIGN KEY (city_id) REFERENCES cities (id) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS match_scores (
    id BINARY(16) PRIMARY KEY,
    user_id BINARY(16) NOT NULL,
    target_user_id BINARY(16) NOT NULL,
    score DECIMAL(5,2) NOT NULL, -- overall matching score percentage
    compatibility_details JSON NOT NULL, -- breaks down: religion match, lifestyle match, location match, etc.
    status VARCHAR(30) DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL DEFAULT NULL,
    INDEX idx_match_scores_user (user_id),
    INDEX idx_match_scores_target (target_user_id),
    CONSTRAINT fk_match_scores_user FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT fk_match_scores_target FOREIGN KEY (target_user_id) REFERENCES users (id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS horoscope_matches (
    id BINARY(16) PRIMARY KEY,
    user_id BINARY(16) NOT NULL,
    target_user_id BINARY(16) NOT NULL,
    score DECIMAL(5,2) NOT NULL, -- points out of 36 (e.g. Ashtakoota score)
    matching_points VARCHAR(50) NOT NULL, -- e.g. "28/36"
    compatibility_details JSON NOT NULL, -- details on Guna match
    status VARCHAR(30) DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL DEFAULT NULL,
    INDEX idx_horoscope_user (user_id),
    CONSTRAINT fk_horoscope_user FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT fk_horoscope_target FOREIGN KEY (target_user_id) REFERENCES users (id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- =====================================================
-- MODULE 4: COMMUNICATIONS & INTERACTIONS
-- =====================================================

CREATE TABLE IF NOT EXISTS shortlists (
    id BINARY(16) PRIMARY KEY,
    user_id BINARY(16) NOT NULL,
    shortlisted_user_id BINARY(16) NOT NULL,
    status VARCHAR(30) DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL DEFAULT NULL,
    UNIQUE KEY uq_shortlists (user_id, shortlisted_user_id, deleted_at),
    CONSTRAINT fk_shortlists_user FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT fk_shortlists_target FOREIGN KEY (shortlisted_user_id) REFERENCES users (id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS favorite_profiles (
    id BINARY(16) PRIMARY KEY,
    user_id BINARY(16) NOT NULL,
    favorite_user_id BINARY(16) NOT NULL,
    status VARCHAR(30) DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL DEFAULT NULL,
    UNIQUE KEY uq_favorite_profiles (user_id, favorite_user_id, deleted_at),
    CONSTRAINT fk_favorites_user FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT fk_favorites_target FOREIGN KEY (favorite_user_id) REFERENCES users (id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS profile_visitors (
    id BINARY(16) PRIMARY KEY,
    user_id BINARY(16) NOT NULL,
    visitor_user_id BINARY(16) NOT NULL,
    visit_count INT UNSIGNED DEFAULT 1,
    last_visited_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    status VARCHAR(30) DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL DEFAULT NULL,
    INDEX idx_visitors_user (user_id),
    CONSTRAINT fk_visitors_user FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT fk_visitors_target FOREIGN KEY (visitor_user_id) REFERENCES users (id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS blocked_users (
    id BINARY(16) PRIMARY KEY,
    user_id BINARY(16) NOT NULL,
    blocked_user_id BINARY(16) NOT NULL,
    status VARCHAR(30) DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL DEFAULT NULL,
    UNIQUE KEY uq_blocked_users (user_id, blocked_user_id, deleted_at),
    CONSTRAINT fk_blocked_user FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT fk_blocked_target FOREIGN KEY (blocked_user_id) REFERENCES users (id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS reports (
    id BINARY(16) PRIMARY KEY,
    reporter_user_id BINARY(16) NOT NULL,
    reported_user_id BINARY(16) NOT NULL,
    reason_category VARCHAR(50) NOT NULL, -- e.g. Fake Profile, Harassment, Spam, Photo Report
    description TEXT NOT NULL,
    report_type VARCHAR(30) NOT NULL, -- 'profile' or 'message'
    status VARCHAR(30) DEFAULT 'pending', -- 'pending', 'resolved', 'ignored'
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL DEFAULT NULL,
    INDEX idx_reports_status (status),
    CONSTRAINT fk_reports_reporter FOREIGN KEY (reporter_user_id) REFERENCES users (id) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT fk_reports_reported FOREIGN KEY (reported_user_id) REFERENCES users (id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS interest_requests (
    id BINARY(16) PRIMARY KEY,
    sender_id BINARY(16) NOT NULL,
    receiver_id BINARY(16) NOT NULL,
    status VARCHAR(30) DEFAULT 'pending', -- 'pending', 'accepted', 'declined'
    status_updated_at TIMESTAMP NULL DEFAULT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL DEFAULT NULL,
    UNIQUE KEY uq_interest_requests (sender_id, receiver_id, deleted_at),
    INDEX idx_interests_status (status),
    CONSTRAINT fk_interests_sender FOREIGN KEY (sender_id) REFERENCES users (id) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT fk_interests_receiver FOREIGN KEY (receiver_id) REFERENCES users (id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS saved_searches (
    id BINARY(16) PRIMARY KEY,
    user_id BINARY(16) NOT NULL,
    search_name VARCHAR(100) NOT NULL,
    criteria JSON NOT NULL,
    status VARCHAR(30) DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL DEFAULT NULL,
    INDEX idx_saved_searches_user (user_id),
    CONSTRAINT fk_saved_searches_user FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS search_history (
    id BINARY(16) PRIMARY KEY,
    user_id BINARY(16) NOT NULL,
    query_text VARCHAR(255) NULL,
    criteria JSON NOT NULL,
    status VARCHAR(30) DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL DEFAULT NULL,
    INDEX idx_search_history_user (user_id),
    CONSTRAINT fk_search_history_user FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- =====================================================
-- MODULE 5: CHAT & MESSAGING
-- =====================================================

CREATE TABLE IF NOT EXISTS chat_rooms (
    id BINARY(16) PRIMARY KEY,
    status VARCHAR(30) DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS chat_room_users (
    room_id BINARY(16) NOT NULL,
    user_id BINARY(16) NOT NULL,
    is_pinned BOOLEAN DEFAULT FALSE,
    is_archived BOOLEAN DEFAULT FALSE,
    PRIMARY KEY (room_id, user_id),
    CONSTRAINT fk_chat_room_users_room FOREIGN KEY (room_id) REFERENCES chat_rooms (id) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT fk_chat_room_users_user FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS chat_messages (
    id BINARY(16) PRIMARY KEY,
    room_id BINARY(16) NOT NULL,
    sender_id BINARY(16) NOT NULL,
    message_type VARCHAR(30) DEFAULT 'text', -- 'text', 'image', 'video', 'audio', 'pdf', 'gif', 'emoji'
    message_text TEXT NULL,
    attachment_url VARCHAR(255) NULL DEFAULT NULL,
    reply_to_message_id BINARY(16) NULL DEFAULT NULL,
    is_deleted BOOLEAN DEFAULT FALSE,
    status VARCHAR(30) DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL DEFAULT NULL,
    INDEX idx_chat_messages_room (room_id),
    CONSTRAINT fk_chat_messages_room FOREIGN KEY (room_id) REFERENCES chat_rooms (id) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT fk_chat_messages_sender FOREIGN KEY (sender_id) REFERENCES users (id) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT fk_chat_messages_reply FOREIGN KEY (reply_to_message_id) REFERENCES chat_messages (id) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS chat_message_receipts (
    message_id BINARY(16) NOT NULL,
    user_id BINARY(16) NOT NULL,
    status VARCHAR(30) DEFAULT 'delivered', -- 'delivered', 'read'
    receipt_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (message_id, user_id),
    CONSTRAINT fk_receipts_message FOREIGN KEY (message_id) REFERENCES chat_messages (id) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT fk_receipts_user FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- =====================================================
-- MODULE 6: NOTIFICATIONS & QUEUES
-- =====================================================

CREATE TABLE IF NOT EXISTS notifications (
    id BINARY(16) PRIMARY KEY,
    user_id BINARY(16) NOT NULL,
    type VARCHAR(50) NOT NULL, -- e.g. 'interest_received', 'interest_accepted', 'profile_viewed', 'new_match'
    title VARCHAR(150) NOT NULL,
    message TEXT NOT NULL,
    link_url VARCHAR(255) NULL,
    is_read BOOLEAN DEFAULT FALSE,
    status VARCHAR(30) DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL DEFAULT NULL,
    INDEX idx_notifications_user (user_id),
    INDEX idx_notifications_read (is_read),
    CONSTRAINT fk_notifications_user FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS notification_settings (
    id BINARY(16) PRIMARY KEY,
    user_id BINARY(16) NOT NULL,
    push_enabled BOOLEAN DEFAULT TRUE,
    email_enabled BOOLEAN DEFAULT TRUE,
    sms_enabled BOOLEAN DEFAULT TRUE,
    status VARCHAR(30) DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL DEFAULT NULL,
    UNIQUE KEY uq_notification_settings_user (user_id, deleted_at),
    CONSTRAINT fk_notification_settings_user FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS email_queue (
    id BINARY(16) PRIMARY KEY,
    recipient_email VARCHAR(255) NOT NULL,
    subject VARCHAR(150) NOT NULL,
    body_text TEXT NULL,
    body_html TEXT NOT NULL,
    scheduled_at TIMESTAMP NULL DEFAULT NULL,
    sent_at TIMESTAMP NULL DEFAULT NULL,
    retry_count INT UNSIGNED DEFAULT 0,
    status VARCHAR(30) DEFAULT 'pending', -- 'pending', 'sent', 'failed'
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL DEFAULT NULL,
    INDEX idx_email_queue_status (status)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS sms_queue (
    id BINARY(16) PRIMARY KEY,
    recipient_phone VARCHAR(20) NOT NULL,
    message_text TEXT NOT NULL,
    scheduled_at TIMESTAMP NULL DEFAULT NULL,
    sent_at TIMESTAMP NULL DEFAULT NULL,
    retry_count INT UNSIGNED DEFAULT 0,
    status VARCHAR(30) DEFAULT 'pending', -- 'pending', 'sent', 'failed'
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL DEFAULT NULL,
    INDEX idx_sms_queue_status (status)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- =====================================================
-- MODULE 7: BILLING & PAYMENTS
-- =====================================================

CREATE TABLE IF NOT EXISTS membership_plans (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL UNIQUE, -- e.g. Silver, Gold, Platinum, VIP
    price DECIMAL(10,2) NOT NULL,
    duration_months INT UNSIGNED NOT NULL,
    description TEXT NULL,
    status VARCHAR(30) DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL DEFAULT NULL,
    INDEX idx_plans_status (status)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS premium_features (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL UNIQUE,
    code VARCHAR(50) NOT NULL UNIQUE, -- e.g. 'direct_message', 'profile_boost', 'contact_view'
    description TEXT NULL,
    status VARCHAR(30) DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS plan_features (
    plan_id INT UNSIGNED NOT NULL,
    feature_id INT UNSIGNED NOT NULL,
    limit_value INT NOT NULL DEFAULT -1, -- -1 represents unlimited, otherwise specifies dynamic numeric quota limits
    PRIMARY KEY (plan_id, feature_id),
    CONSTRAINT fk_plan_features_plan FOREIGN KEY (plan_id) REFERENCES membership_plans (id) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT fk_plan_features_feature FOREIGN KEY (feature_id) REFERENCES premium_features (id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS user_subscriptions (
    id BINARY(16) PRIMARY KEY,
    user_id BINARY(16) NOT NULL,
    plan_id INT UNSIGNED NOT NULL,
    start_date DATE NOT NULL,
    end_date DATE NOT NULL,
    status VARCHAR(30) DEFAULT 'active', -- 'active', 'expired', 'canceled'
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL DEFAULT NULL,
    INDEX idx_subscriptions_user (user_id),
    CONSTRAINT fk_subscriptions_user FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT fk_subscriptions_plan FOREIGN KEY (plan_id) REFERENCES membership_plans (id) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS coupons (
    id BINARY(16) PRIMARY KEY,
    code VARCHAR(50) NOT NULL UNIQUE,
    discount_type VARCHAR(20) DEFAULT 'percentage', -- 'percentage' or 'flat'
    discount_value DECIMAL(10,2) NOT NULL,
    max_discount_amount DECIMAL(10,2) NULL,
    expires_at TIMESTAMP NOT NULL,
    status VARCHAR(30) DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL DEFAULT NULL,
    INDEX idx_coupons_code (code)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS payments (
    id BINARY(16) PRIMARY KEY,
    user_id BINARY(16) NOT NULL,
    subscription_id BINARY(16) NOT NULL,
    gateway_name VARCHAR(50) NOT NULL, -- e.g. Razorpay, Stripe, PayPal, Manual
    gateway_payment_id VARCHAR(100) NULL,
    amount DECIMAL(10,2) NOT NULL,
    currency VARCHAR(3) DEFAULT 'INR',
    coupon_id BINARY(16) NULL DEFAULT NULL,
    status VARCHAR(30) DEFAULT 'pending', -- 'pending', 'completed', 'failed', 'refunded'
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL DEFAULT NULL,
    INDEX idx_payments_user (user_id),
    CONSTRAINT fk_payments_user FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT fk_payments_sub FOREIGN KEY (subscription_id) REFERENCES user_subscriptions (id) ON DELETE RESTRICT ON UPDATE CASCADE,
    CONSTRAINT fk_payments_coupon FOREIGN KEY (coupon_id) REFERENCES coupons (id) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS transactions (
    id BINARY(16) PRIMARY KEY,
    user_id BINARY(16) NOT NULL,
    payment_id BINARY(16) NOT NULL,
    type VARCHAR(20) NOT NULL, -- 'debit' or 'credit'
    amount DECIMAL(10,2) NOT NULL,
    ledger_balance DECIMAL(10,2) NOT NULL,
    description VARCHAR(255) NOT NULL,
    status VARCHAR(30) DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL DEFAULT NULL,
    INDEX idx_transactions_user (user_id),
    CONSTRAINT fk_transactions_user FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT fk_transactions_payment FOREIGN KEY (payment_id) REFERENCES payments (id) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS invoices (
    id BINARY(16) PRIMARY KEY,
    payment_id BINARY(16) NOT NULL,
    invoice_number VARCHAR(100) NOT NULL UNIQUE,
    subtotal DECIMAL(10,2) NOT NULL,
    cgst DECIMAL(10,2) NOT NULL, -- 9% cgst
    sgst DECIMAL(10,2) NOT NULL, -- 9% sgst
    igst DECIMAL(10,2) NOT NULL DEFAULT 0.00,
    total DECIMAL(10,2) NOT NULL,
    billing_address TEXT NOT NULL,
    status VARCHAR(30) DEFAULT 'paid',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL DEFAULT NULL,
    CONSTRAINT fk_invoices_payment FOREIGN KEY (payment_id) REFERENCES payments (id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS wallets (
    id BINARY(16) PRIMARY KEY,
    user_id BINARY(16) NOT NULL,
    balance DECIMAL(10,2) DEFAULT 0.00,
    status VARCHAR(30) DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL DEFAULT NULL,
    UNIQUE KEY uq_wallets_user (user_id, deleted_at),
    CONSTRAINT fk_wallets_user FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS refunds (
    id BINARY(16) PRIMARY KEY,
    payment_id BINARY(16) NOT NULL,
    gateway_refund_id VARCHAR(100) NULL,
    amount DECIMAL(10,2) NOT NULL,
    reason VARCHAR(255) NOT NULL,
    status VARCHAR(30) DEFAULT 'pending', -- 'pending', 'processed', 'failed'
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL DEFAULT NULL,
    CONSTRAINT fk_refunds_payment FOREIGN KEY (payment_id) REFERENCES payments (id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- =====================================================
-- MODULE 9: SUPPORT & TICKETING HELPDESK
-- =====================================================

CREATE TABLE IF NOT EXISTS support_tickets (
    id BINARY(16) PRIMARY KEY,
    user_id BINARY(16) NOT NULL,
    subject VARCHAR(150) NOT NULL,
    description TEXT NOT NULL,
    category VARCHAR(50) NOT NULL, -- e.g. Billing, Profile Approval, Matches, Technical
    priority VARCHAR(20) DEFAULT 'medium', -- 'low', 'medium', 'high', 'critical'
    status VARCHAR(30) DEFAULT 'open', -- 'open', 'in_progress', 'resolved', 'closed'
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL DEFAULT NULL,
    INDEX idx_tickets_user (user_id),
    INDEX idx_tickets_status (status),
    CONSTRAINT fk_support_tickets_user FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS support_replies (
    id BINARY(16) PRIMARY KEY,
    ticket_id BINARY(16) NOT NULL,
    sender_type VARCHAR(20) NOT NULL, -- 'user' or 'admin'
    sender_id BINARY(16) NOT NULL, -- ID of the user or admin who replied
    reply_text TEXT NOT NULL,
    status VARCHAR(30) DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL DEFAULT NULL,
    INDEX idx_replies_ticket (ticket_id),
    CONSTRAINT fk_support_replies_ticket FOREIGN KEY (ticket_id) REFERENCES support_tickets (id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- =====================================================
-- MODULE 10: CONTENT MANAGEMENT SYSTEM (CMS)
-- =====================================================

CREATE TABLE IF NOT EXISTS blog_categories (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL UNIQUE,
    slug VARCHAR(50) NOT NULL UNIQUE,
    status VARCHAR(30) DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS blogs (
    id BINARY(16) PRIMARY KEY,
    category_id INT UNSIGNED NOT NULL,
    title VARCHAR(150) NOT NULL,
    slug VARCHAR(150) NOT NULL UNIQUE,
    body TEXT NOT NULL,
    featured_image VARCHAR(255) NULL,
    meta_title VARCHAR(150) NULL,
    meta_description VARCHAR(255) NULL,
    status VARCHAR(30) DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL DEFAULT NULL,
    INDEX idx_blogs_category (category_id),
    CONSTRAINT fk_blogs_category FOREIGN KEY (category_id) REFERENCES blog_categories (id) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS success_stories (
    id BINARY(16) PRIMARY KEY,
    couple_names VARCHAR(150) NOT NULL,
    wedding_date DATE NOT NULL,
    story_text TEXT NOT NULL,
    cover_image VARCHAR(255) NOT NULL,
    status VARCHAR(30) DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS faqs (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    question VARCHAR(255) NOT NULL,
    answer TEXT NOT NULL,
    display_order INT UNSIGNED DEFAULT 0,
    status VARCHAR(30) DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS cms_pages (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    slug VARCHAR(100) NOT NULL UNIQUE,
    content TEXT NOT NULL,
    meta_title VARCHAR(150) NULL,
    meta_description VARCHAR(255) NULL,
    status VARCHAR(30) DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS banners (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    image_url VARCHAR(255) NOT NULL,
    link_url VARCHAR(255) NULL,
    display_order INT UNSIGNED DEFAULT 0,
    status VARCHAR(30) DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS testimonials (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    client_name VARCHAR(100) NOT NULL,
    occupation VARCHAR(100) NULL,
    review TEXT NOT NULL,
    rating INT UNSIGNED DEFAULT 5,
    status VARCHAR(30) DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS advertisements (
    id BINARY(16) PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    ad_type VARCHAR(30) NOT NULL, -- e.g. 'banner', 'sidebar', 'popup'
    banner_image_url VARCHAR(255) NOT NULL,
    click_redirect_url VARCHAR(255) NOT NULL,
    views_count INT UNSIGNED DEFAULT 0,
    clicks_count INT UNSIGNED DEFAULT 0,
    status VARCHAR(30) DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS contact_messages (
    id BINARY(16) PRIMARY KEY,
    sender_name VARCHAR(100) NOT NULL,
    sender_email VARCHAR(255) NOT NULL,
    subject VARCHAR(150) NOT NULL,
    message_text TEXT NOT NULL,
    status VARCHAR(30) DEFAULT 'unread', -- 'unread', 'read', 'replied'
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS feedback (
    id BINARY(16) PRIMARY KEY,
    sender_name VARCHAR(100) NOT NULL,
    email VARCHAR(255) NOT NULL,
    rating INT UNSIGNED NOT NULL,
    review TEXT NULL,
    status VARCHAR(30) DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- =====================================================
-- MODULE 11: ROLES-BASED ACCESS CONTROL (RBAC) & ADMIN
-- =====================================================

CREATE TABLE IF NOT EXISTS roles (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL UNIQUE, -- e.g. Super Admin, Support agent, Compliance Inspector
    description TEXT NULL,
    status VARCHAR(30) DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS permissions (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL UNIQUE, -- e.g. 'user_verify', 'billing_refund', 'cms_edit'
    description TEXT NULL,
    status VARCHAR(30) DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS role_permissions (
    role_id INT UNSIGNED NOT NULL,
    permission_id INT UNSIGNED NOT NULL,
    PRIMARY KEY (role_id, permission_id),
    CONSTRAINT fk_role_permissions_role FOREIGN KEY (role_id) REFERENCES roles (id) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT fk_role_permissions_perm FOREIGN KEY (permission_id) REFERENCES permissions (id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS admins (
    id BINARY(16) PRIMARY KEY,
    role_id INT UNSIGNED NOT NULL,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password_hash VARCHAR(255) NOT NULL,
    status VARCHAR(30) DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL DEFAULT NULL,
    UNIQUE KEY uq_admins_username (username, deleted_at),
    UNIQUE KEY uq_admins_email (email, deleted_at),
    CONSTRAINT fk_admins_role FOREIGN KEY (role_id) REFERENCES roles (id) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS admin_activity_logs (
    id BINARY(16) PRIMARY KEY,
    admin_id BINARY(16) NOT NULL,
    action VARCHAR(100) NOT NULL, -- e.g. 'Approve Verification Scan', 'Suspend User Account'
    module_affected VARCHAR(50) NOT NULL,
    description TEXT NOT NULL,
    ip_address VARCHAR(45) NOT NULL,
    status VARCHAR(30) DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL DEFAULT NULL,
    INDEX idx_admin_logs_admin (admin_id),
    CONSTRAINT fk_admin_logs_admin FOREIGN KEY (admin_id) REFERENCES admins (id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- =====================================================
-- MODULE 12: GENERAL SETTINGS, API LOGS & AUDITING
-- =====================================================

CREATE TABLE IF NOT EXISTS site_settings (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    setting_key VARCHAR(100) NOT NULL UNIQUE,
    setting_value TEXT NOT NULL,
    description TEXT NULL,
    status VARCHAR(30) DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS seo_settings (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    page_url_pattern VARCHAR(255) NOT NULL UNIQUE, -- url route pattern, e.g. '/stories'
    meta_title VARCHAR(150) NOT NULL,
    meta_description VARCHAR(255) NOT NULL,
    keywords TEXT NULL,
    status VARCHAR(30) DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS api_logs (
    id BINARY(16) PRIMARY KEY,
    api_name VARCHAR(100) NOT NULL,
    endpoint_url VARCHAR(255) NOT NULL,
    request_payload JSON NULL,
    response_payload JSON NULL,
    execution_time_ms INT UNSIGNED NOT NULL,
    ip_address VARCHAR(45) NOT NULL,
    status VARCHAR(30) DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL DEFAULT NULL,
    INDEX idx_api_logs_name (api_name),
    INDEX idx_api_logs_created (created_at)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS cron_jobs (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    job_name VARCHAR(100) NOT NULL UNIQUE,
    cron_expression VARCHAR(50) NOT NULL,
    last_run_at TIMESTAMP NULL DEFAULT NULL,
    status VARCHAR(30) DEFAULT 'idle', -- 'idle', 'running', 'failed'
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

SET FOREIGN_KEY_CHECKS = 1;


-- =====================================================
-- INDEX OPTIMIZATIONS (Enterprise Custom Requirements)
-- =====================================================

-- Single Column Indexes
CREATE INDEX idx_users_email_search ON users (email);
CREATE INDEX idx_users_phone_search ON users (phone);
CREATE INDEX idx_profiles_gender_search ON user_profiles (gender);
CREATE INDEX idx_profiles_age_search ON user_profiles (date_of_birth);
CREATE INDEX idx_religions_rel_search ON user_religions (religion_name);
CREATE INDEX idx_religions_caste_search ON user_religions (caste_name);
CREATE INDEX idx_locations_country_search ON user_locations (country_id);
CREATE INDEX idx_locations_state_search ON user_locations (state_id);
CREATE INDEX idx_locations_city_search ON user_locations (city_id);
CREATE INDEX idx_educations_level_search ON user_educations (education_level);
CREATE INDEX idx_occupations_name_search ON user_occupations (occupation_name);
CREATE INDEX idx_occupations_income_search ON user_occupations (annual_income);
CREATE INDEX idx_profiles_premium_search ON user_profiles (premium_status);
CREATE INDEX idx_profiles_verified_search ON user_profiles (verified_status);
CREATE INDEX idx_profiles_status_search ON user_profiles (status);
CREATE INDEX idx_profiles_created_search ON user_profiles (created_at);
CREATE INDEX idx_history_created_search ON login_history (created_at);

-- Composite Indexes
CREATE INDEX idx_comp_gender_age ON user_profiles (gender, date_of_birth);
CREATE INDEX idx_comp_religion_caste ON user_religions (religion_name, caste_name);
CREATE INDEX idx_comp_country_state_city ON user_locations (country_id, state_id, city_id);
CREATE INDEX idx_comp_occupation_salary ON user_occupations (occupation_name, annual_income);


-- =====================================================
-- SEED DATA (Bootstrap configuration dictionaries)
-- =====================================================

INSERT INTO countries (id, name, iso2, phone_code) VALUES 
(1, 'India', 'IN', '+91'),
(2, 'United States', 'US', '+1');

INSERT INTO states (id, country_id, name) VALUES 
(1, 1, 'Maharashtra'),
(2, 1, 'Karnataka'),
(3, 2, 'California');

INSERT INTO cities (id, state_id, name) VALUES 
(1, 1, 'Mumbai'),
(2, 1, 'Pune'),
(3, 2, 'Bangalore'),
(4, 3, 'Los Angeles');

INSERT INTO roles (id, name, description) VALUES
(1, 'Super Admin', 'Full master root access control to platform system databases'),
(2, 'Compliance Agent', 'Audits identity Aadhaar scans and approves verified member badges'),
(3, 'Support Representative', 'Reviews, edits, and responds to client technical helpdesk tickets');

INSERT INTO permissions (id, name, description) VALUES
(1, 'user:verify', 'Review uploaded identity documents and toggles verified badges'),
(2, 'user:suspend', 'Suspend or ban accounts violating platform guidelines'),
(3, 'payment:refund', 'Process gateway charge transactions refunds'),
(4, 'cms:publish', 'Publish success stories, static templates, or advice articles');

INSERT INTO role_permissions (role_id, permission_id) VALUES
(1, 1), (1, 2), (1, 3), (1, 4),
(2, 1), (2, 2),
(3, 4);

INSERT INTO membership_plans (id, name, price, duration_months, description) VALUES
(1, 'Silver Star', 1999.00, 3, 'Send unlimited interests, standard match filtering'),
(2, 'Gold Elite', 3999.00, 6, 'View direct telephone contacts, highlighted profiles search'),
(3, 'Platinum Premium', 5999.00, 12, 'Horoscope compatibility analysis, direct messages unlock');

INSERT INTO premium_features (id, name, code, description) VALUES
(1, 'View Phone Contacts', 'phone_view', 'Allows viewing telephone numbers of matched profiles'),
(2, 'Initiate Chat Conversations', 'direct_message', 'Enables messaging profiles before match interest accepted'),
(3, 'Profile Boost search', 'profile_boost', 'Highlights profile card in recommendations grids');

INSERT INTO plan_features (plan_id, feature_id, limit_value) VALUES
(1, 1, 10), (1, 2, 0), (1, 3, 0),
(2, 1, 30), (2, 2, 10), (2, 3, 1),
(3, 1, -1), (3, 2, -1), (3, 3, 5);

INSERT INTO site_settings (setting_key, setting_value, description) VALUES
('platform_title', 'Jodi Sodho', 'Platform global title'),
('max_daily_likes', '20', 'Free tier profile interest sending limits'),
('smtp_server', 'smtp.jodisodho.com', 'Secure email delivery host gateway');
