<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Congvanhanhchinh */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="congvanhanhchinh-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="col-md-4">
        <?= $form->field($model, 'sokyhieu')->textInput(['maxlength' => true]) ?>

        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'ngaybanhanh')->textInput(['id'=>'form_datetime1']) ?>
            </div>

            <div class="col-md-6">
                <?= $form->field($model, 'ngayhieuluc')->textInput(['id'=>'form_datetime2']) ?>
            </div>
        </div>

        <script>
            $(document).ready(function () {
                $("#form_datetime1").datepicker({
                    format: "yyyy/mm/dd"
                });
                $("#form_datetime2").datepicker({
                    format: "yyyy/mm/dd"
                });
            })
        </script>

        <?= $form->field($model, 'nguoiky')->textInput(['maxlength' => true]) ?>

        <label> <b>Hiển thị cho tất cả mọi người: </b></label>
        <?= $form->field($model, 'active')->checkbox() ?>

        <h2><b>File Hồ sơ sức khỏe: </b></h2>
        <input id = "fileinput" class="hidden" type="file" name="fileinp" accept="application/pdf">

        <div class="form-group " id="">
            <a title="Thêm file" onclick="$('#fileinput').click()" id="divfileinput"><img
                        src="/images/add-file-pngrepo-com.png" style="width: 50px"></a>
        </div>
    </div>

    <div class="col-md-4" style="border-left: 2px solid #ddd; border-right: 2px solid #ddd">


        <?= $form->field($model, 'loaivbhc_id')->dropDownList(\common\models\Loaivbhc::loaivbhcForSelect(), ['id'=>'loaivbhc', 'prompt'=>'-- Chọn loại Hồ sơ sức khỏe --']) ?>

        <?= $form->field($model, 'coquanbanhanh_id')->dropDownList(\common\models\Coquanbanhanh::coquanbanhanhForSelect(), ['id'=>'coquanbanhanh', 'prompt'=>'-- Chọn bộ phận xử lý Hồ sơ sức khỏe --']) ?>

        <?= $form->field($model, 'Linhvucvanban_id')->dropDownList(\common\models\Linhvucvanban::linhvucvanbanForSelect(), ['id'=>'linhvuccb', 'prompt'=>'-- Chọn lĩnh vực Hồ sơ sức khỏe --']) ?>

        <?= $form->field($model, 'trichyeu')->textarea(['rows' => 6]) ?>

    </div>

    <div class="col-md-4" id="pdf-viewer">
        <h3>Nội dung Hồ sơ sức khỏe</h3>
    </div>

    <div class="clearfix"></div>

    <?php if (!Yii::$app->request->isAjax) { ?>
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    <?php } ?>

    <?php ActiveForm::end(); ?>

</div>
<script>
    $(document).on('change', '#fileinput', function (event) {
        var self = this;
        if (showDocumentFileuploadThumbnail(this, "#divfileinput", ["pdf"])) {
            var file = event.target.files[0];

            //Step 2: Read the file using file reader
            var fileReader = new FileReader();

            fileReader.onload = function () {

                //Step 4:turn array buffer into typed array
                var typedarray = new Uint8Array(this.result);


                //Step 5:PDFJS should be able to read this
                renderPDF(pdfjsLib.getDocument(typedarray), $("#pdf-viewer"));


            };
            //Step 3:Read the file as ArrayBuffer
            fileReader.readAsArrayBuffer(file);
        } else {
            $("#pdf-viewer").html("");
        }
    });
</script>
