<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Thongsoketoan */
?>
<div class="thongsoketoan-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'congvandinhkem:ntext',
            'tencongvan:ntext',
            'duan_id',
            'userid',
            'ngaytao',
        ],
    ]) ?>

</div>
