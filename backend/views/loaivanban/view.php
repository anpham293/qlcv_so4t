<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Loaivanban */
?>
<div class="loaivanban-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'ten',
            'kyhieu',
            'soluong',
        ],
    ]) ?>

</div>
