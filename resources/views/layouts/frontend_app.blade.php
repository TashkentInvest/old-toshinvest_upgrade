<!DOCTYPE html>
<html>

<head>
    @include('inc.__frontend_head')
</head>

<body class="t-body" style="margin: 0">
    <!--allrecords-->
    <div id="allrecords" class="t-records" data-hook="blocks-collection-content-node" data-tilda-project-id="9433043"
        data-tilda-page-id="48914927" data-tilda-page-alias="ru" data-tilda-formskey="44fd03c9779dc2a2069765d219433043"
        data-tilda-cookie="no" data-tilda-lazy="yes" data-tilda-root-zone="one">
       @include('inc.__frontend_nav')
        @yield('frontent_content')
        <!--footer-->
        @include('inc.__frontend_footer')
        <!--/footer-->
    </div>
    <!--/allrecords--><!-- Stat --><!-- Yandex.Metrika counter 97295680 -->
    <script type="text/javascript" data-tilda-cookie-type="analytics">
      setTimeout(function () {
        (function (m, e, t, r, i, k, a) {
          m[i] =
            m[i] ||
            function () {
              (m[i].a = m[i].a || []).push(arguments);
            };
          m[i].l = 1 * new Date();
          (k = e.createElement(t)),
            (a = e.getElementsByTagName(t)[0]),
            (k.async = 1),
            (k.src = r),
            a.parentNode.insertBefore(k, a);
        })(
          window,
          document,
          "script",
          "https://mc.yandex.ru/metrika/tag.js",
          "ym"
        );
        window.mainMetrikaId = "97295680";
        ym(window.mainMetrikaId, "init", {
          clickmap: true,
          trackLinks: true,
          accurateTrackBounce: true,
          webvisor: true,
          ecommerce: "dataLayer",
        });
      }, 2000);
    </script>
    <noscript>
        <div>
            <img src="watch/97295680" style="position: absolute; left: -9999px" alt="" />
        </div>
    </noscript>
    <!-- /Yandex.Metrika counter -->
    <script type="text/javascript">
        if (!window.mainTracker) {
            window.mainTracker = "tilda";
        }
        window.tildastatcookie = "no";
        setTimeout(function() {
            (function(d, w, k, o, g) {
                var n = d.getElementsByTagName(o)[0],
                    s = d.createElement(o),
                    f = function() {
                        n.parentNode.insertBefore(s, n);
                    };
                s.type = "text/javascript";
                s.async = true;
                s.key = k;
                s.id = "tildastatscript";
                s.src = g;
                if (w.opera == "[object Opera]") {
                    d.addEventListener("DOMContentLoaded", f, false);
                } else {
                    f();
                }
            })(
                document,
                window,
                "0495b384fe8563fa3b2d2d1dd1ce0cc0",
                "script",
                "https://static.tildacdn.one/js/tilda-stat-1.0.min.js"
            );
        }, 2000);
    </script>


<script>
    window.replainSettings = { id: '707b8c53-47df-40de-b0bb-2e7750eaea1a' };
    (function(u){var s=document.createElement('script');s.async=true;s.src=u;
    var x=document.getElementsByTagName('script')[0];x.parentNode.insertBefore(s,x);
    })('https://widget.replain.cc/dist/client.js');
    </script>
<style>
body{
overflow-x: hidden;
}
</style>
</body>

</html>
