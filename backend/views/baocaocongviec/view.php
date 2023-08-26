<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Baocaocongviec */
?>
<div class="baocaocongviec-view">
 
    <table class="table table-hover table-striped table-bordered">
        <tr>
            <th>STT</th>
            <th>Người đánh giá</th>
            <th>Thời gian</th>
            <th>Nội dung</th>
            <th>File đính kèm</th>
        </tr>
        <?php $danhgia = \common\models\Danhgiabaocao::findAll(['baocao_id'=>$model->id]);
            foreach ($danhgia as $index=> $value):
                $admin = \common\models\Admin::findOne($value->nguoidanhgia);
        ?>
                <tr>
                    <td><?=($index+1)?></td>
                    <td><?=(is_null($admin)?"#N/A":$admin->ten)?></td>
                    <td><?=$value->thoigiandanhgia?></td>
                    <td><?=$value->noidungdanhgia?></td>
                    <td><?=($value->filedinhkem!="")?\yii\helpers\Html::a(explode("/",$value->filedinhkem)[2],Yii::$app->urlManagerFrontend->baseUrl.$value->filedinhkem,['data-pjax'=>0,'target'=>'_blank']):""?></td>
                </tr>
        <?php endforeach;?>
    </table>

</div>
