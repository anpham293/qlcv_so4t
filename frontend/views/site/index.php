<?php
$this->context->og_type = 'website';


$config = \common\models\Configure::getConfig();

/** @var \common\models\Khaibaoyte $model */

use common\models\Dantoc;
use common\models\Dulieuhososuckhoe;
use common\models\Phuongxa;
use common\models\Quanhuyen;
use common\models\Quoctich;
use common\models\Tinhthanh;
use common\models\Tongiao;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\widgets\ActiveForm;

?>


<div class="container" id="maincontent">
    <h1>TỜ KHAI Y TẾ</h1>
    <?php $currentUrl = "$_SERVER[HTTP_HOST]";
    $split = explode("dctech.haiduong.vn", $currentUrl);
    if ($split[0] != "") {
        $domain = rtrim($split[0], ".");
        $benhvien = \common\models\Benhvien::findOne(['subdomain' => $domain]);
        if (is_null($benhvien)) {

        } else {
            ?>
            <h3 style="font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif!important; text-align: center"> <?= $benhvien->name; ?> </h3>
            <?php
        }
    } ?>
    <div class="text-center">

    </div>
    <div class="red-title text-center">
        Khuyến cáo: VIỆC CUNG CẤP THÔNG TIN VÀ PHỐI HỢP THAM GIA CỦA ÔNG/BÀ LÀ TỰ NGUYỆN VÀ TRUNG THỰC VÌ MỤC ĐÍCH
        CHỐNG DỊCH COVID-19
    </div>
    <div id="tokhai">
        <div class="dulieuhososuckhoe-form">
            <div class="alert alert-success"><i>Vui lòng điền thông tin chính xác và trung thực theo mẫu dưới đây</i>
                hoặc <a href="<?= Yii::$app->urlManager->createUrl(['site/checklichsu']) ?>" target="_blank"
                        class="btn btn-success">Tra cứu lịch sử khai</a></div>
            <?php $form = ActiveForm::begin(); ?>

            <div class="row">
                <?= $form->field($model, 'loaikhaibao', ['template' => '<div class="form-group col-xs-12">{input}</div>'])
                    ->radioList([
                        'Người bệnh' => 'Người bệnh',
                        'Người nhà' => 'Người nhà',
                        'Khai hộ' => 'Khai hộ',
                        'Nhân viên y tế' => 'Nhân viên y tế',
                        'Khác' => 'Khác'
                    ], ['maxlength' => true, 'placeholder' => $model->getFirstError('loaikhaibao')]) ?>
            </div>
            <script>
                $(document).ready(function () {
                    $(document).on('click', 'input[name="Khaibaoyte[loaikhaibao]"]', function () {
                        var val = $(this).val();
                        if (val === "Nhân viên y tế") {
                            $("#lydodenviens").addClass("hidden");
                            $("#khaibaoyte-lydodenvien").val("#N/A");
                            $("#khoaphonglamviecs").removeClass("hidden");
                            $("#khaibaoyte-khoaphonglamviec").val("");
                        } else {
                            $("#khoaphonglamviecs").addClass("hidden");
                            $("#khaibaoyte-lydodenvien").val("");
                            $("#lydodenviens").removeClass("hidden");
                            $("#khaibaoyte-khoaphonglamviec").val("#N/A");
                        }
                    });
                    $(document).on('change', '#khaibaoyte-sodienthoai', function () {
                        var self = $(this);
                        $.ajax({
                            url: "<?=Yii::$app->urlManager->createUrl('site/checksdt')?>",
                            type: "post",
                            dataType: 'json',
                            data: {
                                sdt: self.val()
                            },
                            success: function (data) {
                                if (data.length > 0) {
                                    $("#table-ketqua").html("");
                                    $.each(data, function (index, value) {
                                        $("#table-ketqua").append("<tr class='tr-choose'><th><input type='radio' name='selects' " + ((index === 0) ? "checked" : "") + " tinhthanhphohktt='" + value.tinhthanhphohktt + "' quanhuyenhktt='" + value.quanhuyenhktt + "' xaphuonghktt='" + value.xaphuonghktt + "' diachi='" + value.diachi + "' hovaten='" + value.hovaten + "' gioitinh='" + value.gioitinh + "' ngaysinh='" + value.ngaysinh + "' thangsinh='" + value.thangsinh + "' namsinh='" + value.namsinh + "'></th><th>" + value.hovaten + "</th><th>" + value.gioitinh + "</th><th>" + value.ngaysinh + "/" + value.thangsinh + "/" + value.namsinh + "</th><th>" + value.tinhthanhphohktt + "</th><th>" + value.quanhuyenhktt + "</th><th>" + value.xaphuonghktt + "</th><th>" + value.diachi + "</th></tr>");
                                    });
                                    $("#clickme").click();
                                }
                            }
                        });
                    });
                    $(document).on('click', "#btn-chon", function () {
                        var self = $('input[name=selects]:checked');
                        $("#khaibaoyte-hovaten").val(self.attr("hovaten"));
                        $("#khaibaoyte-gioitinh").val(self.attr("gioitinh"));
                        $("#khaibaoyte-diachi").val(self.attr("diachi"));
                        $("#khaibaoyte-ngaysinh").val(self.attr("ngaysinh"));
                        $("#khaibaoyte-thangsinh").val(self.attr("thangsinh"));
                        $("#khaibaoyte-namsinh").val(self.attr("namsinh"));
                        setTimeout(function () {
                            $("#khaibaoyte-tinhthanhphohktt").val(self.attr("tinhthanhphohktt")).trigger('change');
                            setTimeout(
                                function () {
                                    $("#khaibaoyte-quanhuyenhktt").val(self.attr("quanhuyenhktt")).trigger('change');
                                    setTimeout(
                                        function () {
                                            $("#khaibaoyte-xaphuonghktt").val(self.attr("xaphuonghktt")).trigger('change');
                                        },100
                                    )
                                },200
                            )
                        },0);


                        $(".close", "#exampleModal").click();
                    })
                })
            </script>
            <div class="row">
                <div class="col-md-6 col-xs-12">
                    <?= $form->field($model, 'mabenhnhan', ['template' => '<div class="col-xs-4">{label}{error}</div><div class="col-xs-8">{input}</div>'])
                        ->numberInput(['maxlength' => true, 'placeholder' => "không yêu cầu, chỉ nhập nếu đang là bệnh nhân"]) ?>
                </div>
                <div class="col-md-6 col-xs-12">
                    <?= $form->field($model, 'sodienthoai', ['template' => '<div class="col-xs-4">{label}{error}</div><div class="col-xs-8">{input}</div>'])
                        ->textInput(['maxlength' => true, 'placeholder' => $model->getFirstError('sodienthoai')]) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-xs-12">
                    <?= $form->field($model, 'hovaten', ['template' => '<div class="col-xs-4">{label}{error}</div><div class="col-xs-8">{input}</div>'])
                        ->textInput(['maxlength' => true, 'placeholder' => $model->getFirstError('hovaten')]) ?>
                </div>
                <div class="col-md-6 col-xs-12">
                    <?= $form->field($model, 'gioitinh', ['template' => '<div class="col-xs-4">{label}{error}</div><div class="col-xs-8">{input}</div>'])
                        ->dropDownList([
                            'Nam' => 'Nam',
                            'Nữ' => 'Nữ',
                            'Giới tính khác' => 'Giới tính khác'
                        ], ['maxlength' => true, 'placeholder' => $model->getFirstError('gioitinh')]) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-xs-12">
                    <?= $form->field($model, 'nguoithan1', ['template' => '<div class="col-xs-4">{label}{error}</div><div class="col-xs-8">{input}</div>'])
                        ->textInput(['maxlength' => true, 'placeholder' => $model->getFirstError('nguoithan1')]) ?>
                </div>
                <div class="col-md-6 col-xs-12">
                    <?= $form->field($model, 'nguoithan2', ['template' => '<div class="col-xs-4">{label}{error}</div><div class="col-xs-8">{input}</div>'])
                        ->textInput(['maxlength' => true, 'placeholder' => $model->getFirstError('nguoithan2')]) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-xs-12">
                    <div class="row">
                        <div style="padding: 0" class="col-xs-4 required">
                            <label class="control-label" for="khaibaoyte-diachi">Ngày sinh</label>
                        </div>
                        <div style="padding: 0" class="col-xs-2">
                            <?= $form->field($model, 'ngaysinh', ['template' => '<div class="form-group">{input}</div>'])
                                ->dropDownList(func::getListInt(1, 31), ['maxlength' => true, 'placeholder' => $model->getFirstError('ngaysinh')]) ?>
                        </div>
                        <div style="padding: 0" class="col-xs-3">
                            <?= $form->field($model, 'thangsinh', ['template' => '<div class="form-group">{input}</div>'])
                                ->dropDownList(func::getListInt(1, 12), ['maxlength' => true, 'placeholder' => $model->getFirstError('thangsinh')]) ?>
                        </div>
                        <div style="padding: 0" class="col-xs-3">
                            <?= $form->field($model, 'namsinh', ['template' => '<div class="form-group">{input}</div>'])
                                ->dropDownList(func::getListInt(1900, getdate()['year']), ['maxlength' => true, 'placeholder' => $model->getFirstError('namsinh')]) ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-xs-12">
                    <?= $form->field($model, 'tinhthanhphohktt', ['template' => '<div class="col-xs-4">{label}{error}</div><div class="col-xs-8">{input}</div>'])
                        ->dropDownList(Tinhthanh::getListTinhThanhForDropdown(), ['class' => 'form-control diachiselect', 'maxlength' => true, 'prompt' => 'Chọn', 'placeholder' => $model->getFirstError('tinhthanhphohktt')]) ?>
                </div>
                <div class="col-md-6 col-xs-12">
                    <?= $form->field($model, 'quanhuyenhktt', ['template' => '<div class="col-xs-4">{label}{error}</div><div class="col-xs-8">{input}</div>'])
                        ->dropDownList(Quanhuyen::getListQuanHuyenForDropdown($model->tinhthanhphohktt), ['class' => 'form-control diachiselect', 'prompt' => 'Chọn', 'maxlength' => true, 'placeholder' => $model->getFirstError('quanhuyenhktt')]) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-xs-12">
                    <?= $form->field($model, 'xaphuonghktt', ['template' => '<div class="col-xs-4">{label}{error}</div><div class="col-xs-8">{input}</div>'])
                        ->dropDownList(Phuongxa::getListPhuongXaForDropdown($model->quanhuyenhktt), ['class' => 'form-control diachiselect', 'prompt' => 'Chọn', 'maxlength' => true, 'placeholder' => $model->getFirstError('xaphuonghktt')]) ?>
                </div>
                <div class="col-md-6 col-xs-12">
                    <?= $form->field($model, 'diachi', ['template' => '<div class="col-xs-4">{label}{error}</div><div class="col-xs-8">{input}</div>'])
                        ->textInput(['maxlength' => true, 'placeholder' => $model->getFirstError('diachi')]) ?>
                </div>


            </div>

            <div class="row">
                <div class="col-xs-12" id="lydodenviens">
                    <?= $form->field($model, 'lydodenvien', ['template' => '<div class="form-group">{label}{error}{input}</div>'])
                        ->textInput(['maxlength' => true, 'placeholder' => $model->getFirstError('lydodenvien')]) ?>
                </div>
                <div id="khoaphonglamviecs" class="col-xs-12 <?php if ($model->loaikhaibao != "Nhân viên y tế") {
                    echo "hidden";
                } ?>">
                    <?= $form->field($model, 'khoaphonglamviec', ['template' => '<div class="form-group">{label}{error}{input}</div>'])
                        ->textInput(['maxlength' => true, 'placeholder' => $model->getFirstError('khoaphonglamviec')]) ?>
                </div>
            </div>
            <?php function generateElement($name, $text, $form, $model)
            {
                return "<tr>
                            <td>" . (new \common\models\Khaibaoyte())->attributeLabels()[$name] . " <span class='has-error' style='color: red'>" . $model->getFirstError($name) . "</span></td>
                        " . $form->field($model, $name)
                        ->radioList([
                            1 => 'Có',
                            0 => 'Không'
                        ], [
                            'item' => function ($index, $label, $name, $checked, $value) {

                                $return = '';
                                $return .= '<td  style="text-align: center"><label style="display: block"><input ' . (($checked) ? "checked" : '') . ' type="radio" name="' . $name . '" value="' . $value . '"></label></td>';
                                return $return;
                            },
                            'maxlength' => true])->label(false) . "
                        </tr>";
            } ?>
            <style>#divbenh .help-block {
                    display: none
                }</style>
            <div id="divbenh" class="col-xs-12 required">

                <table class="table table-bordered table-hover table-striped">
                    <tr>
                        <th colspan="3"><label class="control-label">Hiện tại bạn có những dấu hiệu nào sau
                                đây:</label></th>
                    </tr>
                    <tr>
                        <th><label class="control-label">Dấu hiệu:</label></th>
                        <th style="text-align: center">Có</th>
                        <th style="text-align: center">Không</th>
                    </tr>
                    <?= generateElement('dauhieu_ho', 'Ho', $form, $model) ?>
                    <?= generateElement('dauhieu_sot', 'Ho', $form, $model) ?>
                    <?= generateElement('dauhieu_daumoi', 'Ho', $form, $model) ?>
                    <?= generateElement('dauhieu_matvigiac', 'Ho', $form, $model) ?>
                    <tr>
                        <th colspan="3"><label class="control-label">Trong 14 ngày qua bạn có:</label></th>
                    </tr>
                    <tr>
                        <th><label class="control-label">Yếu tố dịch tễ:</label></th>
                        <th style="text-align: center">Có</th>
                        <th style="text-align: center">Không</th>
                    </tr>
                    <?= generateElement('yeutodichte_tiepxucduongtinh', 'Ho', $form, $model) ?>
                    <?= generateElement('yeutodichte_tiepxucsot', 'Ho', $form, $model) ?>
                    <?= generateElement('yeutodichte_didenquocgia', 'Ho', $form, $model) ?>
                    <?= generateElement('yeutodichte_didenvungdich', 'Ho', $form, $model) ?>
                    <?= generateElement('yeutodichte_dangcachlytainha', 'Ho', $form, $model) ?>
                    <tr>
                        <td colspan="3">
                            <div style="">
                                <label class="control-label">Các vùng dịch đã đến <span style='color:red'>Chỉ chọn khi đã tới các nơi bên dưới, nếu không đến không cần chọn. Nếu đền nơi khác có tình hình dịch phức tạp, vui lòng điền vào ô nhập bên dưới!</span></label>
                                <input type="hidden" name="Khaibaoyte[listVungDich]" value="">
                                <input type="hidden" name="Khaibaoyte[listVungDichNguoiNha1]" value="">
                                <input type="hidden" name="Khaibaoyte[listVungDichNguoiNha2]" value="">
                                <table class="table table-hover table-bordered table-striped">
                                    <tr>
                                        <th>Vùng dịch</th>
                                        <th>Người khai</th>
                                        <th>Người thân 1</th>
                                        <th>Người thân 2</th>
                                    </tr>

                                <?php foreach (\yii\helpers\ArrayHelper::map(\common\models\Vungdich::find()->all(), 'ten', 'ten') as $value):?>
                                    <tr>
                                        <td><b><?=$value?></b></td>
                                        <td><label class="" style="display: block;text-align: center"> <input type="checkbox" <?php if(is_array($model->listVungDich) && in_array($value,$model->listVungDich))echo"checked";?> name="Khaibaoyte[listVungDich][]" value="<?=$value?>"></label></td>
                                        <td><label class="" style="display: block;text-align: center"> <input type="checkbox" <?php if(is_array($model->listVungDichNguoiNha1) && in_array($value,$model->listVungDichNguoiNha1))echo"checked";?> name="Khaibaoyte[listVungDichNguoiNha1][]" value="<?=$value?>"></label></td>
                                        <td><label class="" style="display: block;text-align: center"> <input type="checkbox" <?php if(is_array($model->listVungDichNguoiNha2) && in_array($value,$model->listVungDichNguoiNha2))echo"checked";?> name="Khaibaoyte[listVungDichNguoiNha2][]" value="<?=$value?>"></label></td>

                                    </tr>
                                <?php endforeach;?>
                                </table>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3"> <?= $form->field($model, 'yeutodichte_quocgiadiadiem', ['template' => '<div class="form-group">{error}{input}</div>'])
                                ->textInput(['maxlength' => true, 'placeholder' => "Hoặc vị trí khác từng đên"])->label("Hoặc vị trí khác từng đên") ?></td>
                    </tr>
                </table>
                <style>
                    #khaibaoyte-listvungdich label{
                        font-weight: 100;
                    }
                    #khaibaoyte-listvungdich{
                                             max-height: 500px;overflow-y: scroll
                    }
                </style>
                <?php if (!Yii::$app->request->isAjax) { ?>
                    <div class="form-group" style="text-align: right;margin-top:10px;margin-bottom:10px">


                        <?= Html::submitButton($model->isNewRecord ? 'Nộp hồ sơ' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                        <?= Html::button("Clear", ["type" => "reset", 'class' => 'btn btn-primary']) ?>
                    </div>
                <?php } ?>
            </div>
            <div class="clearfix"></div>

            <div class="col-xs-12">
                <div class="alert alert-success">
                    <div class="text-center">
                        SỞ Y TẾ TỈNH HẢI DƯƠNG
                    </div>
                    <div class="red-title text-center">
                        Khuyến cáo: VIỆC CUNG CẤP THÔNG TIN VÀ PHỐI HỢP THAM GIA CỦA ÔNG/BÀ LÀ TỰ NGUYỆN VÀ TRUNG THỰC
                        VÌ MỤC ĐÍCH
                        CHỐNG DỊCH COVID-19
                    </div>
                </div>
            </div>

            <div class="col-xs-12" style="text-align: center;padding-bottom: 25px">
                <div id="qr" style="margin: auto"></div>
                <style>#qr table {
                        margin: auto !important;
                    }</style>
            </div>

            <script>
                $(document).ready(function () {
                    $('#qr').qrcode({
                        render: "table",
                        text: "<?="http://$_SERVER[HTTP_HOST]"?>"
                    });
                    $(".diachiselect").select2();
                    $("#khaibaoyte-tinhthanhphohktt").val('<?=$model->tinhthanhphohktt?>').trigger('change');
                    $("#khaibaoyte-quanhuyenhktt").val('<?=$model->quanhuyenhktt?>').trigger('change');
                    $("#khaibaoyte-xaphuonghktt").val('<?=$model->xaphuonghktt?>').trigger('change');
                    $("#khaibaoyte-tinhthanhphohktt").on("change", function () {
                        var self = $(this);
                        $.ajax({
                            url: "<?=Yii::$app->urlManager->createUrl(["site/getquanhuyenbytinhthanh"])?>",
                            type: 'post',
                            dataType: 'json',
                            data: {
                                tinhthanh: self.val()
                            },
                            success: function (datas) {
                                dataDrop = [];
                                $.each(datas, function (index, value) {
                                    dataDrop.push({
                                        "id": value,
                                        "text": value
                                    });
                                });

                                $("#khaibaoyte-quanhuyenhktt").empty().select2({
                                    data: dataDrop,
                                }).trigger('change');

                            }
                        })
                    });
                    $("#khaibaoyte-quanhuyenhktt").on("change", function () {
                        var self = $(this);
                        $.ajax({
                            url: "<?=Yii::$app->urlManager->createUrl(["site/getphuongxabyquanhuyen"])?>",
                            type: 'post',
                            dataType: 'json',
                            data: {
                                tinhthanh: self.val()
                            },
                            success: function (datas) {
                                dataDrop = [];
                                $.each(datas, function (index, value) {
                                    dataDrop.push({
                                        "id": value,
                                        "text": value
                                    });
                                });

                                $("#khaibaoyte-xaphuonghktt").empty().select2({
                                    data: dataDrop,
                                }).trigger('change');

                            }
                        })
                    })
                })
            </script>


            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>

<button type="button" class="btn btn-primary hidden" id="clickme" data-toggle="modal" data-target="#exampleModal">
    Launch demo modal
</button>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Số điện thoại đã khai báo trước đó</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Bạn có muốn dùng lại các thông tin liên hệ đã khai báo trước đó không?
                <table id="table-ketqua" class="table table-bordered table-striped table-hover">

                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Không chọn</button>
                <button type="button" class="btn btn-primary" id="btn-chon">Chọn</button>
            </div>
        </div>
    </div>
</div>

