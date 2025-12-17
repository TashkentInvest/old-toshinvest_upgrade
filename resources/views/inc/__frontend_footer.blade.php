{{-- Parliament.gov.uz Style Footer --}}
<!-- Font Awesome CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<footer class="parliament-footer" id="parliamentFooter">
    {{-- Main Footer Content --}}
    <div class="footer-main">
        <div class="container">
            <div class="footer-content">
                {{-- Company Info Section --}}
                <div class="footer-section footer-about">
                    <div class="footer-logo">
                        <img src="{{ asset('assets/frontend/tild3636-3735-4861-a236-666663383164/TIC_white.png') }}"
                             alt="Tashkent Invest Company" class="footer-logo-img">
                    </div>
                    <h3 class="footer-title">{{ __('frontend.company.name') }}</h3>
                    <p class="footer-subtitle">{{ __('frontend.company.legal_form') }}</p>
                    <p class="footer-description">
                        {{ __('frontend.footer.description') }}
                    </p>
                </div>

                {{-- Quick Links Section --}}
                <div class="footer-section footer-links">
                    <h4 class="footer-section-title">{{ __('frontend.footer.about_company') }}</h4>
                    <ul class="footer-menu">
                        <li><a href="{{ route('frontend.struktura') }}" class="footer-link">{{ __('frontend.footer.structural_divisions') }}</a></li>
                        <li><a href="{{ route('frontend.kodeks') }}" class="footer-link">{{ __('frontend.footer.code_of_conduct') }}</a></li>
                        <li><a href="{{route('frontend.essential_facts')}}" class="footer-link">{{ __('frontend.nav.essential_facts') }}</a></li>
                        <li><a href="{{route('frontend.assessment_system')}}" class="footer-link">{{ __('frontend.footer.governance_assessment') }}</a></li>
                        <li><a href="{{ route('frontend.spisok') }}" class="footer-link">{{ __('frontend.footer.affiliated_persons') }}</a></li>
                        <li><a href="{{ route('frontend.supervisory_board') }}" class="footer-link">{{ __('frontend.nav.supervisory_board') }}</a></li>
                        <li><a href="{{ route('frontend.board') }}" class="footer-link">{{ __('frontend.footer.management_board') }}</a></li>
                    </ul>
                </div>

                {{-- Services Section --}}
                <div class="footer-section footer-services">
                    <h4 class="footer-section-title">{{ __('frontend.footer.services') }}</h4>
                    <ul class="footer-menu">
                        <li><a href="{{ route('frontend.investment-projects') }}" class="footer-link">{{ __('frontend.footer.investment_projects') }}</a></li>
                        <li><a href="{{ route('frontend.investoram') }}" class="footer-link">{{ __('frontend.nav.renovation_projects') }}</a></li>
                        <li><a href="{{ route('frontend.vacancies') }}" class="footer-link">{{ __('frontend.nav.career') }}</a></li>
                        <li><a href="{{ route('frontend.xaridlar') }}" class="footer-link">{{ __('frontend.footer.procurement') }}</a></li>
                        <li><a href="{{ route('frontend.reports') }}" class="footer-link">{{ __('frontend.footer.reports') }}</a></li>
                        <li><a href="{{ route('frontend.ustav') }}" class="footer-link">{{ __('frontend.nav.charter') }}</a></li>
                    </ul>
                </div>

                {{-- Contact Section --}}
                <div class="footer-section footer-contact">
                    <h4 class="footer-section-title">{{ __('frontend.nav.contact') }}</h4>
                    <div class="footer-contact-info">
                        <div class="contact-item">
                            <i class="fas fa-map-marker-alt contact-icon"></i>
                            <span class="contact-text">Узбекистан, город Ташкент, улица Ислама Каримова, 51</span>
                        </div>
                        <div class="contact-item">
                            <i class="fas fa-phone contact-icon"></i>
                            <span class="contact-text">+998 (71) 210 02 61</span>
                        </div>
                        <div class="contact-item">
                            <i class="fas fa-envelope contact-icon"></i>
                            <span class="contact-text">info@toshkentinvest.uz</span>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

    {{-- Visitor Statistics Section --}}
    <div class="footer-stats">
        <div class="container">
            <div class="stats-content">
                <div class="stats-title">
                    <i class="fas fa-chart-line stats-icon"></i>
                    <h4>{{ __('frontend.footer.visitor_statistics') }}</h4>
                </div>
                <div class="stats-grid">
                    <div class="stat-item">
                        <div class="stat-value">{{ number_format($pageViewStats['total_views'] ?? 0) }}</div>
                        <div class="stat-label">{{ __('frontend.footer.total_views') }}</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-value">{{ number_format($pageViewStats['unique_visitors'] ?? 0) }}</div>
                        <div class="stat-label">{{ __('frontend.footer.unique_visitors') }}</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-value">{{ number_format($pageViewStats['today_views'] ?? 0) }}</div>
                        <div class="stat-label">{{ __('frontend.footer.views_today') }}</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-value">{{ number_format($pageViewStats['month_views'] ?? 0) }}</div>
                        <div class="stat-label">{{ __('frontend.footer.views_this_month') }}</div>
                    </div>
                </div>
                @if(isset($pageViewStats['top_countries']) && $pageViewStats['top_countries']->count() > 0)
                <div class="countries-section">
                    <h5 class="countries-title">{{ __('frontend.footer.top_countries') }}</h5>
                    <div class="countries-list">
                        @foreach($pageViewStats['top_countries'] as $country)
                        <div class="country-item">
                            <span class="country-flag">{{ $country->country_code }}</span>
                            <span class="country-name">{{ $country->country }}</span>
                            <span class="country-count">{{ number_format($country->count) }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>

    {{-- Footer Bottom --}}
    <div class="footer-bottom">
        <div class="container">
            <div class="footer-bottom-content">
                <div class="footer-copyright">
                    <p>&copy; {{ date('Y') }} {{ __('frontend.footer.copyright') }}</p>
                </div>

                <div class="footer-social">
                    <span class="social-label">{{ __('frontend.footer.social_media') }}</span>
                    <div class="social-links">
                        <a href="https://uz.linkedin.com/company/%D0%B0%D0%BE-%D0%BA%D0%BE%D0%BC%D0%BF%D0%B0%D0%BD%D0%B8%D1%8F-%D1%82%D0%B0%D1%88%D0%BA%D0%B5%D0%BD%D1%82-%D0%B8%D0%BD%D0%B2%D0%B5%D1%81%D1%82"
                           target="_blank"
                           rel="nofollow"
                           class="social-link linkedin"
                           aria-label="LinkedIn">
                            <svg width="24" height="24" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M50 100c27.6142 0 50-22.3858 50-50S77.6142 0 50 0 0 22.3858 0 50s22.3858 50 50 50Zm23-31.0002V52.363c0-8.9114-4.7586-13.0586-11.1079-13.0586-5.1234 0-7.4123 2.8199-8.6942 4.7942v-4.1124h-9.6468c.1297 2.7235 0 29.0136 0 29.0136h9.6484v-16.203c0-.8675.0657-1.731.3203-2.3513.6981-1.7351 2.284-3.5286 4.9491-3.5286 3.4905 0 4.8859 2.6611 4.8859 6.5602v15.5227H73ZM53.1979 44.0986v.094h-.0632c.0069-.0111.0148-.0228.0229-.0346.0137-.0198.0281-.0401.0403-.0594ZM28 31.0123C28 28.1648 30.1583 26 33.4591 26c3.3016 0 5.3302 2.1648 5.3934 5.0123 0 2.7851-2.0918 5.0156-5.4567 5.0156h-.064c-3.2351 0-5.3318-2.2305-5.3318-5.0156Zm10.2177 37.9875h-9.6445V39.9862h9.6445v29.0136Z" fill="currentColor"/>
                            </svg>
                        </a>
                        <a href="https://t.me/Toshkentinvestuz" target="_blank" rel="nofollow" class="social-link telegram" aria-label="Telegram">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm4.64 6.8c-.15 1.58-.8 5.42-1.13 7.19-.14.75-.42 1-.68 1.03-.58.05-1.02-.38-1.58-.75-.88-.58-1.38-.94-2.23-1.5-.99-.65-.35-1.01.22-1.59.15-.15 2.71-2.48 2.76-2.69.01-.03.01-.14-.07-.2-.08-.06-.19-.04-.27-.02-.11.02-1.93 1.23-5.45 3.61-.52.36-.99.53-1.42.52-.47-.01-1.37-.26-2.03-.48-.82-.27-1.47-.42-1.42-.88.03-.24.37-.49 1.02-.74 4.02-1.76 6.7-2.92 8.03-3.49 3.82-1.58 4.62-1.85 5.14-1.86.11 0 .37.03.54.17.14.12.18.27.2.38-.01.06.01.24-.02.37z" fill="currentColor"/>
                            </svg>
                        </a>
                        <a href="https://www.instagram.com/toshkentinvest.uz/" target="_blank" rel="nofollow" class="social-link instagram" aria-label="Instagram">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 2.16c3.2 0 3.584.012 4.85.07 1.17.054 1.805.249 2.227.413.56.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.058 1.266.07 1.646.07 4.85s-.012 3.584-.07 4.85c-.054 1.17-.249 1.805-.413 2.227-.217.56-.477.96-.896 1.382-.42.419-.819.679-1.381.896-.422.164-1.057.36-2.227.413-1.266.058-1.646.07-4.85.07s-3.584-.012-4.85-.07c-1.17-.054-1.805-.249-2.227-.413-.56-.217-.96-.477-1.382-.896-.419-.42-.679-.819-.896-1.381-.164-.422-.36-1.057-.413-2.227C2.172 15.584 2.16 15.204 2.16 12s.012-3.584.07-4.85c.054-1.17.249-1.805.413-2.227.217-.56.477-.96.896-1.382.42-.419.819-.679 1.381-.896.422-.164 1.057-.36 2.227-.413C8.416 2.172 8.796 2.16 12 2.16zM12 0C8.741 0 8.333.014 7.053.072 5.775.13 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384C1.347 2.681.936 3.35.63 4.14c-.297.765-.5 1.635-.558 2.913C.014 8.333 0 8.741 0 12s.014 3.667.072 4.947c.058 1.278.261 2.148.558 2.913.306.789.717 1.459 1.384 2.126.667.667 1.337 1.078 2.126 1.384.765.297 1.635.5 2.913.558C8.333 23.986 8.741 24 12 24s3.667-.014 4.947-.072c1.278-.058 2.148-.261 2.913-.558.789-.306 1.459-.717 2.126-1.384.667-.667 1.078-1.337 1.384-2.126.297-.765.5-1.635.558-2.913.058-1.28.072-1.688.072-4.947s-.014-3.667-.072-4.947c-.058-1.278-.261-2.148-.558-2.913-.306-.789-.717-1.459-1.384-2.126C19.459 1.347 18.789.936 18 .63c-.765-.297-1.635-.5-2.913-.558C15.667.014 15.259 0 12 0zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162S8.597 18.162 12 18.162s6.162-2.759 6.162-6.162S15.403 5.838 12 5.838zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.44 1.44-1.44.793 0 1.44.646 1.44 1.44z" fill="currentColor"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<style>
/* Parliament.gov.uz Style Footer */

/* Import Google Fonts */
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Roboto:wght@300;400;500;700&display=swap');

.parliament-footer {
    font-family: 'Inter', 'Roboto', 'Segoe UI', system-ui, -apple-system, sans-serif;
    background: linear-gradient(135deg, #1e293b 0%, #334155 100%);
    color: white;
    margin-top: auto;
}

/* #allrecords a {
    color: #fff !important;
    text-decoration: none;
} */
/* Container */
.parliament-footer .container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

/* Main Footer Content */
.footer-main {
    padding: 60px 0 40px;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
}

.footer-content {
    display: grid;
    grid-template-columns: 2fr 1fr 1fr 1.5fr;
    gap: 40px;
    align-items: start;
}

/* Footer Sections */
.footer-section {
    padding: 0;
}

.footer-about {
    max-width: 350px;
}

.footer-logo {
    margin-bottom: 20px;
}

.footer-logo-img {
    width: 80px;
    height: 80px;
    object-fit: contain;
    filter: drop-shadow(0 2px 8px rgba(0, 0, 0, 0.3));
}

.footer-title {
    font-size: 20px;
    font-weight: 700;
    margin-bottom: 8px;
    color: white;
    font-family: 'Inter', sans-serif;
    letter-spacing: 0.3px;
}

.footer-subtitle {
    font-size: 14px;
    color: rgba(255, 255, 255, 0.8);
    margin-bottom: 16px;
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 0.8px;
}

.footer-description {
    font-size: 15px;
    line-height: 1.6;
    color: rgba(255, 255, 255, 0.7);
    font-weight: 400;
}

/* Footer Section Titles */
.footer-section-title {
    font-size: 18px;
    font-weight: 600;
    margin-bottom: 24px;
    color: white;
    font-family: 'Inter', sans-serif;
    position: relative;
    padding-bottom: 12px;
}

.footer-section-title::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 40px;
    height: 2px;
    background: linear-gradient(90deg, #3b82f6, #60a5fa);
    border-radius: 1px;
}

/* Footer Menu */
.footer-menu {
    list-style: none;
    margin: 0;
    padding: 0;
}

.footer-menu li {
    margin-bottom: 12px;
}

.footer-link {
    color: rgb(241, 240, 240) !important;
    text-decoration: none;
    font-size: 15px;
    font-weight: 400;
    transition: all 0.3s ease;
    display: block;
    padding: 8px 0;
    border-left: 2px solid transparent;
    padding-left: 12px;
    margin-left: -12px;
}

.footer-link:hover {
    color: white;
    border-left-color: #3b82f6;
    transform: translateX(4px);
}

/* Contact Section */
.footer-contact-info {
    margin-bottom: 30px;
}

.contact-item {
    display: flex;
    align-items: center;
    margin-bottom: 16px;
    padding: 8px 0;
}

.contact-icon {
    font-size: 18px;
    margin-right: 12px;
    opacity: 0.8;
    min-width: 24px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.contact-text {
    font-size: 15px;
    color: rgba(255, 255, 255, 0.8);
    font-weight: 400;
}

/* Footer Special Button */
.footer-special-btn {
    margin-top: 20px;
}

.footer-map-btn {
    background: #fff;
    color: white;
    padding: 14px 20px;
    text-decoration: none;
    border-radius: 8px;
    font-size: 15px;
    font-weight: 600;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    box-shadow: 0 4px 16px rgba(59, 130, 246, 0.3);
    border: 1px solid rgba(255, 255, 255, 0.1);
}


.map-btn-icon {
    font-size: 16px;
    opacity: 0.9;
}

/* Footer Bottom */
.footer-bottom {
    padding: 25px 0;
    background: rgba(0, 0, 0, 0.2);
}

.footer-bottom-content {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.footer-copyright p {
    font-size: 14px;
    color: rgba(255, 255, 255, 0.6);
    margin: 0;
    font-weight: 400;
}

.footer-social {
    display: flex;
    align-items: center;
    gap: 20px;
}

.social-label {
    font-size: 14px;
    color: rgba(255, 255, 255, 0.7);
    font-weight: 500;
}

.social-links {
    display: flex;
    gap: 12px;
}

.social-link {
    width: 40px;
    height: 40px;
    background: rgb(245, 245, 245);
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: rgba(255, 255, 255, 0.7);
    text-decoration: none;
    transition: all 0.3s ease;
    border: 1px solid rgba(255, 255, 255, 0.1);
}

.social-link:hover {
    background: rgba(255, 255, 255, 0.2);
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
}

.social-link.linkedin:hover {
    background: #0077b5;
    border-color: #0077b5;
}

.social-link.telegram:hover {
    background: #0088cc;
    border-color: #0088cc;
}

.social-link.instagram:hover {
    background: linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%);
    border-color: #bc1888;
}

/* Visitor Statistics Section */
.footer-stats {
    background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
    padding: 50px 0;
    border-top: 3px solid #3b82f6;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
}

.stats-content {
    text-align: center;
}

.stats-title {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 12px;
    margin-bottom: 35px;
}

.stats-icon {
    font-size: 32px;
    animation: rotate 20s linear infinite;
    display: flex;
    align-items: center;
    justify-content: center;
}

@keyframes rotate {
    from {
        transform: rotate(0deg);
    }
    to {
        transform: rotate(360deg);
    }
}

.stats-title h4 {
    font-size: 28px;
    font-weight: 700;
    color: white;
    margin: 0;
    font-family: 'Inter', sans-serif;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.stats-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 30px;
    margin-bottom: 40px;
}

.stat-item {
    background: rgba(255, 255, 255, 0.05);
    border: 2px solid rgba(59, 130, 246, 0.3);
    border-radius: 12px;
    padding: 30px 20px;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.stat-item::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, #3b82f6 0%, #60a5fa 100%);
    transform: scaleX(0);
    transition: transform 0.3s ease;
}

.stat-item:hover {
    background: rgba(59, 130, 246, 0.1);
    border-color: #3b82f6;
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(59, 130, 246, 0.3);
}

.stat-item:hover::before {
    transform: scaleX(1);
}

.stat-value {
    font-size: 42px;
    font-weight: 800;
    color: #3b82f6;
    margin-bottom: 10px;
    font-family: 'Inter', sans-serif;
    text-shadow: 0 2px 10px rgba(59, 130, 246, 0.3);
}

.stat-label {
    font-size: 14px;
    color: rgba(255, 255, 255, 0.7);
    text-transform: uppercase;
    letter-spacing: 1px;
    font-weight: 600;
}

/* Countries Section */
.countries-section {
    background: rgba(255, 255, 255, 0.03);
    border: 2px solid rgba(59, 130, 246, 0.2);
    border-radius: 12px;
    padding: 30px;
    margin-top: 20px;
}

.countries-title {
    font-size: 18px;
    font-weight: 700;
    color: white;
    margin-bottom: 20px;
    text-align: center;
    font-family: 'Inter', sans-serif;
}

.countries-list {
    display: grid;
    grid-template-columns: repeat(5, 1fr);
    gap: 15px;
}

.country-item {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 8px;
    padding: 15px;
    background: rgba(255, 255, 255, 0.05);
    border: 1px solid rgba(59, 130, 246, 0.2);
    border-radius: 8px;
    transition: all 0.3s ease;
}

.country-item:hover {
    background: rgba(59, 130, 246, 0.1);
    border-color: #3b82f6;
    transform: scale(1.05);
}

.country-flag {
    font-size: 32px;
    margin-bottom: 5px;
}

.country-name {
    font-size: 13px;
    color: rgba(255, 255, 255, 0.9);
    font-weight: 600;
    text-align: center;
}

.country-count {
    font-size: 18px;
    color: #3b82f6;
    font-weight: 700;
}

/* Mobile Responsive */
@media (max-width: 1024px) {
    .footer-content {
        grid-template-columns: 1fr 1fr;
        gap: 40px;
    }

    .footer-about {
        max-width: none;
    }
}

@media (max-width: 768px) {
    .footer-content {
        grid-template-columns: 1fr;
        gap: 40px;
        text-align: center;
    }

    .footer-main {
        padding: 40px 0 30px;
    }

    .footer-section-title::after {
        left: 50%;
        transform: translateX(-50%);
    }

    .footer-link {
        text-align: center;
        border-left: none;
        border-bottom: 1px solid transparent;
        margin-left: 0;
        padding-left: 0;
        padding-bottom: 8px;
        margin-bottom: 8px;
    }

    .footer-link:hover {
        border-left: none;
        border-bottom-color: #3b82f6;
        transform: translateY(-2px);
    }

    .contact-item {
        justify-content: center;
    }

    .footer-bottom-content {
        flex-direction: column;
        gap: 20px;
        text-align: center;
    }

    .footer-social {
        flex-direction: column;
        gap: 15px;
    }

    .social-links {
        justify-content: center;
    }
}

@media (max-width: 480px) {
    .container {
        padding: 0 15px;
    }

    .footer-main {
        padding: 30px 0 20px;
    }

    .footer-bottom {
        padding: 20px 0;
    }

    .footer-title {
        font-size: 18px;
    }

    .footer-section-title {
        font-size: 16px;
        margin-bottom: 20px;
    }

    .footer-map-btn {
        width: 100%;
        justify-content: center;
    }

    /* Stats responsive */
    .stats-grid {
        grid-template-columns: 1fr;
        gap: 15px;
    }

    .stat-value {
        font-size: 32px;
    }

    .countries-list {
        grid-template-columns: 1fr;
    }

    .stats-title h4 {
        font-size: 20px;
    }
}

/* Loading Animation */
.parliament-footer {
    animation: fadeInUp 0.8s ease-out;
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

/* Smooth Scrolling */
html {
    scroll-behavior: smooth;
}

/* High Quality Rendering */
.parliament-footer {
    text-rendering: optimizeLegibility;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}

/* Focus States for Accessibility */
.footer-link:focus,
.footer-map-btn:focus,
.social-link:focus {
    outline: 2px solid #fbbf24;
    outline-offset: 2px;
    border-radius: 4px;
}
</style>
