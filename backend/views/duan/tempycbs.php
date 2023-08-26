<table class="table table-striped table-hover table-bordered">
    <tr><th  colspan="8">Yêu cầu bổ sung <?php if(Yii::$app->user->can("yeucaubosung/create")):?> <a class="btn btn-default" style="float: right" href="/admin/yeucaubosung/create?ids=<?=$model->id?>" title="Tạo mới yêu cầu bổ sung" role="modal-remote"><i class="glyphicon glyphicon-plus"></i> Thêm yêu cầu</a><?php endif;?></th></tr>
    <tbody style="max-height: 250px;overflow:scroll; width: 100%;">
    <?php $yeucau = \common\models\Yeucaubosung::find()->where(['congviec_id'=>$model->id])->all();
    if(empty($yeucau)):?>
        <tr><td colspan="4">Chưa có</td></tr>
    <?php else:?>
        <tr><th>STT</th><th>Người yêu cầu</th><th>Nội dung</th></tr>
            <?php
                    foreach ($yeucau as $index=> $value){
                        $admin = \common\models\Admin::findOne($value->nguoiyeucau);
                        echo "<tr><td>".($index+1)."</td><td>".(is_null($admin)?"#N/A":$admin->ten)."</td><td>".nl2br($value->noidungyeucau)."</td></tr>";
                    }
            ?>
        <?php
    endif;
    ?>
    </tbody>
</table>
