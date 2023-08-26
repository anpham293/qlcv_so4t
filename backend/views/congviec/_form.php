<?php

use common\models\Admin;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Congviec */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="congviec-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="col-md-12">
        <?php if ($model->isNewRecord):?>
            <?= $form->field($model, 'tencongviec')->textInput(['rows' => 6]) ?>

            <?= $form->field($model, 'motacongviec')->textarea(['rows' => 6]) ?>



            <?= $form->field($model, 'ngaygiao')->input('date',['maxlength' => true]) ?>

            <?= $form->field($model, 'ngayhoanthanh')->input('date',['maxlength' => true]) ?>


        <?php else:?>


                <?= $form->field($model, 'tencongviec')->textInput(['rows' => 6]) ?>

                <?= $form->field($model, 'motacongviec')->textarea(['rows' => 6]) ?>


            <?= $form->field($model, 'ngaygiao')->input('date',['maxlength' => true]) ?>

            <?= $form->field($model, 'ngayhoanthanh')->input('date',['maxlength' => true]) ?>


            <?= $form->field($model, 'status')->dropDownList(\common\models\Congviec::$statuslist) ?>
        <?php endif;?>
        <input id = "fileinput" class="" multiple type="file" name="fileinp[]" accept="application/pdf,.doc,.docx,.csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">

        <div class="form-group " id="">
            <a title="Thêm file" onclick="$('#fileinput').click()" id="divfileinput"><img
                        src="/images/add-file-pngrepo-com.png" style="width: 50px"> </a>
            <?php if(!$model->isNewRecord):?>
                <table class="table table-hover table-striped table-bordered">
                    <tr><th colspan="2">Danh sách file</th></tr>

                    <?php
                    if(empty($model->danhgiacongviec)){
                        echo "";
                    }else{
                        $files = \yii\helpers\Json::decode($model->danhgiacongviec);
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
    <div class="col-md-12">
        <div class="form-group">
            <label class="control-label alert alert-success" style="width: 100%">
                Thêm người phối hợp
                <?php
                $listchon = [];

                $phongban = \common\models\Phongban::find()->where(["<>","id",2])->orderBy('ord asc')->all();
                foreach ($phongban as $value){
                    $listchon[]=[
                        'id'=>$value->id,
                        'name'=>$value->ten
                    ];
                }

                ?>
                <?php $phongbanlist = [];
                if(!$model->isNewRecord){
                    $nguoiphoihop = \common\models\Nguoiphoihop::find()->where(['congviecid'=>$model->id])->select("nguoiduocgan")->distinct()->all();
                    $phongbanlist = Admin::find()->where(['IN','id',$nguoiphoihop])->select("phongban_id")->distinct()->all();
                }?>
                <?=Html::checkboxList('listphongban',$phongbanlist,\yii\helpers\ArrayHelper::map($listchon,'id','name'), [
                    'itemOptions' => [
                        'labelOptions' => [
                            'class' => 'col-md-6',
                        ],
                    ],
                ])?>
            </label>
            
            <div id="nhanvienresult">

            </div>



        </div>
    </div>
    <div class="clearfix"></div>

    <div class="clearfix"></div>
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
<script>
    $("#congviec-nguoinhan").select2();
    <?php if(!$model->isNewRecord):?>
    var listid = [];
    $.each($('input[name="listphongban[]"]'),function (){
        if($(this).is(":checked")){
            listid.push($(this).val());
        }
    })
    console.log(listid);
    $.ajax({
        url:'/admin/site/getnhanvienphongbanforcheckbox',
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
    <?php endif;?>
</script>