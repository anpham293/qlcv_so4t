<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Khachhang */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="khachhang-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ten')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gioitinh')->dropDownList([ 'nam' => 'Nam', 'nu' => 'Nu', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'diachi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'active')->checkbox() ?>

    <?= $form->field($model, 'sdt')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'passwordresettoken')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ghichu')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'blockreason')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cmnd')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'maphieumuon')->textInput(['maxlength' => true]) ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
