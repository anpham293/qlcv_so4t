<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Catnew */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="catnew-form row">

    <?php $form = ActiveForm::begin(); ?>
    <div class="col-xs-12">
        <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'placeholder' => $model->attributeLabels()['name']]) ?>
    </div>
    <div class="col-xs-6">
        <?= $form->field($model, 'position')->numberInput(['min'=>0]) ?>
    </div>

    <div class="col-xs-6">
        <?= $form->field($model, 'ord')->numberInput() ?>
    </div>

    <div class="col-xs-3">
        <?= $form->field($model, 'active')->checkbox() ?>
    </div>
    <div class="col-xs-6">
        <?= $form->field($model, 'home')->checkbox() ?>
    </div>
    <div class="col-xs-12">
        <?= $form->field($model, 'parent')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\Catnew::getAllCat($model->id), 'id', 'name'), ['class' => 'form-control','prompt'=>'chọn...']) ?>
    </div>

    <?php if (!$model->isNewRecord):?>
    <div class="col-xs-12">
        <?= $form->field($model, 'seo_title')->textInput(['maxlength' => true, 'placeholder' => $model->attributeLabels()['seo_title']]) ?>

        <?= $form->field($model, 'seo_desc')->textarea(['rows' => 6, 'placeholder' => $model->attributeLabels()['seo_desc']]) ?>

        <?= $form->field($model, 'seo_keyword')->textInput(['maxlength' => true, 'placeholder' => $model->attributeLabels()['seo_keyword']]) ?>

    </div>
    <?php endif;?>
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
        },700)
    })
</script>