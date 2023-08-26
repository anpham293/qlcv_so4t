<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Loaiduan */
?>
<div class="loaiduan-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'tenloai',
        ],
    ]) ?>

</div>
