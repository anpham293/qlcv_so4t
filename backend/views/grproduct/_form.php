<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Grproduct */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="grproduct-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['rows' => 6]) ?>
    <?= $form->field($model, 'active')->checkbox() ?>
    <h4>Danh sách tag sản phẩm</h4>
    <?php echo Html::button('Thêm tag', ['class' => 'btn blue', 'id' => 'btn-them-tag']); ?>
    <div id='taglist'>
        <?php if (isset($model->id)):
        $dem = 0;
        foreach ($model->grproctags as $value):
            ?>
            <div id='div-tag2-<?php echo $dem?>'>
                <div class='col-xs-6'><input class='form-control' type='text' name='tag[]' value="<?php echo $value->tag?>"></div>
                <div class='col-xs-3'><a class='btn btn-default btn-xoa-tag2' data-taget='div-tag2-<?php echo $dem?>'>
                        <i class='fa fa-trash'></i></a></div>
            </div>
        <?php $dem++; endforeach; ?>
        <?php endif;?>
    </div>
    <div class="clearfix"></div>


    <?php if (!Yii::$app->request->isAjax) { ?>
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    <?php } ?>

    <?php ActiveForm::end(); ?>

</div>
