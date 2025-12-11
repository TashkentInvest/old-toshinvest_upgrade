@extends('layouts.frontend_app')

@section('frontent_content')
<style>
    /* Government Official Tender Notice Styles */
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&family=Roboto+Slab:wght@700;800;900&display=swap');

    .tender-page {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
        background: #f1f5f9;
        background-image:
            linear-gradient(to right, rgba(148, 163, 184, 0.03) 1px, transparent 1px),
            linear-gradient(to bottom, rgba(148, 163, 184, 0.03) 1px, transparent 1px);
        background-size: 40px 40px;
        min-height: 100vh;
        padding: 60px 0;
        position: relative;
    }

    .tender-page::before {
        content: '';
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #1e40af 0%, #3b82f6 50%, #1e40af 100%);
        z-index: 1000;
    }

    .tender-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }

    /* Hero Banner */
    .tender-hero {
        background: linear-gradient(135deg, #1e3a8a 0%, #0f172a 100%);
        color: white;
        padding: 60px 50px;
        border-radius: 0;
        border: 4px solid #1e40af;
        border-left: 12px solid #3b82f6;
        box-shadow:
            0 20px 60px rgba(15, 23, 42, 0.5),
            inset 0 1px 0 rgba(255, 255, 255, 0.1);
        margin-bottom: 50px;
        position: relative;
        overflow: hidden;
        animation: fadeInDown 0.8s ease-out;
    }

    .tender-hero::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background:
            linear-gradient(45deg, transparent 30%, rgba(59, 130, 246, 0.05) 50%, transparent 70%),
            repeating-linear-gradient(
                45deg,
                transparent,
                transparent 35px,
                rgba(255, 255, 255, 0.02) 35px,
                rgba(255, 255, 255, 0.02) 70px
            );
        opacity: 0.6;
    }

    .tender-hero::after {
        content: '';
        position: absolute;
        top: 20px;
        right: 20px;
        width: 150px;
        height: 150px;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="50" cy="50" r="40" fill="none" stroke="rgba(255,255,255,0.1)" stroke-width="2"/><circle cx="50" cy="50" r="30" fill="none" stroke="rgba(255,255,255,0.05)" stroke-width="2"/><circle cx="50" cy="50" r="20" fill="none" stroke="rgba(255,255,255,0.03)" stroke-width="2"/></svg>');
        opacity: 0.3;
    }

    .tender-hero-content {
        position: relative;
        z-index: 1;
    }

    .tender-badge {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        background: #dc2626;
        color: white;
        padding: 10px 20px;
        border-radius: 0;
        border: 2px solid #b91c1c;
        border-left: 6px solid #991b1b;
        font-size: 13px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 2px;
        margin-bottom: 25px;
        box-shadow:
            0 8px 20px rgba(220, 38, 38, 0.6),
            inset 0 1px 0 rgba(255, 255, 255, 0.2);
        position: relative;
    }

    .tender-badge::before {
        content: '';
        position: absolute;
        top: -2px;
        left: -2px;
        right: -2px;
        bottom: -2px;
        background: linear-gradient(45deg, #dc2626, #b91c1c);
        z-index: -1;
        animation: borderPulse 2s ease-in-out infinite;
    }

    .tender-badge .icon {
        font-size: 18px;
        animation: ring 2s ease-in-out infinite;
    }

    .tender-title {
        font-family: 'Roboto Slab', serif;
        font-size: 48px;
        font-weight: 900;
        margin-bottom: 20px;
        text-shadow:
            0 4px 12px rgba(0, 0, 0, 0.4),
            0 2px 4px rgba(0, 0, 0, 0.3);
        line-height: 1.15;
        letter-spacing: 1px;
        text-transform: uppercase;
        border-bottom: 3px solid rgba(255, 255, 255, 0.3);
        padding-bottom: 15px;
    }

    .tender-subtitle {
        font-size: 22px;
        font-weight: 600;
        opacity: 0.95;
        margin-bottom: 12px;
        margin-top: 15px;
        line-height: 1.4;
    }

    .tender-company {
        font-size: 17px;
        opacity: 0.85;
        font-weight: 600;
        letter-spacing: 0.5px;
        margin-top: 8px;
    }

    /* Main Content Card */
    .tender-card {
        background: white;
        border-radius: 0;
        border: 3px solid #e2e8f0;
        border-top: 6px solid #1e40af;
        box-shadow:
            0 10px 40px rgba(0, 0, 0, 0.12),
            inset 0 1px 0 rgba(255, 255, 255, 0.8);
        padding: 60px;
        margin-bottom: 40px;
        animation: fadeInUp 0.8s ease-out 0.2s both;
        position: relative;
    }

    .tender-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 6px;
        height: 100%;
        background: linear-gradient(180deg, #1e40af 0%, #3b82f6 100%);
    }

    .tender-section {
        margin-bottom: 40px;
    }

    .tender-section:last-child {
        margin-bottom: 0;
    }

    .section-header {
        display: flex;
        align-items: center;
        gap: 15px;
        margin-bottom: 25px;
        padding-bottom: 15px;
        padding-top: 5px;
        border-bottom: 4px solid #1e40af;
        position: relative;
    }

    .section-header::before {
        content: '';
        position: absolute;
        bottom: -4px;
        left: 0;
        width: 100px;
        height: 4px;
        background: #3b82f6;
    }

    .section-number {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 50px;
        height: 50px;
        background: linear-gradient(135deg, #1e40af 0%, #0f172a 100%);
        color: white;
        border-radius: 0;
        border: 3px solid #3b82f6;
        font-size: 22px;
        font-weight: 900;
        font-family: 'Roboto Slab', serif;
        box-shadow:
            0 6px 16px rgba(30, 64, 175, 0.4),
            inset 0 1px 0 rgba(255, 255, 255, 0.2);
        position: relative;
    }

    .section-number::after {
        content: '';
        position: absolute;
        top: -3px;
        left: -3px;
        right: -3px;
        bottom: -3px;
        border: 1px solid rgba(59, 130, 246, 0.3);
    }

    .section-title {
        font-family: 'Roboto Slab', serif;
        font-size: 24px;
        font-weight: 800;
        color: #0f172a;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .section-content {
        padding-left: 52px;
        color: #475569;
        font-size: 16px;
        line-height: 1.8;
    }

    .section-content p {
        margin-bottom: 12px;
    }

    .section-content ul {
        list-style: none;
        padding: 0;
        margin: 15px 0;
    }

    .section-content ul li {
        position: relative;
        padding-left: 25px;
        margin-bottom: 10px;
        line-height: 1.6;
    }

    .section-content ul li::before {
        content: '✓';
        position: absolute;
        left: 0;
        color: #3b82f6;
        font-weight: 700;
        font-size: 18px;
    }

    /* Info Boxes */
    .info-box {
        background: #eff6ff;
        border: 3px solid #3b82f6;
        border-left: 8px solid #1e40af;
        border-radius: 0;
        padding: 25px 30px;
        margin: 25px 0;
        box-shadow:
            0 4px 12px rgba(59, 130, 246, 0.15),
            inset 0 1px 0 rgba(255, 255, 255, 0.8);
        position: relative;
    }

    .info-box::before {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        width: 0;
        height: 0;
        border-style: solid;
        border-width: 0 30px 30px 0;
        border-color: transparent #3b82f6 transparent transparent;
        opacity: 0.2;
    }

    .info-box strong {
        color: #1e40af;
        display: block;
        margin-bottom: 8px;
        font-size: 16px;
    }

    .info-box p {
        margin: 0;
        color: #1e40af;
        font-weight: 500;
    }

    /* Important Dates Box */
    .dates-box {
        background: #fef3c7;
        border: 3px solid #f59e0b;
        border-left: 8px solid #d97706;
        border-radius: 0;
        padding: 30px;
        margin: 30px 0;
        box-shadow:
            0 6px 20px rgba(245, 158, 11, 0.25),
            inset 0 1px 0 rgba(255, 255, 255, 0.5);
        position: relative;
    }

    .dates-box::before {
        content: '⚠️ ВАЖНАЯ ИНФОРМАЦИЯ';
        position: absolute;
        top: -12px;
        left: 20px;
        background: #f59e0b;
        color: white;
        padding: 4px 15px;
        font-size: 11px;
        font-weight: 800;
        letter-spacing: 1px;
        border: 2px solid #d97706;
    }

    .dates-box .date-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 18px;
        margin-top: 15px;
        padding: 15px 18px;
        background: white;
        border: 2px solid #fbbf24;
        border-left: 5px solid #d97706;
    }

    .dates-box .date-item:last-child {
        margin-bottom: 0;
    }

    .dates-box .date-label {
        font-weight: 600;
        color: #92400e;
    }

    .dates-box .date-value {
        font-weight: 700;
        color: #b45309;
        font-size: 18px;
    }

    /* Download Section */
    .download-section {
        background: linear-gradient(135deg, #1e3a8a 0%, #0f172a 100%);
        border-radius: 0;
        border: 4px solid #1e40af;
        border-top: 8px solid #3b82f6;
        padding: 60px 50px;
        margin-top: 50px;
        box-shadow:
            0 20px 60px rgba(15, 23, 42, 0.5),
            inset 0 1px 0 rgba(255, 255, 255, 0.1);
        position: relative;
        overflow: hidden;
    }

    .download-section::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -20%;
        width: 400px;
        height: 400px;
        background: radial-gradient(circle, rgba(255,255,255,0.08) 0%, transparent 70%);
        animation: float 8s ease-in-out infinite;
    }

    .download-section::after {
        content: '';
        position: absolute;
        bottom: -30%;
        right: -15%;
        width: 350px;
        height: 350px;
        background: radial-gradient(circle, rgba(255,255,255,0.05) 0%, transparent 70%);
        animation: float 10s ease-in-out infinite reverse;
    }

    .download-title {
        font-family: 'Roboto Slab', serif;
        font-size: 36px;
        font-weight: 900;
        color: white;
        margin-bottom: 40px;
        display: flex;
        align-items: center;
        gap: 15px;
        position: relative;
        z-index: 1;
        text-shadow:
            0 4px 12px rgba(0, 0, 0, 0.4),
            0 2px 4px rgba(0, 0, 0, 0.3);
        text-transform: uppercase;
        letter-spacing: 1px;
        padding-bottom: 20px;
        border-bottom: 3px solid rgba(255, 255, 255, 0.3);
    }

    .download-title::before {
        content: '📄';
        font-size: 36px;
        animation: pulseScale 2s ease-in-out infinite;
    }

    .download-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 25px;
        position: relative;
        z-index: 1;
    }

    .download-card {
        background: white;
        border: 3px solid #e2e8f0;
        border-top: 5px solid #3b82f6;
        border-radius: 0;
        padding: 35px 28px;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        cursor: pointer;
        position: relative;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
    }

    .download-card::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 5px;
        height: 100%;
        background: linear-gradient(180deg, #1e40af 0%, #3b82f6 100%);
    }

    .download-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(59, 130, 246, 0.15), transparent);
        transition: left 0.6s ease;
    }

    .download-card:hover::before {
        left: 100%;
    }

    .download-card:hover {
        transform: translateY(-8px);
        box-shadow:
            0 15px 45px rgba(0, 0, 0, 0.25),
            0 0 0 4px #3b82f6;
        border-color: #1e40af;
        background: #fafbfc;
    }

    .download-icon {
        font-size: 56px;
        margin-bottom: 20px;
        display: block;
        /* animation: float 3s ease-in-out infinite; */
    }

    .download-name {
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 10px;
        font-size: 17px;
        line-height: 1.4;
        min-height: 48px;
    }

    .download-size {
        font-size: 13px;
        color: #64748b;
        font-weight: 500;
        margin-bottom: 20px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .download-button {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        background: linear-gradient(135deg, #1e40af 0%, #0f172a 100%);
        color: white;
        padding: 16px 30px;
        border-radius: 0;
        border: 3px solid #3b82f6;
        text-decoration: none;
        font-weight: 800;
        font-size: 15px;
        width: 100%;
        text-transform: uppercase;
        letter-spacing: 1px;
        transition: all 0.3s ease;
        box-shadow:
            0 6px 20px rgba(30, 64, 175, 0.5),
            inset 0 1px 0 rgba(255, 255, 255, 0.2);
        position: relative;
        overflow: hidden;
    }
    .download-button span{
        color: #fff;
    }

    .download-button::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.2);
        transform: translate(-50%, -50%);
        transition: width 0.6s, height 0.6s;
    }

    .download-button:hover::before {
        width: 300px;
        height: 300px;
    }

    .download-button:hover {
        transform: translateY(-3px);
        box-shadow:
            0 8px 30px rgba(30, 64, 175, 0.6),
            0 0 0 3px #3b82f6;
        background: linear-gradient(135deg, #3b82f6 0%, #1e40af 100%);
        border-color: #60a5fa;
        color: white;
        text-decoration: none;
    }

    .download-button span {
        position: relative;
        z-index: 1;
    }

    /* Contact Section */
    .contact-section {
        background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
        border-radius: 12px;
        padding: 35px;
        margin-top: 30px;
        border: 2px solid #cbd5e1;
    }

    .contact-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 25px;
        margin-top: 20px;
    }

    .contact-item {
        display: flex;
        align-items: flex-start;
        gap: 15px;
        padding: 20px;
        background: white;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
    }

    .contact-icon {
        font-size: 24px;
        color: #3b82f6;
    }

    .contact-info strong {
        display: block;
        color: #1e293b;
        margin-bottom: 5px;
        font-size: 14px;
    }

    .contact-info p {
        margin: 0;
        color: #475569;
        font-size: 15px;
    }

    /* Animations */
    @keyframes fadeInDown {
        from {
            opacity: 0;
            transform: translateY(-30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes pulseScale {
        0%, 100% {
            transform: scale(1);
        }
        50% {
            transform: scale(1.05);
        }
    }

    @keyframes ring {
        0%, 100% {
            transform: rotate(0deg);
        }
        10%, 30% {
            transform: rotate(-10deg);
        }
        20%, 40% {
            transform: rotate(10deg);
        }
    }

    @keyframes borderPulse {
        0%, 100% {
            opacity: 1;
        }
        50% {
            opacity: 0.7;
        }
    }

    @keyframes float {
        0%, 100% {
            transform: translateY(0px) rotate(0deg);
        }
        50% {
            transform: translateY(-20px) rotate(5deg);
        }
    }

    /* Responsive */
    @media (max-width: 768px) {
        .tender-hero {
            padding: 30px 20px;
        }

        .tender-title {
            font-size: 28px;
        }

        .tender-subtitle {
            font-size: 18px;
        }

        .tender-card {
            padding: 30px 20px;
        }

        .section-content {
            padding-left: 0;
        }

        .download-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="tender-page">
    <div class="tender-container">
        <!-- Hero Section -->
        <div class="tender-hero">
            <div class="tender-hero-content">
                <div class="tender-badge">
                    <span class="icon">🔔</span>
                    <span>НОВОЕ ОБЪЯВЛЕНИЕ</span>
                </div>
                <h1 class="tender-title">ОЧИҚ ТЕНДЕР ЭЪЛОНИ</h1>
                <p class="tender-subtitle">Техник назорат консалтинг хизматларини харид қилиш бўйича</p>
                <p class="tender-company">«Тошкент Инвест компанияси» акциядорлик жамияти</p>
            </div>
        </div>

        <!-- Main Content -->
        <div class="tender-card">
            <!-- Platform Info -->
            <div class="info-box">
                <strong>📍 Электрон савдо майдончаси:</strong>
                <p>Тендер Ўзбекистон Республикаси товар-хом ашё биржасининг <strong>Etender.uzex.uz</strong> электрон савдо майдончаси орқали ўтказилади.</p>
            </div>

            <!-- Section 1: Purchase Subject -->
            <div class="tender-section">
                <div class="section-header">
                    <div class="section-number">1</div>
                    <h2 class="section-title">Харид Предмети</h2>
                </div>
                <div class="section-content">
                    <p><strong>Қурилиш-монтаж ишларига техник назоратни амалга ошириш бўйича консалтинг</strong></p>
                    <p>Код: <strong>70.22.12.000-00001</strong></p>
                </div>
            </div>

            <!-- Section 2: Project Address -->
            <div class="tender-section">
                <div class="section-header">
                    <div class="section-number">2</div>
                    <h2 class="section-title">Лойиҳа Манзили</h2>
                </div>
                <div class="section-content">
                    <p>📍 <strong>Тошкент шаҳри, Олмазор тумани, Қорасарой кўчаси</strong></p>
                    <p>«Ўзбекистондаги Ислом цивилизацияси маркази»га туташ ҳудуд</p>
                </div>
            </div>

            <!-- Section 3: Technical Requirements -->
            <div class="tender-section">
                <div class="section-header">
                    <div class="section-number">3</div>
                    <h2 class="section-title">Техник Талаблар</h2>
                </div>
                <div class="section-content">
                    <ul>
                        <li>Кадрлар хақида маълумот</li>
                        <li>Коррупцияга йўл кўймаслик принципи талаблари</li>
                        <li>Хизмат кўрсатиладиган жой билан танишиш ва кўздан кечирганлик тўғрисида маълумот</li>
                        <li>Иштирокчининг умумий маълумотлари</li>
                        <li>Иштирокчининг молиявий ва иқтисодий кўрсаткичлари тўғрисида</li>
                        <li>Иштирокчининг барқарорлик рейтинги</li>
                        <li>Ташкилотда лицензия мавжудлиги ва ходимда сертификат мавжудлиги</li>
                    </ul>
                </div>
            </div>

            <!-- Section 4: Qualification Requirements -->
            <div class="tender-section">
                <div class="section-header">
                    <div class="section-number">4</div>
                    <h2 class="section-title">Иштирокчиларга Қўйиладиган Асосий Малака Талаблари</h2>
                </div>
                <div class="section-content">
                    <ul>
                        <li>Шартномани бажариш учун зарур техник, молиявий, моддий, кадрлар ресурсларининг ҳамда бошқа ресурсларнинг мавжудлиги</li>
                        <li>Шартнома тузиш учун қонуний ҳуқуққа эгалик</li>
                        <li>Солиқлар ва йиғимларни тўлаш бўйича муддати ўтган қарздорликнинг мавжуд эмаслиги</li>
                        <li>Ўзига нисбатан жорий этилган банкротлик тартиб-таомилларининг мавжуд эмаслиги</li>
                        <li>Инсофсиз ижрочиларнинг ягона реестрида қайд этилмаганлиги</li>
                        <li>Ўзбекистон Республикаси Бош прокуратураси ҳузуридаги Мажбурий ижро бюросининг маълумотлар базаларида иштирокчининг суд қарорлари бўйича бажарилмаган мажбуриятлари мавжуд эмаслиги</li>
                    </ul>
                </div>
            </div>

            <!-- Section 5: Participation Procedure -->
            <div class="tender-section">
                <div class="section-header">
                    <div class="section-number">5</div>
                    <h2 class="section-title">Тендерда Иштирок Етиш Тартиби</h2>
                </div>
                <div class="section-content">
                    <div class="info-box">
                        <p>Барча талабгорлар ўз тижорат таклифларини фақат:</p>
                        <p><strong>No 25120012464150</strong></p>
                        <p><a href="https://etender.uzex.uz/lot/464150" target="_blank" style="color: #1d4ed8; font-weight: 600;">https://etender.uzex.uz/lot/464150</a> портали орқали тақдим этилади.</p>
                    </div>
                </div>
            </div>

            {{-- <!-- Section 6: Important Dates -->
            <div class="tender-section">
                <div class="section-header">
                    <div class="section-number">6</div>
                    <h2 class="section-title">Эълон Берилган Сана ва Муддатлар</h2>
                </div>
                <div class="section-content">
                    <div class="dates-box">
                        <div class="date-item">
                            <span class="date-label">Тендер эълони жойлаштирилган сана:</span>
                            <span class="date-value">11 / 12 / 2025</span>
                        </div>
                        <div class="date-item">
                            <span class="date-label">Таклифларни қабул қилишнинг охирги муддати:</span>
                            <span class="date-value">31 / 12 / 2025</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section 7: Customer Information -->
            <div class="tender-section">
                <div class="section-header">
                    <div class="section-number">7</div>
                    <h2 class="section-title">Буюртмачи Ҳақида Маълумот</h2>
                </div>
                <div class="section-content">
                    <div class="contact-section">
                        <div class="contact-grid">
                            <div class="contact-item">
                                <div class="contact-icon">🏢</div>
                                <div class="contact-info">
                                    <strong>Буюртмачи номи:</strong>
                                    <p>"Тошкент Инвест компанияси" АЖ</p>
                                </div>
                            </div>
                            <div class="contact-item">
                                <div class="contact-icon">🔢</div>
                                <div class="contact-info">
                                    <strong>СТИР (ИНН):</strong>
                                    <p>310731897</p>
                                </div>
                            </div>
                            <div class="contact-item">
                                <div class="contact-icon">📍</div>
                                <div class="contact-info">
                                    <strong>Буюртмачи манзили:</strong>
                                    <p>Тошкент шаҳри, Чилонзор тумани, И.Каримов кўчаси, 51-уй</p>
                                </div>
                            </div>
                            <div class="contact-item">
                                <div class="contact-icon">📞</div>
                                <div class="contact-info">
                                    <strong>Телефон:</strong>
                                    <p>+998 (71) 210-02-61</p>
                                </div>
                            </div>
                            <div class="contact-item">
                                <div class="contact-icon">📧</div>
                                <div class="contact-info">
                                    <strong>Электрон почта:</strong>
                                    <p>info@toshkentinvest.uz</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>

        <!-- Download Documents Section -->
        <div class="download-section">
            <h3 class="download-title">Тендер ҳужжатларини юклаб олиш</h3>
            <div class="download-grid">
                <div class="download-card">
                    <span class="download-icon">📋</span>
                    <div class="download-name">ОЧИҚ ТЕНДЕР ЭЪЛОНИ</div>
                    <div class="download-size">PDF формат</div>
                    <a href="{{ asset('assets/tender/ОЧИҚ ТЕНДЕР ЭЪЛОНИ.pdf') }}" target="_blank" class="download-button">
                        <span>⬇️</span>
                        <span>Юклаб олиш</span>
                    </a>
                </div>

                <div class="download-card">
                    <span class="download-icon">📄</span>
                    <div class="download-name">Техник талаблар (Ўзбек тилида)</div>
                    <div class="download-size">PDF формат</div>
                    <a href="{{ asset('assets/tender/тт_уз.pdf') }}" target="_blank" class="download-button">
                        <span>⬇️</span>
                        <span>Юклаб олиш</span>
                    </a>
                </div>

                <div class="download-card">
                    <span class="download-icon">📄</span>
                    <div class="download-name">Техническое задание (Русский)</div>
                    <div class="download-size">PDF формат</div>
                    <a href="{{ asset('assets/tender/тз_ру.pdf') }}" target="_blank" class="download-button">
                        <span>⬇️</span>
                        <span>Юклаб олиш</span>
                    </a>
                </div>

                <div class="download-card">
                    <span class="download-icon">📦</span>
                    <div class="download-name">Харид ҳужжатлари</div>
                    <div class="download-size">PDF формат</div>
                    <a href="{{ asset('assets/tender/харид_хужжатлари.pdf') }}" target="_blank" class="download-button">
                        <span>⬇️</span>
                        <span>Юклаб олиш</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
