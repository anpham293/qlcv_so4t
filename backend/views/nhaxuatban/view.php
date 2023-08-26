<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Nhaxuatban */
?>
<div class="nhaxuatban-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'ten',
            'ghichu',
        ],
    ]) ?>

</div>
