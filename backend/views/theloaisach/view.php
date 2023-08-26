<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Theloaisach */
?>
<div class="theloaisach-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'theloai_id',
            'sach_id',
        ],
    ]) ?>

</div>
