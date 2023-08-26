<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Configure */
?>
<div class="configure-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'value:ntext',
            'label:ntext',
            'nhom',
        ],
    ]) ?>

</div>
