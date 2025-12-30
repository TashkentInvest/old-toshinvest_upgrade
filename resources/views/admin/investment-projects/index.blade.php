@extends('layouts.admin')

@section('title', 'Investitsiya loyihalari boshqaruvi')

@section('content')
<!-- Page Header -->
<div class="admin-page-header">
    <div class="page-header-content">
        <h1><i class="fas fa-coins"></i> Investitsiya loyihalari boshqaruvi</h1>
        <p>Investorlar uchun investitsiya imkoniyatlari</p>
    </div>
    <a href="{{ route('admin.investment-projects.create') }}" class="gov-btn gov-btn-primary">
        <i class="fas fa-plus-circle"></i> Yangi loyiha
    </a>
</div>

<!-- Stats Row -->
<div class="admin-stats-row">
    <div class="admin-stat-card">
        <div class="admin-stat-icon"><i class="fas fa-folder-open"></i></div>
        <div class="admin-stat-value">{{ $projects->count() }}</div>
        <div class="admin-stat-label">Jami</div>
    </div>
    <div class="admin-stat-card success">
        <div class="admin-stat-icon"><i class="fas fa-check-circle"></i></div>
        <div class="admin-stat-value">{{ $projects->where('status', 'active')->count() }}</div>
        <div class="admin-stat-label">Faol</div>
    </div>
    <div class="admin-stat-card warning">
        <div class="admin-stat-icon"><i class="fas fa-archive"></i></div>
        <div class="admin-stat-value">{{ $projects->where('status', 'archive')->count() }}</div>
        <div class="admin-stat-label">Arxiv</div>
    </div>
    <div class="admin-stat-card">
        <div class="admin-stat-icon"><i class="fas fa-star"></i></div>
        <div class="admin-stat-value">{{ $projects->where('is_featured', true)->count() }}</div>
        <div class="admin-stat-label">Muhim</div>
    </div>
</div>

<!-- Projects Table -->
<div class="admin-card">
    <div class="admin-card-header">
        <div class="admin-card-title">
            <i class="fas fa-list"></i>
            Investitsiya loyihalari ro'yxati
        </div>
    </div>
    <div class="admin-card-body" style="padding: 0;">
        <div class="gov-table-container">
            <table class="gov-table">
                <thead>
                    <tr>
                        <th style="width: 100px;">Kod</th>
                        <th>Tuman</th>
                        <th>Mahalla</th>
                        <th style="width: 100px;">Yer (ga)</th>
                        <th style="width: 150px;">Muddat</th>
                        <th style="width: 100px;">Holat</th>
                        <th style="width: 160px;">Amallar</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($projects as $project)
                        <tr>
                            <td><strong>{{ $project->project_code }}</strong></td>
                            <td>{{ $project->district_uz }}</td>
                            <td>{{ $project->mahalla_uz ?? '-' }}</td>
                            <td>{{ number_format($project->land_area, 4) }}</td>
                            <td>
                                @if($project->has_extension && $project->extended_deadline)
                                    <span style="text-decoration: line-through; color: #999;">
                                        {{ $project->submission_deadline->format('d.m.Y H:i') }}
                                    </span><br>
                                    <strong style="color: var(--gov-success);">
                                        {{ $project->extended_deadline->format('d.m.Y H:i') }}
                                    </strong>
                                @else
                                    {{ $project->submission_deadline->format('d.m.Y H:i') }}
                                @endif
                            </td>
                            <td>
                                @if ($project->status == 'active')
                                    <span class="project-status" style="background: rgba(39, 174, 96, 0.15); color: var(--gov-success); padding: 4px 12px; border-radius: 15px; font-size: 0.8rem; font-weight: 600;">
                                        <i class="fas fa-check"></i> Faol
                                    </span>
                                @elseif($project->status == 'completed')
                                    <span class="project-status" style="background: rgba(30, 64, 175, 0.15); color: var(--gov-primary); padding: 4px 12px; border-radius: 15px; font-size: 0.8rem; font-weight: 600;">
                                        <i class="fas fa-flag-checkered"></i> Yakunlangan
                                    </span>
                                @else
                                    <span class="project-status" style="background: rgba(108, 117, 125, 0.15); color: #6c757d; padding: 4px 12px; border-radius: 15px; font-size: 0.8rem; font-weight: 600;">
                                        <i class="fas fa-archive"></i> Arxiv
                                    </span>
                                @endif
                            </td>
                            <td>
                                <div style="display: flex; gap: 6px; flex-wrap: wrap; justify-content: center;">
                                    <a href="{{ route('admin.investment-projects.edit', $project->id) }}" class="gov-btn gov-btn-warning" style="padding: 6px 12px; font-size: 0.8rem;">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.investment-projects.destroy', $project->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="gov-btn gov-btn-danger" style="padding: 6px 12px; font-size: 0.8rem;"
                                            onclick="return confirm('Bu loyihani o\'chirmoqchimisiz?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" style="text-align: center; padding: 40px; color: var(--gov-text-muted);">
                                <i class="fas fa-folder-open" style="font-size: 2rem; margin-bottom: 10px; display: block;"></i>
                                Investitsiya loyihalari topilmadi
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
