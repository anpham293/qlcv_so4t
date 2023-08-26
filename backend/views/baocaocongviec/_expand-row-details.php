<?php /** @var \common\models\Congviec $model */?>
<?php \yii\widgets\Pjax::begin(['id'=>'expand'.$model->id])?>
<div class="kv-detail-content" style="background: white; padding: 10px 10px">
    <div class="col-md-12 table-responsive">
        <table class="table table-striped table-hover table-bordered">
            <tr><th colspan="2">Chi tiết công việc</th></tr>
            <tr><td colspan="2"><?=nl2br($model->motacongviec)?></td></tr>
            <tr><th>Ngày giao việc</th><td><?=date_format(date_create_from_format('Y-m-d',$model->ngaygiao),'d/m/Y')?></td></tr>
            <tr><th>Thời hạn</th><td><?="<span style='".($model->checkExpire()&&$model->status!=1?"color:red":"color:green")."'>".date_format(date_create_from_format('Y-m-d',$model->ngayhoanthanh),'d/m/Y')." <br>(".$model->getDateRemaining()." ngày)</span>"?></td></tr>
            <tr><th>Trạng thái</th><td><?=$model->getStatusText();?></td></tr>
            <tr><th>Yêu cầu bổ sung</th><td> <?php \yii\widgets\Pjax::begin(['id'=>'expand-yeucau'.$model->id])?><?=Yii::$app->controller->renderPartial('tempycbs',['model'=>$model])?><?php \yii\widgets\Pjax::end()?></td></tr>
        </table>
    </div>
    <div class="col-md-12 table-responsive">

            <?=Yii::$app->controller->renderPartial('temp',['model'=>$model])?>

    </div>
    <div class="clearfix"></div>
</div>
<?php \yii\widgets\Pjax::end()?>