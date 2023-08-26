<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Theloai */
?>
<div class="theloai-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'ten',
            'ghichu:ntext',
            'parent',
            'active:boolean',
            'order',
        ],
    ]) ?>

</div>
