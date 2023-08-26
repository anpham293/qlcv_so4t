<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Benhvien */
?>
<div class="benhvien-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'subdomain',
            'active:boolean',
        ],
    ]) ?>

</div>
