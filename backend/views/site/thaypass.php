<?php
use yii\helpers\Html;
use johnitvn\ajaxcrud\CrudAsset;
use kartik\form\ActiveForm;


/* @var $this yii\web\View */

$this->title = 'Thay đổi mật khẩu';
$this->params['breadcrumbs'][] = ['name'=>$this->title,'link'=>'javascript:void(0)'];

CrudAsset::register($this);
?>

<div class="site-changepassword">
    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-changepassword']); ?>

            <?= $form->field($model, 'old_password')->passwordInput(['autofocus' => true]) ?>
            <?= $form->field($model, 'password')->passwordInput() ?>
            <?= $form->field($model, 'password_repeat')->passwordInput() ?>

            <div class="form-group">
                <?= Html::submitButton('Thay mật khẩu', ['class' => 'btn btn-primary', 'name' => 'changepassword-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>