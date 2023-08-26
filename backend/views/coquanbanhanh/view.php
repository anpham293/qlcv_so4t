<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Coquanbanhanh */
?>
<div class="coquanbanhanh-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'ten',
            'ghichu:ntext',
        ],
    ]) ?>

</div>
