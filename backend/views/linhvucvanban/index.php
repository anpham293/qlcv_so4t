<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset; 
use johnitvn\ajaxcrud\BulkButtonWidget;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\LinhvucvanbanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Chi tiết kê khai';
$this->params['breadcrumbs'][] = ['name'=>$this->title,'link'=>'javascript:void(0)'];

CrudAsset::register($this);

?>
<div class="row">
    <div class="col-md-12">
        <div class="tabbable-line tabbable-full-width">
            <ul class="nav nav-tabs">
                <li class="active">
                    <a data-toggle="tab" href="#tab_1_2">
                        Lĩnh vực Hồ sơ sức khỏe
                    </a>
                </li>
                <li>
                    <a data-toggle="tab" href="#tab_1_3">
                        Loại Hồ sơ sức khỏe hành chính
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="col-md-12" style="margin-top: 15px">
        <div class="tab-content">
            <div id="tab_1_2" class="tab-pane active">
                <div class="row">
                    <div class="col-md-12">
                        <?= Yii::$app->controller->renderPartial('linhvucvanban', [
                            'searchModel' => $searchModel,
                            'dataProvider' => $dataProvider,
                        ]); ?>
                    </div>
                </div>
            </div>
            <!--end tab-pane-->
            <div id="tab_1_3" class="tab-pane">
                <div class="row">
                    <div class="col-md-12">
                        <?= Yii::$app->controller->renderPartial('loaivbhc', [
                            'searchModel' => $loaivbhcSearchModel,
                            'dataProvider' => $loaivbhcDataProvider,
                        ]); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php Modal::begin([
    "id"=>"ajaxCrudModal",
    "footer"=>"",// always need it for jquery plugin
])?>
<?php Modal::end(); ?>
