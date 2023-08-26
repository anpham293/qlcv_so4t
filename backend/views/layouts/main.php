<?php use yii\helpers\Html;

\backend\assets\AppAsset::register($this);

$this->beginPage();
date_default_timezone_set("Asia/Ho_Chi_Minh");
$config = \common\models\Configure::getConfig();
//error_reporting( E_ERROR | E_PARSE | E_CORE_ERROR | E_CORE_WARNING | E_COMPILE_ERROR | E_COMPILE_WARNING );
?>
    <!DOCTYPE html>
    <!--[if IE 8]>
    <html lang="vi" class="ie8 no-js"> <![endif]-->
    <!--[if IE 9]>
    <html lang="vi" class="ie9 no-js"> <![endif]-->
    <!--[if !IE]><!-->
    <html lang="vi">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <?php
        /**
         * Created by PhpStorm.
         * User: HungLuongFamily
         * Date: 10/19/2015
         * Time: 9:42 AM
         */ ?>
        <meta charset="utf-8"/>
        <title><?php echo $this->title; ?></title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8">

        <meta content="" name="description"/>
        <meta content="" name="author"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php $this->head();
        ?>
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <script src="<?php echo Yii::$app->urlManager->baseUrl ?>/themes/js/jquery-1.11.3.min.js"></script>
        <!-- END:File Upload Plugin JS files-->
        <style>
            * {
                font-size: small;
                font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            }

            .modal-open .select2-dropdown {
                z-index: 10060;
            }

            .modal-open .select2-close-mask {
                z-index: 10055;
            }

            .select2-selection.select2-selection--single {
                height: 33px;
            !important;
            }

            .btfd span {
                font-size: 18px !important;

            }

            .btfd .glyphicon-print {
                font-size: 18px !important;

            }

            .select2-results__option strong {
                background-image: linear-gradient(
                        141deg, #6a3491 0%, #906d95 51%, #bfb09a 75%);
                color: white;
            }

            .width100 {
                width: 100% !important;
            }

            .progress {
                background: #e8e8e8
            }

            .ulcog {
                position: absolute;
                bottom: 0%;
                right: 60px;
                z-index: 10051;
                background: #9FDADA;
                text-align: center;
                width: 150px;
                padding-inline-start: 0px !important;
                border: 1px solid black;

            }

            .ulcog::before {
                position: absolute;
                height: 15px;
                width: 15px;
                transform: rotate(45deg);
                background-color: white;
                content: "";
                bottom: 30px;
                right: -8px;
                border-top: 1px solid black;
                border-right: 1px solid black;
            }

            .ulcog li {
                list-style: none;
                color: white;
                border: 2px solid white;
                width: 100%;
                padding: 7px;
            }

            td.skip-export.kv-align-center.kv-align-middle {
                position: relative;
            }
        </style>

        <?php if ($this->context->action->controller->id == "site" && $this->context->action->id == "index"): ?>
            <script src="<?php echo Yii::$app->urlManager->baseUrl ?>/themes/plugins/bootstrap/js/bootstrap.js"></script>
        <?php endif; ?>
        <link rel="shortcut icon" href="<?php echo Yii::$app->urlManagerFrontend->baseUrl ?>/logo.png"/>
        <script>

            function makeid() {
                var text = "";
                var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

                for (var i = 0; i < 5; i++)
                    text += possible.charAt(Math.floor(Math.random() * possible.length));

                return text;
            }

            $(document).ready(function () {

                function printPage(e, f, title) {
                    var w = window.open();


                    var field = $("#" + e).html();

                    var html = "<!DOCTYPE HTML>";
                    html += '<html lang="en-us">';
                    html += '<head><title>' + title + '</title><link href="/admin/themes/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet"><link href="/admin/css/mystyle.css" rel="stylesheet"><link href="/admin/themes/css/components.css" rel="stylesheet"><style>' +
                        '*{font-family: "Times New Roman"!important;}' +
                        'h2{text-transform: uppercase;font-weight: bold}' +
                        'h1{text-transform: uppercase;font-weight: bold;text-align: center}' +
                        '.name{font-weight: bold;text-align: center}' +
                        '.name1{margin-bottom: 100px}' +
                        '.width50{padding-left: 50%}' +
                        '.page-break{page-break-after: always;}#tablenguoibenh th{text-align: left;width: 100px!important;}' +
                        '</style></head>';

                    html += "<body style='padding: 0px 0px 0px 0px!important'><h2><?=$config['company_name']?></h2><p><?=$config['company_address']?><p><p>DT: <?=$config['company_phone']?><p><h1>" + title + "</h1>" + f + "</p>";

                    //check to see if they are null so "undefined" doesnt print on the page. <br>s optional, just to give space

                    if (field != null) html += field;

                    html += "<div class='width50'><p class='name name1'><?=$config['company_position']?></p><p class='name'><?=$config['company_ceo']?></p></div></body>";
                    w.document.write(html);
                    w.window.print();
                    w.document.close();
                }
                <?php if(Yii::$app->controller->id == 'mon' || Yii::$app->controller->id == 'loaimon'):?>
                $(document).on('keypress', 'input', function (e) {
                    if (e.which === 13) {
                        $('.modal-footer button[type="submit"]').click();
                    }
                });
                <?php endif;?>
                $.each($(".ttddd"), function (index, value) {
                    $(this).attr('id', makeid());
                });
                var ul;
                var statushidden = 0;
                var targethidden;


                $(document).on('click', '.indonthuoc', function () {
                    var dt = new Date();
                    console.log(dt);
                    var time = dt.toString().substr(0, 3) + " " + dt.getDate() + "/" + (dt.getMonth() + 1) + "/" + dt.getFullYear() + " " + dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();
                    printPage("donthuocin", time, "ĐƠN THUỐC");
                });
                $(document).on("click", '#inso', function () {
                    var self = $(this);
                    printPage("divinsokhambenh", "", "SỔ KHÁM BỆNH " + self.attr("ten"));

                })
                $(document).on('input', '.form-md-floating-label .form-control', function () {
                    var self = $(this);
                    if (self.val() != "") {
                        self.addClass('edited');
                    } else {
                        self.removeClass('edited');
                    }
                });
                $(document).on('click', '.img-grid', function () {
                    var t = $(this);
                    $("#anh-img").attr('src', "<?php echo str_replace("/admin", "", Yii::$app->request->getBaseUrl())?>" + t.attr('vals'));
                });
                $(document).on('click', '.ttddd', function () {
                    if (statushidden == 1) {
                        ul.fadeOut(100);
                        statushidden = 0;
                        if ($(this).attr('id') != targethidden) {
                            targethidden = $(this).attr('id');
                            var self = $(this).parent();
                            ul = self.find('.ulcog');
                            ul.fadeIn(100);
                            statushidden = 1;

                        }
                    } else {
                        targethidden = $(this).attr('id');
                        var self = $(this).parent();
                        ul = self.find('.ulcog');
                        ul.fadeIn(100);
                        statushidden = 1;
                    }
                });

                $(document).click(function (event) {

                    if (event.target.id != targethidden) {
                        if (event.target.className != 'fa fa-cogs btn ttddd') {
                            if (statushidden == 1) {
                                statushidden = 0;
                                ul.fadeOut(100);
                            }
                        }
                    }
                });

                $('.timepicker-no-seconds').timepicker({
                    autoclose: true,
                    minuteStep: 5
                });
                // handle input group button click
                $('.timepicker').parent('.input-group').on('click', '.input-group-btn', function (e) {
                    e.preventDefault();
                    $(this).parent('.input-group').find('.timepicker').timepicker('showWidget');
                });
            });
            $(document).ready(function () {
                toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "positionClass": "toast-bottom-right",
                    "showDuration": "1000",
                    "timeOut": 5000,
                    "extendedTimeOut": 5000,
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut",
                    "escapeHtml": false
                };
            })
        </script>
        <?php
        /**
         * Created by PhpStorm.
         * User: HungLuongFamily
         * Date: 10/19/2015
         * Time: 9:43 AM
         */ ?>
        <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
        <!-- BEGIN CORE PLUGINS -->
        <!--[if lt IE 9]>

        <![endif]-->


        <script>

            function block(options) {
                var globalImgPath = "<?php echo Yii::$app->urlManager->baseUrl ?>" + '/themes/img/';

                options = $.extend(true, {}, options);
                var html = '';
                if (options.animate) {
                    html = '<div class="loading-message ' + (options.boxed ? 'loading-message-boxed' : '') + '">' + '<div class="block-spinner-bar"><div class="bounce1"></div><div class="bounce2"></div><div class="bounce3"></div></div>' + '</div>';
                } else if (options.iconOnly) {
                    html = '<div class="loading-message ' + (options.boxed ? 'loading-message-boxed' : '') + '"><img src="' + globalImgPath + 'loading-spinner-grey.gif" align=""></div>';
                } else if (options.textOnly) {
                    html = '<div class="loading-message ' + (options.boxed ? 'loading-message-boxed' : '') + '"><span>&nbsp;&nbsp;' + (options.message ? options.message : 'LOADING...') + '</span></div>';
                } else {
                    html = '<div class="loading-message ' + (options.boxed ? 'loading-message-boxed' : '') + '"><img src="' + globalImgPath + 'loading-spinner-grey.gif" align=""><span>&nbsp;&nbsp;' + (options.message ? options.message : 'LOADING...') + '</span></div>';
                }

                if (options.target) { // element blocking
                    var el = $(options.target);
                    if (el.height() <= ($(window).height())) {
                        options.cenrerY = true;
                    }
                    el.block({
                        message: html,
                        baseZ: options.zIndex ? options.zIndex : 1000,
                        centerY: options.cenrerY !== undefined ? options.cenrerY : false,
                        css: {
                            top: '10%',
                            border: '0',
                            padding: '0',
                            backgroundColor: 'none'
                        },
                        overlayCSS: {
                            backgroundColor: options.overlayColor ? options.overlayColor : '#555',
                            opacity: options.boxed ? 0.05 : 0.1,
                            cursor: 'wait'
                        }
                    });
                } else { // page blocking
                    $.blockUI({
                        message: html,
                        baseZ: options.zIndex ? options.zIndex : 1000,
                        css: {
                            border: '0',
                            padding: '0',
                            backgroundColor: 'none'
                        },
                        overlayCSS: {
                            backgroundColor: options.overlayColor ? options.overlayColor : '#555',
                            opacity: options.boxed ? 0.05 : 0.1,
                            cursor: 'wait'
                        }
                    });
                }
            }

            function unblock(target) {
                if (target) {
                    $(target).unblock({
                        onUnblock: function () {
                            $(target).css('position', '');
                            $(target).css('zoom', '');
                        }
                    });
                } else {
                    $.unblockUI();
                }
            }

            jQuery(document).ready(function () {
                Metronic.init(); // init metronic core components
                Layout.init(); // init current layout
                QuickSidebar.init(); // init quick sidebar
                $(".tien-te").maskMoney({thousands: ".", allowZero: true, /*suffix: " £",*/precision: 0});

            });
            $('#printButton').on('click', function () {
                $('#body-in-bbbg').printElement();
            });
            /*$('.modal').on('shown.bs.modal', function() {

             });*/
            $(document).ready(function () {
                $('.phanquyen').on('click', function () {
                    var role = $(this).attr('name');
                    var permission = $(this).attr('value');
                    var check = $(this).is(":checked");
                    $.ajax({
                        type: 'post',
                        url: '<?php echo Yii::$app->urlManager->createUrl('rbac/update_permission') ?>',
                        data: {rolez: role, permissionz: permission, checkz: check},

                        success: function (output) {

                        }
                    });
                });

                $('.phanquyenall').on('click', function () {
                    var role = $(this).attr('name');
                    var permission = $(this).attr('value');
                    var check = $(this).is(":checked");
                    $.ajax({
                        type: 'post',
                        url: '<?php echo Yii::$app->urlManager->createUrl('rbac/update_permission') ?>',
                        data: {roleall: role, controller: permission, checkall: check},

                        success: function (output) {
                            $('.phanquyen').each(function () {
                                var name = $(this).attr('name');
                                if (name == role) {
                                    var val = $(this).val();
                                    var matchstr = '^' + permission + '\/';
                                    if (val.match(matchstr))
                                        $(this).prop('checked', (output === '1'))
                                }
                            })
                        }
                    });
                });


                $('.phanvaitro').on('click', function () {
                    var role = $(this).attr('name');
                    var user = $(this).attr('value');
                    var check = $(this).is(":checked");
                    $.ajax({
                        type: 'post',
                        url: '<?php echo Yii::$app->urlManager->createUrl('rbac/user_role') ?>',
                        data: {rolez: role, user: user, checkz: check},

                        success: function (output) {

                        }
                    });
                })
            })

        </script>

        <?php date_default_timezone_set('Asia/Ho_Chi_Minh'); ?>
    </head>
    <!-- END HEAD -->
    <!-- BEGIN BODY -->

    <body class="page-header-fixed page-quick-sidebar-over-content page-sidebar-closed-hide-logo page-container-bg-solid page-sidebar-closed">
    <?php $this->beginBody(); ?>

    <div class="page-header -i navbar navbar-fixed-top">
        <!-- BEGIN HEADER INNER -->
        <div class="page-header-inner">
            <!-- BEGIN LOGO -->
            <div class="page-logo" style="overflow: hidden;">
                <a href="<?= Yii::$app->urlManager->baseUrl ?>">
                    <img src="/images/logo/logo-techber-wihte.png" alt="logo"
                         class="logo-default" style="height: 55px; margin: 0"/>
                </a>
                <div class="menu-toggler sidebar-toggler hide">
                </div>
            </div>
            <!-- END LOGO -->
            <!-- BEGIN RESPONSIVE MENU TOGGLER -->
            <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse"
               data-target=".navbar-collapse">
            </a>
            <!-- END RESPONSIVE MENU TOGGLER -->
            <!-- BEGIN TOP NAVIGATION MENU -->
            <div class="top-menu" id="topmenu">
                <?= Yii::$app->controller->renderPartial("//site/notification"); ?>
            </div>
            <script>
                $(document).ready(function () {
                    setInterval(function () {
                        $.ajax({
                            url:"<?=Yii::$app->urlManager->createUrl(['site/notification'])?>",
                            dataType:"json",
                            type:"POST",
                            success:function (datas) {
                                $.each(datas,function (index,value) {
                                    var data=value;
                                    console.log(data);
                                    $("#appends").prepend('<li style="background:#d6fdd3"><a class="updateseen" targets="'+data.id+'" href="'+data.url+'">' +
                                        '<span class="subject"><span class="from">'+data.sendername+' </span>' +
                                        '<span class="time">'+data.time+' </span>' +
                                        '</span><span class="message">' +
                                        ''+data.content+'</span></a></li>');
                                    toastr["info"]('<a class="updateseen" targets="'+data.id+'" href="'+data.url+'" style="padding:10px;background:#ffffff1f;display:block;"><span class="subject"><span class="time">'+data.time+'</span> </span><span class="message">'+data.content+'</span></a>', data.type);
                                    $.ajax({
                                        url:"<?=Yii::$app->urlManager->createUrl(['site/updatesent'])?>",
                                        data:{
                                            id:data.id
                                        },
                                        type:"post"
                                    })
                                });
                                var countnoti = parseInt($("#countnoti").html());
                                countnoti+=datas.length;
                                $("#countnoti").html(countnoti);
                                $("#countnoti2").html(countnoti);
                            }
                        })
                    }, 5000);
                })
            </script>
            <!-- END TOP NAVIGATION MENU -->
        </div>
        <!-- END HEADER INNER -->
    </div>
    <div class="clearfix">
    </div>
    <!-- BEGIN CONTAINER -->
    <div class="page-container">
        <!-- BEGIN SIDEBAR -->
        <div class="page-sidebar-wrapper">
            <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
            <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
            <div class="page-sidebar navbar-collapse collapse" data-auto-speed="200">
                <!-- BEGIN SIDEBAR MENU -->
                <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
                <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
                <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
                <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
                <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                <?php echo Yii::$app->view->render('menu') ?>
                <!-- END SIDEBAR MENU -->
            </div>
        </div>
        <!-- END SIDEBAR -->
        <!-- BEGIN CONTENT -->
        <div class="page-content-wrapper">
            <div class="page-content">
                <!-- BEGIN PAGE HEADER-->
                <div class="page-bar">
                    <ul class="page-breadcrumb">
                        <li>
                            <i class="fa fa-home"></i>
                            <a href="<?php echo Yii::$app->urlManager->baseUrl; ?>">Home</a>
                            <?php if (isset($this->params['breadcrumbs'])) : ?>
                            <i class="fa fa-angle-right"></i>
                        </li>

                        <li>
                            <?php foreach ($this->params['breadcrumbs'] as $index => $value): ?>
                                <a href="<?php echo $value['link'] ?>"><?php echo $value['name'] ?></a>
                                <?php if ($index + 1 < count($this->params['breadcrumbs'])): ?>
                                    <i class="fa fa-angle-right"></i>
                                <?php endif; ?>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </li>

                    </ul>
                </div>
                <?php if ($this->title != ""): ?>
                    <h3 class="page-title" id="pagetitle">
                        <?php echo $this->title; ?>
                        <small></small>
                    </h3>
                <?php endif; ?>
                <!--        <div class="loading"> <span>Đang tải dữ liệu...</span></div>-->
                <?php echo $content; ?>

                <div class="clearfix"></div>
                <!-- END PAGE HEADER-->
            </div>
        </div>
        <!-- END CONTENT -->
        <!-- BEGIN QUICK SIDEBAR -->
        <a href="javascript:;" class="page-quick-sidebar-toggler"><i class="icon-close"></i></a>
        <!-- END QUICK SIDEBAR -->
    </div>

    <!-- BEGIN FOOTER -->
    <div class="page-footer">
        <div class="page-footer-inner">
            2022 - 2023 - <?php echo Html::a('Techber Việt Nam', '#') ?>
        </div>
        <div class="scroll-to-top">
            <i class="icon-arrow-up"></i>
        </div>
    </div>
    <!-- END FOOTER -->

    <?php $this->endBody(); ?>
    <div class="hidden" id="temspss">

    </div>
    <script>
        $.ajaxSetup({
            data: <?= \yii\helpers\Json::encode([
                \yii::$app->request->csrfParam => \yii::$app->request->csrfToken,
            ]) ?>
        });

    </script>

    </body>

    <!-- END BODY -->
    </html>
<?php $this->endPage(); ?>