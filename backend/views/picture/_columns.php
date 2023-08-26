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
        'attribute'=>'image',
        'contentOptions' => ['class' => 'text-center'],
        'headerOptions' => ['style' => 'width:100px', 'class' => 'text-center'],
        'value' => function ($data) {
            return \yii\bootstrap\Html::img(Yii::$app->urlManagerFrontend->baseUrl . $data->image, ['width' => '40px']);
        },
        'format' => 'raw',
        'filter' => false,
    ],
    [
        'format' => 'raw',
        'header' => 'Copy image',
        'value' => function($data) {
            return \yii\helpers\Html::a(
                'Copy image',
                'javascript: void(0)',
                [
                    'id'=>'custom-button-'.$data->id,
                    'class'=>'button btn btn-primary cpy-success',
                    'img_link'=>Yii::$app->urlManagerFrontend->baseUrl.$data->image,
                    'onclick'=>"copyToClipboard('#custom-button-".$data->id."')",
                ]
            );
        },
        'hAlign'=>'center',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'name',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'posted_date',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'album_id',
        'value'=>function($data){
            /** @var $data \common\models\Picture */
            return $data->album->name_vi;
        }
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'home',
        'value' => function ($data) {
            return ($data->home == 1) ? "<a control='picture' vals=" . $data->id . " class=\"home-change glyphicon glyphicon-ok text-success\"></a>" : "<a control='picture' vals=" . $data->id . " class=\"home-change glyphicon glyphicon-remove text-danger\"></a>";
        },

        'filter' => \yii\helpers\Html::activeDropDownList(
            $searchModel, 'home',
            ['1' => 'Có', '0' => 'Không'],
            ['prompt' => 'All', 'class' => 'form-control']
        ),
        'format' => 'raw',
        'headerOptions' => ['style' => 'text-align:center; width:100px'],
        'contentOptions' => ['style' => 'text-align:center'],
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'ord',
        'value'=>function($data){
            return \yii\bootstrap\Html::numberInput('',$data->ord,['control'=>'picture', 'vals'=>$data->id,'class'=>"ord-change form-control",'min'=>0]);
        },
        'format' => 'raw',
        'headerOptions'=>['style'=>'text-align:center; width:100px'],
        'contentOptions'=>['style'=>'text-align:center'],
        'filter'=>false
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
    ],

];   