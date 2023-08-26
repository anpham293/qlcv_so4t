<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Video */
?>
<div class="video-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'url:url',
            'code',
            'path',
            'ord',
            'active',
        ],
    ]) ?>

</div>
