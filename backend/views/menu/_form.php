<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Menu */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="menu-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class=" col-lg-12 col-md-12 col-xs-12">
        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    </div>

    <div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <?= $form->field($model, 'type')->dropDownList(\yii\helpers\ArrayHelper::map([['id' => 'top', 'value' => 'Menu Header'], ['id' => 'bottom', 'value' => 'Menu Footer']], 'id', 'value')) ?>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <?= $form->field($model, 'menustyle')->dropDownList([0=>'Menu thường', 1=>'Mega menu']) ?>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <?= $form->field($model, 'ord')->numberInput() ?>
        </div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-12">
        <?= $form->field($model, 'link')->dropDownList(\yii\helpers\ArrayHelper::map(func::getMenu(),'value','text','group'),['id'=>'drop-link']) ?>
        <div class="form-group field-lienkettinh" id="divtinh">
            <label class="control-label" for="lienkettinh">Đường dẫn ngoài</label>
            <input type="text" id="lienkettinh" class="form-control" name="Menu[link]" value="<?php echo $model->link?>">
            <div class="help-block"></div>
        </div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <?= $form->field($model, 'parent')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\Menu::find()->all(), 'id', 'name'),['prompt'=>'Không']) ?>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
            <label class="control-label">Kích hoạt</label>
            <?= $form->field($model, 'active')->checkbox() ?>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
            <label class="control-label">Mở trang mới</label>
            <?= $form->field($model, 'new_tab')->checkbox() ?>
        </div>
    </div>

    <?php if (!Yii::$app->request->isAjax) { ?>
            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
        <?php } ?>

    <?php ActiveForm::end(); ?>
    <div class="clearfix"></div>
</div>
<script>
    if($("#drop-link").val()!="link")
        $("#divtinh").html("");
    $(document).ready(function () {
        $(document).on('change','#drop-link',function () {
            if($(this).val() !="link"){
                $("#divtinh").html("");
            }else{
                $("#divtinh").html('<label class="control-label" for="lienkettinh">Đường dẫn ngoài</label>'+
                    '<input type="text" id="lienkettinh" class="form-control" name="Menu[link]" value="<?php echo $model->link?>">'+
                    '<div class="help-block">'+
                    '</div>');
            $("#lienkettinh").focus();}
        })
    })
</script>

<script>
    $(document).ready(function () {
        setTimeout(function () {
            $('#<?=Yii::$app->controller->id?>-name').focus()
        },700)
    })
</script>