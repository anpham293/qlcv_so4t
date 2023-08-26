<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Page */
?>
<div class="page-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'url:ntext',
            'content:ntext',
            'seo_title',
            'seo_desc:ntext',
            'seo_keyword',
            'active',
            'ord',
            'lang_id',
        ],
    ]) ?>

</div>
