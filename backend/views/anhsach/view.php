<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Anhsach */
?>
<div class="anhsach-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'img:ntext',
            'thumbnail:ntext',
            'sach_id',
            'ord',
            'active:boolean',
        ],
    ]) ?>

</div>
