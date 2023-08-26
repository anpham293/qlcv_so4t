<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Thongsoketoan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="thongsoketoan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tencongvan')->textInput(['rows' => 6]) ?>

    <?= Html::fileInput('fileupload') ?>

    <table class="table table-bordered table-striped table-hover" style="margin-top: 10px">
        <tr>
            <th>Hạng mục</th>
            <th>Giá trị</th>
        </tr>

        <?php foreach (\common\models\Hangmucchiphi::find()->all() as $value):
            $thongso = null;
            if(!$model->isNewRecord){
                $thongso=\common\models\Hangmucchiphiduan::findOne(['thongsoketoan_id'=>$model->id,'hangmuc_id'=>$value->id]);
            }
            ?>
            <tr>
                <td><?=$value->tenhangmuc?></td>
                <td><input type="number" min="0" name="hangmuc[<?=$value->id?>]" class="form-control" value="<?=(is_null($thongso)?0:$thongso->value)?>"></td>
            </tr>
        <?php endforeach;?>
    </table>

    <?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
