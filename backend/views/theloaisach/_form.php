<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Theloaisach */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="theloaisach-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'theloai_id')->textInput() ?>

    <?= $form->field($model, 'sach_id')->textInput() ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
