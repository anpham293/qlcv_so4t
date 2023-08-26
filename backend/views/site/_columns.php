<?php

use yii\helpers\Url;

return [
    [
        'class' => 'kartik\grid\CheckboxColumn',
    ],
    [
        'class' => 'kartik\grid\SerialColumn',
    ],
    // [
    // 'class'=>'\kartik\grid\DataColumn',
    // 'attribute'=>'id',
    // ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'ten',
        'label'=>'Danh sách công việc',
        'value' => function ($data) {
            $notification = \common\models\Notification::find()->where(['reciever' => Yii::$app->user->id, 'isseen' => false])->andWhere(['LIKE', 'url', "/admin/duan/detail?id=" . $data->id])->all();
            $model=$data;
            $return= "<p>".\yii\helpers\Html::a($data->ten, Yii::$app->urlManager->createUrl(['duan/detail', 'id' => $data->id]), [ 'data-pjax' => '0', 'style' => ($data->status != 1 ? "color:black;font-weight:bold" : "color:black;")]). (($model->tongdientich==0) ? "" : " <i class='fa fa-star' style='color: #ffbd00'></i>") . (empty($notification) ? "" : " <span class='badge badge-danger'>new</span>")."</p>";
            $listfile = \yii\helpers\Json::decode($data->congvan);
            $filelist = '<table class="table table-hover table-striped table-bordered" style="margin-top: 5px">';
            if(is_array($listfile)){
                foreach ($listfile as $index=> $file){
                    $t=explode("/",$file);
                    $exts = explode(".",$t[count($t)-1]);
                    $ext = $exts[count($exts)-1];
                    $filelist.="<tr><td style='width: 50px'><img src='".func::geticon($ext)."' style='width: 30px'></td><td><a data-pjax='0'role='modal-remote' data-toggle='tooltip' href='/admin/site/viewcongvan?r=".$file."'>".$t[count($t)-1].'</a></td><td style="width: 30px"><a role="modal-remote" href="/admin/duan/deletefile?id='.$model->id.'&file='.$file.'"><span class="glyphicon glyphicon-trash"></span></a></p>';
                }
            }


            $khokhan = \yii\helpers\Json::decode($data->khokhanvuongmac);


            return $return.$filelist."</table><a style='float: right;margin-right: 11px;position: relative' href='/admin/duan/khokhan?id=".$data->id."' class='badge badge-warning' data-pjax='0' role='modal-remote' data-toggle='tooltip'>Khó khăn, vướng mắc".(is_array($khokhan)?("<span class='badge badge-danger' style='position: absolute; top: -8px; right: -11px'>".count($khokhan)."</span>"):"")."</a>";
        },
        'format' => 'raw',
        'headerOptions' => [ 'class' => 'text-center'],
        'contentOptions'=> ['style'=>'max-width:700px']
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'status',
        'value' => function ($model) {
            $return = $model->getStatusText();
            if($model->status==1||$model->status==3){

            }else{
                $u = $model->getTienDo();
                $t = \common\models\Congviec::find()->where(['duan_id'=>$model->id])->andWhere(['<>','status',3])->count();
                $s = ($t == 0) ? 0 : round($u * 100 / $t, 2);
                $return.= '<div class="progress progress-striped active" style="margin-bottom: 0!important;margin-top: 10px;position: relative">
                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="' . $u . '" aria-valuemin="0" aria-valuemax="' . $t . '" style="width: ' . $s . '%;'.($s==100?"background:#26df34":"").'">
								
                        </div>	<span style="width: 100%;display: block;position: absolute;left: 0;padding-left: 5px">' . $model->getTienDoText() . ' (' . $s . '%) </span>
                    </div>';
            }

            return $return."<script> $('.editable').editable({ url: '/admin/site/updateduanstatus', showbuttons: false });</script>";
        },
        'format' => 'raw',
        'filterType' => \kartik\grid\GridView::FILTER_SELECT2,
        'filter' => false,
        'filterWidgetOptions' => [
            'pluginOptions' => ['allowClear' => true],
        ],

        'headerOptions' => [ 'class' => 'text-center'],
        'filterInputOptions' => ['prompt' => 'Hiển thị tất cả'],

    ],
//    [
//        'class' => '\kartik\grid\DataColumn',
//        'label' => 'Thông số',
//        'value' => function ($model) {
//            return '<a style="display:block;text-align:center" href="/admin/duan/viewthongso?id=' . $model->id . '" title="Thông số" data-pjax="0" role="modal-remote" data-toggle="tooltip"><span class="glyphicon glyphicon-eye-open"></span></a>';
//        },
//        'format' => 'raw'
//    ],

    [
        'class' => '\kartik\grid\DataColumn',
         'attribute' => 'loaiduan_id',
        'label' => 'Thông tin',
        'value' => function ($data) {
            $lanhdao="";
            if(!empty($data->nguoiphutrach)){
            foreach (\yii\helpers\Json::decode($data->nguoiphutrach) as $value){
                $admin = \common\models\Admin::findOne($value);
                $lanhdao .= (is_null($admin)) ? "#N/A" : "<span class='text-danger'>".$admin->ten."; </span>";
            }
            }else{
                $lanhdao="không có";
            }


            $admin = \common\models\Admin::findOne($data->nguoitao);
            $nguoiphutrach= (is_null($admin)) ? "#N/A" : $admin->ten;

            $phongban = \yii\helpers\Json::decode($data->truongphongphutrach);

            $phongbanphutrach="";
            $listphongbanname="";
            if(is_array($phongban)){
                foreach ($phongban as $index=> $dataphongban){
                    $admin = \common\models\Phongban::findOne($dataphongban);
                    $listphongbanname.=$admin->ten.", ";

                }
            }else{
                $admin = \common\models\Phongban::findOne($phongban);
                $listphongbanname.=(is_null($admin)?"Chưa giao":$admin->ten).", ";
            }



            if (Yii::$app->user->identity->username == 'Superadmin' || Yii::$app->user->can('duan/updatetruongphong')) {
                $phongbanphutrach=  ($listphongbanname=="" || is_null($data->truongphongphutrach)) ? "Chưa giao" : $listphongbanname;
            }
            else{
                $phongbanphutrach= ($listphongbanname=="" || is_null($data->truongphongphutrach)) ? "Chưa giao" : $listphongbanname;
            }

            $admin = \common\models\Loaiduan::findOne($data->loaiduan_id);
            $loaicongviec = (is_null($admin)) ? "#N/A" : $admin->tenloai;

            $ngaybatdau = date_format(date_create_from_format('Y-m-d', $data->ngaybatdau), 'd/m/Y');

            $ngayketthuc = "";
            if (!date_create_from_format("Y-m-d", $data->deadline)) {
                $ngayketthuc= "Không thời hạn";
            }else{
                $ngayketthuc= "<span style='" . (!$data->checkExpire() && $data->status != 1 ? "color:red" : "color:green") . "'>" . date_format(date_create_from_format('Y-m-d', $data->deadline), 'd/m/Y') . " (" . abs($data->getDateRemaining()) . " ngày)</span>";
            }


            $returner= "<div class='table-responsive'>";
            $returner.="<p style='margin:0!important;'>Lãnh đạo phụ trách: <b>$lanhdao</b></p>";
            $returner.="<p style='margin:0!important;'>Người phụ trách: <b>$nguoiphutrach</b></p>";
            $returner.="<p style='margin:0!important;'>Phòng ban phụ trách: <b>$phongbanphutrach</b></p>";
            $returner.="<p style='margin:0!important;'>Loại công việc: <b>$loaicongviec</b></p>";
            $returner.="<p style='margin:0!important;'>Từ: <b>$ngaybatdau</b><br>Đến: <b>$ngayketthuc</b></p>";
            return $returner."</div>";
        },
        'format'=>'raw',
        'filterType' => \kartik\grid\GridView::FILTER_SELECT2,
        'filter' => \yii\helpers\ArrayHelper::map(\common\models\Loaiduan::find()->all(), 'id', 'tenloai'),
        'filterWidgetOptions' => [
            'pluginOptions' => ['allowClear' => true],
        ],
        'filterInputOptions' => ['prompt' => 'Hiển thị tất cả'],

        'headerOptions' => [ 'class' => 'text-center'],
    ],




    [
        'class' => '\kartik\grid\DataColumn',
        'label' => 'Người nhận việc',
        'attribute' => 'nguoinhanviec',
        'value' => function ($data) {


            $return = "";
            if($data->nguoinhanviec!=""&& !is_null($data->nguoinhanviec)){
                foreach (\yii\helpers\Json::decode($data->nguoinhanviec) as $value){
                    $admin = \common\models\Admin::findOne($value);
                    $return.="<p class='text-danger' style='margin-bottom: 2px'>- ".(is_null($admin)?"#N/A":$admin->ten)."</p>";
                }
            }
            if($data->nguoinhanviecchitiet!=""&& !is_null($data->nguoinhanviecchitiet)){
                foreach (\yii\helpers\Json::decode($data->nguoinhanviecchitiet) as $value){
                    $admin = \common\models\Admin::findOne($value);
                    $return.="<p style='margin-bottom: 2px'>- ".(is_null($admin)?"#N/A":$admin->ten)."</p>";
                }
            }


            return $return;
        },
        'format' => 'raw',
        'filterType' => \kartik\grid\GridView::FILTER_SELECT2,
        'filter' => \yii\helpers\ArrayHelper::map(\common\models\Admin::find()->where('phongban_id <>0')->all(), 'id', 'ten'),
        'filterWidgetOptions' => [
            'pluginOptions' => ['allowClear' => true],
        ],
        'filterInputOptions' => ['prompt' => 'Hiển thị tất cả','name'=>'DuannSearch[nguoinhanviec]'],

        'headerOptions' => [ 'class' => 'text-center'],
    ],


    [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'vAlign' => 'middle',
        'urlCreator' => function ($action, $model, $key, $index) {
            return Url::to(['duan/' . $action, 'id' => $key]);
        },

        'headerOptions' => [ 'class' => 'text-center'],
        'viewOptions' => ['role' => 'modal-remote', 'title' => 'View', 'data-toggle' => 'tooltip'],
        'updateOptions' => ['role' => 'modal-remote', 'title' => 'Update', 'data-toggle' => 'tooltip'],
        'deleteOptions' => ['role' => 'modal-remote', 'title' => 'Delete',
            'data-confirm' => false, 'data-method' => false,// for overide yii data api
            'data-request-method' => 'post',
            'data-toggle' => 'tooltip',
            'data-confirm-title' => 'Are you sure?',
            'data-confirm-message' => 'Are you sure want to delete this item'],
        'visibleButtons' => [
            'delete' => function ($model, $action, $key) {
                if (Yii::$app->user->identity->username == "Superadmin") {
                    return true;
                }
                if ($model->status == 1 || $model->status == 3)
                    return false;
                return Yii::$app->user->id == $model->nguoitao;
            },
            'update' => function ($model, $action, $key) {
                if (Yii::$app->user->identity->username == "Superadmin") {
                    return true;
                }
                if ($model->status == 1 || $model->status == 3)
                    return false;
                return Yii::$app->user->id == $model->nguoitao;
            },
            'view' => function ($model, $action, $key) {
                return false;
                if (Yii::$app->user->identity->username == "Superadmin") {
                    return true;
                }
                return Yii::$app->user->id == $model->nguoiphutrach || Yii::$app->user->id == $model->nguoiphutrach;
            },
        ]
    ],

];   