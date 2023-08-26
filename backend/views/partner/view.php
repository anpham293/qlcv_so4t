<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Partner */
?>
<div class="partner-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'image:ntext',
            'url:ntext',
            'position',
            'ord',
            'active',
            'lang_id',
        ],
    ]) ?>

</div>
