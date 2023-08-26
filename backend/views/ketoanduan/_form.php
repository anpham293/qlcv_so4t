<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Ketoanduan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ketoanduan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'userid')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\Admin::getKeToan(),'id','ten'),['class'=>'form-control'])->label("Nhân viên") ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
