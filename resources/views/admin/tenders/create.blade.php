{{-- resources/views/admin/tenders/create.blade.php --}}
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Создать тендер</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Arial, sans-serif; background: #f5f5f5; padding: 20px; }
        .container { max-width: 1000px; margin: 0 auto; background: white; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); overflow: hidden; }
        .header { background: #1e40af; color: white; padding: 20px; display: flex; justify-content: space-between; align-items: center; }
        .header h1 { font-size: 1.5rem; }
        .btn { padding: 10px 20px; border: none; border-radius: 4px; text-decoration: none; font-weight: 500; cursor: pointer; display: inline-block; }
        .btn-primary { background: #3498db; color: white; }
        .btn-primary:hover { background: #2980b9; }
        .btn-secondary { background: #6c757d; color: white; }
        .btn-success { background: #27ae60; color: white; font-size: 1rem; }
        .btn-success:hover { background: #219a52; }
        .form-body { padding: 30px; }
        .form-section { margin-bottom: 30px; padding-bottom: 20px; border-bottom: 1px solid #eee; }
        .form-section:last-child { border-bottom: none; }
        .section-title { font-size: 1.1rem; font-weight: 600; color: #1e40af; margin-bottom: 20px; display: flex; align-items: center; gap: 10px; }
        .form-row { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 20px; margin-bottom: 15px; }
        .form-group { margin-bottom: 15px; }
        .form-group label { display: block; margin-bottom: 5px; font-weight: 500; color: #333; }
        .form-group label .required { color: #e74c3c; }
        .form-control { width: 100%; padding: 10px 12px; border: 1px solid #ddd; border-radius: 4px; font-size: 14px; }
        .form-control:focus { outline: none; border-color: #1e40af; box-shadow: 0 0 0 2px rgba(30, 64, 175, 0.1); }
        textarea.form-control { min-height: 100px; resize: vertical; }
        .checkbox-group { display: flex; align-items: center; gap: 10px; }
        .checkbox-group input[type="checkbox"] { width: 20px; height: 20px; }
        .dynamic-list { background: #f8f9fa; padding: 15px; border-radius: 4px; }
        .dynamic-item { display: flex; gap: 10px; margin-bottom: 10px; }
        .dynamic-item input { flex: 1; }
        .dynamic-item button { padding: 8px 12px; background: #e74c3c; color: white; border: none; border-radius: 4px; cursor: pointer; }
        .add-item-btn { background: #27ae60; color: white; border: none; padding: 8px 15px; border-radius: 4px; cursor: pointer; margin-top: 10px; }
        .form-actions { padding: 20px 30px; background: #f8f9fa; border-top: 1px solid #dee2e6; display: flex; justify-content: space-between; align-items: center; }
        .alert { padding: 15px; margin: 20px 30px; border-radius: 4px; }
        .alert-danger { background: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
        .alert ul { margin: 10px 0 0 20px; }
        .tabs { display: flex; border-bottom: 2px solid #e9ecef; margin-bottom: 20px; }
        .tab { padding: 10px 20px; cursor: pointer; border-bottom: 2px solid transparent; margin-bottom: -2px; color: #6c757d; }
        .tab.active { border-bottom-color: #1e40af; color: #1e40af; font-weight: 600; }
        .tab-content { display: none; }
        .tab-content.active { display: block; }
        @media (max-width: 768px) {
            .form-row { grid-template-columns: 1fr; }
            .header { flex-direction: column; gap: 15px; }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>📋 Создать новый тендер</h1>
            <a href="{{ route('admin.tenders.index') }}" class="btn btn-secondary">← Назад к списку</a>
        </div>

        @if($errors->any())
            <div class="alert alert-danger">
                <strong>Ошибки валидации:</strong>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.tenders.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-body">
                {{-- Basic Information --}}
                <div class="form-section">
                    <div class="section-title">📝 Основная информация</div>

                    <div class="tabs">
                        <div class="tab active" onclick="switchTab('title', 'ru')">🇷🇺 Русский</div>
                        <div class="tab" onclick="switchTab('title', 'uz')">🇺🇿 Узбекский</div>
                        <div class="tab" onclick="switchTab('title', 'en')">🇬🇧 Английский</div>
                    </div>

                    <div id="title-ru" class="tab-content active">
                        <div class="form-group">
                            <label>Название тендера <span class="required">*</span></label>
                            <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
                        </div>
                        <div class="form-group">
                            <label>Предмет закупки <span class="required">*</span></label>
                            <textarea name="subject" class="form-control" required>{{ old('subject') }}</textarea>
                        </div>
                    </div>
                    <div id="title-uz" class="tab-content">
                        <div class="form-group">
                            <label>Название (узб.)</label>
                            <input type="text" name="title_uz" class="form-control" value="{{ old('title_uz') }}">
                        </div>
                        <div class="form-group">
                            <label>Предмет закупки (узб.)</label>
                            <textarea name="subject_uz" class="form-control">{{ old('subject_uz') }}</textarea>
                        </div>
                    </div>
                    <div id="title-en" class="tab-content">
                        <div class="form-group">
                            <label>Title (English)</label>
                            <input type="text" name="title_en" class="form-control" value="{{ old('title_en') }}">
                        </div>
                        <div class="form-group">
                            <label>Subject (English)</label>
                            <textarea name="subject_en" class="form-control">{{ old('subject_en') }}</textarea>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label>Код</label>
                            <input type="text" name="code" class="form-control" value="{{ old('code') }}" placeholder="70.22.12.000-00001">
                        </div>
                        <div class="form-group">
                            <label>Номер лота</label>
                            <input type="text" name="lot_number" class="form-control" value="{{ old('lot_number') }}" placeholder="25120012464150">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>URL лота (etender)</label>
                        <input type="url" name="lot_url" class="form-control" value="{{ old('lot_url') }}" placeholder="https://etender.uzex.uz/lot/...">
                    </div>
                </div>

                {{-- Location --}}
                <div class="form-section">
                    <div class="section-title">📍 Местоположение проекта</div>
                    <div class="form-group">
                        <label>Адрес <span class="required">*</span></label>
                        <input type="text" name="location" class="form-control" value="{{ old('location') }}" required placeholder="Ташкент, Алмазарский район...">
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label>Адрес (узб.)</label>
                            <input type="text" name="location_uz" class="form-control" value="{{ old('location_uz') }}">
                        </div>
                        <div class="form-group">
                            <label>Address (English)</label>
                            <input type="text" name="location_en" class="form-control" value="{{ old('location_en') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Описание местоположения</label>
                        <textarea name="location_description" class="form-control">{{ old('location_description') }}</textarea>
                    </div>
                </div>

                {{-- Requirements --}}
                <div class="form-section">
                    <div class="section-title">📋 Требования</div>

                    <div class="form-group">
                        <label>Технические требования</label>
                        <div class="dynamic-list" id="technical-requirements">
                            <div class="dynamic-item">
                                <input type="text" name="technical_requirements[]" class="form-control" placeholder="Введите требование...">
                                <button type="button" onclick="removeItem(this)">✕</button>
                            </div>
                        </div>
                        <button type="button" class="add-item-btn" onclick="addItem('technical-requirements', 'technical_requirements[]')">+ Добавить требование</button>
                    </div>

                    <div class="form-group">
                        <label>Квалификационные требования</label>
                        <div class="dynamic-list" id="qualification-requirements">
                            <div class="dynamic-item">
                                <input type="text" name="qualification_requirements[]" class="form-control" placeholder="Введите требование...">
                                <button type="button" onclick="removeItem(this)">✕</button>
                            </div>
                        </div>
                        <button type="button" class="add-item-btn" onclick="addItem('qualification-requirements', 'qualification_requirements[]')">+ Добавить требование</button>
                    </div>
                </div>

                {{-- Customer Information --}}
                <div class="form-section">
                    <div class="section-title">🏢 Информация о заказчике</div>
                    <div class="form-group">
                        <label>Название организации <span class="required">*</span></label>
                        <input type="text" name="customer_name" class="form-control" value="{{ old('customer_name', 'АО «Tashkent Invest Company»') }}" required>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label>ИНН</label>
                            <input type="text" name="customer_tin" class="form-control" value="{{ old('customer_tin', '310731897') }}">
                        </div>
                        <div class="form-group">
                            <label>Телефон</label>
                            <input type="text" name="customer_phone" class="form-control" value="{{ old('customer_phone', '+998 71 203 03 03') }}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="customer_email" class="form-control" value="{{ old('customer_email') }}">
                        </div>
                        <div class="form-group">
                            <label>Адрес</label>
                            <input type="text" name="customer_address" class="form-control" value="{{ old('customer_address', 'г. Ташкент, Чиланзарский район, ул. И.Каримова, 51') }}">
                        </div>
                    </div>
                </div>

                {{-- Dates and Status --}}
                <div class="form-section">
                    <div class="section-title">📅 Даты и статус</div>
                    <div class="form-row">
                        <div class="form-group">
                            <label>Дата объявления <span class="required">*</span></label>
                            <input type="date" name="announcement_date" class="form-control" value="{{ old('announcement_date', date('Y-m-d')) }}" required>
                        </div>
                        <div class="form-group">
                            <label>Дедлайн подачи заявок <span class="required">*</span></label>
                            <input type="date" name="submission_deadline" class="form-control" value="{{ old('submission_deadline') }}" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label>Статус <span class="required">*</span></label>
                            <select name="status" class="form-control" required>
                                <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Черновик</option>
                                <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Активный</option>
                                <option value="closed" {{ old('status') == 'closed' ? 'selected' : '' }}>Закрыт</option>
                                <option value="cancelled" {{ old('status') == 'cancelled' ? 'selected' : '' }}>Отменён</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>&nbsp;</label>
                            <div class="checkbox-group">
                                <input type="checkbox" name="is_urgent" id="is_urgent" value="1" {{ old('is_urgent') ? 'checked' : '' }}>
                                <label for="is_urgent" style="margin: 0;">🔴 Срочный тендер</label>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Documents --}}
                <div class="form-section">
                    <div class="section-title">📎 Документы</div>
                    <div class="form-group">
                        <label>Загрузить документы (PDF, DOC, DOCX)</label>
                        <input type="file" name="documents[]" class="form-control" multiple accept=".pdf,.doc,.docx">
                        <small style="color: #666;">Можно загрузить несколько файлов. Максимум 10 МБ каждый.</small>
                    </div>
                </div>
            </div>

            <div class="form-actions">
                <a href="{{ route('admin.tenders.index') }}" class="btn btn-secondary">Отмена</a>
                <button type="submit" class="btn btn-success">💾 Сохранить тендер</button>
            </div>
        </form>
    </div>

    <script>
        function switchTab(section, lang) {
            document.querySelectorAll(`[id^="${section}-"]`).forEach(el => el.classList.remove('active'));
            document.getElementById(`${section}-${lang}`).classList.add('active');

            const tabs = document.querySelectorAll('.tabs')[0].querySelectorAll('.tab');
            tabs.forEach(tab => tab.classList.remove('active'));
            event.target.classList.add('active');
        }

        function addItem(containerId, inputName) {
            const container = document.getElementById(containerId);
            const div = document.createElement('div');
            div.className = 'dynamic-item';
            div.innerHTML = `
                <input type="text" name="${inputName}" class="form-control" placeholder="Введите требование...">
                <button type="button" onclick="removeItem(this)">✕</button>
            `;
            container.appendChild(div);
        }

        function removeItem(btn) {
            const container = btn.parentElement.parentElement;
            if (container.children.length > 1) {
                btn.parentElement.remove();
            }
        }
    </script>
</body>
</html>
