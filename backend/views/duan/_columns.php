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
    // [
    // 'class'=>'\kartik\grid\DataColumn',
    // 'attribute'=>'id',
    // ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'ten',
        'value' => function ($data) {
            return \yii\helpers\Html::a($data->ten, Yii::$app->urlManager->createUrl(['thongsoketoan/index', 'ids' => $data->id]), ['target' => '_blank', 'data-pjax' => '0', 'style' => ($data->checkExpire() && date_create_from_format('Y-m-d', $data->deadline) && $data->status != 1 ? "color:red" : "color:green")]);
        },
        'format'=>'raw'
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'status',
        'value'=>function($data){
            return $data->getStatusText();
        },
        'format'=>'raw',
        'filterType' => \kartik\grid\GridView::FILTER_SELECT2,
        'filter' =>\common\models\Duan::$statuslist,
        'filterWidgetOptions' => [
            'pluginOptions' => ['allowClear' => true],
        ],
        'filterInputOptions' => ['prompt' => 'Hiển thị tất cả'],
    ],
//    [
//        'class'=>'\kartik\grid\DataColumn',
//        'attribute'=>'nguoitao',
//        'value'=>function($data){
//            $admin = \common\models\Admin::findOne($data->nguoitao);
//            return (is_null($admin))?"#N/A":$admin->ten;
//        },
//        'filterType' => \kartik\grid\GridView::FILTER_SELECT2,
//        'filter' =>\yii\helpers\ArrayHelper::map(\common\models\Admin::find()->where('phongban_id <>0')->all(), 'id', 'ten'),
//        'filterWidgetOptions' => [
//            'pluginOptions' => ['allowClear' => true],
//        ],
//        'filterInputOptions' => ['prompt' => 'Hiển thị tất cả'],
//    ],
//    [
//        'class'=>'\kartik\grid\DataColumn',
//        'attribute'=>'nguoiphutrach',
//        'value'=>function($data){
//            $admin = \common\models\Admin::findOne($data->nguoiphutrach);
//            return (is_null($admin))?"#N/A":$admin->ten;
//        },
//        'filterType' => \kartik\grid\GridView::FILTER_SELECT2,
//        'filter' =>\yii\helpers\ArrayHelper::map(\common\models\Admin::find()->where('phongban_id <>0')->all(), 'id', 'ten'),
//        'filterWidgetOptions' => [
//            'pluginOptions' => ['allowClear' => true],
//        ],
//        'filterInputOptions' => ['prompt' => 'Hiển thị tất cả'],
//    ],
//    [
//        'class'=>'\kartik\grid\DataColumn',
//        'attribute'=>'truongphongphutrach',
//        'value'=>function($data){
//            $admin = \common\models\Admin::findOne($data->truongphongphutrach);
//            return (is_null($admin))?"#N/A":$admin->ten;
//        },
//        'filterType' => \kartik\grid\GridView::FILTER_SELECT2,
//        'filter' =>\yii\helpers\ArrayHelper::map(\common\models\Admin::find()->where('phongban_id <>0')->all(), 'id', 'ten'),
//        'filterWidgetOptions' => [
//            'pluginOptions' => ['allowClear' => true],
//        ],
//        'filterInputOptions' => ['prompt' => 'Hiển thị tất cả'],
//    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'label'=>'Kế toán',
        'value'=>function($data){
            $ketoans = \common\models\Ketoanduan::findAll(['duan_id'=>$data->id]);
            if(empty($ketoans)){
                return "Chưa giao ".((Yii::$app->user->can("ketoanduan/create"))?' <a href="/admin/ketoanduan/create?ids='.$data->id.'" title="Update" data-pjax="0" role="modal-remote" data-toggle="tooltip"><span class="glyphicon glyphicon-plus-sign"></span></a>':"");
            }
            $result="";
            foreach ($ketoans as $ketoan){
                $admin = \common\models\Admin::findOne($ketoan->userid);
                $result.="<p>". ((is_null($admin))?"#N/A":$admin->ten).((Yii::$app->user->can("ketoanduan/update"))?' <a href="/admin/ketoanduan/update?id='.$ketoan->id.'" title="Update" data-pjax="0" role="modal-remote" data-toggle="tooltip"><span class="glyphicon glyphicon-pencil"></span></a>':"")."</p>";
            }

            return $result.'<p>'.((Yii::$app->user->can("ketoanduan/create"))?'<a href="/admin/ketoanduan/create?ids='.$data->id.'" title="Update" data-pjax="0" role="modal-remote" data-toggle="tooltip"><span class="glyphicon glyphicon-plus-sign"></span></a>':"").'</p>';
        },
        'filterType' => \kartik\grid\GridView::FILTER_SELECT2,
        'filter' =>\yii\helpers\ArrayHelper::map(\common\models\Loaiduan::find()->all(), 'id', 'tenloai'),
        'filterWidgetOptions' => [
            'pluginOptions' => ['allowClear' => true],
        ],
        'filterInputOptions' => ['prompt' => 'Hiển thị tất cả'],
        'format'=>'raw'
    ],

    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'ngaybatdau',
        'value'=>function($data){
            return date_format(date_create_from_format('Y-m-d',$data->ngaybatdau),'d/m/Y');
        }
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'deadline',
        'value'=>function($data){
            if(! date_create_from_format("Y-m-d",$data->deadline)){
                return "Không";
            }
            return "<span style='".($data->checkExpire()&&$data->status!=1?"color:red":"color:green")."'>".date_format(date_create_from_format('Y-m-d',$data->deadline),'d/m/Y')." <br>(".$data->getDateRemaining()." ngày)</span>";
        },
        'format'=>'raw'
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'label'=>'Tiến độ',
        'format'=>'raw',
        'value'=>function($model){
            $u=$model->getTienDo();
            $t=count($model->congviecs);
            $s=($t==0)?0:round($u*100/$t,2);
            return '<div class="progress progress-striped active" style="margin-bottom: 0!important;">
                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="'.$u.'" aria-valuemin="0" aria-valuemax="'.$t.'" style="width: '.$s.'%">
								
                        </div>	<div class="">
									'.$model->getTienDoText().' ('.$s.'%) Hoàn thành </div>
                    </div>';
        }
    ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'vAlign'=>'middle',
        'urlCreator' => function($action, $model, $key, $index) {
            return Url::to(['duan/'.$action,'id'=>$key]);
        },
        'viewOptions'=>['role'=>'modal-remote','title'=>'View','data-toggle'=>'tooltip'],
        'updateOptions'=>['role'=>'modal-remote','title'=>'Update', 'data-toggle'=>'tooltip'],
        'deleteOptions'=>['role'=>'modal-remote','title'=>'Delete',
            'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
            'data-request-method'=>'post',
            'data-toggle'=>'tooltip',
            'data-confirm-title'=>'Are you sure?',
            'data-confirm-message'=>'Are you sure want to delete this item'],
        'visibleButtons'=> [
            'delete'=>function($model,$action, $key) {
                if($model->status==1||$model->status==3)
                    return false;
                return Yii::$app->user->id==$model->nguoitao;
            },
            'update'=>function($model, $action, $key) {
                if($model->status==1||$model->status==3)
                    return false;
                return Yii::$app->user->id==$model->nguoitao;
            },
            'view'=>function($model,$action,  $key) {
                return Yii::$app->user->id==$model->nguoiphutrach||Yii::$app->user->id==$model->nguoiphutrach;
            },
        ]
    ],

];   