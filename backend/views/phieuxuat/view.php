<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Phieuxuat */
?>
<div class="phieuxuat-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'soluong',
            'ngay',
            'nguoixuat',
            'lydoxuat',
            'sach_id',
        ],
    ]) ?>

</div>
