<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Linhvuc */
?>
<div class="linhvuc-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'ten',
        ],
    ]) ?>

</div>
