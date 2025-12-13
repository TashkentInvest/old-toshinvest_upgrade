<div id="rec748107215" class="parliament-clean-nav" data-animationappear="off" data-record-type="257">
    <!-- Top Notice Bar -->
    <div class="notice-bar">
        <div class="container">
            <div class="notice-left">
                <span class="test-notice">SAYT SINOV TARIQASIDA ISHGA TUSHIRILGAN</span>
            </div>
        </div>
    </div>

    <!-- Main Header -->
    <header class="parliament-header">
        <div class="container">
            <div class="header-content">
                <a href="/" class="emblem-section">
                    <img src="{{asset('assets/frontend/tild6238-3031-4265-a564-343037346231/tic_logo_blue.png')}}" alt="Emblem"
                        class="emblem-img">
                </a>
                <div class="title-section">
                    <h1 class="main-title">{{ __('frontend.company.name') }}</h1>
                    <h2 class="main-subtitle">{{ __('frontend.company.legal_form') }}</h2>
                </div>
                <div class="header-controls">
                    <div class="language-controls">
<div class="language-controls">
    <button type="button" class="lang-selector-btn" id="langSelectorBtn">
        @if (session('locale') == 'uz')
            <img id="header-lang-img" src="{{ asset('assets/images/flags/uzbekistan.jpg') }}" alt="Header Language" height="16">
        @elseif (session('locale') == 'en')
            <img id="header-lang-img" src="{{ asset('/assets/new/assets/images/widget/UK.jpg') }}" alt="Header Language" height="16">
        @else
            <img id="header-lang-img" src="{{ asset('assets/images/flags/russia.jpg') }}" alt="Header Language" height="16">
        @endif
        <svg class="dropdown-arrow" id="dropdownArrow" viewBox="0 0 24 24">
            <path d="M7 10l5 5 5-5z"/>
        </svg>
    </button>
    <div class="lang-dropdown" id="langDropdown">
        <a href="{{ route('changelang', 'uz') }}" class="lang-option" data-lang="uz">
            <img src="{{ asset('assets/images/flags/uzbekistan.jpg') }}" alt="user-image" height="12">
            <span>O'zbekcha</span>
        </a>
        <a href="{{ route('changelang', 'ru') }}" class="lang-option" data-lang="ru">
            <img src="{{ asset('assets/images/flags/russia.jpg') }}" alt="user-image" height="12">
            <span>Русский</span>
        </a>
        <a href="{{ route('changelang', 'en') }}" class="lang-option" data-lang="en">
            <img src="{{ asset('assets/new/assets/images/widget/UK.jpg') }}" alt="user-image" height="12">
            <span>English</span>
        </a>
    </div>
</div>

<style>
.language-controls {
    position: relative;
    display: inline-block;
}

.lang-selector-btn {
    display: flex;
    align-items: center;
    gap: 8px;
    background: #fff;
    border: 1px solid #ddd;
    padding: 8px 12px;
    border-radius: 6px;
    cursor: pointer;
    font-size: 14px;
    transition: all 0.2s ease;
}

.lang-selector-btn:hover {
    border-color: #007bff;
}

.dropdown-arrow {
    width: 12px;
    height: 12px;
    transition: transform 0.2s ease;
    fill: #666;
}

.dropdown-arrow.rotated {
    transform: rotate(180deg);
}

.lang-dropdown {
    position: absolute;
    top: 100%;
    right: 0;
    /* background: white; */
    border: 1px solid #ddd;
    border-radius: 6px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    min-width: 140px;
    opacity: 0;
    visibility: hidden;
    transform: translateY(-10px);
    transition: all 0.2s ease;
    z-index: 1000;
    margin-top: 4px;
}

.lang-dropdown.active {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
}

.lang-option {
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 10px 15px;
    cursor: pointer;
    transition: background-color 0.2s ease;
    text-decoration: none;
    color: #333;
}

.lang-option:hover {
    background-color: #f8f9fa;
    text-decoration: none;
    color: #333;
}

.lang-option.active {
    background-color: #e3f2fd;
    color: #1976d2;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const langSelectorBtn = document.getElementById('langSelectorBtn');
    const langDropdown = document.getElementById('langDropdown');
    const dropdownArrow = document.getElementById('dropdownArrow');

    // Toggle dropdown
    langSelectorBtn.addEventListener('click', function(e) {
        e.preventDefault();
        e.stopPropagation();

        const isActive = langDropdown.classList.contains('active');

        if (isActive) {
            closeDropdown();
        } else {
            openDropdown();
        }
    });

    // Close dropdown when clicking outside
    document.addEventListener('click', function() {
        closeDropdown();
    });

    // Prevent dropdown from closing when clicking inside
    langDropdown.addEventListener('click', function(e) {
        e.stopPropagation();
    });

    function openDropdown() {
        langDropdown.classList.add('active');
        dropdownArrow.classList.add('rotated');
    }

    function closeDropdown() {
        langDropdown.classList.remove('active');
        dropdownArrow.classList.remove('rotated');
    }
});
</script>
                        <button class="login-btn">{{ __('frontend.common.login') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Mobile Menu -->
    <div class="mobile-menu-header">
        <div class="container">
            <a class="mobile-brand" href="/">
                <img src="assets/frontend/tild6238-3031-4265-a564-343037346231/tic_logo_blue.png" alt="TIC"
                    class="mobile-logo">
            </a>
            <button class="mobile-hamburger" onclick="toggleMobileNav()">
                <span></span><span></span><span></span>
            </button>
        </div>
    </div>

    <!-- Main Navigation -->
    <nav class="parliament-nav" id="parliamentNav">
        <div class="container">
            <ul class="main-nav-menu">
                <li class="nav-item">
                    <a href="#" class="nav-link">{{ __('frontend.nav.about') }}</a>
                    <div class="nav-dropdown">
                        <div class="dropdown-container">
                            <ul class="dropdown-menu">
                                <li><a href="{{route('frontend.board')}}">{{ __('frontend.nav.management') }}</a></li>
                                {{-- <li><a href="#">Отчетность предприятия</a></li> --}}
                                <li><a href="{{ route('frontend.about_us') }}">{{ __('frontend.nav.about') }}</a></li>
                                <li><a href="{{ route('frontend.investoram_slayd') }}">{{ __('frontend.nav.presentations') }}</a></li>
                                <li><a href="{{ route('frontend.ustav') }}">{{ __('frontend.nav.charter') }}</a></li>
                            </ul>
                        </div>
                    </div>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">{{ __('frontend.nav.corporate_governance') }}</a>
                    <div class="nav-dropdown mega-dropdown">
                        <div class="dropdown-container">
                            <ul class="dropdown-menu">
                                <!-- Management and Control Bodies -->
                                <li class="dropdown-section">
                                    <div class="section-header">
                                        <a href="#" class="section-title">{{ __('frontend.nav.management_bodies') }}</a>
                                        <button class="section-toggle" onclick="toggleSubDropdown(this)">
                                            <span class="arrow">▶</span>
                                        </button>
                                    </div>
                                    <ul class="sub-dropdown-menu">
                                        <li><a href="{{route('frontend.share_struktura')}}">{{ __('frontend.nav.sole_shareholder') }}</a></li>
                                        <li><a href="{{route('frontend.supervisory_board')}}">{{ __('frontend.nav.supervisory_board') }}</a></li>
                                        <li><a href="{{route('frontend.supervisory_board_committees')}}">{{ __('frontend.nav.board_committees') }}</a></li>
                                        <li><a href="#">{{ __('frontend.nav.internal_audit') }}</a></li>
                                        <li><a href="{{route('frontend.board')}}">{{ __('frontend.nav.executive_body') }}</a></li>
                                    </ul>
                                </li>

                                <!-- Information Disclosure -->
                                <li class="dropdown-section">
                                    <div class="section-header">
                                        <a href="#" class="section-title">{{ __('frontend.nav.disclosure') }}</a>
                                        <button class="section-toggle" onclick="toggleSubDropdown(this)">
                                            <span class="arrow">▶</span>
                                        </button>
                                    </div>
                                    <ul class="sub-dropdown-menu">
                                        <li><a href="{{route('frontend.charter_capital')}}">{{ __('frontend.nav.charter_capital') }}</a></li>
                                <li><a href="{{route('frontend.information_on_the_purchase_of_shares_by_the_company')}}">{{ __('frontend.nav.share_purchase_info') }}</a></li>

                                        <li><a href="#">{{ __('frontend.nav.financial_reports') }}</a></li>
                                        <li><a href="{{route('frontend.assessment_system')}}">{{ __('frontend.nav.governance_assessment') }}</a></li>
                                        <li><a href="{{route('frontend.essential_facts')}}">{{ __('frontend.nav.essential_facts') }}</a></li>
                                        <li><a href="{{route('frontend.npa')}}">{{ __('frontend.nav.legal_acts') }}</a></li>
                                        <li><a href="{{route('frontend.nizomlar')}}">{{ __('frontend.nav.regulations') }}</a></li>
                                        <li><a href="#">{{ __('frontend.nav.auditor_report') }}</a></li>
                                        <li><a href="#">{{ __('frontend.nav.issuer_reports') }}</a></li>
                                    </ul>
                                </li>

                                <!-- Additional Items -->
                                <li><a href="">{{ __('frontend.nav.shareholder_meeting') }}</a></li>
                                <li><a href="{{route('frontend.risk_takers')}}">{{ __('frontend.nav.risks') }}</a></li>
                                <li><a href="{{route('frontend.development_strategies')}}">{{ __('frontend.nav.development_strategies') }}</a></li>
                                <li><a href="{{route('frontend.key_performance_indicators')}}">{{ __('frontend.nav.performance_criteria') }}</a></li>
                                <li><a href="{{ route('frontend.internal_documents_of_the_company') }}">{{ __('frontend.nav.internal_documents') }}</a></li>
                                <li><a href="{{route('frontend.spisok')}}">{{ __('frontend.nav.affiliated_list') }}</a></li>
                                <li><a href="{{route('frontend.dividends')}}">{{ __('frontend.nav.dividends') }}</a></li>
                                <li><a href="{{route('frontend.business_plan')}}">{{ __('frontend.nav.business_plan') }}</a></li>
                                <li><a href="#">{{ __('frontend.nav.securities_prospectus') }}</a></li>
                            </ul>
                        </div>
                    </div>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">{{ __('frontend.nav.investors') }}</a>
                    <div class="nav-dropdown">
                        <div class="dropdown-container">
                            <ul class="dropdown-menu">
                                <li class="new-item-wrapper">
                                    <a href="{{route('frontend.investor_ideas.create')}}">
                                        {{ __('frontend.nav.investor_proposals') }}
                                        <span class="new-badge">{{ __('frontend.common.new') }}</span>
                                    </a>
                                </li>
                                <li><a href="{{route('frontend.investment-projects')}}">{{ __('frontend.nav.investment_potential') }}</a></li>
                                <li><a href="https://yangiavlodzone.uz">{{ __('frontend.nav.yangi_avlod') }}</a></li>
                                <li><a href="https://promobilitycity.uz/">{{ __('frontend.nav.promobility') }}</a></li>
                                <li><a href="{{route('frontend.jac-projects')}}">{{ __('frontend.nav.jac_motors') }}</a></li>
                                <li><a href="{{route('frontend.investoram')}}">{{ __('frontend.nav.renovation') }}</a></li>
                                <li><a href="#">{{ __('frontend.nav.ppp_projects') }}</a></li>
                            </ul>
                        </div>
                    </div>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">{{ __('frontend.nav.career') }}</a>
                    <div class="nav-dropdown">
                        <div class="dropdown-container">
                            <ul class="dropdown-menu">
                                <li><a href="{{route('frontend.vacancies')}}">{{ __('frontend.nav.vacancies') }}</a></li>
                            </ul>
                        </div>
                    </div>
                </li>

                <li class="nav-item">

                    <a href="#" class="nav-link">{{ __('frontend.nav.press_center') }} <span class="new-badge" style="margin-left:10px">{{ __('frontend.common.new') }}</span></a>
                    <div class="nav-dropdown">
                        <div class="dropdown-container">
                            <ul class="dropdown-menu">
                                <li><a href="{{route('frontend.media')}}">{{ __('frontend.nav.news') }}</a></li>
                                {{-- <li><a href="#">Медиа</a></li> --}}
                                <li class="new-item-wrapper">
                                    <a href="{{route('frontend.open_tender_notice')}}">
                                        {{ __('frontend.nav.tenders') }}
                                        <span class="new-badge">{{ __('frontend.common.new') }}</span>
                                    </a>
                                </li>
                                <li><a href="{{route('frontend.offers')}}">{{ __('frontend.nav.announcements') }}</a></li>


                                <a href="{{route('frontend.contact')}}">{{ __('frontend.nav.contact') }}</a>

                            </ul>
                        </div>
                    </div>
                </li>

            </ul>

            <!-- Interactive Map Button -->
            <div class="nav-special-btn">
                <a href="https://projects.toshkentinvest.uz?from_toshknetinvest_official_website/" target="_blank"
                    class="map-link">
                    <span class="map-icon">📍</span>
                    {{ __('frontend.nav.interactive_map') }}
                </a>
            </div>

            <!-- Mobile Hamburger -->
            <button class="nav-hamburger" onclick="toggleMobileNav()">
                <span></span><span></span><span></span>
            </button>
        </div>
    </nav>
</div>

<style>
    /* Enhanced Parliament.gov.uz Style with Beautiful Fonts & Light Colors */

    /* Import Google Fonts for Professional Typography */
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Roboto:wght@300;400;500;700&display=swap');

    /* Reset & Base Styles */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .parliament-clean-nav {
        font-family: 'Inter', 'Roboto', 'Segoe UI', system-ui, -apple-system, sans-serif;
        font-feature-settings: 'liga' 1, 'kern' 1;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }

    /* Container */
    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }

    /* Notice Bar - Light & Elegant */
    .notice-bar {
        background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
        padding: 10px 0;
        font-size: 13px;
        border-bottom: 1px solid #cbd5e1;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
    }

    .notice-bar .container {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .test-notice {
        color: #e11d48;
        font-weight: 600;
        font-size: 12px;
        letter-spacing: 0.5px;
        text-transform: uppercase;
    }

    /* Parliament Header - Light & Professional */
    .parliament-header {
        background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
        padding: 25px 0;
        border-bottom: 2px solid #e2e8f0;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
    }

    .header-content {
        display: flex;
        align-items: center;
        gap: 30px;
    }

    .emblem-section {
        flex-shrink: 0;
    }

    .emblem-img {
        width: 85px;
        height: 85px;
        object-fit: contain;
        filter: drop-shadow(0 2px 8px rgba(0, 0, 0, 0.1));
        transition: transform 0.3s ease;
    }

    .emblem-img:hover {
        transform: scale(1.05);
    }

    .title-section {
        flex: 1;
    }

    .main-title {
        font-size: 24px;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 6px;
        letter-spacing: 0.3px;
        font-family: 'Inter', sans-serif;
        text-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
    }

    .main-subtitle {
        font-size: 15px;
        color: #64748b;
        font-weight: 500;
        letter-spacing: 1.2px;
        font-family: 'Roboto', sans-serif;
        text-transform: uppercase;
    }

    .header-controls {
        display: flex;
        align-items: center;
    }

    .language-controls {
        display: flex;
        align-items: center;
        gap: 18px;
z-index: 9999;
    }

    .lang-btn {
        color: #3b82f6;
        text-decoration: none;
        font-size: 15px;
        font-weight: 600;
        padding: 10px 16px;
        border-radius: 8px;
        transition: all 0.3s ease;
        font-family: 'Inter', sans-serif;
        background: rgba(59, 130, 246, 0.05);
        border: 1px solid rgba(59, 130, 246, 0.1);
    }

    .lang-btn:hover {
        background: rgba(59, 130, 246, 0.1);
        color: #1d4ed8;
        transform: translateY(-1px);
        box-shadow: 0 2px 8px rgba(59, 130, 246, 0.2);
    }

    .login-btn {
        background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
        /* color: white; */
        border: none;
        padding: 12px 20px;
        border-radius: 8px;
        font-size: 15px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        font-family: 'Inter', sans-serif;
        box-shadow: 0 2px 8px rgba(59, 130, 246, 0.3);
    }

    .login-btn:hover {
        transform: translateY(-1px);
        box-shadow: 0 4px 16px rgba(59, 130, 246, 0.4);
        background: linear-gradient(135deg, #1d4ed8 0%, #1e40af 100%);
    }

    /* Mobile Menu Header - Light */
    .mobile-menu-header {
        display: none;
        background: linear-gradient(135deg, #f1f5f9 0%, #e2e8f0 100%);
        padding: 18px 0;
        border-bottom: 1px solid #cbd5e1;
    }

    .mobile-menu-header .container {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .mobile-logo {
        height: 45px;
        object-fit: contain;
        filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.1));
    }

    .mobile-hamburger {
        width: 32px;
        height: 24px;
        background: none;
        border: none;
        position: relative;
        cursor: pointer;
    }

    .mobile-hamburger span {
        display: block;
        width: 100%;
        height: 3px;
        background: #475569;
        margin: 4px 0;
        transition: all 0.3s ease;
        border-radius: 2px;
    }

    .mobile-hamburger:hover span {
        background: #334155;
    }

    .mobile-hamburger.active span:nth-child(1) {
        transform: rotate(-45deg) translate(-6px, 6px);
    }

    .mobile-hamburger.active span:nth-child(2) {
        opacity: 0;
    }

    .mobile-hamburger.active span:nth-child(3) {
        transform: rotate(45deg) translate(-6px, -6px);
    }

    /* Main Navigation - Light Parliament Style */
    .parliament-nav {
        background: linear-gradient(135deg, #f1f5f9 0%, #e2e8f0 100%);
        position: sticky;
        top: 0;
        z-index: 1000;
        box-shadow: 0 2px 12px rgba(0, 0, 0, 0.08);
        border-bottom: 3px solid #cbd5e1;
    }

    .parliament-nav .container {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .main-nav-menu {
        display: flex;
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .nav-item {
        position: relative;
    }

    .nav-link {
        display: block;
        padding: 20px 24px;
        color: #475569;
        text-decoration: none;
        font-size: 15px;
        font-weight: 600;
        transition: all 0.3s ease;
        white-space: nowrap;
        font-family: 'Inter', sans-serif;
        letter-spacing: 0.3px;
        border-bottom: 3px solid transparent;
    }

    .nav-link:hover,
    .nav-item:hover .nav-link {
        background: rgba(59, 130, 246, 0.08);
        color: #1e293b;
        border-bottom-color: #3b82f6;
        transform: translateY(-1px);
    }

    /* Navigation Dropdown - Light & Modern */
    .nav-dropdown {
        position: absolute;
        top: 100%;
        left: 0;
        background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
        min-width: 320px;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.12);
        border-radius: 0 0 12px 12px;
        opacity: 0;
        visibility: hidden;
        transform: translateY(-12px);
        transition: all 0.4s ease;
        z-index: 1001;
        border: 1px solid #e2e8f0;
        border-top: 3px solid #3b82f6;
    }

    /* Mega Dropdown for Corporate Governance */
    .mega-dropdown {
        min-width: 500px;
        max-height: 600px;
        overflow-y: auto;
    }

    .nav-item:hover .nav-dropdown {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
    }

    .dropdown-container {
        padding: 20px 0;
    }

    .dropdown-menu {
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .dropdown-menu li {
        margin: 0;
    }

    .dropdown-menu a {
        display: block;
        padding: 14px 24px;
        color: #475569;
        text-decoration: none;
        font-size: 15px;
        transition: all 0.3s ease;
        font-family: 'Inter', sans-serif;
        font-weight: 500;
        border-left: 3px solid transparent;
    }

    .dropdown-menu a:hover {
        background: rgba(59, 130, 246, 0.06);
        color: #1e293b;
        padding-left: 32px;
        border-left-color: #3b82f6;
    }

    /* Section Headers & Sub-dropdowns */
    .dropdown-section {
        margin-bottom: 8px;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
    }

    .section-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0;
        background: rgba(248, 250, 252, 0.8);
        border: 1px solid #e2e8f0;
        transition: all 0.3s ease;
        margin-bottom: 0 !important;
    }


    .section-header:hover {
        background: rgba(59, 130, 246, 0.05);
        border-color: #cbd5e1;
        box-shadow: 0 2px 8px rgba(59, 130, 246, 0.1);
    }

    .section-title {
        flex: 1;
        font-weight: 700 !important;
        color: #1e293b !important;
        background: transparent !important;
        border-left: none !important;
        margin: 0;
        padding: 16px 24px !important;
        position: relative;
    }

    .section-title:before {
        content: '';
        position: absolute;
        left: 0;
        top: 50%;
        transform: translateY(-50%);
        width: 4px;
        height: 60%;
        background: #3b82f6;
        border-radius: 0 2px 2px 0;
        transition: all 0.3s ease;
    }

    .section-title:hover {
        background: transparent !important;
        padding-left: 28px !important;
        color: #1d4ed8 !important;
    }

    .section-title:hover:before {
        height: 80%;
        background: #1d4ed8;
    }

    .section-toggle {
        background: none;
        border: none;
        padding: 16px 20px;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        min-width: 60px;
        border-left: 1px solid #e2e8f0;
    }

    .section-toggle:hover {
        background: rgba(59, 130, 246, 0.1);
        border-left-color: #3b82f6;
    }

    .section-toggle .arrow {
        font-size: 14px;
        color: #64748b;
        transition: all 0.3s ease;
        font-weight: bold;
    }

    .section-toggle:hover .arrow {
        color: #3b82f6;
        transform: scale(1.1);
    }

    .section-toggle.active .arrow {
        transform: rotate(90deg);
        color: #1d4ed8;
    }

    .sub-dropdown-menu {
        list-style: none;
        margin: 0;
        padding: 0;
        background: #ffffff;
        border-top: 1px solid #e2e8f0;
        max-height: 0;
        overflow: hidden;
        transition: all 0.4s ease;
    }

    .sub-dropdown-menu.active {
        max-height: 450px;
        padding: 8px 0;
    }

    .sub-dropdown-menu a {
        font-size: 14px;
        padding: 12px 24px 12px 40px;
        color: #64748b;
        border-left: none;
        position: relative;
        transition: all 0.3s ease;
    }

    .sub-dropdown-menu a:before {
        content: '•';
        position: absolute;
        left: 28px;
        color: #cbd5e1;
        font-size: 16px;
        transition: all 0.3s ease;
    }

    .sub-dropdown-menu a:hover {
        color: #1e293b;
        background: rgba(59, 130, 246, 0.04);
        padding-left: 44px;
    }

    .sub-dropdown-menu a:hover:before {
        color: #3b82f6;
        transform: scale(1.2);
    }

    /* Interactive Map Button */
    .nav-special-btn {
        margin-left: 24px;
    }

    .map-link {
        color: white;
        padding: 14px 20px;
        text-decoration: none;
        border-radius: 6px;
        font-size: 14px;
        font-weight: 600;
        transition: all 0.3s ease;
        white-space: nowrap;
        font-family: 'Inter', sans-serif;
        letter-spacing: 0.3px;
        box-shadow: 0 2px 8px rgba(71, 85, 105, 0.3);
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .map-link:hover {
        transform: translateY(-1px);
        box-shadow: 0 4px 16px rgba(71, 85, 105, 0.4);
        background: linear-gradient(135deg, #334155 0%, #1e293b 100%);
        color: #fff !important;
    }

    .map-icon {
        font-size: 16px;
        opacity: 0.9;
    }

    /* Hamburger Menu */
    .nav-hamburger {
        display: none;
        width: 32px;
        height: 24px;
        background: none;
        border: none;
        position: relative;
        cursor: pointer;
    }

    .nav-hamburger span {
        display: block;
        width: 100%;
        height: 3px;
        background: #475569;
        margin: 4px 0;
        transition: all 0.3s ease;
        border-radius: 2px;
    }

    /* Hover Effect for Sub-dropdown Sections */
    .dropdown-section:hover .section-header {
        background: rgba(59, 130, 246, 0.02);
    }

    .dropdown-section:hover .sub-dropdown-menu {
        max-height: 400px;
    }

    .dropdown-section:hover .section-toggle .arrow {
        transform: rotate(90deg);
        color: #3b82f6;
    }

    /* Mobile Responsive */
    @media (max-width: 992px) {
        .mobile-menu-header {
            display: block;
        }

        .parliament-header {
            display: none;
        }

        .nav-hamburger {
            display: block;
        }

        .main-nav-menu {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            flex-direction: column;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
            border-top: 2px solid #cbd5e1;
        }

        .main-nav-menu.mobile-active {
            display: flex;
        }

        .nav-link {
            border-bottom: 1px solid rgba(203, 213, 225, 0.5);
            border-left: none;
        }

        .nav-dropdown,
        .mega-dropdown {
            position: static;
            opacity: 1;
            visibility: visible;
            transform: none;
            background: rgba(248, 250, 252, 0.95);
            box-shadow: inset 0 2px 8px rgba(0, 0, 0, 0.06);
            border-radius: 0;
            border: none;
            border-top: 1px solid #e2e8f0;
            min-width: auto;
            max-height: none;
            overflow-y: visible;
        }

        .nav-special-btn {
            margin: 0;
            padding: 20px 24px;
            background: #fff;
            border-top: 1px solid rgba(71, 85, 105, 0.1);
        }

        .map-link {
            display: flex;
            justify-content: center;
            border-radius: 8px;
        }

        .sub-dropdown-menu {
            margin-left: 10px;
        }

        .section-header {
            flex-direction: column;
            align-items: stretch;
        }

        .section-toggle {
            align-self: flex-end;
            margin-top: -40px;
        }
    }

    @media (max-width: 768px) {
        .container {
            padding: 0 16px;
        }

        .header-content {
            flex-direction: column;
            gap: 20px;
            text-align: center;
        }

        .emblem-img {
            width: 70px;
            height: 70px;
        }

        .main-title {
            font-size: 20px;
        }

        .main-subtitle {
            font-size: 13px;
        }

        .notice-bar .container {
            flex-direction: column;
            gap: 8px;
            text-align: center;
        }

        .language-controls {
            gap: 12px;
        }

        .lang-btn,
        .login-btn {
            font-size: 14px;
            padding: 10px 16px;
        }
    }

    /* Enhanced Focus States for Accessibility */
    .nav-link:focus,
    .dropdown-menu a:focus,
    .sub-dropdown-menu a:focus,
    .section-toggle:focus,
    .lang-btn:focus,
    .login-btn:focus,
    .map-link:focus {
        outline: 3px solid #fbbf24;
        outline-offset: 2px;
        border-radius: 4px;
    }

    /* Smooth Scrolling */
    html {
        scroll-behavior: smooth;
    }

    /* Loading Animation */
    .parliament-clean-nav {
        animation: fadeInUp 0.6s ease-out;
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Typography Improvements */
    .parliament-clean-nav {
        text-rendering: optimizeLegibility;
    }

    .main-title,
    .nav-link,
    .dropdown-menu a {
        font-variant-ligatures: common-ligatures;
    }

    /* High DPI Display Optimizations */
    @media (-webkit-min-device-pixel-ratio: 2),
    (min-resolution: 192dpi) {
        .emblem-img {
            image-rendering: -webkit-optimize-contrast;
            image-rendering: crisp-edges;
        }
    }

    /* Custom Scrollbar for Mega Dropdown */
    .mega-dropdown::-webkit-scrollbar {
        width: 6px;
    }
/*
    .mega-dropdown::-webkit-scrollbar-track {
        background: #f1f5f9;
    } */

    .mega-dropdown::-webkit-scrollbar-thumb {
        background: #cbd5e1;
        border-radius: 3px;
    }

    .mega-dropdown::-webkit-scrollbar-thumb:hover {
        background: #94a3b8;
    }

    /* NEW Badge Styles - Government Official Style */
    .new-item-wrapper {
        position: relative;
    }

    .new-item-wrapper a {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 10px;
    }

    .new-badge {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%);
        color: white;
        font-size: 10px;
        font-weight: 700;
        padding: 3px 8px;
        border-radius: 4px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        box-shadow: 0 2px 8px rgba(220, 38, 38, 0.4);
        animation: pulseGlow 2s ease-in-out infinite;
        position: relative;
        overflow: hidden;
    }

    .new-badge::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: linear-gradient(
            45deg,
            transparent 30%,
            rgba(255, 255, 255, 0.3) 50%,
            transparent 70%
        );
        animation: shimmer 3s infinite;
    }

    @keyframes pulseGlow {
        0%, 100% {
            box-shadow: 0 2px 8px rgba(220, 38, 38, 0.4),
                        0 0 0 0 rgba(220, 38, 38, 0.4);
            transform: scale(1);
        }
        50% {
            box-shadow: 0 2px 12px rgba(220, 38, 38, 0.6),
                        0 0 0 4px rgba(220, 38, 38, 0.1);
            transform: scale(1.05);
        }
    }

    @keyframes shimmer {
        0% {
            transform: translateX(-100%) translateY(-100%) rotate(45deg);
        }
        100% {
            transform: translateX(100%) translateY(100%) rotate(45deg);
        }
    }

    /* Enhanced hover effect for NEW item */
    .new-item-wrapper:hover .new-badge {
        background: linear-gradient(135deg, #b91c1c 0%, #991b1b 100%);
        box-shadow: 0 4px 16px rgba(220, 38, 38, 0.6);
        animation: pulseGlow 1s ease-in-out infinite;
    }

    /* Government official attention indicator */
    .new-item-wrapper::before {
        content: '';
        position: absolute;
        left: 0;
        top: 50%;
        transform: translateY(-50%);
        width: 4px;
        height: 0;
        background: linear-gradient(180deg, #dc2626 0%, #b91c1c 100%);
        border-radius: 0 2px 2px 0;
        transition: height 0.3s ease;
    }

    .new-item-wrapper:hover::before {
        height: 80%;
    }

    /* Mobile responsive for NEW badge */
    @media (max-width: 768px) {
        .new-badge {
            font-size: 9px;
            padding: 2px 6px;
        }
    }
</style>

<script>
    // Mobile Navigation Toggle
    function toggleMobileNav() {
        const hamburger = document.querySelector('.nav-hamburger, .mobile-hamburger');
        const menu = document.querySelector('.main-nav-menu');

        if (hamburger) {
            hamburger.classList.toggle('active');
        }

        if (menu) {
            menu.classList.toggle('mobile-active');
        }
    }

    // Toggle Sub-dropdown
    function toggleSubDropdown(button) {
        const section = button.closest('.dropdown-section');
        const subMenu = section.querySelector('.sub-dropdown-menu');
        const arrow = button.querySelector('.arrow');

        // Toggle active states
        button.classList.toggle('active');
        subMenu.classList.toggle('active');

        // Prevent event bubbling
        event.stopPropagation();
    }

    // Close mobile menu when clicking outside
    document.addEventListener('click', function(event) {
        const nav = document.querySelector('.main-nav-menu');
        const hamburger = document.querySelector('.nav-hamburger, .mobile-hamburger');

        if (!nav || !hamburger) return;

        if (!nav.contains(event.target) && !hamburger.contains(event.target)) {
            nav.classList.remove('mobile-active');
            hamburger.classList.remove('active');
        }
    });

    // Add hover functionality for sub-dropdowns
    document.addEventListener('DOMContentLoaded', function() {
        const dropdownSections = document.querySelectorAll('.dropdown-section');

        dropdownSections.forEach(section => {
            const subMenu = section.querySelector('.sub-dropdown-menu');
            const toggle = section.querySelector('.section-toggle');

            // Hover to open
            section.addEventListener('mouseenter', function() {
                if (subMenu && toggle) {
                    subMenu.classList.add('active');
                    toggle.classList.add('active');
                }
            });

            // Mouse leave to close (with delay)
            section.addEventListener('mouseleave', function() {
                setTimeout(() => {
                    if (subMenu && toggle && !section.matches(':hover')) {
                        subMenu.classList.remove('active');
                        toggle.classList.remove('active');
                    }
                }, 300);
            });
        });
    });

    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Initialize
    document.addEventListener('DOMContentLoaded', function() {
        console.log('Tashkent Invest Company Navigation Loaded');
    });
</script>
