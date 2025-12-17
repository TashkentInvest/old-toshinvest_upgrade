{{-- resources/views/admin/tenders/show.blade.php --}}
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Тендер #{{ $tender->id }}</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Arial, sans-serif; background: #f5f5f5; padding: 20px; }
        .container { max-width: 900px; margin: 0 auto; background: white; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); overflow: hidden; }
        .header { background: #1e40af; color: white; padding: 20px; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 15px; }
        .header h1 { font-size: 1.3rem; }
        .btn { padding: 10px 20px; border: none; border-radius: 4px; text-decoration: none; font-weight: 500; cursor: pointer; display: inline-block; }
        .btn-secondary { background: #6c757d; color: white; }
        .btn-warning { background: #f39c12; color: white; }
        .btn-danger { background: #e74c3c; color: white; }
        .btn-success { background: #27ae60; color: white; }
        .content { padding: 30px; }
        .section { margin-bottom: 25px; }
        .section-title { font-size: 1rem; font-weight: 600; color: #1e40af; margin-bottom: 15px; padding-bottom: 8px; border-bottom: 2px solid #e9ecef; }
        .info-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 15px; }
        .info-item { padding: 12px; background: #f8f9fa; border-radius: 4px; }
        .info-label { font-size: 0.8rem; color: #666; margin-bottom: 4px; text-transform: uppercase; }
        .info-value { font-weight: 500; color: #333; }
        .status-badge { padding: 6px 12px; border-radius: 15px; font-size: 0.85rem; font-weight: 500; display: inline-block; }
        .status-active { background: #d4edda; color: #155724; }
        .status-draft { background: #fff3cd; color: #856404; }
        .status-closed { background: #d6d8db; color: #383d41; }
        .status-cancelled { background: #f8d7da; color: #721c24; }
        .urgent-badge { background: #dc3545; color: white; padding: 4px 10px; border-radius: 12px; font-size: 0.8rem; }
        .list { list-style: none; padding: 0; }
        .list li { padding: 8px 0; border-bottom: 1px solid #eee; display: flex; align-items: flex-start; gap: 10px; }
        .list li:last-child { border-bottom: none; }
        .list li::before { content: '✓'; color: #27ae60; font-weight: bold; }
        .document-list { display: flex; flex-direction: column; gap: 10px; }
        .document-item { display: flex; align-items: center; gap: 10px; padding: 12px; background: #f8f9fa; border-radius: 4px; }
        .document-item a { color: #1e40af; text-decoration: none; font-weight: 500; }
        .actions { padding: 20px 30px; background: #f8f9fa; border-top: 1px solid #dee2e6; display: flex; gap: 10px; flex-wrap: wrap; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div>
                <h1>📋 {{ Str::limit($tender->title, 60) }}</h1>
                <div style="margin-top: 10px; display: flex; gap: 10px; flex-wrap: wrap;">
                    <span class="status-badge status-{{ $tender->status }}">
                        {{ ['draft' => 'Черновик', 'active' => 'Активный', 'closed' => 'Закрыт', 'cancelled' => 'Отменён'][$tender->status] }}
                    </span>
                    @if($tender->is_urgent)
                        <span class="urgent-badge">🔴 СРОЧНО</span>
                    @endif
                </div>
            </div>
            <a href="{{ route('admin.tenders.index') }}" class="btn btn-secondary">← Назад</a>
        </div>

        <div class="content">
            <div class="section">
                <div class="section-title">📝 Основная информация</div>
                <div class="info-grid">
                    <div class="info-item">
                        <div class="info-label">ID</div>
                        <div class="info-value">#{{ $tender->id }}</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Код</div>
                        <div class="info-value">{{ $tender->code ?? '-' }}</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Номер лота</div>
                        <div class="info-value">{{ $tender->lot_number ?? '-' }}</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">URL лота</div>
                        <div class="info-value">
                            @if($tender->lot_url)
                                <a href="{{ $tender->lot_url }}" target="_blank" style="color: #1e40af;">Открыть ↗</a>
                            @else
                                -
                            @endif
                        </div>
                    </div>
                </div>
                <div class="info-item" style="margin-top: 15px;">
                    <div class="info-label">Предмет закупки</div>
                    <div class="info-value">{{ $tender->subject }}</div>
                </div>
            </div>

            <div class="section">
                <div class="section-title">📍 Местоположение</div>
                <div class="info-item">
                    <div class="info-label">Адрес</div>
                    <div class="info-value">{{ $tender->location }}</div>
                </div>
                @if($tender->location_description)
                    <div class="info-item" style="margin-top: 10px;">
                        <div class="info-label">Описание</div>
                        <div class="info-value">{{ $tender->location_description }}</div>
                    </div>
                @endif
            </div>

            <div class="section">
                <div class="section-title">📅 Даты</div>
                <div class="info-grid">
                    <div class="info-item">
                        <div class="info-label">Дата объявления</div>
                        <div class="info-value">{{ $tender->announcement_date->format('d.m.Y') }}</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Дедлайн подачи</div>
                        <div class="info-value" style="color: {{ $tender->isExpired() ? '#dc3545' : '#27ae60' }};">
                            {{ $tender->submission_deadline->format('d.m.Y') }}
                            @if($tender->isExpired())
                                (Истёк)
                            @else
                                ({{ $tender->getDaysRemaining() }} дн.)
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            @if($tender->technical_requirements && count($tender->technical_requirements))
                <div class="section">
                    <div class="section-title">📋 Технические требования</div>
                    <ul class="list">
                        @foreach($tender->technical_requirements as $req)
                            <li>{{ $req }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if($tender->qualification_requirements && count($tender->qualification_requirements))
                <div class="section">
                    <div class="section-title">🎯 Квалификационные требования</div>
                    <ul class="list">
                        @foreach($tender->qualification_requirements as $req)
                            <li>{{ $req }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="section">
                <div class="section-title">🏢 Заказчик</div>
                <div class="info-grid">
                    <div class="info-item">
                        <div class="info-label">Название</div>
                        <div class="info-value">{{ $tender->customer_name }}</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">ИНН</div>
                        <div class="info-value">{{ $tender->customer_tin ?? '-' }}</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Телефон</div>
                        <div class="info-value">{{ $tender->customer_phone ?? '-' }}</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Адрес</div>
                        <div class="info-value">{{ $tender->customer_address ?? '-' }}</div>
                    </div>
                </div>
            </div>

            @if($tender->documents && count($tender->documents))
                <div class="section">
                    <div class="section-title">📎 Документы</div>
                    <div class="document-list">
                        @foreach($tender->documents as $doc)
                            <div class="document-item">
                                <span>📄</span>
                                <a href="{{ Storage::url($doc['path']) }}" target="_blank">{{ $doc['name'] }}</a>
                                <span style="color: #666; font-size: 0.85rem;">{{ number_format($doc['size'] / 1024, 1) }} KB</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <div class="section">
                <div class="section-title">ℹ️ Метаданные</div>
                <div class="info-grid">
                    <div class="info-item">
                        <div class="info-label">Создан</div>
                        <div class="info-value">{{ $tender->created_at->format('d.m.Y H:i') }}</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Обновлён</div>
                        <div class="info-value">{{ $tender->updated_at->format('d.m.Y H:i') }}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="actions">
            <a href="{{ route('admin.tenders.edit', $tender) }}" class="btn btn-warning">✏️ Редактировать</a>
            @if($tender->status === 'active')
                <a href="{{ route('frontend.tenders.show', $tender->id) }}" target="_blank" class="btn btn-success">🌐 На сайте</a>
            @endif
            <form method="POST" action="{{ route('admin.tenders.destroy', $tender) }}" style="display: inline;" onsubmit="return confirm('Удалить тендер?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">🗑️ Удалить</button>
            </form>
        </div>
    </div>
</body>
</html>
