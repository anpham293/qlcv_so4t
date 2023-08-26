<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Hangmucchiphi */
?>
<div class="hangmucchiphi-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'tenhangmuc:ntext',
        ],
    ]) ?>

</div>
