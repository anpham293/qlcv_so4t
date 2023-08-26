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
if(isset($_GET['phongbanid'])){
    $this->title = 'Bảng quản trị công việc <span class="label-success label">'.\common\models\Phongban::findOne($_GET['phongbanid'])->ten.'</span>';
}else{
    $this->title = 'Bảng quản trị';
}
$countsapDenHan = 0;
$countquahan=0;
foreach ($dataProvider->models as $model) {
    $ngayketthuc = "";
    if (!date_create_from_format("Y-m-d", $model->deadline)) {
        $countsapDenHan+=0;
    }else{
        $countsapDenHan+= (abs($model->getDateRemaining())<=2 && $model->status != 1)?1:0;
    }
    $countquahan+=((!$model->checkExpire() && $model->status != 1)?1:0);
}


date_default_timezone_set("Asia/Ho_Chi_Minh");
$now = date_format(date_create(), 'd/m/Y');
$d = Admin::findOne(Yii::$app->user->identity->id)->donvi_id;
?>
<style>
    .duan-index *{
        font-size: 14px;
    }
    .label-success{
        background: #1a821a;
    }
    #crud-datatable-container thead{
        background: lightgoldenrodyellow;
    }
</style>


<div class="portlet box green">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-gift"></i>Công việc  <?=Html::a('<i class="glyphicon glyphicon-plus"></i> Thêm Công việc', "/admin/duan/create".(isset($_GET['phongbanid'])?"?ids=".$_GET['phongbanid']:""),
                ['role' => 'modal-remote', 'title' => 'Tạo mới công việc', 'class' => 'btn btn-danger'])?>
            <?="<span class='text-danger label label-default' style='background: white'>Hiện có <b>$countsapDenHan</b> công việc sắp đến hạn, <b>$countquahan</b> công việc quá hạn</span>"?>
        </div>
        <div class="tools">
            <a href="javascript:;" class="collapse">
            </a>
        </div>
    </div>
    <div class="portlet-body">
        <ul class="nav nav-tabs">
            <li class="active">
                <a href="#tab_1_1" data-toggle="tab">
                    Đang thực hiện </a>
            </li>
            <li>
                <a href="#tab_1_2" data-toggle="tab">
                    Đã hoàn thành </a>
            </li>
            <li>
                <a href="#tab_1_5" data-toggle="tab">
                    Chưa triển khai </a>
            </li>
            <li>
                <a href="#tab_1_3" data-toggle="tab">
                    Đang tạm dừng </a>
            </li>
            <li>
                <a href="#tab_1_4" data-toggle="tab">
                    Đã hủy </a>
            </li>

        </ul>
        <div class="tab-content">
            <div class="tab-pane fade active in" id="tab_1_1">
                <div class='table-responsive'>
                    <div class="duan-index">
                        <div id="ajaxCrudDatatable">
                            <?= GridView::widget([
                                'id' => 'crud-datatable',
                                'dataProvider' => $dataProvider,
                                'filterModel' => $searchModel,
                                'responsiveWrap' => true,
                                'responsive' => false,
                                'pjax' => true,
                                'columns' => require(__DIR__ . '/_columns.php'),
                                'toolbar' => [
                                    ['content' =>
                                        Html::a('<i class="glyphicon glyphicon-repeat"></i>', [''],
                                            ['data-pjax' => 1, 'class' => 'btn btn-default', 'title' => 'Reset Grid']) .
                                        '{toggleData}' .
                                        '{export}'
                                    ],
                                ],
                                'striped' => true,
                                'condensed' => true,
                                "bordered"=>true,
                                "rowOptions"=>['style'=>'border-bottom: 2px solid black'],
                                'panel' => [
                                    'type' => 'primary',
                                    'heading' => '<i class="glyphicon glyphicon-list"></i> Danh sách công việc đang thực hiện',
                                    'before' => '<em>* Thay đổi kích thước cột của bảng giống như bảng tính bằng cách kéo các cạnh cột.</em>',
                                    'after' => (Yii::$app->user->identity->username == "Superadmin" ? Html::a('<i class="glyphicon glyphicon-trash"></i>&nbsp; Xóa toàn bộ',
                                            ["duan/bulkdelete"],
                                            [
                                                "class" => "btn btn-danger btn-xs",
                                                'role' => 'modal-remote-bulk',
                                                'data-confirm' => false, 'data-method' => false,// for overide yii data api
                                                'data-request-method' => 'post',
                                                'data-confirm-title' => 'Bạn có chắc không?',
                                                'data-confirm-message' => 'Bạn có chắc chắn muốn xóa mục này'
                                            ]) : "") .

                                        '<div class="clearfix"></div>',
                                ]
                            ]) ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="tab_1_2">
                <div class='table-responsive'>
                    <div class="duan-index">
                        <div id="ajaxCrudDatatable2">
                            <?= GridView::widget([
                                'id' => 'crud-datatable2',
                                'dataProvider' => $dataProvider2,
                                'filterModel' => $searchModel2,
                                'responsiveWrap' => false,
                                'pjax' => true,
                                'columns' => require(__DIR__ . '/_columns.php'),
                                'toolbar' => [
                                    ['content' =>

                                        Html::a('<i class="glyphicon glyphicon-repeat"></i>', [''],
                                            ['data-pjax' => 1, 'class' => 'btn btn-default', 'title' => 'Reset Grid']) .
                                        '{toggleData}' .
                                        '{export}'
                                    ],
                                ],
                                'striped' => true,
                                'condensed' => true,
                                'responsive' => true,
                                'panel' => [
                                    'type' => 'primary',
                                    'heading' => '<i class="glyphicon glyphicon-list"></i> Danh sách công việc đã hoàn thành',
                                    'before' => '<em>* Thay đổi kích thước cột của bảng giống như bảng tính bằng cách kéo các cạnh cột.</em>',
                                    'after' => (Yii::$app->user->identity->username == "Superadmin" ? Html::a('<i class="glyphicon glyphicon-trash"></i>&nbsp; Xóa toàn bộ',
                                            ["duan/bulkdelete"],
                                            [
                                                "class" => "btn btn-danger btn-xs",
                                                'role' => 'modal-remote-bulk',
                                                'data-confirm' => false, 'data-method' => false,// for overide yii data api
                                                'data-request-method' => 'post',
                                                'data-confirm-title' => 'Bạn có chắc không?',
                                                'data-confirm-message' => 'Bạn có chắc chắn muốn xóa mục này'
                                            ]) : "") .

                                        '<div class="clearfix"></div>',
                                ]
                            ]) ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="tab_1_3">
                <div class='table-responsive'>
                    <div class="duan-index">
                        <div id="ajaxCrudDatatable3">
                            <?= GridView::widget([
                                'id' => 'crud-datatable3',
                                'dataProvider' => $dataProvider3,
                                'filterModel' => $searchModel3,
                                'responsiveWrap' => false,
                                'pjax' => true,
                                'columns' => require(__DIR__ . '/_columns.php'),
                                'toolbar' => [
                                    ['content' =>

                                        Html::a('<i class="glyphicon glyphicon-repeat"></i>', [''],
                                            ['data-pjax' => 1, 'class' => 'btn btn-default', 'title' => 'Reset Grid']) .
                                        '{toggleData}' .
                                        '{export}'
                                    ],
                                ],
                                'striped' => true,
                                'condensed' => true,
                                'responsive' => true,
                                'panel' => [
                                    'type' => 'primary',
                                    'heading' => '<i class="glyphicon glyphicon-list"></i> Danh sách công việc đã tạm dừng',
                                    'before' => '<em>* Thay đổi kích thước cột của bảng giống như bảng tính bằng cách kéo các cạnh cột.</em>',
                                    'after' => (Yii::$app->user->identity->username == "Superadmin" ? Html::a('<i class="glyphicon glyphicon-trash"></i>&nbsp; Xóa toàn bộ',
                                            ["duan/bulkdelete"],
                                            [
                                                "class" => "btn btn-danger btn-xs",
                                                'role' => 'modal-remote-bulk',
                                                'data-confirm' => false, 'data-method' => false,// for overide yii data api
                                                'data-request-method' => 'post',
                                                'data-confirm-title' => 'Bạn có chắc không?',
                                                'data-confirm-message' => 'Bạn có chắc chắn muốn xóa mục này'
                                            ]) : "") .

                                        '<div class="clearfix"></div>',
                                ]
                            ]) ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="tab_1_4">
                <div class='table-responsive'>
                    <div class="duan-index">
                        <div id="ajaxCrudDatatable4">
                            <?= GridView::widget([
                                'id' => 'crud-datatable4',
                                'dataProvider' => $dataProvider4,
                                'filterModel' => $searchModel4,
                                'responsiveWrap' => false,
                                'pjax' => true,
                                'columns' => require(__DIR__ . '/_columns.php'),
                                'toolbar' => [
                                    ['content' =>

                                        Html::a('<i class="glyphicon glyphicon-repeat"></i>', [''],
                                            ['data-pjax' => 1, 'class' => 'btn btn-default', 'title' => 'Reset Grid']) .
                                        '{toggleData}' .
                                        '{export}'
                                    ],
                                ],
                                'striped' => true,
                                'condensed' => true,
                                'responsive' => true,
                                'panel' => [
                                    'type' => 'primary',
                                    'heading' => '<i class="glyphicon glyphicon-list"></i> Danh sách công việc đã hủy',
                                    'before' => '<em>* Thay đổi kích thước cột của bảng giống như bảng tính bằng cách kéo các cạnh cột.</em>',
                                    'after' => (Yii::$app->user->identity->username == "Superadmin" ? Html::a('<i class="glyphicon glyphicon-trash"></i>&nbsp; Xóa toàn bộ',
                                            ["duan/bulkdelete"],
                                            [
                                                "class" => "btn btn-danger btn-xs",
                                                'role' => 'modal-remote-bulk',
                                                'data-confirm' => false, 'data-method' => false,// for overide yii data api
                                                'data-request-method' => 'post',
                                                'data-confirm-title' => 'Bạn có chắc không?',
                                                'data-confirm-message' => 'Bạn có chắc chắn muốn xóa mục này'
                                            ]) : "") .

                                        '<div class="clearfix"></div>',
                                ]
                            ]) ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="tab_1_5">
                <div class='table-responsive'>
                    <div class="duan-index">
                        <div id="ajaxCrudDatatable5">
                            <?= GridView::widget([
                                'id' => 'crud-datatable4',
                                'dataProvider' => $dataProvider5,
                                'filterModel' => $searchModel5,
                                'responsiveWrap' => false,
                                'pjax' => true,
                                'columns' => require(__DIR__ . '/_columns.php'),
                                'toolbar' => [
                                    ['content' =>

                                        Html::a('<i class="glyphicon glyphicon-repeat"></i>', [''],
                                            ['data-pjax' => 1, 'class' => 'btn btn-default', 'title' => 'Reset Grid']) .
                                        '{toggleData}' .
                                        '{export}'
                                    ],
                                ],
                                'striped' => true,
                                'condensed' => true,
                                'responsive' => true,
                                'panel' => [
                                    'type' => 'primary',
                                    'heading' => '<i class="glyphicon glyphicon-list"></i> Danh sách công việc đã hủy',
                                    'before' => '<em>* Thay đổi kích thước cột của bảng giống như bảng tính bằng cách kéo các cạnh cột.</em>',
                                    'after' => (Yii::$app->user->identity->username == "Superadmin" ? Html::a('<i class="glyphicon glyphicon-trash"></i>&nbsp; Xóa toàn bộ',
                                            ["duan/bulkdelete"],
                                            [
                                                "class" => "btn btn-danger btn-xs",
                                                'role' => 'modal-remote-bulk',
                                                'data-confirm' => false, 'data-method' => false,// for overide yii data api
                                                'data-request-method' => 'post',
                                                'data-confirm-title' => 'Bạn có chắc không?',
                                                'data-confirm-message' => 'Bạn có chắc chắn muốn xóa mục này'
                                            ]) : "") .

                                        '<div class="clearfix"></div>',
                                ]
                            ]) ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="clearfix margin-bottom-20">
        </div>

    </div>
</div>

<div class="clearfix"></div>
<?php Modal::begin([
    "id"=>"ajaxCrudModal",
    "footer"=>"",// always need it for jquery plugin
    'size'=>Modal::SIZE_LARGE,
    'options' => ["data-backdrop" => "static", "data-keyboard" => "false", 'tabindex' => false],
])?>
<?php Modal::end(); ?>
<script>
    $(document).ready(function (){
        $('.editable').editable({
            url: '/admin/site/updateduanstatus',
            showbuttons: false
        });
    });
    $(document).on("click",'input[name="listphongban[]"]',function () {
        var listid = [];
        $.each($('input[name="listphongban[]"]'),function (){
            if($(this).is(":checked")){
                listid.push($(this).val());
            }
        })
        $.ajax({
            url:'/admin/site/getnhanvienphongban',
            type:'post',
            dataType:'html',
            data:{
                id:listid
            },
            beforeSend:function (){
                block({target:"#ajaxCrudModal"});
            },
            success:function (data){
                $(document).find("#nhanvienresult").html(data);
                unblock("#ajaxCrudModal");
            }
        })
    })
    $(document).on("mousedown",'#nhanvienresult input[type="radio"]',function () {
        var self=$(this);
        if($(this).is(':checked')){
            var uncheck = function(){
                setTimeout(function(){self.removeAttr('checked');},0);
            };
            var unbind = function(){
                self.unbind('mouseup',up);
            };
            var up = function(){
                uncheck();
                unbind();
            };
            self.bind('mouseup',up);
            self.one('mouseout', unbind);
        }
    })
</script>