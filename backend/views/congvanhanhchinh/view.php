<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Congvanhanhchinh */
?>
<div class="congvanhanhchinh-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'sokyhieu',
            'ngaybanhanh',
            'ngayhieuluc',
            'nguoiky',
            'trichyeu:ntext',
            'active:boolean',
            'link:ntext',
            'loaivbhc_id',
            'coquanbanhanh_id',
            'Linhvucvanban_id',
        ],
    ]) ?>

</div>
