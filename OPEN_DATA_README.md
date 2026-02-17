# 📊 Система управления "Открытыми данными" (Open Data System)

## 🚀 Быстрый старт

### 1️⃣ Развертывание системы

```bash
# Перейти в проект
cd tashkentinvest.uz

# Запустить миграцию (если еще не выполнена)
php artisan migrate

# Создать символическую ссылку для файлов
php artisan storage:link

# Запустить сервер
php artisan serve
```

### 2️⃣ Доступ к системе

#### Админ-панель
```
http://localhost:8000/admin/open-data
```

Здесь вы сможете:
- ➕ Добавить новый документ
- ✏️ Редактировать существующие
- 🗑️ Удалить ненужные
- 🔍 Искать по названию
- 📋 Отсортировать по порядку

#### Публичная страница
```
http://localhost:8000/open-data
```

Пользователи смогут:
- 👀 Просмотреть все открытые документы
- 📥 Скачать файлы
- 🌍 Видеть документы на текущем языке

---

## 📝 Как добавить новый документ

### Шаг 1: Перейти в админ-панель
```
/admin/open-data → Click "Add New"
```

### Шаг 2: Заполнить данные

```
Поле              | Язык    | Обязательное | Пример
------------------|---------|-------------|-----------------------------------
Title (UZ)        | UZ      | ✓ Да        | "Утвержденный план работы АО"
Title (RU)        | RU      | ✓ Да        | "Утвержденный план работы АО"
Title (EN)        | EN      | ✗ Нет       | "Approved action plan of JSC"
Description (UZ)  | UZ      | ✗ Нет       | Описание документа...
Description (RU)  | RU      | ✗ Нет       | Описание документа...
Description (EN)  | EN      | ✗ Нет       | Description of the document...
File              | -       | ✓ Да        | document.pdf (макс 50MB)
Sort Order        | -       | ✗ Нет       | 0 (меньше = выше в списке)
Active            | -       | ✗ Нет       | ☑ (активировать для показа)
```

### Шаг 3: Загрузить файл

Поддерживаемые форматы:
- 📄 Документы: PDF, DOC, DOCX, PPT, PPTX
- 📊 Таблицы: XLSX, XLS
- 🖼️ Изображения: JPG, JPEG, PNG, GIF
- 📦 Архивы: ZIP

**Максимальный размер:** 50 МБ

### Шаг 4: Сохранить
```
Click "Create" button
```

---

## 🎨 Пример структуры данных

```
Документ #1
├─ Название (UZ): "Ochiq Ma'lumotlar 2026"
├─ Название (RU): "Открытые данные 2026"
├─ Файл: plan_2026.pdf (448.36 KB)
├─ Тип: PDF
└─ Порядок: 0 (первый в списке)

Документ #2
├─ Название (UZ): "Svedaniyalar"
├─ Название (RU): "Сведения об объектах"
├─ Файл: objects.xlsx (38.39 KB)
├─ Тип: XLSX
└─ Порядок: 1 (второй в списке)
```

---

## 🌍 Локализация (3 языка)

### Узбекский (uz)
- Название: "Ochiq Ma'lumotlar"
- URL: `/open-data?locale=uz`

### Русский (ru)
- Название: "Открытые данные"
- URL: `/open-data?locale=ru`

### Английский (en)
- Название: "Open Data"
- URL: `/open-data?locale=en`

Если для документа не указан перевод на выбранный язык, будет показан русский.

---

## 📦 Структура хранилища файлов

```
storage/
└── app/
    └── public/
        └── open-data/
            ├── 1708173456_a1b2c3d4e5.pdf
            ├── 1708173457_f6g7h8i9j0.xlsx
            └── ...
```

**Примечание:** Файлы хранятся с временной меткой и случайным идентификатором для безопасности.

---

## 🔒 Безопасность

✅ **Валидация файлов** - проверка типа и размера
✅ **Безопасное хранилище** - файлы вне публичной папки
✅ **Автоматическое удаление** - при удалении записи
✅ **CSRF защита** - на всех формах
✅ **Авторизация** - доступ только авторизованным пользователям

---

## 🛠️ Техническая информация

### Таблица базы данных: `open_data`

```sql
- id (bigint, PK)
- title_uz (string, 255) - REQUIRED
- title_ru (string, 255) - REQUIRED
- title_en (string, 255) - NULLABLE
- description_uz (text) - NULLABLE
- description_ru (text) - NULLABLE
- description_en (text) - NULLABLE
- file_path (string) - REQUIRED
- file_type (string) - REQUIRED
- file_size (bigint) - NULLABLE
- sort_order (int, indexed, default: 0)
- is_active (boolean, indexed, default: true)
- created_at (timestamp)
- updated_at (timestamp)
```

### Файлы в проекте

```
app/Models/OpenData.php
app/Http/Controllers/Admin/OpenDataController.php
app/Http/Controllers/FrontendController.php (modified)
database/migrations/2026_02_17_184456_create_open_data_table.php
resources/views/admin/open-data/index.blade.php
resources/views/admin/open-data/create.blade.php
resources/views/admin/open-data/edit.blade.php
resources/views/pages/frontend/open_data.blade.php
resources/lang/*/admin_open_data.php (uz, ru, en)
resources/lang/*/frontend.php (modified)
routes/web.php (modified)
```

---

## 🐛 Часто задаваемые вопросы

### Q: Как удалить файл, но оставить запись?
**A:** На странице редактирования есть информация о текущем файле. Загрузьте новый файл, и старый заменится.

### Q: Как управлять порядком документов?
**A:** Используйте поле "Sort Order". Документы с меньшим номером появляются в начале списка (0 = первый).

### Q: Как активировать/деактивировать документ?
**A:** Отмечайте/снимайте галочку "Active" при создании или редактировании.

### Q: Какие форматы файлов поддерживаются?
**A:** PDF, XLSX, XLS, DOC, DOCX, PPT, PPTX, JPG, JPEG, PNG, GIF, ZIP

### Q: Какой максимальный размер файла?
**A:** 50 МБ

### Q: Как скачивать файлы на фронтенде?
**A:** Нажмите кнопку "Download" на нужном документе

---

## 📞 Поддержка

Документация находится в файлах:
- `OPEN_DATA_COMPLETE.md` - полное описание
- `OPEN_DATA_SETUP.md` - подробное руководство
- `CHECKLIST_OPEN_DATA.md` - полный чек-лист

---

## ✅ Система готова к использованию!

**Дата создания:** 17.02.2026
**Версия:** 1.0
**Статус:** ✅ Production Ready

