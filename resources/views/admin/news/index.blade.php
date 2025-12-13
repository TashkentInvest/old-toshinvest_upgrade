{{-- resources/views/admin/news/index.blade.php --}}
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
            flex-wrap: wrap;
            gap: 15px;
        }

        .header h1 {
            font-size: 1.5rem;
        }

        .header-actions {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            font-weight: 500;
            cursor: pointer;
            display: inline-block;
            transition: all 0.3s ease;
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

        .btn-info {
            background: #17a2b8;
            color: white;
        }

        .btn-info:hover {
            background: #138496;
        }

        .btn-sm {
            padding: 5px 10px;
            font-size: 0.8rem;
        }

        .search-filters {
            padding: 20px;
            background: #f8f9fa;
            border-bottom: 1px solid #dee2e6;
        }

        .search-row {
            display: flex;
            gap: 15px;
            align-items: center;
            flex-wrap: wrap;
        }

        .search-input {
            flex: 1;
            min-width: 200px;
            padding: 8px 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .filter-select {
            padding: 8px 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            min-width: 120px;
        }

        .stats-row {
            padding: 15px 20px;
            background: #e7f3ff;
            border-bottom: 1px solid #b8d4f0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
        }

        .stats {
            display: flex;
            gap: 30px;
        }

        .stat-item {
            text-align: center;
        }

        .stat-number {
            font-size: 1.5rem;
            font-weight: bold;
            color: #2c3e50;
        }

        .stat-label {
            font-size: 0.85rem;
            color: #666;
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
            position: sticky;
            top: 0;
            z-index: 10;
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
            position: relative;
            cursor: pointer;
        }

        .image-preview.multiple::after {
            content: '+';
            position: absolute;
            top: -5px;
            right: -5px;
            background: #3498db;
            color: white;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: bold;
        }

        .no-image {
            display: flex;
            align-items: center;
            justify-content: center;
            color: #999;
            font-size: 11px;
        }

        .actions {
            display: flex;
            gap: 5px;
            flex-wrap: wrap;
        }

        .news-title {
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 5px;
        }

        .news-excerpt {
            color: #666;
            font-size: 0.85rem;
            line-height: 1.3;
        }

        .status-badge {
            padding: 4px 8px;
            border-radius: 12px;
            font-size: 0.75rem;
            font-weight: 500;
        }

        .status-published {
            background: #d4edda;
            color: #155724;
        }

        .status-draft {
            background: #fff3cd;
            color: #856404;
        }

        .status-scheduled {
            background: #d1ecf1;
            color: #0c5460;
        }

        .alert {
            padding: 15px;
            margin: 20px;
            border-radius: 4px;
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .alert-info {
            background: #d1ecf1;
            color: #0c5460;
            border-color: #bee5eb;
        }

        .pagination-container {
            padding: 20px;
            text-align: center;
            background: #f8f9fa;
        }

        .pagination {
            display: inline-flex;
            gap: 5px;
        }

        .pagination a,
        .pagination span {
            padding: 8px 12px;
            text-decoration: none;
            border: 1px solid #ddd;
            color: #333;
            border-radius: 4px;
        }

        .pagination a:hover {
            background: #f5f5f5;
        }

        .pagination .active {
            background: #3498db;
            color: white;
            border-color: #3498db;
        }

        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: #666;
        }

        .empty-state h3 {
            margin-bottom: 10px;
            color: #999;
        }

        /* Modal styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.5);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 0;
            border-radius: 8px;
            width: 90%;
            max-width: 500px;
            max-height: 80vh;
            overflow: hidden;
        }

        .modal-header {
            padding: 15px 20px;
            background: #f8f9fa;
            border-bottom: 1px solid #dee2e6;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .modal-body {
            padding: 20px;
            max-height: 60vh;
            overflow-y: auto;
        }

        .close {
            color: #aaa;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .close:hover {
            color: black;
        }

        .image-gallery {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(100px, 1fr));
            gap: 10px;
        }

        .gallery-image {
            width: 100%;
            height: 80px;
            background-size: cover;
            background-position: center;
            border-radius: 4px;
            border: 1px solid #ddd;
        }

        @media (max-width: 768px) {
            .header {
                flex-direction: column;
                text-align: center;
            }

            .search-row {
                flex-direction: column;
            }

            .search-input {
                min-width: auto;
            }

            .stats-row {
                flex-direction: column;
            }

            .stats {
                justify-content: center;
            }

            .actions {
                flex-direction: column;
            }

            .btn-sm {
                text-align: center;
            }

            th, td {
                padding: 8px;
                font-size: 0.85rem;
            }

            .image-preview {
                width: 40px;
                height: 30px;
            }
        }

        @media (max-width: 480px) {
            .container {
                margin: 10px;
                border-radius: 0;
            }

            body {
                padding: 0;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Управление новостями</h1>
            <div class="header-actions">
                <a href="{{ route('admin.news.create') }}" class="btn btn-primary">+ Создать новость</a>
            </div>
        </div>

        <!-- Statistics Row -->
        <div class="stats-row">
            <div class="stats">
                <div class="stat-item">
                    <div class="stat-number">{{ $totalNews }}</div>
                    <div class="stat-label">Всего новостей</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">{{ $publishedNews }}</div>
                    <div class="stat-label">Опубликовано</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">{{ $draftNews }}</div>
                    <div class="stat-label">Черновики</div>
                </div>
            </div>
            <div>
                <small>Последнее обновление: {{ now()->format('d.m.Y H:i') }}</small>
            </div>
        </div>

        <!-- Search and Filters -->
        <div class="search-filters">
            <form method="GET" action="{{ route('admin.news.index') }}">
                <div class="search-row">
                    <input type="text" name="search" class="search-input"
                           placeholder="Поиск по заголовку или содержанию..."
                           value="{{ request('search') }}">

                    <select name="status" class="filter-select">
                        <option value="">Все статусы</option>
                        <option value="published" {{ request('status') == 'published' ? 'selected' : '' }}>Опубликованные</option>
                        <option value="draft" {{ request('status') == 'draft' ? 'selected' : '' }}>Черновики</option>
                        <option value="scheduled" {{ request('status') == 'scheduled' ? 'selected' : '' }}>Запланированные</option>
                    </select>

                    <select name="sort" class="filter-select">
                        <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Сначала новые</option>
                        <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Сначала старые</option>
                        <option value="title" {{ request('sort') == 'title' ? 'selected' : '' }}>По заголовку</option>
                    </select>

                    <button type="submit" class="btn btn-info btn-sm">Фильтр</button>
                    @if(request()->hasAny(['search', 'status', 'sort']))
                        <a href="{{ route('admin.news.index') }}" class="btn btn-sm" style="background: #6c757d; color: white;">Сбросить</a>
                    @endif
                </div>
            </form>
        </div>

        @if(session('success'))
            <div class="alert">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert" style="background: #f8d7da; color: #721c24; border-color: #f5c6cb;">
                {{ session('error') }}
            </div>
        @endif

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th style="width: 60px;">ID</th>
                        <th style="width: 80px;">Изображение</th>
                        <th>Заголовок</th>
                        <th style="width: 150px;">Дата публикации</th>
                        <th style="width: 100px;">Статус</th>
                        <th style="width: 200px;">Действия</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($news as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>
                                @if($item->image)
                                    @php
                                        $images = $item->getImageArray();
                                        $imageCount = count($images);
                                    @endphp
                                    <div class="image-preview {{ $imageCount > 1 ? 'multiple' : '' }}"
                                         style="background-image: url('{{ $images[0] }}');"
                                         onclick="showImageModal({{ $item->id }}, {{ json_encode($images) }})">
                                    </div>
                                @else
                                    <div class="image-preview no-image">
                                        Нет
                                    </div>
                                @endif
                            </td>
                            <td>
                                <div class="news-title">{{ Str::limit($item->title, 60) }}</div>
                                @if($item->content)
                                    <div class="news-excerpt">{{ Str::limit(strip_tags($item->content), 100) }}</div>
                                @endif
                                @if($item->link)
                                    <div style="margin-top: 5px;">
                                        <a href="{{ $item->link }}" target="_blank" style="color: #3498db; font-size: 0.8rem; text-decoration: none;">
                                            🔗 Внешняя ссылка
                                        </a>
                                    </div>
                                @endif
                            </td>
                            <td>
                                @if($item->published_at)
                                    <div>{{ $item->published_at->format('d.m.Y') }}</div>
                                    <div style="font-size: 0.8rem; color: #666;">{{ $item->published_at->format('H:i') }}</div>
                                    <div style="font-size: 0.75rem; color: #999;">{{ $item->published_at->diffForHumans() }}</div>
                                @else
                                    <span style="color: #999;">Не указана</span>
                                @endif
                            </td>
                            <td>
                                @if($item->published_at && $item->published_at <= now())
                                    <span class="status-badge status-published">Опубликована</span>
                                @elseif($item->published_at && $item->published_at > now())
                                    <span class="status-badge status-scheduled">Запланирована</span>
                                @else
                                    <span class="status-badge status-draft">Черновик</span>
                                @endif
                            </td>
                            <td>
                                <div class="actions">
                                    <a href="{{ route('admin.news.show', $item) }}" class="btn btn-sm btn-info" title="Просмотр">
                                        👁️
                                    </a>
                                    <a href="{{ route('admin.news.edit', $item) }}" class="btn btn-sm btn-warning" title="Редактировать">
                                        ✏️
                                    </a>
                                    @if(Route::has('frontend.media.detail'))
                                        <a href="{{ route('frontend.media.detail', $item->id) }}" target="_blank" class="btn btn-sm btn-primary" title="Просмотр на сайте">
                                            🌐
                                        </a>
                                    @endif
                                    <form method="POST" action="{{ route('admin.news.destroy', $item) }}" style="display: inline;"
                                          onsubmit="return confirm('Вы уверены, что хотите удалить новость \&quot;{{ addslashes($item->title) }}\&quot;?\n\nЭто действие нельзя отменить!')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" title="Удалить">🗑️</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">
                                <div class="empty-state">
                                    @if(request()->hasAny(['search', 'status']))
                                        <h3>Новости не найдены</h3>
                                        <p>По вашему запросу ничего не найдено. Попробуйте изменить параметры поиска.</p>
                                        <a href="{{ route('admin.news.index') }}" class="btn btn-primary" style="margin-top: 15px;">Показать все новости</a>
                                    @else
                                        <h3>Нет новостей</h3>
                                        <p>Вы еще не создали ни одной новости.</p>
                                        <a href="{{ route('admin.news.create') }}" class="btn btn-primary" style="margin-top: 15px;">Создать первую новость</a>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($news->hasPages())
            <div class="pagination-container">
                <div class="pagination">
                    {{-- Previous Page Link --}}
                    @if ($news->onFirstPage())
                        <span>‹ Предыдущая</span>
                    @else
                        <a href="{{ $news->previousPageUrl() }}" rel="prev">‹ Предыдущая</a>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($news->getUrlRange(1, $news->lastPage()) as $page => $url)
                        @if ($page == $news->currentPage())
                            <span class="active">{{ $page }}</span>
                        @else
                            <a href="{{ $url }}">{{ $page }}</a>
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($news->hasMorePages())
                        <a href="{{ $news->nextPageUrl() }}" rel="next">Следующая ›</a>
                    @else
                        <span>Следующая ›</span>
                    @endif
                </div>

                <div style="margin-top: 10px; color: #666; font-size: 0.9rem;">
                    Показано {{ $news->firstItem() ?? 0 }} - {{ $news->lastItem() ?? 0 }} из {{ $news->total() }} записей
                </div>
            </div>
        @endif
    </div>

    <!-- Image Modal -->
    <div id="imageModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h5 id="modalTitle">Изображения новости</h5>
                <span class="close" onclick="closeImageModal()">&times;</span>
            </div>
            <div class="modal-body">
                <div id="imageGallery" class="image-gallery"></div>
            </div>
        </div>
    </div>

    <script>
        // Image modal functionality
        function showImageModal(newsId, images) {
            const modal = document.getElementById('imageModal');
            const gallery = document.getElementById('imageGallery');
            const title = document.getElementById('modalTitle');

            title.textContent = `Изображения новости #${newsId} (${images.length})`;

            gallery.innerHTML = '';
            images.forEach((imageUrl, index) => {
                const imageDiv = document.createElement('div');
                imageDiv.className = 'gallery-image';
                imageDiv.style.backgroundImage = `url('${imageUrl}')`;
                imageDiv.title = `Изображение ${index + 1}`;
                imageDiv.onclick = () => window.open(imageUrl, '_blank');
                gallery.appendChild(imageDiv);
            });

            modal.style.display = 'block';
        }

        function closeImageModal() {
            document.getElementById('imageModal').style.display = 'none';
        }

        // Close modal when clicking outside
        window.onclick = function(event) {
            const modal = document.getElementById('imageModal');
            if (event.target === modal) {
                closeImageModal();
            }
        }

        // Auto-refresh functionality (optional)
        let autoRefreshInterval;

        function startAutoRefresh() {
            autoRefreshInterval = setInterval(() => {
                if (!document.hidden) {
                    // Only refresh if no modals are open and no forms are being filled
                    const modals = document.querySelectorAll('.modal');
                    const openModal = Array.from(modals).some(modal => modal.style.display === 'block');

                    if (!openModal) {
                        // Subtle refresh - just update the stats without full page reload
                        updateStats();
                    }
                }
            }, 60000); // Refresh every minute
        }

        function stopAutoRefresh() {
            if (autoRefreshInterval) {
                clearInterval(autoRefreshInterval);
            }
        }

        function updateStats() {
            // This would typically be an AJAX call to get updated statistics
            // For now, just update the timestamp
            const timestamp = document.querySelector('.stats-row small');
            if (timestamp) {
                timestamp.textContent = `Последнее обновление: ${new Date().toLocaleString('ru-RU')}`;
            }
        }

        // Initialize auto-refresh
        // startAutoRefresh();

        // Stop auto-refresh when page is not visible
        document.addEventListener('visibilitychange', function() {
            if (document.hidden) {
                stopAutoRefresh();
            } else {
                // startAutoRefresh();
            }
        });

        // Keyboard shortcuts
        document.addEventListener('keydown', function(e) {
            // Ctrl+N or Cmd+N - Create new news
            if ((e.ctrlKey || e.metaKey) && e.key === 'n') {
                e.preventDefault();
                window.location.href = "{{ route('admin.news.create') }}";
            }

            // Escape - Close modals
            if (e.key === 'Escape') {
                closeImageModal();
            }
        });

        // Bulk actions (for future implementation)
        function toggleSelectAll() {
            const checkboxes = document.querySelectorAll('input[name="selected_news[]"]');
            const selectAllCheckbox = document.getElementById('selectAll');

            checkboxes.forEach(checkbox => {
                checkbox.checked = selectAllCheckbox.checked;
            });

            updateBulkActions();
        }

        function updateBulkActions() {
            const selectedCount = document.querySelectorAll('input[name="selected_news[]"]:checked').length;
            const bulkActions = document.getElementById('bulkActions');

            if (bulkActions) {
                bulkActions.style.display = selectedCount > 0 ? 'block' : 'none';
            }
        }

        // Initialize tooltips (if you're using a tooltip library)
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize any additional components here
            console.log('News management page loaded');
        });
    </script>
</body>
</html>
