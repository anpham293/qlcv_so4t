<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model common\models\Catproduct */

/* @var $form yii\widgets\ActiveForm */
/** @var $property \common\models\Detailproperties */


?>

<div class="catproduct-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="catnew-form row">

        <div class="col-xs-12">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-xs-6">
            <?= $form->field($model, 'parent')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\Catproduct::getAllCatproduct($model->id), 'id', 'name'), ['class' => 'form-control', 'prompt' => 'chon...']) ?>
        </div>

        <div class="col-xs-6">
            <?= $form->field($model, 'small_icon')->textInput() ?>
        </div>

        <div class="col-xs-12">
            <?= $form->field($model, 'image')->fileInput() ?>
        </div>

        <div class="col-xs-12">
            <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
        </div>

        <?php if($model->parent==-1): ?>
        <div class="col-xs-12">
            <?= $form->field($model, 'menustyle')->dropDownList([0=>'Menu thường', 1=>'Mega menu']) ?>
        </div>

        <div class="col-xs-12">
            <?= $form->field($model, 'background')->textInput() ?>
        </div>
        <?php endif; ?>

        <?php if (!$model->isNewRecord): ?>
            <div class="col-xs-6">
                <?= $form->field($model, 'seo_title')->textInput(['maxlength' => true]) ?>
            </div>

            <div class="col-xs-6">
                <?= $form->field($model, 'seo_keyword')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-xs-12">
                <?= $form->field($model, 'seo_desc')->textarea(['rows' => 6]) ?>
            </div>
        <?php endif; ?>

        <?php if (!Yii::$app->request->isAjax) { ?>
            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
        <?php } ?>
        <?php ActiveForm::end(); ?>
    </div>
</div>
<script>
    $(document).ready(function () {
        setTimeout(function () {
            $('#<?=Yii::$app->controller->id?>-name').focus()
        },700)
    })
</script>