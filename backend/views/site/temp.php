<table class="table table-striped table-hover table-bordered">
    <tr><th colspan="6">Báo cáo tiến độ thực hiện <a class="btn btn-default" style="float: right" href="/admin/baocaocongviec/create?ids=<?=$model->id?>" title="Tạo mới báo cáo" role="modal-remote"><i class="glyphicon glyphicon-plus"></i> Thêm báo cáo</a></th></tr>
    <tbody style="max-height: 250px;overflow:scroll; width: 100%">
    <?php if(empty($model->baocaocongviecs)):?>
        <tr><td>Chưa có báo cáo nào</td></tr>
    <?php else:?>
        <tr><th>STT</th><th>Người báo cáo</th><th>Nội dung</th><th>Kết quả</th></tr>
        <?php foreach ($model->baocaocongviecs as $index=> $value):/** @var \common\models\Baocaocongviec $value */?>
            <tr><td><?=$index+1?></td><td>
                    <strong><?php
                        $admin = \common\models\Admin::findOne($value->nguoibaocao);
                        echo (is_null($admin))?"#N/A":$admin->ten;
                        ?></strong><p style="margin-top: 10px"><?=$value->ngaybaocao?></p>
                </td>
                <td><?=$value->noidungbaocao?></td>
                <td><?=$value->ketquadatduoc?></td>
            </tr>
        <?php endforeach;
    endif;
    ?>
    </tbody>
</table>