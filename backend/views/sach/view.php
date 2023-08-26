<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Sach */
?>
<div class="sach-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'ten',
            'soluong',
            'active:boolean',
            'hot:boolean',
            'nhaxuatban_id',
            'tacgia_id',
            'nguoidich',
            'namxb',
            'mota',
        ],
    ]) ?>

</div>
