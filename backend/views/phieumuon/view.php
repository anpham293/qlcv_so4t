<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Phieumuon */
?>
<div class="phieumuon-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'ngaymuon',
            'ghichu:ntext',
            'nguoilap',
            'khachhang_id',
            'ngaytra',
            'trangthaiphieu',
        ],
    ]) ?>

</div>
