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

$this->title = 'Bài viết';
$this->params['breadcrumbs'][] = ['name' => 'Thêm mới bài viết', 'link' => 'javascript:void(0)'];

?>
<div class="page-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <div class="form-group">

        <?php if (!Yii::$app->request->isAjax) { ?>
            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Lưu lại' : 'Cập nhật', ['id' => 'btn-luu', 'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
        <?php } ?>
    </div>

    <div class="content-form">
        <div class="row">
            <div class="col-xs-12">
                <div class="row">
                    <div class="col-xs-12">
                        <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
                    </div>

                    <div class="col-xs-3">
                        <?= $form->field($model, 'ord')->textInput() ?>
                    </div>

                    <div class="col-xs-3">
                        <div class="home-check">
                            <?= $form->field($model, 'active')->checkbox() ?>
                            <em>Chọn nếu hiển thị mặc định</em>
                        </div>
                    </div>

                    <div class="col-xs-12">
                        <?= $form->field($model, 'content')->textarea(['id' => 'noidung']) ?>
                    </div>

                </div>
            </div>
            <?php if (!$model->isNewRecord): ?>

                    <div class="col-xs-12">
                        <?= $form->field($model, 'seo_title')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-xs-12">
                        <?= $form->field($model, 'seo_desc')->textarea(['rows' => 6]) ?>
                    </div>
                    <div class="col-xs-12">
                        <?= $form->field($model, 'seo_keyword')->textarea(['rows' => 6]) ?>
                    </div>

            <?php endif; ?>
        </div>


    </div>
</div>

<?php ActiveForm::end(); ?>
</div>


<script>
  $(document).ready(function () {
    $('#tag').tagsInput({
      width: '100%',
      'onAddTag': function () {
        //alert(1);
      }
    })
    CKEDITOR.replace('noidung', {
      language: 'vi'
    })

  })

</script>