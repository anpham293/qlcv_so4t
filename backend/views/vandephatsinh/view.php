<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Vandephatsinh */
?>
<div class="vandephatsinh-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'chitiet:ntext',
            'nguoitiepnhanxuly',
            'nguoixulychinh',
            'thoigiantiepnhan',
            'thoigianxulyhoantat',
            'phieumuon_id',
            'trangthai',
        ],
    ]) ?>

</div>
