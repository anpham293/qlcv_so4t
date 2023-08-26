<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Slides */
?>
<div class="slides-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
            'image',
            'brief',
        ],
    ]) ?>

</div>
