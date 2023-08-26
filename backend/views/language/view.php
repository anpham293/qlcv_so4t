<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Language */
?>
<div class="language-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'code',
            'name',
            'flag:ntext',
            'ord',
            'default',
            'active',
        ],
    ]) ?>

</div>
