<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

$config = \common\models\Configure::getConfig();
AppAsset::register($this);
\johnitvn\ajaxcrud\CrudAsset::register($this);
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html class=" js no-touch cssanimations cssgradients csstransforms csstransforms3d csstransitions video svg pointerevents placeholder"
          lang="vi">

    <head>
        <link rel="shortcut icon" href="--><?= Yii::$app->urlManager->baseUrl . $config['favicon'] ?>" type="image/png">
        <meta charset="utf-8">

        <!--[if IE]>
        <meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'/><![endif]-->
        <title>
            <?= $this->title ?>
        </title>
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
        <meta name="geo.region" content="VN-HP"/>
        <meta name="geo.placename" content="Hải Ph&ograve;ng"/>
        <meta name="geo.position" content="21;107"/>
        <meta name="ICBM" content="21, 107"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta property="og:image" content="<?= $this->context->og_image ?>">
        <meta property="og:url"
              content="<?php echo (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>">
        <meta property="og:site_name" content="DC Tech Team, DC Tech team, DC Tech TEAM">
        <meta property="og:description" content="<?php echo Yii::$app->controller->description; ?>">


        <!-- ================= Google Fonts ================== -->
        <script type="text/javascript" src="<?= Yii::$app->urlManager->baseUrl ?>/theme/js/jquery.js"></script>
        <link href="<?= Yii::$app->urlManager->baseUrl ?>/theme/css/bundle.scss.css?v=1203" rel="stylesheet"
              type="text/css"
              media="all">
        <script type="text/javascript" charset="utf-8" async="" data-requirecontext="_" data-requiremodule="underscore"
                src="<?= Yii::$app->urlManager->baseUrl ?>/theme/js/underscore-min.js?v=1203"></script>
        <script type="text/javascript" charset="utf-8" async="" data-requirecontext="_" data-requiremodule="Rx"
                src="<?= Yii::$app->urlManager->baseUrl ?>/theme/js/rx.all.min.js?v=1203"></script>
        <script type="text/javascript" charset="utf-8" async="" data-requirecontext="_" data-requiremodule="jqueryUI"
                src="<?= Yii::$app->urlManager->baseUrl ?>/theme/js/jquery-ui.min.js?v=1203"></script>
        <script type="text/javascript" charset="utf-8" async="" data-requirecontext="_" data-requiremodule="bizwebAPI"
                src="//hstatic.net/0/0/global/api.jquery.js"></script>
        <script type="text/javascript" charset="utf-8" async="" data-requirecontext="_"
                data-requiremodule="jquery_easing"
                src="<?= Yii::$app->urlManager->baseUrl ?>/theme/js/jquery_easing.js?v=1203"></script>
        <link rel="stylesheet" type="text/css" href="<?= Yii::$app->urlManager->baseUrl ?>/theme/css/jquery.raty.css"
              media="all">
        <style>
            #my-menu:not(.mm-menu) {
                display: none;
            }
            .modal-backdrop{display: none!important;}
            .modal-dialog {z-index: 1000!important;}
        </style>
        <script>
            window.fbAsyncInit = function () {
                FB.init({
                    appId: '520490461631158',
                    autoLogAppEvents: true,
                    xfbml: true,
                    version: 'v2.10'
                });
                FB.AppEvents.logPageView();
            };
            (function (d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) {
                    return;
                }
                js = d.createElement(s);
                js.id = id;
                js.src = "//connect.facebook.net/vi_VN/sdk.js";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
            var goUp = true;
            var end = null;
            var interval = null;
            function handle(delta) {
                var animationInterval = 10; //lower is faster
                var scrollSpeed = 1; //lower is faster
                if (end == null) {
                    end = $(window).scrollTop();
                }
                end -= 20 * delta;
                goUp = delta > 0;
                if (interval == null) {
                    interval = setInterval(function () {
                        var scrollTop = $(window).scrollTop();
                        var step = Math.round((end - scrollTop) / scrollSpeed);
                        if (scrollTop <= 0 ||
                            scrollTop >= $(window).prop("scrollHeight") - $(window).height() ||
                            goUp && step > -1 ||
                            !goUp && step < 1) {
                            clearInterval(interval);
                            interval = null;
                            end = null;
                        }
                        $(window).scrollTop(scrollTop + step);
                    }, animationInterval);
                }
            }
        </script>

        <!-- Global Site Tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-107716025-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());
            gtag('config', 'UA-107716025-1');
        </script>
        <script>
            (function (i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function () {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                    m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
            ga('create', 'UA-107716025-1', 'auto');
            ga('send', 'pageview');
        </script>
        <?php $this->head(); ?>
    </head>

    <body class="stretched no-transition device-lg page-header-fixed js">

    <?php $this->beginBody(); ?>
    <nav id="my-menu">
        <ul>
            <?= func::callMenu('null',\common\models\Menu::find()->where("type='top' and active=1")->orderBy('ord ASC')->all(),"");?>
        </ul>
    </nav>

    <div id="main">
        <div id="my-wrapper">
            <div id="my-header">
        <div class="header-bar hidden-lg-down hidden-sm hidden-xs">
            <div class="header-bar-inner">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-2">

                            <div class="topbar-left">
                                <i class="glyphicon glyphicon-earphone"></i>
                                <span>Tư vấn trực tiếp</span>
                                <a href="tel:<?= $config['contact_hotline'] ?>"><?= $config['contact_hotline'] ?></a>
                            </div>

                        </div>
                        <div class="col-md-6 col-sm-6 d-list col-xs-10 a-right">
                            <ul>

                                <li><a href="/"><?= $config['contact_slogan1'] ?></a></li>

                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <header class="header">
            <div class="ega-top-header visible-lg">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-2">
                            <div role="logo" class="ega-item-top-bar">

                                <h1 class="h1-no-margin-padding">
                                    <span style="display: none">medical</span>
                                    <a href="/" title="medical" style="text-decoration: none !important;">

                                        <img alt="logo"
                                             src="<?= Yii::$app->urlManager->baseUrl . $config['contact_logo'] ?>"
                                             class="ega-logo">

                                    </a>
                                </h1>


                            </div>
                        </div>
                        <div class="col-xs-8">
                            <!--menu-->
                            <div class="top-menu visible-lg">
                                <div class="navbar yamm navbar-default ega-menu-top">
                                    <div class="ega-container-header-sm">
                                        <div id="ega-menu-deiv-top">
                                            <ul class="nav navbar-nav">
                                                <?php foreach (\common\models\Menu::find()->where("type='top' and active=1 and parent IS NULL")->orderBy('ord ASC')->all() as $index => $value): ?>
                                                    <?php /** @var \common\models\Menu $value */ ?>

                                                    <?php $submenu = \common\models\Menu::find()->where('parent=' . $value->id . ' and active=1')->orderBy('ord ASC')->all(); ?>
                                                    <li <?php if (!empty($submenu)) echo 'class="dropdown yamm-fw ega-dropdown-menu "' ?>>
                                                        <?php /** @var \common\models\Menu $value */ ?>
                                                        <?php if (!empty($submenu)): ?>
                                                            <a href="#" title="<?= $value->name ?>"
                                                               data-toggle="dropdown"
                                                               class="dropdown-toggle visible-lg" aria-expanded="true">
                                                                <?= $value->name ?>
                                                                <b class="caret hidden-xs"></b>
                                                            </a>
                                                            <div class="visible-ega-table-xs ega-menu-xs-drop-down">
                                                                <a href="#" title="<?= $value->name ?>">
                                                                    <?= $value->name ?>
                                                                </a>
                                                                <a href="javascript:void(0)"
                                                                   class="ega-menu-right-down-ico">
					<span class="">
						<span class="glyphicon glyphicon-menu-down"></span>
					</span>
                                                                </a>
                                                            </div>


                                                            <ul class="dropdown-menu ega-menu-no-mega">

                                                                <?php foreach ($submenu as $indexsub => $valuesub): ?>
                                                                    <?php $submenu2 = \common\models\Menu::find()->where('parent=' . $valuesub->id . ' and active=1')->orderBy('ord ASC')->all(); ?>
                                                                    <?php if (!empty($submenu2)): ?>
                                                                        <li class="dropdown-submenu-2">
                                                                            <a href="<?php if (substr($valuesub->link, 0, 1) == "/") echo Yii::$app->urlManager->baseUrl . $valuesub->link; else echo $valuesub->link ?>"
                                                                               class="ega-sub-menu-a">
                                                                                <div>
                                                                                    <?= $valuesub->name ?>

                                                                                    <span class="caret-right"
                                                                                          style="float: right"></span>
                                                                                    <span class="glyphicon glyphicon-menu-right show-hide-table"></span>

                                                                                </div>
                                                                            </a>

                                                                            <ul class="dropdown-menu ega-menu-three ega-menu-no-mega">

                                                                                <?php foreach ($submenu2 as $index2 => $value2): ?>
                                                                                    <li>
                                                                                        <a title="<?= $value2->name ?>"
                                                                                           href="<?php if (substr($value2->link, 0, 1) == "/") echo Yii::$app->urlManager->baseUrl . $value2->link; else echo $value2->link ?>"
                                                                                           class="ega-sub-menu-a">
                                                                                            <div>
                                                                                                <?= $value2->name ?>
                                                                                            </div>
                                                                                        </a>
                                                                                    </li>
                                                                                <?php endforeach; ?>


                                                                            </ul>

                                                                        </li>
                                                                    <?php else: ?>
                                                                        <li class="dropdown-submenu-2">
                                                                            <a href="<?php if (substr($valuesub->link, 0, 1) == "/") echo Yii::$app->urlManager->baseUrl . $valuesub->link; else echo $valuesub->link ?>"
                                                                               class="ega-sub-menu-a">
                                                                                <div>
                                                                                    <?= $valuesub->name ?>
                                                                                </div>
                                                                            </a>

                                                                        </li>
                                                                    <?php endif; ?>
                                                                <?php endforeach; ?>

                                                            </ul>
                                                        <?php else: ?>
                                                            <a href="<?php if (substr($value->link, 0, 1) == "/") echo Yii::$app->urlManager->baseUrl . $value->link; else echo $value->link ?>"><?= $value->name ?></a>
                                                        <?php endif; ?>
                                                    </li>
                                                <?php endforeach; ?>

                                                <!--submenu-->


                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-2">

                            <button class="btn-request" data-toggle="modal" data-target="#myModal"><span>+</span>Yêu cầu
                                tư vấn
                            </button>

                            <!-- Top Search
        ============================================= -->


                        </div>
                    </div>
                </div>
            </div>
            <!--menu mb-->
            <div class="top-menu hidden-lg">
                <div class="navbar yamm navbar-default ega-menu-top">
                    <div class="ega-container-header-sm">
                        <div class="navbar-header hidden-lg">
                            <div class="row ega-xs-menu">
                                <div class="col-xs-3 ega-col-no-padding-xs">
                                    <a  class="navbar-toggle collapsed ega-menu-hambuger"
                                            id="ega-btn-menu-hambuger"  href="#my-menu">
                                        <span class="sr-only"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </a>
                                </div>
                                <div class="col-xs-6 text-center">
                                    <div role="logo">
                                        <a href="/">

                                            <img alt="logo"
                                                 src="<?= Yii::$app->urlManager->baseUrl . $config['contact_logo'] ?>"
                                                 class="ega-logo center-block">


                                        </a>
                                    </div>
                                </div>
                                <div class="col-xs-3 text-right ega-search-ico-xs">
                                    <button id="btn-click-search-xs" class="btn btn-sm ega-btn">

                                    </button>

                                </div>
                            </div>
                            <div class="hidden-lg">
                                <div class="row">
                                    <div class="col-xs-12">

                                        <form id="ega-search-xs-form" style="display: none" class="ega-form-search-top"
                                              role="search" method="get" action="/search">
                                            <div class="ega-div-top-search">
                                                <input autocomplete="off" name="q" type="search"
                                                       placeholder="Bạn muốn tìm gì?">

                                                </button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>

                        </div>
                        <div id="ega-menu-deiv-top-mb" class="navbar-collapse collapse">


                        </div>
                    </div>
                </div>
            </div>
        </header>
            </div>
            <div id="my-content">
                <?= $content;?>
            </div>

    <div id="my-footer">
        <div id="ega-footer" class="ega-footer">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <a href="/">
                            <img alt="footer logo" class="img-responsive" style="width: 70%"
                                 src="<?=Yii::$app->urlManager->baseUrl.$config['contact_logo']?>">
                        </a>
                        <p>
                        </p><h4><?=$config['contact_cname']?></h4><?=$config['contact_slogan2']?>

                        <p></p>
                        <ul class="bee-ul-social">

                            <li>
                                <a target="_blank" href="<?=$config['facebook_link']?>"><span
                                            class="bee-fb-icon"></span></a>
                            </li>


                            <li>
                                <a target="_blank" href="<?=$config['twitter_link']?>"><span class="bee-tw-icon"></span></a>
                            </li>


                            <li>
                                <a target="_blank" href="<?=$config['google_link']?>"><span class="bee-gg-icon"></span></a>
                            </li>


                            <li>
                                <a target="_blank" href="<?=$config['youtube_link']?>"><span class="bee-yt-icon"></span></a>
                            </li>

                        </ul>
                    </div>
                    <div class="col-sm-3 menu-col">
                        <div class="fb-page" data-href="<?=$config['footer_facebook']?>"
                             data-small-header="false" data-adapt-container-width="true" data-hide-cover="false"
                             data-show-facepile="true">
                            <blockquote cite="<?=$config['footer_facebook']?>" class="fb-xfbml-parse-ignore"><a
                                        href="<?=$config['footer_facebook']?>">Viettel Hải Phòng</a>
                            </blockquote>
                        </div>
                    </div>
                    <div class="col-sm-3 menu-col">
                        <div class="footer-list">
                            <h4 class="ega-ft-toggle-xs hidden-xs">
                                TIN TỨC
                            </h4>
                            <ul class="ega-list-menu">
								<?php foreach (\common\models\News::find()->where('active=1')->orderBy('id desc')->limit(4)->all() as $new):/** @var \common\models\News $new */?>
									<li style="padding: 5px 0; border-top: 1px solid #ddd"><a title="<?=$new->title?>" href="<?=Yii::$app->urlManager->createUrl(['site/news','catname'=>func::taoduongdan($new->catNew->name),'url'=>$new->url,'id'=>$new->id])?>"><?=$new->title?></a></li>
								<?php endforeach;?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <h4 class="ega-ft-toggle-xs" style="font-weight: bold">LIÊN HỆ</h4>
                        <address>
                            <p style="height: 50px; font-weight: bold">
                                <span><i class="fa fa-book" style="padding-right:20px;color: #00918d;font-size: 28px!important;"></i></span>
                                <span>Địa chỉ: <?=$config['contact_address']?></span>
                            </p>

                            <p style="height: 50px; font-weight: bold">
                                <span><i class="fa fa-phone-square" style="padding-right:20px;color: #00918d;font-size: 28px!important;"></i></span>
                                <span>Hotline: <?=$config['contact_hotline']?></span>
                            </p>
                            <p style="height: 50px; font-weight: bold">
                                <span><i class="fa fa-mail-forward" style="padding-right:20px;color: #00918d;font-size: 28px!important;"></i></span>
                                <span>Email: <?=$config['contact_email']?></span>
                            </p>
                        </address>
                    </div>
                </div>
            </div>
        </div>

        <footer class="ega-footer-copyright">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-5 ega-footer-cp-right">
                        <h5 class="ega-cpyright">
                            <div class="inline-dsk">
                                © Bản quyền thuộc về <a href="/" rel="nofollow"
                                                        target="_blank"><?=$config['contact_cname']?></a>
                            </div>
                            <div class="inline-dsk hidden-xs"> |</div>
                            <div class="inline-dsk">
                               <?=$config['footer_certificate']?>
                            </div>
                        </h5>
                    </div>
                    <div class="col-md-7 hidden-xs text-right">

                        <div class="">
                            <?=$config['contact_cname']?>
                        </div>
                        <div class="">
                            <?=$config['contact_address']?>
                        </div>
                        <div class="">
                            Hotline tổng đài hỗ trợ 18008000
                        </div>
                        <div class="">
                            <?=$config['contact_hotline']?> | <?=$config['contact_email']?>
                        </div>

                    </div>
                </div>
            </div>
        </footer>
            </div>
        </div>
    </div>

    <div id="cart-bottom" style="display: none;">

    </div>

    <!--template for cart-->
    <script type="text/html" id="tpl-cart">
        <div class="ega-mini-cart-parent-detail" style="display: none" id="mini-cart-detail">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-9">
                        <div class="ega-mini-cart-scroll">
                            <table class="ega-mini-cart-table hidden-xs">
                                <thead>
                                <tr>
                                    <th>
                                        <b>
                                            <%= items.length %>
                                        </b>
                                        sản phẩm
                                    </th>
                                    <th>

                                    </th>
                                    <th>
                                        Số lượng
                                    </th>
                                    <th style="text-align: right">
                                        Thành tiền
                                    </th>
                                    <th>

                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <% _.each(items,function(item){ %>
                                <tr>
                                    <td role="img">
                                        <img src="<%= item.image ? item.image : window.NO_IMAGE %>">
                                    </td>
                                    <td>
                                        <a class="ega-cart-title-bag-a" href="<%=item.url%>" title="<%=item.title%>">
                                            <%=item.title%>
                                            <% if(item.variant_options){ %>
                                            <% if( !(item.variant_options.length == 1 &&
                                            item.variant_options[0].toString().toLowerCase() == 'default title')){ %>
                                            ( <%= item.variant_options.join("/") %> )
                                            <% }%>
                                            <% }%>
                                        </a>

                                    </td>
                                    <td style="width: 20%">
                                        <div class="input-group" style="width: 120px">
                                            <div class="input-group-addon ega-min-cart-minus"
                                                 data-id="<%=item.variant_id %>">-
                                            </div>
                                            <input type="text" class="form-control text-center ega-input-disabled"
                                                   value="<%=item.quantity%>" disabled>
                                            <div class="input-group-addon ega-min-cart-plus"
                                                 data-id="<%=item.variant_id %>">+
                                            </div>
                                        </div>
                                    </td>
                                    <td style="text-align: right" class="ega-main-color">
                                        <%= Haravan.formatMoney( parseFloat(item.price)*parseFloat(item.quantity) ,
                                        "{{amount}}₫") %>
                                    </td>
                                    <td>
                                        <a href="javascript:void(0)"
                                           class="ega-e-remove-cart-item"
                                           data-id="<%=item.variant_id ? item.variant_id : item.id%>">
                                            Xóa
                                        </a>
                                    </td>
                                </tr>
                                <% }) %>
                                </tbody>
                            </table>
                            <!--visible xs-->
                            <div class="visible-xs">
                                <div class="ega-cart-bottom-xs-container">
                                    <% _.each(items,function(item){ %>
                                    <div role="row">
                                        <div>
                                            <img style="max-width: 100px"
                                                 src="<%= item.image ? item.image : window.NO_IMAGE%>">
                                        </div>
                                        <div role="width40">
                                            <div style="color: #333; margin-bottom: 3px;">
                                                <a class="ega-cart-title-bag-a" href="<%=item.url%>"
                                                   title="<%=item.title%>">
                                                    <%=item.title%>

                                                </a>
                                            </div>
                                            <div>
                                                <div class="input-group" style="width: 120px">
                                                    <div class="input-group-addon ega-min-cart-minus"
                                                         data-id="<%=item.variant_id %>">-
                                                    </div>
                                                    <input type="text"
                                                           class="form-control text-center ega-input-disabled"
                                                           value="<%=item.quantity%>" disabled>
                                                    <div class="input-group-addon ega-min-cart-plus"
                                                         data-id="<%=item.variant_id %>">+
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="ega-main-color">
                                                <%= Haravan.formatMoney(
                                                parseFloat(item.price)*parseFloat(item.quantity) , "{{amount}}₫") %>
                                            </div>
                                            <a href="javascript:void(0)"
                                               class="ega-e-remove-cart-item"
                                               data-id="<%=item.variant_id ? item.variant_id : item.id%>">
                                                Xóa
                                            </a>
                                        </div>
                                    </div>
                                    <% }) %>
                                </div>
                            </div>
                            <!--end xs-->
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-3">
                        <hr class="visible-xs" style="margin: 1px"/>
                        <div>
                            <div>
                                <a href="/cart" title="cart" class="ega-mini-cart-a-cart ega-mini-cart-a-cart-xs-tb">
                                    <div class="ega-main-color" style="margin-bottom: 5px">
                                        <%= Haravan.formatMoney( parseFloat(total) , "{{amount}}₫")%>
                                    </div>
                                    <div>
                                    <span class="btn btn-primary">
                                        ĐẶT HÀNG
                                    </span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <a href="javascript:void(0)" class="ega-mini-cart-less">
                    Thu gọn
                    <span class="glyphicon glyphicon-chevron-down" style="position: relative; top:3px;"></span>

                </a>
            </div>
        </div>
        <!--bottom-->
        <div class="container" id="mini-cart-less-info">
            <div class="row ega-row-bottom-cart">
                <div class="col-xs-4 col-sm-6 col-md-7 ega-cart-item-container">
                    <ul class="ega-ul-mini-cart">
                        <% _.each(items,function(item){ %>
                        <li>
                            <a href="<%= item.url %>" title="<%=item.title%>" class="ega-mini-cart-item">
                                <div role="img">
                                    <img class="ega-mini-cart-img" src="<%=item.image ? item.image : window.NO_IMAGE%>">
                                </div>
                                <div role="info" class="hidden-xs">
                                    <div class="ega-mini-cart-text-in">
                                        <%=item.title%>
                                    </div>
                                    <div class="ega-main-color">
                                        <%= Haravan.formatMoney( parseFloat(item.price) , "{{amount}}₫")%>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <% }) %>
                    </ul>
                </div>
                <div class="col-xs-2 col-sm-2 col-md-2 text-right ega-col-no-padding-xs">
                    <a href="javascript:void(0)" class="ega-mini-cart-more">
                        <span class="hidden-xs hidden-sm">Xem đầy đủ</span>

                        <span class="glyphicon glyphicon-chevron-up ega-cart-btt-arrow-xs"></span>
                        <span class="visible-xs" style="font-size: 13px"><%=numberItem%>sp</span>
                    </a>
                </div>
                <div class="col-xs-6 col-sm-4 col-md-3 text-right">
                    <a href="/cart" title="cart" class="ega-mini-cart-a-cart ega-minicart-xs-btt">
                    <span style="color:#fff">
                        <%= Haravan.formatMoney(parseFloat(total),"{{amount}}₫") %>
                    </span>
                        <span class="btn btn-primary ega-btn-cart-bottom-xs">
                        ĐẶT HÀNG
                    </span>
                    </a>
                </div>

            </div>
        </div>
    </script>


    <!--modal add cart susses-->
    <style>
        #search_suggestion {
            padding: 0 0 10px 0;
            color: #555;
            position: absolute;
            top: 0;
            z-index: 9999;
            min-width: 300px;
            max-width: 600px;
            background-color: #f8f8f8;
            display: none;
        }

        #search_suggestion h3 {
            margin: 0;
            font-size: 16px;
            font-weight: bold;
            background-color: #eaeaea;
            padding: 5px;
        }

        #search_suggestion ul {
            padding: 0;
        }

        #search_suggestion ul li {
            background-color: #fff;
            padding: 5px;
            font-size: 14px;
        }

        #search_suggestion ul li:hover {
            background-color: #f2f2f2;
        }

        #search_suggestion ul li a {
            color: #787878;
            display: block;
            overflow: hidden;
        }

        #search_suggestion ul li .item_image {
            text-align: center;
            float: left;
            width: 100px;
            margin-right: 5px;
            margin-top: 10px;

        }

        #search_suggestion ul li .item_image img {
            max-width: 100%;

        }

        #search_suggestion ul li .item_detail {
            overflow: hidden;
        }

        #search_suggestion ul li .item_title h4 {
            text-transform: none;
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 0;
        }

        #search_suggestion ul li .item_price ins {
            font-weight: bold;
            text-decoration: none;
            display: inline-block;
            margin-right: 5px;
        }

        #search_top {
            max-height: 400px;
            overflow-y: auto;
        }

        #search_bottom {
            text-align: center;
            padding-top: 10px;
        }

        #search_bottom a {
            color: #444;
            text-decoration: underline;
            font-weight: bold;
        }

        #search_bottom a span {
            color: #ff0000;
        }

    </style>

	<div id="module11" class="hidden-lg">
		<div class="hotline-footer-made-by-kg">
			<div class="hot-phone">
				<div class="number-phone">
					<a title="Đường dây nóng"
					   href="tel:<?= $config['contact_hotline'] ?>"><?= $config['contact_hotline'] ?></a>
					<div class="hotline_txt">Hotline kinh doanh</div>
				</div>
			</div>
		</div>
	</div>
	
	<style>
		.hotline-footer-made-by-kg
		{     
			position: fixed;
			bottom: 2%;
			left: 2%;
			z-index: 999;
			/*background: #00918d5e;*/
			background-color: #00918d;
			padding: 7px 10px;
			color: #00918d;
			border-radius: 38px;
			border: 1px solid #00918d;
		}
		.hotline-footer-made-by-kg .hot-phone
		{  
			position: relative;
		}
		.hotline-footer-made-by-kg .hot-phone .number-phone
		{  
			vertical-align: middle;  
			display:inline-block;
		}
		.hotline-footer-made-by-kg .hot-phone a
		{  
			/*color: #00918d;  */
			color: white;
			vertical-align: middle;  
			font-size: 24px;  
			padding-left: 15px;  
			padding-right: 20px;  
			font-weight: bold;
		}
		.hotline-footer-made-by-kg .hot-phone .hotline_txt
		{ 
			text-align: center;
			color: white!important;
		}
	</style>

    <div id="view-request" class="hidden-lg" data-toggle="modal" data-target="#myModal">
        <img src="/phone_green_bold.gif" style="width: 150%;"
             alt="request_form_icon.png">
    </div>
    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-header"></div>
            <!-- Modal content-->
            <div class="modal-content">
                <button type="button" class="close-popup" data-dismiss="modal">×</button>
                <div class="modal-body">
                    <div id="request-form-popup" class="title-line">
                        <h4>LIÊN HỆ TƯ VẤN TRỰC TIẾP</h4>
                        <h4><a href="tel:<?=$config['contact_hotline']?>">Hotline: <?=$config['contact_hotline']?></a></h4>
                            <h4><?=$config['contact_slogan2']?></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Go To Top
    ============================================= -->
    <div id="gotoTop" class="glyphicon glyphicon-menu-up"></div>

    <script type="text/javascript">
        <!--                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    -->
    </script><!--
    Theme Information
--------------------------------------
    Theme ID: EGA Medical
    Version: v1.0.1_20171128
    Company: EGANY
    Developer: Do.Nguyen
---------------------------------------
-->
    <noscript><i>Javascript required</i></noscript>
    <div id="ui-datepicker-div"
         class="ui-datepicker ui-widget ui-widget-content ui-helper-clearfix ui-corner-all"></div>
    <script>
        (function ($) {
            Drupal.behaviors.lazyloader = {
                attach: function (context, settings) {
                    $("img[data-src]").lazyloader({distance: 0, icon: "" });
                }
            };
        }(jQuery));
    </script>

    <script>
        $(document).ready(function () {
            var API = $("#my-menu").data( "mmenu" );
            $("#ega-btn-menu-hambuger").click(function() {
                API.open();
            });
            var API2 = $("#my-menu").data( "mmenu" );
            $("#ega-btn-menu-hambuger").click(function() {
                API2.close();
            });
            $("#my-menu").mmenu();
        })
    </script>
    <?php $this->endBody() ?>
    </body>

    </html>
<?php $this->endPage() ?>