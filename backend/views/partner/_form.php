<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Partner */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="partner-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>



    <?php
    echo Html::label('Hình ảnh', null, ['style' => 'display: block']);
    if (!$model->isNewRecord) {
        ?>
        <div class="D-imageboxform">
            <?php
            echo Html::img(Yii::$app->urlManagerFrontend->baseUrl . $model->image, ['class' => 'D-imageform']);
            ?>
        </div>
        <?php
    }
    echo $form->field($model, 'image')->fileInput(['name' => 'anhpartner'])->label(false);

    ?>




    <?= $form->field($model, 'position')->dropDownList(\common\models\Partner::getPosition(), ['prompt' => 'chon...']) ?>
    <?= $form->field($model, 'url')->dropDownList(\yii\helpers\ArrayHelper::map(func::getMenu(),'value','text','group'),['id'=>'drop-url']) ?>
    <div class="form-group field-lienkettinh" id="divtinh">
        <label class="control-label" for="lienkettinh">Đường dẫn ngoài</label>
        <input type="text" id="lienkettinh" class="form-control" name="Partner[url]" value="<?php echo $model->url?>">
        <div class="help-block"></div>
    </div>
    <div class="clearfix"></div>
    <?= $form->field($model, 'ord')->numberInput() ?>

    <?= $form->field($model, 'active')->checkbox() ?>

    <? /*= $form->field($model, 'lang_id')->textInput() */ ?>


    <?php if (!Yii::$app->request->isAjax) { ?>
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    <?php } ?>

    <?php ActiveForm::end(); ?>

</div>
<script>
    $(document).ready(function () {
        setTimeout(function () {
            $('#<?=Yii::$app->controller->id?>-name').focus()
        }, 700)
    })
</script>
<script>
    if($("#drop-url").val()!="link")
        $("#divtinh").html("");
    $(document).ready(function () {
        $(document).on('change','#drop-url',function () {
            if($(this).val() !="link"){
                $("#divtinh").html("");
            }else{
                $("#divtinh").html('<label class="control-label" for="lienkettinh">Đường dẫn ngoài</label>'+
                    '<input type="text" id="lienkettinh" class="form-control" name="Partner[url]" value="<?php echo $model->url?>">'+
                    '<div class="help-block">'+
                    '</div>');
                $("#lienkettinh").focus();}
        })
    })
</script>