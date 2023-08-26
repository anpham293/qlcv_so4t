<?php

use johnitvn\ajaxcrud\CrudAsset;

/* @var $this yii\web\View */
/* @var $searchModel common\modules\auth\models\Search\RbacSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Thông báo';
$this->params['breadcrumbs'][] = ['name'=>$this->title,'link'=>'javascript:void(0)'];

CrudAsset::register($this);

?>

<?php if(Yii::$app->session->hasFlash('taoacc')): ?>
    <h2><?=Yii::$app->session->getFlash('taoacc') ?></h2>
    <?php Yii::$app->session->setFlash('taoacc',null) ?>
<?php endif; ?>
