<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Office */
?>
<div class="office-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'address:ntext',
            'phone',
            'fax',
            'email:email',
            'ord',
            'active',
            'lang_id',
        ],
    ]) ?>

</div>
