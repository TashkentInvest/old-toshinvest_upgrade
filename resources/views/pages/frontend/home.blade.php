@extends('layouts.frontend_app')
@section('frontent_content')

{{-- Hero Section --}}
<section class="hero-section">
    <div class="hero-background">
        <div class="hero-overlay"></div>
        <video class="hero-video" autoplay muted loop playsinline>
            <source src="{{ asset('assets/video.mp4') }}" type="video/mp4">
        </video>
    </div>
    <style>
        .hero-overlay {

            background: linear-gradient(135deg, rgb(0 34 130 / 65%) 0%, rgba(51, 65, 85, 0.6) 100%) !important;
            }
    </style>
    <div class="hero-content">
        <div class="container">
            <div class="hero-text">
                <h1 class="hero-title">{{ __('frontend.home.hero_title') }}</h1>
                <p class="hero-description">
                    {{ __('frontend.home.hero_description') }}
                </p>
            </div>
        </div>
    </div>
    <div class="scroll-indicator">
        <div class="scroll-arrow">
            <svg width="38" height="19" viewBox="0 0 38.417 18.592" fill="currentColor">
                <path d="M19.208,18.592c-0.241,0-0.483-0.087-0.673-0.261L0.327,1.74c-0.408-0.372-0.438-1.004-0.066-1.413c0.372-0.409,1.004-0.439,1.413-0.066L19.208,16.24L36.743,0.261c0.411-0.372,1.042-0.342,1.413,0.066c0.372,0.408,0.343,1.041-0.065,1.413L19.881,18.332C19.691,18.505,19.449,18.592,19.208,18.592z"/>
            </svg>
        </div>
    </div>
</section>

{{-- Features Section --}}
<section class="features-section">
    <div class="container">
        <div class="features-grid">
            {{-- Feature 1 --}}
            <div class="feature-card feature-large">
                <div class="feature-image">
                    <img src="https://static.tildacdn.one/tild3637-6137-4736-a139-393336343331/lison-zhao-Lvt7BnCpU.jpg"
                         alt="Преобразование города">
                    <div class="feature-overlay"></div>
                </div>
                <div class="feature-content">
                    <h3 class="feature-title">{{ __('frontend.home.feature_1_title') }}</h3>
                    <p class="feature-description">
                        {{ __('frontend.home.feature_1_desc') }}
                    </p>
                </div>
            </div>

            {{-- Feature 2 --}}
            <div class="feature-card feature-medium">
                <div class="feature-image">
                    <img src="https://static.tildacdn.one/tild3163-6637-4965-b261-653835643334/pexels-photo-1431446.jpeg"
                         alt="Градостроительство">
                    <div class="feature-overlay"></div>
                </div>
                <div class="feature-content">
                    <h3 class="feature-title">{{ __('frontend.home.feature_2_title') }}</h3>
                    <p class="feature-description">
                        {{ __('frontend.home.feature_2_desc') }}
                    </p>
                </div>
            </div>

            {{-- Feature 3 --}}
            <div class="feature-card feature-medium">
                <div class="feature-image">
                    <img src="https://static.tildacdn.one/tild3337-6335-4135-b032-646332396131/pexels-fotios-photos.jpg"
                         alt="Экономический рост">
                    <div class="feature-overlay"></div>
                </div>
                <div class="feature-content">
                    <h3 class="feature-title">{{ __('frontend.home.feature_3_title') }}</h3>
                    <p class="feature-description">
                        {{ __('frontend.home.feature_3_desc') }}
                    </p>
                </div>
            </div>

            {{-- Feature 4 --}}
            <div class="feature-card feature-large">
                <div class="feature-image">
                    <img src="https://static.tildacdn.one/tild3639-3233-4732-a166-373937363864/pexels-photo-416405.jpeg"
                         alt="Управление проектами">
                    <div class="feature-overlay"></div>
                </div>
                <div class="feature-content">
                    <h3 class="feature-title">{{ __('frontend.home.feature_4_title') }}</h3>
                    <p class="feature-description">
                        {{ __('frontend.home.feature_4_desc') }}
                    </p>
                </div>
            </div>

            {{-- Feature 5 --}}
            <div class="feature-card feature-medium">
                <div class="feature-image">
                    <img src="https://static.tildacdn.one/tild3166-6138-4235-a138-373435626432/pexels-photo-681335.jpeg"
                         alt="Городское обслуживание">
                    <div class="feature-overlay"></div>
                </div>
                <div class="feature-content">
                    <h3 class="feature-title">{{ __('frontend.home.feature_5_title') }}</h3>
                    <p class="feature-description">
                        {{ __('frontend.home.feature_5_desc') }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- News Section --}}
{{-- <section class="news-section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Новости</h2>
        </div>
        <div class="news-grid">
            <div class="news-placeholder">
                <p>Новости будут добавлены здесь</p>
            </div>
        </div>
    </div>
</section> --}}

{{-- Contact & Map Section --}}
{{-- <section class="contact-section">
    <div class="contact-container">
        <div class="contact-info">
            <div class="contact-header">
                <div class="contact-icon-bg">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" fill="currentColor"/>
                    </svg>
                </div>
                <h3 class="contact-title">Наш офис</h3>
                <p class="contact-tagline">Свяжитесь с нами для сотрудничества</p>
            </div>

            <div class="contact-details">
                <div class="contact-item">
                    <div class="contact-item-icon">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.89 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z" fill="currentColor"/>
                        </svg>
                    </div>
                    <div class="contact-item-content">
                        <span class="contact-label">Email</span>
                        <a href="mailto:info@tashkentinvest.com" class="contact-link">info@tashkentinvest.com</a>
                    </div>
                </div>

                <div class="contact-item">
                    <div class="contact-item-icon">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" fill="currentColor"/>
                        </svg>
                    </div>
                    <div class="contact-item-content">
                        <span class="contact-label">Адрес</span>
                        <span class="contact-text">Узбекистан, город Ташкент,<br>улица Ислама Каримова, 51</span>
                    </div>
                </div>

                <div class="contact-item">
                    <div class="contact-item-icon">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z" fill="currentColor"/>
                        </svg>
                    </div>
                    <div class="contact-item-content">
                        <span class="contact-label">Телефон</span>
                        <a class="contact-link" href="tel:+998712100261">+998 (71) 210-02-61</a>

                    </div>
                </div>
            </div>


        </div>

        <div class="map-section">
            <div class="map-header">
                <div class="map-decoration">
                    <div class="decoration-circle decoration-1"></div>
                    <div class="decoration-circle decoration-2"></div>
                    <div class="decoration-circle decoration-3"></div>
                </div>
                <h4 class="map-title">Найдите нас на карте</h4>
                <p class="map-subtitle">Удобное расположение в центре Ташкента</p>
            </div>

            <div class="map-wrapper">
                <div class="map-overlay-info">
                    <div class="map-badge">
                        <span class="badge-icon">📍</span>
                        <span class="badge-text">Tashkent Invest</span>
                    </div>
                </div>
                <div id="yandex-map" class="yandex-map"></div>
                <div class="map-controls">
                    <button class="map-control-btn" onclick="toggleMapType()" title="Переключить тип карты">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M20.5 3l-.16.03L15 5.1 9 3 3.36 4.9c-.21.07-.36.25-.36.48V20.5c0 .28.22.5.5.5l.16-.03L9 18.9l6 2.1 5.64-1.9c.21-.07.36-.25.36-.48V3.5c0-.28-.22-.5-.5-.5zM10 5.47l4 1.4v11.66l-4-1.4V5.47zm-5 .99l3-1.01v11.7l-3 1.16V6.46zm14 11.08l-3 1.01V6.86l3-1.16v11.84z" fill="currentColor"/>
                        </svg>
                    </button>
                    <button class="map-control-btn" onclick="centerMap()" title="Центрировать карту">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 8c-2.21 0-4 1.79-4 4s1.79 4 4 4 4-1.79 4-4-1.79-4-4-4zm8.94 3A8.994 8.994 0 0013 3.06V1h-2v2.06A8.994 8.994 0 003.06 11H1v2h2.06A8.994 8.994 0 0011 20.94V23h2v-2.06A8.994 8.994 0 0020.94 13H23v-2h-2.06zM12 19c-3.87 0-7-3.13-7-7s3.13-7 7-7 7 3.13 7 7-3.13 7-7 7z" fill="currentColor"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section> --}}

{{-- Yandex Map Script --}}
<script type="text/javascript" src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&coordorder=latlong&onload=t_handleYandexApiReady_748107222&apikey=a3c154a0-e8ad-438e-ada8-ac2260414d09"></script>
<style>
@media (max-width: 1024px) {
    .contact-container {
        grid-template-columns: 1fr;
    }

    .contact-info {
        padding: 60px 40px;
    }

    .map-wrapper {
        height: 500px;
    }

    .map-header {
        padding: 25px 30px;
    }

    .contact-actions {
        flex-direction: row;
        gap: 12px;
    }

    .projects-btn,
    .directions-btn {
        flex: 1;
        justify-content: center;
    }
}

@media (max-width: 768px) {
    .contact-info {
        padding: 40px 30px;
    }

    .contact-title {
        font-size: 1.8rem;
    }

    .contact-icon-bg {
        width: 60px;
        height: 60px;
    }

    .contact-item {
        padding: 16px;
        margin-bottom: 20px;
    }

    .contact-item-icon {
        width: 40px;
        height: 40px;
    }

    .map-header {
        padding: 20px 25px;
    }

    .map-title {
        font-size: 1.5rem;
    }

    .map-decoration {
        right: 25px;
    }

    .map-wrapper {
        height: 400px;
    }

    .contact-actions {
        flex-direction: column;
        gap: 16px;
    }

    .map-controls {
        bottom: 15px;
        right: 15px;
    }

    .map-control-btn {
        width: 40px;
        height: 40px;
    }
}

@media (max-width: 480px) {
    .contact-info {
        padding: 30px 20px;
    }

    .contact-title {
        font-size: 1.6rem;
    }

    .contact-tagline {
        font-size: 1rem;
    }

    .contact-item {
        flex-direction: column;
        text-align: center;
        padding: 20px 16px;
    }

    .contact-item-icon {
        margin: 0 auto 12px;
    }

    .map-header {
        padding: 20px;
        text-align: center;
    }

    .map-decoration {
        position: relative;
        right: auto;
        top: auto;
        justify-content: center;
        margin-bottom: 15px;
    }

    .map-title {
        font-size: 1.3rem;
    }

    .map-wrapper {
        height: 350px;
    }

    .map-overlay-info {
        left: 10px;
        top: 100px;
    }

    .map-badge {
        padding: 10px 16px;
        font-size: 0.85rem;
    }
}

/* Enhanced Loading Animations for Contact Section */
.contact-section {
    animation: fadeInUp 0.8s ease-out 0.9s both;
}

.contact-item {
    animation: slideInLeft 0.6s ease-out both;
}

.contact-item:nth-child(1) { animation-delay: 1.2s; }
.contact-item:nth-child(2) { animation-delay: 1.4s; }
.contact-item:nth-child(3) { animation-delay: 1.6s; }

.contact-actions .projects-btn {
    animation: slideInUp 0.6s ease-out 1.8s both;
}

.contact-actions .directions-btn {
    animation: slideInUp 0.6s ease-out 2s both;
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

@keyframes slideInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Map Loading Animation */
.yandex-map {
    opacity: 0;
    animation: mapFadeIn 1s ease-out 1.5s both;
}

@keyframes mapFadeIn {
    from {
        opacity: 0;
        transform: scale(0.95);
    }
    to {
        opacity: 1;
        transform: scale(1);
    }
}

/* Beautiful Scrollbar for Contact Section */
.contact-info::-webkit-scrollbar {
    width: 6px;
}

.contact-info::-webkit-scrollbar-track {
    background: rgba(255, 255, 255, 0.1);
    border-radius: 3px;
}

.contact-info::-webkit-scrollbar-thumb {
    background: rgba(59, 130, 246, 0.5);
    border-radius: 3px;
}

.contact-info::-webkit-scrollbar-thumb:hover {
    background: rgba(59, 130, 246, 0.7);
}

/* High Quality Rendering */
.contact-section * {
    text-rendering: optimizeLegibility;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}

/* Interactive hover states for better UX */
.contact-item,
.projects-btn,
.directions-btn,
.map-control-btn {
    cursor: pointer;
    user-select: none;
}

/* Focus states for accessibility */
.projects-btn:focus,
.directions-btn:focus,
.map-control-btn:focus {
    outline: 2px solid #fbbf24;
    outline-offset: 2px;
}

/* Print styles for contact section */
@media print {
    .contact-section {
        background: white !important;
        color: black !important;
    }

    .contact-info {
        background: white !important;
    }

    .map-wrapper {
        display: none;
    }

    .contact-actions {
        display: none;
    }
}
</style>
<script type="text/javascript">
function t_handleYandexApiReady_748107222() {
    ymaps.ready(function () {
        var map = new ymaps.Map("yandex-map", {
            center: [41.310425, 69.248169], // Tashkent coordinates
            zoom: 16,
            controls: ['zoomControl', 'fullscreenControl']
        });

        // Add custom placemark
        var placemark = new ymaps.Placemark([41.310425, 69.248169], {
            balloonContent: '<strong>Tashkent Invest Company</strong><br>улица Ислама Каримова, 51<br>Ташкент, Узбекистан',
            hintContent: 'Tashkent Invest Company'
        }, {
            preset: 'islands#blueCircleDotIcon',
            iconColor: '#3b82f6'
        });

        map.geoObjects.add(placemark);

        // Custom map style (light theme)
        map.options.set('restrictMapArea', false);

        // Set custom map style
        var customStyle = [
            {
                "featureType": "water",
                "elementType": "geometry.fill",
                "stylers": [{"color": "#d3d3d3"}]
            },
            {
                "featureType": "transit",
                "stylers": [{"color": "#808080"}, {"visibility": "off"}]
            },
            {
                "featureType": "road.highway",
                "elementType": "geometry.stroke",
                "stylers": [{"visibility": "on"}, {"color": "#b3b3b3"}]
            },
            {
                "featureType": "road.highway",
                "elementType": "geometry.fill",
                "stylers": [{"color": "#ffffff"}]
            },
            {
                "featureType": "road.local",
                "elementType": "geometry.fill",
                "stylers": [{"visibility": "on"}, {"color": "#ffffff"}, {"weight": 1.8}]
            },
            {
                "featureType": "road.local",
                "elementType": "geometry.stroke",
                "stylers": [{"color": "#d7d7d7"}]
            },
            {
                "featureType": "poi",
                "elementType": "geometry.fill",
                "stylers": [{"visibility": "on"}, {"color": "#ebebeb"}]
            },
            {
                "featureType": "administrative",
                "elementType": "geometry",
                "stylers": [{"color": "#a7a7a7"}]
            },
            {
                "featureType": "road.arterial",
                "elementType": "geometry.fill",
                "stylers": [{"color": "#ffffff"}]
            },
            {
                "featureType": "landscape",
                "elementType": "geometry.fill",
                "stylers": [{"visibility": "on"}, {"color": "#efefef"}]
            },
            {
                "featureType": "road",
                "elementType": "labels.text.fill",
                "stylers": [{"color": "#696969"}]
            },
            {
                "featureType": "administrative",
                "elementType": "labels.text.fill",
                "stylers": [{"visibility": "on"}, {"color": "#737373"}]
            },
            {
                "featureType": "poi",
                "elementType": "labels.icon",
                "stylers": [{"visibility": "off"}]
            },
            {
                "featureType": "poi",
                "elementType": "labels",
                "stylers": [{"visibility": "off"}]
            },
            {
                "featureType": "road.arterial",
                "elementType": "geometry.stroke",
                "stylers": [{"color": "#d6d6d6"}]
            },
            {
                "featureType": "road",
                "elementType": "labels.icon",
                "stylers": [{"visibility": "off"}]
            },
            {
                "featureType": "poi",
                "elementType": "geometry.fill",
                "stylers": [{"color": "#dadada"}]
            }
        ];
    });
}
</script>

<style>
/* Parliament Homepage Styles */

/* Import Google Fonts */
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Roboto:wght@300;400;500;700&display=swap');

/* Container */
.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

/* Hero Section */
.hero-section {
    position: relative;
    height: 70vh;
    min-height: 500px;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
}

.hero-background {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    z-index: 1;
}

.hero-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
}

.hero-video {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
}

.hero-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, rgba(30, 41, 59, 0.8) 0%, rgba(51, 65, 85, 0.6) 100%);
    z-index: 2;
}

.hero-content {
    position: relative;
    z-index: 3;
    text-align: center;
    color: white;
}

.hero-text {
    max-width: 800px;
    margin: 0 auto;
}

.hero-title {
    font-size: 3.5rem;
    font-weight: 800;
    margin-bottom: 24px;
    font-family: 'Inter', sans-serif;
    text-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
    letter-spacing: -0.02em;
    line-height: 1.1;
}

.hero-description {
    font-size: 1.2rem;
    font-weight: 400;
    line-height: 1.6;
    opacity: 0.95;
    font-family: 'Roboto', sans-serif;
    text-shadow: 0 1px 4px rgba(0, 0, 0, 0.2);
}

.scroll-indicator {
    position: absolute;
    bottom: 30px;
    left: 50%;
    transform: translateX(-50%);
    z-index: 3;
}

.scroll-arrow {
    color: white;
    animation: bounce 2s infinite;
    opacity: 0.8;
}

@keyframes bounce {
    0%, 20%, 50%, 80%, 100% {
        transform: translateY(0);
    }
    40% {
        transform: translateY(-10px);
    }
    60% {
        transform: translateY(-5px);
    }
}

/* Features Section */
.features-section {
    padding: 80px 0;
    background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
}

.features-grid {
    display: grid;
    grid-template-columns: 2fr 1fr;
    grid-template-rows: auto auto auto;
    gap: 30px;
    max-width: 1200px;
    margin: 0 auto;
}

.feature-card {
    position: relative;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
    transition: all 0.4s ease;
    background: white;
}

.feature-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
}

.feature-large {
    grid-column: span 2;
    min-height: 350px;
}

.feature-medium {
    min-height: 280px;
}

.feature-image {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    overflow: hidden;
}

.feature-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.6s ease;
}

.feature-card:hover .feature-image img {
    transform: scale(1.1);
}

.feature-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, rgba(30, 41, 59, 0.7) 0%, rgba(51, 65, 85, 0.5) 100%);
    transition: all 0.4s ease;
}

.feature-card:hover .feature-overlay {
    background: linear-gradient(135deg, rgba(30, 41, 59, 0.8) 0%, rgba(51, 65, 85, 0.6) 100%);
}

.feature-content {
    position: relative;
    z-index: 2;
    padding: 40px;
    color: white;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
}

.feature-title {
    font-size: 1.5rem;
    font-weight: 700;
    margin-bottom: 16px;
    font-family: 'Inter', sans-serif;
    line-height: 1.3;
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
}

.feature-large .feature-title {
    font-size: 1.8rem;
}

.feature-description {
    font-size: 1rem;
    line-height: 1.6;
    opacity: 0.95;
    font-family: 'Roboto', sans-serif;
    text-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
}

/* News Section */
.news-section {
    padding: 80px 0;
    background: white;
}

.section-header {
    text-align: center;
    margin-bottom: 60px;
}

.section-title {
    font-size: 2.5rem;
    font-weight: 700;
    color: #1e293b;
    font-family: 'Inter', sans-serif;
    position: relative;
    display: inline-block;
}

.section-title::after {
    content: '';
    position: absolute;
    bottom: -12px;
    left: 50%;
    transform: translateX(-50%);
    width: 80px;
    height: 4px;
    background: linear-gradient(90deg, #3b82f6, #60a5fa);
    border-radius: 2px;
}

.news-placeholder {
    text-align: center;
    padding: 60px 20px;
    background: linear-gradient(135deg, #f1f5f9 0%, #e2e8f0 100%);
    border-radius: 12px;
    color: #64748b;
    font-size: 1.1rem;
    font-family: 'Inter', sans-serif;
}

/* Contact Section - Creative & Beautiful */
.contact-section {
    background: linear-gradient(135deg, #0f172a 0%, #1e293b 50%, #334155 100%);
    color: white;
    padding: 0;
    position: relative;
    overflow: hidden;
}

.contact-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grid" width="20" height="20" patternUnits="userSpaceOnUse"><path d="M 20 0 L 0 0 0 20" fill="none" stroke="rgba(255,255,255,0.03)" stroke-width="1"/></pattern></defs><rect width="100" height="100" fill="url(%23grid)"/></svg>');
    opacity: 0.5;
}

.contact-container {
    display: grid;
    grid-template-columns: 1fr 1.5fr;
    min-height: 700px;
    position: relative;
    z-index: 2;
}

.contact-info {
    padding: 80px 60px;
    background: linear-gradient(135deg, rgba(59, 130, 246, 0.1) 0%, rgba(30, 41, 59, 0.8) 100%);
    backdrop-filter: blur(10px);
    border-right: 1px solid rgba(255, 255, 255, 0.1);
    position: relative;
    overflow: hidden;
}

.contact-info::before {
    content: '';
    position: absolute;
    top: -50%;
    right: -20%;
    width: 200%;
    height: 200%;
    background: radial-gradient(circle, rgba(59, 130, 246, 0.1) 0%, transparent 50%);
    animation: float 6s ease-in-out infinite;
}

@keyframes float {
    0%, 100% { transform: translateY(0px) rotate(0deg); }
    50% { transform: translateY(-20px) rotate(5deg); }
}

.contact-header {
    text-align: center;
    margin-bottom: 50px;
    position: relative;
    z-index: 2;
}

.contact-icon-bg {
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
    border-radius: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 20px;
    color: white;
    box-shadow: 0 10px 30px rgba(59, 130, 246, 0.3);
    transform: perspective(1000px) rotateY(-10deg);
    animation: iconFloat 4s ease-in-out infinite;
}

@keyframes iconFloat {
    0%, 100% { transform: perspective(1000px) rotateY(-10deg) translateY(0px); }
    50% { transform: perspective(1000px) rotateY(-5deg) translateY(-5px); }
}

.contact-title {
    font-size: 2.2rem;
    font-weight: 700;
    margin-bottom: 12px;
    font-family: 'Inter', sans-serif;
    background: linear-gradient(135deg, #ffffff 0%, #e2e8f0 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.contact-tagline {
    font-size: 1.1rem;
    color: rgba(255, 255, 255, 0.8);
    font-family: 'Roboto', sans-serif;
    font-weight: 400;
}

.contact-details {
    margin-bottom: 40px;
    position: relative;
    z-index: 2;
}

.contact-item {
    padding: 20px !important;
    /* display: flex;
    align-items: flex-start;
    margin-bottom: 30px;
    background: rgba(255, 255, 255, 0.05);
    border-radius: 16px;
    border: 1px solid rgba(255, 255, 255, 0.1);
    transition: all 0.3s ease;
    backdrop-filter: blur(10px); */
}

.contact-item:hover {
    background: rgba(255, 255, 255, 0.08);
    transform: translateX(8px);
    border-color: rgba(59, 130, 246, 0.3);
    box-shadow: 0 8px 32px rgba(59, 130, 246, 0.15);
}

.contact-item-icon {
    width: 48px;
    height: 48px;
    background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-right: 16px;
    color: white;
    flex-shrink: 0;
    box-shadow: 0 4px 16px rgba(59, 130, 246, 0.3);
}

.contact-item-content {
    flex: 1;
}

.contact-label {
    display: block;
    font-size: 0.9rem;
    color: rgba(255, 255, 255, 0.6);
    font-weight: 500;
    margin-bottom: 4px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.contact-link {
    color: #fff !important;
    text-decoration: none;
    font-weight: 600;
    font-size: 1.1rem;
    transition: all 0.3s ease;
}

.contact-link:hover {
    color: #93c5fd;
    text-decoration: underline;
}

.contact-text {
    color: rgba(255, 255, 255, 0.9);
    font-weight: 500;
    font-size: 1.1rem;
    line-height: 1.5;
}

.contact-actions {
    display: flex;
    flex-direction: column;
    gap: 16px;
    position: relative;
    z-index: 2;
}

.projects-btn {
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

.projects-btn::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transition: left 0.6s ease;
}

.projects-btn:hover::before {
    left: 100%;
}

.projects-btn:hover {
    background: linear-gradient(135deg, #047857 0%, #065f46 100%);
    transform: translateY(-2px);
    box-shadow: 0 12px 40px rgba(5, 150, 105, 0.4);
}

.directions-btn {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
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

.directions-btn:hover {
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

.projects-btn:hover .btn-arrow {
    transform: translateX(4px);
}

/* Map Section - Creative Design */
.map-section {
    position: relative;
    background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
}

.map-header {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    z-index: 10;
    background: linear-gradient(135deg, rgba(248, 250, 252, 0.95) 0%, rgba(226, 232, 240, 0.95) 100%);
    backdrop-filter: blur(10px);
    padding: 30px 40px;
    border-bottom: 1px solid rgba(0, 0, 0, 0.05);
}

.map-decoration {
    position: absolute;
    top: 20px;
    right: 40px;
    display: flex;
    gap: 8px;
}

.decoration-circle {
    width: 12px;
    height: 12px;
    border-radius: 50%;
    animation: pulse 2s ease-in-out infinite;
}

.decoration-1 {
    background: #ef4444;
    animation-delay: 0s;
}

.decoration-2 {
    background: #f59e0b;
    animation-delay: 0.2s;
}

.decoration-3 {
    background: #10b981;
    animation-delay: 0.4s;
}

@keyframes pulse {
    0%, 100% { opacity: 0.6; transform: scale(1); }
    50% { opacity: 1; transform: scale(1.2); }
}

.map-title {
    font-size: 1.8rem;
    font-weight: 700;
    color: #1e293b;
    font-family: 'Inter', sans-serif;
    margin-bottom: 8px;
}

.map-subtitle {
    font-size: 1rem;
    color: #64748b;
    font-family: 'Roboto', sans-serif;
}

.map-wrapper {
    position: relative;
    height: 700px;
    border-radius: 0;
    overflow: hidden;
}

.map-overlay-info {
    position: absolute;
    top: 120px;
    left: 20px;
    z-index: 10;
}

.map-badge {
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
    animation: slideInLeft 1s ease-out 1s both;
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

.badge-icon {
    font-size: 1.1rem;
}

.yandex-map {
    height: 100%;
    width: 100%;
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
    width: 44px;
    height: 44px;
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

/* Mobile Responsive */
@media (max-width: 1024px) {
    .features-grid {
        grid-template-columns: 1fr;
        gap: 20px;
    }

    .feature-large,
    .feature-medium {
        grid-column: span 1;
        min-height: 250px;
    }

    .contact-container {
        grid-template-columns: 1fr;
    }

    .contact-info {
        padding: 60px 40px;
    }
}

@media (max-width: 768px) {
    .hero-title {
        font-size: 2.5rem;
    }

    .hero-description {
        font-size: 1.1rem;
    }

    .features-section {
        padding: 60px 0;
    }

    .feature-content {
        padding: 30px;
    }

    .feature-title {
        font-size: 1.3rem;
    }

    .section-title {
        font-size: 2rem;
    }

    .contact-info {
        padding: 40px 30px;
    }

    .contact-title {
        font-size: 1.5rem;
    }

    .contact-item {
        font-size: 1rem;
    }
}

@media (max-width: 480px) {
    .container {
        padding: 0 15px;
    }

    .hero-title {
        font-size: 2rem;
    }

    .hero-description {
        font-size: 1rem;
    }

    .features-section {
        padding: 40px 0;
    }

    .feature-content {
        padding: 25px;
    }

    .section-title {
        font-size: 1.8rem;
    }

    .contact-info {
        padding: 30px 20px;
    }
}

/* Loading Animations */
.hero-section {
    animation: fadeIn 1s ease-out;
}

.features-section {
    animation: fadeInUp 0.8s ease-out 0.3s both;
}

.news-section {
    animation: fadeInUp 0.8s ease-out 0.6s both;
}

.contact-section {
    animation: fadeInUp 0.8s ease-out 0.9s both;
}

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
</style>


@endsection

