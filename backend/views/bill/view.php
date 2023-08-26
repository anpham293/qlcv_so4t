<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Bill */
?>
<div class="bill-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'std',
            'email:email',
            'content:ntext',
            'address',
            'order_time',
        ],
    ]) ?>

</div>
