@extends('layouts.admin')

@section('title', 'Ochiq ma\'lumotlar boshqaruvi')

@section('content')
<!-- Page Header -->
<div class="admin-page-header">
    <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 16px;">
        <div>
            <h1 class="admin-page-title">Ochiq ma'lumotlar boshqaruvi</h1>
            <p class="admin-page-subtitle">Barcha ochiq ma'lumotlar ro'yxati va boshqaruvi</p>
        </div>
        <a href="{{ route('admin.open-data.create') }}" class="gov-btn gov-btn-primary">
            <i class="fas fa-plus"></i> Yangi qo'shish
        </a>
    </div>
</div>

<!-- Stats Row -->
<div class="admin-stats-row">
    <div class="admin-stat-card">
        <div class="admin-stat-icon"><i class="fas fa-file-alt"></i></div>
        <div class="admin-stat-value">{{ \App\Models\OpenData::count() }}</div>
        <div class="admin-stat-label">Jami fayllar</div>
    </div>
    <div class="admin-stat-card success">
        <div class="admin-stat-icon"><i class="fas fa-check-circle"></i></div>
        <div class="admin-stat-value">{{ \App\Models\OpenData::where('is_active', true)->count() }}</div>
        <div class="admin-stat-label">Faol fayllar</div>
    </div>
    <div class="admin-stat-card warning">
        <div class="admin-stat-icon"><i class="fas fa-file-pdf"></i></div>
        <div class="admin-stat-value">{{ \App\Models\OpenData::where('file_type', 'PDF')->count() }}</div>
        <div class="admin-stat-label">PDF fayllar</div>
    </div>
    <div class="admin-stat-card">
        <div class="admin-stat-icon"><i class="fas fa-table"></i></div>
        <div class="admin-stat-value">{{ \App\Models\OpenData::whereIn('file_type', ['XLSX', 'XLS'])->count() }}</div>
        <div class="admin-stat-label">Excel fayllar</div>
    </div>
</div>

<!-- Filters Card -->
<div class="admin-card">
    <div class="admin-card-header">
        <h3 class="admin-card-title"><i class="fas fa-filter"></i> Qidiruv va filtrlar</h3>
    </div>
    <div class="admin-card-body">
        <form method="GET" action="{{ route('admin.open-data.index') }}">
            <div class="gov-form-row" style="align-items: flex-end;">
                <div class="gov-form-group" style="flex: 2;">
                    <label class="gov-label">Qidiruv</label>
                    <input type="text" name="search" class="gov-input" placeholder="Sarlavha bo'yicha qidirish..." value="{{ request('search') }}">
                </div>
                <div class="gov-form-group">
                    <label class="gov-label">Status</label>
                    <select name="status" class="gov-select">
                        <option value="">Barcha statuslar</option>
                        <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Faol</option>
                        <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Faol emas</option>
                    </select>
                </div>
                <div class="gov-form-group" style="flex: 0;">
                    <button type="submit" class="gov-btn gov-btn-primary"><i class="fas fa-search"></i> Qidirish</button>
                </div>
                @if(request()->hasAny(['search', 'status']))
                <div class="gov-form-group" style="flex: 0;">
                    <a href="{{ route('admin.open-data.index') }}" class="gov-btn gov-btn-secondary"><i class="fas fa-times"></i> Tozalash</a>
                </div>
                @endif
            </div>
        </form>
    </div>
</div>

@if ($message = Session::get('success'))
<div class="admin-card" style="background: rgba(40, 167, 69, 0.1); border: 1px solid #28a745; padding: 16px; margin-bottom: 20px; border-radius: 8px;">
    <div style="display: flex; align-items: center; gap: 12px; color: #28a745;">
        <i class="fas fa-check-circle" style="font-size: 20px;"></i>
        <div>
            <strong>Muvaffaqiyatli!</strong>
            <p style="margin: 0; font-size: 14px;">{{ $message }}</p>
        </div>
    </div>
</div>
@endif

<!-- Data Table -->
<div class="admin-card">
    <div class="admin-card-header">
        <h3 class="admin-card-title"><i class="fas fa-list"></i> Ochiq ma'lumotlar ro'yxati</h3>
        <span style="color: var(--gov-text-muted); font-size: 14px;">Jami: {{ \App\Models\OpenData::count() }} ta</span>
    </div>
    <div class="gov-table-container" style="border: none; box-shadow: none;">
        <table class="gov-table">
            <thead>
                <tr>
                    <th style="width: 60px;">ID</th>
                    <th>Sarlavha</th>
                    <th style="width: 100px;">Fayl turi</th>
                    <th style="width: 100px;">Fayl hajmi</th>
                    <th style="width: 120px;">Status</th>
                    <th style="width: 160px;">Amallar</th>
                </tr>
            </thead>
            <tbody>
                @forelse($openData as $item)
                <tr>
                    <td class="number">{{ $item->id }}</td>
                    <td>
                        <div style="font-weight: 600; color: var(--gov-text-dark); margin-bottom: 4px;">{{ Str::limit($item->title_uz, 60) }}</div>
                        @if($item->title_ru)
                        <div style="font-size: 13px; color: var(--gov-text-muted);">{{ Str::limit($item->title_ru, 60) }}</div>
                        @endif
                    </td>
                    <td>
                        <span class="badge" style="background: var(--gov-primary); color: white; padding: 6px 12px; border-radius: 4px; font-size: 12px; font-weight: 600;">
                            {{ $item->file_type ?? 'N/A' }}
                        </span>
                    </td>
                    <td>
                        @if($item->file_size)
                        <div style="font-size: 13px; color: var(--gov-text-muted);">
                            {{ round($item->file_size / 1024 / 1024, 2) }} MB
                        </div>
                        @else
                        <span style="color: var(--gov-text-muted);">—</span>
                        @endif
                    </td>
                    <td>
                        @if($item->is_active)
                        <span style="display: inline-flex; align-items: center; gap: 6px; padding: 6px 12px; background: rgba(40, 167, 69, 0.1); color: var(--gov-success); border-radius: 20px; font-size: 12px; font-weight: 600;">
                            <i class="fas fa-check-circle"></i> Faol
                        </span>
                        @else
                        <span style="display: inline-flex; align-items: center; gap: 6px; padding: 6px 12px; background: rgba(108, 117, 125, 0.1); color: #6c757d; border-radius: 20px; font-size: 12px; font-weight: 600;">
                            <i class="fas fa-times-circle"></i> Faol emas
                        </span>
                        @endif
                    </td>
                    <td>
                        <div style="display: flex; gap: 8px; flex-wrap: wrap;">
                            @if($item->file_path)
                            <a href="{{ asset('storage/' . $item->file_path) }}" target="_blank" class="gov-table-btn gov-table-btn-primary" title="Yuklab olish">
                                <i class="fas fa-download"></i>
                            </a>
                            @endif
                            <a href="{{ route('admin.open-data.edit', $item->id) }}" class="gov-table-btn gov-table-btn-secondary" title="Tahrirlash" style="border-color: var(--gov-warning); color: var(--gov-warning);">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form method="POST" action="{{ route('admin.open-data.destroy', $item->id) }}" style="display: inline;" onsubmit="return confirm('Haqiqatan ham bu faylni o\'chirmoqchimisiz?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="gov-table-btn gov-table-btn-secondary" style="border-color: var(--gov-error); color: var(--gov-error);" title="O'chirish">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6">
                        <div style="text-align: center; padding: 60px 20px; color: var(--gov-text-muted);">
                            <i class="fas fa-file-alt" style="font-size: 48px; margin-bottom: 16px; opacity: 0.3;"></i>
                            @if(request()->hasAny(['search', 'status']))
                            <h3 style="margin-bottom: 8px; color: var(--gov-text-dark);">Fayllar topilmadi</h3>
                            <p>Qidiruv parametrlarini o'zgartirib ko'ring.</p>
                            <a href="{{ route('admin.open-data.index') }}" class="gov-btn gov-btn-secondary" style="margin-top: 16px;">Barchasini ko'rsatish</a>
                            @else
                            <h3 style="margin-bottom: 8px; color: var(--gov-text-dark);">Fayllar yo'q</h3>
                            <p>Hali hech qanday fayl yaratilmagan.</p>
                            <a href="{{ route('admin.open-data.create') }}" class="gov-btn gov-btn-primary" style="margin-top: 16px;">Birinchi faylni yarating</a>
                            @endif
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($openData->hasPages())
    <div class="gov-pagination" style="border-top: 1px solid var(--gov-border); margin: 0;">
        {{ $openData->withQueryString()->links() }}
    </div>
    @endif
</div>
@endsection
