@extends('layouts.admin')

@section('title', 'Tender #' . $tender->id)

@section('content')
<style>
    .detail-card {
        background: white;
        border-radius: var(--gov-radius);
        box-shadow: var(--gov-shadow);
        overflow: hidden;
        margin-bottom: 24px;
    }
    .detail-card-header {
        padding: 20px 24px;
        border-bottom: 1px solid var(--gov-border);
        background: var(--gov-bg-light);
        display: flex;
        align-items: center;
        gap: 12px;
    }
    .detail-card-header i {
        color: var(--gov-primary);
        font-size: 1.25rem;
    }
    .detail-card-header h3 {
        margin: 0;
        font-size: 1.1rem;
        color: var(--gov-primary-darker);
    }
    .detail-card-body {
        padding: 24px;
    }
    .info-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 16px;
    }
    .info-item {
        padding: 16px;
        background: var(--gov-bg-light);
        border-radius: var(--gov-radius);
    }
    .info-label {
        font-size: 0.75rem;
        color: var(--gov-text-muted);
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 6px;
    }
    .info-value {
        font-weight: 600;
        color: var(--gov-text);
        font-size: 1rem;
    }
    .info-value a {
        color: var(--gov-primary);
        text-decoration: none;
    }
    .info-value a:hover {
        text-decoration: underline;
    }
    .status-badge {
        padding: 6px 14px;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }
    .status-active {
        background: rgba(39, 174, 96, 0.15);
        color: var(--gov-success);
    }
    .status-draft {
        background: rgba(241, 196, 15, 0.15);
        color: #f39c12;
    }
    .status-closed {
        background: rgba(108, 117, 125, 0.15);
        color: #6c757d;
    }
    .status-cancelled {
        background: rgba(231, 76, 60, 0.15);
        color: var(--gov-error);
    }
    .urgent-badge {
        background: var(--gov-error);
        color: white;
        padding: 6px 14px;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }
    .requirement-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    .requirement-list li {
        padding: 12px 16px;
        border-bottom: 1px solid var(--gov-border);
        display: flex;
        align-items: flex-start;
        gap: 12px;
    }
    .requirement-list li:last-child {
        border-bottom: none;
    }
    .requirement-list li i {
        color: var(--gov-success);
        margin-top: 3px;
    }
    .document-list {
        display: flex;
        flex-direction: column;
        gap: 12px;
    }
    .document-item {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 14px 16px;
        background: var(--gov-bg-light);
        border-radius: var(--gov-radius);
    }
    .document-item i {
        color: var(--gov-primary);
        font-size: 1.5rem;
    }
    .document-item a {
        color: var(--gov-primary);
        text-decoration: none;
        font-weight: 500;
    }
    .document-item a:hover {
        text-decoration: underline;
    }
    .document-item .doc-size {
        color: var(--gov-text-muted);
        font-size: 0.875rem;
        margin-left: auto;
    }
    .detail-actions {
        display: flex;
        gap: 12px;
        flex-wrap: wrap;
        padding: 20px 24px;
        background: var(--gov-bg-light);
        border-top: 1px solid var(--gov-border);
    }
    .meta-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
        gap: 16px;
    }
    .deadline-expired {
        color: var(--gov-error);
    }
    .deadline-active {
        color: var(--gov-success);
    }
    .tender-title {
        font-size: 1.5rem;
        color: var(--gov-primary-darker);
        margin-bottom: 16px;
        line-height: 1.4;
    }
    .tender-subject {
        color: var(--gov-text);
        line-height: 1.6;
        padding: 16px;
        background: var(--gov-bg-light);
        border-radius: var(--gov-radius);
        border-left: 4px solid var(--gov-primary);
    }
</style>

<!-- Page Header -->
<div class="admin-page-header">
    <div class="page-header-content">
        <h1><i class="fas fa-file-contract"></i> Tender #{{ $tender->id }}</h1>
        <div style="display: flex; gap: 10px; margin-top: 8px; flex-wrap: wrap;">
            <span class="status-badge status-{{ $tender->status }}">
                @if($tender->status == 'active')
                    <i class="fas fa-check-circle"></i> Faol
                @elseif($tender->status == 'draft')
                    <i class="fas fa-pencil-alt"></i> Qoralama
                @elseif($tender->status == 'closed')
                    <i class="fas fa-lock"></i> Yopiq
                @else
                    <i class="fas fa-ban"></i> Bekor qilingan
                @endif
            </span>
            @if($tender->is_urgent)
                <span class="urgent-badge">
                    <i class="fas fa-exclamation-circle"></i> SHOSHILINCH
                </span>
            @endif
        </div>
    </div>
    <a href="{{ route('admin.tenders.index') }}" class="gov-btn gov-btn-secondary">
        <i class="fas fa-arrow-left"></i> Orqaga
    </a>
</div>

<!-- Basic Info -->
<div class="detail-card">
    <div class="detail-card-header">
        <i class="fas fa-info-circle"></i>
        <h3>Asosiy ma'lumotlar</h3>
    </div>
    <div class="detail-card-body">
        <h2 class="tender-title">{{ $tender->title }}</h2>

        <div class="info-grid" style="margin-bottom: 20px;">
            <div class="info-item">
                <div class="info-label">ID</div>
                <div class="info-value">#{{ $tender->id }}</div>
            </div>
            <div class="info-item">
                <div class="info-label">Kod</div>
                <div class="info-value">{{ $tender->code ?? '-' }}</div>
            </div>
            <div class="info-item">
                <div class="info-label">Lot raqami</div>
                <div class="info-value">{{ $tender->lot_number ?? '-' }}</div>
            </div>
            <div class="info-item">
                <div class="info-label">Lot URL</div>
                <div class="info-value">
                    @if($tender->lot_url)
                        <a href="{{ $tender->lot_url }}" target="_blank">
                            <i class="fas fa-external-link-alt"></i> Ochish
                        </a>
                    @else
                        -
                    @endif
                </div>
            </div>
        </div>

        <div class="gov-form-group">
            <label class="gov-form-label">Xarid mavzusi</label>
            <div class="tender-subject">{{ $tender->subject }}</div>
        </div>
    </div>
</div>

<!-- Location -->
<div class="detail-card">
    <div class="detail-card-header">
        <i class="fas fa-map-marker-alt"></i>
        <h3>Joylashuv</h3>
    </div>
    <div class="detail-card-body">
        <div class="info-item" style="margin-bottom: 16px;">
            <div class="info-label">Manzil</div>
            <div class="info-value">{{ $tender->location }}</div>
        </div>
        @if($tender->location_description)
            <div class="info-item">
                <div class="info-label">Tavsif</div>
                <div class="info-value">{{ $tender->location_description }}</div>
            </div>
        @endif
    </div>
</div>

<!-- Dates -->
<div class="detail-card">
    <div class="detail-card-header">
        <i class="fas fa-calendar-alt"></i>
        <h3>Sanalar</h3>
    </div>
    <div class="detail-card-body">
        <div class="info-grid">
            <div class="info-item">
                <div class="info-label">E'lon qilingan sana</div>
                <div class="info-value">{{ $tender->announcement_date->format('d.m.Y') }}</div>
            </div>
            <div class="info-item">
                <div class="info-label">Arizalar qabul qilish muddati</div>
                <div class="info-value {{ $tender->isExpired() ? 'deadline-expired' : 'deadline-active' }}">
                    {{ $tender->submission_deadline->format('d.m.Y') }}
                    @if($tender->isExpired())
                        <span style="font-weight: normal;">(Tugagan)</span>
                    @else
                        <span style="font-weight: normal;">({{ $tender->getDaysRemaining() }} kun qoldi)</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Technical Requirements -->
@if($tender->technical_requirements && count($tender->technical_requirements))
<div class="detail-card">
    <div class="detail-card-header">
        <i class="fas fa-cogs"></i>
        <h3>Texnik talablar</h3>
    </div>
    <div class="detail-card-body" style="padding: 0;">
        <ul class="requirement-list">
            @foreach($tender->technical_requirements as $req)
                <li>
                    <i class="fas fa-check"></i>
                    <span>{{ $req }}</span>
                </li>
            @endforeach
        </ul>
    </div>
</div>
@endif

<!-- Qualification Requirements -->
@if($tender->qualification_requirements && count($tender->qualification_requirements))
<div class="detail-card">
    <div class="detail-card-header">
        <i class="fas fa-award"></i>
        <h3>Malaka talablari</h3>
    </div>
    <div class="detail-card-body" style="padding: 0;">
        <ul class="requirement-list">
            @foreach($tender->qualification_requirements as $req)
                <li>
                    <i class="fas fa-check"></i>
                    <span>{{ $req }}</span>
                </li>
            @endforeach
        </ul>
    </div>
</div>
@endif

<!-- Customer -->
<div class="detail-card">
    <div class="detail-card-header">
        <i class="fas fa-building"></i>
        <h3>Buyurtmachi</h3>
    </div>
    <div class="detail-card-body">
        <div class="info-grid">
            <div class="info-item">
                <div class="info-label">Nomi</div>
                <div class="info-value">{{ $tender->customer_name }}</div>
            </div>
            <div class="info-item">
                <div class="info-label">INN</div>
                <div class="info-value">{{ $tender->customer_tin ?? '-' }}</div>
            </div>
            <div class="info-item">
                <div class="info-label">Telefon</div>
                <div class="info-value">{{ $tender->customer_phone ?? '-' }}</div>
            </div>
            <div class="info-item">
                <div class="info-label">Manzil</div>
                <div class="info-value">{{ $tender->customer_address ?? '-' }}</div>
            </div>
        </div>
    </div>
</div>

<!-- Documents -->
@if($tender->documents && count($tender->documents))
<div class="detail-card">
    <div class="detail-card-header">
        <i class="fas fa-paperclip"></i>
        <h3>Hujjatlar</h3>
    </div>
    <div class="detail-card-body">
        <div class="document-list">
            @foreach($tender->documents as $doc)
                <div class="document-item">
                    <i class="fas fa-file-pdf"></i>
                    <a href="{{ Storage::url($doc['path']) }}" target="_blank">{{ $doc['name'] }}</a>
                    <span class="doc-size">{{ number_format($doc['size'] / 1024, 1) }} KB</span>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endif

<!-- Metadata -->
<div class="detail-card">
    <div class="detail-card-header">
        <i class="fas fa-clock"></i>
        <h3>Meta ma'lumotlar</h3>
    </div>
    <div class="detail-card-body">
        <div class="meta-grid">
            <div class="info-item">
                <div class="info-label">Yaratilgan</div>
                <div class="info-value">{{ $tender->created_at->format('d.m.Y H:i') }}</div>
            </div>
            <div class="info-item">
                <div class="info-label">Yangilangan</div>
                <div class="info-value">{{ $tender->updated_at->format('d.m.Y H:i') }}</div>
            </div>
        </div>
    </div>
    <div class="detail-actions">
        <a href="{{ route('admin.tenders.edit', $tender) }}" class="gov-btn gov-btn-warning">
            <i class="fas fa-edit"></i> Tahrirlash
        </a>
        @if($tender->status === 'active')
            <a href="{{ route('frontend.tenders.show', $tender->id) }}" target="_blank" class="gov-btn gov-btn-primary">
                <i class="fas fa-globe"></i> Saytda ko'rish
            </a>
        @endif
        <form method="POST" action="{{ route('admin.tenders.destroy', $tender) }}" style="display: inline;" onsubmit="return confirm('Tenderni o\'chirmoqchimisiz?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="gov-btn gov-btn-danger">
                <i class="fas fa-trash"></i> O'chirish
            </button>
        </form>
    </div>
</div>
@endsection
