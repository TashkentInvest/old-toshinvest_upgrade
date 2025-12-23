@extends('layouts.admin')

@section('title', 'Ariza #' . $application->id)

@section('content')
<div class="admin-page-header">
    <div class="page-header-content">
        <h1><i class="fas fa-file-alt"></i> Ariza #{{ $application->id }}</h1>
        <p>{{ $application->full_name }} - {{ $application->position }}</p>
    </div>
    <a href="{{ route('admin.vacancy-applications.index') }}" class="gov-btn gov-btn-secondary">
        <i class="fas fa-arrow-left"></i> Orqaga
    </a>
</div>

@if(session('success'))
<div class="admin-alert admin-alert-success">
    <i class="fas fa-check-circle"></i> {{ session('success') }}
</div>
@endif

<div class="detail-grid">
    {{-- Main Info --}}
    <div class="admin-card">
        <div class="admin-card-header">
            <h3 class="admin-card-title"><i class="fas fa-user"></i> Ariza beruvchi</h3>
            <span class="status-badge status-{{ $application->status_color }}">{{ $application->status_label }}</span>
        </div>
        <div class="admin-card-body">
            <div class="info-grid">
                <div class="info-item">
                    <label>To'liq ism</label>
                    <span>{{ $application->full_name }}</span>
                </div>
                <div class="info-item">
                    <label>Elektron pochta</label>
                    <a href="mailto:{{ $application->email }}">{{ $application->email }}</a>
                </div>
                <div class="info-item">
                    <label>Telefon</label>
                    <a href="tel:{{ $application->phone }}">{{ $application->phone }}</a>
                </div>
                <div class="info-item">
                    <label>Lavozim</label>
                    <span>{{ $application->position }}</span>
                </div>
                <div class="info-item">
                    <label>Ariza sanasi</label>
                    <span>{{ $application->created_at->format('d.m.Y H:i') }}</span>
                </div>
                <div class="info-item">
                    <label>IP manzil</label>
                    <span>{{ $application->ip_address ?? '-' }}</span>
                </div>
            </div>

            @if($application->message)
            <div class="message-box">
                <label>Qo'shimcha xabar</label>
                <p>{{ $application->message }}</p>
            </div>
            @endif

            @if($application->resume_path)
            <div class="resume-box">
                <label>Rezyume</label>
                <a href="{{ asset('storage/' . $application->resume_path) }}" target="_blank" class="resume-link">
                    <i class="fas fa-file-pdf"></i>
                    <span>Yuklab olish</span>
                </a>
            </div>
            @endif
        </div>
    </div>

    {{-- Status Update --}}
    <div class="admin-card">
        <div class="admin-card-header">
            <h3 class="admin-card-title"><i class="fas fa-edit"></i> Holatni o'zgartirish</h3>
        </div>
        <div class="admin-card-body">
            <form action="{{ route('admin.vacancy-applications.update-status', $application->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label class="form-label">Holat</label>
                    <select name="status" class="form-select">
                        <option value="new" {{ $application->status === 'new' ? 'selected' : '' }}>Yangi</option>
                        <option value="reviewed" {{ $application->status === 'reviewed' ? 'selected' : '' }}>Ko'rib chiqilgan</option>
                        <option value="accepted" {{ $application->status === 'accepted' ? 'selected' : '' }}>Qabul qilingan</option>
                        <option value="rejected" {{ $application->status === 'rejected' ? 'selected' : '' }}>Rad etilgan</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label">Admin izohi</label>
                    <textarea name="admin_notes" class="form-textarea" rows="4" placeholder="Izoh yozing...">{{ $application->admin_notes }}</textarea>
                </div>

                <button type="submit" class="gov-btn gov-btn-primary" style="width: 100%;">
                    <i class="fas fa-save"></i> Saqlash
                </button>
            </form>

            @if($application->reviewed_at)
            <div class="review-info">
                <small>
                    <i class="fas fa-clock"></i>
                    Ko'rib chiqilgan: {{ $application->reviewed_at->format('d.m.Y H:i') }}
                    @if($application->reviewer)
                    ({{ $application->reviewer->name }})
                    @endif
                </small>
            </div>
            @endif
        </div>
    </div>
</div>

<style>
    .detail-grid {
        display: grid;
        grid-template-columns: 1.5fr 1fr;
        gap: 24px;
    }
    .info-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }
    .info-item {
        display: flex;
        flex-direction: column;
        gap: 4px;
    }
    .info-item label {
        font-size: 12px;
        color: #718096;
        font-weight: 600;
        text-transform: uppercase;
    }
    .info-item span, .info-item a {
        font-size: 15px;
        color: var(--gov-text-dark);
    }
    .info-item a {
        color: var(--gov-primary);
        text-decoration: none;
    }
    .info-item a:hover {
        text-decoration: underline;
    }
    .message-box {
        margin-top: 24px;
        padding-top: 24px;
        border-top: 1px solid var(--gov-border);
    }
    .message-box label {
        font-size: 12px;
        color: #718096;
        font-weight: 600;
        text-transform: uppercase;
        display: block;
        margin-bottom: 8px;
    }
    .message-box p {
        background: #f7fafc;
        padding: 16px;
        border-radius: 8px;
        line-height: 1.6;
        color: var(--gov-text-dark);
        white-space: pre-wrap;
    }
    .resume-box {
        margin-top: 20px;
    }
    .resume-box label {
        font-size: 12px;
        color: #718096;
        font-weight: 600;
        text-transform: uppercase;
        display: block;
        margin-bottom: 8px;
    }
    .resume-link {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        padding: 12px 20px;
        background: var(--gov-primary);
        color: white;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.2s;
    }
    .resume-link:hover {
        background: #1e3a5f;
    }
    .form-group {
        margin-bottom: 20px;
    }
    .form-label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        color: var(--gov-text-dark);
    }
    .form-select, .form-textarea {
        width: 100%;
        padding: 12px 16px;
        border: 2px solid var(--gov-border);
        border-radius: 8px;
        font-size: 14px;
        font-family: inherit;
    }
    .form-select:focus, .form-textarea:focus {
        outline: none;
        border-color: var(--gov-primary);
    }
    .review-info {
        margin-top: 16px;
        padding-top: 16px;
        border-top: 1px solid var(--gov-border);
        color: #718096;
    }
    .status-badge {
        padding: 4px 12px;
        border-radius: 12px;
        font-size: 12px;
        font-weight: 600;
    }
    .status-warning { background: #fef3c7; color: #92400e; }
    .status-info { background: #dbeafe; color: #1e40af; }
    .status-success { background: #d1fae5; color: #065f46; }
    .status-danger { background: #fee2e2; color: #991b1b; }

    @media (max-width: 900px) {
        .detail-grid {
            grid-template-columns: 1fr;
        }
        .info-grid {
            grid-template-columns: 1fr;
        }
    }
</style>
@endsection
