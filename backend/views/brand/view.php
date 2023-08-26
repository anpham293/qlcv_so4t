<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Brand */
?>
<div class="brand-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'image:ntext',
            'url:ntext',
            'description:ntext',
            'ord',
            'active',
            'home',
            'seo_title',
            'seo_desc:ntext',
            'seo_keyword',
            'lang_id',
        ],
    ]) ?>

</div>
