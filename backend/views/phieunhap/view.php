<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Phieunhap */
?>
<div class="phieunhap-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'soluong',
            'ngaynhap',
            'nguoinhap',
            'sach_id',
        ],
    ]) ?>

</div>
