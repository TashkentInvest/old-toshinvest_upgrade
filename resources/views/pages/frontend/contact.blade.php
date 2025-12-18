@extends('layouts.frontend_app')
@section('frontent_content')

{{-- Contact Page Hero --}}
<section class="contact-hero">
    <div class="container">
        <nav class="breadcrumb">
            <a href="{{ route('frontend.index') }}">{{ __('frontend.breadcrumb.home') }}</a>
            <i class="fas fa-chevron-right"></i>
            <span>{{ __('frontend.breadcrumb.contact') }}</span>
        </nav>
        <h1 class="hero-title">{{ __('frontend.contact.title') }}</h1>
        <p class="hero-subtitle">{{ __('frontend.contact.subtitle') }}</p>
    </div>
</section>

{{-- Contact Content --}}
<section class="contact-section">
    <div class="container">
        <div class="contact-grid">
            {{-- Contact Info Cards --}}
            <div class="contact-info">
                <div class="info-card">
                    <div class="info-icon"><i class="fas fa-map-marker-alt"></i></div>
                    <div class="info-content">
                        <h3>{{ __('frontend.contact.address_title') }}</h3>
                        <p>{{ __('frontend.contact.address_text') }}</p>
                        <a href="https://yandex.ru/maps/?rtext=~41.310425,69.248169&rtt=auto" target="_blank" class="info-link">
                            {{ __('frontend.contact.build_route') }} <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <div class="info-card">
                    <div class="info-icon"><i class="fas fa-phone-alt"></i></div>
                    <div class="info-content">
                        <h3>{{ __('frontend.contact.phone_title') }}</h3>
                        <p>{{ __('frontend.contact.phone_desc') }}</p>
                        <a href="tel:+998712100261" class="info-link phone">
                            +998 71 210 02 61 <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <div class="info-card">
                    <div class="info-icon"><i class="fas fa-envelope"></i></div>
                    <div class="info-content">
                        <h3>{{ __('frontend.contact.email_title') }}</h3>
                        <p>{{ __('frontend.contact.email_desc') }}</p>
                        <a href="mailto:info@toshkentinvest.uz" class="info-link">
                            info@toshkentinvest.uz <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <div class="info-card">
                    <div class="info-icon"><i class="fas fa-clock"></i></div>
                    <div class="info-content">
                        <h3>{{ __('frontend.contact.hours_title') }}</h3>
                        <p>{{ __('frontend.contact.hours_desc') }}</p>
                        <span class="info-text">09:00 - 18:00</span>
                    </div>
                </div>

                <button class="download-btn" onclick="downloadVCard()">
                    <i class="fas fa-download"></i>
                    {{ __('frontend.contact.download_contacts') }}
                </button>
            </div>

            {{-- Map --}}
            <div class="contact-map">
                <div class="map-header">
                    <h3>{{ __('frontend.contact.map_title') }}</h3>
                    <div class="map-switcher">
                        <button class="map-btn active" data-type="map">{{ __('frontend.contact.map_type_map') }}</button>
                        <button class="map-btn" data-type="satellite">{{ __('frontend.contact.map_type_satellite') }}</button>
                    </div>
                </div>
                <div class="map-wrapper">
                    <div id="contact-map"></div>
                    <div class="map-badge">
                        <i class="fas fa-building"></i>
                        Tashkent Invest Company
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Yandex Map --}}
<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&apikey=a3c154a0-e8ad-438e-ada8-ac2260414d09"></script>
<script>
ymaps.ready(function() {
    const map = new ymaps.Map('contact-map', {
        center: [41.310425, 69.248169],
        zoom: 16,
        controls: ['zoomControl']
    });

    const placemark = new ymaps.Placemark([41.310425, 69.248169], {
        balloonContentHeader: '<strong>Tashkent Invest Company</strong>',
        balloonContentBody: '{{ __("frontend.contact.address_text") }}<br><a href="tel:+998712100261">+998 71 210 02 61</a>',
        hintContent: 'Tashkent Invest Company'
    }, {
        preset: 'islands#blueCircleDotIcon'
    });

    map.geoObjects.add(placemark);
    map.behaviors.disable('scrollZoom');

    // Map type switcher
    document.querySelectorAll('.map-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            document.querySelectorAll('.map-btn').forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            map.setType(this.dataset.type === 'satellite' ? 'yandex#satellite' : 'yandex#map');
        });
    });
});

function downloadVCard() {
    const vcard = `BEGIN:VCARD
VERSION:3.0
FN:Tashkent Invest Company
ORG:Tashkent Invest Company
ADR:;;Islam Karimov street 51;Tashkent;;100000;Uzbekistan
TEL:+998712100261
EMAIL:info@toshkentinvest.uz
URL:https://toshkentinvest.uz
END:VCARD`;
    const blob = new Blob([vcard], { type: 'text/vcard' });
    const a = document.createElement('a');
    a.href = URL.createObjectURL(blob);
    a.download = 'tashkent-invest.vcf';
    a.click();
}
</script>

<style>
/* Contact Page - Clean Optimized Styles */
.contact-hero {
    background: linear-gradient(135deg, #1e3a5f 0%, #2d4a6f 100%);
    color: #fff;
    padding: 100px 0 60px;
}

.contact-hero .container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

.contact-hero .breadcrumb {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 20px;
    font-size: 14px;
}

.contact-hero .breadcrumb a {
    color: rgba(255,255,255,0.7);
    text-decoration: none;
}

.contact-hero .breadcrumb a:hover {
    color: #fff;
}

.contact-hero .breadcrumb i {
    font-size: 10px;
    opacity: 0.5;
}

.contact-hero .breadcrumb span {
    color: #f5c842;
}

.hero-title {
    font-size: 42px;
    font-weight: 700;
    margin: 0 0 15px;
}

.hero-subtitle {
    font-size: 18px;
    opacity: 0.85;
    margin: 0;
    max-width: 500px;
}

/* Contact Section */
.contact-section {
    padding: 60px 0;
    background: #f8f9fa;
}

.contact-section .container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

.contact-grid {
    display: grid;
    grid-template-columns: 400px 1fr;
    gap: 40px;
    align-items: start;
}

/* Info Cards */
.contact-info {
    display: flex;
    flex-direction: column;
    gap: 16px;
}

.info-card {
    background: #fff;
    border-radius: 12px;
    padding: 20px;
    display: flex;
    gap: 16px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.06);
    transition: all 0.2s;
}

.info-card:hover {
    box-shadow: 0 4px 16px rgba(0,0,0,0.1);
    transform: translateY(-2px);
}

.info-icon {
    width: 48px;
    height: 48px;
    background: linear-gradient(135deg, #2d4a6f, #1e3a5f);
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #fff;
    font-size: 18px;
    flex-shrink: 0;
}

.info-content h3 {
    font-size: 15px;
    font-weight: 600;
    color: #1e293b;
    margin: 0 0 6px;
}

.info-content p {
    font-size: 13px;
    color: #64748b;
    margin: 0 0 10px;
}

.info-link {
    font-size: 14px;
    font-weight: 500;
    color: #2d4a6f;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 6px;
}

.info-link:hover {
    color: #1e3a5f;
}

.info-link i {
    font-size: 10px;
    transition: transform 0.2s;
}

.info-link:hover i {
    transform: translateX(3px);
}

.info-text {
    font-size: 14px;
    font-weight: 600;
    color: #2d4a6f;
}

.download-btn {
    background: #2d4a6f;
    color: #fff;
    border: none;
    padding: 14px 20px;
    border-radius: 8px;
    font-size: 14px;
    font-weight: 600;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    transition: background 0.2s;
    margin-top: 8px;
}

.download-btn:hover {
    background: #1e3a5f;
}

/* Map */
.contact-map {
    background: #fff;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 2px 8px rgba(0,0,0,0.06);
}

.map-header {
    padding: 16px 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-bottom: 1px solid #e5e7eb;
}

.map-header h3 {
    font-size: 16px;
    font-weight: 600;
    color: #1e293b;
    margin: 0;
}

.map-switcher {
    display: flex;
    background: #f1f5f9;
    border-radius: 6px;
    padding: 3px;
}

.map-btn {
    padding: 6px 14px;
    border: none;
    background: transparent;
    font-size: 13px;
    font-weight: 500;
    color: #64748b;
    border-radius: 4px;
    cursor: pointer;
    transition: all 0.2s;
}

.map-btn.active {
    background: #fff;
    color: #1e293b;
    box-shadow: 0 1px 3px rgba(0,0,0,0.1);
}

.map-wrapper {
    position: relative;
    height: 500px;
}

#contact-map {
    width: 100%;
    height: 100%;
}

.map-badge {
    position: absolute;
    top: 16px;
    left: 16px;
    background: #1e293b;
    color: #fff;
    padding: 10px 16px;
    border-radius: 20px;
    font-size: 13px;
    font-weight: 500;
    display: flex;
    align-items: center;
    gap: 8px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.2);
}

/* Responsive */
@media (max-width: 900px) {
    .contact-grid {
        grid-template-columns: 1fr;
    }

    .hero-title {
        font-size: 32px;
    }

    .map-wrapper {
        height: 400px;
    }
}

@media (max-width: 600px) {
    .contact-hero {
        padding: 80px 0 50px;
    }

    .hero-title {
        font-size: 28px;
    }

    .info-card {
        flex-direction: column;
        text-align: center;
    }

    .info-icon {
        margin: 0 auto;
    }

    .map-header {
        flex-direction: column;
        gap: 12px;
        align-items: flex-start;
    }
}
</style>

@endsection
