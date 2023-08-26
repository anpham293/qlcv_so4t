<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Anhsanpham */
?>
<div class="anhsanpham-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'image:ntext',
            'ord',
            'default',
            'product_id',
        ],
    ]) ?>

</div>
