<?php

use common\models\Admin;
use kartik\grid\GridView;
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
        'attribute'=>'username',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'ten',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'email',
    ],



     [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'status',
         'value'=>function($data){
            if($data->status==10){
                return "<span class='label label-success'>Active</span>";
            }else
                return "<span class='label label-danger'>Inactive</span>";
         },
         'format'=>'raw'
     ],
     [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'phongban_id',
         'value'=>function($data){
             $admin= \common\models\Phongban::findOne($data->phongban_id);
             return (is_null($admin))?"Chưa phân phòng ban":$admin->ten;
         },
         'filterType' => GridView::FILTER_SELECT2,
         'filter' =>\yii\helpers\ArrayHelper::map(\common\models\Phongban::find()->orderBy('ord asc')->all(), 'id', 'ten'),
         'filterWidgetOptions' => [
             'pluginOptions' => ['allowClear' => true],
         ],
         'filterInputOptions' => ['prompt' => 'Hiển thị tất cả'],
     ],
    [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'phongban_id',
        'value'=>function($data){
            $s= \common\models\Phongban::findOne($data->phongban_id);
            return (is_null($s))?"Chưa phân phòng ban":$s->ten;
        },
        'group'=>true,
        'groupedRow'=>true,                    // move grouped column to a single grouped row
        'groupOddCssClass'=>'kv-grouped-row',  // configure odd group cell css class
        'groupEvenCssClass'=>'kv-grouped-row',

     ],
     [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'chucvu_id',
         'value'=>function($data){
            $chucvu = \common\models\Chucvu::findOne($data->chucvu_id);
            return (is_null($chucvu))?"Chưa phân chức vụ":$chucvu->ten;
         },
         'filterType' => GridView::FILTER_SELECT2,
         'filter' =>\yii\helpers\ArrayHelper::map(\common\models\Chucvu::find()->all(), 'id', 'ten'),
         'filterWidgetOptions' => [
             'pluginOptions' => ['allowClear' => true],
         ],
         'filterInputOptions' => ['prompt' => 'Hiển thị tất cả'],
     ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'donvi_id',
        'value'=>function($data){
            $chucvu = \common\models\Admin::findOne($data->donvi_id);
            return (is_null($chucvu))?"Không":$chucvu->ten;
        },
        'filterType' => GridView::FILTER_SELECT2,
        'filter' =>\yii\helpers\ArrayHelper::map(\common\models\Chucvu::find()->all(), 'id', 'ten'),
        'filterWidgetOptions' => [
            'pluginOptions' => ['allowClear' => true],
        ],
        'filterInputOptions' => ['prompt' => 'Hiển thị tất cả'],
    ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'trungtam',
    // ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'vAlign'=>'middle',
        'urlCreator' => function($action, $model, $key, $index) { 
                return Url::to([$action,'id'=>$key]);
        },
        'viewOptions'=>['role'=>'modal-remote','title'=>'View','data-toggle'=>'tooltip'],
        'updateOptions'=>['role'=>'modal-remote','title'=>'Update', 'data-toggle'=>'tooltip'],
        'deleteOptions'=>['role'=>'modal-remote','title'=>'Delete', 
                          'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                          'data-request-method'=>'post',
                          'data-toggle'=>'tooltip',
                          'data-confirm-title'=>'Are you sure?',
                          'data-confirm-message'=>'Are you sure want to delete this item'],
        'visibleButtons' => [

            'delete' => function ($model) {
                return strtolower(\Yii::$app->user->identity->username)=="superadmin"||Yii::$app->user->can('admin/delete');
            },
        ]
    ],

];   