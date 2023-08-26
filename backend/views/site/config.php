<?php
/**
 * Created by PhpStorm.
 * User: HungLuongCoi
 * Date: 7/5/2015
 * Time: 7:55 AM
 */ ?>
<?php $this->pageTitle = "Cài đặt hệ thống" ?>
<?php $this->title = "Cài đặt hệ thống" ?>
<?php $this->nav = array(
    array('title'=>'Cài đặt hệ thống','url'=>'#'),
)?>

<?php echo \yii\helpers\Html::beginForm(['site/luuconfig'],'post');
echo \yii\helpers\Html::submitButton('Lưu lại cài đặt',['class'=>'btn blue']);
$list= Yii::$app->db->createCommand('select DISTINCT nhom from config')->queryAll();
foreach ($list as $value):
?>
    <div class="col-xs-12" style="border: 1px solid #dddddd; border-radius: 4px; padding: 15px; margin-bottom: 15px">
<span class="caption-subject font-blue-steel bold uppercase" style="font-size: 22px">Thiết lập <?php echo $value['nhom']?></span>

<div class="clearfix"></div>
    <?php $config = \common\models\Configure::find()->where('nhom=:nhom',[':nhom'=>$value['nhom']])->all();
        foreach ($config as $configs):
    ?>
<div class="col-sm-3 col-xs-12">
    <div class="form-group">
        <?php echo \yii\helpers\Html::label('<span class="caption-subject font-blue-steel bold uppercase"><span class="caption-subject font-blue-steel bold uppercase">'.$configs->label.':</span></span>','',['class'=>'form-label']);?>
        <?php echo \yii\helpers\Html::textInput('config['.$configs->name.']',$configs->value,['class'=>'form-control','placeholder'=>$configs->label])?>
    </div>
</div>
            <?php endforeach;?>
    </div>
<?php endforeach;?>
<?php echo \yii\helpers\Html::endForm();?>
