<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Đăng ký';
$this->params['breadcrumbs'][] = ['name' => $this->title, 'link' => 'javascript:void(0)'];
\johnitvn\ajaxcrud\CrudAsset::register($this);
?>
<div class="site-signup">
    <div class="container">
        <div class="row">
            <h2 class="form-header"><span class="form-txt">Your Account Details</span></h2>
            <?php $form = ActiveForm::begin([
                'id' => 'form-signup',
                'layout' => 'horizontal',
                'action' => ['frontendaccount'],
                'options' => ['enctype'=>'multipart/form-data'],
                'fieldConfig' => [
                    'horizontalCssClasses' => [
                        'label' => 'col-sm-4',
                        'wrapper' => 'col-sm-8',
                    ],
                ],
            ]); ?>
            <div class="account-detail">
                <div class="col-xs-12 col-md-6">
                    <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                    <?= $form->field($model, 'password')->passwordInput() ?>

                    <?= $form->field($model, 'password_repeat')->passwordInput()->label('Confirm Password') ?>

                    <?= $form->field($model, 'title')->widget(\kartik\select2\Select2::className(), [
                        'data' => [
                            1 => 'Ms',
                            2 => 'Mrs',
                            3 => 'Mr',
                        ],
                        'options' => ['placeholder' => 'Select gender ...'],
                        'pluginOptions' => [
                            'allowClear' => false
                        ],
                    ]) ?>

                    <?= $form->field($model, 'firstname')->textInput() ?>

                    <?= $form->field($model, 'surname')->textInput() ?>

                    <?= $form->field($model, 'email') ?>

                    <?= $form->field($model, 'email_confirm')->label('Confirm Email') ?>

                    <?= $form->field($model, 'websiteurl')->textInput()->label('Website') ?>
                </div>

                <div class="col-xs-12 col-md-6">
                    <?= $form->field($model, 'phone')->textInput(['type' => 'number']) ?>

                    <?= $form->field($model, 'address')->textInput() ?>

                    <?= $form->field($model, 'address2')->textInput()->label('') ?>

                    <?= $form->field($model, 'street')->textInput() ?>

                    <?= $form->field($model, 'city')->textInput() ?>

                    <?= $form->field($model, 'postcode')->textInput() ?>

                    <?= $form->field($model, 'country')->widget(\kartik\select2\Select2::className(), [
                        'data' => $country,
                        'options' => ['placeholder' => 'Select a Country ...'],
                        'pluginOptions' => [
                            'allowClear' => false
                        ],
                    ]) ?>

                    <?= $form->field($model, 'company')->textInput()->label('Shop/Company<br>Name',['style'=>'padding-top:0 !important; margin-top: 0']) ?>

                </div>
                <div class="clearfix"></div>
            </div>

            <h2 class="form-header"><span class="form-txt">Company Verification Details</span></h2>
            <div class="account-detail">
                <div class="col-xs-12 col-md-6">
                    <?= $form->field($model, 'company_registration_number')->textInput()->label('Company Registration<br>Number',['style'=>'padding-top:0 !important; margin-top: 0']) ?>

                    <?= $form->field($model, 'file1')->fileInput(['class'=>'form-control'])->label('Company Registration<br>Certificate',['style'=>'padding-top:0 !important; margin-top: 0'])->hint('<div class="row"><div class="col-xs-8" style="float: right"><div class="bg-warning">(.jpg, .jpeg, .gif, .pdf, .doc are allowed)</div></div></div>',['class'=>'col-xs-12']) ?>
                </div>
                <div class="col-xs-12 col-md-6">
                    <?= $form->field($model, 'vat_number')->textInput()->label('VAT Number') ?>

                    <?= $form->field($model, 'file2')->fileInput(['class'=>'form-control'])->label('VAT Document')->hint('<div class="row"><div class="col-xs-8" style="float: right"><div class="bg-warning">(.jpg, .jpeg, .gif, .pdf, .doc are allowed)</div></div></div>',['class'=>'col-xs-12']) ?>

                    <?= $form->field($model, 'file3')->fileInput(['class'=>'form-control'])->label('Supplier/Utility<br>Invoice',['style'=>'padding-top:0 !important; margin-top: 0'])->hint('<div class="row"><div class="col-xs-8" style="float: right"><div class="bg-warning">(.jpg, .jpeg, .gif, .pdf, .doc are allowed)</div></div></div>',['class'=>'col-xs-12']) ?>

                    <?= $form->field($model, 'file4')->fileInput(['class'=>'form-control'])->label('Picture/Brochure of<br>Shop',['style'=>'padding-top:0 !important; margin-top: 0'])->hint('<div class="row"><div class="col-xs-8" style="float: right"><div class="bg-warning">(.jpg, .jpeg, .gif, .pdf, .doc are allowed)</div></div></div>',['class'=>'col-xs-12']) ?>
                </div>
                <div class="clearfix"></div>
            </div>

            <h2 class="form-header"><span class="form-txt">About Your Business</span></h2>
            <div class="account-detail">
                <div class="col-xs-12">
                    <!--                    --><?//= $form->field($model, 'brief')->textarea(['rows' => '6'])->label('About Your Business',['style'=>'text-align:left;']) ?>
                    <div class="form-group">
                        <div class="col-xs-2"> <?php echo Html::label('About Your Business','',['class'=>'form-label'])?></div>
                        <div class="col-xs-10"> <textarea name="SignupForm[brief]" id="signupform-brief" rows="6" style="width:100%; text-indent: 10px"></textarea></div>
                    </div>
                </div>

                <div class="col-xs-12">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

                <div class="clearfix"></div>
            </div>



            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
