<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Grproduct */
?>
<div class="grproduct-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name:ntext',
        ],
    ]) ?>

</div>
