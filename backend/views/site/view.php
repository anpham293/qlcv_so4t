<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Duan */
?>
<div class="duan-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'ten:ntext',
            'mota:ntext',
            'nguoitao',
            'nguoiphutrach',
            'loaiduan_id',
        ],
    ]) ?>

</div>
