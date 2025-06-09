@extends('layouts.frontend_app')

@section('frontent_content')
    <!-- Bootstrap & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Government Header Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 mx-auto text-center">
                    {{-- <div class="hero-badge">
                        <i class="bi bi-shield-check"></i>
                        <span>Официальный портал</span>
                    </div> --}}
                    <h1 class="hero-title">Инвестиционные проекты в строительстве</h1>
                    <p class="hero-subtitle">
                        АО «Компания Ташкент Инвест» объявляет конкурс на отбор лучших предложений для реализации инвестиционных проектов в сфере строительства
                    </p>
                    {{-- <div class="hero-stats">
                        <div class="stat-item">
                            <strong>2</strong>
                            <span>Активных проекта</span>
                        </div>
                        <div class="stat-item">
                            <strong>0.85</strong>
                            <span>Гектар земли</span>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="projects-section">
        <div class="container">
            <!-- Filter and Search Bar -->
            <div class="filter-section">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h2 class="section-title">Доступные проекты</h2>
                        <p class="section-subtitle">Выберите подходящий инвестиционный проект</p>
                    </div>
                    {{-- <div class="col-md-6">
                        <div class="search-filter-group">
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-search"></i>
                                </span>
                                <input type="text" class="form-control" placeholder="Поиск по району или махалле">
                            </div>
                            <select class="form-select ms-2">
                                <option value="">Все статусы</option>
                                <option value="active">Актуальные</option>
                                <option value="archive">Архив</option>
                            </select>
                        </div>
                    </div> --}}
                </div>
            </div>

            <!-- Projects Grid -->
            <div class="row g-4">
                <!-- Project Card 1 -->
                <div class="col-xl-6">
                    <div class="project-card archived">
                        <div class="card-status-badge archive">
                            <i class="bi bi-archive"></i>
                            <span>Архив</span>
                        </div>

                        <div class="card-header">
                            <div class="project-location">
                                <i class="bi bi-geo-alt-fill"></i>
                                <h3>Юнусабадский район</h3>
                            </div>
                            <div class="project-id">ID: TI-2025-001</div>
                        </div>

                        <div class="card-body">
                            <div class="project-details">
                                <div class="detail-row">
                                    <div class="detail-label">
                                        <i class="bi bi-building"></i>
                                        Махалля
                                    </div>
                                    <div class="detail-value">Янгитарнов</div>
                                </div>

                                <div class="detail-row">
                                    <div class="detail-label">
                                        <i class="bi bi-rulers"></i>
                                        Площадь участка
                                    </div>
                                    <div class="detail-value">0,8528 га</div>
                                </div>

                                <div class="detail-row important">
                                    <div class="detail-label">
                                        <i class="bi bi-clock-history"></i>
                                        Срок подачи заявок
                                    </div>
                                    <div class="detail-value deadline-expired">
                                        09.06.2025г., 18:00
                                        <span class="status-text">Истёк</span>
                                    </div>
                                </div>
                            </div>

                            <div class="project-actions">
                                   <a href="{{asset('investment-projects/Эълон_Yunusobod KSZ  02.06.2025.pdf')}}"
                                   class="btn btn-primary text-light" download>
                                    <i class="bi bi-file-earmark-pdf"></i>
                                    Объявление
                                </a>
                                <a href="приложение.zip" class="btn btn-outline-secondary" download>
                                    <i class="bi bi-file-earmark-zip"></i>
                                    Приложения
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Project Card 2 -->
                <div class="col-xl-6">
                    <div class="project-card active">
                        <div class="card-status-badge active">
                            <i class="bi bi-circle-fill"></i>
                            <span>Актуальный</span>
                        </div>

                        <div class="card-header">
                            <div class="project-location">
                                <i class="bi bi-geo-alt-fill"></i>
                                <h3>Юнусабадский район</h3>
                            </div>
                            <div class="project-id">ID: TI-2025-002</div>
                        </div>

                        <div class="card-body">
                            <div class="project-details">
                                <div class="detail-row">
                                    <div class="detail-label">
                                        <i class="bi bi-building"></i>
                                        Махалля
                                    </div>
                                    <div class="detail-value">Янгитарнов</div>
                                </div>

                                <div class="detail-row">
                                    <div class="detail-label">
                                        <i class="bi bi-rulers"></i>
                                        Площадь участка
                                    </div>
                                    <div class="detail-value">0,8528 га</div>
                                </div>

                                <div class="detail-row important">
                                    <div class="detail-label">
                                        <i class="bi bi-clock"></i>
                                        Срок подачи заявок
                                    </div>
                                    <div class="detail-value deadline-active">
                                        16.00.2025г., 18:00
                                        <span class="status-text">Активный</span>
                                    </div>
                                </div>
                            </div>

                            <div class="alert alert-info">
                                <i class="bi bi-info-circle"></i>
                                <strong>Уведомление:</strong> В связи с отсутствием поступивших предложений по данному ЛОТу, срок и время подачи предложений продлён до 18:00 часов 16 июня 2025 года.
                            </div>

                            <div class="project-actions">
                                <a href="{{asset('investment-projects/Эълон_Yunusobod KSZ  02.06.2025.pdf')}}"
                                   class="btn btn-primary text-light" download>
                                    <i class="bi bi-file-earmark-pdf"></i>
                                    Объявление
                                </a>
                                <a href="приложение.zip" class="btn btn-outline-primary" download>
                                    <i class="bi bi-file-earmark-zip"></i>
                                    Приложения
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Information -->
            {{-- <div class="contact-section">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <div class="contact-card">
                            <h3>Контактная информация</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="contact-item">
                                        <i class="bi bi-telephone"></i>
                                        <div>
                                            <strong>Телефон</strong>
                                            <p>+998 71 210 02 61</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="contact-item">
                                        <i class="bi bi-envelope"></i>
                                        <div>
                                            <strong>Email</strong>
                                            <p>info@tashkentinvest.com</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </section>

    <style>
        :root {
            --primary-color: #1e40af;
            --secondary-color: #3b82f6;
            --success-color: #10b981;
            --warning-color: #f59e0b;
            --danger-color: #ef4444;
            --light-gray: #f8fafc;
            --medium-gray: #e2e8f0;
            --dark-gray: #475569;
            --white: #ffffff;
            --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            --border-radius: 12px;
        }

        body {
            background-color: var(--light-gray);
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            line-height: 1.6;
            color: var(--dark-gray);
        }

        /* Hero Section */
        .hero-section {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: var(--white);
            padding: 80px 0;
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grid" width="10" height="10" patternUnits="userSpaceOnUse"><path d="M 10 0 L 0 0 0 10" fill="none" stroke="rgba(255,255,255,0.1)" stroke-width="1"/></pattern></defs><rect width="100" height="100" fill="url(%23grid)"/></svg>');
            opacity: 0.3;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            padding: 8px 16px;
            border-radius: 50px;
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 24px;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .hero-title {
            font-size: clamp(2rem, 4vw, 3.5rem);
            font-weight: 700;
            margin-bottom: 24px;
            line-height: 1.2;
        }

        .hero-subtitle {
            font-size: 1.25rem;
            opacity: 0.9;
            margin-bottom: 40px;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .hero-stats {
            display: flex;
            justify-content: center;
            gap: 48px;
            flex-wrap: wrap;
        }

        .stat-item {
            text-align: center;
        }

        .stat-item strong {
            display: block;
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 4px;
            color: var(--white);
        }

        .stat-item span {
            font-size: 0.9rem;
            opacity: 0.8;
        }

        /* Projects Section */
        .projects-section {
            padding: 80px 0;
        }

        .filter-section {
            margin-bottom: 48px;
        }

        .section-title {
            font-size: 2rem;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 8px;
        }

        .section-subtitle {
            color: var(--dark-gray);
            margin-bottom: 0;
        }

        .search-filter-group {
            display: flex;
            gap: 12px;
        }

        .search-filter-group .form-control,
        .search-filter-group .form-select {
            border: 2px solid var(--medium-gray);
            border-radius: var(--border-radius);
            padding: 12px 16px;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        .search-filter-group .form-control:focus,
        .search-filter-group .form-select:focus {
            border-color: var(--secondary-color);
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        .input-group-text {
            background: var(--white);
            border: 2px solid var(--medium-gray);
            border-right: none;
            color: var(--dark-gray);
        }

        /* Project Cards */
        .project-card {
            background: var(--white);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow-md);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            border: 1px solid var(--medium-gray);
        }

        .project-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-lg);
        }

        .project-card.active {
            border-left: 4px solid var(--success-color);
        }

        .project-card.archived {
            border-left: 4px solid var(--warning-color);
            opacity: 0.9;
        }

        .card-status-badge {
            position: absolute;
            top: 16px;
            right: 16px;
            display: flex;
            align-items: center;
            gap: 6px;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .card-status-badge.active {
            background: rgba(16, 185, 129, 0.1);
            color: var(--success-color);
        }

        .card-status-badge.archive {
            background: rgba(245, 158, 11, 0.1);
            color: var(--warning-color);
        }

        .card-header {
            padding: 24px 24px 16px;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }

        .project-location {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .project-location i {
            color: var(--secondary-color);
            font-size: 1.25rem;
        }

        .project-location h3 {
            margin: 0;
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--primary-color);
        }

        .project-id {
            font-size: 0.9rem;
            color: var(--dark-gray);
            background: var(--light-gray);
            padding: 4px 8px;
            border-radius: 6px;
margin-top: 30px;
            font-family: 'Monaco', 'Menlo', monospace;
        }

        .card-body {
            padding: 0 24px 24px;
        }

        .project-details {
            margin-bottom: 24px;
        }

        .detail-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 0;
            border-bottom: 1px solid var(--medium-gray);
        }

        .detail-row:last-child {
            border-bottom: none;
        }

        .detail-row.important {
            background: rgba(59, 130, 246, 0.03);
            margin: 0 -12px;
            padding: 12px;
            border-radius: 8px;
            border: none;
        }

        .detail-label {
            display: flex;
            align-items: center;
            gap: 8px;
            font-weight: 500;
            color: var(--dark-gray);
            font-size: 0.95rem;
        }

        .detail-label i {
            color: var(--secondary-color);
            width: 16px;
        }

        .detail-value {
            font-weight: 600;
            text-align: right;
            color: var(--primary-color);
        }

        .deadline-expired {
            color: var(--danger-color);
        }

        .deadline-active {
            color: var(--success-color);
        }

        .status-text {
            display: block;
            font-size: 0.8rem;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-top: 2px;
        }

        .alert {
            border: none;
            border-radius: var(--border-radius);
            padding: 16px;
            margin-bottom: 24px;
            display: flex;
            align-items: flex-start;
            gap: 12px;
            background: rgba(59, 130, 246, 0.1);
            color: var(--primary-color);
            border-left: 4px solid var(--secondary-color);
        }

        .alert i {
            margin-top: 2px;
            font-size: 1.1rem;
        }

        .project-actions {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 12px 20px;
            border-radius: var(--border-radius);
            font-weight: 500;
            font-size: 0.95rem;
            text-decoration: none;
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }

        .btn-primary {
            background: var(--primary-color);
            color: var(--white);
        }

        .btn-primary:hover {
            background: #1d4ed8;
            transform: translateY(-1px);
        }

        .btn-outline-primary {
            border-color: var(--primary-color);
            color: var(--primary-color);
            background: transparent;
        }

        .btn-outline-primary:hover {
            background: var(--primary-color);
            color: var(--white);
        }

        .btn-outline-secondary {
            border-color: var(--dark-gray);
            color: var(--dark-gray);
            background: transparent;
        }

        .btn-outline-secondary:hover {
            background: var(--dark-gray);
            color: var(--white);
        }

        /* Contact Section */
        .contact-section {
            margin-top: 80px;
        }

        .contact-card {
            background: var(--white);
            border-radius: var(--border-radius);
            padding: 40px;
            box-shadow: var(--shadow-md);
            border: 1px solid var(--medium-gray);
        }

        .contact-card h3 {
            color: var(--primary-color);
            margin-bottom: 32px;
            text-align: center;
            font-size: 1.5rem;
            font-weight: 600;
        }

        .contact-item {
            display: flex;
            align-items: center;
            gap: 16px;
            margin-bottom: 24px;
        }

        .contact-item i {
            color: var(--secondary-color);
            font-size: 1.5rem;
            width: 24px;
        }

        .contact-item strong {
            display: block;
            margin-bottom: 4px;
            color: var(--primary-color);
        }

        .contact-item p {
            margin: 0;
            color: var(--dark-gray);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .hero-section {
                padding: 60px 0;
            }

            .hero-stats {
                gap: 32px;
            }

            .projects-section {
                padding: 60px 0;
            }

            .search-filter-group {
                flex-direction: column;
                gap: 16px;
            }

            .card-header {
                flex-direction: column;
                gap: 16px;
                align-items: flex-start;
            }

            .project-id {
                align-self: flex-end;
            }

            .detail-row {
                flex-direction: column;
                align-items: flex-start;
                gap: 8px;
            }

            .detail-value {
                text-align: left;
            }

            .project-actions {
                flex-direction: column;
            }

            .btn {
                justify-content: center;
            }

            .contact-card {
                padding: 24px;
            }
        }

        @media (max-width: 576px) {
            .hero-title {
                font-size: 1.75rem;
            }

            .hero-subtitle {
                font-size: 1.1rem;
            }

            .section-title {
                font-size: 1.5rem;
            }

            .filter-section .row {
                flex-direction: column;
                gap: 24px;
            }

            .card-status-badge {
                position: static;
                align-self: flex-start;
                margin-bottom: 16px;
            }
        }

        /* Accessibility */
        @media (prefers-reduced-motion: reduce) {
            * {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
            }
        }

        /* Focus styles for keyboard navigation */
        .btn:focus,
        .form-control:focus,
        .form-select:focus {
            outline: 2px solid var(--secondary-color);
            outline-offset: 2px;
        }

        /* Print styles */
        @media print {
            .hero-section {
                background: none !important;
                color: black !important;
            }

            .project-card {
                box-shadow: none !important;
                border: 1px solid #ccc !important;
            }
        }
    </style>
@endsection
