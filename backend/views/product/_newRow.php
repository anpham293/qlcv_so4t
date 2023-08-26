<?php
/**
 * Created by PhpStorm.
 * User: Duong_IT
 * Date: 7/13/2017
 * Time: 2:45 PM
 * @var $indexsanpham integer
 * @var $giatri integer
 * @var $propertiesProducts \common\models\Propertiesvalueproduct
 */
?>
<tr>
    <td>
        <?= \yii\bootstrap\Html::activeTextInput($propertiesProducts, "[$indexsanpham][$giatri]name_value", ['class' => 'form-control name_value']) ?>
    </td>
    <td>
        <?= \yii\bootstrap\Html::activeDropDownList($propertiesProducts, "[$indexsanpham][$giatri]status", [1 => 'Instock', 0 => 'Out of stock'], ['class' => 'form-control status']) ?>
    </td>
    <?php if ($types != 1): ?>
        <td>
            <?= \yii\bootstrap\Html::activeTextInput($propertiesProducts, "[$indexsanpham][$giatri]default_price", ['type' => 'number', 'class' => 'form-control defaultprice']) ?>
        </td>
    <?php endif; ?>
    <?php if ($types == 1): ?>
        <td>
            <?= \yii\bootstrap\Html::activeTextInput($propertiesProducts, "[$indexsanpham][$giatri]mamau", ['class' => 'form-control mamau']) ?>
        </td>
    <?php endif; ?>
    <td>
        <button class="btn btn-danger btn-remove-row" xoa="<?= $giatri ?>" id="xoa-<?= $indexsanpham ?>-<?= $giatri ?>"
                style="margin-right: 0;padding: 5px 10px">
            <i class="fa fa-trash-o"></i>
        </button>
    </td>
    <td class="hidden">
        <?= \yii\bootstrap\Html::activeTextInput($propertiesProducts, "[$indexsanpham][$giatri]properties_id", ['class' => 'form-control id-sanpham', 'value' => $giatri]) ?>
    </td>
</tr>
