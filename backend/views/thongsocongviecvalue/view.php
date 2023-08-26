<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Thongsocongviecvalue */
?>
<div class="thongsocongviecvalue-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'thongsoid',
            'congviec',
            'value:ntext',
        ],
    ]) ?>

</div>
