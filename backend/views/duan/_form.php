<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
date_default_timezone_set("Asia/Ho_Chi_Minh");
/* @var $this yii\web\View */
/* @var $model common\models\Duan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="duan-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="col-md-6">
        <?= $form->field($model, 'ten')->textInput(['rows' => 6]) ?>

        <?= $form->field($model, 'mota')->textarea(['rows' => 6]) ?>

        <div class="form-group">
            <label class="control-label">
                Lãnh đạo phụ trách
            </label>
        <?= Html::checkboxList('listphutrach',$model->isNewRecord?null:(\yii\helpers\Json::decode($model->nguoiphutrach)),\yii\helpers\ArrayHelper::map(\common\models\Admin::getAdminListByPhongBanId(2),'id','ten')) ?>
        </div>
        <?= $form->field($model, 'loaiduan_id')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\Loaiduan::find()->all(),'id','tenloai')) ?>
        <?= $form->field($model, 'ngaybatdau')->input('date') ?>
        <?= $form->field($model, 'deadline')->input('date') ?>

        <?= $form->field($model, 'tongdientich')->dropDownList([0=>"Không",1=>"Quan trọng"],['class'=>'form-control']) ?>
        <?= $form->field($model, 'taichinh')->dropDownList([0=>"Không quản lý",1=>"Quản lý"],['class'=>'form-control']) ?>
        <?= $form->field($model, 'status')->dropDownList(\common\models\Duan::$statuslist,['class'=>'form-control']) ?>
        <input id = "fileinput" class="" multiple type="file" name="fileinp[]" accept="application/pdf,.doc,.docx,.csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">

        <div class="form-group " id="">
            <a title="Thêm file" onclick="$('#fileinput').click()" id="divfileinput"><img
                        src="/images/add-file-pngrepo-com.png" style="width: 50px"> </a>
            <?php if(!$model->isNewRecord):?>
                <table class="table table-hover table-striped table-bordered">
                    <tr><th colspan="2">Danh sách file</th></tr>

                <?php
                if(empty($model->congvan)){
                    echo "";
                }else{
                    $files = \yii\helpers\Json::decode($model->congvan);
                    foreach ($files as $index=> $file){
                         $t=explode("/",$file);
                        echo '<tr><td>'.($index+1).'</td><td><a href="'.$file.'">'.$t[count($t)-1].'</a></td></tr>';
                    }
                }
                ?>
                </table>
            <?php endif;?>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">
                Phòng ban phụ trách
            </label>
            <?php

            $listchon = [];

                $phongban = \common\models\Phongban::find()->where('id<>2')->orderBy('ord asc')->all();
                foreach ($phongban as $value){
                    $listchon[]=[
                            'id'=>$value->id,
                            'name'=>$value->ten
                        ];
                }

            ?>
            <?=Html::checkboxList('listphongban',$model->isNewRecord?((isset($ids) && $ids!="")?[$ids]:null):\yii\helpers\Json::decode($model->truongphongphutrach),\yii\helpers\ArrayHelper::map($listchon,'id','name'), [
                'itemOptions' => [
                    'labelOptions' => [
                        'class' => 'col-md-6',
                    ],
                ],
            ])?>
            <div class="clearfix"></div>
        </div>
        <div id="nhanvienresult">

        </div>
    </div>
    <div class="clearfix"></div>
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
<script>
    $("#duan-nguoiphutrach").select2();
    $("#duan-loaiduan_id").select2();
    <?php if(!$model->isNewRecord):?>
    var listid = [];
    $.each($('input[name="listphongban[]"]'),function (){
        if($(this).is(":checked")){
            listid.push($(this).val());
        }
    })
    console.log(listid);
    $.ajax({
        url:'/admin/site/getnhanvienphongban',
        type:'post',
        dataType:'html',
        data:{
            id:listid,
            modelid:<?=$model->id?>
        },
        beforeSend:function (){
            block({target:"#ajaxCrudModal"});
        },
        success:function (data){
            $(document).find("#nhanvienresult").html(data);
            unblock("#ajaxCrudModal");
        }
    })
    <?php else:?>
    var listid = [];
    $.each($('input[name="listphongban[]"]'),function (){
        if($(this).is(":checked")){
            listid.push($(this).val());
        }
    })
    console.log(listid);
    $.ajax({
        url:'/admin/site/getnhanvienphongban',
        type:'post',
        dataType:'html',
        data:{
            id:listid
        },
        beforeSend:function (){
            block({target:"#ajaxCrudModal"});
        },
        success:function (data){
            $(document).find("#nhanvienresult").html(data);
            unblock("#ajaxCrudModal");
        }
    })
    <?php endif;?>
</script>