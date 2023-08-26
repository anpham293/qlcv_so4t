<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Shipping */
?>
<div class="shipping-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'mucduoi',
            'muctren',
            'shipping_fee',
        ],
    ]) ?>

</div>
