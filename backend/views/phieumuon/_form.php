<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Phieumuon */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="phieumuon-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'ngaymuon')->textInput() ?>

    <?= $form->field($model, 'ghichu')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'nguoilap')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'khachhang_id')->textInput() ?>

    <?= $form->field($model, 'ngaytra')->textInput() ?>

    <?= $form->field($model, 'trangthaiphieu')->dropDownList([ 'chuatra' => 'Chuatra', 'datra' => 'Datra', 'xulyvandephatsinh' => 'Xulyvandephatsinh', 'xulyvandexong' => 'Xulyvandexong', ], ['prompt' => '']) ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
