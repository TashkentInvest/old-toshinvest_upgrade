@extends('layouts.admin')

@section('title', 'Yangiliklar boshqaruvi')

@section('content')
<!-- Page Header -->
<div class="admin-page-header">
    <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 16px;">
        <div>
            <h1 class="admin-page-title">Yangiliklar boshqaruvi</h1>
            <p class="admin-page-subtitle">Barcha yangiliklar ro'yxati va boshqaruvi</p>
        </div>
        <a href="{{ route('admin.news.create') }}" class="gov-btn gov-btn-primary">
            <i class="fas fa-plus"></i> Yangi qo'shish
        </a>
    </div>
</div>

<!-- Stats Row -->
<div class="admin-stats-row">
    <div class="admin-stat-card">
        <div class="admin-stat-icon"><i class="fas fa-newspaper"></i></div>
        <div class="admin-stat-value">{{ $totalNews }}</div>
        <div class="admin-stat-label">Jami yangiliklar</div>
    </div>
    <div class="admin-stat-card success">
        <div class="admin-stat-icon"><i class="fas fa-check-circle"></i></div>
        <div class="admin-stat-value">{{ $publishedNews }}</div>
        <div class="admin-stat-label">Nashr qilingan</div>
    </div>
    <div class="admin-stat-card warning">
        <div class="admin-stat-icon"><i class="fas fa-edit"></i></div>
        <div class="admin-stat-value">{{ $draftNews }}</div>
        <div class="admin-stat-label">Qoralamalar</div>
    </div>
    <div class="admin-stat-card">
        <div class="admin-stat-icon"><i class="fas fa-clock"></i></div>
        <div class="admin-stat-value">{{ now()->format('H:i') }}</div>
        <div class="admin-stat-label">Oxirgi yangilanish</div>
    </div>
</div>

<!-- Filters Card -->
<div class="admin-card">
    <div class="admin-card-header">
        <h3 class="admin-card-title"><i class="fas fa-filter"></i> Qidiruv va filtrlar</h3>
    </div>
    <div class="admin-card-body">
        <form method="GET" action="{{ route('admin.news.index') }}">
            <div class="gov-form-row" style="align-items: flex-end;">
                <div class="gov-form-group" style="flex: 2;">
                    <label class="gov-label">Qidiruv</label>
                    <input type="text" name="search" class="gov-input" placeholder="Sarlavha yoki matn bo'yicha qidirish..." value="{{ request('search') }}">
                </div>
                <div class="gov-form-group">
                    <label class="gov-label">Status</label>
                    <select name="status" class="gov-select">
                        <option value="">Barcha statuslar</option>
                        <option value="published" {{ request('status') == 'published' ? 'selected' : '' }}>Nashr qilingan</option>
                        <option value="draft" {{ request('status') == 'draft' ? 'selected' : '' }}>Qoralama</option>
                        <option value="scheduled" {{ request('status') == 'scheduled' ? 'selected' : '' }}>Rejalashtirilgan</option>
                    </select>
                </div>
                <div class="gov-form-group">
                    <label class="gov-label">Saralash</label>
                    <select name="sort" class="gov-select">
                        <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Eng yangi</option>
                        <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Eng eski</option>
                        <option value="title" {{ request('sort') == 'title' ? 'selected' : '' }}>Sarlavha bo'yicha</option>
                    </select>
                </div>
                <div class="gov-form-group" style="flex: 0;">
                    <button type="submit" class="gov-btn gov-btn-primary"><i class="fas fa-search"></i> Qidirish</button>
                </div>
                @if(request()->hasAny(['search', 'status', 'sort']))
                <div class="gov-form-group" style="flex: 0;">
                    <a href="{{ route('admin.news.index') }}" class="gov-btn gov-btn-secondary"><i class="fas fa-times"></i> Tozalash</a>
                </div>
                @endif
            </div>
        </form>
    </div>
</div>

<!-- News Table -->
<div class="admin-card">
    <div class="admin-card-header">
        <h3 class="admin-card-title"><i class="fas fa-list"></i> Yangiliklar ro'yxati</h3>
        <span style="color: var(--gov-text-muted); font-size: 14px;">Jami: {{ $news->total() }} ta</span>
    </div>
    <div class="gov-table-container" style="border: none; box-shadow: none;">
        <table class="gov-table">
            <thead>
                <tr>
                    <th style="width: 60px;">ID</th>
                    <th style="width: 80px;">Rasm</th>
                    <th>Sarlavha</th>
                    <th style="width: 150px;">Nashr sanasi</th>
                    <th style="width: 120px;">Status</th>
                    <th style="width: 160px;">Amallar</th>
                </tr>
            </thead>
            <tbody>
                @forelse($news as $item)
                <tr>
                    <td class="number">{{ $item->id }}</td>
                    <td>
                        @if($item->image)
                            @php $images = $item->getImageArray(); @endphp
                            <div style="width: 60px; height: 45px; background: url('{{ $images[0] }}') center/cover no-repeat; border-radius: var(--gov-radius-sm); border: 1px solid var(--gov-border);"></div>
                        @else
                            <div style="width: 60px; height: 45px; background: var(--gov-bg-gray); border-radius: var(--gov-radius-sm); display: flex; align-items: center; justify-content: center; color: var(--gov-text-muted);">
                                <i class="fas fa-image"></i>
                            </div>
                        @endif
                    </td>
                    <td>
                        <div style="font-weight: 600; color: var(--gov-text-dark); margin-bottom: 4px;">{{ Str::limit($item->title, 60) }}</div>
                        @if($item->content)
                        <div style="font-size: 13px; color: var(--gov-text-muted); line-height: 1.4;">{{ Str::limit(strip_tags($item->content), 80) }}</div>
                        @endif
                        @if($item->link)
                        <a href="{{ $item->link }}" target="_blank" style="font-size: 12px; color: var(--gov-primary); text-decoration: none; display: inline-flex; align-items: center; gap: 4px; margin-top: 4px;">
                            <i class="fas fa-external-link-alt"></i> Tashqi havola
                        </a>
                        @endif
                    </td>
                    <td>
                        @if($item->published_at)
                        <div style="font-weight: 500;">{{ $item->published_at->format('d.m.Y') }}</div>
                        <div style="font-size: 12px; color: var(--gov-text-muted);">{{ $item->published_at->format('H:i') }}</div>
                        <div style="font-size: 11px; color: var(--gov-text-subtle);">{{ $item->published_at->diffForHumans() }}</div>
                        @else
                        <span style="color: var(--gov-text-muted);">Belgilanmagan</span>
                        @endif
                    </td>
                    <td>
                        @if($item->published_at && $item->published_at <= now())
                        <span style="display: inline-flex; align-items: center; gap: 6px; padding: 6px 12px; background: rgba(40, 167, 69, 0.1); color: var(--gov-success); border-radius: 20px; font-size: 12px; font-weight: 600;">
                            <i class="fas fa-check-circle"></i> Nashr qilingan
                        </span>
                        @elseif($item->published_at && $item->published_at > now())
                        <span style="display: inline-flex; align-items: center; gap: 6px; padding: 6px 12px; background: rgba(23, 162, 184, 0.1); color: #17a2b8; border-radius: 20px; font-size: 12px; font-weight: 600;">
                            <i class="fas fa-clock"></i> Rejalashtirilgan
                        </span>
                        @else
                        <span style="display: inline-flex; align-items: center; gap: 6px; padding: 6px 12px; background: rgba(255, 193, 7, 0.1); color: #e67e22; border-radius: 20px; font-size: 12px; font-weight: 600;">
                            <i class="fas fa-edit"></i> Qoralama
                        </span>
                        @endif
                    </td>
                    <td>
                        <div style="display: flex; gap: 8px; flex-wrap: wrap;">
                            <a href="{{ route('admin.news.show', $item) }}" class="gov-table-btn gov-table-btn-secondary" title="Ko'rish">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.news.edit', $item) }}" class="gov-table-btn gov-table-btn-secondary" title="Tahrirlash" style="border-color: var(--gov-warning); color: var(--gov-warning);">
                                <i class="fas fa-edit"></i>
                            </a>
                            @if(Route::has('frontend.media.detail'))
                            <a href="{{ route('frontend.media.detail', $item->id) }}" target="_blank" class="gov-table-btn gov-table-btn-primary" title="Saytda ko'rish">
                                <i class="fas fa-globe"></i>
                            </a>
                            @endif
                            <form method="POST" action="{{ route('admin.news.destroy', $item) }}" style="display: inline;" onsubmit="return confirm('Haqiqatan ham bu yangiliklarni o\'chirmoqchimisiz?')">
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
                            <i class="fas fa-newspaper" style="font-size: 48px; margin-bottom: 16px; opacity: 0.3;"></i>
                            @if(request()->hasAny(['search', 'status']))
                            <h3 style="margin-bottom: 8px; color: var(--gov-text-dark);">Yangiliklar topilmadi</h3>
                            <p>Qidiruv parametrlarini o'zgartirib ko'ring.</p>
                            <a href="{{ route('admin.news.index') }}" class="gov-btn gov-btn-secondary" style="margin-top: 16px;">Barchasini ko'rsatish</a>
                            @else
                            <h3 style="margin-bottom: 8px; color: var(--gov-text-dark);">Yangiliklar yo'q</h3>
                            <p>Hali hech qanday yangilik yaratilmagan.</p>
                            <a href="{{ route('admin.news.create') }}" class="gov-btn gov-btn-primary" style="margin-top: 16px;">Birinchi yangiliklarni yarating</a>
                            @endif
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($news->hasPages())
    <div class="gov-pagination" style="border-top: 1px solid var(--gov-border); margin: 0;">
        {{ $news->withQueryString()->links() }}
    </div>
    @endif
</div>
@endsection
