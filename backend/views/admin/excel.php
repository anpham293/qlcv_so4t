<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset;
use johnitvn\ajaxcrud\BulkButtonWidget;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\CrmSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Import excel User');
$this->params['breadcrumbs'][] = ['name'=>$this->title,'link'=>'javascript:void(0)'];

CrudAsset::register($this);

?>
<?=Html::beginForm(['admin/excel'],'post',['enctype'=>'multipart/form-data']);?>
<div class="form-group">
    <?=Html::fileInput('fileupload','',['required'=>true])?>
    <?=Html::a('Tải xuống mẫu file upload',Yii::$app->urlManagerFrontend->baseUrl."/upload/user.xlsx",['class'=>'btn yellow']).Html::submitButton('Tiến hành import',['class'=>'btn blue']);?>
</div>
<?=Html::endForm();?>
