<meta charset="utf-8" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />

<!-- SEO Meta Tags -->
<title>{{ $seoTitle ?? __('frontend.seo.default_title') }}</title>
<meta name="description" content="{{ $seoDescription ?? __('frontend.seo.default_description') }}" />
<meta name="keywords" content="{{ $seoKeywords ?? __('frontend.seo.default_keywords') }}" />
<meta name="author" content="{{ __('frontend.seo.author') }}" />
<meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1" />
<meta name="language" content="{{ app()->getLocale() }}" />
<meta name="revisit-after" content="7 days" />

<!-- Canonical & Alternate Language URLs -->
<link rel="canonical" href="{{ $canonicalUrl ?? url()->current() }}" />
<link rel="alternate" hreflang="uz" href="{{ url()->current() }}?lang=uz" />
<link rel="alternate" hreflang="ru" href="{{ url()->current() }}?lang=ru" />
<link rel="alternate" hreflang="en" href="{{ url()->current() }}?lang=en" />
<link rel="alternate" hreflang="x-default" href="{{ url()->current() }}" />

<!-- Open Graph Meta Tags -->
<meta property="og:locale" content="{{ app()->getLocale() == 'uz' ? 'uz_UZ' : (app()->getLocale() == 'ru' ? 'ru_RU' : 'en_US') }}" />
<meta property="og:type" content="{{ $ogType ?? 'website' }}" />
<meta property="og:title" content="{{ $seoTitle ?? __('frontend.seo.default_title') }}" />
<meta property="og:description" content="{{ $seoDescription ?? __('frontend.seo.default_description') }}" />
<meta property="og:url" content="{{ url()->current() }}" />
<meta property="og:site_name" content="{{ __('frontend.seo.site_name') }}" />
<meta property="og:image" content="{{ $ogImage ?? asset('assets/frontend/images/og-default.jpg') }}" />
<meta property="og:image:width" content="1200" />
<meta property="og:image:height" content="630" />
<meta property="og:image:alt" content="{{ $seoTitle ?? __('frontend.seo.default_title') }}" />

<!-- Twitter Card Meta Tags -->
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:title" content="{{ $seoTitle ?? __('frontend.seo.default_title') }}" />
<meta name="twitter:description" content="{{ $seoDescription ?? __('frontend.seo.default_description') }}" />
<meta name="twitter:image" content="{{ $ogImage ?? asset('assets/frontend/images/og-default.jpg') }}" />
<meta name="twitter:site" content="@toshkentinvest" />

<!-- Geo Tags -->
<meta name="geo.region" content="UZ-TK" />
<meta name="geo.placename" content="Tashkent" />
<meta name="geo.position" content="41.2995;69.2401" />
<meta name="ICBM" content="41.2995, 69.2401" />
<meta name="format-detection" content="telephone=no" />
<meta http-equiv="x-dns-prefetch-control" content="on" />
<link rel="dns-prefetch" href="https://ws.tildacdn.com" />
<link rel="dns-prefetch" href="https://static.tildacdn.one" />
<!-- Favicon -->
<link rel="shortcut icon" href="{{ asset('assets/frontend/tild3566-3163-4833-b562-366533376630/_-1.jpg') }}"
    type="image/x-icon" />
<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/frontend/tild3566-3163-4833-b562-366533376630/_-1.jpg') }}" />
<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/frontend/tild3566-3163-4833-b562-366533376630/_-1.jpg') }}" />

<!-- Preconnect to Required Origins -->
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link rel="preconnect" href="https://cdnjs.cloudflare.com" crossorigin />
<link rel="dns-prefetch" href="https://ws.tildacdn.com" />
<link rel="dns-prefetch" href="https://static.tildacdn.one" />

<!-- Critical CSS - Preload -->
<link rel="preload" href="{{asset('assets/frontend/css/tilda-grid-3.0.min.css')}}" as="style" onload="this.onload=null;this.rel='stylesheet'" />
<link rel="preload" href="{{ asset('assets/frontend/css/government-unified.css') }}" as="style" onload="this.onload=null;this.rel='stylesheet'" />

<!-- Stylesheets -->
<link rel="stylesheet" href="{{asset('assets/frontend/ws/project9433043/tilda-blocks-page48943729.min.css')}}" type="text/css" media="all" />
<link rel="stylesheet" href="{{asset('assets/frontend/css/tilda-cards-1.0.min.css')}}" type="text/css" media="all" />
<link rel="stylesheet" href="{{asset('assets/frontend/ws/project9433043/tilda-blocks-page48952595.min.css')}}" type="text/css" media="all" />

<!-- FontAwesome 6 CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<!-- Assets -->
<script src="{{ asset('assets/frontend/js/tilda-fallback-1.0.min.js') }}" async="" charset="utf-8"></script>
<link rel="stylesheet" href="{{ asset('assets/frontend/css/tilda-grid-3.0.min.css') }}" type="text/css" media="all"
    onerror="this.loaderr='y';" />
<link rel="stylesheet" href="{{ asset('assets/frontend/ws/project9433043/tilda-blocks-page48987727.min.css') }}"
    type="text/css" media="all" onerror="this.loaderr='y';" />
<link rel="preconnect" href="https://fonts.gstatic.com" />
<link href="{{ asset('assets/frontend/css2?family=Montserrat:wght@300;400;500;600;700&subset=latin,cyrillic') }}"
    rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('assets/frontend/css/tilda-forms-1.0.min.css') }}" type="text/css" media="all"
    onerror="this.loaderr='y';" />
<link rel="stylesheet" href="{{ asset('assets/frontend/css/tilda-cards-1.0.min.css') }}" type="text/css" media="all"
    onerror="this.loaderr='y';" />
<link rel="stylesheet" href="{{ asset('assets/frontend/css/tilda-menusub-1.0.min.css') }}" type="text/css"
    media="print" onload="this.media='all';" onerror="this.loaderr='y';" />
<noscript>
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/tilda-menusub-1.0.min.css') }}" type="text/css"
        media="all" />
</noscript>
<script nomodule="" src="{{ asset('assets/frontend/js/tilda-polyfill-1.0.min.js') }}" charset="utf-8"></script>
<script type="text/javascript">
    function t_onReady(func) {
        if (document.readyState != "loading") {
            func();
        } else {
            document.addEventListener("DOMContentLoaded", func);
        }
    }

    function t_onFuncLoad(funcName, okFunc, time) {
        if (typeof window[funcName] === "function") {
            okFunc();
        } else {
            setTimeout(function() {
                t_onFuncLoad(funcName, okFunc, time);
            }, time || 100);
        }
    }

    function t_throttle(fn, threshhold, scope) {
        return function() {
            fn.apply(scope || this, arguments);
        };
    }
</script>
<script src="{{ asset('assets/frontend/js/jquery-1.10.2.min.js') }}" charset="utf-8" onerror="this.loaderr='y';">
</script>
<script src="{{ asset('assets/frontend/js/tilda-scripts-3.0.min.js') }}" charset="utf-8" defer=""
    onerror="this.loaderr='y';"></script>
<script src="{{ asset('assets/frontend/ws/project9433043/tilda-blocks-page48987727.min.js') }}" charset="utf-8"
    async="" onerror="this.loaderr='y';"></script>
<script src="{{ asset('assets/frontend/js/tilda-lazyload-1.0.min.js') }}" charset="utf-8" async=""
    onerror="this.loaderr='y';"></script>
<script src="{{ asset('assets/frontend/js/tilda-cards-1.0.min.js') }}" charset="utf-8" async=""
    onerror="this.loaderr='y';"></script>
<script src="{{ asset('assets/frontend/js/tilda-menusub-1.0.min.js') }}" charset="utf-8" async=""
    onerror="this.loaderr='y';"></script>
<script src="{{ asset('assets/frontend/js/tilda-menu-1.0.min.js') }}" charset="utf-8" async=""
    onerror="this.loaderr='y';"></script>
<script src="{{ asset('assets/frontend/js/tilda-skiplink-1.0.min.js') }}" charset="utf-8" async=""
    onerror="this.loaderr='y';"></script>
<script src="{{ asset('assets/frontend/js/tilda-events-1.0.min.js') }}" charset="utf-8" async=""
    onerror="this.loaderr='y';"></script>
<script type="text/javascript">
    window.dataLayer = window.dataLayer || [];
</script>
<script type="text/javascript">
    (function() {
        if (
            /bot|google|yandex|baidu|bing|msn|duckduckbot|teoma|slurp|crawler|spider|robot|crawling|facebook/i.test(
                navigator.userAgent
            ) === false &&
            typeof sessionStorage != "undefined" &&
            sessionStorage.getItem("visited") !== "y" &&
            document.visibilityState
        ) {
            var style = document.createElement("style");
            style.type = "text/css";
            style.innerHTML =
                "@media screen and (min-width: 980px) {.t-records {opacity: 0;}.t-records_animated {-webkit-transition: opacity ease-in-out .2s;-moz-transition: opacity ease-in-out .2s;-o-transition: opacity ease-in-out .2s;transition: opacity ease-in-out .2s;}.t-records.t-records_visible {opacity: 1;}}";
            document.getElementsByTagName("head")[0].appendChild(style);

            function t_setvisRecs() {
                var alr = document.querySelectorAll(".t-records");
                Array.prototype.forEach.call(alr, function(el) {
                    el.classList.add("t-records_animated");
                });
                setTimeout(function() {
                    Array.prototype.forEach.call(alr, function(el) {
                        el.classList.add("t-records_visible");
                    });
                    sessionStorage.setItem("visited", "y");
                }, 400);
            }
            document.addEventListener("DOMContentLoaded", t_setvisRecs);
        }
    })();
</script>
<!-- Assets -->
<script src="{{ asset('assets/frontend/js/tilda-fallback-1.0.min.js') }}" async="" charset="utf-8"></script>
<link rel="stylesheet" href="{{ asset('assets/frontend/css/tilda-grid-3.0.min.css') }}" type="text/css" media="all"
    onerror="this.loaderr='y';" />
<link rel="stylesheet" href="{{ asset('assets/frontend/ws/project9433043/tilda-blocks-page48914927.min.css') }}"
    type="text/css" media="all" onerror="this.loaderr='y';" />
<link rel="preconnect" href="https://fonts.gstatic.com" />
<link href="css2?family=Montserrat:wght@300;400;500;600;700&subset=latin,cyrillic" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('assets/frontend/css/tilda-menusub-1.0.min.css') }}" type="text/css"
    media="print" onload="this.media='all';" onerror="this.loaderr='y';" />
<noscript>
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/tilda-menusub-1.0.min.css') }}" type="text/css"
        media="all" />
</noscript>
<link rel="stylesheet" href="{{ asset('assets/frontend/css/tilda-cover-1.0.min.css') }}" type="text/css" media="all"
    onerror="this.loaderr='y';" />
<link rel="stylesheet" href="{{ asset('assets/frontend/css/tilda-cards-1.0.min.css') }}" type="text/css" media="all"
    onerror="this.loaderr='y';" />
<link rel="stylesheet" href="{{ asset('assets/frontend/css/tilda-popup-1.1.min.css') }}" type="text/css"
    media="print" onload="this.media='all';" onerror="this.loaderr='y';" />
<noscript>
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/tilda-popup-1.1.min.css') }}" type="text/css"
        media="all" />
</noscript>
<link rel="stylesheet" href="{{ asset('assets/frontend/css/tilda-feed-1.0.min.css') }}" type="text/css"
    media="print" onload="this.media='all';" onerror="this.loaderr='y';" />
<noscript>
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/tilda-feed-1.0.min.css') }}" type="text/css"
        media="all" />
</noscript>
<link rel="stylesheet" href="{{ asset('assets/frontend/css/tilda-slds-1.4.min.css') }}" type="text/css"
    media="print" onload="this.media='all';" onerror="this.loaderr='y';" />
<noscript>
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/tilda-slds-1.4.min.css') }}" type="text/css"
        media="all" />
</noscript>
<script nomodule="" src="{{ asset('assets/frontend/js/tilda-polyfill-1.0.min.js') }}" charset="utf-8"></script>
<script type="text/javascript">
    function t_onReady(func) {
        if (document.readyState != "loading") {
            func();
        } else {
            document.addEventListener("DOMContentLoaded", func);
        }
    }

    function t_onFuncLoad(funcName, okFunc, time) {
        if (typeof window[funcName] === "function") {
            okFunc();
        } else {
            setTimeout(function() {
                t_onFuncLoad(funcName, okFunc, time);
            }, time || 100);
        }
    }

    function t_throttle(fn, threshhold, scope) {
        return function() {
            fn.apply(scope || this, arguments);
        };
    }
</script>
<script src="{{ asset('assets/frontend/js/jquery-1.10.2.min.js') }}" charset="utf-8" onerror="this.loaderr='y';">
</script>
<script src="{{ asset('assets/frontend/js/tilda-scripts-3.0.min.js') }}" charset="utf-8" defer=""
    onerror="this.loaderr='y';"></script>
<script src="{{ asset('assets/frontend/ws/project9433043/tilda-blocks-page48914927.min.js') }}" charset="utf-8"
    async="" onerror="this.loaderr='y';"></script>
<script src="{{ asset('assets/frontend/js/tilda-lazyload-1.0.min.js') }}" charset="utf-8" async=""
    onerror="this.loaderr='y';"></script>
<script src="{{ asset('assets/frontend/js/tilda-menusub-1.0.min.js') }}" charset="utf-8" async=""
    onerror="this.loaderr='y';"></script>
<script src="{{ asset('assets/frontend/js/tilda-menu-1.0.min.js') }}" charset="utf-8" async=""
    onerror="this.loaderr='y';"></script>
<script src="{{ asset('assets/frontend/js/tilda-cover-1.0.min.js') }}" charset="utf-8" async=""
    onerror="this.loaderr='y';"></script>
<script src="{{ asset('assets/frontend/js/tilda-cards-1.0.min.js') }}" charset="utf-8" async=""
    onerror="this.loaderr='y';"></script>
<script src="{{ asset('assets/frontend/js/tilda-feed-1.0.min.js') }}" charset="utf-8" async=""
    onerror="this.loaderr='y';"></script>
<script src="{{ asset('assets/frontend/js/tilda-slds-1.4.min.js') }}" charset="utf-8" async=""
    onerror="this.loaderr='y';"></script>
<script src="{{ asset('assets/frontend/js/hammer.min.js') }}" charset="utf-8" async="" onerror="this.loaderr='y';">
</script>
<script src="{{ asset('assets/frontend/js/tilda-map-1.0.min.js') }}" charset="utf-8" async=""
    onerror="this.loaderr='y';"></script>
<script src="{{ asset('assets/frontend/js/tilda-skiplink-1.0.min.js') }}" charset="utf-8" async=""
    onerror="this.loaderr='y';"></script>
<script src="{{ asset('assets/frontend/js/tilda-events-1.0.min.js') }}" charset="utf-8" async=""
    onerror="this.loaderr='y';"></script>
<script type="text/javascript">
    window.dataLayer = window.dataLayer || [];
</script>
<script type="text/javascript">
    (function() {
        if (
            /bot|google|yandex|baidu|bing|msn|duckduckbot|teoma|slurp|crawler|spider|robot|crawling|facebook/i.test(
                navigator.userAgent
            ) === false &&
            typeof sessionStorage != "undefined" &&
            sessionStorage.getItem("visited") !== "y" &&
            document.visibilityState
        ) {
            var style = document.createElement("style");
            style.type = "text/css";
            style.innerHTML =
                "@media screen and (min-width: 980px) {.t-records {opacity: 0;}.t-records_animated {-webkit-transition: opacity ease-in-out .2s;-moz-transition: opacity ease-in-out .2s;-o-transition: opacity ease-in-out .2s;transition: opacity ease-in-out .2s;}.t-records.t-records_visible {opacity: 1;}}";
            document.getElementsByTagName("head")[0].appendChild(style);

            function t_setvisRecs() {
                var alr = document.querySelectorAll(".t-records");
                Array.prototype.forEach.call(alr, function(el) {
                    el.classList.add("t-records_animated");
                });
                setTimeout(function() {
                    Array.prototype.forEach.call(alr, function(el) {
                        el.classList.add("t-records_visible");
                    });
                    sessionStorage.setItem("visited", "y");
                }, 400);
            }
            document.addEventListener("DOMContentLoaded", t_setvisRecs);
        }
    })();
</script>
