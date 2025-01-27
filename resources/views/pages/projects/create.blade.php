@extends('layouts.admin')

@section('content')
    <h1 class="mb-4">Лойиҳани Яратиш</h1>

    <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data" class="p-4 bg-light shadow rounded">
        @csrf

        <div class="row">
            <!-- Unique Number -->
            <div class="form-group col-md-6 mb-3">
                <label for="unique_number">Уникал рақам</label>
                <input type="text" name="unique_number" class="form-control" placeholder="масалан, YUN0001">
            </div>

            <!-- Category -->
            <div class="form-group col-md-6 mb-3">
                <label for="category_id">Категория</label>
                <select name="category_id" class="form-control">
                    <option value="">— Категорияни танланг —</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row">
            <!-- District -->
            <div class="form-group col-md-6 mb-3">
                <label for="district">Туман <span style="color:red;">*</span></label>
                <input type="text" name="district" class="form-control" placeholder="Туманни киритинг" required>
            </div>

            <!-- Street -->
            <div class="form-group col-md-6 mb-3">
                <label for="street">Кўча</label>
                <input type="text" name="street" class="form-control" placeholder="Кўчани киритинг">
            </div>
        </div>

        <div class="row">
            <!-- Mahalla Name -->
            <div class="form-group col-md-6 mb-3">
                <label for="mahalla">Маҳалла номи</label>
                <input type="text" name="mahalla" class="form-control" placeholder="Маҳалла номини киритинг">
            </div>

            <!-- Land -->
            <div class="form-group col-md-6 mb-3">
                <label for="land">Ер (га)</label>
                <input type="number" step="0.01" name="land" class="form-control" placeholder="масалан, 0.12">
            </div>
        </div>

        <div class="row">
            <!-- Investor Initiative Date -->
            <div class="form-group col-md-6 mb-3">
                <label for="investor_initiative_date">Инвестор ташаббус санаси</label>
                <input type="date" name="investor_initiative_date" class="form-control">
            </div>

            <!-- Company Name -->
            <div class="form-group col-md-6 mb-3">
                <label for="company_name">Компания номи</label>
                <input type="text" name="company_name" class="form-control" placeholder="Компания номини киритинг">
            </div>
        </div>

        <div class="row">
            <!-- Contact Person -->
            <div class="form-group col-md-6 mb-3">
                <label for="contact_person">Масъул шахс</label>
                <input type="text" name="contact_person" class="form-control" placeholder="Масъул шахсни киритинг">
            </div>

            <!-- Hokim Resolution Number -->
            <div class="form-group col-md-6 mb-3">
                <label for="hokim_resolution_no">Ҳоким қарори рақами</label>
                <input type="text" name="hokim_resolution_no" class="form-control" placeholder="Ҳоким қарори рақамини киритинг">
            </div>
        </div>

        <!-- Date Fields -->
        <div class="row">
            <div class="form-group col-md-3 mb-3">
                <label for="start_date">1-Этап Бошланиш Санаси</label>
                <input type="date" name="start_date" class="form-control" value="{{ old('start_date') }}">
            </div>

            <div class="form-group col-md-3 mb-3">
                <label for="end_date">1-Этап Якуни Санаси</label>
                <input type="date" name="end_date" class="form-control" value="{{ old('end_date') }}">
            </div>

            <div class="form-group col-md-3 mb-3">
                <label for="second_stage_start_date">2-Этап Бошланиш Санаси</label>
                <input type="date" name="second_stage_start_date" class="form-control" value="{{ old('second_stage_start_date') }}">
            </div>

            <div class="form-group col-md-3 mb-3">
                <label for="second_stage_end_date">2-Этап Якуни Санаси</label>
                <input type="date" name="second_stage_end_date" class="form-control" value="{{ old('second_stage_end_date') }}">
            </div>
        </div>

        <!-- File Uploads -->
        <div class="row">
            <div class="form-group col-md-4 mb-3">
                <label for="elon_fayl">Эълон Файли</label>
                <input type="file" name="elon_fayl" class="form-control-file">
            </div>

            <div class="form-group col-md-4 mb-3">
                <label for="pratakol_fayl">Протокол Файли</label>
                <input type="file" name="pratakol_fayl" class="form-control-file">
            </div>

            <div class="form-group col-md-4 mb-3">
                <label for="qoshimcha_fayl">Қўшимча Файли</label>
                <input type="file" name="qoshimcha_fayl" class="form-control-file">
            </div>
        </div>

        <!-- Implementation Period -->
        <div class="form-group mb-3">
            <label for="implementation_period">Амалга ошириш муддати (ой)</label>
            <input type="number" name="implementation_period" class="form-control" placeholder="масалан, 36">
        </div>

        <!-- Status -->
        <div class="form-group mb-3">
            <label for="status">Ҳолат <span style="color:red;">*</span></label>
            <select name="status" class="form-control">
                <option value="1_step">1-Қадам</option>
                <option value="2_step">2-Қадам</option>
                <option value="archive">Архивланган</option>
                <option value="completed">Якунланган</option>
            </select>
        </div>

        <!-- Coordinates and Comments -->
        <div class="row">
            <div class="form-group col-md-6 mb-3">
                <label for="latitude">Кенглик</label>
                <input type="text" name="latitude" class="form-control" placeholder="Кенгликни киритинг">
            </div>

            <div class="form-group col-md-6 mb-3">
                <label for="longitude">Узунлик</label>
                <input type="text" name="longitude" class="form-control" placeholder="Узунликни киритинг">
            </div>
        </div>

        <div class="form-group mb-3">
            <label for="comment">Изоҳ</label>
            <textarea name="comment" class="form-control" placeholder="Изоҳни киритинг">{{ old('comment') }}</textarea>
        </div>

        <!-- Geolocation -->
        <div class="form-group mb-3">
            <label for="geolocation">Геолокация</label>
            <textarea name="geolocation" class="form-control" placeholder="Геолокацияни киритинг">{{ old('geolocation') }}</textarea>
        </div>

        <!-- Geo Image -->
        <div class="form-group mb-3">
            <label for="geo_image">Гео Расм</label>
            <input type="file" name="geo_image" class="form-control-file">
        </div>

        <!-- Srok Realizatsi -->
        <div class="form-group mb-3">
            <label for="srok_realizatsi">Ишга тушириш муддати (ой)</label>
            <input type="number" name="srok_realizatsi" class="form-control" placeholder="масалан, 12">
        </div>

        <button type="submit" class="btn btn-success w-100">Лойиҳани Яратиш</button>
    </form>
@endsection
