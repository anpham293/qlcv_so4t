<?php

use common\models\Chucvu;
use common\models\Donvi;
use common\models\Phongban;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Admin */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="admin-form">

    <?php $form = ActiveForm::begin(); ?>
    <label class="control-label" for="">Đơn vị:</label>


    <?= $form->field($model, 'status')->dropDownList(\yii\helpers\ArrayHelper::map([['id'=>10,'name'=>'Active'],['id'=>0,'name'=>'Inactive']],'id','name'))->label("Set Active") ?>
    <?= $form->field($model, 'ten')->textInput()->label('Tên') ?>
    <?= $form->field($model, 'phongban_id')->dropDownList(ArrayHelper::map(Phongban::find()->orderBy('ord asc')->all(),'id','ten')) ?>
    <?= $form->field($model, 'chucvu_id')->dropDownList(ArrayHelper::map(Chucvu::find()->all(),'id','ten')) ?>
    <?= $form->field($model, 'donvi_id')->dropDownList(ArrayHelper::map(\common\models\Admin::getAdminForQuanly(),'id','ten','group')) ?>



    <?= Html::label('Đổi mật khẩu','',['class'=>'form-label']).Html::passwordInput('password','',['class'=>'form-control']); ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Tạo mới') : Yii::t('app', 'Chỉnh sửa'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
<script>
    $(document).ready(function () {
        $(".select2s").select2();
    })
</script>
