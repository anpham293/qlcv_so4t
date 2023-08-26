<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Danhgiabaocao */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="danhgiabaocao-form">

    <?php $form = ActiveForm::begin(); ?>



    <?= $form->field($model, 'noidungdanhgia')->textarea(['rows' => 6]) ?>


    <div class="form-group">
        <label class="control-label">File đính kèm</label>
        <?= Html::fileInput('fileupload') ?>
    </div>
  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
