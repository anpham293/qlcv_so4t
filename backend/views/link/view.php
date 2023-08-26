<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Link */
?>
<div class="link-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'url:ntext',
            'image:ntext',
            'content:ntext',
            'ord',
            'active',
            'lang_id',
        ],
    ]) ?>

</div>
