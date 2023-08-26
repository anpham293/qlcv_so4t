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
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'image',

        'contentOptions' => ['class' => 'text-center'],
        'headerOptions' => ['style' => 'width:100px', 'class' => 'text-center'],
        'value' => function ($data) {
            return \yii\helpers\Html::img(Yii::$app->urlManagerFrontend->baseUrl . $data->image, ['width' => '60px','height'=>'40px']);
        },
        'format' => 'raw',
        'filter' => false,
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'name_vi',
    ],

    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'ord',
        'value' => function ($data) {
            return \yii\bootstrap\Html::numberInput('', $data->ord, ['control' => 'album', 'vals' => $data->id, 'class' => "ord-change form-control", 'min' => 0]);
        },
        'format' => 'raw',
        'headerOptions' => ['style' => 'text-align:center; width:100px'],
        'contentOptions' => ['style' => 'text-align:center'],
        'filter' => false
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'active',
        'value' => function ($data) {
            return ($data->active == 1) ? "<a control='album' vals=" . $data->id . " class=\"active-change glyphicon glyphicon-ok text-success\"></a>" : "<a control='album' vals=" . $data->id . " class=\"active-change glyphicon glyphicon-remove text-danger\"></a>";
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
//    [
//        'class'=>'\kartik\grid\DataColumn',
//        'attribute'=>'name_en',
//    ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'decription',
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