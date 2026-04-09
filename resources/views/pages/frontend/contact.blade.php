@extends('layouts.frontend_app')
@section('title', __('frontend.contact.title') . ' | ' . __('frontend.seo.site_name'))

@section('frontent_content')
<div class="gov-page">
    {{-- Hero Section --}}
    <x-frontend.hero
        :title="__('frontend.contact.title')"
        :subtitle="__('frontend.contact.subtitle')"
        badge="Tashkent Invest"
        badgeIcon="fa-phone"
        :breadcrumbs="[
            ['url' => route('frontend.index'), 'label' => __('frontend.breadcrumb.home')],
            ['url' => '#', 'label' => __('frontend.contact.title')]
        ]"
    />

    {{-- Contact Info Cards --}}
    <x-frontend.section bg="light">
        <div class="contact-grid">
            <div class="contact-cards">
                {{-- Address Card --}}
                <div class="contact-card gov-animate-fade" data-delay="0.1">
                    <div class="contact-icon"><i class="fa-solid fa-map-marker-alt"></i></div>
                    <div class="contact-info">
                        <h3>{{ __('frontend.contact.address_title') }}</h3>
                        <p>{{ __('frontend.contact.address_text') }}</p>
                        <a href="https://yandex.ru/maps/?rtext=~41.310425,69.248169&rtt=auto" target="_blank" class="contact-link">
                            {{ __('frontend.contact.build_route') }} <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>

                {{-- Phone Card --}}
                <div class="contact-card gov-animate-fade" data-delay="0.2">
                    <div class="contact-icon"><i class="fa-solid fa-phone-alt"></i></div>
                    <div class="contact-info">
                        <h3>{{ __('frontend.contact.phone_title') }}</h3>
                        <p>{{ __('frontend.contact.phone_desc') }}</p>
                        <a href="tel:+998712100261" class="contact-link phone">
                            +998 71 210 02 61 <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>

                {{-- Email Card --}}
                <div class="contact-card gov-animate-fade" data-delay="0.3">
                    <div class="contact-icon"><i class="fa-solid fa-envelope"></i></div>
                    <div class="contact-info">
                        <h3>{{ __('frontend.contact.email_title') }}</h3>
                        <p>{{ __('frontend.contact.email_desc') }}</p>
                        <a href="mailto:info@toshkentinvest.uz" class="contact-link">
                            info@toshkentinvest.uz <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>

                {{-- Working Hours Card --}}
                <div class="contact-card gov-animate-fade" data-delay="0.4">
                    <div class="contact-icon"><i class="fa-solid fa-clock"></i></div>
                    <div class="contact-info">
                        <h3>{{ __('frontend.contact.hours_title') }}</h3>
                        <p>{{ __('frontend.contact.hours_desc') }}</p>
                        <span class="contact-hours">09:00 - 18:00</span>
                    </div>
                </div>

                {{-- Download vCard --}}
                <button class="gov-btn gov-btn-primary contact-download gov-animate-fade" data-delay="0.5" onclick="downloadVCard()">
                    <i class="fa-solid fa-download"></i>
                    {{ __('frontend.contact.download_contacts') }}
                </button>
            </div>

            {{-- Map --}}
            <div class="contact-map-wrapper gov-animate-fade" data-delay="0.2">
                <div class="contact-map-header">
                    <h3><i class="fa-solid fa-map"></i> {{ __('frontend.contact.map_title') }}</h3>
                    <div class="map-type-switcher">
                        <button class="map-type-btn active" data-type="map">{{ __('frontend.contact.map_type_map') }}</button>
                        <button class="map-type-btn" data-type="satellite">{{ __('frontend.contact.map_type_satellite') }}</button>
                    </div>
                </div>
                <div class="contact-map-container">
                    <div id="contact-map"></div>
                    <div class="map-company-badge">
                        <i class="fa-solid fa-building"></i>
                        {{ __('frontend.company.name') }}
                    </div>
                </div>
            </div>
        </div>
    </x-frontend.section>
</div>

{{-- Yandex Map Script --}}
<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&apikey=a3c154a0-e8ad-438e-ada8-ac2260414d09"></script>
<script>
ymaps.ready(function() {
    const map = new ymaps.Map('contact-map', {
        center: [41.310425, 69.248169],
        zoom: 16,
        controls: ['zoomControl']
    });

    const placemark = new ymaps.Placemark([41.310425, 69.248169], {
        balloonContentHeader: '<strong>{{ __("frontend.company.name") }}</strong>',
        balloonContentBody: '{{ __("frontend.contact.address_text") }}<br><a href="tel:+998712100261">+998 71 210 02 61</a>',
        hintContent: '{{ __("frontend.company.name") }}'
    }, {
        preset: 'islands#blueCircleDotIcon'
    });

    map.geoObjects.add(placemark);
    map.behaviors.disable('scrollZoom');

    // Map type switcher
    document.querySelectorAll('.map-type-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            document.querySelectorAll('.map-type-btn').forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            map.setType(this.dataset.type === 'satellite' ? 'yandex#satellite' : 'yandex#map');
        });
    });
});

function downloadVCard() {
    const vcard = `BEGIN:VCARD
VERSION:3.0
FN:{{ __('frontend.company.name') }}
ORG:{{ __('frontend.company.name') }}
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

{{-- GSAP Animation --}}
<script>
document.addEventListener('DOMContentLoaded', function() {
    if (typeof gsap !== 'undefined' && typeof ScrollTrigger !== 'undefined') {
        gsap.registerPlugin(ScrollTrigger);
        document.querySelector('.gov-page').classList.add('gsap-loaded');

        gsap.utils.toArray('.gov-animate-fade').forEach(el => {
            gsap.fromTo(el,
                { opacity: 0, y: 30 },
                {
                    opacity: 1,
                    y: 0,
                    duration: 0.6,
                    delay: parseFloat(el.dataset.delay) || 0,
                    scrollTrigger: { trigger: el, start: 'top 85%' }
                }
            );
        });
    }
});
</script>

<style>
/* Contact Page Styles */
.contact-grid {
    display: grid;
    grid-template-columns: 380px 1fr;
    gap: 30px;
    align-items: start;
}

.contact-cards {
    display: flex;
    flex-direction: column;
    gap: 16px;
}

.contact-card {
    background: #fff;
    border-radius: 12px;
    padding: 20px;
    display: flex;
    gap: 16px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.06);
    transition: all 0.2s ease;
}

.contact-card:hover {
    box-shadow: 0 4px 16px rgba(0,0,0,0.1);
    transform: translateY(-2px);
}

.contact-icon {
    width: 48px;
    height: 48px;
    background: linear-gradient(135deg, var(--gov-primary), var(--gov-primary-dark));
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #fff;
    font-size: 18px;
    flex-shrink: 0;
}

.contact-info h3 {
    font-size: 15px;
    font-weight: 600;
    color: var(--gov-text-dark);
    margin: 0 0 6px;
}

.contact-info p {
    font-size: 13px;
    color: var(--gov-text-muted);
    margin: 0 0 10px;
}

.contact-link {
    font-size: 14px;
    font-weight: 500;
    color: var(--gov-primary);
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    transition: color 0.2s;
}

.contact-link:hover {
    color: var(--gov-primary-dark);
}

.contact-link i {
    font-size: 10px;
    transition: transform 0.2s;
}

.contact-link:hover i {
    transform: translateX(3px);
}

.contact-hours {
    font-size: 14px;
    font-weight: 600;
    color: var(--gov-primary);
}

.contact-download {
    width: 100%;
    margin-top: 8px;
}

/* Map Styles */
.contact-map-wrapper {
    background: #fff;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 2px 8px rgba(0,0,0,0.06);
}

.contact-map-header {
    padding: 16px 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-bottom: 1px solid var(--gov-border);
}

.contact-map-header h3 {
    font-size: 16px;
    font-weight: 600;
    color: var(--gov-text-dark);
    margin: 0;
    display: flex;
    align-items: center;
    gap: 10px;
}

.contact-map-header h3 i {
    color: var(--gov-primary);
}

.map-type-switcher {
    display: flex;
    background: var(--gov-bg-light);
    border-radius: 6px;
    padding: 3px;
}

.map-type-btn {
    padding: 6px 14px;
    border: none;
    background: transparent;
    font-size: 13px;
    font-weight: 500;
    color: var(--gov-text-muted);
    border-radius: 4px;
    cursor: pointer;
    transition: all 0.2s;
}

.map-type-btn.active {
    background: #fff;
    color: var(--gov-text-dark);
    box-shadow: 0 1px 3px rgba(0,0,0,0.1);
}

.contact-map-container {
    position: relative;
    height: 450px;
}

#contact-map {
    width: 100%;
    height: 100%;
}

.map-company-badge {
    position: absolute;
    top: 16px;
    left: 16px;
    background: var(--gov-text-dark);
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

    .contact-map-container {
        height: 350px;
    }
}

@media (max-width: 600px) {
    .contact-card {
        flex-direction: column;
        text-align: center;
    }

    .contact-icon {
        margin: 0 auto;
    }

    .contact-map-header {
        flex-direction: column;
        gap: 12px;
        align-items: flex-start;
    }
}
</style>
@endsection
