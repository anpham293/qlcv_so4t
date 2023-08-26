<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Thongsoduanvalue */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="thongsoduanvalue-form">

    <div class="col-md-6">
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'thongsoid')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\Thongsoduan::getListThongSoForSelect(),'id','ten','group')) ?>

        <?= $form->field($model, 'value')->numberInput(['rows' => 6,'min'=>0]) ?>


        <?php if (!Yii::$app->request->isAjax){ ?>
            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
        <?php } ?>

        <?php ActiveForm::end(); ?>
    </div>
    <div class="col-md-6">
        <?php
        $result = "<table class='table table-bordered table-striped table-hover'><tr><td>Thông số</td><td>Kế hoạch</td></tr>";
        $thongso2 = \common\models\Thongsoduanvalue::findAll(['duanid' => $model->duanid]);
        if (empty($thongso2)) {
            echo "Chưa cập nhật";
        } else {
            foreach ($thongso2 as $value2) {
                $value = \common\models\Thongsoduan::findOne($value2->thongsoid);
                if($value->parent==-1)
                    $result .= "<tr><td>" . $value->ten . "</td><td>" . $value2->value . "</td></tr>";
                else{
                    $value3 = \common\models\Thongsoduan::findOne($value->parent);
                    $result .= "<tr><td><strong>".$value3->ten."</strong> --| " . $value->ten . "</td><td>" . $value2->value . "</td></tr>";
                }
            }
            $result .= "</table>";
            echo $result;
        }
        ?>
    </div>
    <div class="clearfix"></div>
</div>
