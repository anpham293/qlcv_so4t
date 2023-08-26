<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Properties */
?>
<div class="properties-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'ord',
            'active',
        ],
    ]) ?>

</div>
