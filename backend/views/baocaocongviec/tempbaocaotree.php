<?php /** @var \common\models\Congviec $model */?>
<?php /** @var \common\models\Baocaocongviec $value */?>
<tr <?php if($tiento=="")echo "style='background:#bdf0c8'"?>><td style="font-weight: bolder"><?=$tiento?><?=$index+1?></td><td>
        <strong><?php
            $admin = \common\models\Admin::findOne($value->nguoibaocao);
            echo (is_null($admin))?"#N/A":$admin->ten;
            ?></strong><p style="margin-top: 10px"><?=$value->ngaybaocao?></p>
    </td>
    <td><?=$value->noidungbaocao?></td>
    <td><?=$value->ketquadatduoc?></td>
    <td>
        <?php
            $danhgia = \common\models\Danhgiabaocao::find()->where(['baocao_id'=>$value->id])->all();

        if(!empty($danhgia)): ?>

            <p class="badge badge-success" style="display: block">Đã đánh giá</p>
            <?php if(in_array($model->duan_id,\common\models\Duan::getAllDuAnGranted())|| $model->checkIsGranted()):?>
                <a class="btn btn-default" style="display: block" href="/admin/danhgiabaocao/create?ids=<?=$value->id?>" title="Đánh giá báo cáo" role="modal-remote"><i class="glyphicon glyphicon-plus"></i> Đánh giá</a>
                <a class="btn btn-default" style="display: block" href="/admin/baocaocongviec/viewdanhgia?id=<?=$value->id?>" title="Sửa đánh giá báo cáo" role="modal-remote"><i class="glyphicon glyphicon-eye-open"></i> Xem đánh giá</a>
            <?php endif;?>

        <?php else:?>
            <p class="badge badge-default" style="display: block">Chưa đánh giá</p>
            <?php if(in_array($model->duan_id,\common\models\Duan::getAllDuAnGranted())):?>
                <a class="btn btn-default" style="display: block" href="/admin/danhgiabaocao/create?ids=<?=$value->id?>" title="Đánh giá báo cáo" role="modal-remote"><i class="glyphicon glyphicon-plus"></i> Đánh giá</a>
            <?php endif;?>

        <?php endif;?>
    </td>
    <td><?=($value->filedinhkem!="")?\yii\helpers\Html::a(explode("/",$value->filedinhkem)[2],Yii::$app->urlManagerFrontend->baseUrl.$value->filedinhkem,['data-pjax'=>0,'target'=>'_blank']):""?></td>
    <td> <?php
        $result = "<table class='table table-bordered table-striped table-hover'><tr><td>Thông số</td><td>Giá trị</td></tr>";
        $thongso2 = \common\models\Thongsocongviecvalue::findAll(['congviec' => $value->id]);

        if (empty($thongso2)) {
            echo "";
        } else {
            foreach ($thongso2 as $value2) {
               if($value2->value!=0){
                   $values = \common\models\Thongsoduan::findOne($value2->thongsoid);

                   if(!is_null($values)){
                       if($values->parent==-1)
                           $result .= "<tr><td>" . $values->ten . "</td><td>" . number_format($value2->value,$values->thapphan,"",",") . "</td></tr>";
                       else{
                           $value3 = \common\models\Thongsoduan::findOne($values->parent);
                           $result .= "<tr><td><strong>".$value3->ten."</strong> --| " . $values->ten . "</td><td>" . number_format($value2->value,$values->thapphan,"",",") . "</td></tr>";
                       }
                   }
               }
            }
            $result .= "</table>";
            echo $result;
        }
        ?></td>
    <td><a class="btn btn-default" style="float: right;display: block" href="/admin/baocaocongviec/create?ids=<?=$model->id?>&parent=<?=$value->id?>" title="Tạo mới báo cáo" role="modal-remote"><i class="glyphicon glyphicon-plus"></i> Thêm báo cáo</a>
        <?php if($value->nguoibaocao==Yii::$app->user->id || Yii::$app->user->identity->username=="Superadmin"):?><a class="btn btn-default" style="float: right;display: block" href="/admin/baocaocongviec/update?id=<?=$value->id?>" title="Tạo mới báo cáo" role="modal-remote"><i class="glyphicon glyphicon-edit"></i> Sửa báo cáo</a><?php endif;?></td>
</tr>
