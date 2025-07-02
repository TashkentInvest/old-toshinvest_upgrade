@extends('layouts.frontend_app')
@section('frontent_content')

{{-- Management Board Hero Section --}}
<section class="management-hero">
    <div class="hero-background">
        <div class="hero-pattern"></div>
        <div class="hero-overlay"></div>
    </div>
    <div class="container">
        <div class="hero-content">
            <div class="breadcrumb">
                <a href="{{ route('frontend.index') }}" class="breadcrumb-link">Главная</a>
                <span class="breadcrumb-separator">→</span>
                <span class="breadcrumb-current">Правление</span>
            </div>
            <div class="hero-badge">
                <span class="badge-text">Исполнительный орган</span>
            </div>
            <h1 class="page-title">Правление</h1>
            <p class="page-subtitle">Исполнительный орган АО «Компания Ташкент Инвест», осуществляющий оперативное управление деятельностью компании</p>
        </div>
    </div>
</section>

{{-- Management Members Section --}}
<section class="management-members">
    <div class="container">
        <div class="members-table-wrapper">
            <table class="members-table">
                <thead>
                    <tr>
                        <th>ФИО</th>
                        <th>Должность</th>
                        <th>Подразделение</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Шакиров Бахром Аскаралиевич</td>
                        <td>Председатель правления</td>
                        <td>Генеральный директор</td>
                    </tr>
                    <tr>
                        <td>Кодиров Рустам Шухратович</td>
                        <td>Заместитель председателя правления</td>
                        <td>По стратегическому развитию</td>
                    </tr>
                    <tr>
                        <td>Отахонова Наргизахон Ганиевна</td>
                        <td>Заместитель председателя правления</td>
                        <td>По управлению проектами</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>

<style>
/* Management Hero Section */
.management-hero {
    position: relative;
    padding: 80px 0 60px;
    background-color: #f8f9fa;
    overflow: hidden;
}

.hero-background {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
}

.hero-pattern {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    opacity: 0.05;
    background-image: repeating-linear-pattern;
}

.hero-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(255, 255, 255, 0.9);
}

.hero-content {
    position: relative;
    z-index: 2;
    max-width: 800px;
}

.breadcrumb {
    margin-bottom: 20px;
    font-size: 14px;
}

.breadcrumb-link {
    color: #666;
    text-decoration: none;
    transition: color 0.3s ease;
}

.breadcrumb-link:hover {
    color: #333;
}

.breadcrumb-separator {
    margin: 0 10px;
    color: #999;
}

.breadcrumb-current {
    color: #333;
    font-weight: 500;
}

.hero-badge {
    display: inline-block;
    margin-bottom: 20px;
}

.badge-text {
    display: inline-block;
    padding: 8px 16px;
    background-color: #e9ecef;
    color: #495057;
    font-size: 13px;
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    border-radius: 20px;
}

.page-title {
    font-size: 48px;
    font-weight: 700;
    color: #212529;
    margin-bottom: 20px;
    line-height: 1.2;
}

.page-subtitle {
    font-size: 18px;
    color: #6c757d;
    line-height: 1.6;
    margin: 0;
}

/* Management Members Section */
.management-members {
    padding: 80px 0;
    background-color: #ffffff;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

.members-table-wrapper {
    background-color: #ffffff;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    overflow: hidden;
}

.members-table {
    width: 100%;
    border-collapse: collapse;
    font-family: inherit;
}

.members-table thead th {
    background-color: #f8f9fa;
    color: #495057;
    font-weight: 600;
    font-size: 16px;
    padding: 20px;
    text-align: left;
    border-bottom: 2px solid #dee2e6;
}

.members-table tbody td {
    padding: 20px;
    color: #212529;
    font-size: 15px;
    border-bottom: 1px solid #dee2e6;
    vertical-align: top;
}

.members-table tbody tr:last-child td {
    border-bottom: none;
}

.members-table tbody tr:nth-child(even) {
    background-color: #f8f9fa;
}

.members-table tbody tr:hover {
    background-color: #e9ecef;
}

/* Responsive Design */
@media (max-width: 992px) {
    .page-title {
        font-size: 40px;
    }

    .page-subtitle {
        font-size: 16px;
    }

    .management-hero {
        padding: 60px 0 40px;
    }

    .management-members {
        padding: 60px 0;
    }
}

@media (max-width: 768px) {
    .container {
        padding: 0 15px;
    }

    .page-title {
        font-size: 32px;
    }

    .management-hero {
        padding: 40px 0 30px;
    }

    .management-members {
        padding: 40px 0;
    }

    .members-table-wrapper {
        border-radius: 6px;
        box-shadow: 0 1px 6px rgba(0, 0, 0, 0.1);
    }

    .members-table thead th {
        padding: 15px 12px;
        font-size: 14px;
    }

    .members-table tbody td {
        padding: 15px 12px;
        font-size: 14px;
    }
}

@media (max-width: 576px) {
    .container {
        padding: 0 10px;
    }

    .page-title {
        font-size: 28px;
    }

    .page-subtitle {
        font-size: 15px;
    }

    .hero-badge {
        margin-bottom: 15px;
    }

    .badge-text {
        padding: 6px 12px;
        font-size: 12px;
    }

    .members-table-wrapper {
        margin: 0 -10px;
        border-radius: 0;
        box-shadow: none;
        border: 1px solid #dee2e6;
    }

    .members-table thead th {
        padding: 12px 8px;
        font-size: 13px;
    }

    .members-table tbody td {
        padding: 12px 8px;
        font-size: 13px;
    }

    .breadcrumb {
        font-size: 13px;
    }
}

/* Table Responsiveness for Very Small Screens */
@media (max-width: 480px) {
    .members-table {
        font-size: 12px;
    }

    .members-table thead th,
    .members-table tbody td {
        padding: 10px 6px;
    }

    .members-table thead th:nth-child(3),
    .members-table tbody td:nth-child(3) {
        display: none;
    }

    .members-table tbody td {
        display: block;
        width: 100%;
    }

    .members-table tbody tr {
        display: block;
        margin-bottom: 20px;
        border: 1px solid #dee2e6;
        border-radius: 4px;
        background-color: #fff;
    }

    .members-table tbody td:before {
        content: attr(data-label) ": ";
        font-weight: 600;
        color: #495057;
        display: inline-block;
        width: 100px;
    }

    .members-table thead {
        display: none;
    }
}
</style>

@endsection
