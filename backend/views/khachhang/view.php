<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Khachhang */
?>
<div class="khachhang-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'ten',
            'email:email',
            'username',
            'password',
            'gioitinh',
            'diachi',
            'active:boolean',
            'sdt',
            'passwordresettoken',
            'ghichu',
            'blockreason',
            'cmnd',
            'maphieumuon',
        ],
    ]) ?>

</div>
