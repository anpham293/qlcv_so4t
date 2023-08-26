<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\modules\auth\models\AuthItem */
?>
<div class="auth-item-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
            'type',
            'description:ntext',
            'rule_name',
            'data',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
