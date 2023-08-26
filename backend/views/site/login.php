<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = ['name'=>$this->title,'link'=>'javascript:void(0)'];
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="vi" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="vi" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="vi">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8"/>
    <title>Phần mềm quản lý công việc</title>
    <link rel="icon" type="image/x-icon" href="/images/favicon/huy-hieu-vn.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <meta content="" name="description"/>
    <meta content="" name="author"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="<?php echo Yii::$app->urlManager->baseUrl?>/themes/css/font.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo Yii::$app->urlManager->baseUrl?>/themes/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo Yii::$app->urlManager->baseUrl?>/themes/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo Yii::$app->urlManager->baseUrl?>/themes/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo Yii::$app->urlManager->baseUrl?>/themes/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="<?php echo Yii::$app->urlManager->baseUrl?>/themes/plugins/select2/select2.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo Yii::$app->urlManager->baseUrl?>/themes/admin/pages/css/login-soft.css" rel="stylesheet" type="text/css"/>
    <!-- END PAGE LEVEL SCRIPTS -->
    <!-- BEGIN THEME STYLES -->
    <link href="<?php echo Yii::$app->urlManager->baseUrl?>/themes/css/components.css" id="style_components" rel="stylesheet" type="text/css"/>
    <link href="<?php echo Yii::$app->urlManager->baseUrl?>/themes/css/style.css" id="style_components" rel="stylesheet" type="text/css"/>
    <link href="<?php echo Yii::$app->urlManager->baseUrl?>/themes/css/plugins.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo Yii::$app->urlManager->baseUrl?>/themes/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
    <link id="style_color" href="<?php echo Yii::$app->urlManager->baseUrl?>/themes/admin/layout/css/themes/darkblue.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo Yii::$app->urlManager->baseUrl?>/themes/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
    <!-- END THEME STYLES -->
    <link rel="shortcut icon" href="<?php echo Yii::$app->urlManager->baseUrl?>/themes/favicon.ico"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="login">
<!-- BEGIN LOGO -->

<!-- END LOGO -->
<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
<div class="menu-toggler sidebar-toggler">
</div>
<!-- END SIDEBAR TOGGLER BUTTON -->
<!-- BEGIN LOGIN -->
<!--<h1 style="font-size: 180px;font-weight: 600;color:#f5f5f5;text-transform: uppercase; text-align: center;text-shadow: 0 0 10px white">Hệ thống bảo trì</h1>-->
<div class="content" style="margin-left: 0;height: 100vh;background: #318da58a">
    <!-- BEGIN LOGIN FORM -->
    <div style="text-align: center">
        <!--        <img src="/Viettel_logo_2021.svg" style="height: 80px;margin-top: 40px;">-->


        <h1 style="text-transform: uppercase;color: #f5f5f5; text-align: center;text-shadow: 2px 2px #f5f5f5;font-weight: bold;margin-top: 15px; margin-bottom: 40px;
        font-size: 17px;
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;">Sở thông tin và truyền thông Hải Dương</br></h1>

        <h3 style="text-transform: uppercase;color: #f5f5f5; text-align: center;text-shadow: 2px 2px #f5f5f5;font-weight: bold;margin-top: 15px;
  -webkit-background-clip: text; font-size: 40px;
  -webkit-text-fill-color: transparent; margin-bottom: 40px">phần mềm quản lý công việc</br></h3>

    </div>
    <div>

        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
        <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
        <?= $form->field($model, 'password')->passwordInput() ?>
        <div class="form-group" style="text-align: right">
            <?= Html::submitButton('Đăng nhập', ['class' => 'btn btn-primary','style'=>'display:block;width:100%', 'name' => 'login-button']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>

    <div>
        <div class="col-md-12" style="text-align: center">
            <img src="/images/logo/logo-techber-wihte.png" style="width: 100%">
        </div>

        <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>
    <!-- BEGIN FORGOT PASSWORD FORM -->

    <!-- END FORGOT PASSWORD FORM -->
</div>
<!-- END LOGIN -->

<div id="ketqua">
    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header</h4>
                </div>
                <div class="modal-body">
                    <p></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- BEGIN COPYRIGHT -->

<!-- END COPYRIGHT -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="<?php echo Yii::$app->urlManager->baseUrl?>/themes/plugins/respond.min.js"></script>
<script src="<?php echo Yii::$app->urlManager->baseUrl?>/themes/plugins/excanvas.min.js"></script>
<![endif]-->
<script src="<?php echo Yii::$app->urlManager->baseUrl?>/themes/plugins/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::$app->urlManager->baseUrl?>/themes/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::$app->urlManager->baseUrl?>/themes/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::$app->urlManager->baseUrl?>/themes/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::$app->urlManager->baseUrl?>/themes/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::$app->urlManager->baseUrl?>/themes/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->

<script src="<?php echo Yii::$app->urlManager->baseUrl?>/themes/plugins/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo Yii::$app->urlManager->baseUrl?>/themes/plugins/select2/select2.min.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<script>
    jQuery(document).ready(function() {

        $('#forget-password').click(function() {
            $('#login-form').hide();
            $('.forget-form').show();
        });

        $('#back-btn').click(function() {
            $('#login-form').show();
            $('.forget-form').hide();
        });

        $(document).on('click','#quen-matkhau', function () {
            $.ajax({
                type: 'post',
                url: '<?php echo Yii::$app->urlManager->createUrl('site/request-password-reset') ?>',
                data: {email: $('input[name="email"]').val()},
                success: function (data) {
                    $('#ketqua .modal-body>p').html(data)
                    $('#myModal').modal('show')
                }
            });
        })

        // init background slide images
        $.backstretch([
                "/admin/metronic8/demo10/assets/media/misc/page-bg.jpg"
            ], {
                fade: 1000,
                duration: 8000
            }
        );
    });
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>