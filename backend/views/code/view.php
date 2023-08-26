<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Code */
?>
<div class="code-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'code',
            'value',
            'type',
            'active',
            'cond',
            'ordvalue',
        ],
    ]) ?>

</div>
