<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Propertiesvalue */
?>
<div class="propertiesvalue-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'value',
            'ord',
            'properties_id',
        ],
    ]) ?>

</div>
