<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Duan */

?>
<div class="duan-view">

    <?php
    if(isset($loi)){
        echo $loi;
    }
    $result = "<table class='table table-bordered table-striped table-hover'><tr><td>Thông số</td><td>Kế hoạch</td><td>Thực hiện</td><td>% Hoàn thành</td><td></td></tr>";
    $thongso2 = \common\models\Thongsoduanvalue::findAll(['duanid' => $model->id]);
    if (empty($thongso2)) {
        echo "Chưa cập nhật";
    } else {

        foreach ($thongso2 as $value2) {
            $value = \common\models\Thongsoduan::findOne($value2->thongsoid);
            if($value->parent==-1)
                $result .= "<tr><td>" . $value->ten . "</td><td>" . number_format($value2->value,$value->thapphan,".",",") . "</td><td>".number_format($value2->dalam,$value->thapphan,".",",")."</td><td>".(($value2->value!=0)?(round(($value2->dalam/$value2->value)*100,2)." %"):"")."</td><td class=\"skip-export kv-align-center kv-align-middle\" style=\"width:80px;\" data-col-seq=\"4\"><a href=\"/admin/thongsoduanvalue/update?id=" . $value2->id . "\" title=\"Update\" data-pjax=\"0\" data-target='ajaxCrudModal' role=\"modal-remote\" data-toggle=\"tooltip\"><span class=\"glyphicon glyphicon-pencil\"></span></a> <a class=\"crud-datatable-action-del\" href=\"/admin/thongsoduanvalue/delete?id=" . $value2->id . "\" title=\"Delete\" data-pjax=\"false\" data-pjax-container=\"crud-datatable-pjax\" role=\"modal-remote\" data-request-method=\"post\" data-toggle=\"tooltip\" data-confirm-title=\"Are you sure?\" data-confirm-message=\"Are you sure want to delete this item\"><span class=\"glyphicon glyphicon-trash\"></span></a></td></tr>";
            else{
                $value3 = \common\models\Thongsoduan::findOne($value->parent);
                $result .= "<tr><td><strong>".$value3->ten."</strong> --| " . $value->ten . "</td><td>" . number_format($value2->value,$value->thapphan,".",",") . "</td><td>".number_format($value2->dalam,$value->thapphan,".",",")."</td><td>".(($value2->value!=0)?(round(($value2->dalam/$value2->value)*100,2)." %"):"")."</td><td class=\"skip-export kv-align-center kv-align-middle\" style=\"width:80px;\" data-col-seq=\"4\"><a href=\"/admin/thongsoduanvalue/update?id=" . $value2->id . "\" title=\"Update\" data-pjax=\"0\" data-target='ajaxCrudModal' role=\"modal-remote\" data-toggle=\"tooltip\"><span class=\"glyphicon glyphicon-pencil\"></span></a> <a class=\"crud-datatable-action-del\" href=\"/admin/thongsoduanvalue/delete?id=" . $value2->id . "\" title=\"Delete\" data-pjax=\"false\" data-pjax-container=\"crud-datatable-pjax\" role=\"modal-remote\" data-request-method=\"post\" data-toggle=\"tooltip\" data-confirm-title=\"Are you sure?\" data-confirm-message=\"Are you sure want to delete this item\"><span class=\"glyphicon glyphicon-trash\"></span></a></td></tr>";
            }
        }
        $result .= "</table>";
        echo $result;
    }
    ?>

</div>
<style>
    .modal.bootstrap-dialog.type-warning.fade.size-normal.in{
        z-index: 99999!important;
    }
</style>