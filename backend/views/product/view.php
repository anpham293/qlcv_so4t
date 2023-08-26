<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Product */
?>
<div class="product-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'url:ntext',
            'code',
            'brief:ntext',
            'decription:ntext',
            'retail',
            'sale',
            'status',
            'ord',
            'home',
            'hot',
            'luotxem',
            'active',
            'seo_title',
            'seo_desc:ntext',
            'seo_keyword:ntext',
            'cat_product_id',
            'brand_id',
        ],
    ]) ?>

</div>
