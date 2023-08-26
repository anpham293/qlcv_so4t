<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Danhgiabaocao */
?>
<div class="danhgiabaocao-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'baocao_id',
            'nguoidanhgia',
            'noidungdanhgia:ntext',
            'thoigiandanhgia',
            'filedinhkem:ntext',
        ],
    ]) ?>

</div>
