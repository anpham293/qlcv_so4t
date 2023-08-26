<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Picture */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="picture-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="col-lg-12 col-md-12 col-sm-12">
        <?= $form->field($model, 'name')->textInput() ?>
    </div>

    <div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <label class="control-label">Chọn ảnh:</label>
            &nbsp;
            <?php
            if (!$model->isNewRecord) {
                ?>
                <div class="D-imageboxform">
                    <?php
                    echo Html::img(Yii::$app->urlManagerFrontend->baseUrl . $model->image, ['class' => 'D-imageform']);
                    ?>
                </div>
                <?php
            }
            echo $form->field($model, 'image')->fileInput(['name'=>'imagepicture'])->label(false); ?>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <?= $form->field($model, 'album_id')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\Album::find()->all(),'id','name_vi'),['prompt'=>'Chọn...','class'=>'form-control'])?>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <?= $form->field($model, 'ord')->numberInput() ?>
        </div>
    </div>

    <?= $form->field($model, 'home')->checkbox() ?>





	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create':'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
<script>
    $(document).ready(function () {
        setTimeout(function () {
            $('#<?=Yii::$app->controller->id?>-name').focus()
        },700)
    })
</script>