<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Khaibaoyte */
?>
<div class="khaibaoyte-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'loaikhaibao',
            'mabenhnhan',
            'sodienthoai',
            'hovaten:ntext',
            'nguoithan1:ntext',
            'nguoithan2:ntext',
            'ngaysinh',
            'thangsinh',
            'namsinh',
            'gioitinh',
            'diachi:ntext',
            'tinhthanhphohktt:ntext',
            'quanhuyenhktt:ntext',
            'xaphuonghktt:ntext',
            'lydodenvien:ntext',
            'khoaphonglamviec',
            'dauhieu_ho:boolean',
            'dauhieu_sot:boolean',
            'dauhieu_daumoi:boolean',
            'dauhieu_matvigiac:boolean',
            'yeutodichte_tiepxucduongtinh:boolean',
            'yeutodichte_tiepxucsot:boolean',
            'yeutodichte_didenquocgia:boolean',
            'yeutodichte_didenvungdich:boolean',
            'yeutodichte_dangcachlytainha:boolean',
            'yeutodichte_quocgiadiadiem:ntext',
            'hashcode',
            'privatekey',
        ],
    ]) ?>

</div>
