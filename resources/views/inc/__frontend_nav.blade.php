    <div id="rec748107215" class="parliament-clean-nav" data-animationappear="off" data-record-type="257">
        {{-- Top Notice Bar --}}
        <div class="notice-bar">
            <div class="container">
                <div class="notice-left">
                    <span class="test-notice">SAYT SINOV TARIQASIDA ISHGA TUSHIRILGAN</span>
                </div>
                {{-- <div class="notice-right">
                    <a href="#" class="old-version-link">AVVALGI KO'RINISHIGA O'TISH</a>
                </div> --}}
            </div>
        </div>

        {{-- Main Header --}}
        <header class="parliament-header">
            <div class="container">
                <div class="header-content">
                    <div class="emblem-section">
                        <img src="{{ asset('assets/frontend/tild6238-3031-4265-a564-343037346231/tic_logo_blue.png') }}"
                            alt="Emblem" class="emblem-img">
                    </div>
                    <div class="title-section">
                        <h1 class="main-title">TASHKENT INVEST COMPANY</h1>
                        <h2 class="main-subtitle">ИНВЕСТИЦИОННАЯ КОМПАНИЯ</h2>
                    </div>
                    <div class="header-controls">
                        <div class="language-controls">
                            <a href="#" class="lang-btn">O'zbek</a>
                            <button class="login-btn">Kirish</button>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        {{-- Mobile Menu --}}
        <div class="mobile-menu-header">
            <div class="container">
                <div class="mobile-brand">
                    <img src="{{ asset('assets/frontend/tild6238-3031-4265-a564-343037346231/tic_logo_blue.png') }}"
                        alt="TIC" class="mobile-logo">
                </div>
                <button class="mobile-hamburger" onclick="toggleMobileNav()">
                    <span></span><span></span><span></span>
                </button>
            </div>
        </div>

        {{-- Main Navigation --}}
        <nav class="parliament-nav" id="parliamentNav">
            <div class="container">
                <ul class="main-nav-menu">
                    <li class="nav-item">
                        <a href="#" class="nav-link">О компании</a>
                        <div class="nav-dropdown">
                            <div class="dropdown-container">
                                <ul class="dropdown-menu">
                                    <li><a href="{{ route('frontend.ustav') }}">История</a></li>
                                    <li><a href="{{ route('frontend.struktura') }}">Руководство</a></li>
                                    <li><a href="{{ route('frontend.reports') }}">Отчетность предприятия</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">Инвесторам</a>
                        <div class="nav-dropdown">
                            <div class="dropdown-container">
                                <ul class="dropdown-menu">
                                    <li><a href="{{ route('frontend.investment-projects') }}">Инвестиционный потенциал
                                            города</a></li>
                                    <li><a href="https://yangiavlodzone.uz">ОПЗ "Янги Авлод"</a></li>
                                    <li><a href="{{ route('frontend.investoram') }}">Реновация и строительство</a></li>
                                    <li><a href="#">Проекты ГЧП</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">Карьера</a>
                        <div class="nav-dropdown">
                            <div class="dropdown-container">
                                <ul class="dropdown-menu">
                                    <li><a href="{{ route('frontend.vacancies') }}">Наша команда</a></li>
                                    <li><a href="{{ route('frontend.vacancies') }}">Вакансии</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">Пресс-центр</a>
                        <div class="nav-dropdown">
                            <div class="dropdown-container">
                                <ul class="dropdown-menu">
                                    <li><a href="{{ route('frontend.media') }}">Новости</a></li>
                                    <li><a href="{{ route('frontend.media') }}">Медиа</a></li>
                                    <li><a href="{{ route('frontend.zakupki') }}">Тендеры и конкурсы</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('frontend.contact') }}" class="nav-link">Контакты</a>
                    </li>
                </ul>

                {{-- Interactive Map Button --}}
                <div class="nav-special-btn">
                    <a href="https://projects.toshkentinvest.uz?from_toshknetinvest_official_website/" target="_blank"
                        class="map-link">
                        <span class="map-icon">📍</span>
                        Интерактивная карта
                    </a>
                </div>

                {{-- Mobile Hamburger --}}
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

        .old-version-link {
            color: #3b82f6;
            text-decoration: none;
            font-weight: 500;
            font-size: 13px;
            transition: all 0.3s ease;
        }

        .old-version-link:hover {
            color: #1d4ed8;
            text-decoration: underline;
        }

        /* Parliament Header - Light & Professional */
        .parliament-header {
            background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
            padding: 25px 0;
            border-bottom: 2px solid #e2e8f0;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
        }

        .parliament-header.inner {
            background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
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
            color: white;
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

        .mobile-menu-header.inner {
            background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
            border-bottom: 1px solid #e2e8f0;
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

        .parliament-nav.inner {
            background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
            border-bottom: 3px solid #e2e8f0;
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

        /* Serious Government Interactive Map Button */
        .nav-special-btn {
            margin-left: 24px;
        }

        .map-link {
            background: #fff;
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
            position: relative;
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 2px 8px rgba(71, 85, 105, 0.3);
            display: flex;
            align-items: center;
            gap: 8px;
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

            .parliament-nav.inner .main-nav-menu {
                background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
                border-top: 2px solid #e2e8f0;
            }

            .main-nav-menu.mobile-active {
                display: flex;
            }

            .nav-link {
                border-bottom: 1px solid rgba(203, 213, 225, 0.5);
                border-left: none;
            }

            .nav-dropdown {
                position: static;
                opacity: 1;
                visibility: visible;
                transform: none;
                background: rgba(248, 250, 252, 0.95);
                box-shadow: inset 0 2px 8px rgba(0, 0, 0, 0.06);
                border-radius: 0;
                border: none;
                border-top: 1px solid #e2e8f0;
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

        // Compatibility functions for existing code
        function t_menuburger_init(recid) {
            // Compatibility function
        }

        function t_onReady(callback) {
            if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', callback);
            } else {
                callback();
            }
        }

        function t_onFuncLoad(funcName, callback) {
            callback();
        }

        // Initialize
        t_onReady(function() {
            t_onFuncLoad("t_menuburger_init", function() {
                t_menuburger_init("748107215");
                t_menuburger_init("748905478");
            });
        });
    </script>
