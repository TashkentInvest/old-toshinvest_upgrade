@extends('layouts.frontend_app')

@section('frontent_content')
    <!-- Bootstrap & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <div class="container py-5">
        <div class="text-center mb-5">
            <h1 class="display-5 fw-bold text-primary">Инвестиционные проекты в строительстве</h1>
            <p class="text-secondary fs-5">
                АО «Компания Ташкент Инвест» объявляет конкурс на отбор лучших предложений для реализации проектов
            </p>
        </div>

        <!-- Projects Grid -->
        <div class="row g-4">

            <!-- Project Card -->
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow-lg rounded-4">
                    <div class="card-header bg-gradient bg-primary text-white fw-bold rounded-top-4">
                        В процессе отбора
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-dark mb-3">
                            <i class="bi bi-geo-alt-fill text-primary me-2"></i>Юнусабадский район
                        </h5>
                        <ul class="list-group list-group-flush mb-3">
                            <li class="list-group-item"><strong>Махалля:</strong> Янгитарнов</li>
                            <li class="list-group-item"><strong>Площадь:</strong> 0,8528 га</li>
                            <li class="list-group-item"><strong>Последняя дата и время подачи заявки:</strong> 09.06.2025г. 18:00 часов.</li>
                        </ul>

                        <div class="d-grid gap-2 mt-3">
                            <a href="{{asset('investment-projects/Эълон_Yunusobod KSZ  02.06.2025.pdf')}}" class="btn btn-outline-secondary btn-sm" download>
                                <i class="bi bi-file-earmark-arrow-down me-1"></i> Скачать объявление
                            </a>
                            <a href="приложение.zip" class="btn btn-outline-secondary btn-sm" download>
                                <i class="bi bi-file-earmark-arrow-down me-1"></i> Скачать приложение
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Duplicate this block for more project cards -->

        </div>
    </div>

    <style>
        body {
            background-color: #f5f8fc;
        }

        .card {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 18px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            font-size: 0.95rem;
            letter-spacing: 0.5px;
        }

        .list-group-item {
            background-color: #fff;
            border: none;
            font-size: 0.95rem;
        }

        .btn i {
            font-size: 1rem;
        }

        @media (max-width: 576px) {
            h1 {
                font-size: 1.75rem;
            }

            .card-title {
                font-size: 1.1rem;
            }
        }
    </style>
@endsection
