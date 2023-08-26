<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset;
use johnitvn\ajaxcrud\BulkButtonWidget;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\NewsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

//$this->title = 'Xác nhận tài khoản';
//$this->params['breadcrumbs'][] = ['name'=>$this->title,'link'=>'javascript:void(0)'];

CrudAsset::register($this);
?>

<?php if(Yii::$app->getSession()->hasFlash('success')): ?>
    <?php Yii::$app->getSession()->setFlash('success',null) ?>
    <div class="w3-content" style="max-width:1500px">

        <!-- Header -->
        <header class="w3-panel w3-center w3-opacity" style="padding:128px 16px">
            <h1><?=$message?></h1>
            <h1 class="w3-xlarge">Để tiếp tục, bạn hãy cập nhật mật khẩu theo đường dẫn sau!</h1>

            <div class="w3-padding-32">
                <a style="font-size: 16px;" href="<?= Yii::$app->urlManager->createUrl('site/index') ?>">Đăng nhập</a>
            </div>
        </header>

        <!-- Photo Grid -->
        <div class="w3-row-padding w3-grayscale" style="margin-bottom:128px">

        </div>
    </div>
<?php elseif (Yii::$app->getSession()->hasFlash('warning')): ?>
    <?php Yii::$app->getSession()->setFlash('warning',null) ?>

    <header class="w3-panel w3-center w3-opacity" style="padding:128px 16px">
        <h1 class="w3-xlarge"><?=$message?></h1>
    </header>
<?php endif; ?>

