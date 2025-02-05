@extends('layouts.admin')

@section('content')
    <h1>Лойиҳани таҳрирлаш</h1>

    <form action="{{ route('projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Уникал рақам -->
        <div class="form-group mb-3">
            <label for="unique_number">Уникал рақам</label>
            <input type="text" name="unique_number" class="form-control" value="{{ $project->unique_number }}"
                placeholder="мас., YUN0001">
        </div>

        <!-- Категория -->
        <div class="form-group mb-3">
            <label for="category_id">Категория</label>
            <select name="category_id" class="form-control">
                <option value="">— Категорияни танланг —</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $project->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Туман -->
        <div class="form-group mb-3">
            <label for="district">Туман <span style="color:red;">*</span></label>
            <input type="text" name="district" class="form-control" value="{{ $project->district }}" required>
        </div>

        <!-- Кўча -->
        <div class="form-group mb-3">
            <label for="street">Кўча</label>
            <input type="text" name="street" class="form-control" value="{{ $project->street }}"
                placeholder="Кўчани киритинг">
        </div>

        <!-- Маҳалла -->
        <div class="form-group mb-3">
            <label for="mahalla">Маҳалла</label>
            <input type="text" name="mahalla" class="form-control" value="{{ $project->mahalla }}"
                placeholder="Маҳалла номи">
        </div>

        <!-- Ер майдони -->
        <div class="form-group mb-3">
            <label for="land">Ер майдони (га)</label>
            <input type="number" step="0.01" name="land" class="form-control" value="{{ $project->land }}"
                placeholder="мас., 0.12">
        </div>

        <!-- Инвестор ташаббуси санаси -->
        <div class="form-group mb-3">
            <label for="investor_initiative_date">Инвестор ташаббуси санаси</label>
            <input type="date" name="investor_initiative_date" class="form-control"
                value="{{ $project->investor_initiative_date }}">
        </div>

        <!-- Компания номи -->
        <div class="form-group mb-3">
            <label for="company_name">Компания номи</label>
            <input type="text" name="company_name" class="form-control" value="{{ $project->company_name }}"
                placeholder="Компания номи">
        </div>

        <!-- Контакт шахс -->
        <div class="form-group mb-3">
            <label for="contact_person">Контакт шахс</label>
            <input type="text" name="contact_person" class="form-control" value="{{ $project->contact_person }}"
                placeholder="Контакт шахс">
        </div>

        <!-- Ҳоким қарори рақами -->
        <div class="form-group mb-3">
            <label for="hokim_resolution_no">Ҳоким қарори рақами</label>
            <input type="text" name="hokim_resolution_no" class="form-control"
                value="{{ $project->hokim_resolution_no }}" placeholder="Қарор рақами">
        </div>

        <!-- Босқичлар -->
        <div class="form-group mb-3">
            <label for="start_date">1-босқич бошланиш санаси</label>
            <input type="date" name="start_date" class="form-control"
                value="{{ old('start_date', optional($project->start_date)->format('Y-m-d')) }}">
        </div>
        <div class="form-group mb-3">
            <label for="end_date">1-босқич тугаш санаси</label>
            <input type="date" name="end_date" class="form-control"
                value="{{ old('end_date', optional($project->end_date)->format('Y-m-d')) }}">
        </div>
        <div class="form-group mb-3">
            <label for="second_stage_start_date">2-босқич бошланиш санаси</label>
            <input type="date" name="second_stage_start_date" class="form-control"
                value="{{ old('second_stage_start_date', optional($project->second_stage_start_date)->format('Y-m-d')) }}">
        </div>
        <div class="form-group mb-3">
            <label for="second_stage_end_date">2-босқич тугаш санаси</label>
            <input type="date" name="second_stage_end_date" class="form-control"
                value="{{ old('second_stage_end_date', optional($project->second_stage_end_date)->format('Y-m-d')) }}">
        </div>


        @foreach (['elon_fayl' => 'Элон', 'pratakol_fayl' => 'Протокол', 'qoshimcha_fayl' => 'Қўшимча'] as $field => $label)
            <div class="form-group mb-3">
                <label for="{{ $field }}">{{ $label }}</label>
                @if ($project->$field)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $project->$field) }}" alt="{{ $label }}" width="200">
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="delete_{{ $field }}" value="1"
                            class="form-check-input">
                        <label class="form-check-label">Файлни ўчириш</label>
                    </div>
                @endif
                <input type="file" name="{{ $field }}" class="form-control-file">
            </div>
        @endforeach

        <!-- Status -->
        <div class="form-group mb-3">
            <label for="status">Status <span style="color:red;">*</span></label>
            <select name="status" class="form-control">
                <option value="1_step" {{ $project->status == '1_step' ? 'selected' : '' }}>Step 1</option>
                <option value="2_step" {{ $project->status == '2_step' ? 'selected' : '' }}>Step 2</option>
                <option value="archive" {{ $project->status == 'archive' ? 'selected' : '' }}>archive</option>
                <option value="completed" {{ $project->status == 'completed' ? 'selected' : '' }}>Completed</option>
            </select>
        </div>

       



        <!-- Қўшимча маълумотлар -->
        @foreach ([
            'implementation_period' => 'Бажариш муддати (ой)',
            'latitude' => 'Кенглик',
            'longitude' => 'Узунлик',
            'comment' => 'Изоҳ',
            'geolocation' => 'Геолокация',
            'srok_realizatsi' => 'Реализация муддати (ой)',
        ] as $field => $label)
            <div class="form-group mb-3">
                <label for="{{ $field }}">{{ $label }}</label>
                <input
                    type="{{ in_array($field, ['latitude', 'longitude', 'comment', 'geolocation']) ? 'text' : 'number' }}"
                    name="{{ $field }}" class="form-control" value="{{ old($field, $project->$field) }}"
                    placeholder="{{ $label }}">
            </div>
        @endforeach

        <!-- Гео расм -->
        <div class="form-group">
            <label for="geo_image">Гео расм</label>
            <input type="file" name="geo_image" class="form-control-file">
            @if ($project->geo_image)
                <img src="{{ asset('storage/' . $project->geo_image) }}" alt="Гео расм" width="100">
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Янгилаш</button>
    </form>
@endsection
