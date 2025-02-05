@extends('layouts.admin')

@section('content')
    <div class="card shadow p-4">
        <h1 class="mb-4 text-primary"><i class="fas fa-plus-circle"></i> Лойиҳани Яратиш</h1>

        <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <!-- Уникал рақам -->
                <div class="col-md-6 mb-3">
                    <label for="unique_number">Уникал рақам</label>
                    <input type="text" name="unique_number" class="form-control" placeholder="масалан, YUN0001">
                </div>

                <!-- Категория -->
                <div class="col-md-6 mb-3">
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
                <!-- Туман -->
                <div class="col-md-6 mb-3">
                    <label for="district">Туман <span class="text-danger">*</span></label>
                    <input type="text" name="district" class="form-control" placeholder="Туманни киритинг" required>
                </div>

                <!-- Кўча -->
                <div class="col-md-6 mb-3">
                    <label for="street">Кўча</label>
                    <input type="text" name="street" class="form-control" placeholder="Кўчани киритинг">
                </div>
            </div>

            <div class="row">
                <!-- Маҳалла -->
                <div class="col-md-6 mb-3">
                    <label for="mahalla">Маҳалла номи</label>
                    <input type="text" name="mahalla" class="form-control" placeholder="Маҳалла номини киритинг">
                </div>

                <!-- Ер майдони -->
                <div class="col-md-6 mb-3">
                    <label for="land">Ер (га)</label>
                    <input type="number" step="0.01" name="land" class="form-control" placeholder="масалан, 0.12">
                </div>
            </div>

            <div class="row">
                <!-- Компания ва контакт шахс -->
                <div class="col-md-6 mb-3">
                    <label for="company_name">Компания номи</label>
                    <input type="text" name="company_name" class="form-control" placeholder="Компания номини киритинг">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="contact_person">Масъул шахс</label>
                    <input type="text" name="contact_person" class="form-control" placeholder="Масъул шахсни киритинг">
                </div>
            </div>

            <!-- Босқичлар -->
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="start_date">1-Этап Бошланиш Санаси</label>
                    <input type="date" name="start_date" class="form-control">
                </div>

                <div class="col-md-6 mb-3">
                    <label for="end_date">1-Этап Якуни Санаси</label>
                    <input type="date" name="end_date" class="form-control">
                </div>

                <div class="col-md-6 mb-3">
                    <label for="second_stage_start_date">2-Этап Бошланиш Санаси</label>
                    <input type="date" name="second_stage_start_date" class="form-control"
                        value="{{ old('second_stage_start_date') }}">
                </div>

                <div class="col-md-6 mb-3">
                    <label for="second_stage_end_date">2-Этап Якуни Санаси</label>
                    <input type="date" name="second_stage_end_date" class="form-control"
                        value="{{ old('second_stage_end_date') }}">
                </div>
            </div>

            <!-- Файл юклаш -->
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="elon_fayl">Эълон Файли</label>
                    <input type="file" name="elon_fayl" class="form-control-file">
                </div>

                <div class="col-md-4 mb-3">
                    <label for="pratakol_fayl">Протокол Файли</label>
                    <input type="file" name="pratakol_fayl" class="form-control-file">
                </div>

                <div class="col-md-4 mb-3">
                    <label for="qoshimcha_fayl">Қўшимча Файли</label>
                    <input type="file" name="qoshimcha_fayl" class="form-control-file">
                </div>
            </div>

            <!-- Статус -->
            <div class="col-md-6 mb-3">
                <label for="status">Ҳолат <span class="text-danger">*</span></label>
                <select name="status" class="form-control">
                    <option value="1_step">1-Қадам</option>
                    <option value="2_step">2-Қадам</option>
                    <option value="archive">Архивланган</option>
                    <option value="completed">Якунланган</option>
                </select>
            </div>

            <!-- Геолокация -->
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="latitude">Кенглик</label>
                    <input type="text" name="latitude" class="form-control" placeholder="Кенгликни киритинг">
                </div>

                <div class="col-md-6 mb-3">
                    <label for="longitude">Узунлик</label>
                    <input type="text" name="longitude" class="form-control" placeholder="Узунликни киритинг">
                </div>
            </div>

            <!-- Изоҳ -->
            <div class="col-12 mb-3">
                <label for="comment">Изоҳ</label>
                <textarea name="comment" class="form-control" placeholder="Изоҳни киритинг"></textarea>
            </div>

            <!-- Submit -->
            <div class="col-12 mt-3">
                <button type="submit" class="btn btn-success w-100">Лойиҳани Яратиш</button>
            </div>
        </form>
    </div>
@endsection
