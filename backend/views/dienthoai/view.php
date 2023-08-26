<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Dienthoai */
?>
<div class="dienthoai-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'hang',
            'ten:ntext',
        ],
    ]) ?>

</div>
