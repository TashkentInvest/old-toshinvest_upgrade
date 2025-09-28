@extends('layouts.frontend_app')
@section('frontent_content')

{{-- Breadcrumb Section --}}
<section class="breadcrumb-section">
    <div class="container">
        <div class="breadcrumb">
            <a href="{{ route('frontend.index') }}" class="breadcrumb-link">Главная</a>
            <span class="breadcrumb-separator">→</span>
            <span class="breadcrumb-current">Наблюдательный совет</span>
        </div>
    </div>
</section>

{{-- Board Section --}}
<section class="board-section">
    <div class="container">
            <h2 class="section-title">Наблюдательный совет АО "Компания Ташкент Инвест"</h2>

        {{-- Chairman Profile --}}
        <div class="chairman-profile">
            <div class="profile-photo">
                <img src="https://tashkent.uz/_next/image?url=https%3A%2F%2Fapi.tashkent.uz%2Fupload%2Fgovernance%2Fstructure%2F29d0dec1019b53a9cf367bb3e222252c.jpg&w=750&q=75" alt="Умурзаков Шавкат Буранович">
            </div>
            <div class="profile-info">
                <h2 class="profile-name">Умурзаков Шавкат Буранович</h2>
                <p class="profile-position">Хоким города Ташкента</p>
                <div class="profile-details">
                    <p><strong>Телефон:</strong> 71 210-01-10</p>
                    <p><strong>Эл. почта:</strong> sh.umurzakov@tashkent.uz</p>
                    <p><strong>Дни приема:</strong> Четверг с 15:00 до 17:00</p>
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
                    <img src="https://tashkent.uz/_next/image?url=https%3A%2F%2Fapi.tashkent.uz%2Fupload%2Fgovernance%2Fstructure%2F18e9ee1d9a016face3bb4d850ed7e36e.jpg&w=750&q=75" alt="Хайдаров Бахтиёр Халимович">
                </div>
                <div class="member-info">
                    <h3 class="member-name">Хайдаров Бахтиёр Халимович</h3>
                    <p class="member-position">Первый заместитель Хокима города Ташкента</p>
                    <p class="member-contact">Телефон: 71 207-20-77</p>
                    <p class="member-contact">Эл. почта: b.xaydarov@tashkent.uz</p>
                    <p class="member-contact">Дни приема: Пятница с 15:00 до 17:00</p>
                    <button class="bio-button" onclick="openModal('modal-1')">Биография и обязанности</button>
                </div>
            </div>

            {{-- Member 2 --}}
            <div class="member-card">
                <div class="member-photo">
                    <img src="https://tashkent.uz/_next/image?url=https%3A%2F%2Fapi.tashkent.uz%2Fupload%2Fgovernance%2Fstructure%2F111.jpg&w=750&q=75" alt="Рахманов Шароф Диерович">
                </div>
                <div class="member-info">
                    <h3 class="member-name">Рахманов Шароф Диерович</h3>
                    <p class="member-position">Заместитель Хокима города Ташкента — начальник управления инвестиций, промышленности и внешней торговли</p>
                    <p class="member-contact">Телефон: 71 210-02-50</p>
                    <p class="member-contact">Эл. почта: sh.raxmanov@tashkent.uz</p>
                    <p class="member-contact">Дни приема: Среда 09:00 - 11:00</p>
                    <button class="bio-button" onclick="openModal('modal-2')">Биография и обязанности</button>
                </div>
            </div>

            {{-- Member 3 --}}
            <div class="member-card">
                <div class="member-photo">
                    <img src="https://d2gjqh9j26unp0.cloudfront.net/profilepic/af38bdd3d1d5979312ffd3403de3673b" alt="Adamas Ilkevicius">
                </div>
                <div class="member-info">
                    <h3 class="member-name">Adamas Ilkevicius</h3>
                    <p class="member-position">Заместитель генерального директора по вопросам корпоративной трансформации и повышения эффективности активов в АО «UzAssets»</p>
                    <p class="member-contact">Независимый член наблюдательного совета</p>
                    <button class="bio-button" onclick="openModal('modal-3')">Биография и обязанности</button>
                </div>
            </div>

            {{-- Member 4 --}}
            <div class="member-card">
                <div class="member-photo">
                    <img src="https://media.licdn.com/dms/image/v2/D5603AQGcOsoyw9ISrw/profile-displayphoto-shrink_200_200/profile-displayphoto-shrink_200_200/0/1685998284915?e=2147483647&v=beta&t=oeHV6oBZQyNiPI4VhGlOcZ0JwMEcDDnQkwoom-xTjy0" alt="Shariq Wali Khan">
                </div>
                <div class="member-info">
                    <h3 class="member-name">Shariq Wali Khan</h3>
                    <p class="member-position">Директор по управлению казначейством и инвестициям «Rainforest Alliance Director, Treasury & Investment Management»</p>
                    <p class="member-contact">Независимый член наблюдательного совета</p>
                    <button class="bio-button" onclick="openModal('modal-4')">Биография и обязанности</button>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Modals --}}
<div id="modal-chairman" class="modal">
    <div class="modal-content">
        <span class="modal-close" onclick="closeModal('modal-chairman')">&times;</span>
        <h2>Умурзаков Шавкат Буранович</h2>
        <h3>Биография</h3>
        <p>Информация о биографии и карьере...</p>
        <h3>Обязанности</h3>
        <p>Председатель наблюдательного совета АО «Компания Ташкент Инвест». Осуществляет общее руководство деятельностью наблюдательного совета...</p>
    </div>
</div>

<div id="modal-1" class="modal">
    <div class="modal-content">
        <span class="modal-close" onclick="closeModal('modal-1')">&times;</span>
        <h2>Хайдаров Бахтиёр Халимович</h2>
        <h3>Биография</h3>
        <p>Информация о биографии и карьере...</p>
        <h3>Обязанности</h3>
        <p>Член наблюдательного совета. Участвует в принятии стратегических решений компании...</p>
    </div>
</div>

<div id="modal-2" class="modal">
    <div class="modal-content">
        <span class="modal-close" onclick="closeModal('modal-2')">&times;</span>
        <h2>Рахманов Шароф Диерович</h2>
        <h3>Биография</h3>
        <p>Информация о биографии и карьере...</p>
        <h3>Обязанности</h3>
        <p>Член наблюдательного совета. Контролирует инвестиционную деятельность компании...</p>
    </div>
</div>

<div id="modal-3" class="modal">
    <div class="modal-content">
        <span class="modal-close" onclick="closeModal('modal-3')">&times;</span>
        <h2>Adamas Ilkevicius</h2>
        <h3>Биография</h3>
        <p>Информация о биографии и карьере...</p>
        <h3>Обязанности</h3>
        <p>Независимый член наблюдательного совета. Обеспечивает независимую оценку корпоративного управления...</p>
    </div>
</div>

<div id="modal-4" class="modal">
    <div class="modal-content">
        <span class="modal-close" onclick="closeModal('modal-4')">&times;</span>
        <h2>Shariq Wali Khan</h2>
        <h3>Биография</h3>
        <p>Информация о биографии и карьере...</p>
        <h3>Обязанности</h3>
        <p>Независимый член наблюдательного совета. Консультирует по вопросам финансового управления и инвестиций...</p>
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

.page-title {
    font-size: 32px;
    font-weight: 600;
    color: #111827;
    margin-bottom: 40px;
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
    grid-template-columns: repeat(4, 1fr);
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
    background-color: #e5e7eb;
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

/* Responsive */
@media (max-width: 1200px) {
    .members-grid {
        grid-template-columns: repeat(3, 1fr);
    }
}

@media (max-width: 992px) {
    .chairman-profile {
        flex-direction: column;
    }

    .profile-photo {
        width: 100%;
        height: 350px;
    }

    .members-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 768px) {
    .page-title {
        font-size: 28px;
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

    .members-grid {
        grid-template-columns: 1fr;
        gap: 20px;
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
