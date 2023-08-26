<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Slides */
/* @var $form yii\widgets\ActiveForm */ ?>
<div class="slides-form">
    <?php $form = ActiveForm::begin(); ?>
    <div class="col-lg-12 col-md-12 col-sm-12">
        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-12">
        <?= $form->field($model, 'url')->dropDownList(\yii\helpers\ArrayHelper::map(func::getMenu(), 'value', 'text', 'group'), ['id' => 'drop-link']) ?>
        <div class="form-group field-lienkettinh" id="divtinh">
            <label class="control-label" for="lienkettinh">Đường dẫn ngoài</label>
            <input type="text" id="lienkettinh" class="form-control" name="Slides[url]" value="<?php echo $model->url ?>">
            <div class="help-block"></div>
        </div>

        <?= $form->field($model, 'position')->dropDownList(\yii\helpers\ArrayHelper::map([['id' => 'main', 'text' => 'Slide Chính'], ['id' => 'proc', 'text' => 'Slide Phụ'],], 'id', 'text'), ['class' => 'form-control']) ?>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <label class="control-label">Chọn ảnh: </label>
                <?php if (!$model->isNewRecord) { ?>
                    <div class="D-imageboxform">
                        <?php echo Html::img(Yii::$app->urlManagerFrontend->baseUrl . $model->image, ['class' => 'D-imageform']); ?>
                    </div>
                <?php } echo $form->field($model, 'image')->fileInput(['name' => 'imageslide'])->label(false); ?>
        </div>
        &nbsp;
        <div class="col-lg-12 col-md-12 col-sm-12">
            <label class="control-label">Kích hoạt</label>
            <?= $form->field($model, 'active')->checkbox()->label(false) ?>
        </div>
    </div>

    <div class="col-lg-12 col-md-12 col-sm-12">
        <?= $form->field($model, 'ord')->numberInput() ?>
        <?= $form->field($model, 'brief')->textarea() ?>
    </div>
















    <?php if (!Yii::$app->request->isAjax) { ?>
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    <?php } ?>
    <?php ActiveForm::end(); ?>
</div>


<script>
    $(document).ready(function () {
        setTimeout(function () {
            $('#<?=Yii::$app->controller->id?>-name').focus()
        }, 700)
    })
</script>


<script>
    if ($("#drop-link").val() != "link")
        $("#divtinh").html("");
    $(document).ready(function () {
        $(document).on('change', '#drop-link', function () {
            if ($(this).val() != "link") {
                $("#divtinh").html("");
            } else {
                $("#divtinh").html('<label class="control-label" for="lienkettinh">Đường dẫn ngoài</label>' +
                    '<input type="text" id="lienkettinh" class="form-control" name="Slides[url]" value="<?php echo $model->url?>">' +
                    '<div class="help-block">' +
                    '</div>');
                $("#lienkettinh").focus();
            }
        })
    })
</script>