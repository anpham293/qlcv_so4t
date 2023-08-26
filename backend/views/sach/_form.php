<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Sach */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sach-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ten')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'soluong')->textInput() ?>

    <?= $form->field($model, 'active')->checkbox() ?>

    <?= $form->field($model, 'hot')->checkbox() ?>

    <?= $form->field($model, 'nhaxuatban_id')->textInput() ?>

    <?= $form->field($model, 'tacgia_id')->textInput() ?>

    <?= $form->field($model, 'nguoidich')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'namxb')->textInput() ?>

    <?= $form->field($model, 'mota')->textInput(['maxlength' => true]) ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
