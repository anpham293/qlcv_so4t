<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Catproduct */
?>
<div class="catproduct-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'url:ntext',
            'name',
            'image:ntext',
            'small_icon:ntext',
            'description:ntext',
            'ord',
            'brief',
            'home',
            'active',
            'seo_title',
            'seo_desc:ntext',
            'seo_keyword',
            'lang_id',
            'parent',
        ],
    ]) ?>

</div>
