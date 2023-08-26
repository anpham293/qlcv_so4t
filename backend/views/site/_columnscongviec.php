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
            return \kartik\grid\GridView::ROW_COLLAPSED;
        },
        'detail' => function ($model, $key, $index, $column) {
            return Yii::$app->controller->renderPartial('_expand-row-details', ['model' => $model]);
        },
        'headerOptions' => ['class' => 'kartik-sheet-style'],
        'expandOneOnly' => true,'pageSummary' => true
    ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'id',
    // ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'tencongviec',
        'label'=>'Công việc chi tiết',
        'value'=>function($data){

            $notification = \common\models\Notification::find()->where(['reciever'=>Yii::$app->user->id,'isseen'=>false])->andWhere(['url'=>"/admin/duan/detail?id=".$data->duan_id."&congviecid=".$data->id])->all();
            return $data->tencongviec.(empty($notification)?"":"<span class='badge badge-danger'>new</span>");
        },
        'format'=>"raw"
    ],
//    [
//        'class'=>'\kartik\grid\DataColumn',
//        'attribute'=>'motacongviec',
//    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'status',
        'value'=>function($data){
            return $data->getStatusText();
        },
        'format'=>'raw',
        'filterType' => \kartik\grid\GridView::FILTER_SELECT2,
        'filter' =>\common\models\Congviec::$statuslist,
        'filterWidgetOptions' => [
            'pluginOptions' => ['allowClear' => true],
        ],
        'filterInputOptions' => ['prompt' => 'Hiển thị tất cả'],
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'nguoigiao',
        'value'=>function($data){
            $admin = \common\models\Admin::findOne($data->nguoigiao);
            return (is_null($admin))?"#N/A":$admin->ten;
        },
        'filterType' => \kartik\grid\GridView::FILTER_SELECT2,
        'filter' =>\yii\helpers\ArrayHelper::map(\common\models\Admin::find()->where('phongban_id <>0')->all(), 'id', 'ten'),
        'filterWidgetOptions' => [
            'pluginOptions' => ['allowClear' => true],
        ],
        'filterInputOptions' => ['prompt' => 'Hiển thị tất cả'],
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'nguoinhan',
        'value'=>function($data){
            $admin = \common\models\Admin::findOne($data->nguoinhan);
            return (is_null($admin))?"#N/A":$admin->ten;
        },
        'filterType' => \kartik\grid\GridView::FILTER_SELECT2,
        'filter' =>\yii\helpers\ArrayHelper::map(\common\models\Admin::find()->where('phongban_id <>0')->all(), 'id', 'ten'),
        'filterWidgetOptions' => [
            'pluginOptions' => ['allowClear' => true],
        ],
        'filterInputOptions' => ['prompt' => 'Hiển thị tất cả'],
    ],

    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'ngayhoanthanh',
        'value'=>function($data){
            return "<span style='".($data->checkExpire()&&$data->status!=1?"color:red":"color:green")."'>".date_format(date_create_from_format('Y-m-d',$data->ngayhoanthanh),'d/m/Y')." <br>(".$data->getDateRemaining()." ngày)</span>";
        },
        'format'=>'raw'
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
        'vAlign'=>'middle',
        'urlCreator' => function($action, $model, $key, $index) {

                return Url::to(["congviec/".$action,'id'=>$key]);
        },
        'viewOptions'=>['role'=>'modal-remote','title'=>'View','data-toggle'=>'tooltip'],
        'updateOptions'=>['role'=>'modal-remote','title'=>'Update', 'data-toggle'=>'tooltip',],
        'deleteOptions'=>['role'=>'modal-remote','title'=>'Delete', 
                          'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                          'data-request-method'=>'post',
                          'data-toggle'=>'tooltip',
                          'data-confirm-title'=>'Are you sure?',
                          'data-confirm-message'=>'Hủy công việc này?'],
        'visibleButtons'=> [
            'delete'=>function($model,$action, $key) {
                if(Yii::$app->user->identity->username=="Superadmin"){
                    return true;
                }
                if($model->status==1||$model->status==3)
                    return false;
                return Yii::$app->user->id==$model->nguoigiao;
            },
            'update'=>function($model, $action, $key) {
                if($model->status==1||$model->status==3)
                    return false;
                return Yii::$app->user->id==$model->nguoigiao;
            },
            'view'=>function($model,$action,  $key) {
                return Yii::$app->user->id==$model->nguoigiao||Yii::$app->user->id==$model->nguoinhan;
            },
        ]
    ],

];   