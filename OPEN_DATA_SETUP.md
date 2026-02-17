# Система управления "Открытыми данными" (Open Data)

## Описание

Система для управления файлами открытых данных в админ-панели с поддержкой трёх языков (узбекский, русский, английский).

## Созданные компоненты

### 1. Модель и миграция
- **Модель**: `App\Models\OpenData`
- **Таблица**: `open_data`
- **Файлы**:
  - `app/Models/OpenData.php`
  - `database/migrations/2026_02_17_184456_create_open_data_table.php`

### 2. Контроллер
- **Путь**: `app/Http/Controllers/Admin/OpenDataController.php`
- **Методы**:
  - `index()` - список всех открытых данных
  - `create()` - форма создания
  - `store()` - сохранение новой записи
  - `edit()` - форма редактирования
  - `update()` - обновление записи
  - `destroy()` - удаление записи
  - `removeFile()` - удаление файла

### 3. Маршруты
```php
// Админ-панель
Route::prefix('admin/open-data')->name('admin.open-data.')->group(function () {
    Route::get('/', [OpenDataController::class, 'index'])->name('index');
    Route::get('/create', [OpenDataController::class, 'create'])->name('create');
    Route::post('/', [OpenDataController::class, 'store'])->name('store');
    Route::get('/{id}', [OpenDataController::class, 'show'])->name('show');
    Route::get('/{id}/edit', [OpenDataController::class, 'edit'])->name('edit');
    Route::put('/{id}', [OpenDataController::class, 'update'])->name('update');
    Route::delete('/{id}', [OpenDataController::class, 'destroy'])->name('destroy');
    Route::post('/{id}/remove-file', [OpenDataController::class, 'removeFile'])->name('removeFile');
});

// Фронтенд
Route::get('/open-data', [FrontendController::class, 'open_data'])->name('open_data');
```

### 4. Представления (Blade templates)

#### Админ-панель
- `resources/views/admin/open-data/index.blade.php` - список документов
- `resources/views/admin/open-data/create.blade.php` - форма создания
- `resources/views/admin/open-data/edit.blade.php` - форма редактирования

#### Фронтенд
- `resources/views/pages/frontend/open_data.blade.php` - публичная страница с открытыми данными

### 5. Языковые файлы

#### Админ-панель
- `resources/lang/uz/admin_open_data.php`
- `resources/lang/ru/admin_open_data.php`
- `resources/lang/en/admin_open_data.php`

#### Фронтенд
Добавлены ключи `open_data`, `breadcrumb` и `messages` в:
- `resources/lang/uz/frontend.php`
- `resources/lang/ru/frontend.php`
- `resources/lang/en/frontend.php`

## Структура таблицы `open_data`

| Колонка | Тип | Описание |
|---------|-----|---------|
| id | bigint | Первичный ключ |
| title_uz | string | Название на узбекском |
| title_ru | string | Название на русском |
| title_en | string | Название на английском |
| description_uz | text | Описание на узбекском |
| description_ru | text | Описание на русском |
| description_en | text | Описание на английском |
| file_path | string | Путь к загруженному файлу |
| file_type | string | Тип файла (PDF, XLSX и т.д.) |
| file_size | bigint | Размер файла в байтах |
| sort_order | integer | Порядок сортировки |
| is_active | boolean | Активен ли документ |
| created_at | timestamp | Дата создания |
| updated_at | timestamp | Дата обновления |

## Использование

### Админ-панель

1. Перейдите в `/admin/open-data`
2. Нажмите "Add New" для создания нового документа
3. Заполните поля на всех трёх языках
4. Загрузите файл (макс. 50МБ)
5. Установите порядок сортировки
6. Активируйте документ если необходимо
7. Сохраните

### Фронтенд

Документы отображаются на странице `/open-data` в красивых карточках с:
- Иконкой типа файла
- Названием на текущем языке
- Описанием (первые 100 символов)
- Размером файла
- Кнопками "View" и "Download"

## Поддерживаемые форматы файлов

- Документы: PDF, DOC, DOCX, PPT, PPTX
- Таблицы: XLSX, XLS
- Изображения: JPG, JPEG, PNG, GIF
- Архивы: ZIP

## Особенности

✅ Полная поддержка 3 языков
✅ Загрузка файлов с валидацией
✅ Сортировка документов
✅ Активация/деактивация
✅ Отображение размера файла
✅ Прямое скачивание файлов
✅ Красивый интерфейс для фронтенда
✅ Автоматическое определение типа файла

## Примечания

- Файлы хранятся в `storage/app/public/open-data/`
- Убедитесь, что запущена команда `php artisan storage:link`
- Максимальный размер файла: 50МБ
- Поля на русском и узбекском являются обязательными, английский - опциональный

