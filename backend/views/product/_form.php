<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model common\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>
<?php
\johnitvn\ajaxcrud\CrudAsset::register($this);
$this->title = 'Update sản phẩm';
$this->params['breadcrumbs'][] = ['name' => 'Sản phẩm', 'link' => 'javascript:void(0)'];
$a = \common\models\Catproduct::getListCat();
$escape = new \yii\web\JsExpression("function(m){ return m;}");

$thongsos = \common\models\Properties::getThongso($model->catProduct->id);
?>
<div class="product-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <div class="form-group">

        <?php if (!Yii::$app->request->isAjax) { ?>
            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Lưu lại' : 'Cập nhật', ['id' => 'btn-luu', 'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
        <?php } ?>
    </div>
    <div style="padding-bottom: 20px">
        <ul class="nav nav-tabs">
            <li style="padding-left: 12px" class="active"><a href="#tab1" data-toggle="tab">Thông tin cơ bản</a></li>
            <!--<li><a href="#tab2" data-toggle="tab">Thông số sản phẩm</a></li>-->
        </ul>
    </div>

    <div class="tab-content">
        <div class="content-form tab-pane fade in active" id="tab1">
            <div class="row">
                <div class="col-xs-12">
                    <div class="row">
                        <div class="col-xs-4">
                            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                        </div>
                        <div class="col-xs-4">
                            <?= $form->field($model, 'kieuthanhtoan')->dropDownList(
                                \yii\helpers\ArrayHelper::map([
                                    ['id'=>'1','name'=>'Online, không cần lắp đặt'],
                                    ['id'=>'2','name'=>'Lắp đặt tại nhà'],
                                ],'id','name')
                            ) ?>
                        </div>
                        <div class="col-xs-4" id="phislapdat">
                            <?php if($model->kieuthanhtoan==2):?>
                                <?php echo $form->field($model, 'philapdat')->textInput();?>
                            <?php endif;?>
                        </div>
                        <script>
                            $(document).ready(function () {
                                $(document).on('change','#product-kieuthanhtoan',function () {
                                    if($(this).val()==2){
                                        $("#phislapdat").html('<div class="form-group field-product-philapdat">'+
                                            '<label class="control-label" for="product-philapdat">Phí lắp đặt</label>'+
                                            '<input type="text" id="product-philapdat" class="form-control" name="Product[philapdat]">'+
                                            '<div class="help-block"></div>'+
                                            '</div>');
                                        $("#product-philapdat").inputmask('999.999.999 VNĐ', {
                                            numericInput: true,
                                            rightAlignNumerics: false,
                                            greedy: false
                                        });
                                    }else
                                        $("#phislapdat").html("");
                                })
                                $("#product-philapdat").inputmask('999.999.999 VNĐ', {
                                    numericInput: true,
                                    rightAlignNumerics: false,
                                    greedy: false
                                });
                            })
                        </script>
                    </div>
                    <div class="row">
                        <div class="col-xs-4">
                            <?= $form->field($model, 'sale')->textInput() ?>
                        </div>

                        <div class="col-xs-4">
                            <?= $form->field($model, 'retail')->textInput() ?>
                        </div>

                        <div class="col-xs-4">
                            <?= $form->field($model, 'tag')->dropDownList(\yii\helpers\ArrayHelper::map([
                                ['id'=>'1 tháng'],
                                ['id'=>'30 ngày'],
                                ['id'=>'1 ngày'],
                                ['id'=>'7 ngày'],
                                ['id'=>'MB'],
                                ['id' => '360 ngày'],
                            ],'id','id'))->label('/ đơn vị') ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4">
                            <?= $form->field($model, 'code')->textInput()->label("Thuộc tính",['title'=>'Nếu là gói cước thì định dạng: băng thông trong nước/ băng thông quốc tế tối thiểu']) ?>

                        </div>
                        <div class="col-xs-4 hidden">
                            <?= $form->field($model, 'status')->dropDownList(['1' => 'Instock', '0' => 'Out of stock',], ['prompt' => 'Hãy chọn...']) ?>
                        </div>
                        <div class="col-xs-4">
                            <?= $form->field($model, 'ord')->numberInput() ?>
                        </div>
                        <div class="col-xs-4">
                            <?= $form->field($model, 'luotxem')->numberInput() ?>
                        </div>
                    </div>

                    <div class="row d-check-box">
                        <div class="col-xs-4">
                            <div class="home-check">
                                <?= $form->field($model, 'hot')->checkbox() ?>
                                <em>Chọn nếu sản phảm nổi bật</em>
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="home-check">
                                <?= $form->field($model, 'active')->checkbox() ?>
                                <em>Chọn nếu hiện thị mặc định</em>
                            </div>
                        </div>
                        <div class="col-xs-2">
                            <div class="home-check">
                                <?= $form->field($model, 'home')->checkbox() ?>
                            </div>

                        </div>
                        <div class="col-xs-2">
                            <div class="home-check">
                                <?= $form->field($model, 'new')->checkbox() ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-6 col-md-3">
                            <div class="form-group has-error">
                                <label class="control-label" for="product-kieu">Phương thức</label>
                                <?php echo Html::dropDownList('Product[kieudangky]',$model->kieudangky,\yii\helpers\ArrayHelper::map(
                                    [
                                        ['id'=>'1','name'=>'Gọi điện'],
                                        ['id'=>'2','name'=>'Nhắn tin'],
                                        ['id'=>'3','name'=>'Quý khách mang CMND qua cửa hàng Viettel'],
                                    ],'id','name'
                                ),['class'=>'form-control','id'=>'dropts'])?>
                            </div>
                        </div>
                        <div class="col-xs-6 col-md-3">
                            <div class="form-group has-error">
                                <label class="control-label" id="tst" for="product-kieu">Số điện thoại</label>
                                <?php echo Html::textInput('Product[cuphap]',$model->cuphap,['class'=>'form-control','id'=>'cuphap'])?>
                            </div>
                        </div>
                        <div class="col-xs-6 col-md-3">
                            <?= $form->field($model, 'cat_product_id')->widget(\kartik\select2\Select2::className(), [
                                'data' => $a,
                                'language' => 'vi',
                                'options' => ['placeholder' => 'Chọn loại sản phẩm ...'],
                                'pluginOptions' => [
                                    'allowClear' => true
                                ],
                            ]);
                            ?>
                        </div>
                        <div class="col-xs-6 col-md-3">
                            <?= $form->field($model, 'brand_id')->widget(\kartik\select2\Select2::className(), [
                                'data' => \yii\helpers\ArrayHelper::map(\common\models\Brand::find()->all(), 'id', 'name'),
                                'language' => 'vi',
                                'options' => ['placeholder' => 'Chọn thương hiệu ...'],
                                'pluginOptions' => [
                                    'allowClear' => true,
                                ],
                            ]);
                            ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12">
                            <?= $form->field($model, 'brief')->textarea(['id' => 'brief']) ?>
                        </div>

                            <div class="col-xs-12">
                                <?= $form->field($model, 'decription')->textarea(['id'=>'description']) ?>
                            </div>

                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <?= Html::label('Ảnh sản phẩm', 'upload-anh') ?>
                            <?= FileInput::widget([
                                'name' => 'images[]',
                                'pluginOptions' =>
                                    [
                                        'allowedFileExtensions' => ['jpg', 'png', 'jpeg'],
                                        'showUpload' => false,
                                        'removeOptions' => ['label' => true],
                                    ],

                                'options' => ['multiple' => true, 'id' => 'upload']
                            ]);
                            ?>
                            <?php if (!$model->isNewRecord): ?>
                                <?php
                                foreach ($model->anhsanphams as $hinhanh) {
                                    ?>
                                    <div class="product-img" id="hinhanh-<?=$hinhanh->id?>">
                                        <div class="image-dele">
                                            <a class="close-img-dele" id="<?=$hinhanh->id?>">
                                                <i class="fa fa-times" aria-hidden="true"></i>
                                            </a>
                                            <img src="<?= Yii::$app->urlManagerFrontend->baseUrl. $hinhanh->image ?>">
                                        </div>
                                        <label class="label-default-img">
                                            <?= Html::radio('default',$hinhanh->default,['id'=>$hinhanh->id,'class'=>'radio-img']) ?>
                                            <strong>Mặc định</strong>
                                        </label>
                                    </div>
                                    <?php
                                }
                            endif;
                            ?>
                        </div>
                    </div>
                    <?php if (!$model->isNewRecord): ?>
                        <div class="tab-seo panel-heading"><i class="fa fa-pencil" aria-hidden="true"></i>Thiết lập SEO
                        </div>
                        <div class="row seo-content">
                            <div class="col-xs-12">
                                <?= $form->field($model, 'seo_title')->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-xs-12">
                                <?= $form->field($model, 'seo_desc')->textarea(['rows' => 6]) ?>
                            </div>
                            <div class="col-xs-12">
                                <?= $form->field($model, 'seo_keyword')->textarea(['rows' => 6]) ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>


            </div>
        </div>

    </div>
    <?php ActiveForm::end(); ?>
</div>


<script>
    $(document).ready(function () {

        CKEDITOR.replace('brief', {
            language: 'vi'

        });  CKEDITOR.replace('description', {
            language: 'vi'

        });
        $("#product-sale").inputmask('999.999.999 VNĐ', {
            numericInput: true,
            rightAlignNumerics: false,
            greedy: false
        });
        $("#product-retail").inputmask('999.999.999 VNĐ', {
            numericInput: true,
            rightAlignNumerics: false,
            greedy: false
        });
        $(document).on('change','#dropts',function () {

            if($(this).val()==1){
                $("#cuphap").val("<?php echo \common\models\Configure::getConfig()['contact_hotline']?>");
            }else
                $("#tst").text("Cú pháp")
        })
    })

    $(document).on('click','.close-img-dele',function () {
        var id = $(this).attr('id');
        $.ajax({
            url: '<?=Yii::$app->urlManager->createUrl(['product/xoaanh'])?>',
            data: {id: id},
            type: 'post',
            dataType: 'json',
            success: function (data) {
                $("#hinhanh-"+id).fadeOut('slow');
            }
        })
    });

</script>