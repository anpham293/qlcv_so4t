<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Tacgia */
?>
<div class="tacgia-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'ten',
            'thongtin:ntext',
        ],
    ]) ?>

</div>
