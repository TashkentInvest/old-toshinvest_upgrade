@extends('layouts.frontend_app')

@section('title', __('frontend.investor_ideas.seo_title'))
@section('description', __('frontend.investor_ideas.seo_description'))

@section('frontent_content')
<div class="gov-page">
    <!-- Hero Section -->
    <div class="gov-hero">
        <div class="gov-container">
            <div class="gov-hero-content gov-animate-fade" id="heroContent">
                <div class="gov-badge">
                    <i class="fa-solid fa-building-columns"></i>
                    <span>{{ __('frontend.investor_ideas.badge_text') }}</span>
                </div>
                <h1 class="gov-title">{{ __('frontend.investor_ideas.page_title') }}</h1>
                <p class="gov-subtitle">{{ __('frontend.investor_ideas.page_subtitle') }}</p>
            </div>
        </div>
    </div>

    <!-- Form Section -->
    <div class="gov-content">
        <div class="gov-container">
            @if(session('error'))
                <div class="gov-alert gov-alert-error">
                    <i class="fa-solid fa-circle-exclamation"></i>
                    <span>{{ session('error') }}</span>
                </div>
            @endif

            <form action="{{ route('frontend.investor_ideas.store') }}" method="POST" enctype="multipart/form-data" class="gov-form" id="investorForm" style="max-width: 800px; margin: 0 auto;">
                @csrf

                <!-- Section 1: Contact Information -->
                <div class="gov-card gov-animate-fade" data-delay="0.1">
                    <div class="gov-card-header">
                        <div class="gov-card-number">01</div>
                        <h2 class="gov-card-title">{{ __('frontend.investor_ideas.section_contact') }}</h2>
                    </div>
                    <div class="gov-card-body">
                        <div class="gov-form-row">
                            <div class="gov-form-group">
                                <label for="company_name" class="gov-label required">{{ __('frontend.investor_ideas.company_name') }}</label>
                                <input type="text" id="company_name" name="company_name" class="gov-input" value="{{ old('company_name') }}" placeholder="{{ __('frontend.investor_ideas.company_name_placeholder') }}" required>
                                @error('company_name')<span class="gov-error-message">{{ $message }}</span>@enderror
                            </div>
                            <div class="gov-form-group">
                                <label for="contact_person" class="gov-label required">{{ __('frontend.investor_ideas.contact_person') }}</label>
                                <input type="text" id="contact_person" name="contact_person" class="gov-input" value="{{ old('contact_person') }}" placeholder="{{ __('frontend.investor_ideas.contact_person_placeholder') }}" required>
                                @error('contact_person')<span class="gov-error-message">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="gov-form-row">
                            <div class="gov-form-group">
                                <label for="email" class="gov-label required">{{ __('frontend.investor_ideas.contact_email') }}</label>
                                <input type="email" id="email" name="email" class="gov-input" value="{{ old('email') }}" placeholder="{{ __('frontend.investor_ideas.contact_email_placeholder') }}" required>
                                @error('email')<span class="gov-error-message">{{ $message }}</span>@enderror
                            </div>
                            <div class="gov-form-group">
                                <label for="phone" class="gov-label required">{{ __('frontend.investor_ideas.contact_phone') }}</label>
                                <input type="tel" id="phone" name="phone" class="gov-input" value="{{ old('phone') }}" placeholder="{{ __('frontend.investor_ideas.contact_phone_placeholder') }}" required>
                                @error('phone')<span class="gov-error-message">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Section 2: Project Details -->
                <div class="gov-card gov-animate-fade" data-delay="0.2">
                    <div class="gov-card-header">
                        <div class="gov-card-number">02</div>
                        <h2 class="gov-card-title">{{ __('frontend.investor_ideas.section_project') }}</h2>
                    </div>
                    <div class="gov-card-body">
                        <div class="gov-form-group">
                            <label for="project_title" class="gov-label required">{{ __('frontend.investor_ideas.project_title') }}</label>
                            <input type="text" id="project_title" name="project_title_uz" class="gov-input" value="{{ old('project_title_uz') }}" placeholder="{{ __('frontend.investor_ideas.project_title_placeholder') }}" required>
                            @error('project_title_uz')<span class="gov-error-message">{{ $message }}</span>@enderror
                        </div>

                        <div class="gov-form-group">
                            <label for="project_description" class="gov-label required">{{ __('frontend.investor_ideas.project_description') }}</label>
                            <textarea id="project_description" name="project_description_uz" class="gov-textarea" rows="5" placeholder="{{ __('frontend.investor_ideas.project_description_placeholder') }}" required>{{ old('project_description_uz') }}</textarea>
                            <span class="gov-hint">{{ __('frontend.investor_ideas.project_description_hint') }}</span>
                            @error('project_description_uz')<span class="gov-error-message">{{ $message }}</span>@enderror
                        </div>

                        <div class="gov-form-row">
                            <div class="gov-form-group">
                                <label for="estimated_investment" class="gov-label">{{ __('frontend.investor_ideas.investment_amount') }}</label>
                                <div style="display: flex; gap: 10px;">
                                    <input type="number" id="estimated_investment" name="estimated_investment" class="gov-input" value="{{ old('estimated_investment') }}" placeholder="{{ __('frontend.investor_ideas.investment_amount_placeholder') }}" step="0.01" min="0" style="flex: 2;">
                                    <select id="currency" name="currency" class="gov-select" style="flex: 1;">
                                        <option value="USD" {{ old('currency') == 'USD' ? 'selected' : '' }}>USD</option>
                                        <option value="EUR" {{ old('currency') == 'EUR' ? 'selected' : '' }}>EUR</option>
                                        <option value="UZS" {{ old('currency') == 'UZS' ? 'selected' : '' }}>UZS</option>
                                    </select>
                                </div>
                                @error('estimated_investment')<span class="gov-error-message">{{ $message }}</span>@enderror
                            </div>
                            <div class="gov-form-group">
                                <label for="estimated_timeline_months" class="gov-label">{{ __('frontend.investor_ideas.estimated_timeline') }}</label>
                                <input type="number" id="estimated_timeline_months" name="estimated_timeline_months" class="gov-input" value="{{ old('estimated_timeline_months') }}" placeholder="{{ __('frontend.investor_ideas.estimated_timeline_placeholder') }}" min="1" max="240">
                                @error('estimated_timeline_months')<span class="gov-error-message">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="gov-form-row">
                            <div class="gov-form-group">
                                <label for="industry_sector" class="gov-label">{{ __('frontend.investor_ideas.industry_sector') }}</label>
                                <input type="text" id="industry_sector" name="industry_sector" class="gov-input" value="{{ old('industry_sector') }}" placeholder="{{ __('frontend.investor_ideas.industry_sector_placeholder') }}">
                                @error('industry_sector')<span class="gov-error-message">{{ $message }}</span>@enderror
                            </div>
                            <div class="gov-form-group">
                                <label for="preferred_location" class="gov-label">{{ __('frontend.investor_ideas.preferred_location') }}</label>
                                <input type="text" id="preferred_location" name="preferred_location" class="gov-input" value="{{ old('preferred_location') }}" placeholder="{{ __('frontend.investor_ideas.preferred_location_placeholder') }}">
                                @error('preferred_location')<span class="gov-error-message">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Section 3: Documents (Optional) -->
                <div class="gov-card gov-animate-fade" data-delay="0.3">
                    <div class="gov-card-header">
                        <div class="gov-card-number">03</div>
                        <h2 class="gov-card-title">{{ __('frontend.investor_ideas.section_documents') }} <span class="gov-optional-badge">{{ __('frontend.common.optional') ?? 'Optional' }}</span></h2>
                    </div>
                    <div class="gov-card-body">
                        <div class="gov-info-box">
                            <i class="fa-solid fa-circle-info"></i>
                            <span>{{ __('frontend.investor_ideas.documents_hint') }}</span>
                        </div>

                        <div class="gov-form-row">
                            <div class="gov-form-group">
                                <label for="business_plan_file" class="gov-label">{{ __('frontend.investor_ideas.business_plan') }}</label>
                                <input type="file" id="business_plan_file" name="business_plan_file" class="gov-file-input" accept=".pdf,.doc,.docx">
                                @error('business_plan_file')<span class="gov-error-message">{{ $message }}</span>@enderror
                            </div>
                            <div class="gov-form-group">
                                <label for="presentation_file" class="gov-label">{{ __('frontend.investor_ideas.presentation') }}</label>
                                <input type="file" id="presentation_file" name="presentation_file" class="gov-file-input" accept=".pdf,.ppt,.pptx">
                                @error('presentation_file')<span class="gov-error-message">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="gov-form-actions gov-animate-fade" data-delay="0.4">
                    <button type="submit" class="gov-btn gov-btn-primary" id="submitBtn">
                        <i class="fa-solid fa-paper-plane"></i>
                        <span class="gov-btn-text">{{ __('frontend.investor_ideas.submit_idea') }}</span>
                        <span class="gov-btn-loader">
                            <span class="gov-spinner"></span>
                            <span>{{ __('frontend.investor_ideas.submitting') }}</span>
                        </span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

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
        cards.forEach((card, index) => {
            const delay = parseFloat(card.dataset.delay) || index * 0.1;
            gsap.to(card, {
                opacity: 1,
                y: 0,
                duration: 0.6,
                delay: 0.3 + delay,
                ease: 'power2.out',
                scrollTrigger: {
                    trigger: card,
                    start: 'top 90%',
                    toggleActions: 'play none none none'
                }
            });
        });
    } else {
        // Fallback: remove animation classes
        document.querySelectorAll('.gov-animate-fade').forEach(el => {
            el.style.opacity = '1';
            el.style.transform = 'none';
        });
    }

    // Form submission with loading state
    const form = document.getElementById('investorForm');
    const submitBtn = document.getElementById('submitBtn');

    if (form && submitBtn) {
        form.addEventListener('submit', function(e) {
            submitBtn.classList.add('gov-btn-loading');
        });
    }

    // Character counter for description
    const description = document.getElementById('project_description');
    if (description) {
        const hint = description.nextElementSibling;
        description.addEventListener('input', function() {
            const count = this.value.length;
            if (count < 100) {
                hint.style.color = '#dc2626';
                hint.textContent = `${count}/100 {{ __('frontend.investor_ideas.project_description_hint') }}`;
            } else {
                hint.style.color = '#10b981';
                hint.textContent = `${count} ✓`;
            }
        });
    }
});
</script>
@endsection
