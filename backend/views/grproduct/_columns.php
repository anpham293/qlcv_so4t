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
        'attribute'=>'name',
    ],
    [
        'header'=>'Nhóm tag',
        'class'=>'\kartik\grid\DataColumn',
        'value'=>function($data){
            /** @var $data \common\models\Grproduct */
            if(!empty($data->grproctags)){
                $nhom = '';
                foreach ($data->grproctags as $value){
                    $nhom.="<p>Sản phẩm có tag ".$value->tag."</p>";
                }
                return $nhom;
            }else
            {
                return "Chưa đặt nhóm tag";
            }
        },
        'format' => 'raw',
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'active',
        'value' => function ($data) {
            return ($data->active == 1) ? "<a control='product' vals=" . $data->id . " class=\"active-change glyphicon glyphicon-ok text-success\"></a>" : "<a control='grproduct' vals=" . $data->id . " class=\"active-change glyphicon glyphicon-remove text-danger\"></a>";
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