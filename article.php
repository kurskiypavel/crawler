<?php

//header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once 'vendor/autoload.php';
require_once 'src/generated-conf/config.php';
use orm\orm\VgArticleQuery;

//$slug = $_SERVER['REQUEST_URL'];
$actual_link = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
//var_dump(parse_url($actual_link, PHP_URL_QUERY));
$path = parse_url($actual_link, PHP_URL_PATH);
$slug = str_replace('/', '', $path);
//var_dump($slug);

//$slug = "posmotrite-pervyy-treyler-filma-ubegayushchiye-ot-marvels-runaways-ot-hulu";
$article = VgArticleQuery::create()
    ->where('VgArticle.slug = ?', $slug)
    ->limit(1)
    ->find();
foreach ($article as $row) {

    $Json_translateRU = $row->getJson_translateRU();
    $datetime = $row->getDatetime();
    if (isset($datetime) && strlen($datetime) > 5) {
        $m = new \Moment\Moment($datetime);
        $m::setLocale('ru_RU');
        $datetime = $m->format('j F Y');
    } else {
        $datetime = '';
    }
    $id = $row->getId();
}
if (!isset($Json_translateRU)) {
    include "err.php";
    die();
}
//if(!isset($Json_translateRU)) throw new ExceptionCrawler("Wrong slug");
$Json_translateRU = json_decode($Json_translateRU, true);
$titleRU = $Json_translateRU['titleRU'];
$subtitleRU = $Json_translateRU['subtitleRU'];
$contentsRU = $Json_translateRU['contentRU'];
$content = '';
$privateName = '';
$index = '';
$paragraph = '';
foreach ($contentsRU as $index => $content) {
    $paragraph .= "<p id='$id" . "i" . "$index" . "in'>" . $content . "</p>";
}

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <title><?=$titleRU;?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="apple-mobile-web-app-title" content="Lipsed"/>
    <link rel="preload"
          href="https://cdn.vox-cdn.com/shared_fonts/unison/unison_base/nittigrotesk/nittigrotesk-normal.woff2"
          as="font"
          type="font/woff2" crossorigin>
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
    <meta id="chorus-fonts" data-cid="site/font_loader-1573162018_7950_11479"
          data-cdata='{"version":"d3a15f142bcd041806ec9275c9672d13","fonts_catalog":[{"slug":"unison-nitti","family":"nitti-grotesk","weight":"400","style":"normal","woff2_url":"https://cdn.vox-cdn.com/shared_fonts/unison/unison_base/nittigrotesk/nittigrotesk-normal.woff2","woff_url":"https://cdn.vox-cdn.com/shared_fonts/unison/unison_base/nittigrotesk/nittigrotesk-normal.woff"},{"slug":"verge-adelle-sans","family":"adelle-sans","weight":"400","style":"italic","woff2_url":"https://cdn.vox-cdn.com/shared_fonts/unison/verge/AdelleSans-Italic.woff2","woff_url":"https://cdn.vox-cdn.com/shared_fonts/unison/verge/AdelleSans-Italic.woff"},{"slug":"verge-adelle-sans","family":"adelle-sans","weight":"600","style":"normal","woff2_url":"https://cdn.vox-cdn.com/shared_fonts/unison/verge/AdelleSans-Semibold.woff2","woff_url":"https://cdn.vox-cdn.com/shared_fonts/unison/verge/AdelleSans-Semibold.woff"},{"slug":"verge-heroic","family":"Heroic","weight":"500","style":"italic","woff2_url":"https://cdn.vox-cdn.com/shared_fonts/unison/verge/heroic-cond-vrg-web-ltd-md-obq.woff2","woff_url":"https://cdn.vox-cdn.com/shared_fonts/unison/verge/heroic-cond-vrg-web-ltd-md-obq.woff"},{"slug":"verge-heroic","family":"Heroic","weight":"500","style":"normal","woff2_url":"https://cdn.vox-cdn.com/shared_fonts/unison/verge/heroic-cond-vrg-web-ltd-md.woff2","woff_url":"https://cdn.vox-cdn.com/shared_fonts/unison/verge/heroic-cond-vrg-web-ltd-md.woff"},{"slug":"verge-heroic","family":"Heroic","weight":"600","style":"italic","woff2_url":"https://cdn.vox-cdn.com/shared_fonts/unison/verge/heroic-cond-vrg-web-ltd-bd-obq.woff2","woff_url":"https://cdn.vox-cdn.com/shared_fonts/unison/verge/heroic-cond-vrg-web-ltd-bd-obq.woff"},{"slug":"verge-heroic","family":"Heroic","weight":"600","style":"normal","woff2_url":"https://cdn.vox-cdn.com/shared_fonts/unison/verge/heroic-cond-vrg-web-ltd-hvy.woff2","woff_url":"https://cdn.vox-cdn.com/shared_fonts/unison/verge/heroic-cond-vrg-web-ltd-hvy.woff"},{"slug":"verge-heroic","family":"Heroic","weight":"700","style":"normal","woff2_url":"https://cdn.vox-cdn.com/shared_fonts/unison/verge/heroic-cond-vrg-web-ltd-hvy.woff2","woff_url":"https://cdn.vox-cdn.com/shared_fonts/unison/verge/heroic-cond-vrg-web-ltd-hvy.woff"},{"slug":"verge-pathways","family":"Pathways","weight":"400","style":"normal","woff2_url":"https://cdn.vox-cdn.com/shared_fonts/unison/verge/pathways-normal-webfont.woff2","woff_url":"https://cdn.vox-cdn.com/shared_fonts/unison/verge/pathways-normal-webfont.woff"}],"font_stylesheets":["https://fonts.voxmedia.com/unison/stylesheets/verge.ccc871708379b713e3df3eb38e09e86b.css"],"font_tracker_stylesheets":[],"typekit_ids":[],"headline_balance_div_classes":".c-page-title,.c-entry-summary,.c-entry-box__title,.c-entry-box--compact__title,.c-entry-box--compact__dek,.c-rock-list__entry-title","headline_balance_fraction":0.5}'>
    <script>
        var chorusInitQueue = [],
            volume_embed_host = "https://volume.vox-cdn.com";
        var Chorus = Chorus || {};
        Chorus.windowLoaded = !1, Chorus.AddScript = function (t, e) {
            var o = document.createElement("script");
            o.async = !0, o.type = "text/javascript", o.src = t, "function" == typeof e && (o.onload = e);
            var a = document.getElementsByTagName("script")[0];
            return a.parentNode.insertBefore(o, a), o
        }, Chorus.ready = function (t) {
            "loading" != document.readyState ? t() : document.addEventListener ? document.addEventListener(
                "DOMContentLoaded", t) : document.attachEvent("onreadystatechange", function () {
                "loading" != document.readyState && t()
            })
        }, Chorus.OnLoad = function (t) {
            if (Chorus.windowLoaded = !0) return void t();
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
            void 0 !== navigator.doNotTrack ? t = navigator.doNotTrack : void 0 !== window.doNotTrack ? t = window
                .doNotTrack : void 0 !== navigator.msDoNotTrack && (t = navigator.msDoNotTrack), t = void 0 !== t ?
                /1|yes|true/.test(String(t).toLowerCase()) ? "true" : "false" : "undefined";
            var e = {
                DNT: t
            };
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
                var o, a = t,
                    n = a.documentElement,
                    r = setTimeout(function () {
                        n.className = n.className.replace(/\bwf-loading\b/g, "") + " wf-inactive"
                    }, e.scriptTimeout),
                    i = a.createElement("script"),
                    d = !1,
                    c = a.getElementsByTagName("script")[0];
                n.className += " wf-loading", i.src = "https://use.typekit.net/" + e.kitId + ".js", i.async = !0, i.onload = i
                    .onreadystatechange = function () {
                    if (o = this.readyState, !(d || o && "complete" != o && "loaded" != o)) {
                        d = !0, clearTimeout(r);
                        try {
                            Typekit.load(e)
                        } catch (t) {
                        }
                    }
                }, c.parentNode.insertBefore(i, c)
            }

            var c = "fonts-loaded",
                s = t.documentElement,
                f = t.getElementById("chorus-fonts");
            if (f) {
                var u = JSON.parse(f.getAttribute("data-cdata"));
                t.fonts ? (r("voxmedia.com"), u.fonts_catalog.forEach(function (e) {
                    if (e.woff2_url || e.woff_url) {
                        var o = [e.woff2_url, e.woff_url].filter(function (t) {
                                return t
                            }).map(function (t) {
                                return "url(" + t + ")"
                            }).join(", "),
                            a = new FontFace(e.family, o, {
                                weight: e.weight,
                                style: e.style
                            });
                        t.fonts.add(a), a.load().then(n)
                    }
                }), t.fonts.ready.then(o, a)) : r(), u.typekit_ids.forEach(function (t) {
                    d({
                        kitId: t,
                        scriptTimeout: 3e3,
                        async: !0
                    })
                }), u.font_tracker_stylesheets.forEach(i)
            }
        };
        VoxMediaFontLoader(document);
    </script>
    <script class="kxint" type="text/javascript">
        window.Krux || ((Krux = function () {
            Krux.q.push(arguments);
        }).q = []);
        (function () {
            function retrieve(e) {
                var r, o = "kxvoxmedia_" + e;
                return window.localStorage ? window.localStorage[o] || "" : navigator.cookieEnabled ? (r = document.cookie
                    .match(o + "=([^;]*)"), r && unescape(r[1]) || "") : ""
            }

            Krux.user = retrieve("user"), Krux.segments = retrieve("segs") && retrieve("segs").split(",") || [];
        })();
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <link href="html/179756d4b36c0c4486dabcfbc80e7eaf/chorus.css" data-chorus-theme="chorus" rel="stylesheet"
          media="all">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:800&display=swap" rel="stylesheet">
    <meta name="style-tools"
          content="https://www.lipsed.ru/style/community/372/57327a9d91cb60a9f47223632d1f3ee8/tools.css">
    <meta name="description"
          content="Lipsed был основан в 2019 году и охватывает пересечение технологий, науки, искусства и культуры. Его миссия состоит в том, чтобы предлагать подробные репортажи и подробные сюжеты, объединять новости, информацию о продуктах и контент сообщества в единой и связной форме."/>
    <link rel="canonical" href="https://www.lipsed.ru"/>

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
    <meta data-chorus-version="435335963e17bdb0d02cfcce619ea8bdfa7b1eb6"/>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
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
<body class="entry_key_unison_standard entry_layout_unison_main entry_template_standard" data-entry-id="20722337">

<style>
    .m-privacy-consent {
        background-color: rgba(60, 60, 60, 0.95);
        bottom: 0;
        color: white !important;
        font-size: 17px !important;
        font-weight: normal !important;
        line-height: 1.5em !important;
        left: 0;
        position: fixed;
        right: 0;
        z-index: 5000001;
    }

    .m-privacy-consent__inner {
        margin: 0 auto;
        max-width: 800px;
        padding: 30px;
    }

    .m-privacy-consent__inner a {
        color: white !important;
        font-weight: bold;
        text-decoration: underline !important;
    }

    .m-privacy-consent__inner a:hover {
        color: #ccc !important;
    }

    .m-privacy-consent__inner button {
        background-color: #e2127A;
        border: 1px solid white;
        color: #ffffff;
        display: block;
        font-weight: bold;
        height: 46px;
        line-height: 46px;
        padding: 0 2em;
        margin: 0 auto;
        min-width: 200px;
    }

    .m-privacy-consent__inner button:hover {
        background-color: #b30e61;
    }

    .m-privacy-consent__inner button:disabled {
        background-color: #888;
    }

    .m-privacy-consent__button-content {
        align-items: center;
        display: flex;
        height: 100%;
        justify-content: center;
        width: 100%;
    }

    @media (max-width: 500px) {
        .m-privacy-consent {
            font-size: 14px !important;
        }
    }

    /* spinner animation */
    .m-privacy-consent__hourglass,
    .m-privacy-consent__hourglass:after {
        border-radius: 50%;
        width: 20px;
        height: 20px;
    }

    .m-privacy-consent__hourglass {
        display: none;
        font-size: 10px;
        position: relative;
        text-indent: -9999em;
        border-top: 3px solid rgba(255, 255, 255, 0.2);
        border-right: 3px solid rgba(255, 255, 255, 0.2);
        border-bottom: 3px solid rgba(255, 255, 255, 0.2);
        border-left: 3px solid #ffffff;
        margin-right: 1em;
        -webkit-transform: translateZ(0);
        -ms-transform: translateZ(0);
        transform: translateZ(0);
        -webkit-animation: load8 1.1s infinite linear;
        animation: load8 1.1s infinite linear;
    }

    button:disabled .m-privacy-consent__hourglass {
        display: block;
    }

    @-webkit-keyframes load8 {
        0% {
            -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
        }
        100% {
            -webkit-transform: rotate(360deg);
            transform: rotate(360deg);
        }
    }

    @keyframes load8 {
        0% {
            -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
        }
        100% {
            -webkit-transform: rotate(360deg);
            transform: rotate(360deg);
        }
    }
    .c-global-header__logo-large{
        font-family: 'Open Sans', sans-serif;font-size: 2rem;
    }
    .c-global-header__logo-small{
        font-family: 'Open Sans', sans-serif;font-size: 2rem;
    }
    .c-footer__logo-link span{
        color: #fff;font-family: 'Open Sans', sans-serif;font-size: 2.5rem;
    }
</style>
<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
    (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
        m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
    (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

    ym(56252122, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true
    });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/56252122" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
<script>
    (function () {
        var cbAdded = 0;
        var cbComplete = 0;
        var appDomains = ["https://auth.voxmedia.com/services/privacy_consent"];

        function hex(size) {
            var crypto = window.crypto || window.msCrypto;
            var str = "";
            if (crypto) {
                var arr = new Uint8Array(Math.ceil(size / 2));
                crypto.getRandomValues(arr);
                str = [].map.call(arr, function (b) {
                    return ('0' + b.toString(16)).slice(-2)
                }).join('');
            } else {
                for (var i = Math.ceil(size / 11); i > 0; i -= 1) {
                    str += Math.random().toString(36).substr(2);
                }
            }
            return str.substr(0, size);
        }

        function setCookie(name, value, days) {
            var cookie = [name + '=' + (value || '')];
            if (days) {
                var date = new Date();
                date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                cookie.push('expires=' + date.toUTCString());
            }
            cookie.push('path=/');
            document.cookie = cookie.join('; ');
        }

        function addCallback(fn) {
            cbAdded += 1;
            return fn;
        }

        function done() {
            cbComplete += 1;
            if (cbAdded === cbComplete) {
                location.reload();
            }
        }
    })();
</script>
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
    <style id="custom-entry-styles" type="text/css">
    </style>
    <main id="content" tabindex="-1" class="l-wrapper">
        <div class="c-subnav c-subnav-grid">
        </div>
        <article class="l-segment l-main-content">
            <span data-content-admin-id="20722337"></span>
            <div class="l-segment">
                <div class="c-entry-hero c-entry-hero--default ">
                    <div class="c-entry-group-labels c-entry-group-labels--review">

                        <ul aria-labelledby="heading-label--b4nb24zo">
                            <li class="c-entry-group-labels__item">

                            </li>
                        </ul>
                    </div>
                    <div class="c-entry-hero__header-wrap">
                        <h1 class="c-page-title"><?= $titleRU; ?></h1>
                    </div>
                    <p class="c-entry-summary p-dek"><?= $subtitleRU; ?></p>
                    <div class="c-byline">
              <span class="c-byline-wrapper">
                <span class="c-byline__item">
                  <time class="c-byline__item"">
                    <?= $datetime; ?>
                  </time>
                </span>
              </span>
                    </div>
                </div>
            </div>
            <div class="l-sidebar-fixed l-segment l-article-body-segment">
                <div class="l-col__main">
                    <figure class="e-image e-image--hero">
                    </figure>
                    <div class="c-entry-content ">
                        <?= $paragraph; ?>
                    </div>
                </div>
                <div class="l-col__sidebar" data-analytics-placement="sidebar">
                </div>
            </div>
        </article>
    </main>
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
    <div class="c-tab-bar " data-cid="site/tab_bar/index-1573498405_5638_32582" data-cdata="{}">
        <a href="https://www.lipsed.ru/" class="c-tab-bar__logo">
            <span>LIPSED</span>
        </a>
        <span class="c-tab-bar__sponsorship"></span>
    </div>
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