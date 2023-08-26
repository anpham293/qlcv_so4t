<?php

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\KhachhangSearch */

/* @var $dataProvider yii\data\ActiveDataProvider */

use common\models\Admin;
use common\models\Dulieuhososuckhoe;
use common\models\Notice;
use common\models\Vanban;
use common\models\Vanbanden;
use common\models\Vanbandi;
use johnitvn\ajaxcrud\CrudAsset;
use yii\bootstrap\Modal;
use yii\helpers\Html;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\BulkButtonWidget;
use yii\helpers\Json;

CrudAsset::register($this);
$this->title = 'Tài chính';
date_default_timezone_set("Asia/Ho_Chi_Minh");
$now = date_format(date_create(), 'd/m/Y');
$d = Admin::findOne(Yii::$app->user->identity->id)->donvi_id;
?>



<div class="duan-index">
    <div id="ajaxCrudDatatable">
        <?=GridView::widget([
            'id'=>'crud-datatable',
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'responsiveWrap'=>false,
            'pjax'=>true,
            'columns' => require(__DIR__.'/_columns.php'),
            'toolbar'=> [
                ['content'=>

                    Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['duan/taichinh'],
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
                'heading' => '<i class="glyphicon glyphicon-list"></i> Danh sách Công việc',
                'before'=>'<em>* Thay đổi kích thước cột của bảng giống như bảng tính bằng cách kéo các cạnh cột.</em>',
                'after'=>BulkButtonWidget::widget([
                        'buttons'=>Html::a('Xóa tất cả',
                            ["bulkdelete"] ,
                            [
                                "class"=>"btn btn-danger btn-xs",
                                'role'=>'modal-remote-bulk',
                                'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                                'data-request-method'=>'post',
                                'data-confirm-title'=>'Bạn có chắc không?',
                                'data-confirm-message'=>'Bạn có chắc chắn muốn xóa mục này'
                            ]),
                    ]).
                    '<div class="clearfix"></div>',
            ]
        ])?>
    </div>
</div>
<?php Modal::begin([
    "id"=>"ajaxCrudModal",
    "footer"=>"",// always need it for jquery plugin
    'size'=>'modal-lg',
    'options' => ["data-backdrop" => "static", "data-keyboard" => "false", 'tabindex' => false],
])?>
<?php Modal::end(); ?>
