<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Duan */
?>
<div class="duan-view">
 
    <table class="table table-bordered table-striped table-hover">
        <tr><th>STT</th><th>Khó khăn, vướng mắc</th><th>Người viết</th><th>Ghi nhận</th></tr>
        <?php $listkhokhan = \yii\helpers\Json::decode($model->khokhanvuongmac);
            if(is_array($listkhokhan)):
                foreach ($listkhokhan as $index => $value):
                    $admin = \common\models\Admin::findOne(['username'=>$value["nguoiviet"]]);
        ?>
            <tr><th><?=($index+1)?></th><td title="<?=$value["nguoiviet"]?>"><?=$value["noidung"]?></td><td><?=(is_null($admin)?$value["nguoiviet"]:$admin->ten)?></td><td><?=$value["thoigian"]?></td></tr>
        <?php endforeach;endif;?>
    </table>

</div>
