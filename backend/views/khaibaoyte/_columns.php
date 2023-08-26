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
        'attribute'=>'loaikhaibao',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'mabenhnhan',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'sodienthoai',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'hovaten',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'donvi',
        'value'=>function($data){
            if($data->donvi == -1){
                return "Sở Y Tế";
            }
            return \common\models\Benhvien::findOne($data->donvi)->name;
        },
        'filterType' => \kartik\grid\GridView::FILTER_SELECT2,
        'filter' =>\yii\helpers\ArrayHelper::map(\common\models\Benhvien::getAllForFilter(), 'id', 'name'),
        'filterWidgetOptions' => [
        'pluginOptions' => ['allowClear' => true],
        ],
        'filterInputOptions' => ['prompt' => 'Hiển thị tất cả'],
        'format'=>'raw'
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'donvi',
        'value'=>function($data){
            if($data->donvi == -1){
                return "Sở Y Tế";
            }
            return \common\models\Benhvien::findOne($data->donvi)->name;
        }
        ,'filter'=>false,
        'group'=>true,
        'groupedRow'=>true,                    // move grouped column to a single grouped row
        'groupOddCssClass'=>'kv-grouped-row',  // configure odd group cell css class
        'groupEvenCssClass'=>'kv-grouped-row',
    ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'thangsinh',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'namsinh',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'gioitinh',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'diachi',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'lydodenvien',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'khoaphonglamviec',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'dauhieu_ho',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'dauhieu_sot',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'dauhieu_daumoi',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'dauhieu_matvigiac',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'yeutodichte_tiepxucduongtinh',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'yeutodichte_tiepxucsot',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'yeutodichte_didenquocgia',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'yeutodichte_didenvungdich',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'yeutodichte_dangcachlytainha',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'yeutodichte_quocgiadiadiem',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'hashcode',
    // ],
     [
         'class'=>'\kartik\grid\DataColumn',
         'label'=>'Download',
         'value'=>function($model){
            return \yii\helpers\Html::a('Tải phiếu',['site/download','id'=>$model->id],['data-pjax'=>0]);
         },
         'format'=>'raw'
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