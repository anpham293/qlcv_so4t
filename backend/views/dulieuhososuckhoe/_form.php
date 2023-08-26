<?php

use common\models\Dantoc;
use common\models\Phuongxa;
use common\models\Quanhuyen;
use common\models\Quoctich;
use common\models\Tinhthanh;
use common\models\Tongiao;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Dulieuhososuckhoe */
/* @var $form yii\widgets\ActiveForm */
?>
<style>
    @font-face {
        font-family: Quicksand;
        src: url(/theme/css/fonts/Quicksand/Quicksand-VariableFont_wght.ttf);
        font-size: 14px;
    }
    body{
        font-family: 'Quicksand', sans-serif;
    }
    #maincontent h1{
        text-align: center;
    }
    .red-title{
        color:red;
    }
    table{
        margin-bottom: 0!important;
    }
    div.tablecontainer{
        background: white;
        padding: 15px;
        margin: 15px 0;
    }
    #tokhai{
        padding: 15px 0;
    }
    .dulieuhososuckhoe-form .row{
        padding-left: 15px;
        padding-right: 15px;
    }
    .dulieuhososuckhoe-form .row .col-md-6.col-xs-12,.dulieuhososuckhoe-form .row .col-md-4.col-xs-6{
        padding-top: 10px;
        padding-bottom: 10px;
    }
    .dulieuhososuckhoe-form .row .form-group .col-xs-4{
        padding-left: 0px;
    }
    .dulieuhososuckhoe-form .row .form-group .col-xs-8{
        padding: 0px;
    }
    form div.required label.control-label:not([for="dulieuhososuckhoe-solicocuongtrenngay"]):after {
        content: " (*) ";
        color: red;
    }
    label.control-label[for="dulieuhososuckhoe-solicocuongtrenngay"]{
        color: rgb(51, 51, 51);
    }
    #dulieuhososuckhoe-solicocuongtrenngay{
        border-color: rgb(204, 204, 204)!important;
    }
    .titles{
        color: #0375bc;
        font-weight: bolder;
        font-size: 18px;
    }
    .heading1{
        font-weight: bolder;
        color: #3884bc;
        font-size: 16px;
    }
    .dulieuhososuckhoe-form input[type='radio']{
        margin: 0 5px 0 10px;
    }
    .form-group.field-dulieuhososuckhoe-solicocuongtrenngay{
        display: inline-block;
        padding-left: 15px;
    }
    .heading2{
        font-weight: bolder;
        color: #3884bc;
    }
    .tablecontainer textarea{
        margin: 0;
        padding: 0;
        float: left;
    }
    .tablecontainer .form-group{
        margin: 0;
    }
    .tablecontainer .help-block{
        margin: 0;
    }
    .table-label-full label{
        display: block;
        margin: 0;
        padding: 10px;
    }
    .table-label-full td{
        padding: 0!important;
        vertical-align: middle;
        position: relative;
    }
    .table-label-full td .labelx{

    }

    .tabletdpadding td{
        padding: 10px!important;
    }

    .required.has-error input{
        border-color: #c9060c!important;
    }
    .required.has-error input[type='radio'] {
        border-color: red!important;
        border-radius: 50%;
        -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,0.075), 0 0 8px rgba(255,0,0,0.53)!important;
        box-shadow: inset 0 1px 1px rgba(0,0,0,0.075), 0 0 8px rgba(251,0,0,0.52)!important;
        outline: none!important;
    }
    .select2-container.form-control{
        padding: 0!important;

    }
    .select2-container.form-control a.select2-choice{
        height: 34px!important;
    }
    .select2.select2-container.select2-container--default.select2-container--focus{
        width: 100%;
        height: 34px!important;
    }


    .select2-container .select2-selection--single {
        height: 34px!important;
    }
</style>
<div class="dulieuhososuckhoe-form">
    <div class="row">
        <div class="container" id="maincontent">
            <h1 style="text-align: center">TỜ KHAI HỒ SƠ QUẢN LÝ SỨC KHỎE CÁ NHÂN</h1>
            <div class="text-center">
                HỒ SƠ SỐ #<?=$model->id?>
            </div>


            <div id="tokhai">
                <div class="dulieuhososuckhoe-form">

                    <?php $form = ActiveForm::begin(); ?>


                    <div class="row">
                        <div class="col-md-6 col-xs-12 titles">A. PHẦN THÔNG TIN HÀNH CHÍNH</div>
                        <div class="col-md-6 col-xs-12" style="border: 2px solid black!important; padding: 5px 15px;">
                            <?= $form->field($model, 'mahogiadinh', ['template' => '<div class="col-xs-4">{label}{error}</div><div class="col-xs-8">{input}</div>'])->numberInput(['maxlength' => true, 'placeholder' => $model->getFirstError('mahogiadinh')]) ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <?= $form->field($model, 'socmnd', ['template' => '<div class="col-xs-4">{label}{error}</div><div class="col-xs-8">{input}</div>'])
                                ->numberInput(['maxlength' => true, 'placeholder' => $model->getFirstError('socmnd')]) ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <?= $form->field($model, 'hovaten', ['template' => '<div class="col-xs-4">{label}{error}</div><div class="col-xs-8">{input}</div>'])->textInput(['maxlength' => true, 'placeholder' => $model->getFirstError('hovaten')]) ?>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <?= $form->field($model, 'quanhevoichuho', ['template' => '<div class="col-xs-4">{label}{error}</div><div class="col-xs-8">{input}</div>'])->textInput(['maxlength' => true, 'placeholder' => $model->getFirstError('quanhevoichuho')]) ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <?= $form->field($model, 'gioitinh', ['template' => '<div class="col-xs-4">{label}{error}</div><div class="col-xs-8">{input}</div>'])->radioList(['nam' => 'Nam', 'nu' => 'Nữ']) ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <?= $form->field($model, 'nhommauheabo', ['template' => '<div class="col-xs-4">{label}{error}</div><div class="col-xs-8">{input}</div>'])->textInput(['maxlength' => true, 'placeholder' => $model->getFirstError('nhommauheabo')]) ?>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <?= $form->field($model, 'nhommauherh', ['template' => '<div class="col-xs-4">{label}{error}</div><div class="col-xs-8">{input}</div>'])->textInput(['maxlength' => true, 'placeholder' => $model->getFirstError('nhommauherh')]) ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <?= $form->field($model, 'ngaysinh', ['template' => '<div class="col-xs-4">{label}{error}</div><div class="col-xs-8">{input}</div>'])->textInput(['maxlength' => true, 'placeholder' => $model->getFirstError('ngaysinh')]) ?>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <?= $form->field($model, 'tinhtpdangkykhaisinh', ['template' => '<div class="col-xs-4">{label}{error}</div><div class="col-xs-8">{input}</div>'])
                                ->dropDownList(Tinhthanh::getListTinhThanhForDropdown(),['maxlength' => true,'prompt'=>'Chọn','class'=>'form-control diachiselect', 'placeholder' => $model->getFirstError('tinhtpdangkykhaisinh')]) ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <?= $form->field($model, 'dantoc', ['template' => '<div class="col-xs-4">{label}{error}</div><div class="col-xs-8">{input}</div>'])
                                ->dropDownList(Dantoc::getListDanTocForDropdown(),['maxlength' => true,'class'=>'form-control diachiselect', 'placeholder' => $model->getFirstError('dantoc')]) ?>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <?= $form->field($model, 'quoctich', ['template' => '<div class="col-xs-4">{label}{error}</div><div class="col-xs-8">{input}</div>'])
                                ->dropDownList(Quoctich::getListQuocTichForDropdown(),['maxlength' => true,'class'=>'form-control diachiselect', 'placeholder' => $model->getFirstError('quoctich')]) ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <?= $form->field($model, 'tongiao', ['template' => '<div class="col-xs-4">{label}{error}</div><div class="col-xs-8">{input}</div>'])
                                ->dropDownList(Tongiao::getListTonGiaoForDropdown(),['maxlength' => true,'class'=>'form-control diachiselect', 'placeholder' => $model->getFirstError('tongiao')]) ?>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <?= $form->field($model, 'nghenghiep', ['template' => '<div class="col-xs-4">{label}{error}</div><div class="col-xs-8">{input}</div>'])
                                ->textInput(['maxlength' => true, 'placeholder' => $model->getFirstError('nghenghiep')]) ?>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-6 col-xs-12">
                            <?= $form->field($model, 'ngaycap', ['template' => '<div class="col-xs-4">{label}{error}</div><div class="col-xs-8">{input}</div>'])
                                ->textInput(['maxlength' => true, 'placeholder' => $model->getFirstError('ngaycap')]) ?>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <?= $form->field($model, 'noicap', ['template' => '<div class="col-xs-4">{label}{error}</div><div class="col-xs-8">{input}</div>'])
                                ->textInput(['maxlength' => true, 'placeholder' => $model->getFirstError('noicap')]) ?>
                        </div>
                    </div>



                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <?= $form->field($model, 'madinhdanhbhytsothe', ['template' => '<div class="col-xs-4">{label}{error}</div><div class="col-xs-8">{input}</div>'])
                                ->textInput(['maxlength' => true, 'placeholder' => $model->getFirstError('madinhdanhbhytsothe')]) ?>
                        </div>

                    </div>
                    <div class="row">

                        <div class="col-xs-12 heading1">Hộ khẩu thường trú</div>

                    </div>
                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <?= $form->field($model, 'tinhthanhphohktt', ['template' => '<div class="col-xs-4">{label}{error}</div><div class="col-xs-8">{input}</div>'])
                                ->dropDownList(Tinhthanh::getListTinhThanhForDropdown(),['class'=>'form-control diachiselect','maxlength' => true,'prompt'=>'Chọn', 'placeholder' => $model->getFirstError('tinhthanhphohktt')]) ?>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <?= $form->field($model, 'quanhuyenhktt', ['template' => '<div class="col-xs-4">{label}{error}</div><div class="col-xs-8">{input}</div>'])
                                ->dropDownList(Quanhuyen::getListQuanHuyenForDropdown($model->tinhthanhphohktt),['class'=>'form-control diachiselect','prompt'=>'Chọn','maxlength' => true, 'placeholder' => $model->getFirstError('quanhuyenhktt')]) ?>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-6 col-xs-12">
                            <?= $form->field($model, 'xaphuonghktt', ['template' => '<div class="col-xs-4">{label}{error}</div><div class="col-xs-8">{input}</div>'])
                                ->dropDownList(Phuongxa::getListPhuongXaForDropdown($model->quanhuyenhktt),['class'=>'form-control diachiselect','prompt'=>'Chọn','maxlength' => true, 'placeholder' => $model->getFirstError('xaphuonghktt')]) ?>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <?= $form->field($model, 'noidangkyhktt', ['template' => '<div class="col-xs-4">{label}{error}</div><div class="col-xs-8">{input}</div>'])
                                ->textInput(['maxlength' => true, 'placeholder' => $model->getFirstError('noidangkyhktt')]) ?>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-xs-12 heading1">Nơi ở hiện tại</div>

                    </div>
                    <div class="row">

                        <div class="col-md-6 col-xs-12">
                            <?= $form->field($model, 'tinhthanhphonoht', ['template' => '<div class="col-xs-4">{label}{error}</div><div class="col-xs-8">{input}</div>'])
                                ->dropDownList(Tinhthanh::getListTinhThanhForDropdown(),['maxlength' => true, 'class'=>'form-control diachiselect','prompt'=>'Chọn', 'placeholder' => $model->getFirstError('tinhthanhphonoht')]) ?>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <?= $form->field($model, 'quanhuyennoht', ['template' => '<div class="col-xs-4">{label}{error}</div><div class="col-xs-8">{input}</div>'])
                                ->dropDownList(Quanhuyen::getListQuanHuyenForDropdown($model->tinhthanhphonoht),['maxlength' => true, 'class'=>'form-control diachiselect','prompt'=>'Chọn', 'placeholder' => $model->getFirstError('quanhuyennoht')]) ?>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-6 col-xs-12">
                            <?= $form->field($model, 'xaphuongnoht', ['template' => '<div class="col-xs-4">{label}{error}</div><div class="col-xs-8">{input}</div>'])
                                ->dropDownList(Phuongxa::getListPhuongXaForDropdown($model->quanhuyennoht),['maxlength' => true, 'class'=>'form-control diachiselect','prompt'=>'Chọn', 'placeholder' => $model->getFirstError('xaphuongnoht')]) ?>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <?= $form->field($model, 'noiohientai', ['template' => '<div class="col-xs-4">{label}{error}</div><div class="col-xs-8">{input}</div>'])
                                ->textInput(['maxlength' => true, 'placeholder' => $model->getFirstError('noiohientai')]) ?>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-xs-12 heading1">Thông tin liên hệ</div>

                    </div>
                    <div class="row">

                        <div class="col-md-6 col-xs-12">
                            <?= $form->field($model, 'dienthoaicodinh', ['template' => '<div class="col-xs-4">{label}{error}</div><div class="col-xs-8">{input}</div>'])
                                ->numberInput(['maxlength' => true, 'placeholder' => $model->getFirstError('dienthoaicodinh')]) ?>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <?= $form->field($model, 'dienthoaididong', ['template' => '<div class="col-xs-4">{label}{error}</div><div class="col-xs-8">{input}</div>'])
                                ->numberInput(['maxlength' => true, 'placeholder' => $model->getFirstError('dienthoaididong')]) ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <?= $form->field($model, 'email', ['template' => '<div class="col-xs-4">{label}{error}</div><div class="col-xs-8">{input}</div>'])
                                ->textInput(['type' => 'email', 'maxlength' => true, 'placeholder' => $model->getFirstError('email')]) ?>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-6 col-xs-12">
                            <?= $form->field($model, 'hotenme', ['template' => '<div class="col-xs-4">{label}{error}</div><div class="col-xs-8">{input}</div>'])
                                ->textInput(['maxlength' => true, 'placeholder' => $model->getFirstError('hotenme')]) ?>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <?= $form->field($model, 'hotenbo', ['template' => '<div class="col-xs-4">{label}{error}</div><div class="col-xs-8">{input}</div>'])
                                ->textInput(['maxlength' => true, 'placeholder' => $model->getFirstError('hotenbo')]) ?>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-6 col-xs-12">
                            <?= $form->field($model, 'hotenngcsc', ['template' => '<div class="col-xs-4">{label}{error}</div><div class="col-xs-8">{input}</div>'])
                                ->textInput(['maxlength' => true, 'placeholder' => $model->getFirstError('hotenngcsc')]) ?>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <?= $form->field($model, 'moiquanhengcsc', ['template' => '<div class="col-xs-4">{label}{error}</div><div class="col-xs-8">{input}</div>'])
                                ->textInput(['maxlength' => true, 'placeholder' => $model->getFirstError('moiquanhengcsc')]) ?>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-6 col-xs-12">
                            <?= $form->field($model, 'dienthoaingcsc', ['template' => '<div class="col-xs-4">{label}{error}</div><div class="col-xs-8">{input}</div>'])
                                ->textInput(['maxlength' => true, 'placeholder' => $model->getFirstError('dienthoaingcsc')]) ?>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <?= $form->field($model, 'didongngcsc', ['template' => '<div class="col-xs-4">{label}{error}</div><div class="col-xs-8">{input}</div>'])
                                ->textInput(['maxlength' => true, 'placeholder' => $model->getFirstError('didongngcsc')]) ?>
                        </div>
                    </div>






                    <?php if (!Yii::$app->request->isAjax) { ?>
                        <div class="form-group" style="position: fixed;bottom: 0;right: 10px">


                            <?= Html::submitButton($model->isNewRecord ? 'Nộp hồ sơ' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                            <?= Html::button("Clear", ["type" => "reset", 'class' => 'btn btn-primary']) ?>
                        </div>
                    <?php } ?>

                    <?php ActiveForm::end(); ?>

                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
