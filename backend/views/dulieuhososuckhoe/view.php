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
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Dulieuhososuckhoe */
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
<div class="dulieuhososuckhoe-view">

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

                    <div class="row">

                        <div class="col-xs-12 titles">B. NHÓM THÔNG TIN TIỀN SỬ VÀ CÁC YẾU TỐ LIÊN QUAN SỨC KHỎE</div>

                    </div>
                    <div class="row">

                        <div class="col-xs-12 heading1">1. Tình trạng lúc sinh</div>

                    </div>

                    <div class="row">

                        <div class="col-md-6 col-xs-12">
                            <?= $form->field($model, 'tinhtranglucsinh', ['template' => '<div class="col-xs-4">{label}{error}</div><div class="col-xs-8">{input}</div>'])
                                ->dropDownList([0 => 'Đẻ thường', 1 => 'Đẻ mổ'], ['maxlength' => true, 'placeholder' => $model->getFirstError('tinhtranglucsinh')]) ?>
                        </div>
                        <div class="col-md-3 col-xs-12" style="padding-top: 15px">
                            <?= $form->field($model, 'dethieuthang', ['template' => '<span>{label}</span><span>{input}</span>'])
                                ->checkbox() ?>

                        </div>
                        <div class="col-md-3 col-xs-12" style="padding-top: 15px">
                            <?= $form->field($model, 'bingatlucde', ['template' => '<span>{label}</span><span>{input}</span>'])
                                ->checkbox() ?>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-6 col-xs-12">
                            <?= $form->field($model, 'cannanglucde', ['template' => '<div class="col-xs-4">{label}{error}</div><div class="col-xs-8">{input}</div>'])
                                ->numberInput(['maxlength' => true, 'placeholder' => $model->getFirstError('cannanglucde')]) ?>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <?= $form->field($model, 'chieudailucde', ['template' => '<div class="col-xs-4">{label}{error}</div><div class="col-xs-8">{input}</div>'])
                                ->numberInput(['maxlength' => true, 'placeholder' => $model->getFirstError('chieudailucde')]) ?>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-6 col-xs-12">
                            <?= $form->field($model, 'ditatbamsinh', ['template' => '<div class="col-xs-4">{label}{error}</div><div class="col-xs-8">{input}</div>'])
                                ->textInput(['maxlength' => true, 'placeholder' => $model->getFirstError('ditatbamsinh')]) ?>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <?= $form->field($model, 'vandekhaclucsinh', ['template' => '<div class="col-xs-4">{label}{error}</div><div class="col-xs-8">{input}</div>'])
                                ->textInput(['maxlength' => true, 'placeholder' => $model->getFirstError('vandekhaclucsinh')]) ?>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-xs-12 heading1">2. Yếu tố nguy cơ đối với sức khỏe cá nhân</div>

                    </div>
                    <div class="row">

                        <div class="col-xs-12">
                            <?= $form->field($model, 'hutthuocla', ['template' => '<div class="col-xs-4">{label}{error}</div><div class="col-xs-8">{input}</div>'])
                                ->radioList(
                                    [
                                        'khong' => 'Không',
                                        'co' => 'Có',
                                        'thuongxuyen' => 'Hút thường xuyên',
                                        'dabo' => 'Đã bỏ',
                                    ],
                                    ['maxlength' => true, 'placeholder' => $model->getFirstError('hutthuocla')]) ?>
                        </div>

                    </div>
                    <div class="row">

                        <div class="col-xs-12">
                            <?= $form->field($model, 'uongruoubia', ['template' => '<div class="col-xs-4">{label}{error}</div><div class="col-xs-8">{input}' .
                                $form->field($model, 'solicocuongtrenngay', ['template' => '<div class="col-xs-7">{label}</div><div class="col-xs-4">{input}</div>'])
                                    ->numberInput(['maxlength' => true, 'placeholder' => $model->getFirstError('solicocuongtrenngay')])
                                . '</div>'])
                                ->radioList(
                                    [
                                        'khong' => 'Không',
                                        'co' => 'Có',
                                        'dabo' => 'Đã bỏ',
                                    ],
                                    ['maxlength' => true, 'style' => 'display:inline-block;float:left', 'placeholder' => $model->getFirstError('uongruoubia')]) ?>
                        </div>


                    </div>
                    <div class="row">

                        <div class="col-xs-12">
                            <?= $form->field($model, 'sudungmatuy', ['template' => '<div class="col-xs-4">{label}{error}</div><div class="col-xs-8">{input}</div>'])
                                ->radioList(
                                    [
                                        'khong' => 'Không',
                                        'co' => 'Có',
                                        'thuongxuyen' => 'Sử dụng thường xuyên',
                                        'dabo' => 'Đã bỏ',
                                    ],
                                    ['maxlength' => true, 'placeholder' => $model->getFirstError('sudungmatuy')]) ?>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-xs-12">
                            <?= $form->field($model, 'hoatdongtheluc', ['template' => '<div class="col-xs-4">{label}{error}</div><div class="col-xs-8">{input}</div>'])
                                ->radioList(
                                    [
                                        'khong' => 'Không',
                                        'co' => 'Có',
                                        'thuongxuyen' => 'Thường xuyên (tập thể dục, thể thao...)',

                                    ],
                                    ['maxlength' => true, 'placeholder' => $model->getFirstError('hoatdongtheluc')]) ?>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-6 col-xs-12">
                            <?= $form->field($model, 'yeutotiepxuc', ['template' => '<div class="col-xs-4">{label}{error}</div><div class="col-xs-8">{input}</div>'])
                                ->textarea(["rows" => "4", 'style' => "resize:none", 'placeholder' => $model->getFirstError('yeutotiepxuc')]) ?>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <?= $form->field($model, 'thoigiantiepxuc', ['template' => '<div class="col-xs-4">{label}{error}</div><div class="col-xs-8">{input}</div>'])
                                ->textInput(['maxlength' => true, 'placeholder' => $model->getFirstError('thoigiantiepxuc')]) ?>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-xs-12">
                            <?= $form->field($model, 'loaihoxi', ['template' => '<div class="col-xs-4">{label}{error}</div><div class="col-xs-8">{input}</div>'])
                                ->radioList(
                                    ['xả nước' => 'Xả nước', 'hai ngăn' => 'Hai ngăn', 'hố xí thùng' => 'Hố xí thùng', 'không có' => 'Không có',],
                                    ['maxlength' => true, 'placeholder' => $model->getFirstError('loaihoxi')]) ?>
                        </div>

                    </div>
                    <div class="row">

                        <div class="col-xs-12">
                            <?= $form->field($model, 'nguycokhac', ['template' => '<div class="col-xs-4">{label}{error}</div><div class="col-xs-8">{input}</div>'])
                                ->textarea(["rows" => "4", 'style' => "resize:none", 'placeholder' => $model->getFirstError('nguycokhac')]) ?>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-xs-12 heading1">3. Tiền sử bệnh tật, dị ứng</div>

                    </div>
                    <div class="row">

                        <div class="col-xs-12 heading2">Dị ứng</div>

                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="table-responsive tablecontainer">
                                <table class="table table-bordered table-hover table-striped">
                                    <tr>
                                        <th>Loại</th>
                                        <th>Mô tả rõ</th>

                                    </tr>
                                    <tr>
                                        <td>Dị ứng thuốc</td>
                                        <td><?= $form->field($model, 'diungthuoc')->textarea(['rows' => 6, 'style' => "resize:none", 'placeholder' => $model->getFirstError('diungthuoc')])->label("") ?></td>
                                    </tr>
                                    <tr>
                                        <td>Dị ứng hóa chất mỹ phẩm</td>
                                        <td><?= $form->field($model, 'diunghoachatmypham')->textarea(['rows' => 6, 'style' => "resize:none", 'placeholder' => $model->getFirstError('diunghoachatmypham')])->label("") ?></td>
                                    </tr>
                                    <tr>
                                        <td>Dị ứng thực phẩm</td>
                                        <td><?= $form->field($model, 'diungthucpham')->textarea(['rows' => 6, 'style' => "resize:none", 'placeholder' => $model->getFirstError('diungthucpham')])->label("") ?></td>
                                    </tr>
                                    <tr>
                                        <td>Dị ứng khác</td>
                                        <td><?= $form->field($model, 'diungkhac')->textarea(['rows' => 6, 'style' => "resize:none", 'placeholder' => $model->getFirstError('diungkhac')])->label("") ?></td>
                                    </tr>

                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-xs-12 heading2">Bệnh tật</div>

                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="table-responsive tablecontainer table-label-full">
                                <table class="table table-bordered table-hover table-striped">
                                    <tr>
                                        <td><?= $form->field($model, 'benhtimmach')->checkbox() ?></td>
                                        <td><?= $form->field($model, 'tanghuyetap')->checkbox() ?></td>
                                        <td><?= $form->field($model, 'daithaoduong')->checkbox() ?></td>
                                        <td><?= $form->field($model, 'benhdaday')->checkbox() ?></td>
                                    </tr>
                                    <tr>
                                        <td><?= $form->field($model, 'benhphoimantinh')->checkbox() ?></td>
                                        <td><?= $form->field($model, 'benhhensuyen')->checkbox() ?></td>
                                        <td><?= $form->field($model, 'benhbuouco')->checkbox() ?></td>
                                        <td><?= $form->field($model, 'benhviemgan')->checkbox() ?></td>
                                    </tr>
                                    <tr>
                                        <td><?= $form->field($model, 'benhtimbamsinh')->checkbox() ?></td>
                                        <td><?= $form->field($model, 'benhtamthan')->checkbox() ?></td>
                                        <td><?= $form->field($model, 'benhtuky')->checkbox() ?></td>
                                        <td><?= $form->field($model, 'benhdongkinh')->checkbox() ?></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="divtam"><label class="labelx control-label"> Ung thư (ghi rõ loại
                                                    ung thư)</label></div>
                                        </td>
                                        <td colspan="3" style="padding: 10px!important;">
                                            <?= $form->field($model, 'benhungthu', ['template' => '{input}'])->textarea(["rows" => "4", 'style' => "resize:none",]) ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="divtam"><label class="labelx control-label"> Lao (ghi rõ loại
                                                    lao)</label></div>
                                        </td>
                                        <td colspan="3" style="padding: 10px!important;">
                                            <?= $form->field($model, 'benhlao', ['template' => '{input}'])->textarea(["rows" => "4", 'style' => "resize:none",]) ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="divtam"><label class="labelx control-label"> Khác (nêu rõ)</label>
                                            </div>
                                        </td>
                                        <td colspan="3" style="padding: 10px!important;">
                                            <?= $form->field($model, 'benhkhac', ['template' => '{input}'])->textarea(["rows" => "4", 'style' => "resize:none",]) ?>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-xs-12 heading1">4. Khuyết tật</div>

                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="table-responsive tablecontainer table-label-full">
                                <table class="table table-bordered table-hover table-striped">
                                    <tr>
                                        <th>
                                            <div class="divtam"><label class="labelx control-label">Bộ phận/ cơ quan</label>
                                            </div>
                                        </th>
                                        <th>
                                            <div class="divtam"><label class="labelx control-label">Mô tả</label></div>
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="divtam"><label class="labelx control-label">Thính lực</label></div>
                                        </td>
                                        <td style="padding: 10px!important;">
                                            <div class="divtam"><?= $form->field($model, 'khuyettatthinhluc', ['template' => '{input}'])->textarea(['rows' => 6, 'style' => "resize:none", 'placeholder' => $model->getFirstError('khuyettatthinhluc')])->label("") ?></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="divtam"><label class="labelx control-label">Thị lực</label></div>
                                        </td>
                                        <td style="padding: 10px!important;">
                                            <div class="divtam"><?= $form->field($model, 'khuyettatthiluc', ['template' => '{input}'])->textarea(['rows' => 6, 'style' => "resize:none", 'placeholder' => $model->getFirstError('khuyettatthiluc')])->label("") ?></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="divtam"><label class="labelx control-label">Tay</label></div>
                                        </td>
                                        <td style="padding: 10px!important;">
                                            <div class="divtam"><?= $form->field($model, 'khuyettattay', ['template' => '{input}'])->textarea(['rows' => 6, 'style' => "resize:none", 'placeholder' => $model->getFirstError('khuyettattay')])->label("") ?></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="divtam"><label class="labelx control-label">Chân</label></div>
                                        </td>
                                        <td style="padding: 10px!important;">
                                            <div class="divtam"><?= $form->field($model, 'khuyettatchan', ['template' => '{input}'])->textarea(['rows' => 6, 'style' => "resize:none", 'placeholder' => $model->getFirstError('khuyettatchan')])->label("") ?></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="divtam"><label class="labelx control-label">Cong vẹo cột
                                                    sống</label></div>
                                        </td>
                                        <td style="padding: 10px!important;">
                                            <div class="divtam"><?= $form->field($model, 'khuyettatcongveocotsong', ['template' => '{input}'])->textarea(['rows' => 6, 'style' => "resize:none", 'placeholder' => $model->getFirstError('khuyettatcongveocotsong')])->label("") ?></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="divtam"><label class="labelx control-label">Khe hở môi, vòm
                                                    miệng</label></div>
                                        </td>
                                        <td style="padding: 10px!important;">
                                            <div class="divtam"><?= $form->field($model, 'khuyettatkhehomoivommieng', ['template' => '{input}'])->textarea(['rows' => 6, 'style' => "resize:none", 'placeholder' => $model->getFirstError('khuyettatkhehomoivommieng')])->label("") ?></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="divtam"><label class="labelx control-label">Khác</label></div>
                                        </td>
                                        <td style="padding: 10px!important;">
                                            <div class="divtam"><?= $form->field($model, 'khuyettatkhac', ['template' => '{input}'])->textarea(['rows' => 6, 'style' => "resize:none", 'placeholder' => $model->getFirstError('khuyettatkhac')])->label("") ?></div>
                                        </td>
                                    </tr>

                                </table>
                            </div>
                        </div>
                    </div>


                    <?= $form->field($model, 'tiensuphauthuat',
                        ['template' => '<div class="row">

                    <div class="col-xs-12 heading1">5. {label}</div>

                </div><div class="row"><div class="col-xs-12">{input}</div></div>'])->textarea(['rows' => 6, 'style' => "resize:none", 'placeholder' => $model->getFirstError('tiensuphauthuat')]) ?>

                    <div class="row">

                        <div class="col-xs-12 heading1">6. Tiền sử gia đình</div>

                    </div>

                    <div class="row">

                        <div class="col-xs-12 heading2">Dị ứng:</div>

                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="table-responsive tablecontainer table-label-full">
                                <table class="table table-bordered table-hover table-striped">
                                    <tr>
                                        <th>
                                            <div class="divtam"><label class="labelx control-label">Loại</label></div>
                                        </th>
                                        <th>
                                            <div class="divtam"><label class="labelx control-label">Mô tả rõ</label></div>
                                        </th>
                                        <th>
                                            <div class="divtam"><label class="labelx control-label">Người mắc: </label>
                                                <span style="font-weight: 100">(ghi rõ quan hệ huyết thống:<br> ông, bà, bố, mẹ, anh, chị, em...)</span>
                                            </div>
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="divtam"><label class="labelx control-label">Thuốc</label></div>
                                        </td>
                                        <td style="padding: 10px!important;">
                                            <div class="divtam"><?= $form->field($model, 'tiensugiadinhdiungthuoc', ['template' => '{input}'])->textarea(['rows' => 6, 'style' => "resize:none", 'placeholder' => $model->getFirstError('tiensugiadinhdiungthuoc')])->label("") ?></div>
                                        </td>
                                        <td style="padding: 10px!important;">
                                            <div class="divtam"><?= $form->field($model, 'tiensugiadinhdiungthuocnguoi', ['template' => '{input}'])->textarea(['rows' => 6, 'style' => "resize:none", 'placeholder' => $model->getFirstError('tiensugiadinhdiungthuocnguoi')])->label("") ?></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="divtam"><label class="labelx control-label">Hóa chất/ mỹ
                                                    phẩm</label></div>
                                        </td>
                                        <td style="padding: 10px!important;">
                                            <div class="divtam"><?= $form->field($model, 'tiensugiadinhdiunghoachatmypham', ['template' => '{input}'])->textarea(['rows' => 6, 'style' => "resize:none", 'placeholder' => $model->getFirstError('tiensugiadinhdiunghoachatmypham')])->label("") ?></div>
                                        </td>
                                        <td style="padding: 10px!important;">
                                            <div class="divtam"><?= $form->field($model, 'tiensugiadinhdiunghoachatnguoi', ['template' => '{input}'])->textarea(['rows' => 6, 'style' => "resize:none", 'placeholder' => $model->getFirstError('tiensugiadinhdiunghoachatnguoi')])->label("") ?></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="divtam"><label class="labelx control-label">Thực phẩm</label></div>
                                        </td>
                                        <td style="padding: 10px!important;">
                                            <div class="divtam"><?= $form->field($model, 'tiensugiadinhdiungthucpham', ['template' => '{input}'])->textarea(['rows' => 6, 'style' => "resize:none", 'placeholder' => $model->getFirstError('tiensugiadinhdiungthucpham')])->label("") ?></div>
                                        </td>
                                        <td style="padding: 10px!important;">
                                            <div class="divtam"><?= $form->field($model, 'tiensugiadinhdiungthucphamnguoi', ['template' => '{input}'])->textarea(['rows' => 6, 'style' => "resize:none", 'placeholder' => $model->getFirstError('tiensugiadinhdiungthucphamnguoi')])->label("") ?></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="divtam"><label class="labelx control-label">Khác</label></div>
                                        </td>
                                        <td style="padding: 10px!important;">
                                            <div class="divtam"><?= $form->field($model, 'tiensugiadinhdiungkhac', ['template' => '{input}'])->textarea(['rows' => 6, 'style' => "resize:none", 'placeholder' => $model->getFirstError('tiensugiadinhdiungkhac')])->label("") ?></div>
                                        </td>
                                        <td style="padding: 10px!important;">
                                            <div class="divtam"><?= $form->field($model, 'tiensugiadinhdiungkhacnguoi', ['template' => '{input}'])->textarea(['rows' => 6, 'style' => "resize:none", 'placeholder' => $model->getFirstError('tiensugiadinhdiungkhacnguoi')])->label("") ?></div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-xs-12 heading2">Bệnh tật:</div>

                    </div>

                    <div class="row">
                        <div class="col-xs-12">
                            <div class="table-responsive tablecontainer table-label-full">
                                <table class="table table-bordered table-hover table-striped">
                                    <tr>
                                        <th>
                                            <div class="divtam"><label class="labelx control-label">Tên bệnh</label></div>
                                        </th>
                                        <th>
                                            <div class="divtam"><label class="labelx control-label">Người mắc: </label>
                                                <span style="font-weight: 100">(ghi rõ quan hệ huyết thống:<br> ông, bà, bố, mẹ, anh, chị, em...)</span>
                                            </div>
                                        </th>
                                    </tr>

                                    <tr>
                                        <td>
                                            <div class="divtam"><label
                                                        class="labelx control-label"><?= $form->field($model, 'tiensugiadinhbenhtattimmach')->checkbox() ?></label>
                                            </div>
                                        </td>
                                        <td style="padding: 10px!important;">
                                            <div class="divtam"><?= $form->field($model, 'tiensugiadinhbenhtattimmachnguoi', ['template' => '{input}'])->textarea(['rows' => 6, 'style' => "resize:none", 'placeholder' => $model->getFirstError('tiensugiadinhdiungthuoc')])->label("") ?></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="divtam"><label
                                                        class="labelx control-label"><?= $form->field($model, 'tiensugiadinhbenhtathensuyen')->checkbox() ?></label>
                                            </div>
                                        </td>
                                        <td style="padding: 10px!important;">
                                            <div class="divtam"><?= $form->field($model, 'tiensugiadinhbenhtathensuyennguoi', ['template' => '{input}'])->textarea(['rows' => 6, 'style' => "resize:none", 'placeholder' => $model->getFirstError('tiensugiadinhdiungthuocnguoi')])->label("") ?></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="divtam"><label
                                                        class="labelx control-label"><?= $form->field($model, 'tiensugiadinhbenhtattanghuyetap')->checkbox() ?></label>
                                            </div>
                                        </td>
                                        <td style="padding: 10px!important;">
                                            <div class="divtam"><?= $form->field($model, 'tiensugiadinhbenhtattanghuyetapnguoi', ['template' => '{input}'])->textarea(['rows' => 6, 'style' => "resize:none", 'placeholder' => $model->getFirstError('tiensugiadinhbenhtattanghuyetapnguoi')])->label("") ?></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="divtam"><label
                                                        class="labelx control-label"><?= $form->field($model, 'tiensugiadinhbenhtatdaithaoduong')->checkbox() ?></label>
                                            </div>
                                        </td>
                                        <td style="padding: 10px!important;">
                                            <div class="divtam"><?= $form->field($model, 'tiensugiadinhbenhtatdaithaoduongnguoi', ['template' => '{input}'])->textarea(['rows' => 6, 'style' => "resize:none", 'placeholder' => $model->getFirstError('tiensugiadinhbenhtatdaithaoduongnguoi')])->label("") ?></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="divtam"><label
                                                        class="labelx control-label"><?= $form->field($model, 'tiensugiadinhbenhtattamthan')->checkbox() ?></label>
                                            </div>
                                        </td>
                                        <td style="padding: 10px!important;">
                                            <div class="divtam"><?= $form->field($model, 'tiensugiadinhbenhtattamthannguoi', ['template' => '{input}'])->textarea(['rows' => 6, 'style' => "resize:none", 'placeholder' => $model->getFirstError('tiensugiadinhbenhtattamthannguoi')])->label("") ?></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="divtam"><label
                                                        class="labelx control-label"><?= $form->field($model, 'tiensugiadinhbenhtatdongkinh')->checkbox() ?></label>
                                            </div>
                                        </td>
                                        <td style="padding: 10px!important;">
                                            <div class="divtam"><?= $form->field($model, 'tiensugiadinhbenhtatdongkinhnguoi', ['template' => '{input}'])->textarea(['rows' => 6, 'style' => "resize:none", 'placeholder' => $model->getFirstError('tiensugiadinhbenhtatdongkinhnguoi')])->label("") ?></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="divtam"><label class="labelx control-label">Ung thư (ghi rõ loại ung
                                                    thư, người mắc, quan hệ)</label></div>
                                        </td>
                                        <td style="padding: 10px!important;">
                                            <div class="divtam"><?= $form->field($model, 'tiensugiadinhbenhtatungthu', ['template' => '{input}'])
                                                    ->textarea(['rows' => 6, 'style' => "resize:none", 'placeholder' => $model->getFirstError('tiensugiadinhbenhtatungthu')])->label("") ?></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="divtam"><label class="labelx control-label">Ung thư (ghi rõ loại ung
                                                    thư, người mắc, quan hệ)</label></div>
                                        </td>
                                        <td style="padding: 10px!important;">
                                            <div class="divtam"><?= $form->field($model, 'tiensugiadinhbenhtatlao', ['template' => '{input}'])
                                                    ->textarea(['rows' => 6, 'style' => "resize:none", 'placeholder' => $model->getFirstError('tiensugiadinhbenhtatlao')])->label("") ?></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="divtam"><label class="labelx control-label">Ung thư (ghi rõ loại ung
                                                    thư, người mắc, quan hệ)</label></div>
                                        </td>
                                        <td style="padding: 10px!important;">
                                            <div class="divtam"><?= $form->field($model, 'tiensugiadinhbenhtatkhac', ['template' => '{input}'])
                                                    ->textarea(['rows' => 6, 'style' => "resize:none", 'placeholder' => $model->getFirstError('tiensugiadinhbenhtatkhac')])->label("") ?></div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-xs-12 heading1">7. Sức khỏe sinh sản và kế hoạch hóa gia đình</div>

                    </div>
                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <?= $form->field($model, 'bienphaptranhthai', ['template' => '<div class="col-xs-4">{label}{error}</div><div class="col-xs-8">{input}</div>'])
                                ->textInput(['maxlength' => true, 'placeholder' => $model->getFirstError('bienphaptranhthai')]) ?>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <?= $form->field($model, 'kythaicuoicung', ['template' => '<div class="col-xs-4">{label}{error}</div><div class="col-xs-8">{input}</div>'])
                                ->textInput(['maxlength' => true, 'placeholder' => $model->getFirstError('kythaicuoicung')]) ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <?= $form->field($model, 'solancothai', ['template' => '<div class="col-xs-4">{label}{error}</div><div class="col-xs-8">{input}</div>'])
                                ->numberInput(['maxlength' => true, 'placeholder' => $model->getFirstError('solancothai')]) ?>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <?= $form->field($model, 'solansaythai', ['template' => '<div class="col-xs-4">{label}{error}</div><div class="col-xs-8">{input}</div>'])
                                ->numberInput(['maxlength' => true, 'placeholder' => $model->getFirstError('solansaythai')]) ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <?= $form->field($model, 'solanphathai', ['template' => '<div class="col-xs-4">{label}{error}</div><div class="col-xs-8">{input}</div>'])
                                ->numberInput(['maxlength' => true, 'placeholder' => $model->getFirstError('solanphathai')]) ?>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <?= $form->field($model, 'solansinde', ['template' => '<div class="col-xs-4">{label}{error}</div><div class="col-xs-8">{input}</div>'])
                                ->numberInput(['maxlength' => true, 'placeholder' => $model->getFirstError('solansinde')]) ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <?= $form->field($model, 'solandethuong', ['template' => '<div class="col-xs-4">{label}{error}</div><div class="col-xs-8">{input}</div>'])
                                ->numberInput(['maxlength' => true, 'placeholder' => $model->getFirstError('solandethuong')]) ?>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <?= $form->field($model, 'solandemo', ['template' => '<div class="col-xs-4">{label}{error}</div><div class="col-xs-8">{input}</div>'])
                                ->numberInput(['maxlength' => true, 'placeholder' => $model->getFirstError('solandemo')]) ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <?= $form->field($model, 'solandekho', ['template' => '<div class="col-xs-4">{label}{error}</div><div class="col-xs-8">{input}</div>'])
                                ->numberInput(['maxlength' => true, 'placeholder' => $model->getFirstError('solandekho')]) ?>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <?= $form->field($model, 'solandeduthang', ['template' => '<div class="col-xs-4">{label}{error}</div><div class="col-xs-8">{input}</div>'])
                                ->numberInput(['maxlength' => true, 'placeholder' => $model->getFirstError('solandeduthang')]) ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <?= $form->field($model, 'solandenon', ['template' => '<div class="col-xs-4">{label}{error}</div><div class="col-xs-8">{input}</div>'])
                                ->numberInput(['maxlength' => true, 'placeholder' => $model->getFirstError('solandenon')]) ?>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <?= $form->field($model, 'soconhiensong', ['template' => '<div class="col-xs-4">{label}{error}</div><div class="col-xs-8">{input}</div>'])
                                ->numberInput(['maxlength' => true, 'placeholder' => $model->getFirstError('soconhiensong')]) ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <?= $form->field($model, 'benhphukhoa', ['template' => '{label}{input}'])
                                ->textarea(['rows' => 6, 'style' => "resize:none", 'maxlength' => true, 'placeholder' => $model->getFirstError('benhphukhoa')]) ?>
                        </div>
                    </div>


                    <?= $form->field($model, 'vandekhac', ['template' => '<div class="row">

                    <div class="col-xs-12 heading1">8. {label}</div>

                </div><div class="row">
                    <div class="col-xs-12">{input}</div>
                </div>'])
                        ->textarea(['rows' => 6, 'style' => "resize:none", 'maxlength' => true, 'placeholder' => $model->getFirstError('vandekhac')]) ?>


                    <div class="row">

                        <div class="col-md-6 col-xs-12 titles">C. TIÊM CHỦNG</div>

                    </div>
                    <div class="row">

                        <div class="col-xs-12 heading1">1. Tiêm chủng cơ bản cho trẻ em</div>

                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="table-responsive tablecontainer table-label-full">
                                <table class="table table-bordered table-hover table-striped tabletdpadding">
                                    <tr>
                                        <th>Loại vắc xin</th>
                                        <th>Chưa chủng ngừa</th>
                                        <th>Đã chủng ngừa, ghi rõ ngày</th>
                                        <th>Phản ứng sau tiêm</th>
                                        <th>Ngày hẹn tiêm</th>
                                    </tr>
                                    <?php
                                    $tiemsosinh = Json::decode($model->tiemchungcobantreem);
                                    foreach ([
                                                 "BCG",
                                                 "VGB sơ sinh",
                                                 "DPT -VGB-Hib 1",
                                                 "DPT -VGB-Hib 2",
                                                 "DPT -VGB-Hib 3",
                                                 "Bại liệt 1",
                                                 "Bại liệt 2",
                                                 "Bại liệt 3",
                                                 "Sởi 1",
                                                 "Sởi 2",
                                                 "DPT4",
                                                 "VNNB B1",
                                                 "VNNB B2",
                                                 "VNNB B3",
                                             ] as $item) :

                                        ?>
                                        <tr>
                                            <td><?= $item ?></td>
                                            <td style="text-align: center"><input type="checkbox"
                                                                                  name="vacxin[<?= $item ?>][chuachungngua]"
                                                    <?php if(isset($tiemsosinh[$item]["chuachungngua"]) && $tiemsosinh[$item]["chuachungngua"]==true){echo "checked='checked'";}?>
                                                >
                                            </td>
                                            <td><input class="form-control datepicker" type="text"
                                                       name="vacxin[<?= $item ?>][dachungngua]"
                                                    <?php if(isset($tiemsosinh[$item]["dachungngua"])){echo "value='".$tiemsosinh[$item]["dachungngua"]."'";}?>
                                                ></td>
                                            <td style="text-align: center"><input class="form-control" type="text"
                                                                                  name="vacxin[<?= $item ?>][phanungsautiem]"
                                                    <?php if(isset($tiemsosinh[$item]["phanungsautiem"])){echo "value='".$tiemsosinh[$item]["phanungsautiem"]."'";}?>
                                                >
                                            </td>
                                            <td><input class="form-control datepicker" type="text"
                                                       name="vacxin[<?= $item ?>][ngayhentiem]"
                                                    <?php if(isset($tiemsosinh[$item]["ngayhentiem"])){echo "value='".$tiemsosinh[$item]["ngayhentiem"]."'";}?>
                                                ></td>
                                        </tr>
                                    <?php endforeach; ?>
                                    <tr>
                                        <td colspan="5"><?= $form->field($model, 'sovacxinuonvanmedatiem')->numberInput() ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>


                    <div class="row">

                        <div class="col-xs-12 heading1">2. Tiêm chủng ngoài chương trình TCMR</div>

                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="table-responsive tablecontainer table-label-full">
                                <table class="table table-bordered table-hover table-striped tabletdpadding">
                                    <tr>
                                        <th>Loại vắc xin</th>
                                        <th>Chưa chủng ngừa</th>
                                        <th>Đã chủng ngừa, ghi rõ ngày</th>
                                        <th>Phản ứng sau tiêm</th>
                                        <th>Ngày hẹn tiêm</th>
                                    </tr>

                                    <?php $tiemngoai = Json::decode($model->tiemchungngoaichuongtrinhtcmr); foreach ([
                                                                                                                         "QTả 1",
                                                                                                                         "Tả 2",
                                                                                                                         "Quai bị 1",
                                                                                                                         "Quai bị 2",
                                                                                                                         "Quai bị 3",
                                                                                                                         "Cúm 1",
                                                                                                                         "Cúm 2",
                                                                                                                         "Cúm 3",
                                                                                                                         "Thương hàn",
                                                                                                                         "HPV 1",
                                                                                                                         "HPV 2",
                                                                                                                         "HPV 3",
                                                                                                                         "Vắc xin phế cầu khuẩn",] as $value): ?>
                                        <tr>
                                            <td><?= $value ?></td>
                                            <td style="text-align: center"><input type="checkbox"
                                                                                  name="vacxinngoai[<?= $value ?>][chuachungngua]"
                                                    <?php if(isset($tiemngoai[$value]["chuachungngua"]) && $tiemngoai[$value]["chuachungngua"]==true){echo "checked='checked'";}?>
                                                >
                                            </td>
                                            <td><input class="form-control datepicker" type="text"
                                                       name="vacxinngoai[<?= $value ?>][dachungngua]"
                                                    <?php if(isset($tiemngoai[$value]["dachungngua"])){echo "value='".$tiemngoai[$value]["dachungngua"]."'";}?>
                                                ></td>
                                            <td style="text-align: center"><input class="form-control" type="text"
                                                                                  name="vacxinngoai[<?= $value ?>][phanungsautiem]"
                                                    <?php if(isset($tiemngoai[$value]["phanungsautiem"])){echo "value='".$tiemngoai[$value]["phanungsautiem"]."'";}?>
                                                >
                                            </td>
                                            <td><input class="form-control datepicker" type="text"
                                                       name="vacxinngoai[<?= $value ?>][ngayhentiem]"
                                                    <?php if(isset($tiemngoai[$value]["ngayhentiem"])){echo "value='".$tiemngoai[$value]["ngayhentiem"]."'";}?>
                                                ></td>
                                        </tr>
                                    <?php endforeach; ?>


                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-xs-12 heading1">3. Tiêm chủng VX uốn ván (phụ nữ có thai)</div>

                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="table-responsive tablecontainer table-label-full">
                                <table class="table table-bordered table-hover table-striped tabletdpadding">
                                    <tr>
                                        <th>Loại vắc xin</th>
                                        <th>Chưa tiêm</th>
                                        <th>Đã tiêm, ghi rõ ngày</th>
                                        <th>Tháng thai</th>
                                        <th>Phản ứng sau tiêm</th>
                                        <th>Ngày hẹn tiêm</th>
                                    </tr>

                                    <?php $tiemuonvan = Json::decode($model->tiemchungvxuonvan); foreach ([
                                                                                                              "UV1",
                                                                                                              "UV2",
                                                                                                              "UV3",
                                                                                                              "UV4",
                                                                                                              "UV5",
                                                                                                          ] as $value): ?>
                                        <tr>
                                            <td><?= $value ?></td>
                                            <td style="text-align: center"><input type="checkbox"
                                                                                  name="vacxinuonvan[<?= $value ?>][chuatiem]"
                                                    <?php if(isset($tiemuonvan[$value]["chuatiem"]) && $tiemuonvan[$value]["chuatiem"]==true){echo "checked='checked'";}?>
                                                >
                                            </td>
                                            <td><input class="form-control datepicker" type="text"
                                                       name="vacxinuonvan[<?= $value ?>][datiem]"
                                                    <?php if(isset($tiemuonvan[$value]["datiem"])){echo "value='".$tiemuonvan[$value]["datiem"]."'";}?>
                                                ></td>
                                            <td><input class="form-control" type="number"
                                                       name="vacxinuonvan[<?= $value ?>][thangthai]"
                                                    <?php if(isset($tiemuonvan[$value]["thangthai"])){echo "value='".$tiemuonvan[$value]["thangthai"]."'";}?>
                                                ></td>
                                            <td style="text-align: center"><input class="form-control" type="text"
                                                                                  name="vacxinuonvan[<?= $value ?>][phanungsautiem]"
                                                    <?php if(isset($tiemuonvan[$value]["phanungsautiem"])){echo "value='".$tiemuonvan[$value]["phanungsautiem"]."'";}?>
                                                >
                                            </td>
                                            <td><input class="form-control datepicker" type="text"
                                                       name="vacxinuonvan[<?= $value ?>][ngayhentiem]"
                                                    <?php if(isset($tiemuonvan[$value]["ngayhentiem"])){echo "value='".$tiemuonvan[$value]["ngayhentiem"]."'";}?>
                                                ></td>
                                        </tr>
                                    <?php endforeach; ?>


                                </table>
                            </div>
                        </div>
                    </div>


                    <div class="row">

                        <div class="col-md-6 col-xs-12 titles">D. KHÁM LÂM SÀNG VÀ CẬN LÂM SÀNG</div>

                    </div>
                    <div class="row">

                        <div class="col-xs-12 heading1"> <?= $form->field($model, 'ngaykhamlamsang')->textInput(['class' => 'datepicker', 'maxlength' => true]) ?></div>
                        <div class="col-xs-12 heading1">1. Bệnh sử</div>

                    </div>
                    <div class="row">
                        <?= $form->field($model, 'benhsu')->textarea(['rows' => 6])->label("") ?>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 heading1">2. Thăm khám lâm sàng</div>
                        <div class="col-xs-12 heading2">2.1. Dấu hiệu sinh tồn, chỉ số nhân trắc học</div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="table-responsive tablecontainer table-label-full">
                                <table class="table table-bordered table-hover table-striped tabletdpadding">
                                    <tr>
                                        <th>Mạch</th>
                                        <td> <?= $form->field($model, 'lamsangmach')->numberInput()->label("") ?></td>
                                        <th>Nhiệt độ</th>
                                        <td><?= $form->field($model, 'lamsangnhietdo')->numberInput()->label("") ?></td>
                                    </tr>
                                    <tr>
                                        <th>HA</th>
                                        <td><?= $form->field($model, 'lamsangha')->numberInput()->label("") ?></td>
                                        <th>Nhịp thở</th>
                                        <td><?= $form->field($model, 'lamsangnhiptho')->numberInput()->label("") ?></td>
                                    </tr>
                                    <tr>
                                        <th>Cân nặng</th>
                                        <td><?= $form->field($model, 'lamsangcannang')->numberInput()->label("") ?></td>
                                        <th>Cao</th>
                                        <td><?= $form->field($model, 'lamsangcao')->numberInput()->label("") ?></td>
                                    </tr>
                                    <tr>
                                        <th>BMI</th>
                                        <td><?= $form->field($model, 'lamsangbmi')->numberInput()->label("") ?></td>
                                        <th>Vòng bụng</th>
                                        <td><?= $form->field($model, 'lamsangvongbung')->numberInput()->label("") ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 heading2">2.2. Thị lực:</div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <?= $form->field($model, 'thiluckhongkinhmatphai', ['template' => '<div class="col-xs-4">{label}{error}</div><div class="col-xs-8">{input}</div>'])
                                ->numberInput(['maxlength' => true, 'placeholder' => $model->getFirstError('thiluckhongkinhmatphai')]) ?>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <?= $form->field($model, 'thiluckhongkinhmattrai', ['template' => '<div class="col-xs-4">{label}{error}</div><div class="col-xs-8">{input}</div>'])
                                ->numberInput(['maxlength' => true, 'placeholder' => $model->getFirstError('thiluckhongkinhmattrai')]) ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <?= $form->field($model, 'thiluccokinhmatphai', ['template' => '<div class="col-xs-4">{label}{error}</div><div class="col-xs-8">{input}</div>'])
                                ->numberInput(['maxlength' => true, 'placeholder' => $model->getFirstError('thiluccokinhmatphai')]) ?>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <?= $form->field($model, 'thiluccokinhmattrai', ['template' => '<div class="col-xs-4">{label}{error}</div><div class="col-xs-8">{input}</div>'])
                                ->numberInput(['maxlength' => true, 'placeholder' => $model->getFirstError('thiluccokinhmattrai')]) ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 heading2">2.3 Khám lâm sàng</div>
                        <div class="col-xs-12 heading2">2.3.1. Toàn thân</div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <?= $form->field($model, 'toanthandaniemmac', ['template' => '<div class="col-xs-4">{label}{error}</div><div class="col-xs-8">{input}</div>'])
                                ->textInput(['maxlength' => true, 'placeholder' => $model->getFirstError('toanthandaniemmac')]) ?>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <?= $form->field($model, 'toanthankhac', ['template' => '<div class="col-xs-4">{label}{error}</div><div class="col-xs-8">{input}</div>'])
                                ->textInput(['maxlength' => true, 'placeholder' => $model->getFirstError('toanthankhac')]) ?>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-xs-12 heading2">2.3.2. Cơ quan</div>
                    </div>
                    <?php foreach ([
                                       "timmach",
                                       "hohap",
                                       "tieuhoa",
                                       "tietnieu",
                                       "coxuongkhop",
                                       "noitiet",
                                       "thankinh",
                                       "tamthan",
                                       "ngoaikhoa",
                                       "sanphukhoa",
                                       "taimuihong",
                                       "ranghammat",
                                       "mat",
                                       "dalieu",
                                       "dinhduong",
                                       "vandong",
                                       "khamkhac",
                                       "danhgiaphattrien",
                                   ] as $value): ?>
                        <div class="row">
                            <div class="col-xs-12">
                                <?= $form->field($model, $value)->textarea(['rows' => 6]) ?>
                            </div>
                        </div>

                    <?php endforeach;?>

                    <div class="row">

                        <div class="col-xs-12 heading1">3. Kết quả cận lâm sàng</div>
                    </div>
                    <?php foreach ([
                                       "xetnghiemhuyethoc",
                                       "xetnghiemsinhhoamau",
                                       "xetnghiemsinhhoanuoctieu",
                                       "xetnghiemsieuamobung",

                                   ] as $value): ?>
                        <div class="row">
                            <div class="col-xs-12">
                                <?= $form->field($model, $value)->textarea(['rows' => 6]) ?>
                            </div>
                        </div>

                    <?php endforeach;?>

                    <div class="row">

                        <div class="col-xs-12 heading1">4. Chẩn đoán/ Kết luận (ghi tên, mã bệnh theo ICD 10):</div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <?= $form->field($model, 'chandoanketluan')->textarea(['rows' => 6])->label("") ?>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-xs-12 heading1">5. Tư vấn:</div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <?= $form->field($model, 'tuvancuabacsi')->textarea(['rows' => 6])->label("") ?>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-xs-12 heading1">6. Bác sĩ khám:</div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <?= $form->field($model, 'bacsikham')->textInput(['rows' => 6])->label("") ?>
                        </div>
                    </div>





                    <?php if (!Yii::$app->request->isAjax) { ?>
                        <div class="form-group" style="position: fixed;bottom: 0;right: 10px">
                            <div <?php if(!empty(Yii::$app->session->getFlash('gcaptcha'))):?>style="box-shadow: 6px 1px 30px 0px red;margin-bottom: 15px"<?php endif;?>>
                                <script src="https://www.google.com/recaptcha/api.js" async defer></script>
                                <div class="g-recaptcha" data-sitekey="6Lc6HOQUAAAAAAsdfkr5bEUSN1Z9ebp7I6eN31Os"></div>
                                <div style="padding: 15px;color: red">
                                    <?=Yii::$app->session->getFlash('gcaptcha');?>
                                </div>
                            </div>

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
<script>
    $(document).ready(function(){
        $(".dulieuhososuckhoe-view input,select,textarea").attr("disabled",'disabled');
    })
</script>