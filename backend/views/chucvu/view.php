<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Chucvu */
?>
<div class="chucvu-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'ten',
            'isnhanvanban:boolean',
        ],
    ]) ?>

</div>
