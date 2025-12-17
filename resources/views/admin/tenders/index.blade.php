{{-- resources/views/admin/tenders/index.blade.php --}}
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Управление тендерами</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Arial, sans-serif; background: #f5f5f5; padding: 20px; }
        .container { max-width: 1400px; margin: 0 auto; background: white; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); overflow: hidden; }
        .header { background: #1e40af; color: white; padding: 20px; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 15px; }
        .header h1 { font-size: 1.5rem; }
        .btn { padding: 10px 20px; border: none; border-radius: 4px; text-decoration: none; font-weight: 500; cursor: pointer; display: inline-block; transition: all 0.3s ease; }
        .btn-primary { background: #3498db; color: white; }
        .btn-primary:hover { background: #2980b9; }
        .btn-danger { background: #e74c3c; color: white; }
        .btn-danger:hover { background: #c0392b; }
        .btn-warning { background: #f39c12; color: white; }
        .btn-warning:hover { background: #e67e22; }
        .btn-success { background: #27ae60; color: white; }
        .btn-success:hover { background: #219a52; }
        .btn-info { background: #17a2b8; color: white; }
        .btn-sm { padding: 5px 10px; font-size: 0.8rem; }
        .search-filters { padding: 20px; background: #f8f9fa; border-bottom: 1px solid #dee2e6; }
        .search-row { display: flex; gap: 15px; align-items: center; flex-wrap: wrap; }
        .search-input { flex: 1; min-width: 200px; padding: 8px 12px; border: 1px solid #ddd; border-radius: 4px; }
        .filter-select { padding: 8px 12px; border: 1px solid #ddd; border-radius: 4px; min-width: 150px; }
        .stats-row { padding: 15px 20px; background: #e7f3ff; border-bottom: 1px solid #b8d4f0; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 15px; }
        .stats { display: flex; gap: 30px; }
        .stat-item { text-align: center; }
        .stat-number { font-size: 1.5rem; font-weight: bold; color: #1e40af; }
        .stat-label { font-size: 0.85rem; color: #666; }
        .table-container { overflow-x: auto; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 12px; text-align: left; border-bottom: 1px solid #ddd; }
        th { background: #f8f9fa; font-weight: 600; }
        tr:hover { background: #f8f9fa; }
        .actions { display: flex; gap: 5px; flex-wrap: wrap; }
        .status-badge { padding: 4px 10px; border-radius: 12px; font-size: 0.75rem; font-weight: 500; display: inline-block; }
        .status-active { background: #d4edda; color: #155724; }
        .status-draft { background: #fff3cd; color: #856404; }
        .status-closed { background: #d6d8db; color: #383d41; }
        .status-cancelled { background: #f8d7da; color: #721c24; }
        .urgent-badge { background: #dc3545; color: white; padding: 2px 8px; border-radius: 10px; font-size: 0.7rem; margin-left: 5px; }
        .alert { padding: 15px; margin: 20px; border-radius: 4px; }
        .alert-success { background: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
        .alert-error { background: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
        .pagination-container { padding: 20px; text-align: center; background: #f8f9fa; }
        .pagination { display: inline-flex; gap: 5px; }
        .pagination a, .pagination span { padding: 8px 12px; text-decoration: none; border: 1px solid #ddd; color: #333; border-radius: 4px; }
        .pagination a:hover { background: #f5f5f5; }
        .pagination .active { background: #1e40af; color: white; border-color: #1e40af; }
        .empty-state { text-align: center; padding: 60px 20px; color: #666; }
        .empty-state h3 { margin-bottom: 10px; color: #999; }
        .tender-title { font-weight: 600; color: #1e40af; margin-bottom: 5px; }
        .tender-code { color: #666; font-size: 0.85rem; }
        .deadline-info { font-size: 0.85rem; }
        .deadline-open { color: #27ae60; }
        .deadline-urgent { color: #e74c3c; font-weight: 600; }
        .deadline-closed { color: #6c757d; }
        @media (max-width: 768px) {
            .header, .search-row, .stats-row { flex-direction: column; }
            .search-input { min-width: auto; width: 100%; }
            .actions { flex-direction: column; }
            th, td { padding: 8px; font-size: 0.85rem; }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>📋 Управление тендерами</h1>
            <div>
                <a href="{{ route('admin.tenders.create') }}" class="btn btn-primary">+ Создать тендер</a>
                <a href="{{ route('home') }}" class="btn btn-info">← На главную</a>
            </div>
        </div>

        <div class="stats-row">
            <div class="stats">
                <div class="stat-item">
                    <div class="stat-number">{{ $tenders->total() }}</div>
                    <div class="stat-label">Всего тендеров</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">{{ \App\Models\Tender::active()->count() }}</div>
                    <div class="stat-label">Активных</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">{{ \App\Models\Tender::open()->count() }}</div>
                    <div class="stat-label">Открытых</div>
                </div>
            </div>
            <small>Последнее обновление: {{ now()->format('d.m.Y H:i') }}</small>
        </div>

        <div class="search-filters">
            <form method="GET" action="{{ route('admin.tenders.index') }}">
                <div class="search-row">
                    <input type="text" name="search" class="search-input" placeholder="Поиск по названию, коду, номеру лота..." value="{{ request('search') }}">
                    <select name="status" class="filter-select">
                        <option value="">Все статусы</option>
                        <option value="draft" {{ request('status') == 'draft' ? 'selected' : '' }}>Черновик</option>
                        <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Активный</option>
                        <option value="closed" {{ request('status') == 'closed' ? 'selected' : '' }}>Закрытый</option>
                        <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>Отменён</option>
                    </select>
                    <button type="submit" class="btn btn-info btn-sm">Фильтр</button>
                    @if(request()->hasAny(['search', 'status']))
                        <a href="{{ route('admin.tenders.index') }}" class="btn btn-sm" style="background: #6c757d; color: white;">Сбросить</a>
                    @endif
                </div>
            </form>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-error">{{ session('error') }}</div>
        @endif

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Название</th>
                        <th>Код / № лота</th>
                        <th>Дата объявления</th>
                        <th>Дедлайн</th>
                        <th>Статус</th>
                        <th>Действия</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($tenders as $tender)
                        <tr>
                            <td>{{ $tender->id }}</td>
                            <td>
                                <div class="tender-title">
                                    {{ Str::limit($tender->title, 50) }}
                                    @if($tender->is_urgent)
                                        <span class="urgent-badge">СРОЧНО</span>
                                    @endif
                                </div>
                                <div class="tender-code">{{ Str::limit($tender->subject, 60) }}</div>
                            </td>
                            <td>
                                <div>{{ $tender->code ?? '-' }}</div>
                                @if($tender->lot_number)
                                    <div style="font-size: 0.8rem; color: #666;">Лот: {{ $tender->lot_number }}</div>
                                @endif
                            </td>
                            <td>{{ $tender->announcement_date->format('d.m.Y') }}</td>
                            <td>
                                @php
                                    $daysRemaining = $tender->getDaysRemaining();
                                    $isExpired = $tender->isExpired();
                                @endphp
                                <div>{{ $tender->submission_deadline->format('d.m.Y') }}</div>
                                @if($isExpired)
                                    <div class="deadline-info deadline-closed">Истёк</div>
                                @elseif($daysRemaining <= 3)
                                    <div class="deadline-info deadline-urgent">{{ $daysRemaining }} дн.</div>
                                @else
                                    <div class="deadline-info deadline-open">{{ $daysRemaining }} дн.</div>
                                @endif
                            </td>
                            <td>
                                <span class="status-badge status-{{ $tender->status }}">
                                    {{ ['draft' => 'Черновик', 'active' => 'Активный', 'closed' => 'Закрыт', 'cancelled' => 'Отменён'][$tender->status] }}
                                </span>
                            </td>
                            <td>
                                <div class="actions">
                                    <a href="{{ route('admin.tenders.show', $tender) }}" class="btn btn-sm btn-info" title="Просмотр">👁️</a>
                                    <a href="{{ route('admin.tenders.edit', $tender) }}" class="btn btn-sm btn-warning" title="Редактировать">✏️</a>
                                    @if($tender->status === 'active')
                                        <a href="{{ route('frontend.tenders.show', $tender->id) }}" target="_blank" class="btn btn-sm btn-success" title="На сайте">🌐</a>
                                    @endif
                                    <form method="POST" action="{{ route('admin.tenders.destroy', $tender) }}" style="display: inline;" onsubmit="return confirm('Удалить тендер?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" title="Удалить">🗑️</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7">
                                <div class="empty-state">
                                    <h3>Тендеры не найдены</h3>
                                    <p>Создайте первый тендер для начала работы.</p>
                                    <a href="{{ route('admin.tenders.create') }}" class="btn btn-primary" style="margin-top: 15px;">Создать тендер</a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($tenders->hasPages())
            <div class="pagination-container">
                <div class="pagination">
                    @if ($tenders->onFirstPage())
                        <span>‹ Предыдущая</span>
                    @else
                        <a href="{{ $tenders->previousPageUrl() }}">‹ Предыдущая</a>
                    @endif
                    @foreach ($tenders->getUrlRange(1, $tenders->lastPage()) as $page => $url)
                        <a href="{{ $url }}" class="{{ $page == $tenders->currentPage() ? 'active' : '' }}">{{ $page }}</a>
                    @endforeach
                    @if ($tenders->hasMorePages())
                        <a href="{{ $tenders->nextPageUrl() }}">Следующая ›</a>
                    @else
                        <span>Следующая ›</span>
                    @endif
                </div>
                <div style="margin-top: 10px; color: #666; font-size: 0.9rem;">
                    Показано {{ $tenders->firstItem() ?? 0 }} - {{ $tenders->lastItem() ?? 0 }} из {{ $tenders->total() }}
                </div>
            </div>
        @endif
    </div>
</body>
</html>
