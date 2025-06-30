@extends('layouts.frontend_app')
@section('frontent_content')

{{-- Contact Page Hero Section --}}
<section class="contact-hero">
    <div class="hero-background">
        <div class="hero-pattern"></div>
        <div class="hero-overlay"></div>
    </div>
    <div class="container">
        <div class="hero-content">
            <div class="breadcrumb">
                <a href="{{ route('frontend.index') }}" class="breadcrumb-link">Главная</a>
                <span class="breadcrumb-separator">→</span>
                <span class="breadcrumb-current">Контакты</span>
            </div>
            <h1 class="page-title">Контакты</h1>
            <p class="page-subtitle">Свяжитесь с нами для сотрудничества и получения информации</p>
        </div>
    </div>
</section>

{{-- Main Contact Section --}}
<section class="main-contact-section">
    <div class="contact-layout">
        {{-- Contact Information Panel --}}
        <div class="contact-info-panel">
            <div class="panel-header">
                <div class="header-icon">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" fill="currentColor"/>
                    </svg>
                </div>
                <h2 class="panel-title">Наш офис</h2>
                <p class="panel-subtitle">Мы всегда готовы к диалогу</p>
            </div>

            <div class="contact-cards">
                {{-- Address Card --}}
                <div class="contact-card">
                    <div class="card-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" fill="currentColor"/>
                        </svg>
                    </div>
                    <div class="card-content">
                        <h3 class="card-title">Адрес офиса</h3>
                        <p class="card-text">Узбекистан, город Ташкент,<br>улица Ислама Каримова, 51</p>
                        <button class="card-action" onclick="openDirections()">
                            <span>Построить маршрут</span>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7 17L17 7M17 7H7M17 7V17" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>
                    </div>
                </div>


                {{-- Phone Card --}}
                <div class="contact-card">
                    <div class="card-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z" fill="currentColor"/>
                        </svg>
                    </div>
                    <div class="card-content">
                        <h3 class="card-title">Телефон</h3>
                        <p class="card-text">Звоните в рабочее время</p>
                        <a href="tel:+998712100261" class="card-action phone-link">
                            <span>+998 (71) 210 02 61</span>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7 17L17 7M17 7H7M17 7V17" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </a>
                    </div>
                </div>


            </div>

            {{-- Action Buttons --}}
            <div class="panel-actions">


                <button class="secondary-btn" onclick="downloadVCard()">
                    <span class="btn-icon">📋</span>
                    <span class="btn-text">Скачать контакты</span>
                </button>
            </div>
        </div>

        {{-- Map Section --}}
        <div class="map-section">
            <div class="map-header">
                <div class="map-controls-top">
                    <h3 class="map-title">Расположение офиса</h3>
                    <div class="map-type-switcher">
                        <button class="map-type-btn active" onclick="setMapType('map')" data-type="map">Карта</button>
                        <button class="map-type-btn" onclick="setMapType('satellite')" data-type="satellite">Спутник</button>
                    </div>
                </div>
                <p class="map-subtitle">г. Ташкент, улица Ислама Каримова, 51</p>
            </div>

            <div class="map-container">
                <div class="map-overlay-badge">
                    <div class="badge-content">
                        <span class="badge-icon">📍</span>
                        <span class="badge-text">Tashkent Invest Company</span>
                    </div>
                </div>

                <div id="yandex-contact-map" class="yandex-map"></div>

                <div class="map-controls">
                    <button class="map-control-btn" onclick="centerContactMap()" title="Центрировать карту">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 8c-2.21 0-4 1.79-4 4s1.79 4 4 4 4-1.79 4-4-1.79-4-4-4zm8.94 3A8.994 8.994 0 0013 3.06V1h-2v2.06A8.994 8.994 0 003.06 11H1v2h2.06A8.994 8.994 0 0011 20.94V23h2v-2.06A8.994 8.994 0 0020.94 13H23v-2h-2.06zM12 19c-3.87 0-7-3.13-7-7s3.13-7 7-7 7 3.13 7 7-3.13 7-7 7z" fill="currentColor"/>
                        </svg>
                    </button>

                    <button class="map-control-btn" onclick="toggleFullscreen()" title="Полноэкранный режим">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7 14H5v5h5v-2H7v-3zm-2-4h2V7h3V5H5v5zm12 7h-3v2h5v-5h-2v3zM14 5v2h3v3h2V5h-5z" fill="currentColor"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Additional Contact Information --}}
{{-- <section class="additional-info-section">
    <div class="container">
        <div class="info-grid">
            <div class="info-card">
                <div class="info-icon">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-5 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z" fill="currentColor"/>
                    </svg>
                </div>
                <h3 class="info-title">Документооборот</h3>
                <p class="info-description">Официальные запросы и документы принимаются в рабочие дни</p>
            </div>

            <div class="info-card">
                <div class="info-icon">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M16 1H4c-1.1 0-2 .9-2 2v14h2V3h12V1zm3 4H8c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h11c1.1 0 2-.9 2-2V7c0-1.1-.9-2-2-2zm-1 16H9V7h9v14z" fill="currentColor"/>
                    </svg>
                </div>
                <h3 class="info-title">Инвестиционные предложения</h3>
                <p class="info-description">Рассматриваем предложения по развитию инфраструктуры города</p>
            </div>

            <div class="info-card">
                <div class="info-icon">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" fill="currentColor"/>
                    </svg>
                </div>
                <h3 class="info-title">Партнерство</h3>
                <p class="info-description">Открыты для сотрудничества с частными и государственными организациями</p>
            </div>
        </div>
    </div>
</section> --}}

{{-- Yandex Map Script --}}
<script type="text/javascript" src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&coordorder=latlong&onload=initContactMap&apikey=a3c154a0-e8ad-438e-ada8-ac2260414d09"></script>

<script type="text/javascript">
let contactMap;
let contactPlacemark;
let currentMapType = 'map';

function initContactMap() {
    ymaps.ready(function () {
        contactMap = new ymaps.Map("yandex-contact-map", {
            center: [41.310425, 69.248169],
            zoom: 16,
            controls: []
        });

        // Custom placemark
        contactPlacemark = new ymaps.Placemark([41.310425, 69.248169], {
            balloonContentHeader: '<div style="font-weight: bold; font-size: 18px; color: #1e293b; margin-bottom: 12px; padding: 8px 0; border-bottom: 2px solid #3b82f6;">🏢 Tashkent Invest Company</div>',
            balloonContentBody: `
                <div style="font-size: 15px; line-height: 1.6; color: #475569; padding: 12px 0;">
                    <div style="margin-bottom: 12px;">
                        <strong style="color: #1e293b;">📍 Адрес:</strong><br>
                        <span style="color: #64748b;">улица Ислама Каримова, 51<br>Ташкент, Узбекистан</span>
                    </div>
                    <div style="margin-bottom: 12px;">
                        <strong style="color: #1e293b;">📧 Email:</strong><br>
                        <a href="mailto:info@tashkentinvest.com" style="color: #3b82f6; text-decoration: none;">info@tashkentinvest.com</a>
                    </div>
                    <div style="margin-bottom: 12px;">
                        <strong style="color: #1e293b;">📞 Телефон:</strong><br>
                        <a href="tel:+998712100261" style="color: #3b82f6; text-decoration: none;">+998 (71) 210 02 61</a>
                    </div>

                </div>
            `,
            balloonContentFooter: '<div style="margin-top: 16px; padding-top: 12px; border-top: 1px solid #e2e8f0; text-align: center;"><a href="https://yandex.ru/maps/?rtext=~41.310425,69.248169&rtt=auto" target="_blank" style="color: #3b82f6; text-decoration: none; font-weight: 600; display: inline-flex; align-items: center; gap: 6px;">🧭 Построить маршрут</a></div>',
            hintContent: '📍 Tashkent Invest Company - Нажмите для подробной информации'
        }, {
            preset: 'islands#blueCircleDotIcon',
            iconColor: '#3b82f6',
            iconImageSize: [50, 50],
            balloonShadow: true,
            balloonOffset: [0, -40],
            balloonCloseButton: true,
            hideIconOnBalloonOpen: false
        });

        contactMap.geoObjects.add(contactPlacemark);

        // Disable scroll zoom initially
        contactMap.behaviors.disable('scrollZoom');

        // Custom zoom control
        let zoomControl = new ymaps.control.ZoomControl({
            options: {
                size: 'small',
                position: { top: 10, left: 10 }
            }
        });
        contactMap.controls.add(zoomControl);

        // Hover effects
        contactPlacemark.events.add('mouseenter', function () {
            contactPlacemark.options.set('iconColor', '#1d4ed8');
        });

        contactPlacemark.events.add('mouseleave', function () {
            contactPlacemark.options.set('iconColor', '#3b82f6');
        });

        // Auto-open balloon after 2 seconds
        setTimeout(() => {
            contactPlacemark.balloon.open();
        }, 2000);
    });
}

function setMapType(type) {
    if (type === 'satellite') {
        contactMap.setType('yandex#satellite');
        currentMapType = 'satellite';
    } else {
        contactMap.setType('yandex#map');
        currentMapType = 'map';
    }

    // Update button states
    document.querySelectorAll('.map-type-btn').forEach(btn => {
        btn.classList.remove('active');
    });
    document.querySelector(`[data-type="${type}"]`).classList.add('active');
}

function centerContactMap() {
    contactMap.setCenter([41.310425, 69.248169], 16, {
        duration: 500,
        timingFunction: 'ease-in-out'
    });
}

function toggleFullscreen() {
    const mapContainer = document.querySelector('.map-container');
    if (!document.fullscreenElement) {
        mapContainer.requestFullscreen().then(() => {
            setTimeout(() => {
                contactMap.container.fitToViewport();
            }, 100);
        });
    } else {
        document.exitFullscreen();
    }
}

function openDirections() {
    const url = `https://yandex.ru/maps/?rtext=~41.310425,69.248169&rtt=auto`;
    window.open(url, '_blank');
}

function downloadVCard() {
    const vcard = `BEGIN:VCARD
VERSION:3.0
FN:Tashkent Invest Company
ORG:Tashkent Invest Company
ADR:;;улица Ислама Каримова 51;Ташкент;;100000;Узбекистан
TEL:+998712100261
EMAIL:info@tashkentinvest.com
URL:https://tashkentinvest.uz
END:VCARD`;

    const blob = new Blob([vcard], { type: 'text/vcard' });
    const url = window.URL.createObjectURL(blob);
    const a = document.createElement('a');
    a.href = url;
    a.download = 'tashkent-invest-contact.vcf';
    a.click();
    window.URL.revokeObjectURL(url);
}
</script>

<style>
/* Contact Page Styles */
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Roboto:wght@300;400;500;700&display=swap');

/* Contact Hero Section */
.contact-hero {
    position: relative;
    background: linear-gradient(135deg, #0f172a 0%, #1e293b 50%, #334155 100%);
    color: white;
    padding: 120px 0 80px;
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
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grid" width="20" height="20" patternUnits="userSpaceOnUse"><path d="M 20 0 L 0 0 0 20" fill="none" stroke="rgba(255,255,255,0.05)" stroke-width="1"/></pattern></defs><rect width="100" height="100" fill="url(%23grid)"/></svg>');
    opacity: 0.6;
}

.hero-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: radial-gradient(circle at 30% 70%, rgba(59, 130, 246, 0.1) 0%, transparent 50%);
}

.hero-content {
    position: relative;
    z-index: 2;
    text-align: center;
}

.breadcrumb {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 12px;
    margin-bottom: 24px;
    font-size: 0.95rem;
}

.breadcrumb-link {
    color: rgba(255, 255, 255, 0.7);
    text-decoration: none;
    transition: color 0.3s ease;
}

.breadcrumb-link:hover {
    color: #60a5fa;
}

.breadcrumb-separator {
    color: rgba(255, 255, 255, 0.5);
}

.breadcrumb-current {
    color: #60a5fa;
    font-weight: 600;
}

.page-title {
    font-size: 3.5rem;
    font-weight: 800;
    margin-bottom: 20px;
    font-family: 'Inter', sans-serif;
    background: linear-gradient(135deg, #ffffff 0%, #e2e8f0 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    text-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

.page-subtitle {
    font-size: 1.3rem;
    color: rgba(255, 255, 255, 0.8);
    font-family: 'Roboto', sans-serif;
    max-width: 600px;
    margin: 0 auto;
    line-height: 1.6;
}

/* Main Contact Section */
.main-contact-section {
    padding: 80px 0;
    background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
}

.contact-layout {
    display: grid;
    grid-template-columns: 1fr 1.5fr;
    max-width: 1400px;
    margin: 0 auto;
    gap: 0;
    background: white;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
}

/* Contact Info Panel */
.contact-info-panel {
    padding: 60px 50px;
    background: linear-gradient(135deg, #1e293b 0%, #334155 100%);
    color: white;
    position: relative;
    overflow: hidden;
}

.contact-info-panel::before {
    content: '';
    position: absolute;
    top: -50%;
    right: -30%;
    width: 150%;
    height: 150%;
    background: radial-gradient(circle, rgba(59, 130, 246, 0.1) 0%, transparent 60%);
    animation: float 8s ease-in-out infinite;
}

.panel-header {
    text-align: center;
    margin-bottom: 50px;
    position: relative;
    z-index: 2;
}

.header-icon {
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
    border-radius: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 24px;
    color: white;
    box-shadow: 0 10px 30px rgba(59, 130, 246, 0.4);
    animation: iconFloat 4s ease-in-out infinite;
}

.panel-title {
    font-size: 2.2rem;
    font-weight: 700;
    margin-bottom: 12px;
    font-family: 'Inter', sans-serif;
}

.panel-subtitle {
    font-size: 1.1rem;
    color: rgba(255, 255, 255, 0.8);
    font-family: 'Roboto', sans-serif;
}

/* Contact Cards */
.contact-cards {
    margin-bottom: 40px;
    position: relative;
    z-index: 2;
}

.contact-card {
    background: rgba(255, 255, 255, 0.08);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.1);
    border-radius: 16px;
    padding: 24px;
    margin-bottom: 20px;
    transition: all 0.3s ease;
}

.contact-card:hover {
    background: rgba(255, 255, 255, 0.12);
    transform: translateX(8px);
    border-color: rgba(59, 130, 246, 0.3);
}

.contact-card {
    display: flex;
    align-items: flex-start;
    gap: 20px;
}

.card-icon {
    width: 48px;
    height: 48px;
    background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    flex-shrink: 0;
    box-shadow: 0 4px 16px rgba(59, 130, 246, 0.3);
}

.card-content {
    flex: 1;
}

.card-title {
    font-size: 1.1rem;
    font-weight: 600;
    margin-bottom: 8px;
    color: white;
    font-family: 'Inter', sans-serif;
}

.card-text {
    font-size: 1rem;
    color: rgba(255, 255, 255, 0.8);
    margin-bottom: 12px;
    line-height: 1.5;
}

.card-action {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    color: #60a5fa;
    text-decoration: none;
    font-weight: 500;
    font-size: 0.95rem;
    transition: all 0.3s ease;
    border: none;
    background: none;
    cursor: pointer;
    padding: 8px 0;
}

.card-action:hover {
    color: #93c5fd;
    transform: translateX(4px);
}

/* Panel Actions */
.panel-actions {
    display: flex;
    flex-direction: column;
    gap: 16px;
    position: relative;
    z-index: 2;
}

.primary-btn {
    display: flex;
    align-items: center;
    justify-content: space-between;
    background: linear-gradient(135deg, #059669 0%, #047857 100%);
    color: white;
    padding: 18px 24px;
    border-radius: 12px;
    text-decoration: none;
    font-weight: 600;
    font-size: 1rem;
    transition: all 0.4s ease;
    box-shadow: 0 8px 32px rgba(5, 150, 105, 0.3);
    border: 1px solid rgba(255, 255, 255, 0.1);
    position: relative;
    overflow: hidden;
}

.primary-btn::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transition: left 0.6s ease;
}

.primary-btn:hover::before {
    left: 100%;
}

.primary-btn:hover {
    background: linear-gradient(135deg, #047857 0%, #065f46 100%);
    transform: translateY(-2px);
    box-shadow: 0 12px 40px rgba(5, 150, 105, 0.4);
}

.secondary-btn {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 12px;
    background: rgba(255, 255, 255, 0.1);
    color: white;
    padding: 16px 24px;
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 12px;
    font-weight: 600;
    font-size: 1rem;
    cursor: pointer;
    transition: all 0.3s ease;
    backdrop-filter: blur(10px);
}

.secondary-btn:hover {
    background: rgba(255, 255, 255, 0.15);
    border-color: rgba(255, 255, 255, 0.3);
    transform: translateY(-2px);
}

.btn-icon {
    font-size: 1.2rem;
}

.btn-text {
    flex: 1;
}

.btn-arrow {
    font-size: 1.2rem;
    transition: transform 0.3s ease;
}

.primary-btn:hover .btn-arrow {
    transform: translateX(4px);
}

/* Map Section */
.map-section {
    background: white;
    position: relative;
}

.map-header {
    padding: 40px 40px 30px;
    border-bottom: 1px solid #e2e8f0;
    background: linear-gradient(135deg, #f8fafc 0%, #ffffff 100%);
}

.map-controls-top {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 12px;
}

.map-title {
    font-size: 1.8rem;
    font-weight: 700;
    color: #1e293b;
    font-family: 'Inter', sans-serif;
}

.map-type-switcher {
    display: flex;
    background: #f1f5f9;
    border-radius: 8px;
    padding: 4px;
    gap: 4px;
}

.map-type-btn {
    padding: 8px 16px;
    border: none;
    background: transparent;
    color: #64748b;
    font-weight: 500;
    font-size: 0.9rem;
    border-radius: 6px;
    cursor: pointer;
    transition: all 0.3s ease;
}

.map-type-btn.active,
.map-type-btn:hover {
    background: white;
    color: #1e293b;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

.map-subtitle {
    font-size: 1rem;
    color: #64748b;
    font-family: 'Roboto', sans-serif;
}

.map-container {
    position: relative;
    height: 600px;
}

.map-overlay-badge {
    position: absolute;
    top: 20px;
    left: 20px;
    z-index: 10;
    animation: slideInLeft 1s ease-out 1s both;
}

.badge-content {
    background: linear-gradient(135deg, #1e293b 0%, #334155 100%);
    color: white;
    padding: 12px 20px;
    border-radius: 25px;
    display: flex;
    align-items: center;
    gap: 8px;
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.1);
    font-weight: 600;
    font-size: 0.9rem;
}

.badge-icon {
    font-size: 1.1rem;
}

.yandex-map {
    width: 100%;
    height: 100%;
    border: none;
    filter: brightness(1.05) contrast(1.1);
}

.map-controls {
    position: absolute;
    bottom: 20px;
    right: 20px;
    display: flex;
    flex-direction: column;
    gap: 8px;
    z-index: 10;
}

.map-control-btn {
    width: 48px;
    height: 48px;
    background: rgba(255, 255, 255, 0.95);
    border: 1px solid rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s ease;
    backdrop-filter: blur(10px);
    color: #1e293b;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

.map-control-btn:hover {
    background: white;
    transform: translateY(-2px);
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.15);
    color: #3b82f6;
}

/* Additional Info Section */
.additional-info-section {
    padding: 80px 0;
    background: white;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

.info-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 40px;
}

.info-card {
    text-align: center;
    padding: 40px 30px;
    border-radius: 16px;
    background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
    border: 1px solid rgba(0, 0, 0, 0.05);
    transition: all 0.3s ease;
}

.info-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
    background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
}

.info-icon {
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
    border-radius: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 24px;
    color: white;
    box-shadow: 0 10px 30px rgba(59, 130, 246, 0.3);
}

.info-title {
    font-size: 1.5rem;
    font-weight: 700;
    margin-bottom: 16px;
    color: #1e293b;
    font-family: 'Inter', sans-serif;
}

.info-description {
    font-size: 1rem;
    color: #64748b;
    line-height: 1.6;
    font-family: 'Roboto', sans-serif;
}

/* Animations */
@keyframes float {
    0%, 100% { transform: translateY(0px) rotate(0deg); }
    50% { transform: translateY(-20px) rotate(5deg); }
}

@keyframes iconFloat {
    0%, 100% { transform: perspective(1000px) rotateY(-10deg) translateY(0px); }
    50% { transform: perspective(1000px) rotateY(-5deg) translateY(-5px); }
}

@keyframes slideInLeft {
    from {
        opacity: 0;
        transform: translateX(-30px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

/* Mobile Responsive */
@media (max-width: 1024px) {
    .contact-layout {
        grid-template-columns: 1fr;
        margin: 0 20px;
    }

    .contact-info-panel {
        padding: 50px 40px;
    }

    .map-container {
        height: 600px;
    }

    .page-title {
        font-size: 2.8rem;
    }
}

@media (max-width: 768px) {
    .contact-hero {
        padding: 100px 0 60px;
    }

    .page-title {
        font-size: 2.2rem;
    }

    .page-subtitle {
        font-size: 1.1rem;
    }

    .contact-info-panel {
        padding: 40px 30px;
    }

    .panel-title {
        font-size: 1.8rem;
    }

    .header-icon {
        width: 60px;
        height: 60px;
    }

    .contact-card {
        padding: 20px;
        flex-direction: column;
        text-align: center;
        gap: 16px;
    }

    .map-header {
        padding: 30px 20px 20px;
    }

    .map-controls-top {
        flex-direction: column;
        gap: 16px;
        align-items: flex-start;
    }

    .map-title {
        font-size: 1.5rem;
    }

    .map-container {
        height: 400px;
    }

    .info-grid {
        grid-template-columns: 1fr;
        gap: 30px;
    }

    .info-card {
        padding: 30px 20px;
    }
}

@media (max-width: 480px) {
    .contact-hero {
        padding: 80px 0 50px;
    }

    .page-title {
        font-size: 1.8rem;
    }

    .breadcrumb {
        flex-wrap: wrap;
        font-size: 0.85rem;
    }

    .contact-info-panel {
        padding: 30px 20px;
    }

    .contact-layout {
        margin: 0 10px;
        border-radius: 12px;
    }

    .panel-actions {
        gap: 12px;
    }

    .primary-btn,
    .secondary-btn {
        padding: 14px 20px;
        font-size: 0.9rem;
    }

    .map-overlay-badge {
        left: 10px;
        top: 10px;
    }

    .badge-content {
        padding: 10px 16px;
        font-size: 0.85rem;
    }

    .map-controls {
        bottom: 15px;
        right: 15px;
    }

    .map-control-btn {
        width: 44px;
        height: 44px;
    }
}

/* Loading Animations */
.contact-hero {
    animation: fadeIn 1s ease-out;
}

.main-contact-section {
    animation: fadeInUp 0.8s ease-out 0.3s both;
}

.additional-info-section {
    animation: fadeInUp 0.8s ease-out 0.6s both;
}

.contact-card {
    animation: slideInLeft 0.6s ease-out both;
}

.contact-card:nth-child(1) { animation-delay: 1s; }
.contact-card:nth-child(2) { animation-delay: 1.2s; }
.contact-card:nth-child(3) { animation-delay: 1.4s; }
.contact-card:nth-child(4) { animation-delay: 1.6s; }

.info-card {
    animation: fadeInUp 0.6s ease-out both;
}

.info-card:nth-child(1) { animation-delay: 1.8s; }
.info-card:nth-child(2) { animation-delay: 2s; }
.info-card:nth-child(3) { animation-delay: 2.2s; }

@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
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

/* High Quality Rendering */
* {
    text-rendering: optimizeLegibility;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}

/* Focus States for Accessibility */
.card-action:focus,
.primary-btn:focus,
.secondary-btn:focus,
.map-control-btn:focus,
.map-type-btn:focus {
    outline: 2px solid #fbbf24;
    outline-offset: 2px;
}

/* Print Styles */
@media print {
    .contact-hero,
    .map-section {
        background: white !important;
        color: black !important;
    }

    .contact-info-panel {
        background: white !important;
        color: black !important;
    }

    .map-container {
        display: none;
    }

    .panel-actions {
        display: none;
    }
}
</style>

@endsection
