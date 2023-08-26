<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Vungdich */
?>
<div class="vungdich-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'ten:ntext',
        ],
    ]) ?>

</div>
