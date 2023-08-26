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
        'attribute'=>'tenloai',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'label'=>'Các công việc',
        'value'=>function($data){

            $resutl ="<style>.width50{width: 3%!important;}</style><a class=\"btn btn-default\" href=\"/admin/congviecloaiduan/create?ids=".$data->id."\" title=\"Thêm mới\" role=\"modal-remote\"><i class=\"glyphicon glyphicon-plus\"></i></a><table class='table table-striped table-bordered table-hover'><tr><th>STT</th><th>Công việc</th><th>Mô tả</th><th class='width50'></th></tr>";
                $data=\common\models\Congviecloaiduan::find()->where(['loaiduanid'=>$data->id])->all();
                foreach ($data as $index=> $value){
                    $resutl.="<tr><td>".($index+1)."</td><td>".$value->congviec."</td><td>".nl2br($value->mota)."</td><td style='width: 50px;'><a href=\"/admin/congviecloaiduan/update?id=".$value->id."\" title=\"Update\" data-pjax=\"0\" role=\"modal-remote\" data-toggle=\"tooltip\"><span class=\"glyphicon glyphicon-pencil\"></span></a><a class=\"crud-datatable-action-del\" href=\"/admin/congviecloaiduan/delete?id=".$value->id."\" title=\"Delete\" data-pjax=\"false\" data-pjax-container=\"crud-datatable-pjax\" role=\"modal-remote\" data-request-method=\"post\" data-toggle=\"tooltip\" data-confirm-title=\"Are you sure?\" data-confirm-message=\"Are you sure want to delete this item\"><span class=\"glyphicon glyphicon-trash\"></span></a></td></tr>";
                }
            $resutl.="</table>";
                return $resutl;
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