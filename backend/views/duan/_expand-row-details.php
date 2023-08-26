<?php /** @var \common\models\Congviec $model */?>
<?php \yii\widgets\Pjax::begin(['id'=>'expand'.$model->id])?>
<div class="kv-detail-content" style="background: white; padding: 10px 10px">

    <div class="col-md-12 table-responsive">

            <?=Yii::$app->controller->renderPartial('temp',['model'=>$model])?>

    </div>
    <div class="clearfix"></div>
</div>
<?php \yii\widgets\Pjax::end()?>