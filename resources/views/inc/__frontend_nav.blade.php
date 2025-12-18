{{-- Gov.uz Style Navigation --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<div class="gov-navbar-wrapper">
    {{-- Top Info Bar - gray text like gov.uz --}}
    <div class="gov-top-bar">
        <div class="container">
            <div class="top-bar-left">
                <a href="https://gov.uz" target="_blank" class="gov-link">
                    {{ __('frontend.nav.government_portal') }}
                    <i class="fas fa-chevron-right"></i>
                </a>
            </div>
            <div class="top-bar-right">
                <span class="current-time" id="currentTime"></span>
                {{-- Language Selector --}}
                <div class="lang-selector">
                    <button class="lang-btn-trigger" id="langTrigger">
                        @if (session('locale') == 'uz')
                            O'zbekcha
                        @elseif (session('locale') == 'en')
                            English
                        @else
                            Русский
                        @endif
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div class="lang-dropdown-menu" id="langMenu">
                        <a href="{{ route('changelang', 'uz') }}" class="lang-item {{ session('locale') == 'uz' ? 'active' : '' }}">
                            O'zbekcha
                        </a>
                        <a href="{{ route('changelang', 'ru') }}" class="lang-item {{ session('locale') == 'ru' ? 'active' : '' }}">
                            Русский
                        </a>
                        <a href="{{ route('changelang', 'en') }}" class="lang-item {{ session('locale') == 'en' ? 'active' : '' }}">
                            English
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Main Header --}}
    <header class="gov-main-header">
        <div class="container">
            <div class="header-left">
                <a href="/" class="logo-link">
                    <img src="{{ asset('assets/frontend/tild6238-3031-4265-a564-343037346231/tic_logo_blue.png') }}"
                         alt="Tashkent Invest" class="header-logo">
                </a>
                <div class="company-info">
                    <h1 class="company-name">{{ __('frontend.company.name') }}</h1>
                    <p class="company-type">{{ __('frontend.company.legal_form') }}</p>
                </div>
            </div>
            <div class="header-right">
                <button class="search-btn" id="searchToggle">
                    <i class="fas fa-search"></i>
                </button>
                <div class="contact-block">
                    <div class="contact-label">{{ __('frontend.nav.hotline') }}</div>
                    <a href="tel:+998712100261" class="contact-phone">
                        <i class="fas fa-phone"></i>
                        +998 71 210 02 61
                    </a>
                </div>
            </div>
        </div>
    </header>

    {{-- Dark Blue Navigation --}}
    <nav class="gov-main-nav">
        <div class="container">
            <ul class="nav-menu">
                <li class="nav-menu-item has-dropdown">
                    <a href="#" class="nav-menu-link">{{ __('frontend.nav.about') }} <i class="fas fa-chevron-down"></i></a>
                    <div class="nav-submenu">
                        <a href="{{ route('frontend.board') }}">{{ __('frontend.nav.management') }}</a>
                        <a href="{{ route('frontend.about_us') }}">{{ __('frontend.nav.about') }}</a>
                        <a href="{{ route('frontend.investoram_slayd') }}">{{ __('frontend.nav.presentations') }}</a>
                        <a href="{{ route('frontend.ustav') }}">{{ __('frontend.nav.charter') }}</a>
                    </div>
                </li>

                <li class="nav-menu-item has-dropdown">
                    <a href="#" class="nav-menu-link">{{ __('frontend.nav.corporate_governance') }} <i class="fas fa-chevron-down"></i></a>
                    <div class="nav-submenu mega-menu">
                        <div class="mega-column">
                            <div class="mega-title">{{ __('frontend.nav.management_bodies') }}</div>
                            <a href="{{ route('frontend.share_struktura') }}">{{ __('frontend.nav.sole_shareholder') }}</a>
                            <a href="{{ route('frontend.supervisory_board') }}">{{ __('frontend.nav.supervisory_board') }}</a>
                            <a href="{{ route('frontend.supervisory_board_committees') }}">{{ __('frontend.nav.board_committees') }}</a>
                            <a href="{{ route('frontend.board') }}">{{ __('frontend.nav.executive_body') }}</a>
                        </div>
                        <div class="mega-column">
                            <div class="mega-title">{{ __('frontend.nav.disclosure') }}</div>
                            <a href="{{ route('frontend.charter_capital') }}">{{ __('frontend.nav.charter_capital') }}</a>
                            <a href="{{ route('frontend.essential_facts') }}">{{ __('frontend.nav.essential_facts') }}</a>
                            <a href="{{ route('frontend.assessment_system') }}">{{ __('frontend.nav.governance_assessment') }}</a>
                            <a href="{{ route('frontend.npa') }}">{{ __('frontend.nav.legal_acts') }}</a>
                            <a href="{{ route('frontend.nizomlar') }}">{{ __('frontend.nav.regulations') }}</a>
                        </div>
                        <div class="mega-column">
                            <div class="mega-title">{{ __('frontend.nav.other') }}</div>
                            <a href="{{ route('frontend.risk_takers') }}">{{ __('frontend.nav.risks') }}</a>
                            <a href="{{ route('frontend.development_strategies') }}">{{ __('frontend.nav.development_strategies') }}</a>
                            <a href="{{ route('frontend.spisok') }}">{{ __('frontend.nav.affiliated_list') }}</a>
                            <a href="{{ route('frontend.dividends') }}">{{ __('frontend.nav.dividends') }}</a>
                            <a href="{{ route('frontend.business_plan') }}">{{ __('frontend.nav.business_plan') }}</a>
                        </div>
                    </div>
                </li>

                <li class="nav-menu-item has-dropdown">
                    <a href="#" class="nav-menu-link">{{ __('frontend.nav.investors') }} <i class="fas fa-chevron-down"></i></a>
                    <div class="nav-submenu">
                        <a href="{{ route('frontend.investor_ideas.create') }}">{{ __('frontend.nav.investor_proposals') }} <span class="badge-new">NEW</span></a>
                        <a href="{{ route('frontend.investment-projects') }}">{{ __('frontend.nav.investment_potential') }}</a>
                        <a href="https://yangiavlodzone.uz" target="_blank">{{ __('frontend.nav.yangi_avlod') }}</a>
                        <a href="https://promobilitycity.uz/" target="_blank">{{ __('frontend.nav.promobility') }}</a>
                        <a href="{{ route('frontend.jac-projects') }}">{{ __('frontend.nav.jac_motors') }}</a>
                        <a href="{{ route('frontend.investoram') }}">{{ __('frontend.nav.renovation') }}</a>
                    </div>
                </li>

                <li class="nav-menu-item has-dropdown">
                    <a href="#" class="nav-menu-link">{{ __('frontend.nav.press_center') }} <i class="fas fa-chevron-down"></i></a>
                    <div class="nav-submenu">
                        <a href="{{ route('frontend.media') }}">{{ __('frontend.nav.news') }}</a>
                        <a href="{{ route('frontend.open_tender_notice') }}">{{ __('frontend.nav.tenders') }} <span class="badge-new">NEW</span></a>
                        <a href="{{ route('frontend.offers') }}">{{ __('frontend.nav.announcements') }}</a>
                    </div>
                </li>

                <li class="nav-menu-item has-dropdown">
                    <a href="#" class="nav-menu-link">{{ __('frontend.nav.career') }} <i class="fas fa-chevron-down"></i></a>
                    <div class="nav-submenu">
                        <a href="{{ route('frontend.vacancies') }}">{{ __('frontend.nav.vacancies') }}</a>
                    </div>
                </li>

                <li class="nav-menu-item">
                    <a href="{{ route('frontend.contact') }}" class="nav-menu-link">{{ __('frontend.nav.contact') }}</a>
                </li>
            </ul>

            <a href="https://projects.toshkentinvest.uz?from_toshknetinvest_official_website/" target="_blank" class="nav-map-btn">
                <i class="fas fa-map-marked-alt"></i>
                {{ __('frontend.nav.interactive_map') }}
            </a>

            <button class="mobile-toggle" id="mobileToggle">
                <span></span><span></span><span></span>
            </button>
        </div>
    </nav>

    {{-- Mobile Navigation --}}
    <div class="mobile-nav-overlay" id="mobileOverlay"></div>
    <div class="mobile-nav-panel" id="mobileNav">
        <div class="mobile-nav-header">
            <img src="{{ asset('assets/frontend/tild6238-3031-4265-a564-343037346231/tic_logo_blue.png') }}" alt="Logo" class="mobile-logo">
            <button class="mobile-close" id="mobileClose"><i class="fas fa-times"></i></button>
        </div>
        <div class="mobile-nav-body">
            {{-- Mobile menu items will be cloned from main nav via JS --}}
        </div>
    </div>

    {{-- Search Modal --}}
    <div class="search-overlay" id="searchOverlay">
        <div class="search-modal">
            <button class="search-close" id="searchClose"><i class="fas fa-times"></i></button>
            <div class="search-content">
                <h3 class="search-title">{{ __('frontend.common.search') }}</h3>
                <form action="{{ route('frontend.media') }}" method="GET" class="search-form">
                    <div class="search-input-wrapper">
                        <i class="fas fa-search"></i>
                        <input type="text" name="search" class="search-input" placeholder="{{ __('frontend.common.search_placeholder') ?? 'Search...' }}" autofocus>
                    </div>
                    <button type="submit" class="search-submit">{{ __('frontend.common.search') }}</button>
                </form>
                <div class="search-hints">
                    <span>{{ __('frontend.common.popular') ?? 'Popular' }}:</span>
                    <a href="{{ route('frontend.media') }}">{{ __('frontend.nav.news') }}</a>
                    <a href="{{ route('frontend.open_tender_notice') }}">{{ __('frontend.nav.tenders') }}</a>
                    <a href="{{ route('frontend.vacancies') }}">{{ __('frontend.nav.vacancies') }}</a>
                    <a href="{{ route('frontend.contact') }}">{{ __('frontend.nav.contact') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Gov.uz Style Navigation */
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');

.gov-navbar-wrapper {
    font-family: 'Inter', system-ui, sans-serif;
    -webkit-font-smoothing: antialiased;
}

.gov-navbar-wrapper .container {
    max-width: 1280px;
    margin: 0 auto;
    padding: 0 20px;
}

/* Top Info Bar - gray text on light background */
.gov-top-bar {
    background: #f8f9fa;
    padding: 8px 0;
    font-size: 13px;
    border-bottom: 1px solid #e5e7eb;
}

.gov-top-bar .container {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.top-bar-left .gov-link {
    color: #6b7280;
    text-decoration: none;
    display: flex;
    align-items: center;
    gap: 6px;
    transition: color 0.2s;
}

.top-bar-left .gov-link:hover {
    color: #374151;
}

.top-bar-left .gov-link i {
    font-size: 10px;
}

.top-bar-right {
    display: flex;
    align-items: center;
    gap: 20px;
}

.current-time {
    color: #6b7280;
    font-size: 12px;
}

/* Language Selector */
.lang-selector {
    position: relative;
}

.lang-btn-trigger {
    background: #fff;
    border: 1px solid #d1d5db;
    color: #374151;
    padding: 6px 14px;
    border-radius: 4px;
    font-size: 13px;
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 6px;
    transition: all 0.2s;
}

.lang-btn-trigger:hover {
    border-color: #9ca3af;
    background: #f9fafb;
}

.lang-btn-trigger i {
    font-size: 10px;
    color: #9ca3af;
    transition: transform 0.2s;
}

.lang-dropdown-menu {
    position: absolute;
    top: calc(100% + 8px);
    right: 0;
    background: #fff;
    border-radius: 6px;
    box-shadow: 0 10px 40px rgba(0,0,0,0.15);
    min-width: 150px;
    opacity: 0;
    visibility: hidden;
    transform: translateY(-10px);
    transition: all 0.25s;
    z-index: 1000;
    overflow: hidden;
}

.lang-dropdown-menu.active {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
}

.lang-item {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 10px 15px;
    color: #374151;
    text-decoration: none;
    transition: background 0.2s;
}

.lang-item:hover {
    background: #f3f4f6;
}

.lang-item.active {
    background: #eff6ff;
    color: #1e40af;
}

.lang-item img {
    width: 20px;
    height: 14px;
    object-fit: cover;
    border-radius: 2px;
}

/* Main Header */
.gov-main-header {
    background: #fff;
    padding: 20px 0;
    border-bottom: 1px solid #e5e7eb;
}

.gov-main-header .container {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.header-left {
    display: flex;
    align-items: center;
    gap: 20px;
}

.header-logo {
    width: 70px;
    height: 70px;
    object-fit: contain;
}

.company-info {
    border-left: 2px solid #2d4a6f;
    padding-left: 20px;
}

.company-name {
    font-size: 20px;
    font-weight: 700;
    color: #1e293b;
    margin: 0 0 4px 0;
    line-height: 1.3;
}

.company-type {
    font-size: 13px;
    color: #64748b;
    margin: 0;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.header-right {
    display: flex;
    align-items: center;
    gap: 25px;
}

.search-btn {
    width: 42px;
    height: 42px;
    border-radius: 50%;
    border: 1px solid #e5e7eb;
    background: #f8fafc;
    color: #64748b;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.2s;
}

.search-btn:hover {
    background: #2d4a6f;
    border-color: #2d4a6f;
    color: #fff;
}

.contact-block {
    text-align: right;
    border-left: 1px solid #e5e7eb;
    padding-left: 25px;
}

.contact-label {
    font-size: 11px;
    color: #94a3b8;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-bottom: 4px;
}

.contact-phone {
    font-size: 18px;
    font-weight: 600;
    color: #2d4a6f;
    text-decoration: none;
    display: flex;
    align-items: center;
    gap: 8px;
}

.contact-phone i {
    font-size: 14px;
}

.contact-phone:hover {
    color: #1e3654;
}

/* Dark Blue Navigation - gov.uz style */
.gov-main-nav {
    background: #2d4a6f;
    position: sticky;
    top: 0;
    z-index: 100;
}

.gov-main-nav .container {
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.nav-menu {
    display: flex;
    list-style: none;
    margin: 0;
    padding: 0;
}

.nav-menu-item {
    position: relative;
}

.gov-main-nav .nav-menu-link {
    display: flex;
    align-items: center;
    gap: 6px;
    padding: 16px 20px;
    color: #fff !important;
    text-decoration: none !important;
    font-size: 14px;
    font-weight: 500;
    transition: all 0.2s;
    white-space: nowrap;
    text-transform: uppercase;
    letter-spacing: 0.3px;
}

.gov-main-nav .nav-menu-link i {
    font-size: 8px;
    opacity: 0.7;
    transition: transform 0.2s;
    margin-left: 4px;
}

.gov-main-nav .nav-menu-item:hover .nav-menu-link,
.gov-main-nav .nav-menu-link:hover {
    background: rgba(255,255,255,0.15);
    color: #fff !important;
}

.gov-main-nav .nav-menu-item:hover .nav-menu-link i {
    transform: rotate(180deg);
}

/* Submenu */
.nav-submenu {
    position: absolute;
    top: 100%;
    left: 0;
    background: #fff;
    min-width: 260px;
    border-radius: 0 0 8px 8px;
    box-shadow: 0 15px 50px rgba(0,0,0,0.15);
    opacity: 0;
    visibility: hidden;
    transform: translateY(-10px);
    transition: all 0.25s;
    z-index: 101;
    border-top: 3px solid #c9a962;
}

.nav-menu-item:hover .nav-submenu {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
}

.nav-submenu a {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 12px 20px;
    color: #374151;
    text-decoration: none;
    font-size: 14px;
    transition: all 0.2s;
    border-left: 3px solid transparent;
}

.nav-submenu a:hover {
    background: #f8fafc;
    color: #2d4a6f;
    border-left-color: #2d4a6f;
    padding-left: 24px;
}

.badge-new {
    background: #dc2626;
    color: #fff;
    font-size: 10px;
    padding: 2px 6px;
    border-radius: 3px;
    font-weight: 600;
}

/* Mega Menu */
.mega-menu {
    min-width: 700px;
    display: flex;
    padding: 20px;
    gap: 30px;
}

.mega-column {
    flex: 1;
}

.mega-title {
    font-size: 12px;
    font-weight: 700;
    color: #2d4a6f;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    padding: 0 0 12px 0;
    margin-bottom: 8px;
    border-bottom: 1px solid #e5e7eb;
}

.mega-menu a {
    padding: 10px 0;
    border-left: none;
}

.mega-menu a:hover {
    padding-left: 8px;
    border-left: none;
}

/* Map Button - gold style */
.nav-map-btn {
    display: flex;
    align-items: center;
    gap: 8px;
    background: #c9a962;
    color: #0d1a26 !important;
    padding: 12px 20px;
    border-radius: 6px;
    text-decoration: none !important;
    font-size: 13px;
    font-weight: 600;
    transition: all 0.2s;
    border: 2px solid #c9a962;
}

.nav-map-btn:hover {
    background: transparent;
    color: #f5c842 !important;
    border-color: #c9a962;
}

/* Mobile Toggle */
.mobile-toggle {
    display: none;
    width: 28px;
    height: 20px;
    background: none;
    border: none;
    cursor: pointer;
    position: relative;
    padding: 0;
}

.mobile-toggle span {
    display: block;
    width: 100%;
    height: 2px;
    background: #fff;
    margin: 5px 0;
    transition: all 0.3s;
    border-radius: 1px;
}

/* Mobile Navigation Panel */
.mobile-nav-overlay {
    display: none;
    position: fixed;
    inset: 0;
    background: rgba(0,0,0,0.5);
    z-index: 998;
    opacity: 0;
    transition: opacity 0.3s;
}

.mobile-nav-overlay.active {
    display: block;
    opacity: 1;
}

.mobile-nav-panel {
    position: fixed;
    top: 0;
    right: -320px;
    width: 320px;
    height: 100%;
    background: #fff;
    z-index: 999;
    transition: right 0.3s;
    overflow-y: auto;
}

.mobile-nav-panel.active {
    right: 0;
}

.mobile-nav-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px;
    border-bottom: 1px solid #e5e7eb;
}

.mobile-logo {
    height: 50px;
}

.mobile-close {
    width: 36px;
    height: 36px;
    border: none;
    background: #f1f5f9;
    border-radius: 50%;
    color: #64748b;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
}

.mobile-nav-body {
    padding: 20px;
}

.mobile-nav-body a {
    display: block;
    padding: 12px 0;
    color: #374151;
    text-decoration: none;
    border-bottom: 1px solid #f1f5f9;
    font-size: 15px;
}

.mobile-nav-body a:hover {
    color: #1e40af;
}

/* Responsive */
@media (max-width: 1024px) {
    .nav-menu {
        display: none;
    }

    .mobile-toggle {
        display: block;
    }

    .nav-map-btn {
        display: none;
    }
}

@media (max-width: 768px) {
    .gov-main-header .container {
        flex-direction: column;
        gap: 15px;
        text-align: center;
    }

    .header-left {
        flex-direction: column;
    }

    .company-info {
        border-left: none;
        padding-left: 0;
        border-top: 2px solid #1e40af;
        padding-top: 15px;
    }

    .header-right {
        width: 100%;
        justify-content: center;
    }

    .contact-block {
        border-left: none;
        padding-left: 0;
        text-align: center;
    }

    .top-bar-left {
        display: none;
    }

    .top-bar-right {
        width: 100%;
        justify-content: center;
    }
}

/* Search Modal */
.search-overlay {
    display: none;
    position: fixed;
    inset: 0;
    background: rgba(0, 0, 0, 0.85);
    z-index: 9999;
    align-items: flex-start;
    justify-content: center;
    padding-top: 100px;
}

.search-overlay.active {
    display: flex;
}

.search-modal {
    background: #fff;
    border-radius: 12px;
    width: 100%;
    max-width: 600px;
    padding: 30px;
    position: relative;
    box-shadow: 0 25px 80px rgba(0, 0, 0, 0.3);
    animation: searchSlideDown 0.3s ease;
}

@keyframes searchSlideDown {
    from {
        opacity: 0;
        transform: translateY(-30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.search-close {
    position: absolute;
    top: 15px;
    right: 15px;
    width: 36px;
    height: 36px;
    border: none;
    background: #f1f5f9;
    border-radius: 50%;
    color: #64748b;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.2s;
}

.search-close:hover {
    background: #e2e8f0;
    color: #1e293b;
}

.search-title {
    font-size: 20px;
    font-weight: 600;
    color: #1e293b;
    margin: 0 0 20px 0;
}

.search-form {
    display: flex;
    gap: 12px;
}

.search-input-wrapper {
    flex: 1;
    position: relative;
}

.search-input-wrapper i {
    position: absolute;
    left: 16px;
    top: 50%;
    transform: translateY(-50%);
    color: #9ca3af;
}

.search-input {
    width: 100%;
    padding: 14px 14px 14px 45px;
    border: 2px solid #e5e7eb;
    border-radius: 8px;
    font-size: 16px;
    transition: border-color 0.2s;
    outline: none;
}

.search-input:focus {
    border-color: #2d4a6f;
}

.search-submit {
    padding: 14px 24px;
    background: #2d4a6f;
    color: #fff;
    border: none;
    border-radius: 8px;
    font-size: 15px;
    font-weight: 600;
    cursor: pointer;
    transition: background 0.2s;
}

.search-submit:hover {
    background: #1e3a5f;
}

.search-hints {
    margin-top: 20px;
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    align-items: center;
}

.search-hints span {
    color: #6b7280;
    font-size: 13px;
}

.search-hints a {
    padding: 6px 12px;
    background: #f1f5f9;
    color: #374151;
    text-decoration: none;
    border-radius: 20px;
    font-size: 13px;
    transition: all 0.2s;
}

.search-hints a:hover {
    background: #2d4a6f;
    color: #fff;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Time display
    function updateTime() {
        const now = new Date();
        const options = { hour: '2-digit', minute: '2-digit', timeZone: 'Asia/Tashkent' };
        const timeStr = now.toLocaleTimeString('uz-UZ', options) + ' (GMT+5)';
        const dateStr = now.toLocaleDateString('uz-UZ', { day: '2-digit', month: '2-digit', year: 'numeric' });
        const el = document.getElementById('currentTime');
        if (el) el.textContent = timeStr + ' ' + dateStr;
    }
    updateTime();
    setInterval(updateTime, 60000);

    // Language dropdown
    const langTrigger = document.getElementById('langTrigger');
    const langMenu = document.getElementById('langMenu');

    if (langTrigger && langMenu) {
        langTrigger.addEventListener('click', (e) => {
            e.stopPropagation();
            langMenu.classList.toggle('active');
        });

        document.addEventListener('click', () => {
            langMenu.classList.remove('active');
        });
    }

    // Mobile navigation
    const mobileToggle = document.getElementById('mobileToggle');
    const mobileNav = document.getElementById('mobileNav');
    const mobileOverlay = document.getElementById('mobileOverlay');
    const mobileClose = document.getElementById('mobileClose');

    function openMobile() {
        mobileNav.classList.add('active');
        mobileOverlay.classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function closeMobile() {
        mobileNav.classList.remove('active');
        mobileOverlay.classList.remove('active');
        document.body.style.overflow = '';
    }

    if (mobileToggle) mobileToggle.addEventListener('click', openMobile);
    if (mobileClose) mobileClose.addEventListener('click', closeMobile);
    if (mobileOverlay) mobileOverlay.addEventListener('click', closeMobile);

    // Search Modal
    const searchToggle = document.getElementById('searchToggle');
    const searchOverlay = document.getElementById('searchOverlay');
    const searchClose = document.getElementById('searchClose');
    const searchInput = document.querySelector('.search-input');

    function openSearch() {
        searchOverlay.classList.add('active');
        document.body.style.overflow = 'hidden';
        setTimeout(() => {
            if (searchInput) searchInput.focus();
        }, 100);
    }

    function closeSearch() {
        searchOverlay.classList.remove('active');
        document.body.style.overflow = '';
    }

    if (searchToggle) searchToggle.addEventListener('click', openSearch);
    if (searchClose) searchClose.addEventListener('click', closeSearch);
    if (searchOverlay) {
        searchOverlay.addEventListener('click', (e) => {
            if (e.target === searchOverlay) closeSearch();
        });
    }

    // Close search with Escape key
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && searchOverlay.classList.contains('active')) {
            closeSearch();
        }
    });

    // Clone menu items to mobile nav
    const mobileBody = document.querySelector('.mobile-nav-body');
    const menuItems = document.querySelectorAll('.nav-menu > .nav-menu-item');

    if (mobileBody && menuItems.length) {
        menuItems.forEach(item => {
            const link = item.querySelector('.nav-menu-link');
            const submenu = item.querySelector('.nav-submenu');

            if (link) {
                const text = link.childNodes[0].textContent.trim();
                const div = document.createElement('div');
                div.className = 'mobile-menu-section';

                const title = document.createElement('a');
                title.href = link.getAttribute('href') || '#';
                title.textContent = text;
                title.style.fontWeight = '600';
                div.appendChild(title);

                if (submenu) {
                    const subLinks = submenu.querySelectorAll('a');
                    subLinks.forEach(subLink => {
                        const a = document.createElement('a');
                        a.href = subLink.getAttribute('href');
                        a.textContent = subLink.childNodes[0].textContent.trim();
                        a.style.paddingLeft = '15px';
                        a.style.fontSize = '14px';
                        a.style.color = '#64748b';
                        div.appendChild(a);
                    });
                }

                mobileBody.appendChild(div);
            }
        });
    }
});
</script>
