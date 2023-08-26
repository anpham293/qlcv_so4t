<?php
$this->context->og_type = 'website';


$config = \common\models\Configure::getConfig();
/** @var UpdateDulieu $model */

use common\models\Dantoc;
use common\models\Dulieuhososuckhoe;
use common\models\Phuongxa;
use common\models\Quanhuyen;
use common\models\Quoctich;
use common\models\Tinhthanh;
use common\models\Tongiao;
use frontend\models\UpdateDulieu;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\widgets\ActiveForm;
?>


    <div class="row">
        <div class="container" id="maincontent">
            <h1>TỜ KHAI HỒ SƠ QUẢN LÝ SỨC KHỎE CÁ NHÂN</h1>
            <div class="text-center">
               CẬP NHẬT DỮ LIỆU
            </div>
            <div class="red-title text-center">
                Nhập vào thông tin cá nhân để truy cứu và cập nhật dữ liệu
            </div>

            <div id="tokhai">
                <div class="dulieuhososuckhoe-form">

                    <?php $form = ActiveForm::begin(); ?>
                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <?= $form->field($model, 'cmnd', ['template' => '<div class="col-xs-4">{label}{error}</div><div class="col-xs-8">{input}</div>'])
                                ->numberInput(['maxlength' => true,'id'=>'ocmnd', 'placeholder' => $model->getFirstError('cmnd')]) ?>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <?= $form->field($model, 'istreem', ['template' => '<div class="col-xs-4">{label}{error}</div><div class="col-xs-8">{input}</div>'])
                                ->checkbox(['maxlength' => true,'id'=>'checktreem', 'placeholder' => $model->getFirstError('isTreem')]) ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <?= $form->field($model, 'hoten', ['template' => '<div class="col-xs-4">{label}{error}</div><div class="col-xs-8">{input}</div>'])
                                ->textInput(['maxlength' => true, 'placeholder' => $model->getFirstError('hoten')]) ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <?= $form->field($model, 'mahogiadinh', ['template' => '<div class="col-xs-4">{label}{error}</div><div class="col-xs-8">{input}</div>'])
                                ->numberInput(['maxlength' => true, 'placeholder' => $model->getFirstError('mahogiadinh')]) ?>
                        </div>
                    </div>
                    <div><?=$model->errorT?></div>
                    <?php if (!Yii::$app->request->isAjax) { ?>
                        <div class="form-group">
                            <div <?php if(!empty(Yii::$app->session->getFlash('gcaptcha'))):?>style="box-shadow: 6px 1px 30px 0px red;margin-bottom: 15px"<?php endif;?>>
                                <script src="https://www.google.com/recaptcha/api.js" async defer></script>
                                <div class="g-recaptcha" data-sitekey="6Lc6HOQUAAAAAAsdfkr5bEUSN1Z9ebp7I6eN31Os"></div>
                                <div style="padding: 15px;color: red">
                                    <?=Yii::$app->session->getFlash('gcaptcha');?>
                                </div>
                            </div>

                            <?= Html::submitButton( 'Kiểm tra' , ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                            <?= Html::button("Clear", ["type" => "reset", 'class' => 'btn btn-primary']) ?>
                        </div>
                    <?php } ?>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
<script>
    $(document).ready(function () {
        if($("#checktreem").is(":checked")){
            $("#ocmnd").attr('disabled','disabled');
        }
        $(document).on('change','#checktreem',function(){

            if($(this).is(":checked")){
                $("#ocmnd").attr('disabled','disabled');
            }else{
                $("#ocmnd").removeAttr('disabled');
            }
        })
    })
</script>