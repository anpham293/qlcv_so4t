<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Donvi */
?>
<div class="donvi-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'keyword',
            'text',
        ],
    ]) ?>

</div>
