<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Album */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="album-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name_vi')->textInput(['maxlength' => true]) ?>

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
        echo $form->field($model, 'image')->fileInput(['name'=>'imagealbum'])->label(false);

    ?>

    <?= $form->field($model, 'ord')->numberInput() ?>

    <?= $form->field($model, 'active')->checkbox() ?>



    <?php if (!Yii::$app->request->isAjax) { ?>
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    <?php } ?>

    <?php ActiveForm::end(); ?>

</div>
