@extends('layouts.frontend_app')
@section('frontent_content')

{{-- Breadcrumb Section --}}
<section class="breadcrumb-section">
    <div class="container">
        <div class="breadcrumb">
            <a href="{{ route('frontend.index') }}" class="breadcrumb-link">Главная</a>
            <span class="breadcrumb-separator">→</span>
            <span class="breadcrumb-current">Правление</span>
        </div>
    </div>
</section>

{{-- Management Board Section --}}
<section class="board-section">
    <div class="container">
        <div class="hero-badge">
            <span class="badge-text">Исполнительный орган</span>
        </div>
        <h1 class="page-title">Правление</h1>
        <p class="page-subtitle">Исполнительный орган АО «Компания Ташкент Инвест», осуществляющий оперативное управление деятельностью компании</p>

        {{-- Chairman Profile --}}
        <div class="chairman-profile">
            <div class="profile-photo">
                <img src="{{asset('assets/users_img/5.Шакиров Бахром Аскаралиевич.jpg')}}" alt="Шакиров Бахром Аскаралиевич">
            </div>
            <div class="profile-info">
                <h2 class="profile-name">Шакиров Бахром Аскаралиевич</h2>
                <p class="profile-position">Генеральный директор</p>
                <div class="profile-details">
                    <p><strong>Телефон:</strong> +998 (71) 210 02 61</p>
                    <p><strong>Эл. почта:</strong> b.shakirov@tashkentinvest.com</p>
                    <p><strong>Дни приема:</strong> По предварительной записи</p>
                </div>
                <button class="bio-button" onclick="openModal('modal-chairman')">Биография и обязанности</button>
            </div>
        </div>

        {{-- Tabs --}}
        <div class="tabs">
            <button class="tab-button active">Руководство</button>
        </div>

        {{-- Members Grid --}}
        <div class="members-grid">
            {{-- Member 1 --}}
            <div class="member-card">
                <div class="member-photo">
                    <img style="object-fit:contain" src="{{asset('assets/users_img/6.Кодиров Рустам Шухратович.jpg')}}" alt="Кодиров Рустам Шухратович">
                </div>
                <div class="member-info">
                    <h3 class="member-name">Кодиров Рустам Шухратович</h3>
                    <p class="member-position">Заместитель председателя правления по стратегическому развитию</p>
                    <p class="member-contact">Телефон: +998 (71) 210 02 61</p>
                    <p class="member-contact">Эл. почта: rustam.kodirov@tashkentinvest.com</p>
                    <button class="bio-button" onclick="openModal('modal-1')">Биография и обязанности</button>
                </div>
            </div>

            {{-- Member 2 --}}
            <div class="member-card">
                <div class="member-photo">
                    <img style="object-fit:contain" src="https://media.istockphoto.com/id/1396814518/vector/image-coming-soon-no-photo-no-thumbnail-image-available-vector-illustration.jpg?s=612x612&w=0&k=20&c=hnh2OZgQGhf0b46-J2z7aHbIWwq8HNlSDaNp2wn_iko=" alt="Отахонова Наргизахон Ганиевна">
                </div>
                <div class="member-info">
                    <h3 class="member-name">Отахонова Наргизахон Ганиевна</h3>
                    <p class="member-position">Заместитель председателя правления по управлению проектами (промышленности)</p>
                    <p class="member-contact">Телефон: +998 (71) 210 02 61</p>
                    <p class="member-contact">Эл. почта: n.otahonova@tashkentinvest.com</p>
                    <button class="bio-button" onclick="openModal('modal-2')">Биография и обязанности</button>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Modals --}}
<div id="modal-chairman" class="modal">
    <div class="modal-content">
        <span class="modal-close" onclick="closeModal('modal-chairman')">&times;</span>
        <h2>Шакиров Бахром Аскаралиевич</h2>
        <h3>Биография</h3>
        <p>Информация о биографии, образовании и карьерном пути...</p>
        <h3>Обязанности</h3>
        <p>Председатель правления и Генеральный директор АО «Компания Ташкент Инвест».</p>
        <ul>
            <li>Осуществляет оперативное руководство деятельностью компании</li>
            <li>Организует выполнение решений наблюдательного совета</li>
            <li>Представляет интересы компании во всех организациях и учреждениях</li>
            <li>Распоряжается имуществом компании в пределах своей компетенции</li>
            <li>Издает приказы и распоряжения, обязательные для исполнения всеми работниками</li>
        </ul>
    </div>
</div>

<div id="modal-1" class="modal">
    <div class="modal-content">
        <span class="modal-close" onclick="closeModal('modal-1')">&times;</span>
        <h2>Кодиров Рустам Шухратович</h2>
        <h3>Биография</h3>
        <p>Информация о биографии, образовании и карьерном пути...</p>
        <h3>Обязанности</h3>
        <p>Заместитель председателя правления по стратегическому развитию.</p>
        <ul>
            <li>Разработка стратегии развития компании</li>
            <li>Анализ рынка и определение перспективных направлений деятельности</li>
            <li>Координация долгосрочного планирования</li>
            <li>Управление стратегическими проектами</li>
        </ul>
    </div>
</div>

<div id="modal-2" class="modal">
    <div class="modal-content">
        <span class="modal-close" onclick="closeModal('modal-2')">&times;</span>
        <h2>Отахонова Наргизахон Ганиевна</h2>
        <h3>Биография</h3>
        <p>Информация о биографии, образовании и карьерном пути...</p>
        <h3>Обязанности</h3>
        <p>Заместитель председателя правления по управлению проектами.</p>
        <ul>
            <li>Координация реализации инвестиционных проектов</li>
            <li>Контроль сроков и бюджетов проектов</li>
            <li>Взаимодействие с подрядчиками и партнерами</li>
            <li>Мониторинг эффективности проектной деятельности</li>
        </ul>
    </div>
</div>

<style>
/* Container */
.container {
    max-width: 1320px;
    margin: 0 auto;
    padding: 0 15px;
}

/* Breadcrumb */
.breadcrumb-section {
    background-color: #fff;
    padding: 20px 0;
    border-bottom: 1px solid #e5e7eb;
}

.breadcrumb {
    display: flex;
    align-items: center;
    font-size: 14px;
}

.breadcrumb-link {
    color: #6b7280;
    text-decoration: none;
}

.breadcrumb-link:hover {
    color: #111827;
}

.breadcrumb-separator {
    margin: 0 10px;
    color: #9ca3af;
}

.breadcrumb-current {
    color: #111827;
}

/* Board Section */
.board-section {
    background-color: #fff;
    padding: 40px 0 80px;
}

.hero-badge {
    display: inline-block;
    margin-bottom: 16px;
}

.badge-text {
    display: inline-block;
    padding: 6px 14px;
    background-color: #e5e7eb;
    color: #4b5563;
    font-size: 12px;
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    border-radius: 16px;
}

.page-title {
    font-size: 32px;
    font-weight: 600;
    color: #111827;
    margin-bottom: 12px;
}

.page-subtitle {
    font-size: 16px;
    color: #6b7280;
    line-height: 1.6;
    margin-bottom: 40px;
    max-width: 800px;
}

/* Chairman Profile */
.chairman-profile {
    display: flex;
    gap: 30px;
    background-color: #f9fafb;
    border-radius: 12px;
    padding: 30px;
    margin-bottom: 40px;
}

.profile-photo {
    width: 230px;
    height: 280px;
    flex-shrink: 0;
    border-radius: 8px;
    overflow: hidden;
    background-color: #e5e7eb;
}

.profile-photo img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.profile-info {
    flex: 1;
}

.profile-name {
    font-size: 28px;
    font-weight: 600;
    color: #111827;
    margin-bottom: 8px;
}

.profile-position {
    font-size: 16px;
    color: #6b7280;
    margin-bottom: 20px;
}

.profile-details {
    margin-bottom: 20px;
}

.profile-details p {
    font-size: 14px;
    color: #4b5563;
    margin-bottom: 8px;
}

.profile-details strong {
    font-weight: 600;
    color: #111827;
}

/* Tabs */
.tabs {
    margin-bottom: 30px;
    border-bottom: 2px solid #e5e7eb;
}

.tab-button {
    padding: 12px 24px;
    background: none;
    border: none;
    color: #6b7280;
    font-size: 15px;
    font-weight: 500;
    cursor: pointer;
    border-bottom: 3px solid transparent;
    margin-bottom: -2px;
}

.tab-button.active {
    color: #84cc16;
    border-bottom-color: #84cc16;
}

/* Members Grid */
.members-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 24px;
}

.member-card {
    background-color: #f9fafb;
    border-radius: 12px;
    overflow: hidden;
    transition: transform 0.2s, box-shadow 0.2s;
}

.member-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
}

.member-photo {
    width: 100%;
    height: 280px;
    background-color: #fff;
    overflow: hidden;
}

.member-photo img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.member-info {
    padding: 24px;
    background-color: #fff;
}

.member-name {
    font-size: 18px;
    font-weight: 600;
    color: #111827;
    margin-bottom: 12px;
    line-height: 1.4;
}

.member-position {
    font-size: 14px;
    color: #6b7280;
    margin-bottom: 16px;
    line-height: 1.5;
}

.member-contact {
    font-size: 13px;
    color: #4b5563;
    margin-bottom: 6px;
}

.bio-button {
    margin-top: 16px;
    padding: 10px 20px;
    background-color: #fff;
    border: 1px solid #d1d5db;
    border-radius: 6px;
    color: #374151;
    font-size: 14px;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.2s;
    width: 100%;
}

.bio-button:hover {
    background-color: #f9fafb;
    border-color: #9ca3af;
}

/* Modal */
.modal {
    display: none;
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    overflow: auto;
}

.modal-content {
    background-color: #fff;
    margin: 5% auto;
    padding: 40px;
    border-radius: 12px;
    max-width: 700px;
    position: relative;
}

.modal-close {
    position: absolute;
    right: 20px;
    top: 20px;
    font-size: 32px;
    font-weight: 300;
    color: #9ca3af;
    cursor: pointer;
    line-height: 1;
}

.modal-close:hover {
    color: #374151;
}

.modal-content h2 {
    font-size: 24px;
    font-weight: 600;
    color: #111827;
    margin-bottom: 24px;
}

.modal-content h3 {
    font-size: 18px;
    font-weight: 600;
    color: #111827;
    margin-top: 24px;
    margin-bottom: 12px;
}

.modal-content p {
    font-size: 15px;
    color: #4b5563;
    line-height: 1.7;
    margin-bottom: 12px;
}

.modal-content ul {
    padding-left: 20px;
    margin-bottom: 12px;
}

.modal-content li {
    font-size: 15px;
    color: #4b5563;
    line-height: 1.7;
    margin-bottom: 8px;
}

/* Responsive */
@media (max-width: 992px) {
    .chairman-profile {
        flex-direction: column;
    }

    .profile-photo {
        width: 100%;
        height: 350px;
    }

    .members-grid {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 768px) {
    .page-title {
        font-size: 28px;
        margin-bottom: 10px;
    }

    .page-subtitle {
        font-size: 15px;
        margin-bottom: 30px;
    }

    .chairman-profile {
        padding: 24px;
    }

    .profile-name {
        font-size: 24px;
    }

    .modal-content {
        margin: 10% 15px;
        padding: 30px;
    }
}

@media (max-width: 576px) {
    .page-title {
        font-size: 24px;
    }

    .page-subtitle {
        font-size: 14px;
        margin-bottom: 25px;
    }

    .chairman-profile {
        padding: 20px;
        gap: 20px;
    }

    .profile-photo {
        height: 300px;
    }

    .profile-name {
        font-size: 22px;
    }

    .member-photo {
        height: 240px;
    }

    .member-info {
        padding: 20px;
    }

    .modal-content {
        padding: 24px;
    }

    .modal-content h2 {
        font-size: 20px;
    }
}
</style>

<script>
function openModal(modalId) {
    document.getElementById(modalId).style.display = 'block';
    document.body.style.overflow = 'hidden';
}

function closeModal(modalId) {
    document.getElementById(modalId).style.display = 'none';
    document.body.style.overflow = 'auto';
}

window.onclick = function(event) {
    if (event.target.classList.contains('modal')) {
        event.target.style.display = 'none';
        document.body.style.overflow = 'auto';
    }
}
</script>

@endsection
