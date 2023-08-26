<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Phieunhap */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="phieunhap-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'soluong')->textInput() ?>

    <?= $form->field($model, 'ngaynhap')->textInput() ?>

    <?= $form->field($model, 'nguoinhap')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sach_id')->textInput() ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
