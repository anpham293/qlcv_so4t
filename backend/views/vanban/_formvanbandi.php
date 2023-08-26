<?php

use common\models\Admin;
use common\models\Loaivanban;
use common\models\Phongban;
use common\models\Vanbanden;
use common\models\Vanbandi;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Vanban */
/* @var $form yii\widgets\ActiveForm */
?>
<?php $form = ActiveForm::begin(); ?>
<div class="row">
    <div class="col-md-6">
        <div class="vanban-form">



            <?= $form->field($model, 'ten')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'loaivanban_id')->dropDownList(ArrayHelper::map(Loaivanban::find()->all(), 'id',
                function ($model) {
                    return $model['kyhieu'] . '-' . $model['ten'];
                }
            ), ['id' => 'droploaivb', 'prompt' => 'Chọn loại Hồ sơ sức khỏe']) ?>

            <?= $form->field($model, 'kyhieu')->textInput(['maxlength' => true, 'id' => 'kyhieu']) ?>

            <?= $form->field($model, 'filevanban')->fileInput(['rows' => 6, 'accept' => '.pdf, .docx, .xlxs, .doc, .xls', 'id' => 'fileinput', 'class' => 'hidden']) ?>
            <div class="form-group" id="">
                <a title="Thêm file" onclick="$('#fileinput').click()" id="divfileinput"><img
                            src="/images/add-file-pngrepo-com.png" style="width: 50px"></a>
            </div>

            <div class="form-group" style="border-top: 1px solid #ddd; padding-top: 15px">
                <label class="control-label">File đính kèm <a class="btn btn-default addfiledinhkem" title="Thêm mới"><i
                                class="glyphicon glyphicon-plus"></i></a></label>
                <table id="listfileupload" class="table table-hover table-bordered">

                </table>
            </div>

            <div class="form-group">

                <input type="checkbox" id="yeucau" name="baocaotiendo">     <label class="control-label" for="yeucau">Yêu cầu người được giao việc báo cáo tiến độ</label>

            </div>
            <div class="form-group">

                <label class="control-label" for="deadline">Thời hạn xử lý</label>
                <div class="">
                    <div class="input-group date form_datetime">
                        <input type="text" size="16" name="deadline" readonly class="form-control">
                        <span class="input-group-btn">
												<button class="btn default date-set" type="button"><i class="fa fa-calendar"></i></button>
												</span>
                    </div>
                    <!-- /input-group -->
                </div>
                <script>
                    $(document).ready(function () {
                        $(".form_datetime").datetimepicker({
                            autoclose: true,
                            isRTL: Metronic.isRTL(),
                            format: "yyyy-mm-dd hh:ii",
                            pickerPosition: (Metronic.isRTL() ? "bottom-right" : "bottom-left")
                        });
                    })
                </script>
            </div>
            <div class="form-group">

                <input type="checkbox" id="yeucau" name="lavanbantraloi">     <label class="control-label" for="lavanbantraloi">Là Hồ sơ sức khỏe trả lời</label>

            </div>
            <div class="form-group">

               <?php echo Html::dropDownList('vanbantraloiid','',ArrayHelper::map(Vanbanden::find()->where(['admin_id'=>Yii::$app->user->identity->id,'type'=>2])->andWhere(['<>','status',2])->all(),'id',function($data){
                   return Vanbanden::getVanbanName($data['id']);
               }),['id'=>'traloiselect','prompt'=>'Chọn'])?>

            </div>
        </div>
    </div>
    <div class="col-md-6" id="pdf-viewer">
        <h3>Nội dung Hồ sơ sức khỏe</h3>
    </div>

    <script>
        $(document).ready(function () {

            $("#droploaivb").select2();
            $("#traloiselect").select2();
            $("#droploaivb").on("change", function () {
                var data = $('#droploaivb').select2('data')[0];
                if (data.id != "") {
                    $("#kyhieu").val(data.text.split("-")[0]);
                } else {
                    $("#kyhieu").val("");
                }
            });


            $(document).on('change','.filedinhkem',function () {
                var self=$(this);
                if($(this)[0].files[0].size>3000000){
                    self.parent().parent().remove();
                    $.alert({
                        type:"red",
                        title: "Lỗi",
                        content: "File quá lớn (>3MB)"
                    })
                }

            });
            $(document).on('change', '#fileinput', function (event) {
                var self = this;
                if (showDocumentFileuploadThumbnail(this, "#divfileinput", ["pdf", "doc","docx","xls", "xlxs"])) {
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
            $('#tree_2').on("changed.jstree", function (e, data) {
                var result = "<table class='table table-bordered table-hover table-striped'>" +
                    "<tr><th>STT</th><th>Người nhận Hồ sơ sức khỏe</th><th>Đơn vị</th><th>Loại</th></tr>";
                        var count=1;
                    $.each(data.selected,function(index,value){
                        var dataSelected = value.split("@-@");
                        if(dataSelected[0]=='nhanvien'){
                            result+= "<tr><td>"+count+"</td><td><input type='number' value='"+dataSelected[1]+"' name='nguoinhan[]' style='display: none'>"+dataSelected[2]+"</td><td>"+dataSelected[3]+"</td><td><select class='form-control loainhanchange' name='loainhan[]'><option value=\"0\">Nhận để biết</option> <option value=\"1\">Giao việc</option> <option value=\"2\">Yêu cầu trả lời bằng Hồ sơ sức khỏe</option> </select></td></tr>";
                            count++;
                        }
                    });
                result+="</table>";
                $("#hiendanhsach").html(result);
            })
                .jstree({
                'plugins': ["wholerow", "checkbox", "types","search"],

                'core': {
                    "themes": {
                        "responsive": false
                    },
                    'data': [
                        <?php foreach (Phongban::find()->orderBy('ten asc')->all() as $index =>$value):?>
                        {
                            "text": "<?=$value->ten?>",
                            'id':"phongban-<?=$value->id?>-<?=$value->ten?>",
                            <?php $dataNV = Admin::find()->where(['phongban_id'=>$value->id,'status'=>10])->orderBy("ten asc")->all(); if(!empty($dataNV)):?>
                            "children": [
                                <?php foreach ($dataNV as $valuenhanvien): /** @var Admin $valuenhanvien */?>
                                <?php if($valuenhanvien->id!=Yii::$app->user->identity->id):?>
                                {
                                    "text": "<?=$valuenhanvien->ten." - ".$valuenhanvien->chucVu->ten?>",
                                    'id':'nhanvien@-@<?=$valuenhanvien->id?>@-@<?=$valuenhanvien->ten."@-@".$valuenhanvien->phongBan->ten?>',
                                    "state": {
                                        "selected": false
                                    }
                                },
                                <?php endif;?>
                                <?php endforeach;?>

                            ]

                            <?php endif;?>
                        },
                        <?php endforeach;?>
                    ]
                },
                "types": {
                    "default": {
                        "icon": "fa fa-folder icon-state-warning icon-lg"
                    },
                    "file": {
                        "icon": "fa fa-file icon-state-warning icon-lg"
                    }
                }
            }).bind("loaded.jstree", function (event, data) {
                $(this).jstree("open_all");
            });

            $('#plugins4_q').keyup(function () {
                    var v = $('#plugins4_q').val();
                    $('#tree_2').jstree("search", v);
            });
            $(document).on("change",'.loainhanchange',function () {
                var target = $(this).parent().parent().find('.thcapnhat')[0];

                if(parseInt($(this).val())==1){
                    $(target).html("Yêu cầu cập nhật tiến độ");
                }else{
                    $(target).html("");
                }
            })
        })
    </script>
</div>

<div class="row" style=" padding-top: 15px">

    <div class="col-md-6" style="border-top: 1px sold #ddd">
        <div class="portlet green-meadow box">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>Chọn người nhận Hồ sơ sức khỏe <input type="text" id="plugins4_q" style="color: black">
                </div>
                <div class="tools">
                    <a href="javascript:;" class="collapse">
                    </a>

                </div>
            </div>
            <div class="portlet-body">
                <div id="tree_2" class="tree-demo">
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6" style="border-top: 1px sold #ddd" id="hiendanhsach">
        <table class='table table-bordered table-hover table-striped'>
            <tr><th>STT</th><th>Người nhận Hồ sơ sức khỏe</th><th>Đơn vị</th><th>Loại</th></tr>
        </table>
    </div>
</div>
<?php if (!Yii::$app->request->isAjax) { ?>
    <div class="form-group">
        <?=  Html::a('Save','javascript:void(0)',['class'=>'btn btn-primary','id'=>'fakesave']).Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success btn-save-real' : 'btn btn-primary btn-save-real']) ?>
    </div>
<?php } ?>

<?php $form::end(); ?>
<div class="clearfix"></div>
