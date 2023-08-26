<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Lichsuxulyvandephatsinh */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lichsuxulyvandephatsinh-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'thoigianxuly')->textInput() ?>

    <?= $form->field($model, 'mota')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'nguoixuly')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vandephatsinh_id')->textInput() ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
