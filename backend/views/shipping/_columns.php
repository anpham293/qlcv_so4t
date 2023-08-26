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
        'attribute' => 'mucduoi',
        'value' => function ($data) {
            return number_format($data->mucduoi, 2, '.', '') . ' ₤';
        },
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'muctren',
        'value' => function ($data) {
            return number_format($data->muctren, 2, '.', '') . ' ₤';
        },
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'name',
        'value'=>function ($model, $key, $index, $widget) {
            return $model->name;
        },
        'group' => true,
        'groupedRow' => true,                    // move grouped column to a single grouped row
        'groupOddCssClass' => 'kv-grouped-row',  // configure odd group cell css class
        'groupEvenCssClass' => 'kv-grouped-row',
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'shipping_fee',
        'value' => function ($data) {
            return number_format($data->shipping_fee, 2, '.', '') . ' ₤';
        },
    ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'vAlign' => 'middle',
        'urlCreator' => function ($action, $model, $key, $index) {
            return Url::to([$action, 'id' => $key]);
        },
        'viewOptions' => ['role' => 'modal-remote', 'title' => 'View', 'data-toggle' => 'tooltip'],
        'updateOptions' => ['role' => 'modal-remote', 'title' => 'Update', 'data-toggle' => 'tooltip'],
        'deleteOptions' => ['role' => 'modal-remote', 'title' => 'Delete',
            'data-confirm' => false, 'data-method' => false,// for overide yii data api
            'data-request-method' => 'post',
            'data-toggle' => 'tooltip',
            'data-confirm-title' => 'Are you sure?',
            'data-confirm-message' => 'Are you sure want to delete this item'],
    ],

];   