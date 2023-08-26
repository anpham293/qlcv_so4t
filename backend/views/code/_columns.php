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
        'attribute'=>'code',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'value',
        'value'=>function($data){
            return $data->value." ".$data->type;
        },
        'filter'=>false
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'cond',
        'value'=>function($data){
            return $data->cond." ".$data->ordvalue." £";
        },
        'filter'=>false
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'active',
        'value' => function ($data) {
            return ($data->active == 1) ? "<a control='code' vals=" . $data->id . " class=\"active-change glyphicon glyphicon-ok text-success\"></a>" : "<a control='code' vals=" . $data->id . " class=\"active-change glyphicon glyphicon-remove text-danger\"></a>";
        },
        'filter' => \yii\helpers\Html::activeDropDownList(
            $searchModel, 'active',
            ['1' => 'Có', '0' => 'Không'],
            ['prompt' => 'All', 'class' => 'form-control']
        ),
        'format' => 'raw',
        'headerOptions' => ['style' => 'text-align:center; width:100px'],
        'contentOptions' => ['style' => 'text-align:center'],
    ],

    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'ordvalue',
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
    ],

];   