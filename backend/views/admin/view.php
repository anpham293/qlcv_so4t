<?php

use common\models\Admin;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Admin */
?>
<div class="admin-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'username',
            'auth_key',
            'password_hash',
            'password_reset_token',
            'email:email',
            'status',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
