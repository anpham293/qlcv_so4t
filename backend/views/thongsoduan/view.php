<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Thongsoduan */
?>
<div class="thongsoduan-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'ten:ntext',
        ],
    ]) ?>

</div>
