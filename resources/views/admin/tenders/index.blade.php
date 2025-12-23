@extends('layouts.admin')

@section('title', 'Tenderlar boshqaruvi')

@section('content')
<!-- Page Header -->
<div class="admin-page-header">
    <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 16px;">
        <div>
            <h1 class="admin-page-title">Tenderlar boshqaruvi</h1>
            <p class="admin-page-subtitle">Barcha tenderlar ro'yxati va boshqaruvi</p>
        </div>
        <a href="{{ route('admin.tenders.create') }}" class="gov-btn gov-btn-primary">
            <i class="fas fa-plus"></i> Yangi tender
        </a>
    </div>
</div>

<!-- Stats Row -->
<div class="admin-stats-row">
    <div class="admin-stat-card">
        <div class="admin-stat-icon"><i class="fas fa-gavel"></i></div>
        <div class="admin-stat-value">{{ $tenders->total() }}</div>
        <div class="admin-stat-label">Jami tenderlar</div>
    </div>
    <div class="admin-stat-card success">
        <div class="admin-stat-icon"><i class="fas fa-check-circle"></i></div>
        <div class="admin-stat-value">{{ \App\Models\Tender::active()->count() }}</div>
        <div class="admin-stat-label">Faol</div>
    </div>
    <div class="admin-stat-card warning">
        <div class="admin-stat-icon"><i class="fas fa-door-open"></i></div>
        <div class="admin-stat-value">{{ \App\Models\Tender::open()->count() }}</div>
        <div class="admin-stat-label">Ochiq</div>
    </div>
    <div class="admin-stat-card danger">
        <div class="admin-stat-icon"><i class="fas fa-times-circle"></i></div>
        <div class="admin-stat-value">{{ \App\Models\Tender::where('status', 'closed')->count() }}</div>
        <div class="admin-stat-label">Yopiq</div>
    </div>
</div>

<!-- Filters Card -->
<div class="admin-card">
    <div class="admin-card-header">
        <h3 class="admin-card-title"><i class="fas fa-filter"></i> Qidiruv va filtrlar</h3>
    </div>
    <div class="admin-card-body">
        <form method="GET" action="{{ route('admin.tenders.index') }}">
            <div class="gov-form-row" style="align-items: flex-end;">
                <div class="gov-form-group" style="flex: 2;">
                    <label class="gov-label">Qidiruv</label>
                    <input type="text" name="search" class="gov-input" placeholder="Nomi, kodi yoki lot raqami bo'yicha..." value="{{ request('search') }}">
                </div>
                <div class="gov-form-group">
                    <label class="gov-label">Status</label>
                    <select name="status" class="gov-select">
                        <option value="">Barcha statuslar</option>
                        <option value="draft" {{ request('status') == 'draft' ? 'selected' : '' }}>Qoralama</option>
                        <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Faol</option>
                        <option value="closed" {{ request('status') == 'closed' ? 'selected' : '' }}>Yopiq</option>
                        <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>Bekor qilingan</option>
                    </select>
                </div>
                <div class="gov-form-group" style="flex: 0;">
                    <button type="submit" class="gov-btn gov-btn-primary"><i class="fas fa-search"></i> Qidirish</button>
                </div>
                @if(request()->hasAny(['search', 'status']))
                <div class="gov-form-group" style="flex: 0;">
                    <a href="{{ route('admin.tenders.index') }}" class="gov-btn gov-btn-secondary"><i class="fas fa-times"></i> Tozalash</a>
                </div>
                @endif
            </div>
        </form>
    </div>
</div>

<!-- Tenders Table -->
<div class="admin-card">
    <div class="admin-card-header">
        <h3 class="admin-card-title"><i class="fas fa-list"></i> Tenderlar ro'yxati</h3>
        <span style="color: var(--gov-text-muted); font-size: 14px;">Jami: {{ $tenders->total() }} ta</span>
    </div>
    <div class="gov-table-container" style="border: none; box-shadow: none;">
        <table class="gov-table">
            <thead>
                <tr>
                    <th style="width: 60px;">ID</th>
                    <th>Nomi</th>
                    <th style="width: 140px;">Kod / Lot №</th>
                    <th style="width: 130px;">E'lon sanasi</th>
                    <th style="width: 130px;">Muddat</th>
                    <th style="width: 120px;">Status</th>
                    <th style="width: 160px;">Amallar</th>
                </tr>
            </thead>
            <tbody>
                @forelse($tenders as $tender)
                <tr>
                    <td class="number">{{ $tender->id }}</td>
                    <td>
                        <div style="font-weight: 600; color: var(--gov-text-dark); margin-bottom: 4px;">
                            {{ Str::limit($tender->title, 50) }}
                            @if($tender->is_urgent)
                            <span style="display: inline-block; background: var(--gov-error); color: white; padding: 2px 8px; border-radius: 10px; font-size: 10px; font-weight: 700; margin-left: 6px;">SHOSHILINCH</span>
                            @endif
                        </div>
                        <div style="font-size: 13px; color: var(--gov-text-muted);">{{ Str::limit($tender->subject, 60) }}</div>
                    </td>
                    <td>
                        <div style="font-weight: 500;">{{ $tender->code ?? '-' }}</div>
                        @if($tender->lot_number)
                        <div style="font-size: 12px; color: var(--gov-text-muted);">Lot: {{ $tender->lot_number }}</div>
                        @endif
                    </td>
                    <td>{{ $tender->announcement_date->format('d.m.Y') }}</td>
                    <td>
                        @php
                            $daysRemaining = $tender->getDaysRemaining();
                            $isExpired = $tender->isExpired();
                        @endphp
                        <div style="font-weight: 500;">{{ $tender->submission_deadline->format('d.m.Y') }}</div>
                        @if($isExpired)
                        <div style="font-size: 12px; color: var(--gov-error); font-weight: 500;"><i class="fas fa-times-circle"></i> Tugagan</div>
                        @elseif($daysRemaining <= 3)
                        <div style="font-size: 12px; color: var(--gov-error); font-weight: 600;"><i class="fas fa-exclamation-triangle"></i> {{ $daysRemaining }} kun</div>
                        @else
                        <div style="font-size: 12px; color: var(--gov-success);"><i class="fas fa-clock"></i> {{ $daysRemaining }} kun</div>
                        @endif
                    </td>
                    <td>
                        @php
                            $statusColors = [
                                'draft' => ['bg' => 'rgba(255, 193, 7, 0.1)', 'color' => '#e67e22', 'icon' => 'fa-edit', 'text' => 'Qoralama'],
                                'active' => ['bg' => 'rgba(40, 167, 69, 0.1)', 'color' => 'var(--gov-success)', 'icon' => 'fa-check-circle', 'text' => 'Faol'],
                                'closed' => ['bg' => 'rgba(108, 117, 125, 0.1)', 'color' => '#6c757d', 'icon' => 'fa-lock', 'text' => 'Yopiq'],
                                'cancelled' => ['bg' => 'rgba(220, 53, 69, 0.1)', 'color' => 'var(--gov-error)', 'icon' => 'fa-ban', 'text' => 'Bekor'],
                            ];
                            $status = $statusColors[$tender->status] ?? $statusColors['draft'];
                        @endphp
                        <span style="display: inline-flex; align-items: center; gap: 6px; padding: 6px 12px; background: {{ $status['bg'] }}; color: {{ $status['color'] }}; border-radius: 20px; font-size: 12px; font-weight: 600;">
                            <i class="fas {{ $status['icon'] }}"></i> {{ $status['text'] }}
                        </span>
                    </td>
                    <td>
                        <div style="display: flex; gap: 8px; flex-wrap: wrap;">
                            <a href="{{ route('admin.tenders.show', $tender) }}" class="gov-table-btn gov-table-btn-secondary" title="Ko'rish">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.tenders.edit', $tender) }}" class="gov-table-btn gov-table-btn-secondary" title="Tahrirlash" style="border-color: var(--gov-warning); color: var(--gov-warning);">
                                <i class="fas fa-edit"></i>
                            </a>
                            @if($tender->status === 'active')
                            <a href="{{ route('frontend.tenders.show', $tender->id) }}" target="_blank" class="gov-table-btn gov-table-btn-primary" title="Saytda ko'rish">
                                <i class="fas fa-globe"></i>
                            </a>
                            @endif
                            <form method="POST" action="{{ route('admin.tenders.destroy', $tender) }}" style="display: inline;" onsubmit="return confirm('Haqiqatan ham bu tenderni o\'chirmoqchimisiz?')">
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
                    <td colspan="7">
                        <div style="text-align: center; padding: 60px 20px; color: var(--gov-text-muted);">
                            <i class="fas fa-gavel" style="font-size: 48px; margin-bottom: 16px; opacity: 0.3;"></i>
                            <h3 style="margin-bottom: 8px; color: var(--gov-text-dark);">Tenderlar topilmadi</h3>
                            <p>Ishni boshlash uchun birinchi tenderni yarating.</p>
                            <a href="{{ route('admin.tenders.create') }}" class="gov-btn gov-btn-primary" style="margin-top: 16px;">Tender yaratish</a>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($tenders->hasPages())
    <div class="gov-pagination" style="border-top: 1px solid var(--gov-border); margin: 0;">
        {{ $tenders->withQueryString()->links() }}
    </div>
    @endif
</div>
@endsection
