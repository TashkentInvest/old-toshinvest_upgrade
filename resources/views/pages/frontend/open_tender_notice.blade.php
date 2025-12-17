@extends('layouts.frontend_app')

@section('title', __('frontend.tender.open_tender_announcement') . ' | ' . __('frontend.seo.site_name'))
@section('description', __('frontend.tender.technical_consulting_purchase'))

@section('frontent_content')
<div class="gov-page tender-page">
    <!-- Hero Section -->
    <div class="gov-hero tender-hero">
        <div class="gov-container">
            <div class="gov-hero-content gov-animate-fade" id="heroContent">
                <div class="gov-badge tender-badge-urgent">
                    <i class="fa-solid fa-bell"></i>
                    <span>{{ __('frontend.tender.new_announcement') }}</span>
                </div>
                <h1 class="gov-title">{{ __('frontend.tender.open_tender_announcement') }}</h1>
                <p class="gov-subtitle">{{ __('frontend.tender.technical_consulting_purchase') }}</p>
                <p class="tender-company">{{ __('frontend.tender.company_name') }}</p>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="gov-content">
        <div class="gov-container" style="max-width: 1000px;">

            <!-- Platform Info -->
            <div class="gov-info-box tender-platform-info gov-animate-fade" data-delay="0.1">
                <i class="fa-solid fa-globe"></i>
                <div>
                    <strong>{{ __('frontend.tender.electronic_trading_platform') }}:</strong>
                    <p style="margin: 5px 0 0;">{{ __('frontend.tender.tender_description') }} <strong>Etender.uzex.uz</strong> {{ __('frontend.tender.trading_platform') }}</p>
                </div>
            </div>

            <!-- Section 1: Purchase Subject -->
            <div class="gov-card gov-animate-fade" data-delay="0.15">
                <div class="gov-card-header">
                    <div class="gov-card-number">1</div>
                    <h2 class="gov-card-title">{{ __('frontend.tender.purchase_subject') }}</h2>
                </div>
                <div class="gov-card-body">
                    <p><strong>{{ __('frontend.tender.technical_consulting_services') }}</strong></p>
                    <p class="tender-code">{{ __('frontend.tender.code') }}: <strong>70.22.12.000-00001</strong></p>
                </div>
            </div>

            <!-- Section 2: Project Address -->
            <div class="gov-card gov-animate-fade" data-delay="0.2">
                <div class="gov-card-header">
                    <div class="gov-card-number">2</div>
                    <h2 class="gov-card-title">{{ __('frontend.tender.project_address') }}</h2>
                </div>
                <div class="gov-card-body">
                    <p><i class="fa-solid fa-map-marker-alt" style="color: var(--gov-primary); margin-right: 8px;"></i> <strong>{{ __('frontend.tender.project_location') }}</strong></p>
                    <p style="margin-left: 24px; color: var(--gov-text-muted);">{{ __('frontend.tender.connected_territory') }}</p>
                </div>
            </div>

            <!-- Section 3: Technical Requirements -->
            <div class="gov-card gov-animate-fade" data-delay="0.25">
                <div class="gov-card-header">
                    <div class="gov-card-number">3</div>
                    <h2 class="gov-card-title">{{ __('frontend.tender.technical_requirements') }}</h2>
                </div>
                <div class="gov-card-body">
                    <ul class="tender-list">
                        <li>{{ __('frontend.tender.personnel_info') }}</li>
                        <li>{{ __('frontend.tender.anti_corruption') }}</li>
                        <li>{{ __('frontend.tender.service_familiarization') }}</li>
                        <li>{{ __('frontend.tender.participant_info') }}</li>
                        <li>{{ __('frontend.tender.financial_info') }}</li>
                        <li>{{ __('frontend.tender.stability_rating') }}</li>
                        <li>{{ __('frontend.tender.license_certificates') }}</li>
                    </ul>
                </div>
            </div>

            <!-- Section 4: Qualification Requirements -->
            <div class="gov-card gov-animate-fade" data-delay="0.3">
                <div class="gov-card-header">
                    <div class="gov-card-number">4</div>
                    <h2 class="gov-card-title">{{ __('frontend.tender.qualification_requirements') }}</h2>
                </div>
                <div class="gov-card-body">
                    <ul class="tender-list">
                        <li>{{ __('frontend.tender.necessary_resources') }}</li>
                        <li>{{ __('frontend.tender.legal_right') }}</li>
                        <li>{{ __('frontend.tender.no_tax_debt') }}</li>
                        <li>{{ __('frontend.tender.no_bankruptcy') }}</li>
                        <li>{{ __('frontend.tender.no_enforcement_record') }}</li>
                        <li>{{ __('frontend.tender.no_unfulfilled_obligations') }}</li>
                    </ul>
                </div>
            </div>

            <!-- Section 5: Participation Procedure -->
            <div class="gov-card gov-animate-fade" data-delay="0.35">
                <div class="gov-card-header">
                    <div class="gov-card-number">5</div>
                    <h2 class="gov-card-title">{{ __('frontend.tender.participation_procedure') }}</h2>
                </div>
                <div class="gov-card-body">
                    <div class="gov-info-box">
                        <i class="fa-solid fa-link"></i>
                        <div>
                            <p style="margin: 0;">{{ __('frontend.tender.all_applicants_submit_proposals') }}</p>
                            <p style="margin: 8px 0 0;"><strong>No 25120012464150</strong></p>
                            <p style="margin: 5px 0 0;">
                                <a href="https://etender.uzex.uz/lot/464150" target="_blank" class="tender-link">
                                    <i class="fa-solid fa-external-link-alt"></i>
                                    https://etender.uzex.uz/lot/464150
                                </a>
                                {{ __('frontend.tender.portal_submission') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section 6: Important Dates -->
            <div class="gov-card tender-dates-card gov-animate-fade" data-delay="0.4">
                <div class="gov-card-header">
                    <div class="gov-card-number">6</div>
                    <h2 class="gov-card-title">{{ __('frontend.tender.important_dates') }}</h2>
                </div>
                <div class="gov-card-body">
                    <div class="tender-dates-grid">
                        <div class="tender-date-item">
                            <div class="tender-date-icon">
                                <i class="fa-regular fa-calendar"></i>
                            </div>
                            <div class="tender-date-content">
                                <span class="tender-date-label">{{ __('frontend.tender.tender_date') }}</span>
                                <span class="tender-date-value">{{ __('frontend.tender.announcement_date') }}</span>
                            </div>
                        </div>
                        <div class="tender-date-item tender-date-deadline">
                            <div class="tender-date-icon">
                                <i class="fa-solid fa-clock"></i>
                            </div>
                            <div class="tender-date-content">
                                <span class="tender-date-label">{{ __('frontend.tender.submission_deadline') }}</span>
                                <span class="tender-date-value">{{ __('frontend.tender.submission_deadline_date') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section 7: Customer Information -->
            <div class="gov-card gov-animate-fade" data-delay="0.45">
                <div class="gov-card-header">
                    <div class="gov-card-number">7</div>
                    <h2 class="gov-card-title">{{ __('frontend.tender.customer_information') }}</h2>
                </div>
                <div class="gov-card-body">
                    <div class="tender-contact-grid">
                        <div class="tender-contact-item">
                            <i class="fa-solid fa-building"></i>
                            <div>
                                <strong>{{ __('frontend.tender.customer_name') }}</strong>
                                <p>{{ __('frontend.tender.company_name') }}</p>
                            </div>
                        </div>
                        <div class="tender-contact-item">
                            <i class="fa-solid fa-hashtag"></i>
                            <div>
                                <strong>{{ __('frontend.tender.tin') }}</strong>
                                <p>310731897</p>
                            </div>
                        </div>
                        <div class="tender-contact-item">
                            <i class="fa-solid fa-map-marker-alt"></i>
                            <div>
                                <strong>{{ __('frontend.tender.customer_address') }}</strong>
                                <p>{{ __('frontend.tender.customer_full_address') }}</p>
                            </div>
                        </div>
                        <div class="tender-contact-item">
                            <i class="fa-solid fa-phone"></i>
                            <div>
                                <strong>{{ __('frontend.tender.phone') }}</strong>
                                <p>+998 71 203 03 03</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Download Documents Section -->
            <div class="tender-download-section gov-animate-fade" data-delay="0.5">
                <h3 class="tender-download-title">
                    <i class="fa-solid fa-file-arrow-down"></i>
                    {{ __('frontend.tender.download_documents') }}
                </h3>
                <div class="tender-download-grid">
                    <a href="{{ asset('assets/tender/ОЧИҚ ТЕНДЕР ЭЪЛОНИ.pdf') }}" target="_blank" class="tender-download-card">
                        <div class="tender-download-icon">
                            <i class="fa-solid fa-file-pdf"></i>
                        </div>
                        <div class="tender-download-info">
                            <span class="tender-download-name">{{ __('frontend.tender.open_tender_announcement') }}</span>
                            <span class="tender-download-format">{{ __('frontend.tender.pdf_format') }}</span>
                        </div>
                        <div class="tender-download-btn">
                            <i class="fa-solid fa-download"></i>
                        </div>
                    </a>

                    <a href="{{ asset('assets/tender/тт_уз.pdf') }}" target="_blank" class="tender-download-card">
                        <div class="tender-download-icon">
                            <i class="fa-solid fa-file-pdf"></i>
                        </div>
                        <div class="tender-download-info">
                            <span class="tender-download-name">{{ __('frontend.tender.technical_requirements_uz') }}</span>
                            <span class="tender-download-format">{{ __('frontend.tender.pdf_format') }}</span>
                        </div>
                        <div class="tender-download-btn">
                            <i class="fa-solid fa-download"></i>
                        </div>
                    </a>

                    <a href="{{ asset('assets/tender/тз_ру.pdf') }}" target="_blank" class="tender-download-card">
                        <div class="tender-download-icon">
                            <i class="fa-solid fa-file-pdf"></i>
                        </div>
                        <div class="tender-download-info">
                            <span class="tender-download-name">{{ __('frontend.tender.technical_assignment_ru') }}</span>
                            <span class="tender-download-format">{{ __('frontend.tender.pdf_format') }}</span>
                        </div>
                        <div class="tender-download-btn">
                            <i class="fa-solid fa-download"></i>
                        </div>
                    </a>

                    <a href="{{ asset('assets/tender/харид_хужжатлари.pdf') }}" target="_blank" class="tender-download-card">
                        <div class="tender-download-icon">
                            <i class="fa-solid fa-file-zipper"></i>
                        </div>
                        <div class="tender-download-info">
                            <span class="tender-download-name">{{ __('frontend.tender.purchase_documents') }}</span>
                            <span class="tender-download-format">{{ __('frontend.tender.pdf_format') }}</span>
                        </div>
                        <div class="tender-download-btn">
                            <i class="fa-solid fa-download"></i>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Tender-specific styles that extend gov-page */
.tender-page {
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
}

.tender-hero {
    padding: 70px 0 55px;
}

.tender-badge-urgent {
    background: #dc2626 !important;
    border-color: #b91c1c !important;
    animation: pulse 2s infinite;
}

@keyframes pulse {
    0%, 100% { opacity: 1; }
    50% { opacity: 0.8; }
}

.tender-company {
    font-size: 16px;
    opacity: 0.85;
    font-weight: 600;
    margin-top: 12px;
}

.tender-code {
    color: var(--gov-text-muted);
    margin: 0;
}

.tender-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.tender-list li {
    position: relative;
    padding-left: 28px;
    margin-bottom: 12px;
    line-height: 1.6;
    color: #475569;
}

.tender-list li::before {
    content: '\f00c';
    font-family: 'Font Awesome 6 Free';
    font-weight: 900;
    position: absolute;
    left: 0;
    color: var(--gov-primary-light);
    font-size: 14px;
}

.tender-list li:last-child {
    margin-bottom: 0;
}

.tender-link {
    color: var(--gov-primary);
    font-weight: 600;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 6px;
}

.tender-link:hover {
    text-decoration: underline;
}

.tender-platform-info {
    margin-bottom: 25px;
    background: #eff6ff;
}

.tender-platform-info strong {
    color: var(--gov-primary);
}

/* Dates Section */
.tender-dates-card .gov-card-header {
    background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
    border-color: #fbbf24;
}

.tender-dates-card .gov-card-number {
    background: linear-gradient(135deg, #d97706 0%, #b45309 100%);
    border-color: #f59e0b;
}

.tender-dates-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 20px;
}

.tender-date-item {
    display: flex;
    align-items: center;
    gap: 15px;
    padding: 18px 20px;
    background: #f8fafc;
    border: 2px solid var(--gov-border);
    border-left: 4px solid var(--gov-primary);
}

.tender-date-deadline {
    border-left-color: #f59e0b;
    background: #fffbeb;
}

.tender-date-icon {
    font-size: 24px;
    color: var(--gov-primary);
}

.tender-date-deadline .tender-date-icon {
    color: #d97706;
}

.tender-date-content {
    display: flex;
    flex-direction: column;
}

.tender-date-label {
    font-size: 13px;
    color: var(--gov-text-muted);
    margin-bottom: 4px;
}

.tender-date-value {
    font-size: 18px;
    font-weight: 700;
    color: var(--gov-text-dark);
}

/* Contact Grid */
.tender-contact-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 20px;
}

.tender-contact-item {
    display: flex;
    align-items: flex-start;
    gap: 15px;
    padding: 18px;
    background: #f8fafc;
    border: 1px solid var(--gov-border);
}

.tender-contact-item > i {
    font-size: 20px;
    color: var(--gov-primary);
    margin-top: 2px;
}

.tender-contact-item strong {
    display: block;
    font-size: 13px;
    color: var(--gov-text-muted);
    margin-bottom: 5px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.tender-contact-item p {
    margin: 0;
    color: var(--gov-text-dark);
    font-weight: 500;
}

/* Download Section */
.tender-download-section {
    background: linear-gradient(135deg, var(--gov-primary) 0%, var(--gov-primary-dark) 100%);
    border: 2px solid var(--gov-primary-light);
    border-top: 5px solid var(--gov-primary-light);
    padding: 40px;
    margin-top: 30px;
}

.tender-download-title {
    font-size: 24px;
    font-weight: 700;
    color: white;
    margin: 0 0 30px;
    display: flex;
    align-items: center;
    gap: 12px;
}

.tender-download-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 15px;
}

.tender-download-card {
    display: flex;
    align-items: center;
    gap: 15px;
    padding: 18px 20px;
    background: white;
    border: 2px solid var(--gov-border);
    text-decoration: none;
    transition: var(--gov-transition);
}

.tender-download-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
    border-color: var(--gov-primary-light);
}

.tender-download-icon {
    font-size: 32px;
    color: #dc2626;
}

.tender-download-info {
    flex: 1;
    display: flex;
    flex-direction: column;
}

.tender-download-name {
    font-weight: 600;
    color: var(--gov-text-dark);
    font-size: 14px;
    margin-bottom: 4px;
}

.tender-download-format {
    font-size: 12px;
    color: var(--gov-text-muted);
    text-transform: uppercase;
}

.tender-download-btn {
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: var(--gov-primary);
    color: white;
    font-size: 16px;
    transition: var(--gov-transition);
}

.tender-download-card:hover .tender-download-btn {
    background: var(--gov-primary-light);
}

/* Responsive */
@media (max-width: 768px) {
    .tender-hero {
        padding: 50px 0 40px;
    }

    .tender-dates-grid,
    .tender-contact-grid,
    .tender-download-grid {
        grid-template-columns: 1fr;
    }

    .tender-download-section {
        padding: 25px 20px;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize GSAP animations
    if (typeof gsap !== 'undefined') {
        gsap.registerPlugin(ScrollTrigger);

        // Hero animation
        gsap.to('#heroContent', {
            opacity: 1,
            y: 0,
            duration: 0.8,
            ease: 'power3.out'
        });

        // Card animations with stagger
        const cards = document.querySelectorAll('.gov-animate-fade');
        cards.forEach((card) => {
            const delay = parseFloat(card.dataset.delay) || 0;
            gsap.to(card, {
                opacity: 1,
                y: 0,
                duration: 0.6,
                delay: 0.2 + delay,
                ease: 'power2.out',
                scrollTrigger: {
                    trigger: card,
                    start: 'top 90%',
                    toggleActions: 'play none none none'
                }
            });
        });

        // Download cards hover animation
        const downloadCards = document.querySelectorAll('.tender-download-card');
        downloadCards.forEach(card => {
            card.addEventListener('mouseenter', () => {
                gsap.to(card.querySelector('.tender-download-btn'), {
                    scale: 1.1,
                    duration: 0.3,
                    ease: 'power2.out'
                });
            });
            card.addEventListener('mouseleave', () => {
                gsap.to(card.querySelector('.tender-download-btn'), {
                    scale: 1,
                    duration: 0.3,
                    ease: 'power2.out'
                });
            });
        });
    } else {
        // Fallback: remove animation classes
        document.querySelectorAll('.gov-animate-fade').forEach(el => {
            el.style.opacity = '1';
            el.style.transform = 'none';
        });
    }
});
</script>
@endsection
