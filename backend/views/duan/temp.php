<?php
if (!function_exists('getBaoCaoTree')) {
    function getBaoCaoTree($model, $data, $tientostt)
    {
        $t = "";
        foreach ($data as $index => $dulieu) {
            $dequy = \common\models\Baocaocongviec::find()->where(['parent' => $dulieu->id])->all();
            if (!empty($dequy))
                $t .= Yii::$app->controller->renderPartial('tempbaocaotree', ['model' => $model, 'value' => $dulieu, 'index' => $index, 'tiento' => ($tientostt!="")?("".$tientostt."."):$tientostt]) . getBaoCaoTree($model, $dequy, (($tientostt!="")?("".$tientostt."."):$tientostt). ($index + 1));
            else
                $t .= Yii::$app->controller->renderPartial('tempbaocaotree', ['model' => $model, 'value' => $dulieu, 'index' => $index, 'tiento' => ($tientostt!="")?("".$tientostt."."):$tientostt]);
        }
        return $t;
    }
}
?>
<table class="table table-striped table-hover table-bordered">
    <tr><th  colspan="8" style="background: #f6ffad">Tiến độ thực hiện <a class="btn btn-default" style="float: right" href="/admin/baocaocongviec/create?ids=<?=$model->id?>" title="Tạo mới báo cáo" role="modal-remote"><i class="glyphicon glyphicon-plus"></i> Thêm báo cáo</a></th></tr>
    <tbody style="max-height: 250px;overflow:scroll; width: 100%;">
    <?php if(empty($model->baocaocongviecs)):?>
        <tr><td colspan="4">Chưa có cập nhật nào</td></tr>
    <?php else:?>
        <tr><th>STT</th><th>Người báo cáo</th><th>Nội dung</th><th>Mô tả chi tiết</th><th>Đánh giá công việc</th><th>File đính kèm</th><th>Thông số</th><th></th></tr>
            <?= getBaoCaoTree($model,$model->baocaocongviecs,"")?>
        <?php
    endif;
    ?>
    </tbody>
</table>
