<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Notification */
?>
<div class="notification-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'time',
            'sender',
            'reciever',
            'content:ntext',
            'type',
            'sendername:ntext',
            'issent:boolean',
            'url:ntext',
        ],
    ]) ?>

</div>
