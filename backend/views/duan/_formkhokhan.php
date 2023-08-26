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


        <?= $form->field($model, 'noidung')->textarea(['rows' => 6,'class'=>'form-control']) ?>


        <?php if (!Yii::$app->request->isAjax){ ?>
            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
        <?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
