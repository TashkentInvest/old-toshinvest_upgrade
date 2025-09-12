@extends('layouts.frontend_app')
@section('frontent_content')

{{-- Committees Hero Section --}}
<section class="committees-hero">
    <div class="hero-background">
        <div class="hero-pattern"></div>
        <div class="hero-overlay"></div>
    </div>
    <div class="container">
        <div class="hero-content">
            <div class="breadcrumb">
                <a href="{{ route('frontend.index') }}" class="breadcrumb-link">Главная</a>
                <span class="breadcrumb-separator">→</span>
                <span class="breadcrumb-current">Комитеты</span>
            </div>
            <div class="hero-badge">
                <span class="badge-text">Структурные подразделения</span>
            </div>
            <h1 class="page-title">Комитеты при Наблюдательном совете</h1>
            <p class="page-subtitle">Предлагаемый состав комитетов при Наблюдательном совете АО «Компания Ташкент Инвест»</p>
        </div>
    </div>
</section>

{{-- Committees Section --}}
<section class="committees-section">
    <div class="container">
        <div class="committees-container">

            {{-- Audit Committee --}}
            <div class="committee-wrapper">
                <div class="committee-header">
                    <h2 class="committee-title">Комитет по аудиту</h2>
                </div>
                <div class="committee-table-wrapper">
                    <table class="committee-table">
                        <thead>
                            <tr>
                                <th>ФИО</th>
                                <th>Роль в комитете</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- <tr class="chairman-row">
                                <td>
                                    <div class="member-info">
                                        <span class="member-name">Н. Тогаев</span>
                                        <span class="role-badge chairman">Председатель</span>
                                    </div>
                                </td>
                                <td>Председатель комитета</td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="member-info">
                                        <span class="member-name">А. Прияткин</span>
                                        <span class="role-badge member">Член</span>
                                    </div>
                                </td>
                                <td>Член комитета</td>
                            </tr> --}}
                            <tr>
                                <td>
                                    <div class="member-info">
                                        <span class="member-name">Ш. Рахмонов</span>
                                        <span class="role-badge member">Член</span>
                                    </div>
                                </td>
                                <td>Член комитета</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- Strategy and Investment Committee --}}
            <div class="committee-wrapper">
                <div class="committee-header">
                    <h2 class="committee-title">Комитет по стратегии и инвестициям</h2>
                </div>
                <div class="committee-table-wrapper">
                    <table class="committee-table">
                        <thead>
                            <tr>
                                <th>ФИО</th>
                                <th>Роль в комитете</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- <tr class="chairman-row">
                                <td>
                                    <div class="member-info">
                                        <span class="member-name">А. Прияткин</span>
                                        <span class="role-badge chairman">Председатель</span>
                                    </div>
                                </td>
                                <td>Председатель комитета</td>
                            </tr> --}}
                            {{-- <tr>
                                <td>
                                    <div class="member-info">
                                        <span class="member-name">Н. Тогаев</span>
                                        <span class="role-badge member">Член</span>
                                    </div>
                                </td>
                                <td>Член комитета</td>
                            </tr> --}}
                            <tr>
                                <td>
                                    <div class="member-info">
                                        <span class="member-name">Ш. Рахмонов</span>
                                        <span class="role-badge member">Член</span>
                                    </div>
                                </td>
                                <td>Член комитета</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</section>

<style>
/* Committees Hero Section */
.committees-hero {
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

/* Committees Section */
.committees-section {
    padding: 80px 0;
    background-color: #ffffff;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

.committees-container {
    display: flex;
    flex-direction: column;
    gap: 60px;
}

.committee-wrapper {
    background-color: #ffffff;
}

.committee-header {
    margin-bottom: 30px;
}

.committee-title {
    font-size: 24px;
    font-weight: 600;
    color: #212529;
    margin: 0;
    text-align: center;
    padding-bottom: 15px;
    border-bottom: 2px solid #e9ecef;
}

.committee-table-wrapper {
    background-color: #ffffff;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    overflow: hidden;
}

.committee-table {
    width: 100%;
    border-collapse: collapse;
    font-family: inherit;
}

.committee-table thead th {
    background-color: #f8f9fa;
    color: #495057;
    font-weight: 600;
    font-size: 16px;
    padding: 20px;
    text-align: left;
    border-bottom: 2px solid #dee2e6;
}

.committee-table tbody td {
    padding: 20px;
    color: #212529;
    font-size: 15px;
    border-bottom: 1px solid #dee2e6;
    vertical-align: top;
}

.committee-table tbody tr:last-child td {
    border-bottom: none;
}

.committee-table tbody tr:nth-child(even) {
    background-color: #f8f9fa;
}

.committee-table tbody tr:hover {
    background-color: #e9ecef;
}

/* Chairman row styling */
.chairman-row {
    background-color: #f1f3f4 !important;
}

.chairman-row:hover {
    background-color: #e8eaed !important;
}

/* Member info styling */
.member-info {
    display: flex;
    flex-direction: column;
    gap: 8px;
}

.member-name {
    font-weight: 600;
    color: #212529;
}

.role-badge {
    display: inline-block;
    padding: 4px 8px;
    font-size: 11px;
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    border-radius: 12px;
    align-self: flex-start;
}

.role-badge.chairman {
    background-color: #d4edda;
    color: #155724;
}

.role-badge.member {
    background-color: #e2e3e5;
    color: #495057;
}

/* Responsive Design */
@media (max-width: 992px) {
    .page-title {
        font-size: 40px;
    }

    .page-subtitle {
        font-size: 16px;
    }

    .committees-hero {
        padding: 60px 0 40px;
    }

    .committees-section {
        padding: 60px 0;
    }

    .committees-container {
        gap: 50px;
    }

    .committee-title {
        font-size: 22px;
    }
}

@media (max-width: 768px) {
    .container {
        padding: 0 15px;
    }

    .page-title {
        font-size: 32px;
    }

    .committees-hero {
        padding: 40px 0 30px;
    }

    .committees-section {
        padding: 40px 0;
    }

    .committees-container {
        gap: 40px;
    }

    .committee-title {
        font-size: 20px;
    }

    .committee-table-wrapper {
        border-radius: 6px;
        box-shadow: 0 1px 6px rgba(0, 0, 0, 0.1);
    }

    .committee-table thead th {
        padding: 15px 12px;
        font-size: 14px;
    }

    .committee-table tbody td {
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

    .committee-title {
        font-size: 18px;
    }

    .committee-table-wrapper {
        margin: 0 -10px;
        border-radius: 0;
        box-shadow: none;
        border: 1px solid #dee2e6;
    }

    .committee-table thead th {
        padding: 12px 8px;
        font-size: 13px;
    }

    .committee-table tbody td {
        padding: 12px 8px;
        font-size: 13px;
    }

    .breadcrumb {
        font-size: 13px;
    }
}

/* Mobile card layout for very small screens */
@media (max-width: 480px) {
    .committee-table thead {
        display: none;
    }

    .committee-table tbody tr {
        display: block;
        margin-bottom: 15px;
        border: 1px solid #dee2e6;
        border-radius: 8px;
        background-color: #fff !important;
        padding: 15px;
    }

    .committee-table tbody tr.chairman-row {
        border-left: 4px solid #28a745;
    }

    .committee-table tbody td {
        display: block;
        width: 100%;
        padding: 8px 0;
        border: none;
        border-bottom: 1px solid #eee;
    }

    .committee-table tbody td:last-child {
        border-bottom: none;
    }

    .committee-table tbody td:before {
        content: attr(data-label);
        font-weight: 600;
        color: #495057;
        display: block;
        margin-bottom: 4px;
        font-size: 12px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .committee-table tbody td:first-child:before {
        content: "ФИО";
    }

    .committee-table tbody td:nth-child(2):before {
        content: "Роль в комитете";
    }

    .member-info {
        gap: 6px;
    }

    .role-badge {
        font-size: 10px;
        padding: 3px 6px;
    }

    .committee-title {
        font-size: 16px;
        padding-bottom: 12px;
    }

    .committee-header {
        margin-bottom: 20px;
    }

    .committees-container {
        gap: 30px;
    }
}
</style>

@endsection
