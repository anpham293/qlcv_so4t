<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Template */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="template-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'type')->dropDownList(\yii\helpers\ArrayHelper::map([
            ['id'=>'hopdong','val'=>'Hợp đồng'],
            ['id'=>'phuluc','val'=>'Phụ lục'],
            ['id'=>'tbchidinh','val'=>'Thông báo chỉ định'],
    ],'id','val'),['class'=>'form-control']) ?>

    <?=Html::label('Tải file template lên (.doc, .docx)','',['class'=>'form-label'])?>
    <?=Html::fileInput('fileupload','',["accept"=>".doc,.docx",'required'=>'required'])?>
  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Tạo mới') : Yii::t('app', 'Chỉnh sửa'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
