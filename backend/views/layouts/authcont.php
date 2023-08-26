<?php use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use yii\helpers\BaseHtml;

\backend\assets\ConfirmAsset::register($this);
$this->beginPage();
error_reporting( E_ERROR | E_PARSE | E_CORE_ERROR | E_CORE_WARNING | E_COMPILE_ERROR | E_COMPILE_WARNING );
?>
    <!DOCTYPE html>
    <!--[if IE 8]> <html lang="vi" class="ie8 no-js"> <![endif]-->
    <!--[if IE 9]> <html lang="vi" class="ie9 no-js"> <![endif]-->
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
        <?php $this->head(); ?>

        <?php date_default_timezone_set('Asia/Ho_Chi_Minh');?>
    </head>
    <!-- END HEAD -->
    <!-- BEGIN BODY -->

    <body>
    <?php $this->beginBody();?>
    <div class="container">
        <?php echo $content; ?>
    </div>
    <?php $this->endBody();?>

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
<?php $this->endPage();?>