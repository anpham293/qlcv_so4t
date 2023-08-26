<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Linhvucvanban */
?>
<div class="linhvucvanban-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'ten',
            'ghichu:ntext',
        ],
    ]) ?>

</div>
