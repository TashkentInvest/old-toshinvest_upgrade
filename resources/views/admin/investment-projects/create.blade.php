@extends('layouts.admin')

@section('title', 'Yangi investitsiya loyihasi yaratish')

@section('content')
<style>
    .form-card {
        background: white;
        border-radius: var(--gov-radius);
        box-shadow: var(--gov-shadow);
        overflow: hidden;
        margin-bottom: 24px;
    }
    .form-card-header {
        padding: 20px 24px;
        border-bottom: 1px solid var(--gov-border);
        background: var(--gov-bg-light);
        display: flex;
        align-items: center;
        gap: 12px;
    }
    .form-card-header i {
        color: var(--gov-primary);
        font-size: 1.25rem;
    }
    .form-card-header h3 {
        margin: 0;
        font-size: 1.1rem;
        color: var(--gov-primary-darker);
    }
    .form-card-body {
        padding: 24px;
    }
    .form-row {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 20px;
        margin-bottom: 20px;
    }
    .form-row:last-child {
        margin-bottom: 0;
    }
    .lang-tabs {
        display: flex;
        border-bottom: 2px solid var(--gov-border);
        margin-bottom: 20px;
    }
    .lang-tab {
        padding: 12px 24px;
        cursor: pointer;
        border-bottom: 2px solid transparent;
        margin-bottom: -2px;
        color: var(--gov-text-muted);
        transition: all 0.2s ease;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    .lang-tab:hover {
        color: var(--gov-primary);
    }
    .lang-tab.active {
        border-bottom-color: var(--gov-primary);
        color: var(--gov-primary);
        font-weight: 600;
    }
    .lang-tab img {
        width: 20px;
        height: 14px;
        border-radius: 2px;
    }
    .lang-content {
        display: none;
    }
    .lang-content.active {
        display: block;
    }
    .checkbox-wrapper {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 12px 16px;
        background: var(--gov-bg-light);
        border-radius: var(--gov-radius);
        cursor: pointer;
    }
    .checkbox-wrapper input[type="checkbox"] {
        width: 20px;
        height: 20px;
        cursor: pointer;
    }
    .checkbox-wrapper label {
        margin: 0;
        cursor: pointer;
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    .form-actions {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 20px 24px;
        background: var(--gov-bg-light);
        border-top: 1px solid var(--gov-border);
    }
    .file-upload-info {
        color: var(--gov-text-muted);
        font-size: 0.875rem;
        margin-top: 8px;
    }
    .extension-section {
        background: var(--gov-bg-light);
        padding: 16px;
        border-radius: var(--gov-radius);
        margin-top: 16px;
        display: none;
    }
    .extension-section.active {
        display: block;
    }
</style>

<!-- Page Header -->
<div class="admin-page-header">
    <div class="page-header-content">
        <h1><i class="fas fa-plus-circle"></i> Yangi investitsiya loyihasi yaratish</h1>
        <p>Investitsiya loyihasi ma'lumotlarini to'ldiring</p>
    </div>
    <a href="{{ route('admin.investment-projects.index') }}" class="gov-btn gov-btn-secondary">
        <i class="fas fa-arrow-left"></i> Orqaga
    </a>
</div>

<form method="POST" action="{{ route('admin.investment-projects.store') }}" enctype="multipart/form-data">
    @csrf

    <!-- Basic Information -->
    <div class="form-card">
        <div class="form-card-header">
            <i class="fas fa-file-alt"></i>
            <h3>Asosiy ma'lumotlar</h3>
        </div>
        <div class="form-card-body">
            <div class="form-row">
                <div class="gov-form-group">
                    <label class="gov-form-label">Loyiha kodi <span class="required">*</span></label>
                    <input type="text" name="project_code" class="gov-form-control" value="{{ old('project_code') }}" required placeholder="IP-2026-001">
                    @error('project_code')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="gov-form-group">
                    <label class="gov-form-label">Yer maydoni (ga) <span class="required">*</span></label>
                    <input type="number" step="0.0001" name="land_area" class="gov-form-control" value="{{ old('land_area') }}" required placeholder="1.5000">
                    @error('land_area')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
    </div>

    <!-- Location -->
    <div class="form-card">
        <div class="form-card-header">
            <i class="fas fa-map-marker-alt"></i>
            <h3>Joylashuv</h3>
        </div>
        <div class="form-card-body">
            <div class="gov-form-group">
                <label class="gov-form-label">Tuman <span class="required">*</span></label>
                <select name="district_id" id="districtSelect" class="gov-form-control" required onchange="updateDistrictFields()">
                    <option value="">Tumanni tanlang</option>
                    @php
                        $districts = \App\Models\Districts::orderBy('name_uz')->get();
                    @endphp
                    @foreach($districts as $district)
                        <option value="{{ $district->id }}"
                                data-name-uz="{{ $district->name_uz }}"
                                data-name-ru="{{ $district->name_ru }}"
                                data-name-en="{{ $district->name_uz }}"
                                {{ old('district_id') == $district->id ? 'selected' : '' }}>
                            {{ $district->name_uz }} / {{ $district->name_ru }}
                        </option>
                    @endforeach
                </select>
                @error('district_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- Hidden fields to store district names -->
            <input type="hidden" name="district_uz" id="district_uz" value="{{ old('district_uz') }}">
            <input type="hidden" name="district_ru" id="district_ru" value="{{ old('district_ru') }}">
            <input type="hidden" name="district_en" id="district_en" value="{{ old('district_en') }}">

            <div class="form-row">
                <div class="gov-form-group">
                    <label class="gov-form-label">Mahalla (O'zbekcha)</label>
                    <input type="text" name="mahalla_uz" class="gov-form-control" value="{{ old('mahalla_uz') }}" placeholder="Mirobod mahallasi">
                </div>
                <div class="gov-form-group">
                    <label class="gov-form-label">Махалля (Русский)</label>
                    <input type="text" name="mahalla_ru" class="gov-form-control" value="{{ old('mahalla_ru') }}" placeholder="Махалля Миробод">
                </div>
            </div>
            <div class="gov-form-group">
                <label class="gov-form-label">Mahalla (English)</label>
                <input type="text" name="mahalla_en" class="gov-form-control" value="{{ old('mahalla_en') }}" placeholder="Mirobod mahalla">
            </div>
        </div>
    </div>

    <!-- Dates and Status -->
    <div class="form-card">
        <div class="form-card-header">
            <i class="fas fa-calendar-alt"></i>
            <h3>Sanalar va holat</h3>
        </div>
        <div class="form-card-body">
            <div class="form-row">
                <div class="gov-form-group">
                    <label class="gov-form-label">E'lon qilingan sana <span class="required">*</span></label>
                    <input type="date" name="announcement_date" class="gov-form-control" value="{{ old('announcement_date', date('Y-m-d')) }}" required>
                    @error('announcement_date')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="gov-form-group">
                    <label class="gov-form-label">Arizalar qabul qilish muddati <span class="required">*</span></label>
                    <input type="datetime-local" name="submission_deadline" class="gov-form-control" value="{{ old('submission_deadline') }}" required>
                    @error('submission_deadline')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="gov-form-group">
                    <label class="gov-form-label">Holat <span class="required">*</span></label>
                    <select name="status" class="gov-form-control" required>
                        <option value="active" {{ old('status', 'active') == 'active' ? 'selected' : '' }}>Faol</option>
                        <option value="archive" {{ old('status') == 'archive' ? 'selected' : '' }}>Arxiv</option>
                        <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>Yakunlangan</option>
                    </select>
                </div>
                <div class="gov-form-group">
                    <label class="gov-form-label">Tartib raqami</label>
                    <input type="number" name="order" class="gov-form-control" value="{{ old('order', 0) }}" min="0">
                </div>
            </div>

            <div class="gov-form-group">
                <div class="checkbox-wrapper">
                    <input type="checkbox" name="is_featured" id="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }}>
                    <label for="is_featured">
                        <i class="fas fa-star" style="color: var(--gov-warning);"></i>
                        Muhim loyiha
                    </label>
                </div>
            </div>

            <!-- Extension Section Toggle -->
            <div class="gov-form-group">
                <div class="checkbox-wrapper">
                    <input type="checkbox" name="has_extension" id="has_extension" value="1" {{ old('has_extension') ? 'checked' : '' }} onchange="toggleExtension()">
                    <label for="has_extension">
                        <i class="fas fa-clock" style="color: var(--gov-primary);"></i>
                        Muddatni uzaytirish
                    </label>
                </div>
            </div>

            <!-- Extension Details -->
            <div class="extension-section" id="extensionSection">
                <div class="gov-form-group">
                    <label class="gov-form-label">Yangi muddat</label>
                    <input type="datetime-local" name="extended_deadline" class="gov-form-control" value="{{ old('extended_deadline') }}">
                </div>

                <div class="lang-tabs">
                    <div class="lang-tab active" onclick="switchExtLang('uz', this)">O'zbekcha</div>
                    <div class="lang-tab" onclick="switchExtLang('ru', this)">Русский</div>
                    <div class="lang-tab" onclick="switchExtLang('en', this)">English</div>
                </div>

                <div id="ext-lang-uz" class="lang-content active">
                    <div class="gov-form-group">
                        <label class="gov-form-label">Uzaytirish sababi (O'zbekcha)</label>
                        <textarea name="extension_note_uz" class="gov-form-control" rows="2" placeholder="Muddat uzaytirilish sababini kiriting...">{{ old('extension_note_uz') }}</textarea>
                    </div>
                </div>

                <div id="ext-lang-ru" class="lang-content">
                    <div class="gov-form-group">
                        <label class="gov-form-label">Причина продления (Русский)</label>
                        <textarea name="extension_note_ru" class="gov-form-control" rows="2" placeholder="Укажите причину продления срока...">{{ old('extension_note_ru') }}</textarea>
                    </div>
                </div>

                <div id="ext-lang-en" class="lang-content">
                    <div class="gov-form-group">
                        <label class="gov-form-label">Extension Reason (English)</label>
                        <textarea name="extension_note_en" class="gov-form-control" rows="2" placeholder="Enter the reason for extension...">{{ old('extension_note_en') }}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Documents -->
    <div class="form-card">
        <div class="form-card-header">
            <i class="fas fa-paperclip"></i>
            <h3>Hujjatlar</h3>
        </div>
        <div class="form-card-body">
            <div class="gov-form-group">
                <label class="gov-form-label">E'lon PDF fayli</label>
                <input type="file" name="announcement_pdf" class="gov-form-control" accept=".pdf">
                <div class="file-upload-info">
                    <i class="fas fa-info-circle"></i>
                    E'lon hujjatini PDF formatida yuklang (maksimal 10 MB)
                </div>
            </div>
            <div class="gov-form-group">
                <label class="gov-form-label">Qo'shimcha hujjatlar (ZIP)</label>
                <input type="file" name="attachments_zip" class="gov-form-control" accept=".zip">
                <div class="file-upload-info">
                    <i class="fas fa-info-circle"></i>
                    Barcha qo'shimcha hujjatlarni ZIP arxivida yuklang (maksimal 50 MB)
                </div>
            </div>
        </div>
        <div class="form-actions">
            <a href="{{ route('admin.investment-projects.index') }}" class="gov-btn gov-btn-secondary">
                <i class="fas fa-times"></i> Bekor qilish
            </a>
            <button type="submit" class="gov-btn gov-btn-primary">
                <i class="fas fa-save"></i> Saqlash
            </button>
        </div>
    </div>
</form>
@endsection

@section('scripts')
<script>
    function switchLang(lang, el) {
        // Hide all content in main tabs
        document.querySelectorAll('.lang-content').forEach(c => {
            if (!c.id.startsWith('ext-')) c.classList.remove('active');
        });
        document.querySelectorAll('.lang-tab').forEach(t => {
            if (!t.onclick.toString().includes('Ext')) t.classList.remove('active');
        });

        // Show selected
        document.getElementById('lang-' + lang).classList.add('active');
        el.classList.add('active');
    }

    function switchExtLang(lang, el) {
        // Hide all extension content
        document.querySelectorAll('[id^="ext-lang-"]').forEach(c => c.classList.remove('active'));
        el.parentElement.querySelectorAll('.lang-tab').forEach(t => t.classList.remove('active'));

        // Show selected
        document.getElementById('ext-lang-' + lang).classList.add('active');
        el.classList.add('active');
    }

    function toggleExtension() {
        const section = document.getElementById('extensionSection');
        const checkbox = document.getElementById('has_extension');

        if (checkbox.checked) {
            section.classList.add('active');
        } else {
            section.classList.remove('active');
        }
    }

    function updateDistrictFields() {
        const select = document.getElementById('districtSelect');
        const selectedOption = select.options[select.selectedIndex];

        if (selectedOption.value) {
            document.getElementById('district_uz').value = selectedOption.getAttribute('data-name-uz');
            document.getElementById('district_ru').value = selectedOption.getAttribute('data-name-ru');
            document.getElementById('district_en').value = selectedOption.getAttribute('data-name-en');
        } else {
            document.getElementById('district_uz').value = '';
            document.getElementById('district_ru').value = '';
            document.getElementById('district_en').value = '';
        }
    }

    // Initialize extension section visibility on page load
    document.addEventListener('DOMContentLoaded', function() {
        toggleExtension();
        // Set initial district values if district is selected
        updateDistrictFields();
    });
</script>
@endsection
