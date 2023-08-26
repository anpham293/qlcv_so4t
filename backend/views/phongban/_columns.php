<?php

use common\models\Admin;
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
    ],[
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'ord',
    ],
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
        'visibleButtons'=>[
            'delete'=>function ($model, $key, $index) {
                return Yii::$app->user->can('phongban/delete') && empty(Admin::find()->where(['phongban_id'=>$model->id])->all());
            },
            'update'=>function ($model, $key, $index) {
                if(Yii::$app->user->identity->username=="Superadmin"){
                    return true;
                }
                return Yii::$app->user->can('phongban/update') && empty(Admin::find()->where(['phongban_id'=>$model->id])->all());
            }
        ]
    ],

];   