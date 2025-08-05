<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Управление новостями</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            padding: 20px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            overflow: hidden;
        }

        .header {
            background: #2c3e50;
            color: white;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header h1 {
            font-size: 1.5rem;
        }

        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            font-weight: 500;
            cursor: pointer;
            display: inline-block;
        }

        .btn-primary {
            background: #3498db;
            color: white;
        }

        .btn-primary:hover {
            background: #2980b9;
        }

        .btn-danger {
            background: #e74c3c;
            color: white;
        }

        .btn-danger:hover {
            background: #c0392b;
        }

        .btn-warning {
            background: #f39c12;
            color: white;
        }

        .btn-warning:hover {
            background: #e67e22;
        }

        .btn-sm {
            padding: 5px 10px;
            font-size: 0.8rem;
        }

        .table-container {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background: #f8f9fa;
            font-weight: 600;
        }

        tr:hover {
            background: #f8f9fa;
        }

        .image-preview {
            width: 60px;
            height: 40px;
            background-size: cover;
            background-position: center;
            border-radius: 4px;
            background-color: #f0f0f0;
        }

        .actions {
            display: flex;
            gap: 5px;
        }

        .alert {
            padding: 15px;
            margin: 20px;
            border-radius: 4px;
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .pagination {
            padding: 20px;
            text-align: center;
        }

        .pagination a {
            padding: 8px 12px;
            margin: 0 2px;
            text-decoration: none;
            border: 1px solid #ddd;
            color: #333;
        }

        .pagination a:hover {
            background: #f5f5f5;
        }

        .pagination .active {
            background: #3498db;
            color: white;
            border-color: #3498db;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Управление новостями</h1>
            <a href="{{ route('admin.news.create') }}" class="btn btn-primary">Добавить новость</a>
        </div>

        @if(session('success'))
            <div class="alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Изображение</th>
                        <th>Заголовок</th>
                        <th>Дата публикации</th>
                        <th>Статус</th>
                        <th>Действия</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($news as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>
                                @if($item->image)
                                    <div class="image-preview" style="background-image: url('{{ $item->getImagePath() }}');"></div>
                                @else
                                    <div class="image-preview" style="background: #f0f0f0; display: flex; align-items: center; justify-content: center; color: #999;">
                                        Нет
                                    </div>
                                @endif
                            </td>
                            <td>
                                <strong>{{ Str::limit($item->title, 50) }}</strong>
                                @if($item->content)
                                    <br><small style="color: #666;">{{ Str::limit(strip_tags($item->content), 80) }}</small>
                                @endif
                            </td>
                            <td>
                                {{ $item->published_at ? $item->published_at->format('d.m.Y H:i') : 'Не указана' }}
                                @if($item->published_at)
                                    <br><small style="color: #666;">{{ $item->published_at->diffForHumans() }}</small>
                                @endif
                            </td>
                            <td>
                                @if($item->published_at && $item->published_at <= now())
                                    <span style="color: #27ae60; font-weight: 500;">Опубликована</span>
                                @else
                                    <span style="color: #f39c12; font-weight: 500;">Черновик</span>
                                @endif
                            </td>
                            <td>
                                <div class="actions">
                                    <a href="{{ route('admin.news.show', $item) }}" class="btn btn-sm btn-primary">Просмотр</a>
                                    <a href="{{ route('admin.news.edit', $item) }}" class="btn btn-sm btn-warning">Редактировать</a>
                                    <form method="POST" action="{{ route('admin.news.destroy', $item) }}" style="display: inline;"
                                          onsubmit="return confirm('Вы уверены, что хотите удалить эту новость?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Удалить</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" style="text-align: center; padding: 40px; color: #999;">
                                Новости не найдены
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($news->hasPages())
            <div class="pagination">
                {{ $news->links() }}
            </div>
        @endif
    </div>
</body>
</html>
