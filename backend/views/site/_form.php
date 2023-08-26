<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
date_default_timezone_set("Asia/Ho_Chi_Minh");
/* @var $this yii\web\View */
/* @var $model common\models\Duan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="duan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ten')->textInput(['rows' => 6]) ?>

    <?= $form->field($model, 'mota')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'tongdientich')->textInput(['rows' => 6]) ?>


    <?= $form->field($model, 'nguoiphutrach')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\Admin::find()->where('phongban_id<>0')->all(),'id','ten')) ?>

    <?= $form->field($model, 'loaiduan_id')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\Loaiduan::find()->all(),'id','tenloai')) ?>
    <?= $form->field($model, 'ngaybatdau')->input('date') ?>
    <?= $form->field($model, 'deadline')->input('date') ?>
    <?= $form->field($model, 'status')->dropDownList(\common\models\Duan::$statuslist,['class'=>'form-control']) ?>



	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
<script>
    $("#duan-nguoiphutrach").select2();
    $("#duan-loaiduan_id").select2();
</script>