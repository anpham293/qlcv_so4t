<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Duan */

?>
<div class="duan-create">
    <?= $this->render('_form', [
        'model' => $model,
        'ids'=>(isset($ids) && $ids!="")?$ids:""
    ]) ?>
</div>
