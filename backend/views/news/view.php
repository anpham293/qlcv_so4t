<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\News */
?>
<div class="news-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'image:ntext',
            'url:ntext',
            'brief',
            'content:ntext',
            'posted_date',
            'hot',
            'home',
            'active',
            'luotxem',
            'tags:ntext',
            'seo_title',
            'seo_keyword',
            'seo_desc',
            'lang_id',
            'cat_new_id',
        ],
    ]) ?>

</div>
