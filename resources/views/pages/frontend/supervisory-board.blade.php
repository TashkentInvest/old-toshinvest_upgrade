@extends('layouts.frontend_app')
@section('frontent_content')

{{-- Supervisory Board Hero Section --}}
<section class="board-hero">
    <div class="hero-background">
        <div class="hero-pattern"></div>
        <div class="hero-overlay"></div>
    </div>
    <div class="container">
        <div class="hero-content">
            <div class="breadcrumb">
                <a href="{{ route('frontend.index') }}" class="breadcrumb-link">Главная</a>
                <span class="breadcrumb-separator">→</span>
                <span class="breadcrumb-current">Наблюдательный совет</span>
            </div>
            {{-- <div class="hero-badge">
                <span class="badge-text">Руководящий орган</span>
            </div>
            <h1 class="page-title">Наблюдательный совет</h1>
            <p class="page-subtitle">
                Наблюдательный совет АО «Компания Ташкент Инвест» осуществляет стратегическое руководство и контроль за деятельностью компании.


            </p> --}}
        </div>
    </div>
</section>

{{-- Board Members Section --}}
<section class="board-members-section">
    <div class="container">
        <div class="members-table-wrapper">
            <table class="members-table">
                <thead>
                    <tr>
                        <th>ФИО</th>
                        <th>Должность</th>
                        <th>Подразделение</th>
                        <th>Статус</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="chairman-row">
                        <td>
                            <div class="member-name">
                                <span class="name-text">Умурзаков Шавкат Буранович</span>
                                <span class="role-badge chairman">Председатель</span>
                            </div>
                        </td>
                        <td>Председатель наблюдательного совета</td>
                        <td>Хоким города Ташкента</td>
                        <td>
                            <span class="status-badge active">Действующий</span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="member-name">
                                <span class="name-text">Хайдаров Бахтиёр Халимович</span>
                                <span class="role-badge member">Член совета</span>
                            </div>
                        </td>
                        <td>Член наблюдательного совета</td>
                        <td>Первый заместитель Хокима города Ташкента</td>
                        <td>
                            <span class="status-badge active">Действующий</span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="member-name">
                                <span class="name-text">Рахманов Шароф Диерович</span>
                                <span class="role-badge member">Член совета</span>
                            </div>
                        </td>
                        <td>Член наблюдательного совета</td>
                        <td>Заместитель Хокима города Ташкента</td>
                        <td>
                            <span class="status-badge active">Действующий</span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="member-name">
                                <span class="name-text">Adamas Ilkevicius.</span>
                                <span class="role-badge member">Член совета</span>
                            </div>
                        </td>
                        <td>Член наблюдательного совета</td>
                        <td>Заместитель генерального директора по вопросам корпоративной трансформации и повышения эффективности активов в АО «UzAssets»</td>
                        <td>
                            <span class="status-badge active">Действующий</span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="member-name">
                                <span class="name-text">Shariq Wali Khan</span>
                                <span class="role-badge member">Член совета</span>
                            </div>
                        </td>
                        <td>Член наблюдательного совета</td>
                        <td>Директор по управлению казначейством и инвестициям «Rainforest Alliance Director, Treasury & Investment Management»</td>
                        <td>
                            <span class="status-badge active">Действующий</span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>

<style>
/* Board Hero Section */
.board-hero {
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

/* Board Members Section */
.board-members-section {
    padding-bottom: 80px;
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

/* Chairman row styling */
.chairman-row {
    background-color: #f1f3f4 !important;
}

.chairman-row:hover {
    background-color: #e8eaed !important;
}

/* Member name styling */
.member-name {
    display: flex;
    flex-direction: column;
    gap: 8px;
}

.name-text {
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

/* Status badge styling */
.status-badge {
    display: inline-block;
    padding: 6px 12px;
    font-size: 12px;
    font-weight: 500;
    border-radius: 16px;
}

.status-badge.active {
    background-color: #d1ecf1;
    color: #0c5460;
}

/* Responsive Design */
@media (max-width: 992px) {
    .page-title {
        font-size: 40px;
    }

    .page-subtitle {
        font-size: 16px;
    }

    .board-hero {
        padding: 60px 0 40px;
    }

    .board-members-section {
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

    .board-hero {
        padding: 40px 0 30px;
    }

    .board-members-section {
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

    /* Hide status column on tablets */
    .members-table thead th:nth-child(4),
    .members-table tbody td:nth-child(4) {
        display: none;
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

    /* Hide department column on mobile */
    .members-table thead th:nth-child(3),
    .members-table tbody td:nth-child(3) {
        display: none;
    }
}

/* Mobile card layout for very small screens */
@media (max-width: 480px) {
    .members-table thead {
        display: none;
    }

    .members-table tbody tr {
        display: block;
        margin-bottom: 20px;
        border: 1px solid #dee2e6;
        border-radius: 8px;
        background-color: #fff !important;
        padding: 15px;
    }

    .members-table tbody tr.chairman-row {
        border-left: 4px solid #28a745;
    }

    .members-table tbody td {
        display: block;
        width: 100%;
        padding: 8px 0;
        border: none;
        border-bottom: 1px solid #eee;
    }

    .members-table tbody td:last-child {
        border-bottom: none;
    }

    .members-table tbody td:before {
        content: attr(data-label);
        font-weight: 600;
        color: #495057;
        display: block;
        margin-bottom: 4px;
        font-size: 12px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .members-table tbody td:first-child:before {
        content: "ФИО";
    }

    .members-table tbody td:nth-child(2):before {
        content: "Должность";
    }

    .members-table tbody td:nth-child(3):before {
        content: "Подразделение";
    }

    .members-table tbody td:nth-child(4):before {
        content: "Статус";
    }

    .member-name {
        gap: 6px;
    }

    .role-badge {
        font-size: 10px;
        padding: 3px 6px;
    }

    .status-badge {
        font-size: 11px;
        padding: 4px 8px;
    }
}
</style>

@endsection
