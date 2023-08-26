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
//    [
//        'class' => '\kartik\grid\DataColumn',
//        'attribute' => 'url',
//    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'image',
        'contentOptions' => ['class' => 'text-center'],
        'headerOptions' => ['style' => 'width:100px', 'class' => 'text-center'],
        'value' => function ($data) {
            if ($data->image!=null)
                return \yii\bootstrap\Html::img(Yii::$app->urlManagerFrontend->baseUrl.$data->image, ['width' => '40px']);
            else
                return null;
        },
        'format' => 'raw'
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'name',
    ],

//    [
//        'class'=>'\kartik\grid\DataColumn',
//        'attribute'=>'small_icon',
//    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'description',
        'headerOptions'=>['style'=>'text-align:left; width:600px'],

    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'ord',
        'value'=>function($data){
            return \yii\bootstrap\Html::numberInput('',$data->ord,['control'=>'catproduct', 'vals'=>$data->id,'class'=>"ord-change form-control",'min'=>0]);
        },
        'format' => 'raw',
        'headerOptions'=>['style'=>'text-align:center; width:100px'],
        'contentOptions'=>['style'=>'text-align:center'],
        'filter'=>false
    ],
    // [
    // 'class'=>'\kartik\grid\DataColumn',
    // 'attribute'=>'brief',
    // ],
    // [
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'active',
        'value' => function ($data) {
            return ($data->active == 1) ? "<a control='catproduct' vals=" . $data->id . " class=\"active-change glyphicon glyphicon-ok text-success\"></a>" : "<a control='catproduct' vals=" . $data->id . " class=\"active-change glyphicon glyphicon-remove text-danger\"></a>";
        },
        'filter' => \yii\helpers\Html::activeDropDownList(
            $searchModel, 'active',
            ['1' => 'Có', '0' => 'Không'],
            ['prompt' => 'All', 'class' => 'form-control']
        ),
        'format' => 'raw',
        'headerOptions'=>['style' => 'text-align:center; width:100px'],
        'contentOptions'=>['style' => 'text-align:center'],
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'home',
        'value' => function ($data) {
            return ($data->home == 1) ? "<a control='catproduct' vals=" . $data->id . " class=\"home-change glyphicon glyphicon-ok text-success\"></a>" : "<a control='catproduct' vals=" . $data->id . " class=\"home-change glyphicon glyphicon-remove text-danger\"></a>";
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
    // [
    // 'class'=>'\kartik\grid\DataColumn',
    // 'attribute'=>'seo_title',
    // ],
    // [
    // 'class'=>'\kartik\grid\DataColumn',
    // 'attribute'=>'seo_desc',
    // ],
    // [
    // 'class'=>'\kartik\grid\DataColumn',
    // 'attribute'=>'seo_keyword',
    // ],
    // [
    // 'class'=>'\kartik\grid\DataColumn',
    // 'attribute'=>'lang_id',
    // ],
    [

        'class'=>'\kartik\grid\DataColumn',

        'attribute'=>'parent',
        'value'=>function ($model, $key, $index, $widget) {
            $data='';
            if($model->parent==-1)
                $data= 'Danh mục lớn';
            else
                $data=\common\models\Catproduct::find()->where(['id'=>$model->parent])->one()->name;
            return $data;
        },
        'group'=>true,
        'groupedRow'=>true,                    // move grouped column to a single grouped row
        'groupOddCssClass'=>'kv-grouped-row',  // configure odd group cell css class
        'groupEvenCssClass'=>'kv-grouped-row',


    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'parent',
        'value'=>function($data){
            $a=\common\models\Catproduct::getAllCatproduct($data->id);
            array_unshift($a,['id'=>'-1','name'=>'Not Set']);
            return \kartik\select2\Select2::widget([
                'name' => 'parent',
                'value' => $data->parent,
                'data' => \yii\helpers\ArrayHelper::map($a, 'id', 'name'),
                'options' => ['multiple' => false, 'placeholder' => 'Update parent ...','class'=>'update-parent','vals'=>$data->id,'control'=>'catproduct']
            ]);
        },
        'headerOptions'=>['style'=>'text-align:center; width:200px'],
        'filterType' => \kartik\grid\GridView::FILTER_SELECT2,
        'filter' =>\yii\helpers\ArrayHelper::map(\common\models\Catproduct::find()->all(), 'id', 'name'),
        'filterWidgetOptions' => [
            'pluginOptions' => ['allowClear' => true],
        ],
        'filterInputOptions' => ['prompt' => 'Hiển thị tất cả'],
        'format'=>'raw'
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
