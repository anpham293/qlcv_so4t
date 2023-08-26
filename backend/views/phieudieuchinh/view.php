<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Phieudieuchinh */
?>
<div class="phieudieuchinh-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nguoidieuchinh',
            'ngaydieuchinh',
            'lydodieuchinh',
            'soluong',
            'sach_id',
        ],
    ]) ?>

</div>
