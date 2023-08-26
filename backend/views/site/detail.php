<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset;
use johnitvn\ajaxcrud\BulkButtonWidget;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\DuannSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Chi tiết Công việc: <strong style="font-size: 16px">'.$model->ten."</strong>";
$this->params['breadcrumbs'][] = ['name'=>$this->title,'link'=>'javascript:void(0)'];

CrudAsset::register($this);
/** @var \common\models\Duan $model */
?>
<div class="row">
    <div class="col-md-4 table-responsive">
        <table class="table table-striped table-hover table-bordered">
            <tr><th colspan="2">Thông tin Công việc</th></tr>
            <tr><th>Công việc</th><td><?=$model->ten?></td></tr>
            <tr><th>Thông tin</th><td><?=$model->mota?></td></tr>
            <tr><th>Người khởi tạo</th><td>
                    <?php $admin = \common\models\Admin::findOne($model->nguoitao);
                    echo (is_null($admin))?"#N/A":$admin->ten;?></td></tr>
            <tr><th>Người phụ trách Công việc</th><td><?php
                    $admin = \common\models\Admin::findOne($model->nguoiphutrach);
                    echo (is_null($admin))?"#N/A":$admin->ten;?></td></tr>
            <tr><th>Loại Công việc</th><td><?=$model->loaiduan->tenloai?></td></tr>
            <tr><th>Thời gian bắt đầu</th><td><?=date_format(date_create_from_format('Y-m-d',$model->ngaybatdau),'d/m/Y')?></td></tr>
            <tr><th>Thời gian kết thúc</th><td><?="<span style='".($model->checkExpire()&&$data->status!=1?"color:red":"color:green")."'>".date_format(date_create_from_format('Y-m-d',$model->deadline),'d/m/Y')." <br>(".$model->getDateRemaining()." ngày)</span>"?></td></tr>
            <tr><th>Trạng thái</th><td><?=$model->getStatusText()?></td></tr>
            <tr><th>Tiến độ</th><td>
                    <div class="progress progress-striped active">
                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="<?=$u=$model->getTienDo()?>" aria-valuemin="0" aria-valuemax="<?=$t=count($model->congviecs)?>" style="width: <?=$s=($t==0)?0:round($u*100/$t,2)?>%">

                        </div>
                        <span class="">
									<?=$model->getTienDoText()?> (<?=$s?>%) Hoàn thành </span>
                    </div>
                    </td></tr>
        </table>
    </div>
    <div class="col-md-8">
        <div class='table-responsive'>
            <div class="congviec-index">
                <div id="ajaxCrudDatatable">
                    <?=GridView::widget([
                        'id'=>'crud-datatable',
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'pjax'=>true,
                        'columns' => require(__DIR__.'/_columnscongviec.php'),
                        'toolbar'=> [
                            ['content'=>
                                Html::a('<i class="glyphicon glyphicon-plus"></i>', "/admin/congviec/create?ids=".$model->id,
                                    ['role'=>'modal-remote','title'=> 'Tạo mới công việc','class'=>'btn btn-default']).
                                Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['','id'=>$model->id],
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
                            'heading' => '<i class="glyphicon glyphicon-list"></i> Danh sách công việc',
                            'before'=>'<em>* Resize table columns just like a spreadsheet by dragging the column edges.</em>',
                            'after'=>BulkButtonWidget::widget([
                            'buttons'=>Html::a('<i class="glyphicon glyphicon-trash"></i>&nbsp; Xóa toàn bộ',
                                ["bulkdelete"] ,
                                [
                                    "class"=>"btn btn-danger btn-xs",
                                    'role'=>'modal-remote-bulk',
                                    'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                                    'data-request-method'=>'post',
                                    'data-confirm-title'=>'Are you sure?',
                                    'data-confirm-message'=>'Are you sure want to delete this item'
                                ]),
                        ]).
                                '<div class="clearfix"></div>',
                        ]
                    ])?>
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