<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Yeucaubosung */
?>
<div class="yeucaubosung-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nguoiyeucau',
            'noidungyeucau:ntext',
            'congviec_id',
        ],
    ]) ?>

</div>
