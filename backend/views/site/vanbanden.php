<?php

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\KhachhangSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
use johnitvn\ajaxcrud\CrudAsset;
use yii\bootstrap\Modal;
use yii\helpers\Html;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\BulkButtonWidget;

CrudAsset::register($this);
$this->title = 'Bảng quản trị';
date_default_timezone_set("Asia/Ho_Chi_Minh");
$now = date_format(date_create(), 'd/m/Y');

?>
<div class="vanban-index">
    <div id="ajaxCrudDatatable">
        <?=GridView::widget([
            'id'=>'crud-datatable',
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,'responsiveWrap'=>false,
            'pjax'=>true,
            'columns' => require(__DIR__.'/_columnsvanbanden.php'),
            'toolbar'=> [
                ['content'=>

                    Html::a('<i class="glyphicon glyphicon-repeat"></i>', [''],
                        ['data-pjax'=>1, 'class'=>'btn btn-default', 'title'=>'Reset Grid']).
                    '{toggleData}'.
                    '{export}'
                ],
            ],
            'striped' => true,
            'condensed' => true,
            'responsive' => true,
            'panel' => [
                'type' => 'primary',
                'heading' => '<i class="glyphicon glyphicon-list"></i> Danh sách Hồ sơ sức khỏe đi',
                'before'=>'<em>* Thay đổi khoảng cách các cột bằng cách kéo thả các cạnh.</em>',
                'after'=>
                    '<div class="clearfix"></div>',
            ]
        ])?>
    </div>
</div>
<?php Modal::begin([
    "id"=>"ajaxCrudModal",
    "footer"=>"",// always need it for jquery plugin
    'options' => ["data-backdrop" => "static", "data-keyboard" => "false", 'tabindex' => false],
])?>
<?php Modal::end(); ?>
