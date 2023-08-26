<?php

use common\models\Thongsocongviecvalue;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Baocaocongviec */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="baocaocongviec-form">

    <?php $form = ActiveForm::begin(); ?>

   <div class="hidden">
    <?= $form->field($model, 'nguoibaocao')->textInput() ?>

    <?= $form->field($model, 'congviec_id')->textInput() ?>
   </div>
    <?= $form->field($model, 'noidungbaocao')->textInput() ?>
    <?= $form->field($model, 'ketquadatduoc')->textArea()?>
    <div class="form-group">
        <label class="control-label">File đính kèm (rar,zip,docx, excel...)</label>
        <?=Html::fileInput('fileupload')?>
    </div>
    <h2 style="font-weight: bolder">Thông số báo cáo</h2>
    <?php
    $result = "<table class='table table-bordered table-striped table-hover'><tr><td>Thông số</td><td>Giá trị</td></tr>";
    $thongso2 = \common\models\Thongsoduanvalue::findAll(['duanid' => $model->congviec->duan->id]);
    if (empty($thongso2)) {
        echo "Chưa cập nhật";
    } else {
        foreach ($thongso2 as $value2) {
            $thongsocongviec=null;
            if(!$model->isNewRecord)
                $thongsocongviec = Thongsocongviecvalue::findOne(['congviec' => $model->id, 'thongsoid' => $value2->thongsoid]);

            $value = \common\models\Thongsoduan::findOne($value2->thongsoid);
            if($value->parent==-1)
                $result .= "<tr><td>" . $value->ten . "</td><td><input type='number' class='form-control' name='thongso[".$value->id."]' min='0' value=".((is_null($thongsocongviec))?0:$thongsocongviec->value)."></td></tr>";
            else{
                $value3 = \common\models\Thongsoduan::findOne($value->parent);
                $result .= "<tr><td><strong>".$value3->ten."</strong> --| " . $value->ten . "</td><td><input type='number' class='form-control' name='thongso[".$value->id."]' min='0' value=".((is_null($thongsocongviec))?0:$thongsocongviec->value)."></td></tr>";
            }
        }
        $result .= "</table>";
        echo $result;
    }
    ?>

    <?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
