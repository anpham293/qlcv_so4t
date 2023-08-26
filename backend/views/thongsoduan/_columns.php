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
        'attribute'=>'ten',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'label'=>'Thông số bậc 2',
        'value'=>function($data){
            $result= \yii\helpers\Html::a('<i class="glyphicon glyphicon-plus"></i>', ['create','parent'=>$data->id],
                ['role'=>'modal-remote','title'=> 'Create new Thông số Công việc','class'=>'btn btn-default']);
            $result.="<table class='table table-bordered table-striped table-hover'><tr><th>Thông số</th><th>Số phần thập phân</th><th></th></tr>";
            $thongso2 = \common\models\Thongsoduan::findAll(['parent'=>$data->id]);
            foreach ($thongso2 as $value){
                $result.="<tr><td>".$value->ten."</td><td>".$value->thapphan."</td><td class=\"skip-export kv-align-center kv-align-middle\" style=\"width:80px;\" data-col-seq=\"4\"><a href=\"/admin/thongsoduan/view?id=".$value->id."\" title=\"View\" data-pjax=\"0\" role=\"modal-remote\" data-toggle=\"tooltip\"><span class=\"glyphicon glyphicon-eye-open\"></span></a> <a href=\"/admin/thongsoduan/update?id=".$value->id."\" title=\"Update\" data-pjax=\"0\" role=\"modal-remote\" data-toggle=\"tooltip\"><span class=\"glyphicon glyphicon-pencil\"></span></a> <a class=\"crud-datatable-action-del\" href=\"/admin/thongsoduan/delete?id=".$value->id."\" title=\"Delete\" data-pjax=\"false\" data-pjax-container=\"crud-datatable-pjax\" role=\"modal-remote\" data-request-method=\"post\" data-toggle=\"tooltip\" data-confirm-title=\"Are you sure?\" data-confirm-message=\"Are you sure want to delete this item\"><span class=\"glyphicon glyphicon-trash\"></span></a></td></tr>";
            }
            $result.="</table>";
            return $result;
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