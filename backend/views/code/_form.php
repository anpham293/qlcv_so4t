<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Code */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="code-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>
    <div class="clearfix">
        <div class="col-md-8" style="padding: 0 5px 0 0">
            <?= $form->field($model, 'value')->numberInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4" style="padding: 0">
            <?= $form->field($model, 'type')->dropDownList(\yii\helpers\ArrayHelper::map([
                ['id'=>'%','val'=>'%'],
                ['id'=>'£','val'=>'£'],
            ],'id','val'), ['maxlength' => true]) ?>
        </div>
    </div>
    <div class="clearfix">
        <div class="col-md-8" style="padding: 0 5px 0 0">
            <?= $form->field($model, 'cond')->dropDownList(\yii\helpers\ArrayHelper::map([
                    ['id'=>'<','val'=>'Nhỏ hơn'],
                    ['id'=>'>','val'=>'Lớn hơn'],
            ],'id','val'), ['maxlength' => true]) ?>
        </div>
        <div class="col-md-4" style="padding: 0">
            <?= $form->field($model, 'ordvalue')->numberInput(['maxlength' => true]) ?>
        </div>
    </div>
    <?= $form->field($model, 'active')->checkbox() ?>

    <?php if (!Yii::$app->request->isAjax) { ?>
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    <?php } ?>

    <?php ActiveForm::end(); ?>

</div>
