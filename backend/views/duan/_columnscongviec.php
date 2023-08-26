<?php

use yii\helpers\Url;

return [
    [
        'class' => 'kartik\grid\CheckboxColumn',
        'width' => '20px',
    ],
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
    ],
    [
        'class' => 'kartik\grid\ExpandRowColumn',
        'width' => '50px',
        'value' => function ($model, $key, $index, $column) {
            if(isset($_GET['congviecid'])){
                if($model->id!=$_GET['congviecid']){
                    return \kartik\grid\GridView::ROW_COLLAPSED;
                }
                return \kartik\grid\GridView::ROW_EXPANDED;
            }else{
                return \kartik\grid\GridView::ROW_COLLAPSED;
            }
        },
        'detailUrl' => Url::to(['duan/details']),
        'headerOptions' => ['class' => 'kartik-sheet-style'],
        'expandOneOnly' => true, 'pageSummary' => true
    ],
     [
     'class'=>'\kartik\grid\DataColumn',
     'label'=>'Báo cáo',
         'value'=>function($data){
            $baocao = \common\models\Baocaocongviec::findAll(['congviec_id'=>$data->id]);
            return empty($baocao)?"<span class='badge badge-danger'>Chưa có</span>":"<span class='badge badge-success'>".count($baocao)." Báo cáo</span>";
         },
         'format'=>'raw'
     ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'tencongviec',
        'label'=>'Công việc chi tiết',
        'value'=>function($data){

            $notification = \common\models\Notification::find()->where(['reciever'=>Yii::$app->user->id,'isseen'=>false])->andWhere(['url'=>"/admin/duan/detail?id=".$data->duan_id."&congviecid=".$data->id])->all();
            $listfile = \yii\helpers\Json::decode($data->danhgiacongviec);
            $filelist = '<table class="table table-hover table-striped table-bordered" style="margin-top: 5px">';
            if(is_array($listfile)){
                foreach ($listfile as $index=> $file){
                    $t=explode("/",$file);
                    $exts = explode(".",$t[count($t)-1]);
                    $ext = $exts[count($exts)-1];
                    $filelist.="<tr><td><img src='".func::geticon($ext)."' style='width: 30px'></td><td><a data-pjax='0'role='modal-remote' data-toggle='tooltip' href='/admin/site/viewcongvan?r=".$file."'>".$t[count($t)-1]."</a></td>".'<td><a class="crud-datatable-action-del" href="/admin/congviec/deletefile?id='.$data->id.'&file='.$file.'" title="Delete" data-pjax="false" data-pjax-container="crud-datatable-pjax" role="modal-remote" data-request-method="post" data-toggle="tooltip" data-confirm-title="Are you sure?" data-confirm-message="Xóa file?"><span class="glyphicon glyphicon-trash"></span></a></td>'."</tr>";
                }
            }

            return $data->tencongviec.(empty($notification)?"":"<span class='badge badge-danger'>new</span>").$filelist."</table>";
        },
        'format'=>'raw'
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'status',
        'value' => function ($data) {
            return $data->getStatusText()."<script>$('.editable').editable({ url: '/admin/site/updatecongviecstatus', showbuttons: false });</script>";
        },
        'format' => 'raw',
        'filterType' => \kartik\grid\GridView::FILTER_SELECT2,
        'filter' => \common\models\Congviec::$statuslist,
        'filterWidgetOptions' => [
            'pluginOptions' => ['allowClear' => true],
        ],
        'filterInputOptions' => ['prompt' => 'Hiển thị tất cả'],
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'nguoigiao',
        'label'=>"Người khởi tạo",
        'value'=>function($data){
            $admin = \common\models\Admin::findOne($data->nguoigiao);
            return is_null($admin)?"#N/A":$admin->ten;

        }
    ],
[
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'nguoiphoihop',
        'label' => 'Người phối hợp',
        'value' => function ($data) {
            $admin = \common\models\Nguoiphoihop::findAll(['congviecid' => $data->id]);
            $return = "";
            foreach ($admin as $value) {
                $nguoi = \common\models\Admin::findOne($value->nguoiduocgan);
                $return .= "<p class='caption-subject font-red-flamingo bold'>" . (is_null($nguoi) ? "#N/A" : $nguoi->ten) . "</p>";
            }
            return $return==""?"<span class='badge badge-warning'>Chưa giao</span>":$return;
        },
        'filter' => false,
        'format' => 'raw'
    ],

    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'ngayhoanthanh',
        'value' => function ($data) {
            if(empty($data->ngayhoanthanh)){
                return "";
            }
            return "<span style='" . (!$data->checkExpire() && $data->status != 1 ? "color:red" : "color:green") . "'>" . date_format(date_create_from_format('Y-m-d', $data->ngayhoanthanh), 'd/m/Y') . " <br>(" . -$data->getDateRemaining() . " ngày)</span>";
        },
        'format' => 'raw'
    ],
    // [
    // 'class'=>'\kartik\grid\DataColumn',
    // 'attribute'=>'nguoinhan',
    // ],
    // [
    // 'class'=>'\kartik\grid\DataColumn',
    // 'attribute'=>'status',
    // ],
    // [
    // 'class'=>'\kartik\grid\DataColumn',
    // 'attribute'=>'duan_id',
    // ],

    [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'vAlign' => 'middle',
        'urlCreator' => function ($action, $model, $key, $index) {

            return Url::to(["congviec/" . $action, 'id' => $key]);
        },
        'viewOptions' => ['role' => 'modal-remote', 'title' => 'View', 'data-toggle' => 'tooltip'],
        'updateOptions' => ['role' => 'modal-remote', 'title' => 'Update', 'data-toggle' => 'tooltip',],
        'deleteOptions' => ['role' => 'modal-remote', 'title' => 'Delete',
            'data-confirm' => false, 'data-method' => false,// for overide yii data api
            'data-request-method' => 'post',
            'data-toggle' => 'tooltip',
            'data-confirm-title' => 'Are you sure?',
            'data-confirm-message' => 'Hủy công việc này?'],
        'visibleButtons' => [
            'delete' => function ($model, $action, $key) {

                $list = \yii\helpers\Json::decode($model->duan->nguoinhanviec);
                if (Yii::$app->user->identity->username == "Superadmin") {
                    return true;
                }
                if ($model->status == 1 || $model->status == 3||$model->duan->status == 1 || $model->duan->status == 3)
                    return false;
                return Yii::$app->user->id == $model->nguoigiao
                    || in_array(Yii::$app->user->id,$list)
                    ;
            },
            'update' => function ($model, $action, $key) {
                $list = \yii\helpers\Json::decode($model->duan->nguoinhanviec);
                /** @var \common\models\Congviec $model */
                if (Yii::$app->user->identity->username == "Superadmin") {
                    return true;
                }
                if ($model->status == 1 || $model->status == 3||$model->duan->status == 1 || $model->duan->status == 3)
                    return false;
                return (Yii::$app->user->id == $model->nguoigiao || Yii::$app->user->id == $model->duan->nguoiphutrach|| in_array(Yii::$app->user->id,$list));
            },
            'view' => function ($model, $action, $key) {
                return Yii::$app->user->id == $model->nguoigiao || $model->checkIsGranted();
            },
        ]
    ],

];   