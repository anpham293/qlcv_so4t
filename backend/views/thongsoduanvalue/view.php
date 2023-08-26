<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Thongsoduanvalue */
?>
<div class="thongsoduanvalue-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'thongsoid',
            'duanid',
            'value:ntext',
        ],
    ]) ?>

</div>
