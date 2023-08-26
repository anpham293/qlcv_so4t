<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Ketoanduan */
?>
<div class="ketoanduan-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'userid',
            'ngaygan',
            'duan_id',
        ],
    ]) ?>

</div>
