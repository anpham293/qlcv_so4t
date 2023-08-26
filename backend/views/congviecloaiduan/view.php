<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Congviecloaiduan */
?>
<div class="congviecloaiduan-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'congviec:ntext',
            'mota:ntext',
            'loaiduanid',
        ],
    ]) ?>

</div>
