@extends('layouts.frontend_app')
@section('title', __('frontend.nav.vacancies') . ' | ' . __('frontend.seo.site_name'))

@section('frontent_content')
<style>

    .section-box {
        background: white;
        border-radius: 12px;
        box-shadow: 0 2px 12px rgba(0,0,0,0.08);
        margin-bottom: 24px;
        overflow: hidden;
    }
    .section-header {
        background: var(--gov-primary);
        padding: 16px 24px;
        display: flex;
        align-items: center;
        gap: 12px;
    }
    .section-header i {
        color: white;
        font-size: 18px;
    }
    .section-header h3 {
        color: white;
        font-size: 16px;
        font-weight: 600;
        margin: 0;
    }
    .section-body {
        padding: 24px;
    }
    /* HH Section */
    .hh-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 16px;
        flex-wrap: wrap;
    }
    .hh-features {
        display: flex;
        gap: 16px;
        flex-wrap: wrap;
    }
    .hh-feature {
        display: flex;
        align-items: center;
        gap: 6px;
        font-size: 13px;
        color: #059669;
    }
    .hh-btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 10px 20px;
        background: #dc2626;
        color: white;
        text-decoration: none;
        border-radius: 6px;
        font-weight: 600;
        font-size: 14px;
    }
    .hh-btn:hover {
        background: #b91c1c;
        color: white;
    }
    /* Form */
    .form-row {
        display: flex;
        gap: 12px;
        margin-bottom: 16px;
    }
    .form-row .form-group {
        flex: 1;
        margin-bottom: 0;
    }
    .form-group {
        margin-bottom: 16px;
    }
    .form-label {
        display: block;
        margin-bottom: 6px;
        font-size: 13px;
        font-weight: 600;
        color: #374151;
    }
    .form-label.req::after {
        content: '*';
        color: #dc2626;
        margin-left: 3px;
    }
    .form-input {
        width: 100%;
        padding: 10px 14px;
        border: 1px solid #d1d5db;
        border-radius: 6px;
        font-size: 14px;
        box-sizing: border-box;
    }
    .form-input:focus {
        outline: none;
        border-color: var(--gov-primary);
        box-shadow: 0 0 0 2px rgba(45,74,111,0.1);
    }
    textarea.form-input {
        resize: vertical;
        min-height: 80px;
    }
    .file-box {
        border: 1px dashed #d1d5db;
        border-radius: 6px;
        padding: 16px;
        text-align: center;
        position: relative;
        cursor: pointer;
    }
    .file-box:hover {
        border-color: var(--gov-primary);
        background: #f8fafc;
    }
    .file-box input {
        position: absolute;
        inset: 0;
        opacity: 0;
        cursor: pointer;
    }
    .file-box i {
        font-size: 20px;
        color: var(--gov-primary);
        margin-bottom: 6px;
    }
    .file-box span {
        display: block;
        font-size: 13px;
        color: #6b7280;
    }
    .file-hint {
        font-size: 11px;
        color: #9ca3af;
        margin-top: 6px;
    }
    .submit-btn {
        width: 100%;
        padding: 12px;
        background: var(--gov-primary);
        color: white;
        border: none;
        border-radius: 6px;
        font-size: 15px;
        font-weight: 600;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }
    .submit-btn:hover {
        background: #1e3a5f;
    }
    .alert {
        padding: 12px 16px;
        border-radius: 6px;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 14px;
    }
    .alert-success {
        background: #d1fae5;
        color: #065f46;
    }
    .alert-error {
        background: #fee2e2;
        color: #991b1b;
    }
    .error-msg {
        color: #dc2626;
        font-size: 12px;
        margin-top: 4px;
    }
    @media (max-width: 500px) {
        .form-row {
            flex-direction: column;
        }
        .hh-row {
            flex-direction: column;
            align-items: flex-start;
        }
    }
</style>

<div class="gov-page">
    <x-frontend.hero
        :title="__('frontend.nav.vacancies')"
        :subtitle="str_replace(':company', __('frontend.company.name'), __('frontend.nav.join_us'))"
        :badge="__('frontend.nav.career')"
        badgeIcon="fa-briefcase"
        :breadcrumbs="[
            ['url' => route('frontend.index'), 'label' => __('frontend.breadcrumb.home')],
            ['url' => '#', 'label' => __('frontend.nav.vacancies')]
        ]"
    />

    <x-frontend.section bg="light">
        <div class="vacancies-container">

            @if(session('success'))
            <div class="alert alert-success">
                <i class="fa-solid fa-check-circle"></i> {{ session('success') }}
            </div>
            @endif

            @if(session('error'))
            <div class="alert alert-error">
                <i class="fa-solid fa-exclamation-circle"></i> {{ session('error') }}
            </div>
            @endif

            {{-- HH.uz --}}
            <div class="section-box">
                <div class="section-header">
                    <i class="fa-solid fa-briefcase"></i>
                    <h3>{{ __('frontend.nav.open_vacancies_hh') }}</h3>
                </div>
                <div class="section-body">
                    <div class="hh-row">
                        <div class="hh-features">
                            <span class="hh-feature"><i class="fa-solid fa-check"></i> {{ __('frontend.nav.detailed_descriptions') }}</span>
                            <span class="hh-feature"><i class="fa-solid fa-check"></i> {{ __('frontend.nav.fast_feedback') }}</span>
                        </div>
                        <a style="color: #fff" href="https://hh.uz/employer/10152694" target="_blank" class="hh-btn">
                            <i class="fa-solid fa-external-link-alt"></i> {{ __('frontend.nav.go_to_hh') }}
                        </a>
                    </div>
                </div>
            </div>

            {{-- Application Form --}}
            <div class="section-box">
                <div class="section-header">
                    <i class="fa-solid fa-paper-plane"></i>
                    <h3>{{ __('frontend.vacancies.direct_application') }}</h3>
                </div>
                <div class="section-body">
                    <form action="{{ route('frontend.vacancies.apply') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label class="form-label req">{{ __('frontend.vacancies.full_name') }}</label>
                            <input type="text" name="full_name" class="form-input" value="{{ old('full_name') }}"
                                   placeholder="{{ __('frontend.vacancies.full_name_placeholder') }}" required>
                            @error('full_name')<span class="error-msg">{{ $message }}</span>@enderror
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label req">{{ __('frontend.vacancies.email') }}</label>
                                <input type="email" name="email" class="form-input" value="{{ old('email') }}"
                                       placeholder="{{ __('frontend.vacancies.email_placeholder') }}" required>
                                @error('email')<span class="error-msg">{{ $message }}</span>@enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label req">{{ __('frontend.vacancies.phone') }}</label>
                                <input type="tel" name="phone" class="form-input" value="{{ old('phone') }}"
                                       placeholder="+998 90 123 45 67" required>
                                @error('phone')<span class="error-msg">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label req">{{ __('frontend.vacancies.position') }}</label>
                            <input type="text" name="position" class="form-input" value="{{ old('position') }}"
                                   placeholder="{{ __('frontend.vacancies.position_placeholder') }}" required>
                            @error('position')<span class="error-msg">{{ $message }}</span>@enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label">{{ __('frontend.vacancies.message') }}</label>
                            <textarea name="message" class="form-input" placeholder="{{ __('frontend.vacancies.message_placeholder') }}">{{ old('message') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label class="form-label">{{ __('frontend.vacancies.resume') }}</label>
                            <div class="file-box">
                                <input type="file" name="resume" accept=".pdf,.doc,.docx" id="resume-file">
                                <i class="fa-solid fa-cloud-arrow-up"></i>
                                <span id="file-name">{{ __('frontend.vacancies.choose_file') }}</span>
                            </div>
                            <div class="file-hint">{{ __('frontend.vacancies.file_hint') }}</div>
                            @error('resume')<span class="error-msg">{{ $message }}</span>@enderror
                        </div>

                        <button type="submit" class="submit-btn">
                            <i class="fa-solid fa-paper-plane"></i>
                            {{ __('frontend.vacancies.submit_application') }}
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </x-frontend.section>
</div>

<script>
document.getElementById('resume-file')?.addEventListener('change', function() {
    document.getElementById('file-name').textContent = this.files.length ? this.files[0].name : '{{ __("frontend.vacancies.choose_file") }}';
});
</script>
@endsection
