<?php
/**
 * Created by PhpStorm.
 * User: anlai
 * Date: 07-Oct-17
 * Time: 8:19 AM
 */
$config = \common\models\Configure::getConfig();
?>
<div class="container back-white dienthoai">
    <div class="row"> <img class="width100" alt="Viettel Banner" title="Viettel Banner" src="<?=Yii::$app->urlManager->baseUrl.$config['page_banner']?>"></div>
    <h2 class="padding-top-25">Danh sách điện thoại hỗ trợ 4G</h2>
    <div class="padding-top-25 table-responsive">
        <table class="table table-hover table-bordered">
            <tr><th>Hãng sản xuất</th><th>Tên điện thoại</th></tr>
            <?php $temp = "";?>
            <?php foreach ($dienthoai as $index=> $value):?>
                <tr>
                    <?php if($value->hang!=$temp):?>
                        <td rowspan="<?=$datagr[$value->hang]?>"><?=$value->hang?></td>
                    <?php endif;?>
                    <td><?=$value->ten?></td>
                    <?php $temp=$value->hang?>
                </tr>
            <?php endforeach;?>
        </table>
    </div>
</div>
