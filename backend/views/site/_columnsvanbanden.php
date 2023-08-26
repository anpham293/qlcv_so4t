<?php

use common\models\Admin;
use common\models\Vanban;
use common\models\Vanbanden;
use common\models\Loaivanban;
use yii\helpers\Url;

return [
    [
        'class' => 'kartik\grid\CheckboxColumn',
        'width' => '20px',
    ],
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
    ],
    // [
    // 'class'=>'\kartik\grid\DataColumn',
    // 'attribute'=>'id',
    // ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'vanbandi_id',
        'label' => 'Hồ sơ sức khỏe',
        'value' => function ($data) {
            /** @var Vanbanden $data */
            if(is_null($data->vanbandi)){
                return "#N/A";
            }
            if ($data->status == 0) {
                return '<a style="font-weight:bold" title="Xem" href="/admin/vanban/viewvanbandi?id=' . $data->vanbandi_id . '" role="modal-remote" data-toggle="tooltip" data-pjax="0">' . $data->vanbandi->vanban->ten . "</a>";
            } else {
                return '<a title="Xem" href="/admin/vanban/viewvanbandi?id=' . $data->vanbandi_id . '" role="modal-remote" data-toggle="tooltip" data-pjax="0">' . $data->vanbandi->vanban->ten . "</a>";
            }
        },
        'format' => 'raw'
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'isvanbantraloi',
        'label' => "Là VB trả lời",
        'value' => function ($data) {
            /** @var Vanbanden $data */
            if(is_null($data->vanbandi)){
                return "#N/A";
            }
            return ($data->vanbandi->isvanbantraloi) ? "<i class='fa fa-check-circle'></i> <br>trả lời Hồ sơ sức khỏe: " . $data->vanbandi->vanbantraloi->vanban->ten : "<i class='fa fa-remove'></i>";
        },
        'headerOptions' => ['style' => 'text-align: center'],
        'contentOptions' => ['style' => 'text-align: center'],

        'filterType' => \kartik\grid\GridView::FILTER_SELECT2,
        'filter' => \yii\helpers\ArrayHelper::map([
            ['id' => 0, 'name' => 'Không'],
            ['id' => 1, 'name' => 'Có']
        ], 'id', 'name'),
        'filterWidgetOptions' => [
            'pluginOptions' => ['allowClear' => true],
        ],
        'filterInputOptions' => ['prompt' => 'Hiển thị tất cả'],
        'format' => 'raw'
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'loaivanban_id',
        'label' => 'Lĩnh vực Hồ sơ sức khỏe',
        'value' => function ($data) {
            /** @var Vanbanden $data */
            if(is_null($data->vanbandi)){
                return "#N/A";
            }
            return '<a class="text">' . $data->vanbandi->vanban->loaivanban->ten . "</a>";
        },
        'headerOptions' => ['style' => 'text-align: center'],
        'contentOptions' => ['style' => 'text-align: center'],

        'filter' => \yii\helpers\ArrayHelper::map(\common\models\Loaivanban::find()->asArray()->all(), 'id', 'ten'),
        'filterType' => \kartik\grid\GridView::FILTER_SELECT2,
        'filterWidgetOptions' => [
            'pluginOptions' => ['allowClear' => true],
        ],
        'filterInputOptions' => ['prompt' => 'Hiển thị tất cả'],

        'format' => 'raw'
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'yeucaucapnhattiendo',
        'label' => 'Giao việc',
        'value' => function ($data) {
            /** @var Vanbanden $data */
            switch ($data->type) {
                case 0:
                    return "Nhận để biết";
                    break;
                case 1:
                    return "Yêu cầu cập nhật tiến độ công việc <br>Hạn hoàn thành: " . $data->vanbandi->deadline;
                    break;
                case 2:
                    return "Yêu cầu trả lời bằng Hồ sơ sức khỏe";
            }
        },
        'headerOptions' => ['style' => 'text-align: center'],
        'contentOptions' => ['style' => 'text-align: justify'],
        'format' => 'raw'
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'status',
        'label' => 'Trạng thái',
        'value' => function ($data) {
            /** @var Vanbanden $data */
            switch ($data->status) {
                case 0:
                    return "<span class='badge badge-danger'>Đã nhận, Chưa xem</span>";
                    break;
                case 1:
                    return "<span class='badge badge-warning'>Đã xem, chưa hoàn thành</span> <a class='hoanthanh btn btn-success' data-id='" . $data->id . "'>Hoàn thành</a>";
                    break;
                case 2:
                    return "<span class='badge badge-success'>Đã hoàn thành</span>";
            }
        },
        'headerOptions' => ['style' => 'text-align: center; width: 50px'],
        'contentOptions' => ['style' => 'text-align: center'],

        'format' => 'raw'
    ],
    // [
    // 'class'=>'\kartik\grid\DataColumn',
    // 'attribute'=>'loaivanban_id',
    // ],
    // [
    // 'class'=>'\kartik\grid\DataColumn',
    // 'attribute'=>'status',
    // ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'vAlign' => 'middle',
        'urlCreator' => function ($action, $model, $key, $index) {
            return Url::to([$action, 'id' => $key]);
        },
        'viewOptions' => ['role' => 'modal-remote', 'title' => 'View', 'data-toggle' => 'tooltip'],
        'updateOptions' => ['role' => 'modal-remote', 'title' => 'Update', 'data-toggle' => 'tooltip'],
        'deleteOptions' => ['role' => 'modal-remote', 'title' => 'Delete',
            'data-confirm' => false, 'data-method' => false,// for overide yii data api
            'data-request-method' => 'post',
            'data-toggle' => 'tooltip',
            'data-confirm-title' => 'Bạn chắc chắn muốn xóa?',
            'data-confirm-message' => 'Bạn muốn xóa mục này?'],
        'visibleButtons' => [
            'delete' => false,
            'update' => false
        ],
        'buttons' => [
            'view' => function ($model, $key, $index) {
                if(is_null($key->vanbandi)){
                    return "#N/A";
                }
                return "<a title='Xem' href='" . Yii::$app->urlManager->createUrl(['vanban/view', 'id' => $key->vanbandi->vanban_id]) . "' role=\"modal-remote\" data-toggle=\"tooltip\" data-pjax='0'><i class='glyphicon glyphicon-eye-open'></i></a>";
            },


        ],
        'template' => '{view}',
    ],

];   