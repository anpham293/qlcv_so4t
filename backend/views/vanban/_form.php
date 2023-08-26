<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Vanban */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vanban-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ten')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ngaytao')->textInput() ?>

    <?= $form->field($model, 'kyhieu')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'filevanban')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'admin_id')->textInput() ?>

    <?= $form->field($model, 'loaivanban_id')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
