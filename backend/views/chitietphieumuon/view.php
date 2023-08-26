<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Chitietphieumuon */
?>
<div class="chitietphieumuon-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'soluong',
            'tinhtrang:ntext',
            'phieumuon_id',
            'sach_id',
        ],
    ]) ?>

</div>
