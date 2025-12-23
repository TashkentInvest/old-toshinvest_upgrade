@extends('layouts.admin')

@section('title', 'Loyihani tahrirlash')

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
        font-size: 0.85rem;
        margin-top: 6px;
    }
    .existing-file {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 10px 14px;
        background: var(--gov-bg-light);
        border-radius: var(--gov-radius);
        margin-bottom: 10px;
    }
    .existing-file i {
        color: var(--gov-primary);
        font-size: 1.25rem;
    }
    .existing-file a {
        color: var(--gov-primary);
        text-decoration: none;
        font-weight: 500;
    }
    .existing-file a:hover {
        text-decoration: underline;
    }
    .delete-checkbox {
        display: flex;
        align-items: center;
        gap: 6px;
        margin-left: auto;
        font-size: 0.85rem;
        color: var(--gov-error);
    }
    .delete-checkbox input {
        width: 16px;
        height: 16px;
    }
    .geo-image-preview {
        width: 120px;
        height: 80px;
        object-fit: cover;
        border-radius: var(--gov-radius);
        border: 1px solid var(--gov-border);
        margin-top: 8px;
    }
</style>

<!-- Page Header -->
<div class="admin-page-header">
    <div class="page-header-content">
        <h1><i class="fas fa-edit"></i> Loyihani tahrirlash</h1>
        <p>{{ $project->district }} - {{ $project->mahalla }}</p>
    </div>
    <a href="{{ route('projects.index') }}" class="gov-btn gov-btn-secondary">
        <i class="fas fa-arrow-left"></i> Orqaga
    </a>
</div>

<form action="{{ route('projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
    @csrf

    <!-- Basic Info -->
    <div class="form-card">
        <div class="form-card-header">
            <i class="fas fa-info-circle"></i>
            <h3>Asosiy ma'lumotlar</h3>
        </div>
        <div class="form-card-body">
            <div class="form-row">
                <div class="gov-form-group">
                    <label class="gov-form-label">Unikal raqam</label>
                    <input type="text" name="unique_number" class="gov-form-control" value="{{ old('unique_number', $project->unique_number) }}" placeholder="masalan, YUN0001">
                </div>
                <div class="gov-form-group">
                    <label class="gov-form-label">Kategoriya</label>
                    <select name="category_id" class="gov-form-control">
                        <option value="">— Kategoriyani tanlang —</option>
                        @foreach ($categories ?? [] as $category)
                            <option value="{{ $category->id }}" {{ $project->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="gov-form-group">
                    <label class="gov-form-label">Tuman <span class="required">*</span></label>
                    <input type="text" name="district" class="gov-form-control" value="{{ old('district', $project->district) }}" required>
                </div>
                <div class="gov-form-group">
                    <label class="gov-form-label">Ko'cha</label>
                    <input type="text" name="street" class="gov-form-control" value="{{ old('street', $project->street) }}" placeholder="Ko'chani kiriting">
                </div>
            </div>

            <div class="form-row">
                <div class="gov-form-group">
                    <label class="gov-form-label">Mahalla</label>
                    <input type="text" name="mahalla" class="gov-form-control" value="{{ old('mahalla', $project->mahalla) }}" placeholder="Mahalla nomini kiriting">
                </div>
                <div class="gov-form-group">
                    <label class="gov-form-label">Yer maydoni (ga)</label>
                    <input type="number" step="0.01" name="land" class="gov-form-control" value="{{ old('land', $project->land) }}" placeholder="masalan, 0.12">
                </div>
            </div>
        </div>
    </div>

    <!-- Company Info -->
    <div class="form-card">
        <div class="form-card-header">
            <i class="fas fa-building"></i>
            <h3>Kompaniya ma'lumotlari</h3>
        </div>
        <div class="form-card-body">
            <div class="form-row">
                <div class="gov-form-group">
                    <label class="gov-form-label">Kompaniya nomi</label>
                    <input type="text" name="company_name" class="gov-form-control" value="{{ old('company_name', $project->company_name) }}" placeholder="Kompaniya nomini kiriting">
                </div>
                <div class="gov-form-group">
                    <label class="gov-form-label">Kontakt shaxs</label>
                    <input type="text" name="contact_person" class="gov-form-control" value="{{ old('contact_person', $project->contact_person) }}" placeholder="Kontakt shaxsni kiriting">
                </div>
            </div>
        </div>
    </div>

    <!-- Stages -->
    <div class="form-card">
        <div class="form-card-header">
            <i class="fas fa-tasks"></i>
            <h3>Bosqichlar</h3>
        </div>
        <div class="form-card-body">
            <div class="form-row">
                <div class="gov-form-group">
                    <label class="gov-form-label">1-Bosqich boshlanish sanasi</label>
                    <input type="date" name="start_date" class="gov-form-control" value="{{ old('start_date', optional($project->start_date)->format('Y-m-d')) }}">
                </div>
                <div class="gov-form-group">
                    <label class="gov-form-label">1-Bosqich tugash sanasi</label>
                    <input type="date" name="end_date" class="gov-form-control" value="{{ old('end_date', optional($project->end_date)->format('Y-m-d')) }}">
                </div>
            </div>

            <div class="form-row">
                <div class="gov-form-group">
                    <label class="gov-form-label">2-Bosqich boshlanish sanasi</label>
                    <input type="date" name="second_stage_start_date" class="gov-form-control" value="{{ old('second_stage_start_date', optional($project->second_stage_start_date)->format('Y-m-d')) }}">
                </div>
                <div class="gov-form-group">
                    <label class="gov-form-label">2-Bosqich tugash sanasi</label>
                    <input type="date" name="second_stage_end_date" class="gov-form-control" value="{{ old('second_stage_end_date', optional($project->second_stage_end_date)->format('Y-m-d')) }}">
                </div>
            </div>
        </div>
    </div>

    <!-- Files -->
    <div class="form-card">
        <div class="form-card-header">
            <i class="fas fa-paperclip"></i>
            <h3>Fayllar</h3>
        </div>
        <div class="form-card-body">
            <div class="form-row">
                <!-- Elon fayl -->
                <div class="gov-form-group">
                    <label class="gov-form-label">E'lon fayli</label>
                    @if ($project->elon_fayl)
                        <div class="existing-file">
                            <i class="fas fa-file-pdf"></i>
                            <a href="{{ asset('storage/' . $project->elon_fayl) }}" target="_blank">Faylni ko'rish</a>
                            <label class="delete-checkbox">
                                <input type="checkbox" name="delete_elon_fayl" value="1">
                                O'chirish
                            </label>
                        </div>
                    @endif
                    <input type="file" name="elon_fayl" class="gov-form-control">
                </div>

                <!-- Protokol fayl -->
                <div class="gov-form-group">
                    <label class="gov-form-label">Bayonnoma fayli</label>
                    @if ($project->pratakol_fayl)
                        <div class="existing-file">
                            <i class="fas fa-file-pdf"></i>
                            <a href="{{ asset('storage/' . $project->pratakol_fayl) }}" target="_blank">Faylni ko'rish</a>
                            <label class="delete-checkbox">
                                <input type="checkbox" name="delete_pratakol_fayl" value="1">
                                O'chirish
                            </label>
                        </div>
                    @endif
                    <input type="file" name="pratakol_fayl" class="gov-form-control">
                </div>

                <!-- Qoshimcha fayl -->
                <div class="gov-form-group">
                    <label class="gov-form-label">Qo'shimcha fayl</label>
                    @if ($project->qoshimcha_fayl)
                        <div class="existing-file">
                            <i class="fas fa-file-pdf"></i>
                            <a href="{{ asset('storage/' . $project->qoshimcha_fayl) }}" target="_blank">Faylni ko'rish</a>
                            <label class="delete-checkbox">
                                <input type="checkbox" name="delete_qoshimcha_fayl" value="1">
                                O'chirish
                            </label>
                        </div>
                    @endif
                    <input type="file" name="qoshimcha_fayl" class="gov-form-control">
                </div>
            </div>

            <!-- Geo Image -->
            <div class="gov-form-group" style="margin-top: 16px;">
                <label class="gov-form-label">Geo rasm</label>
                @if ($project->geo_image)
                    <div>
                        <img src="{{ asset('storage/' . $project->geo_image) }}" alt="Geo rasm" class="geo-image-preview">
                    </div>
                @endif
                <input type="file" name="geo_image" class="gov-form-control" style="margin-top: 8px;">
            </div>
        </div>
    </div>

    <!-- Location & Status -->
    <div class="form-card">
        <div class="form-card-header">
            <i class="fas fa-map-marker-alt"></i>
            <h3>Joylashuv va holat</h3>
        </div>
        <div class="form-card-body">
            <div class="form-row">
                <div class="gov-form-group">
                    <label class="gov-form-label">Holat <span class="required">*</span></label>
                    <select name="status" class="gov-form-control" required>
                        <option value="1_step" {{ $project->status == '1_step' ? 'selected' : '' }}>1-Bosqich</option>
                        <option value="2_step" {{ $project->status == '2_step' ? 'selected' : '' }}>2-Bosqich</option>
                        <option value="archive" {{ $project->status == 'archive' ? 'selected' : '' }}>Arxiv</option>
                        <option value="completed" {{ $project->status == 'completed' ? 'selected' : '' }}>Yakunlangan</option>
                    </select>
                </div>
                <div class="gov-form-group">
                    <label class="gov-form-label">Geolokatsiya</label>
                    <input type="text" name="geolocation" class="gov-form-control" value="{{ old('geolocation', $project->geolocation) }}" placeholder="Geolokatsiya">
                </div>
            </div>

            <div class="gov-form-group">
                <label class="gov-form-label">Izoh</label>
                <textarea name="comment" class="gov-form-control" rows="3" placeholder="Izohni kiriting">{{ old('comment', $project->comment) }}</textarea>
            </div>
        </div>
        <div class="form-actions">
            <a href="{{ route('projects.index') }}" class="gov-btn gov-btn-secondary">
                <i class="fas fa-times"></i> Bekor qilish
            </a>
            <button type="submit" class="gov-btn gov-btn-primary">
                <i class="fas fa-save"></i> Saqlash
            </button>
        </div>
    </div>
</form>
@endsection
