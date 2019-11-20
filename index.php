<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once 'vendor/autoload.php';
require_once 'src/generated-conf/config.php';

use orm\orm\VgArticleQuery;
use Propel\Runtime\ActiveQuery\Criteria;


$articles = VgArticleQuery::create()
    ->condition('cond1', 'VgArticle.slug IS NOT NULL')
    ->condition('cond2', 'VgArticle.json_translateRU IS NOT NULL')
    ->where(array('cond1', 'cond2'), Criteria::LOGICAL_AND)
    ->limit(100)
    ->orderByDatetime('desc')
    ->find();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Lipsed</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="apple-mobile-web-app-title" content="Verge"/>
    <link rel="preload"
          href="https://cdn.vox-cdn.com/shared_fonts/unison/unison_base/nittigrotesk/nittigrotesk-normal.woff2"
          as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="https://cdn.vox-cdn.com/shared_fonts/unison/verge/AdelleSans-Italic.woff2" as="font"
          type="font/woff2" crossorigin>
    <link rel="preload" href="https://cdn.vox-cdn.com/shared_fonts/unison/verge/AdelleSans-Semibold.woff2" as="font"
          type="font/woff2" crossorigin>
    <link rel="preload" href="https://cdn.vox-cdn.com/shared_fonts/unison/verge/heroic-cond-vrg-web-ltd-md-obq.woff2"
          as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="https://cdn.vox-cdn.com/shared_fonts/unison/verge/heroic-cond-vrg-web-ltd-md.woff2"
          as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="https://cdn.vox-cdn.com/shared_fonts/unison/verge/heroic-cond-vrg-web-ltd-bd-obq.woff2"
          as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="https://cdn.vox-cdn.com/shared_fonts/unison/verge/heroic-cond-vrg-web-ltd-hvy.woff2"
          as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="https://cdn.vox-cdn.com/shared_fonts/unison/verge/heroic-cond-vrg-web-ltd-hvy.woff2"
          as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="https://cdn.vox-cdn.com/shared_fonts/unison/verge/pathways-normal-webfont.woff2" as="font"
          type="font/woff2" crossorigin>
    <meta id="chorus-fonts" data-cid="site/font_loader-1573855580_4145_13237"
          data-cdata='{"version":"d3a15f142bcd041806ec9275c9672d13","fonts_catalog":[{"slug":"unison-nitti","family":"nitti-grotesk","weight":"400","style":"normal","woff2_url":"https://cdn.vox-cdn.com/shared_fonts/unison/unison_base/nittigrotesk/nittigrotesk-normal.woff2","woff_url":"https://cdn.vox-cdn.com/shared_fonts/unison/unison_base/nittigrotesk/nittigrotesk-normal.woff"},{"slug":"verge-adelle-sans","family":"adelle-sans","weight":"400","style":"italic","woff2_url":"https://cdn.vox-cdn.com/shared_fonts/unison/verge/AdelleSans-Italic.woff2","woff_url":"https://cdn.vox-cdn.com/shared_fonts/unison/verge/AdelleSans-Italic.woff"},{"slug":"verge-adelle-sans","family":"adelle-sans","weight":"600","style":"normal","woff2_url":"https://cdn.vox-cdn.com/shared_fonts/unison/verge/AdelleSans-Semibold.woff2","woff_url":"https://cdn.vox-cdn.com/shared_fonts/unison/verge/AdelleSans-Semibold.woff"},{"slug":"verge-heroic","family":"Heroic","weight":"500","style":"italic","woff2_url":"https://cdn.vox-cdn.com/shared_fonts/unison/verge/heroic-cond-vrg-web-ltd-md-obq.woff2","woff_url":"https://cdn.vox-cdn.com/shared_fonts/unison/verge/heroic-cond-vrg-web-ltd-md-obq.woff"},{"slug":"verge-heroic","family":"Heroic","weight":"500","style":"normal","woff2_url":"https://cdn.vox-cdn.com/shared_fonts/unison/verge/heroic-cond-vrg-web-ltd-md.woff2","woff_url":"https://cdn.vox-cdn.com/shared_fonts/unison/verge/heroic-cond-vrg-web-ltd-md.woff"},{"slug":"verge-heroic","family":"Heroic","weight":"600","style":"italic","woff2_url":"https://cdn.vox-cdn.com/shared_fonts/unison/verge/heroic-cond-vrg-web-ltd-bd-obq.woff2","woff_url":"https://cdn.vox-cdn.com/shared_fonts/unison/verge/heroic-cond-vrg-web-ltd-bd-obq.woff"},{"slug":"verge-heroic","family":"Heroic","weight":"600","style":"normal","woff2_url":"https://cdn.vox-cdn.com/shared_fonts/unison/verge/heroic-cond-vrg-web-ltd-hvy.woff2","woff_url":"https://cdn.vox-cdn.com/shared_fonts/unison/verge/heroic-cond-vrg-web-ltd-hvy.woff"},{"slug":"verge-heroic","family":"Heroic","weight":"700","style":"normal","woff2_url":"https://cdn.vox-cdn.com/shared_fonts/unison/verge/heroic-cond-vrg-web-ltd-hvy.woff2","woff_url":"https://cdn.vox-cdn.com/shared_fonts/unison/verge/heroic-cond-vrg-web-ltd-hvy.woff"},{"slug":"verge-pathways","family":"Pathways","weight":"400","style":"normal","woff2_url":"https://cdn.vox-cdn.com/shared_fonts/unison/verge/pathways-normal-webfont.woff2","woff_url":"https://cdn.vox-cdn.com/shared_fonts/unison/verge/pathways-normal-webfont.woff"}],"font_stylesheets":["https://fonts.voxmedia.com/unison/stylesheets/verge.ccc871708379b713e3df3eb38e09e86b.css"],"font_tracker_stylesheets":[],"typekit_ids":[],"headline_balance_div_classes":".c-page-title,.c-entry-summary,.c-entry-box__title,.c-entry-box--compact__title,.c-entry-box--compact__dek,.c-rock-list__entry-title","headline_balance_fraction":0.5}'>
    <script>var chorusInitQueue = [], volume_embed_host = "https://volume.vox-cdn.com";
        var Chorus = Chorus || {};
        Chorus.windowLoaded = !1, Chorus.AddScript = function (t, e) {
            var o = document.createElement("script");
            o.async = !0, o.type = "text/javascript", o.src = t, "function" == typeof e && (o.onload = e);
            var a = document.getElementsByTagName("script")[0];
            return a.parentNode.insertBefore(o, a), o
        }, Chorus.ready = function (t) {
            "loading" != document.readyState ? t() : document.addEventListener ? document.addEventListener("DOMContentLoaded", t) : document.attachEvent("onreadystatechange", function () {
                "loading" != document.readyState && t()
            })
        }, Chorus.OnLoad = function (t) {
            if (Chorus.windowLoaded = !0)return void t();
            var e = window.onload;
            "function" != typeof window.onload ? window.onload = t : window.onload = function () {
                e(), t()
            }
        }, Chorus.OnLoad(function () {
            Chorus.windowLoaded = !0
        });
        var dataLayer = dataLayer || [];
        Chorus.OnLoad(function () {
            var t;
            void 0 !== navigator.doNotTrack ? t = navigator.doNotTrack : void 0 !== window.doNotTrack ? t = window.doNotTrack : void 0 !== navigator.msDoNotTrack && (t = navigator.msDoNotTrack), t = void 0 !== t ? /1|yes|true/.test(String(t).toLowerCase()) ? "true" : "false" : "undefined";
            var e = {DNT: t};
            dataLayer.push(e)
        });
        var VoxMediaFontLoader = function (t) {
            function e(t, e) {
                var o = window.performance;
                if (o && o.mark && o.measure) {
                    var a = t.toLocaleLowerCase().replace(/\W+/g, "_") + (e ? "_" + e : "");
                    o.mark(a), o.measure(a + "_time", "navigationStart", a)
                }
            }

            function o() {
                s.classList.add(c), e("fonts_success")
            }

            function a() {
                s.classList.add(c), e("fonts_fail")
            }

            function n(t) {
                var o = [t.family, t.style, t.weight, "loaded"].join(" ");
                e(o)
            }

            function r(t) {
                var e = u.font_stylesheets || [];
                t && (e = e.filter(function (e) {
                    return !e.match(t)
                })), e.forEach(i)
            }

            function i(e) {
                var o = t.createElement("link");
                o.href = e, o.rel = "stylesheet", o.media = "all", f.parentNode.insertBefore(o, f)
            }

            function d(e) {
                var o, a = t, n = a.documentElement, r = setTimeout(function () {
                    n.className = n.className.replace(/\bwf-loading\b/g, "") + " wf-inactive"
                }, e.scriptTimeout), i = a.createElement("script"), d = !1, c = a.getElementsByTagName("script")[0];
                n.className += " wf-loading", i.src = "https://use.typekit.net/" + e.kitId + ".js", i.async = !0, i.onload = i.onreadystatechange = function () {
                    if (o = this.readyState, !(d || o && "complete" != o && "loaded" != o)) {
                        d = !0, clearTimeout(r);
                        try {
                            Typekit.load(e)
                        } catch (t) {
                        }
                    }
                }, c.parentNode.insertBefore(i, c)
            }

            var c = "fonts-loaded", s = t.documentElement, f = t.getElementById("chorus-fonts");
            if (f) {
                var u = JSON.parse(f.getAttribute("data-cdata"));
                t.fonts ? (r("voxmedia.com"), u.fonts_catalog.forEach(function (e) {
                    if (e.woff2_url || e.woff_url) {
                        var o = [e.woff2_url, e.woff_url].filter(function (t) {
                            return t
                        }).map(function (t) {
                            return "url(" + t + ")"
                        }).join(", "), a = new FontFace(e.family, o, {weight: e.weight, style: e.style});
                        t.fonts.add(a), a.load().then(n)
                    }
                }), t.fonts.ready.then(o, a)) : r(), u.typekit_ids.forEach(function (t) {
                    d({kitId: t, scriptTimeout: 3e3, async: !0})
                }), u.font_tracker_stylesheets.forEach(i)
            }
        };
        VoxMediaFontLoader(document);</script>
    <script class="kxint" type="text/javascript">
        window.Krux || ((Krux = function () {
            Krux.q.push(arguments);
        }).q = []);
        (function () {
            function retrieve(e) {
                var r, o = "kxvoxmedia_" + e;
                return window.localStorage ? window.localStorage[o] || "" : navigator.cookieEnabled ? (r = document.cookie.match(o + "=([^;]*)"), r && unescape(r[1]) || "") : ""
            }

            Krux.user = retrieve("user"), Krux.segments = retrieve("segs") && retrieve("segs").split(",") || [];
        })();
    </script>
    <link href="html/179756d4b36c0c4486dabcfbc80e7eaf/chorus.css" data-chorus-theme="chorus" rel="stylesheet"
          media="all">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:800&display=swap" rel="stylesheet">
    <meta name="style-tools"
          content="https://www.lipsed.ru/style/community/372/4e855776539859840970bc9b4ab11181/tools.css">
    <meta name="description"
          content="Lipsed был основан в 2019 году и охватывает пересечение технологий, науки, искусства и культуры. Его миссия состоит в том, чтобы предлагать подробные репортажи и подробные сюжеты, объединять новости, информацию о продуктах и контент сообщества в единой и связной форме."/>
    <link rel="canonical" href="https://www.lipsed.ru/"/>

    <link rel="apple-touch-icon" sizes="57x57" href="9b61e3776af429d530917f220689da59/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="9b61e3776af429d530917f220689da59/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="9b61e3776af429d530917f220689da59/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="9b61e3776af429d530917f220689da59/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="9b61e3776af429d530917f220689da59/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="9b61e3776af429d530917f220689da59/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="9b61e3776af429d530917f220689da59/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="9b61e3776af429d530917f220689da59/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="9b61e3776af429d530917f220689da59/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="9b61e3776af429d530917f220689da59/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="9b61e3776af429d530917f220689da59/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="9b61e3776af429d530917f220689da59/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="9b61e3776af429d530917f220689da59/favicon-16x16.png">
    <link rel="manifest" href="9b61e3776af429d530917f220689da59/manifest.json">
    <meta name="msapplication-TileColor" content="#393092">
    <meta name="msapplication-TileImage" content="9b61e3776af429d530917f220689da59/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">


    <meta data-chorus-version="bd223f5384690876ab24c4dcba556dfc73dd1429"/>
    <style>  .c-global-header__logo-large {
            font-family: 'Open Sans', sans-serif;
            font-size: 2rem;
        }

        .c-global-header__logo-small {
            font-family: 'Open Sans', sans-serif;
            font-size: 2rem;
        }

        .c-footer__logo-link span {
            color: #fff;
            font-family: 'Open Sans', sans-serif;
            font-size: 2.5rem;
        }
    </style>
    <!--Google adsense-->
    <script>
        (adsbygoogle = window.adsbygoogle || []).push({
            google_ad_client: "ca-pub-6133537105312052",
            enable_page_level_ads: true
        });
    </script>
    <!--Google adsense-->
</head>
<!--[if lte IE 9]>
<body class="ie9"><![endif]-->
<!--[if gte IE 10]>
<body class="ie"><![endif]-->
<body class="">
<a class="sr-only link-skip" href="#content">Skip to main content</a>
<div class="l-root l-reskin">
    <div class="l-header">
        <div class="chorus-emc__content" data-emc-slug="UnisonCustomNavCell" data-emc-bucket="372::">
            <header class="c-global-header " data-cid="site/global_header-1573498825_1868_154939" role="banner"
                    data-analytics-placement="navigation" data-cdata="{}">
                <div class="l-wrapper">
                    <div class="c-global-header__logo ">
                        <a href="https://www.lipsed.ru/" id="chorus-brand" data-analytics-link="home">
                            <span class="sr-only">Lipsed</span>
                            <span class="c-global-header__logo-large" aria-hidden="true" tabindex="-1">
  LIPSED
    </span>
                            <span class="c-global-header__logo-small">
    LIPSED
    </span>
                        </a>
                    </div>
                    <nav class="c-global-header__links" aria-labelledby="global-header__links--label">
                        <h2 id="global-header__links--label" class="sr-only">Lipsed главное меню</h2>
                        <ul>
                        </ul>
                    </nav>
                    <div class="p-input-header c-global-header__search-menu" data-analytics-class="search">
                        <form action="/search" method="GET" data-analytics-class="search">
                            <input class="p-input-header__input" name="q" placeholder="Search">
                            <input type="submit" class="p-input-header__link p-button" value="Search">
                        </form>
                    </div>
                </div>
            </header>
            <section class="c-nav-list" data-cid="site/nav_list-1573498825_7263_154938" data-cdata='{"tab_id":"more"}'>
                <div class="c-nav-list__inner">
                    <ul class="c-nav-list__main" data-nav-list-id="more">
                        <button data-ui="close-nav" type="button" class="c-nav-list__close">✕</button>
                    </ul>
                </div>
            </section>
        </div>
    </div>
    <h2 class="p-page-title p-page-title--top">Новости и обзоры</h2>
    <section class="l-wrapper">
        <div class="l-segment l-sidebar-fixed">
            <div class="l-col__main">

                <div class="c-compact-river">

                    <!--NEW ENTRY-->


                    <?php
                    foreach ($articles as $row) {
                        $Json_translateRU = $row->getJson_translateRU();
                        $Json_translateRU = json_decode($Json_translateRU, true);
                        $titleRU = $Json_translateRU['titleRU'];
                        $datetime = $row->getDatetime();
                        $slug = $row->getSlug();
                        if (isset($datetime) && strlen($datetime) > 5) {
                            $m = new \Moment\Moment($datetime);
                            $m::setLocale('ru_RU');
                            $datetime = $m->format('j F Y');
                            $datetimePublished = '<span class="c-byline__item">Опубликован
                                        <time class="c-byline__item">'.$datetime.'</time>
                                    </span>';
                        } else {
                            $datetime = '';
                            $datetimePublished="";
                        }

                        echo '<div class="c-compact-river__entry ">
                        <div class="c-entry-box--compact c-entry-box--compact--article"
                             data-chorus-optimize-id="20727586" data-chorus-optimize-module="entry-box">
                            <div class="c-entry-box--compact__body">
                                <h2 class="c-entry-box--compact__title" style="max-width: 624px;">
                                    <a data-chorus-optimize-field="hed" data-analytics-link="article" href="https://www.lipsed.ru/'.$slug.'">'.$titleRU.'</a></h2>
                                <div class="c-byline" data-cid="site/byline-1574010875_6923_8740"
                                     data-cdata="{&quot;timestamp&quot;:1573773047}">
                                  <span class="c-byline-wrapper">
                                    '.$datetimePublished.'
                                  </span>
                                </div>
                            </div>
                        </div>
                    </div>';
                    }

                    ?>

                    <!--NEW ENTRY-->


                </div>
            </div>
        </div>
    </section>
    <footer class="c-footer" role="contentinfo">
        <div class="l-wrapper c-footer__wrapper">
            <div class="c-footer__section c-footer__section-logo">
                <a rel="nofollow" href="https://www.lipsed.ru/" class="c-footer__logo-link">
                    <span>LIPSED</span>
                </a>
            </div>
            <div class="c-footer__section c-footer__section-links">
            </div>
            <div class="c-footer__section c-footer__section-vox">
            </div>
        </div>
    </footer>
</div>
<script src="html/js/chorus-870756aa6e866cf4fa07.js" async integrity="sha256-0tpRFdH8xRvKqfjHbFFGNejYQzTSCBJv0GhBzOleMJc= sha384-rpuYLBRRvAeak8r684KfOwLBu39GFH571yHurdwV/0INgtiD7Q0NsiFKwuWwdHiQ" crossorigin="anonymous"></script>


<script>
    (function (a, c, d, e) {
        if (!a[c]) {
            var b = a[c] = {};
            b[d] = [];
            b[e] = function (a) {
                b[d].push(a)
            }
        }
    })(window, 'Scroll', '_q', 'do');
    Scroll.config = {
        detected: false
    };
</script>
<script src="https://static.scroll.com/js/scroll.js" async="async"></script>
</body>
</html>