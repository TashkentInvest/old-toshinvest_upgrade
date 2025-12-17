@extends('layouts.frontend_app')

@section('frontent_content')

{{-- JAC Motors Hero Section --}}
<section class="tender-hero">
    <div class="hero-background">
        <div class="hero-pattern"></div>
        <div class="hero-overlay"></div>
    </div>
    <div class="container">
        <div class="hero-content">
            <div class="breadcrumb">
                <a href="{{ route('frontend.index') }}" class="breadcrumb-link">{{ __('frontend.common.home') }}</a>
                <span class="breadcrumb-separator">→</span>
                <span class="breadcrumb-current">{{ __('frontend.nav.announcements') }}</span>
            </div>
            <h1 class="page-title">{{ __('frontend.offers.valuation_organizations') }}</h1>
            {{-- <p class="page-subtitle"></p> --}}


        </div>
    </div>
</section>

{{-- Project Information Section --}}
<section class="project-info-section">
    <div class="container">
        <div class="announcement-post">
            <div class="post-content">
                <h1 class="announcement-title">{{ __('frontend.common.announcement') }}</h1>

                <h2 class="target-audience">{{ __('frontend.offers.valuation_organizations') }}</h2>

                <p class="announcement-text">
                    {{ __('frontend.offers.announcement_text') }}
                </p>

                <p class="call-to-action">
                    {{ __('frontend.offers.call_to_action') }}
                </p>

                <a href="{{asset('assets/offers/Объявление_15.pdf')}}" style="color: #fff" class="download-button">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none">
                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" stroke="currentColor" stroke-width="2"/>
                        <polyline points="7,10 12,15 17,10" stroke="currentColor" stroke-width="2"/>
                        <line x1="12" y1="15" x2="12" y2="3" stroke="currentColor" stroke-width="2"/>
                    </svg>
                    {{ __('frontend.common.download_documents') }}
                </a>

            </div>
        </div>
    </div>
</section>

<style>
.project-info-section {
    padding: 40px 0;
    background: #f5f5f5;
}

.announcement-post {
    max-width: 600px;
    margin: 0 auto;
    background: white;
    border: 1px solid #ddd;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    border-radius: 8px;
    overflow: hidden;
}

.post-content {
    padding: 30px;
}

.announcement-title {
    font-size: 24px;
    font-weight: bold;
    color: #333;
    text-align: center;
    margin-bottom: 20px;
}

.target-audience {
    font-size: 18px;
    font-weight: 600;
    color: #555;
    text-align: center;
    margin-bottom: 20px;
}

.announcement-text {
    font-size: 16px;
    color: #444;
    line-height: 1.6;
    margin-bottom: 20px;
    text-align: justify;
}

.call-to-action {
    font-size: 15px;
    color: #666;
    font-weight: 500;
    text-align: center;
    padding: 15px;
    background: #f8f8f8;
    border-left: 3px solid #999;
    margin: 0;
}

.download-section {
    margin-top: 25px;
    text-align: center;
    padding-top: 20px;
    border-top: 1px solid #eee;
}

.download-button {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    background: #007bff;
    color: white;
    border: none;
    padding: 12px 24px;
    border-radius: 6px;
    font-size: 15px;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.3s ease;
margin-top: 30px;
    box-shadow: 0 2px 4px rgba(0,123,255,0.2);
}

.download-button:hover {
    background: #0056b3;
    transform: translateY(-1px);
    box-shadow: 0 4px 8px rgba(0,123,255,0.3);
}

.download-button:active {
    transform: translateY(0);
}

.download-button svg {
    width: 16px;
    height: 16px;
}

/* Responsive */
@media (max-width: 768px) {
    .post-content {
        padding: 20px;
    }

    .announcement-title {
        font-size: 20px;
    }

    .target-audience {
        font-size: 16px;
    }

    .announcement-text {
        font-size: 15px;
        text-align: left;
    }
}


</style>

{{-- Optimized Inline Styles --}}
<style>
:root {
    --primary: #0f172a;
    --primary-light: #1e293b;
    --primary-dark: #020617;
    --blue: #3b82f6;
    --blue-light: #60a5fa;
    --blue-dark: #1d4ed8;
    --success: #10b981;
    --warning: #f59e0b;
    --purple: #8b5cf6;
    --orange: #f97316;
    --light-bg: #f8fafc;
    --border: #e2e8f0;
    --text: #1e293b;
    --text-light: #64748b;
    --white: #ffffff;
    --shadow: 0 4px 6px -1px rgba(0,0,0,0.1);
    --shadow-lg: 0 10px 25px -3px rgba(0,0,0,0.1);
    --shadow-xl: 0 20px 25px -5px rgba(0,0,0,0.1);
    --radius: 12px;
    --transition: 0.3s ease;
}

/* Reset and Base Styles */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Hero Section */
.tender-hero {
    position: relative;
    background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 50%, #334155 100%);
    color: var(--white);
    padding: 120px 0 80px;
    overflow: hidden;
}

.hero-background {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
}

.hero-pattern {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="tender-grid" width="20" height="20" patternUnits="userSpaceOnUse"><path d="M 20 0 L 0 0 0 20" fill="none" stroke="rgba(255,255,255,0.05)" stroke-width="1"/></pattern></defs><rect width="100" height="100" fill="url(%23tender-grid)"/></svg>');
    opacity: 0.6;
}

.hero-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: radial-gradient(circle at 30% 70%, rgba(59, 130, 246, 0.1) 0%, transparent 50%);
}

.hero-content {
    position: relative;
    z-index: 2;
    text-align: center;
    max-width: 1000px;
    margin: 0 auto;
}

.container {
    max-width: 1400px;
    margin: 0 auto;
    padding: 0 20px;
}

.breadcrumb {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 12px;
    margin-bottom: 24px;
    font-size: 0.95rem;
}

.breadcrumb-link {
    color: rgba(255, 255, 255, 0.7);
    text-decoration: none;
    transition: var(--transition);
    padding: 4px 8px;
    border-radius: 6px;
}

.breadcrumb-link:hover {
    color: var(--blue-light);
    background: rgba(255, 255, 255, 0.1);
}

.breadcrumb-separator {
    color: rgba(255, 255, 255, 0.5);
}

.breadcrumb-current {
    color: var(--blue-light);
    font-weight: 600;
}

.organization-badge {
    display: inline-flex;
    align-items: center;
    gap: 12px;
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 25px;
    padding: 12px 24px;
    margin-bottom: 32px;
    font-weight: 600;
    font-size: 0.95rem;
}

.badge-icon {
    font-size: 1.2rem;
}

.page-title {
    font-size: clamp(2.5rem, 5vw, 3.5rem);
    font-weight: 800;
    margin-bottom: 20px;
    background: linear-gradient(135deg, var(--white) 0%, #e2e8f0 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    line-height: 1.2;
}

.page-subtitle {
    font-size: clamp(1.1rem, 2.5vw, 1.3rem);
    color: rgba(255, 255, 255, 0.8);
    max-width: 900px;
    margin: 0 auto 40px;
    line-height: 1.6;
}

.announcement-badge {
    display: inline-flex;
    align-items: center;
    gap: 12px;
    background: linear-gradient(135deg, var(--success) 0%, #059669 100%);
    color: var(--white);
    padding: 16px 32px;
    border-radius: 25px;
    font-weight: 700;
    font-size: 1.1rem;
    text-transform: uppercase;
    letter-spacing: 1px;
    margin-bottom: 60px;
    box-shadow: 0 8px 32px rgba(16, 185, 129, 0.3);
}

.announcement-icon {
    font-size: 1.3rem;
}

/* Hero Stats */
.hero-stats {
    display: flex;
    justify-content: center;
    gap: 40px;
    flex-wrap: wrap;
    margin-top: 60px;
}

.stat-card {
    display: flex;
    align-items: center;
    gap: 16px;
    background: rgba(255, 255, 255, 0.08);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(255, 255, 255, 0.1);
    border-radius: 16px;
    padding: 24px 32px;
    transition: var(--transition);
}

.stat-card:hover {
    transform: translateY(-4px);
    background: rgba(255, 255, 255, 0.12);
}

.stat-icon {
    width: 56px;
    height: 56px;
    background: linear-gradient(135deg, var(--blue) 0%, var(--blue-dark) 100%);
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--white);
    box-shadow: 0 8px 32px rgba(59, 130, 246, 0.3);
}

.stat-content {
    text-align: left;
}

.stat-number {
    font-size: 2.2rem;
    font-weight: 800;
    color: var(--white);
    display: block;
    line-height: 1;
    margin-bottom: 4px;
}

.stat-label {
    font-size: 0.95rem;
    color: rgba(255, 255, 255, 0.8);
    font-weight: 500;
}

/* Timeline Section */
.timeline-section {
    padding: 80px 0;
    background: var(--light-bg);
}

.section-header {
    text-align: center;
    margin-bottom: 60px;
}

.section-title {
    font-size: 2.5rem;
    font-weight: 700;
    color: var(--text);
    margin-bottom: 12px;
}

.section-subtitle {
    font-size: 1.2rem;
    color: var(--text-light);
    max-width: 600px;
    margin: 0 auto;
}

.timeline-container {
    max-width: 900px;
    margin: 0 auto;
    position: relative;
}

.timeline-item {
    display: flex;
    gap: 30px;
    margin-bottom: 50px;
    position: relative;
}

.timeline-item:last-child .marker-line {
    display: none;
}

.timeline-marker {
    position: relative;
    flex-shrink: 0;
}

.marker-dot {
    width: 20px;
    height: 20px;
    background: var(--border);
    border-radius: 50%;
    border: 4px solid var(--white);
    box-shadow: var(--shadow);
    transition: var(--transition);
}

.timeline-item.active .marker-dot {
    background: var(--success);
    box-shadow: 0 0 0 8px rgba(16, 185, 129, 0.1);
}

.marker-line {
    position: absolute;
    left: 50%;
    top: 20px;
    transform: translateX(-50%);
    width: 2px;
    height: 80px;
    background: var(--border);
}

.timeline-content {
    flex: 1;
    background: var(--white);
    padding: 30px;
    border-radius: var(--radius);
    box-shadow: var(--shadow);
    transition: var(--transition);
}

.timeline-content:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-lg);
}

.timeline-badge {
    display: inline-block;
    background: var(--success);
    color: var(--white);
    padding: 6px 16px;
    border-radius: 20px;
    font-size: 0.85rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-bottom: 16px;
}

.timeline-badge.finish {
    background: var(--warning);
}

.timeline-title {
    font-size: 1.4rem;
    font-weight: 700;
    color: var(--text);
    margin-bottom: 12px;
}

.timeline-date {
    font-size: 1.8rem;
    font-weight: 800;
    color: var(--blue);
    margin-bottom: 8px;
}

.timeline-time {
    font-size: 1.1rem;
    color: var(--warning);
    font-weight: 600;
    margin-bottom: 16px;
}

.timeline-description {
    color: var(--text-light);
    line-height: 1.6;
    margin: 0;
}

/* Project Information Section */
.project-info-section {
    padding: 80px 0;
    background: var(--white);
}

.info-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(500px, 1fr));
    gap: 40px;
}

.info-card {
    background: var(--white);
    border-radius: var(--radius);
    box-shadow: var(--shadow-lg);
    overflow: hidden;
    transition: var(--transition);
    border: 1px solid var(--border);
}

.info-card:hover {
    transform: translateY(-8px);
    box-shadow: var(--shadow-xl);
}

.card-header {
    display: flex;
    align-items: center;
    gap: 16px;
    padding: 30px 30px 20px;
    border-bottom: 2px solid var(--light-bg);
}

.card-icon {
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, var(--blue) 0%, var(--blue-dark) 100%);
    border-radius: var(--radius);
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--white);
    flex-shrink: 0;
}

.card-title {
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--text);
    margin: 0;
}

/* Location Card */
.location-details {
    padding: 30px;
}

.location-item {
    display: flex;
    gap: 16px;
    align-items: flex-start;
}



.location-text {
    flex: 1;
}

.location-label {
    font-size: 0.9rem;
    color: var(--text-light);
    margin-bottom: 8px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    font-weight: 600;
}

.location-value {
    font-size: 1.1rem;
    color: var(--text);
    font-weight: 600;
    line-height: 1.5;
}

/* Contact Card */
.contact-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
    padding: 30px;
}



.contact-icon {
    width: 40px;
    height: 40px;
    background: var(--blue);
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--white);
    flex-shrink: 0;
}

.contact-info {
    flex: 1;
    min-width: 0;
}

.contact-label {
    font-size: 0.8rem;
    color: var(--text-light);
    margin-bottom: 4px;
    text-transform: uppercase;
    letter-spacing: 0.3px;
    font-weight: 600;
}

.contact-value {
    font-weight: 600;
    color: var(--text);
    font-size: 0.95rem;
    word-break: break-word;
}

/* Documents Section */
.documents-section {
    padding: 80px 0;
    background: var(--light-bg);
}

.documents-card {
    background: var(--white);
    border-radius: var(--radius);
    box-shadow: var(--shadow-lg);
    overflow: hidden;
    border: 1px solid var(--border);
}

.documents-header {
    display: flex;
    align-items: center;
    gap: 20px;
    padding: 40px;
    background: linear-gradient(135deg, #fffbeb 0%, #fef3c7 100%);
    border-bottom: 2px solid #fbbf24;
}

.documents-icon {
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, var(--warning) 0%, #d97706 100%);
    border-radius: var(--radius);
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--white);
    flex-shrink: 0;
}

.documents-title h3 {
    font-size: 1.8rem;
    font-weight: 700;
    color: var(--text);
    margin-bottom: 8px;
}

.documents-title p {
    color: var(--text-light);
    font-size: 1.1rem;
    margin: 0;
}

.documents-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 1px;
    background: var(--border);
}

.document-item {
    display: flex;
    align-items: center;
    gap: 16px;
    padding: 24px;
    background: var(--white);
    transition: var(--transition);
}

.document-item:hover {
    background: var(--light-bg);
}

.document-icon {
    width: 50px;
    height: 50px;
    background: var(--light-bg);
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--blue);
    flex-shrink: 0;
}

.document-text {
    flex: 1;
}

.document-name {
    font-weight: 700;
    color: var(--text);
    margin-bottom: 4px;
    font-size: 1rem;
}

.document-type {
    font-size: 0.85rem;
    color: var(--text-light);
}

.document-status {
    width: 32px;
    height: 32px;
    background: var(--success);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--white);
    flex-shrink: 0;
}

/* Company Section */
.company-section {
    padding: 80px 0;
    background: var(--white);
}

.company-card {
    background: var(--white);
    border-radius: var(--radius);
    box-shadow: var(--shadow-lg);
    overflow: hidden;
    border: 1px solid var(--border);
}

.company-header {
    display: flex;
    align-items: center;
    gap: 24px;
    padding: 40px;
    background: linear-gradient(135deg, var(--light-bg) 0%, #e0f2fe 100%);
    border-bottom: 2px solid var(--blue);
}

.company-logo {
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, var(--blue) 0%, var(--blue-dark) 100%);
    border-radius: var(--radius);
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--white);
    flex-shrink: 0;
}

.company-info {
    flex: 1;
}

.company-name {
    font-size: 1.8rem;
    font-weight: 700;
    color: var(--text);
    margin-bottom: 8px;
}

.company-description {
    color: var(--text-light);
    font-size: 1.1rem;
    margin: 0;
}

.company-details-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: 1px;
    background: var(--border);
}

.detail-item {
    display: flex;
    align-items: flex-start;
    gap: 16px;
    padding: 30px;
    background: var(--white);
    transition: var(--transition);
}

.detail-item:hover {
    background: var(--light-bg);
}

.detail-icon {
    width: 50px;
    height: 50px;
    background: var(--light-bg);
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--blue);
    flex-shrink: 0;
    margin-top: 4px;
}

.detail-text {
    flex: 1;
}

.detail-label {
    font-size: 0.9rem;
    color: var(--text-light);
    margin-bottom: 8px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    font-weight: 600;
}

.detail-value {
    font-size: 1.1rem;
    color: var(--text);
    font-weight: 600;
    line-height: 1.5;
}

/* Download Section */
.download-section {
    padding: 80px 0;
    background: var(--light-bg);
}

.download-card {
    background: var(--white);
    border-radius: var(--radius);
    box-shadow: var(--shadow-lg);
    overflow: hidden;
    border: 1px solid var(--border);
}

.download-content {
    display: flex;
    align-items: center;
    gap: 40px;
    padding: 40px;
}

.download-info {
    flex: 1;
    display: flex;
    gap: 24px;
}

.download-icon {
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, var(--success) 0%, #059669 100%);
    border-radius: var(--radius);
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--white);
    flex-shrink: 0;
}

.download-text {
    flex: 1;
}

.download-title {
    font-size: 1.8rem;
    font-weight: 700;
    color: var(--text);
    margin-bottom: 12px;
}

.download-description {
    font-size: 1.1rem;
    color: var(--text-light);
    margin-bottom: 20px;
    line-height: 1.6;
}

.download-features {
    display: flex;
    flex-direction: column;
    gap: 8px;
}

.feature-item {
    display: flex;
    align-items: center;
    gap: 8px;
}

.feature-icon {
    color: var(--success);
    font-weight: 700;
}

.feature-text {
    font-size: 0.95rem;
    color: var(--text);
    font-weight: 500;
}

.download-actions {
    display: flex;
    flex-direction: column;
    gap: 16px;
    flex-shrink: 0;
}

.download-btn {
    display: inline-flex;
    align-items: center;
    gap: 12px;
    padding: 16px 24px;
    border-radius: var(--radius);
    text-decoration: none;
    font-weight: 600;
    font-size: 1rem;
    transition: var(--transition);
    min-width: 280px;
    justify-content: space-between;
}

.download-btn.primary {
    background: linear-gradient(135deg, var(--blue) 0%, var(--blue-dark) 100%);
    color: var(--white);
    box-shadow: 0 8px 32px rgba(59, 130, 246, 0.3);
}

.download-btn.primary:hover {
    transform: translateY(-4px);
    box-shadow: 0 12px 40px rgba(59, 130, 246, 0.4);
    color: var(--white);
    text-decoration: none;
}

.download-btn.secondary {
    background: var(--white);
    color: var(--orange);
    border: 2px solid var(--orange);
    box-shadow: var(--shadow);
}

.download-btn.secondary:hover {
    background: var(--orange);
    color: var(--white);
    transform: translateY(-4px);
    box-shadow: 0 12px 40px rgba(249, 115, 22, 0.4);
    text-decoration: none;
}

.btn-icon {
    display: flex;
    align-items: center;
    justify-content: center;
}

.btn-text {
    flex: 1;
    text-align: center;
}

.btn-format {
    background: rgba(255, 255, 255, 0.2);
    padding: 4px 8px;
    border-radius: 6px;
    font-size: 0.8rem;
    font-weight: 700;
}

.download-btn.secondary .btn-format {
    background: rgba(249, 115, 22, 0.1);
    color: var(--orange);
}

.download-btn.secondary:hover .btn-format {
    background: rgba(255, 255, 255, 0.2);
    color: var(--white);
}

/* Responsive Design */
@media (max-width: 1024px) {
    .info-grid {
        grid-template-columns: 1fr;
    }

    .download-content {
        flex-direction: column;
        text-align: center;
    }

    .download-info {
        flex-direction: column;
        align-items: center;
        text-align: center;
    }

    .download-actions {
        width: 100%;
        max-width: 400px;
    }
}

@media (max-width: 768px) {
    .tender-hero {
        padding: 100px 0 60px;
    }

    .page-title {
        font-size: 2.2rem;
    }

    .page-subtitle {
        font-size: 1.1rem;
        margin-bottom: 30px;
    }

    .hero-stats {
        gap: 20px;
        margin-top: 40px;
    }

    .stat-card {
        padding: 16px 20px;
        gap: 12px;
    }

    .stat-icon {
        width: 44px;
        height: 44px;
    }

    .stat-number {
        font-size: 1.8rem;
    }

    .timeline-item {
        flex-direction: column;
        gap: 20px;
    }

    .timeline-marker {
        align-self: flex-start;
    }

    .marker-line {
        display: none;
    }

    .contact-grid {
        grid-template-columns: 1fr;
    }

    .documents-grid {
        grid-template-columns: 1fr;
    }

    .company-details-grid {
        grid-template-columns: 1fr;
    }

    .documents-header {
        flex-direction: column;
        text-align: center;
    }

    .company-header {
        flex-direction: column;
        text-align: center;
    }
}

@media (max-width: 480px) {
    .container {
        padding: 0 15px;
    }

    .tender-hero {
        padding: 80px 0 50px;
    }

    .page-title {
        font-size: 1.8rem;
    }

    .organization-badge {
        font-size: 0.85rem;
        padding: 8px 16px;
    }

    .hero-stats {
        flex-direction: column;
        gap: 16px;
        margin-top: 30px;
    }

    .stat-card {
        padding: 12px 16px;
    }

    .section-title {
        font-size: 2rem;
    }

    .timeline-content {
        padding: 20px;
    }

    .card-header {
        padding: 20px 20px 15px;
        flex-direction: column;
        text-align: center;
        gap: 12px;
    }

    .card-icon {
        width: 50px;
        height: 50px;
    }

    .location-details,
    .contact-grid {
        padding: 20px;
    }

    .documents-header {
        padding: 30px 20px;
    }

    .documents-icon {
        width: 60px;
        height: 60px;
    }

    .company-header {
        padding: 30px 20px;
    }

    .company-logo {
        width: 60px;
        height: 60px;
    }

    .download-content {
        padding: 30px 20px;
    }

    .download-icon {
        width: 60px;
        height: 60px;
    }

    .download-btn {
        min-width: auto;
        width: 100%;
    }
}

/* Animations */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes slideInFromLeft {
    from {
        opacity: 0;
        transform: translateX(-30px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

@keyframes slideInFromRight {
    from {
        opacity: 0;
        transform: translateX(30px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

@keyframes bounceIn {
    0% {
        opacity: 0;
        transform: scale(0.3);
    }
    50% {
        opacity: 1;
        transform: scale(1.1);
    }
    100% {
        opacity: 1;
        transform: scale(1);
    }
}

.timeline-section {
    animation: fadeInUp 0.8s ease-out;
}

.info-card {
    animation: slideInFromLeft 0.8s ease-out;
}

.info-card:nth-child(2) {
    animation: slideInFromRight 0.8s ease-out;
}

.documents-card {
    animation: fadeInUp 0.8s ease-out 0.2s both;
}

.company-card {
    animation: fadeInUp 0.8s ease-out 0.4s both;
}

.download-card {
    animation: bounceIn 0.8s ease-out 0.6s both;
}

/* Print Styles */
@media print {
    .tender-hero {
        background: var(--white) !important;
        color: var(--text) !important;
        padding: 40px 0 20px;
    }

    .hero-stats {
        display: none;
    }

    .download-actions {
        display: none;
    }

    .info-card,
    .documents-card,
    .company-card {
        break-inside: avoid;
        margin-bottom: 20px;
        box-shadow: none;
        border: 1px solid var(--border);
    }
}

/* High contrast mode support */
@media (prefers-contrast: high) {
    .info-card,
    .documents-card,
    .company-card,
    .download-card {
        border: 2px solid var(--text);
    }

    .download-btn {
        border: 2px solid currentColor;
    }
}

/* Reduced motion support */
@media (prefers-reduced-motion: reduce) {
    * {
        animation-duration: 0.01ms !important;
        animation-iteration-count: 1 !important;
        transition-duration: 0.01ms !important;
    }
}
</style>

{{-- Optimized JavaScript --}}
<script>
(function() {
    'use strict';

    // Performance monitoring
    const perf = {
        start: performance.now(),
        log: function(label) {
            console.log(`[${label}] ${(performance.now() - this.start).toFixed(2)}ms`);
        }
    };

    // Enhanced hover effects for cards
    const cards = document.querySelectorAll('.info-card, .timeline-content, .document-item, .detail-item, .contact-item');
    cards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            if (!this.classList.contains('timeline-content')) {
                this.style.transform = 'translateY(-8px) scale(1.02)';
            }
        });

        card.addEventListener('mouseleave', function() {
            this.style.transform = '';
        });
    });

    // Download button click tracking and feedback
    const downloadBtns = document.querySelectorAll('.download-btn');
    downloadBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            console.log('Download initiated:', this.href);

            // Add click feedback
            this.style.transform = 'scale(0.95)';
            setTimeout(() => {
                this.style.transform = '';
            }, 150);

            // Show download notification
            showNotification('Загрузка файла начата...', 'success');
        });
    });

    // Contact item click to copy functionality
    const contactItems = document.querySelectorAll('.contact-item');
    contactItems.forEach(item => {
        item.addEventListener('click', function() {
            const contactValue = this.querySelector('.contact-value');
            if (contactValue && navigator.clipboard) {
                navigator.clipboard.writeText(contactValue.textContent).then(() => {
                    // Visual feedback
                    const originalBg = this.style.background;
                    this.style.background = 'rgba(16, 185, 129, 0.1)';
                    this.style.borderLeft = '4px solid #10b981';

                    setTimeout(() => {
                        this.style.background = originalBg;
                        this.style.borderLeft = '';
                    }, 1500);

                    showNotification('Контакт скопирован в буфер обмена', 'success');
                    console.log('Contact copied:', contactValue.textContent);
                });
            }
        });

        // Add cursor pointer and title
        item.style.cursor = 'pointer';
        item.title = 'Нажмите для копирования';
    });

    // Intersection Observer for animations
    if ('IntersectionObserver' in window) {
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        // Observe animated elements
        const animatedElements = document.querySelectorAll('.info-card, .timeline-content, .documents-card, .company-card, .download-card');
        animatedElements.forEach((element, index) => {
            element.style.opacity = '0';
            element.style.transform = 'translateY(30px)';
            element.style.transition = `opacity 0.6s ease ${index * 0.1}s, transform 0.6s ease ${index * 0.1}s`;
            observer.observe(element);
        });

        perf.log('Animation Observer Setup');
    }

    // Timeline progress indicator
    const timelineItems = document.querySelectorAll('.timeline-item');
    const currentDate = new Date();
    const startDate = new Date('2025-06-26');
    const endDate = new Date('2025-07-02');

    timelineItems.forEach((item, index) => {
        const isActive = item.classList.contains('active');
        if (currentDate >= startDate && currentDate <= endDate) {
            if (index === 0) {
                item.classList.add('active');
            } else if (currentDate > endDate) {
                item.classList.add('completed');
            }
        }
    });

    // Enhanced accessibility
    cards.forEach((card, index) => {
        card.setAttribute('tabindex', '0');
        card.setAttribute('role', 'article');

        card.addEventListener('keydown', (e) => {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                card.click();
            }
        });

        card.addEventListener('focus', function() {
            this.style.outline = '3px solid #3b82f6';
            this.style.outlineOffset = '2px';
        });

        card.addEventListener('blur', function() {
            this.style.outline = '';
            this.style.outlineOffset = '';
        });
    });

    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Feature items hover effects
    const featureItems = document.querySelectorAll('.feature-item');
    featureItems.forEach(item => {
        item.addEventListener('mouseenter', function() {
            this.style.transform = 'translateX(8px)';
            this.style.background = 'rgba(16, 185, 129, 0.1)';
            this.style.borderRadius = '6px';
            this.style.padding = '4px 8px';
        });

        item.addEventListener('mouseleave', function() {
            this.style.transform = '';
            this.style.background = '';
            this.style.borderRadius = '';
            this.style.padding = '';
        });
    });

    // Document items interaction
    const documentItems = document.querySelectorAll('.document-item');
    documentItems.forEach(item => {
        item.addEventListener('mouseenter', function() {
            const status = this.querySelector('.document-status');
            if (status) {
                status.style.transform = 'scale(1.2) rotate(360deg)';
            }
        });

        item.addEventListener('mouseleave', function() {
            const status = this.querySelector('.document-status');
            if (status) {
                status.style.transform = '';
            }
        });
    });

    // Show notification function
    function showNotification(message, type = 'info') {
        // Remove existing notifications
        const existingNotification = document.querySelector('.notification');
        if (existingNotification) {
            existingNotification.remove();
        }

        // Create notification element
        const notification = document.createElement('div');
        notification.className = 'notification';
        notification.innerHTML = `
            <div class="notification-content">
                <span class="notification-icon">${type === 'success' ? '✓' : 'ℹ'}</span>
                <span class="notification-message">${message}</span>
            </div>
        `;

        // Add notification styles
        notification.style.cssText = `
            position: fixed;
            top: 20px;
            right: 20px;
            background: ${type === 'success' ? '#10b981' : '#3b82f6'};
            color: white;
            padding: 16px 24px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
            z-index: 1000;
            animation: slideInFromRight 0.3s ease-out;
            font-weight: 600;
            max-width: 400px;
        `;

        // Add to document
        document.body.appendChild(notification);

        // Auto remove after 3 seconds
        setTimeout(() => {
            notification.style.animation = 'slideOutToRight 0.3s ease-out';
            setTimeout(() => {
                if (notification.parentNode) {
                    notification.remove();
                }
            }, 300);
        }, 3000);
    }

    // Add missing animation keyframes
    const style = document.createElement('style');
    style.textContent = `
        @keyframes slideInFromRight {
            from {
                opacity: 0;
                transform: translateX(100%);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes slideOutToRight {
            from {
                opacity: 1;
                transform: translateX(0);
            }
            to {
                opacity: 0;
                transform: translateX(100%);
            }
        }

        .notification-content {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .notification-icon {
            font-size: 1.2rem;
        }

        .notification-message {
            font-size: 0.95rem;
        }
    `;
    document.head.appendChild(style);

    // Page visibility API for performance optimization
    document.addEventListener('visibilitychange', function() {
        if (document.hidden) {
            // Pause animations when page is not visible
            console.log('Page hidden - pausing animations');
        } else {
            // Resume animations when page becomes visible
            console.log('Page visible - resuming animations');
        }
    });

    // Performance monitoring
    window.addEventListener('load', () => {
        const loadTime = performance.now();
        perf.log('Total Load Time');
        console.log(`🏭 JAC Motors tender page loaded successfully in ${loadTime.toFixed(2)}ms`);

        // Report performance metrics
        if ('getEntriesByType' in performance) {
            const paintMetrics = performance.getEntriesByType('paint');
            paintMetrics.forEach(metric => {
                console.log(`${metric.name}: ${metric.startTime.toFixed(2)}ms`);
            });
        }

        // Check for deadline and update UI accordingly
        const now = new Date();
        const deadline = new Date('2025-07-02T16:00:00');

        if (now > deadline) {
            const timelineItems = document.querySelectorAll('.timeline-item');
            timelineItems.forEach(item => {
                item.classList.add('expired');
            });

            // Show expired notice
            showNotification('Срок подачи заявок истек', 'warning');
        }
    });

    // Export functions for debugging
    window.jacTenderPage = {
        highlightContacts: () => {
            const contacts = document.querySelectorAll('.contact-item');
            contacts.forEach(contact => {
                contact.style.border = '3px solid #10b981';
                setTimeout(() => {
                    contact.style.border = '';
                }, 2000);
            });
        },
        highlightDocuments: () => {
            const documents = document.querySelectorAll('.document-item');
            documents.forEach(doc => {
                doc.style.border = '3px solid #3b82f6';
                setTimeout(() => {
                    doc.style.border = '';
                }, 2000);
            });
        },
        showTimelineStatus: () => {
            const now = new Date();
            const start = new Date('2025-06-26');
            const end = new Date('2025-07-02T16:00:00');

            console.log({
                currentDate: now.toLocaleString(),
                startDate: start.toLocaleString(),
                endDate: end.toLocaleString(),
                status: now < start ? 'upcoming' : now > end ? 'expired' : 'active',
                daysRemaining: Math.ceil((end - now) / (1000 * 60 * 60 * 24))
            });
        },
        testNotification: (message, type) => {
            showNotification(message || 'Тестовое уведомление', type || 'info');
        },
        logMetrics: () => {
            console.log({
                totalContacts: document.querySelectorAll('.contact-item').length,
                totalDocuments: document.querySelectorAll('.document-item').length,
                totalSections: document.querySelectorAll('section').length,
                loadTime: performance.now(),
                userAgent: navigator.userAgent
            });
        }
    };

    perf.log('Script Initialization Complete');

})();
</script>

@endsection
