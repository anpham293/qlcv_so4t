<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Anhsach */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="anhsach-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'img')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'thumbnail')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'sach_id')->textInput() ?>

    <?= $form->field($model, 'ord')->textInput() ?>

    <?= $form->field($model, 'active')->checkbox() ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
