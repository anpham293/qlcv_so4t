<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Thongsocongviecvalue */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="thongsocongviecvalue-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'thongsoid')->textInput() ?>

    <?= $form->field($model, 'congviec')->textInput() ?>

    <?= $form->field($model, 'value')->textarea(['rows' => 6]) ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
