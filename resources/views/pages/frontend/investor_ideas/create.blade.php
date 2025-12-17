@extends('layouts.frontend_app')

@section('frontent_content')
<div class="investor-ideas-form-page">
    <!-- Hero Section -->
    <div class="form-hero">
        <div class="container">
            <div class="hero-content">
                <div class="section-badge">
                    <i class="fa-solid fa-building"></i>
                    <span>{{ __('Investment Opportunities') }}</span>
                </div>
                <h1 class="hero-title">{{ __('Submit Your Investment Proposal') }}</h1>
                <p class="hero-subtitle">{{ __('Share your investment ideas with Tashkent Invest Company. Our team will review your proposal and contact you within 5 business days.') }}</p>
            </div>
        </div>
    </div>

    <!-- Form Section -->
    <div class="form-section">
        <div class="container">
            @if(session('error'))
                <div class="alert alert-error">
                    <i class="fa-solid fa-circle-exclamation"></i>
                    <span>{{ session('error') }}</span>
                </div>
            @endif

            <form action="{{ route('frontend.investor_ideas.store') }}" method="POST" enctype="multipart/form-data" class="investor-form">
                @csrf

                <!-- Company Information Section -->
                <div class="form-block">
                    <div class="block-header">
                        <div class="block-number">01</div>
                        <h2 class="block-title">{{ __('Company Information') }}</h2>
                    </div>
                    <div class="block-content">
                        <div class="form-row">
                            <div class="form-group">
                                <label for="company_name" class="required">{{ __('Company Name') }}</label>
                                <input type="text" id="company_name" name="company_name" value="{{ old('company_name') }}" required>
                                @error('company_name')<span class="error-message">{{ $message }}</span>@enderror
                            </div>
                            <div class="form-group">
                                <label for="website">{{ __('Website') }}</label>
                                <input type="url" id="website" name="website" value="{{ old('website') }}" placeholder="https://example.com">
                                @error('website')<span class="error-message">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="contact_person" class="required">{{ __('Contact Person') }}</label>
                                <input type="text" id="contact_person" name="contact_person" value="{{ old('contact_person') }}" required>
                                @error('contact_person')<span class="error-message">{{ $message }}</span>@enderror
                            </div>
                            <div class="form-group">
                                <label for="position">{{ __('Position') }}</label>
                                <input type="text" id="position" name="position" value="{{ old('position') }}">
                                @error('position')<span class="error-message">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="email" class="required">{{ __('Email Address') }}</label>
                                <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                                @error('email')<span class="error-message">{{ $message }}</span>@enderror
                            </div>
                            <div class="form-group">
                                <label for="phone" class="required">{{ __('Phone Number') }}</label>
                                <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" required placeholder="+998 90 123 45 67">
                                @error('phone')<span class="error-message">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Project Information - Uzbek -->
                <div class="form-block">
                    <div class="block-header">
                        <div class="block-number">02</div>
                        <h2 class="block-title">{{ __('Project Information') }} (O'zbek tilida)</h2>
                    </div>
                    <div class="block-content">
                        <div class="form-group">
                            <label for="project_title_uz" class="required">{{ __('Project Title') }}</label>
                            <input type="text" id="project_title_uz" name="project_title_uz" value="{{ old('project_title_uz') }}" required>
                            @error('project_title_uz')<span class="error-message">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group">
                            <label for="project_description_uz" class="required">{{ __('Project Description') }} (min 100 characters)</label>
                            <textarea id="project_description_uz" name="project_description_uz" rows="6" required>{{ old('project_description_uz') }}</textarea>
                            @error('project_description_uz')<span class="error-message">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>

                <!-- Project Information - Russian -->
                <div class="form-block">
                    <div class="block-header">
                        <div class="block-number">03</div>
                        <h2 class="block-title">{{ __('Project Information') }} (На русском языке)</h2>
                    </div>
                    <div class="block-content">
                        <div class="form-group">
                            <label for="project_title_ru" class="required">{{ __('Project Title') }}</label>
                            <input type="text" id="project_title_ru" name="project_title_ru" value="{{ old('project_title_ru') }}" required>
                            @error('project_title_ru')<span class="error-message">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group">
                            <label for="project_description_ru" class="required">{{ __('Project Description') }} (min 100 characters)</label>
                            <textarea id="project_description_ru" name="project_description_ru" rows="6" required>{{ old('project_description_ru') }}</textarea>
                            @error('project_description_ru')<span class="error-message">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>

                <!-- Project Information - English (Optional) -->
                <div class="form-block">
                    <div class="block-header">
                        <div class="block-number">04</div>
                        <h2 class="block-title">{{ __('Project Information') }} (In English) <span class="optional-badge">Optional</span></h2>
                    </div>
                    <div class="block-content">
                        <div class="form-group">
                            <label for="project_title_en">{{ __('Project Title') }}</label>
                            <input type="text" id="project_title_en" name="project_title_en" value="{{ old('project_title_en') }}">
                            @error('project_title_en')<span class="error-message">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group">
                            <label for="project_description_en">{{ __('Project Description') }}</label>
                            <textarea id="project_description_en" name="project_description_en" rows="6">{{ old('project_description_en') }}</textarea>
                            @error('project_description_en')<span class="error-message">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>

                <!-- Investment Details -->
                <div class="form-block">
                    <div class="block-header">
                        <div class="block-number">05</div>
                        <h2 class="block-title">{{ __('Investment Details') }}</h2>
                    </div>
                    <div class="block-content">
                        <div class="form-row">
                            <div class="form-group">
                                <label for="estimated_investment">{{ __('Estimated Investment Amount') }}</label>
                                <input type="number" id="estimated_investment" name="estimated_investment" value="{{ old('estimated_investment') }}" step="0.01" min="0">
                                @error('estimated_investment')<span class="error-message">{{ $message }}</span>@enderror
                            </div>
                            <div class="form-group">
                                <label for="currency">{{ __('Currency') }}</label>
                                <select id="currency" name="currency">
                                    <option value="USD" {{ old('currency') == 'USD' ? 'selected' : '' }}>USD</option>
                                    <option value="EUR" {{ old('currency') == 'EUR' ? 'selected' : '' }}>EUR</option>
                                    <option value="UZS" {{ old('currency') == 'UZS' ? 'selected' : '' }}>UZS</option>
                                    <option value="RUB" {{ old('currency') == 'RUB' ? 'selected' : '' }}>RUB</option>
                                </select>
                                @error('currency')<span class="error-message">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="estimated_timeline_months">{{ __('Estimated Timeline (months)') }}</label>
                                <input type="number" id="estimated_timeline_months" name="estimated_timeline_months" value="{{ old('estimated_timeline_months') }}" min="1" max="240">
                                @error('estimated_timeline_months')<span class="error-message">{{ $message }}</span>@enderror
                            </div>
                            <div class="form-group">
                                <label for="industry_sector">{{ __('Industry Sector') }}</label>
                                <input type="text" id="industry_sector" name="industry_sector" value="{{ old('industry_sector') }}" placeholder="{{ __('e.g., Construction, IT, Manufacturing') }}">
                                @error('industry_sector')<span class="error-message">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="preferred_location">{{ __('Preferred Location') }}</label>
                            <input type="text" id="preferred_location" name="preferred_location" value="{{ old('preferred_location') }}">
                            @error('preferred_location')<span class="error-message">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>

                <!-- Documents Upload -->
                <div class="form-block">
                    <div class="block-header">
                        <div class="block-number">06</div>
                        <h2 class="block-title">{{ __('Supporting Documents') }} <span class="optional-badge">Optional</span></h2>
                    </div>
                    <div class="block-content">
                        <div class="file-upload-info">
                            <i class="fa-solid fa-circle-info"></i>
                            <span>{{ __('Maximum file size: 10MB. Supported formats: PDF, DOC, DOCX, PPT, PPTX, ZIP') }}</span>
                        </div>

                        <div class="form-group">
                            <label for="business_plan_file">{{ __('Business Plan') }}</label>
                            <input type="file" id="business_plan_file" name="business_plan_file" accept=".pdf,.doc,.docx">
                            @error('business_plan_file')<span class="error-message">{{ $message }}</span>@enderror
                        </div>

                        <div class="form-group">
                            <label for="presentation_file">{{ __('Presentation') }}</label>
                            <input type="file" id="presentation_file" name="presentation_file" accept=".pdf,.ppt,.pptx">
                            @error('presentation_file')<span class="error-message">{{ $message }}</span>@enderror
                        </div>

                        <div class="form-group">
                            <label for="other_documents">{{ __('Other Documents') }}</label>
                            <input type="file" id="other_documents" name="other_documents" accept=".pdf,.doc,.docx,.zip">
                            @error('other_documents')<span class="error-message">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="form-actions">
                    <button type="submit" class="btn-submit">
                        <i class="fa-solid fa-paper-plane"></i>
                        <span>{{ __('Submit Investment Proposal') }}</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
/* Government-Style Form Design */
.investor-ideas-form-page {
    background: #f8fafc;
    min-height: 100vh;
    padding-bottom: 60px;
}

.form-hero {
    background: linear-gradient(135deg, #1e3a8a 0%, #0f172a 100%);
    color: white;
    padding: 80px 0 60px;
    border-bottom: 6px solid #3b82f6;
    position: relative;
}

.form-hero::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: repeating-linear-gradient(
        45deg,
        transparent,
        transparent 10px,
        rgba(59, 130, 246, 0.03) 10px,
        rgba(59, 130, 246, 0.03) 20px
    );
}

.hero-content {
    position: relative;
    z-index: 1;
}

.section-badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: rgba(59, 130, 246, 0.2);
    border: 2px solid #3b82f6;
    padding: 8px 20px;
    font-size: 14px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 1px;
    margin-bottom: 20px;
}

.hero-title {
    font-family: 'Roboto Slab', serif;
    font-size: 48px;
    font-weight: 900;
    margin: 0 0 15px;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
}

.hero-subtitle {
    font-size: 18px;
    line-height: 1.6;
    opacity: 0.95;
    max-width: 800px;
}

.form-section {
    margin-top: -30px;
    position: relative;
    z-index: 2;
}

.investor-form {
    max-width: 900px;
    margin: 0 auto;
}

.form-block {
    background: white;
    border: 3px solid #e2e8f0;
    border-left: 8px solid #1e40af;
    margin-bottom: 30px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
}

.block-header {
    display: flex;
    align-items: center;
    gap: 20px;
    padding: 25px 30px;
    background: linear-gradient(135deg, #f1f5f9 0%, #e2e8f0 100%);
    border-bottom: 3px solid #cbd5e1;
}

.block-number {
    width: 50px;
    height: 50px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, #1e40af 0%, #0f172a 100%);
    color: white;
    font-size: 24px;
    font-weight: 900;
    font-family: 'Roboto Slab', serif;
    border: 3px solid #3b82f6;
}

.block-title {
    font-size: 22px;
    font-weight: 800;
    color: #1e293b;
    margin: 0;
    font-family: 'Roboto Slab', serif;
}

.optional-badge {
    font-size: 14px;
    font-weight: 600;
    color: #64748b;
    background: white;
    padding: 4px 12px;
    border: 2px solid #cbd5e1;
    margin-left: 10px;
}

.block-content {
    padding: 30px;
}

.form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
    margin-bottom: 20px;
}

.form-group {
    margin-bottom: 20px;
}

.form-group:last-child {
    margin-bottom: 0;
}

.form-group label {
    display: block;
    font-weight: 700;
    color: #1e293b;
    margin-bottom: 8px;
    font-size: 15px;
}

.form-group label.required::after {
    content: '*';
    color: #dc2626;
    margin-left: 4px;
}

.form-group input[type="text"],
.form-group input[type="email"],
.form-group input[type="tel"],
.form-group input[type="url"],
.form-group input[type="number"],
.form-group select,
.form-group textarea {
    width: 100%;
    padding: 12px 16px;
    border: 2px solid #cbd5e1;
    font-size: 15px;
    transition: all 0.2s;
    font-family: inherit;
}

.form-group input[type="text"]:focus,
.form-group input[type="email"]:focus,
.form-group input[type="tel"]:focus,
.form-group input[type="url"]:focus,
.form-group input[type="number"]:focus,
.form-group select:focus,
.form-group textarea:focus {
    outline: none;
    border-color: #3b82f6;
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
}

.form-group textarea {
    resize: vertical;
}

.form-group input[type="file"] {
    padding: 10px;
    border: 2px dashed #cbd5e1;
    width: 100%;
    cursor: pointer;
}

.form-group input[type="file"]:hover {
    border-color: #3b82f6;
    background: #f8fafc;
}

.file-upload-info {
    display: flex;
    align-items: center;
    gap: 10px;
    background: #eff6ff;
    border: 2px solid #3b82f6;
    padding: 12px 16px;
    margin-bottom: 20px;
    font-size: 14px;
    color: #1e40af;
}

.file-upload-info i {
    font-size: 18px;
}

.error-message {
    display: block;
    color: #dc2626;
    font-size: 13px;
    margin-top: 6px;
    font-weight: 600;
}

.alert {
    padding: 16px 20px;
    margin-bottom: 30px;
    border: 3px solid;
    display: flex;
    align-items: center;
    gap: 12px;
    font-weight: 600;
}

.alert-error {
    background: #fee2e2;
    border-color: #dc2626;
    color: #991b1b;
}

.alert i {
    font-size: 20px;
}

.form-actions {
    text-align: center;
    margin-top: 40px;
}

.btn-submit {
    background: linear-gradient(135deg, #1e40af 0%, #0f172a 100%);
    color: white;
    border: 3px solid #3b82f6;
    padding: 18px 50px;
    font-size: 18px;
    font-weight: 800;
    cursor: pointer;
    transition: all 0.3s;
    display: inline-flex;
    align-items: center;
    gap: 12px;
    font-family: 'Roboto Slab', serif;
    text-transform: uppercase;
    letter-spacing: 1px;
    box-shadow: 0 8px 20px rgba(30, 64, 175, 0.3);
}

.btn-submit:hover {
    transform: translateY(-2px);
    box-shadow: 0 12px 28px rgba(30, 64, 175, 0.4);
}

.btn-submit i {
    font-size: 20px;
}

@media (max-width: 768px) {
    .form-row {
        grid-template-columns: 1fr;
    }

    .hero-title {
        font-size: 32px;
    }

    .block-content {
        padding: 20px;
    }
}
</style>
@endsection
