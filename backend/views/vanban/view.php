<?php

use common\models\Filedinhkem;
use common\models\Loaivanban;
use common\models\Vanban;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Vanban */

?>
<div class="vanban-view row">

    <div class="col-md-6">
        <div class="portlet-title">
            <div class="caption font-red-intense">
                <i class="icon-speech font-red-intense"></i>
                <span class="caption-subject bold uppercase"> Thông tin Hồ sơ sức khỏe</span>
                <span class="caption-helper"></span>
            </div>

        </div>
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [

                'ten',
                'ngaytao',
                [
                    'label' => 'Loại Hồ sơ sức khỏe',
                    'value' => function ($data) {
                        /** @var $data Vanban */
                        return $data->loaivanban->ten;
                    }
                ],
                [
                    'label' => 'Số hiệu Hồ sơ sức khỏe',
                    'value' => function ($data) {
                        /** @var $data Vanban */
                        return $data->sovanban . "/" . $data->kyhieu;
                    }
                ],
                [
                    'label' => 'File Hồ sơ sức khỏe',
                    'value' => function ($data) {
                        /** @var $data Vanban */
                        return "<a href='" . Yii::$app->urlManagerFrontend->baseUrl . $data->filevanban . "' data-pjax=\"0\" download><i class='fa fa-cloud-download'></i></a>";
                    },
                    'format' => 'raw'
                ],

                [
                    'label' => 'Người tạo',
                    'value' => function ($data) {
                        /** @var $data Vanban */
                        return $data->admin->ten;
                    },
                    'format' => 'raw'
                ],

                'status',
            ],
        ]) ?>
        <div class="portlet-title">
            <div class="caption font-red-intense">
                <i class="icon-speech font-red-intense"></i>
                <span class="caption-subject bold uppercase"> File đính kèm khác</span>
                <span class="caption-helper"></span>
            </div>
            <table class="table table-striped table-bordered detail-view">
                <tbody>
                <?php foreach (Filedinhkem::find()->where(['vanban_id'=>$model->id])->all() as $value):?>
                <tr>
                    <td><a href="<?=Yii::$app->urlManagerFrontend->baseUrl.$value->link?>" download><i class="fa fa-cloud-download"></i> <?=$value->ten?></a></td>

                </tr>
                <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-md-6">
        <iframe style="width: 100%;height: 768px"
                src="<?= Yii::$app->urlManagerFrontend->baseUrl . $model->filevanban ?>"></iframe>
    </div>
    <div class="clearfix"></div>

</div>
<div class="row">

</div>
<div class="clearfix"></div>