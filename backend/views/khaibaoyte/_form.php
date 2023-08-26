<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Khaibaoyte */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="khaibaoyte-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'loaikhaibao')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mabenhnhan')->textInput() ?>

    <?= $form->field($model, 'sodienthoai')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hovaten')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'ngaysinh')->textInput() ?>

    <?= $form->field($model, 'thangsinh')->textInput() ?>

    <?= $form->field($model, 'namsinh')->textInput() ?>

    <?= $form->field($model, 'gioitinh')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'diachi')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'lydodenvien')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'khoaphonglamviec')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dauhieu_ho')->checkbox() ?>

    <?= $form->field($model, 'dauhieu_sot')->checkbox() ?>

    <?= $form->field($model, 'dauhieu_daumoi')->checkbox() ?>

    <?= $form->field($model, 'dauhieu_matvigiac')->checkbox() ?>

    <?= $form->field($model, 'yeutodichte_tiepxucduongtinh')->checkbox() ?>

    <?= $form->field($model, 'yeutodichte_tiepxucsot')->checkbox() ?>

    <?= $form->field($model, 'yeutodichte_didenquocgia')->checkbox() ?>

    <?= $form->field($model, 'yeutodichte_didenvungdich')->checkbox() ?>

    <?= $form->field($model, 'yeutodichte_dangcachlytainha')->checkbox() ?>

    <?= $form->field($model, 'yeutodichte_quocgiadiadiem')->checkbox() ?>

    <?= $form->field($model, 'hashcode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'privatekey')->textInput(['maxlength' => true]) ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
