<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Phongban */
?>
<div class="phongban-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'ten',
        ],
    ]) ?>

</div>
