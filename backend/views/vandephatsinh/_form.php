<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Vandephatsinh */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vandephatsinh-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'chitiet')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'nguoitiepnhanxuly')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nguoixulychinh')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'thoigiantiepnhan')->textInput() ?>

    <?= $form->field($model, 'thoigianxulyhoantat')->textInput() ?>

    <?= $form->field($model, 'phieumuon_id')->textInput() ?>

    <?= $form->field($model, 'trangthai')->textInput(['maxlength' => true]) ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
