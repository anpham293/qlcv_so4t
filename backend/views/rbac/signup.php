<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset;
use johnitvn\ajaxcrud\BulkButtonWidget;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel common\modules\auth\models\Search\RbacSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Đăng ký người dùng';
$this->params['breadcrumbs'][] = ['name' => $this->title, 'link' => 'javascript:void(0)'];

CrudAsset::register($this);

?>

<div class="site-signup">
    <p>Hãy nhập thông tin tài khoản cần tạo!</p>
    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
            <?php $user = \common\models\Admin::findOne(Yii::$app->user->identity->id);?>
            <?= $form->field($model, 'phongban')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\Phongban::find()->orderBy('ord asc')->all(),'id','ten'))->label('Phòng ban') ?>
            <?= $form->field($model, 'chucvu')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\Chucvu::find()->all(),'id','ten'))->label('Chức vụ') ?>
            <?= $form->field($model, 'donvi')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\Admin::getAdminForQuanly(),'id','ten','group'))->label('Người quản lý') ?>
            <?= $form->field($model, 'ten')->textInput(['autofocus' => true])->label('Họ và tên') ?>


            <?= $form->field($model, 'username')->textInput() ?>

            <?= $form->field($model, 'email')->textInput(['type'=>'email']) ?>


            <?= $form->field($model, 'password')->passwordInput() ?>

            <?= $form->field($model, 'password_repeat')->passwordInput()->label("Nhập lại mật khẩu") ?>
            

           <?= $form->field($model, 'role')->dropDownList($roles)->label('Vai trò') ?>

            <div class="hidden">
                <?php if(strtolower(Yii::$app->user->identity->username) == "superadmin" && Yii::$app->user->identity->userdb=="khaibaoyte"):?>
                    <?= $form->field($model, 'hierachy')->dropDownList($hierachy,['id'=>'selectbox'])->label('Phân hệ sử dụng') ?>
                <?php else:?>
                    <div class="hidden"> <?= $form->field($model, 'hierachy')->textInput(['class'=>'hidden'])->label('Phân hệ sử dụng') ?></div>
                <?php endif;?>
            </div>

            <div class="form-group">
                <?= Html::submitButton('Đăng ký', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>


<script>
    $(document).ready(function () {
        $("#selectbox").select2();
    })
</script>