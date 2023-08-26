<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Lichsuxulyvandephatsinh */
?>
<div class="lichsuxulyvandephatsinh-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'thoigianxuly',
            'mota:ntext',
            'nguoixuly',
            'vandephatsinh_id',
        ],
    ]) ?>

</div>
