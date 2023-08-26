<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset;
use johnitvn\ajaxcrud\BulkButtonWidget;
use common\models\Loaivbhc;
use common\models\Linhvucvanban;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\CoquanbanhanhSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Chi tiết kê khai';
$this->params['breadcrumbs'][] = ['name' => $this->title, 'link' => 'javascript:void(0)'];

CrudAsset::register($this);

?>
<div class="row">
    <div class="col-md-12">
        <div class="tabbable-line tabbable-full-width">
            <ul class="nav nav-tabs">
                <li>
                    <a data-toggle="tab" href="#tab_1_1">
                        Bộ phận xử lý Hồ sơ sức khỏe
                    </a>
                </li>
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
            <div id="tab_1_1" class="tab-pane">
                <div class="row">
                    <div class="col-md-12">
                        <?= Yii::$app->controller->renderPartial('coquanbanhanh', [
                            'searchModel' => $coquanbanhanhSearchModel,
                            'dataProvider' => $coquanbanhanhDataProvider,
                        ]); ?>
                    </div>
                </div>
            </div>
            <div id="tab_1_2" class="tab-pane active">
                <div class="row">
                    <div class="col-md-12">
                        <?= Yii::$app->controller->renderPartial('linhvucvanban', [
                            'searchModel' => $linhvucvanbanSearchModel,
                            'dataProvider' => $linhvucvanbanDataProvider,
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
    'options' => ["data-backdrop" => "static", "data-keyboard" => "false", 'tabindex' => false],
])?>
<?php Modal::end(); ?>
