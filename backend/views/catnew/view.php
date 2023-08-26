<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Catnew */
?>
<div class="catnew-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'url:ntext',
            'name',
            'position',
            [
                'attribute' => 'active',
                'value' => ($model->active==1)?'Có':'Không',
            ],
            [
                'attribute' => 'home',
                'value' => ($model->home==1)?'Có':'Không',
            ],
            'ord',
            'seo_title',
            'seo_desc:ntext',
            'seo_keyword',
            [
                'attribute' => 'parent',
                'value' => \common\models\Catnew::find()->where(['id'=>$model->id])->one()->name, // or use 'usertable.name'
            ],
        ],
    ]) ?>

</div>
