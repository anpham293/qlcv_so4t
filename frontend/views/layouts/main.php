<?php

use common\models\Benhvien;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

$config = \common\models\Configure::getConfig();
AppAsset::register($this);
?>

<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html class=" js no-touch cssanimations cssgradients csstransforms csstransforms3d csstransitions svg pointerevents placeholder"
          lang="vi">

    <head>
        <link rel="shortcut icon" href="--><?= Yii::$app->urlManager->baseUrl . $config['favicon'] ?>" type="image/png">
        <meta charset="utf-8">
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-160618507-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }

            gtag('js', new Date());

            gtag('config', 'UA-160618507-1');
        </script>
        <!--[if IE]>
        <meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'/>
        <![endif IE]-->

        <title> <?= $this->title ?> </title>
        <link rel="shortcut icon" href="<?= Yii::$app->urlManager->baseUrl . $config['favicon'] ?>" type="image/png">
        <link rel="alternate" hreflang="en" href="https://dcvn.com.vn/">
        <link rel="alternate" hreflang="es" href="https://dcvn.com.vn/">
        <link rel="alternate" hreflang="de" href="https://dcvn.com.vn/">
        <meta name="title" content="<?= Yii::$app->controller->seoTitle ?>">
        <meta name="description" content="<?php echo Yii::$app->controller->description; ?>">
        <meta content="width=device-width, initial-scale=1.0, maximum-scale=2.0, user-scalable=0" name="viewport">
        <meta name="robots" content="index, follow">
        <link rel="canonical" href="">
        <meta property="fb:app_id" content="202411077106510"/>
        <meta property="og:type" content="<?= $this->context->og_type ?>">
        <meta property="og:title" content="<?= Yii::$app->controller->seoTitle ?>">
        <meta property="og:image" content="<?= $this->context->og_image ?>">
        <meta name="geo.region" content="VN-HP"/>
        <meta name="geo.placename" content="Hải Ph&ograve;ng"/>
        <meta name="geo.position" content="21;107"/>
        <meta name="ICBM" content="21, 107"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta property="og:url"
              content="<?php echo (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>">
        <meta property="og:site_name" content="DC Tech Team, DC Tech team, DC Tech TEAM">
        <meta property="og:description" content="<?php echo Yii::$app->controller->description; ?>">

        <!--    GOOGLE FONTS    -->
        <script type="text/javascript" src="<?= Yii::$app->urlManager->baseUrl ?>/theme/js/jquery.js"></script>
        <script type="text/javascript"
                src="<?= Yii::$app->urlManager->baseUrl ?>/theme/owl/dist/owl.carousel.min.js"></script>


        <?php $this->head(); ?>
    </head>

    <body class="home trangchu ms-backgroundImage">
    <?php $this->beginBody(); ?>


    <form method="post" id="aspnetForm">
        <div id="s4-workspace">
            <div id="s4-bodyContainer">
                <!--    HEADER      -->
                <header class="hidden-xs">
                    <!--    SLIDER  -->
                    <div id="header-slider-wrapper2">
                        <div id="owl-demo2" class="owl-carousel owl-theme">

                                <div class="item">
                                    <a target="_blank" title="DC Tech" href="#">
                                        <img alt="DC Tech" style="width: 100%"
                                             src="<?= Yii::$app->urlManager->baseUrl ?>/images/Healthcare_banner.jpg">
                                    </a>
                                </div>

                        </div>
                    </div>
                    <style>
                        #background-brand .brand-text h3 {
                            color: #e81d02;
                            font-size: 32px;
                            font-weight: bold;
                            margin: 0;
                            text-shadow: 2px 0 0 #fff, -2px 0 0 #fff, 0 2px 0 #fff, 0 -2px 0 #fff, 1px 1px #fff, -1px -1px 0 #fff, 1px -1px 0 #fff, -1px 1px 0 #fff;
                            text-transform: uppercase;
                        }
                    </style>

                    <div id="header-brand" class="container">
                        <div id="background-brand">
                            <div class="brand-text" style="max-width: 900px">
                                <h1 style="font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif!important;"><?=$config['company_name']?></h1>
                                <h2 style="font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif!important;"> <?= $config['contact_cname'] ?> </h2>

                            </div>
                        </div>
                    </div>
                </header>
            </div>
        </div>


        <div class="main-menu">
            <div class="container">
                <nav class="navbar navbar-default">
                    <div class="navbar-header">
                        <button id="menu-toggle" type="button" class="navbar-toggle collapsed"
                                aria-expanded="false"
                                aria-controls="navbar" style="margin-right:0px;">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand visible-xs" style="height: 80px;">
                            <img src="/images/quochuy.png">
                            <h1><?=$config['company_name']?></h1>
                            <h2><?= $config['contact_cname'] ?></h2>
                            <div class="clearfix"></div>
                        </a>
                        <div class="clearfix"></div>
                    </div>

                    <nav id="mobile-menu">
                        <a class="navbar-brand visible-xs">
                            <img src="/images/quochuy.png">
                            <h1><?=$config['company_name']?></h1>
                            <h2> <?= $config['contact_cname'] ?> </h2>
                        </a>

                        <ul>
                            <li class="mobile-menu-item" >
                                <a href="/" class="menu-item">
                                    Hệ thống quản lý khai báo y tế
                                </a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </nav>
                    <div class="desktop-menu">
                        <div id="navbar" class="navbar-collapse collapse">
                            <ul class="nav navbar-nav nav-justified main-navigation">
                                <li>
                                    <a href="/" style="font-size: 18px;border: none">
                                        Hệ thống quản lý khai báo y tế
                                    </a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </nav>
            </div>
        </div>

        <style>
            .main-navigation ul {
                list-style: none;
                padding: 0;
                margin: 0;
            }

            .main-navigation ul li {
                display: block;
                position: relative;
                float: left;
                background: #0375bc;
            }

            .main-navigation li ul {
                display: none;
                opacity: 0;
                transition: 0.5s all
            }

            .main-navigation ul li a {
                display: block;
                padding: 1em;
                text-decoration: none;
                white-space: nowrap;
                color: #fff;
            }

            .main-navigation ul li a:hover {
                background: #2c3e50;
            }

            .main-navigation li:hover > ul {
                display: block;
                opacity: 1;
                position: absolute;
            }

            .main-navigation li:hover li {
                float: none;
            }

            .main-navigation li:hover a {
                background: #ffffff;
            }

            .main-navigation li:hover li a:hover {
                background: #cccccc;
            }

            .main-navigation li ul li {
                border-top: 0;
            }

            .main-navigation ul ul ul {
                left: 100%;
                top: 0;
            }

            .main-navigation ul:before,
            .main-navigation ul:after {
                content: " "; /* 1 */
                display: table; /* 2 */
            }

            ul:after {
                clear: both;
            }
        </style>


        <?= $content; ?>

        <!--    FOOOTER      -->
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-6"></div>
                    <div class="col-md-1"></div>
                    <div class="col-md-5 text-left">
                        <div class="clearfix"></div>
                        <hr>
                        <h4>
                                    <span class="ms-rteFontFace-1" style="font-size:20px;">
                                        <span style="font-family:&quot;open sans&quot;;"></span></span></h4><h4>© Sở Y Tế Tỉnh Hải Dương</h4>


                        <p><strong>Địa chỉ: </strong><?= $config['contact_address'] ?></p>
                        <p><strong>Số điện thoại: </strong><?= $config['contact_phone'] ?> </p>
                        <p><strong>E-mail: </strong><?= $config['contact_email'] ?> </p>
                        <p><strong>Fax: </strong><?= $config['contact_fax'] ?> </p>
                        <p><strong>Website: </strong> http://soyte.haiduong.gov.vn/ </p>
                        &nbsp;
                        <p>Bản quyền thuộc về <a href="https://dcvn.com.vn/" rel="nofollow"
                                                 target="_blank">DCTech</a><a href="https://karion.com.vn" class="hidden">Karion</a></p>
                    </div>
                </div>
            </div>
        </footer>


        <div id="Overlay" class="overlay"><sub></sub></div>
        </div>
        </div>


    </form>


    <script>
        $(document).ready(function () {
            $('.owl-carousel').owlCarousel({
                loop: true,
                items: 1,
                autoplay: true,
                autoplayTimeout: 3000,
                animateOut: 'fadeOut',
                animateIn: 'fadeIn',
            });
        })


        $(document).ready(function () {
            if ($("#lichct").length > 0) {
                $("#lichct").scrollbar();
            }
        });
        //google Ananalyties
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-160618507-1']);
        _gaq.push(['_trackPageview']);

        (function () {
            var ga = document.createElement('script');
            ga.type = 'text/javascript';
            ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(ga, s);
        })();

        $(document).ready(function () {
            $(".icon-bar").on("click", function (e) {
                e.preventDefault();
                $('#mobile-menu').toggleClass("opened");
            })
            $("#mobile-menu a").on("click", function (e) {
                if($(this).attr("href")==="#"){
                    $(this).siblings("ul:first").toggle( 'Style = "display:none"');
                }
            })
        })

        $(".box-home a.item.in4").on("click", function (e) {
            e.preventDefault();
            $('#mobile-menu').toggleClass("opened");
            if ($('#mobile-menu').hasClass("opened")) {
                $("#mobile-menu > ul > li > a").each(function (e) {
                    var menu_text = $(this).text().toLowerCase().trim();
                    if (menu_text === "tổ chức bộ máy") {
                        $(this).parent(".mobile-menu-item").addClass("opened");
                        $(this).next(".submenu").slideDown(300);
                        $(this).css("color", "#beac5a");
                    }

                });
            }
        });


    </script>

    <?php $this->endBody(); ?>
    </body>

    </html>
<?php $this->endPage() ?>