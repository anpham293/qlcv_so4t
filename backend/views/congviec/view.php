<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Congviec */
?>
<div class="congviec-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'tencongviec:ntext',
            'motacongviec:ntext',
            'ngaygiao',
            'ngayhoanthanh',

        ],
    ]) ?>

</div>
