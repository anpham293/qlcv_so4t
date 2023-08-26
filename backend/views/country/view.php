<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Country */
?>
<div class="country-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
        ],
    ]) ?>

</div>
