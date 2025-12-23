@extends('layouts.admin')

@section('title', 'Ish arizalari')

@section('content')
<div class="admin-page-header">
    <div class="page-header-content">
        <h1><i class="fas fa-file-alt"></i> Ish arizalari</h1>
        <p>Vakansiyalarga kelgan arizalar</p>
    </div>
    @if($newCount > 0)
    <span class="header-badge">{{ $newCount }} yangi</span>
    @endif
</div>

@if(session('success'))
<div class="admin-alert admin-alert-success">
    <i class="fas fa-check-circle"></i> {{ session('success') }}
</div>
@endif

<div class="admin-card">
    <div class="admin-card-body" style="padding: 0;">
        <table class="gov-table">
            <thead>
                <tr>
                    <th width="50">#</th>
                    <th>Ism</th>
                    <th>Lavozim</th>
                    <th>Telefon</th>
                    <th>Sana</th>
                    <th width="100">Holat</th>
                    <th width="120">Amallar</th>
                </tr>
            </thead>
            <tbody>
                @forelse($applications as $app)
                <tr>
                    <td>{{ $app->id }}</td>
                    <td>
                        <strong>{{ $app->full_name }}</strong>
                        <div style="font-size: 12px; color: #718096;">{{ $app->email }}</div>
                    </td>
                    <td>{{ $app->position }}</td>
                    <td>{{ $app->phone }}</td>
                    <td>{{ $app->created_at->format('d.m.Y H:i') }}</td>
                    <td>
                        <span class="status-badge status-{{ $app->status_color }}">
                            {{ $app->status_label }}
                        </span>
                    </td>
                    <td>
                        <div style="display: flex; gap: 8px;">
                            <a href="{{ route('admin.vacancy-applications.show', $app->id) }}" class="gov-btn-sm gov-btn-primary" title="Ko'rish">
                                <i class="fas fa-eye"></i>
                            </a>
                            <form action="{{ route('admin.vacancy-applications.destroy', $app->id) }}" method="POST" onsubmit="return confirm('O\'chirishni tasdiqlaysizmi?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="gov-btn-sm gov-btn-danger" title="O'chirish">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" style="text-align: center; padding: 40px; color: #718096;">
                        <i class="fas fa-inbox" style="font-size: 32px; margin-bottom: 10px; display: block;"></i>
                        Hozircha arizalar yo'q
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@if($applications->hasPages())
<div style="margin-top: 20px;">
    {{ $applications->links() }}
</div>
@endif

<style>
    .header-badge {
        background: #f59e0b;
        color: white;
        padding: 6px 14px;
        border-radius: 20px;
        font-size: 13px;
        font-weight: 600;
    }
    .status-badge {
        display: inline-block;
        padding: 4px 10px;
        border-radius: 12px;
        font-size: 12px;
        font-weight: 600;
    }
    .status-warning { background: #fef3c7; color: #92400e; }
    .status-info { background: #dbeafe; color: #1e40af; }
    .status-success { background: #d1fae5; color: #065f46; }
    .status-danger { background: #fee2e2; color: #991b1b; }
    .gov-btn-sm {
        padding: 6px 10px;
        border-radius: 6px;
        font-size: 12px;
        border: none;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        text-decoration: none;
    }
    .gov-btn-primary { background: var(--gov-primary); color: white; }
    .gov-btn-danger { background: #ef4444; color: white; }
    .gov-btn-sm:hover { opacity: 0.9; }
</style>
@endsection
