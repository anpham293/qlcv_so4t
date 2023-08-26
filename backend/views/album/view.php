<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Album */
?>
<div class="album-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name_vi',
            'image:ntext',
            'ord',
            'active',
            'name_en',
            'decription:ntext',
        ],
    ]) ?>

</div>
