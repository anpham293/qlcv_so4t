<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Contact */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="contact-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'company_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'slogan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'address1')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hotline')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fax')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email_bcc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'about_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'about_content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'about_image')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'about_url')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'footer')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'copyright')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'logo')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'logo_footer')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'site_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'site_desc')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'site_keyword')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'payment')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'gift')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'lang_id')->textInput() ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
