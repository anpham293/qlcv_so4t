<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset;
use johnitvn\ajaxcrud\BulkButtonWidget;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\Configure */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cấu hình Website';
$this->params['breadcrumbs'][] = ['name' => $this->title, 'link' => 'javascript:void(0)'];
$configlist = \common\models\Configure::getConfig();
CrudAsset::register($this);

?>

<?php echo \yii\helpers\Html::beginForm('', '', ['id' => 'form-config']);
$list = Yii::$app->db->createCommand('select DISTINCT nhom from configure where nhom <> "Local"')->queryAll();
?>
<div id='div-config'><?php echo \yii\helpers\Html::button('Lưu lại cài đặt', ['class' => 'btn blue', 'id' => 'btn-luu']); ?>
    <?php
    foreach ($list as $value):
        ?>
        <div class="col-xs-12" style=" border-radius: 4px; padding: 15px; margin-bottom: 15px">

            <h3 class="caption-subject font-blue-steel bold uppercase"
                style="font-size: 22px;background: #f5f5f5; padding: 15px">Thiết lập <?php echo $value['nhom'] ?></h3>

            <div class="clearfix"></div>
            <?php $config = \common\models\Configure::find()->where('nhom=:nhom', [':nhom' => $value['nhom']])->all();
            foreach ($config as $configs):
                ?>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <?php echo \yii\helpers\Html::label('<span class="caption-subject font-blue-steel bold uppercase" title="' . $configs->name . '">' . $configs->label . ':</span>', '', ['class' => 'form-label']); ?>
                        <?php

                        if (strtolower($configs->label) != "password")
                            echo \yii\helpers\Html::textInput('config[' . $configs->name . ']', $configs->value, ['class' => 'form-control', 'placeholder' => $configs->label]);
                        if (strtolower($configs->label) == "password")
                            echo \yii\helpers\Html::passwordInput('config[' . $configs->name . ']', $configs->value, ['class' => 'form-control', 'placeholder' => $configs->label]);


                        ?>
                    </div>
                </div>
            <?php endforeach; ?>
            <?php if ($value['nhom'] == "Cấu hình hiển thị"): ?>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <?php echo \yii\helpers\Html::label('<span class="caption-subject font-blue-steel bold uppercase" title="favicon">Icon trang:</span>', '', ['class' => 'form-label']);
                        $fav = \common\models\Configure::find()->where('name=:name', [':name' => "favicon"])->one();
                        ?><br>
                        <img id="fav"
                             src="<?php echo str_replace("/admin", "", Yii::$app->request->getBaseUrl()) . $fav->value ?>"
                             style="width: 50px; height: auto; margin-bottom: 10px">
                        <?php
                        echo Html::fileInput('icon', "", ['data-target' => "#fav", 'onChange' => "uploadImage2(this)"]);
                        ?>
                    </div>
                </div>
            <?php endif; ?>
            <?php if ($value['nhom'] == "Cấu hình liên hệ"): ?>
                <div class="col-xs-12" style="padding: 0">
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <?php echo \yii\helpers\Html::label('<span class="caption-subject font-blue-steel bold uppercase" title="contact_logo">Logo:</span>', '', ['class' => 'form-label']);
                            $fav = \common\models\Configure::find()->where('name=:name', [':name' => "contact_logo"])->one();
                            ?><br>
                            <img id="fav2"
                                 src="<?php echo str_replace("/admin", "", Yii::$app->request->getBaseUrl()) . $fav->value ?>"
                                 style="width: 100%; height: auto; margin-bottom: 10px">
                            <?php
                            echo Html::fileInput('logo', "", ['data-target' => "#fav2", 'onChange' => "uploadImage2(this)"]);
                            ?>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <?php echo \yii\helpers\Html::label('<span class="caption-subject font-blue-steel bold uppercase" title="contact_logo">Logo Footer:</span>', '', ['class' => 'form-label']);
                            $fav = \common\models\Configure::find()->where('name=:name', [':name' => "contact_logo_footer"])->one();
                            ?><br>
                            <img id="fav3"
                                 src="<?php echo str_replace("/admin", "", Yii::$app->request->getBaseUrl()) . $fav->value ?>"
                                 style="width: 100%; height: auto; margin-bottom: 10px">
                            <?php
                            echo Html::fileInput('logofooter', "", ['data-target' => "#fav3", 'onChange' => "uploadImage2(this)"]);
                            ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
    <?php echo \yii\helpers\Html::endForm(); ?>
    <div class="clearfix"></div>
</div>

<script>
    $(document).ready(function () {
        $(document).on('click', '#btn-luu', function () {
            if (confirm("Cập nhật cấu hình?")) {
                $("#form-config").ajaxSubmit({
                    url: "<?php echo Yii::$app->urlManager->createUrl('configure/luuconfig')?>",

                    type: 'post',
                    beforeSend: function () {
                        block({target: "#div-config"});
                    },
                    success: function () {
                        alert("Success!");
                    },
                    complete: function () {
                        unblock("#div-config")
                    }
                })
            }
        })
    })
</script>