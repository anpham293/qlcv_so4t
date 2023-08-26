<?php

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
        'attribute' => 'congvandinhkem',
        'value' => function ($data) {
            return ($data->congvandinhkem != "Không có") ? \yii\helpers\Html::a(explode("/", $data->congvandinhkem)[2], Yii::$app->urlManagerFrontend->baseUrl . $data->congvandinhkem, ['data-pjax' => 0, 'target' => '_blank']) : $data->congvandinhkem;
        },
        'format' => 'raw'
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'tencongvan',
    ],

    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'userid',
        'value' => function ($data) {
            $admin = \common\models\Admin::findOne($data->userid);
            return (is_null($admin)) ? "#N/A" : $admin->ten;
        }
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'ngaytao',
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'label' => 'Các hạng mục',
        'value' => function ($data) {
            $return = '<table class="table table-bordered table-striped table-hover" style="margin-top: 10px">
        <tr>
            <th>Hạng mục</th>
            <th>Giá trị</th>
        </tr>';

            foreach (\common\models\Hangmucchiphiduan::find()->where(['thongsoketoan_id' => $data->id])->all() as $value):
                $hangmuc = \common\models\Hangmucchiphi::findOne($value->hangmuc_id);
                $return .= '
            <tr>
                <td>' . ((is_null($hangmuc)) ? "#N/A" : $hangmuc->tenhangmuc) . '</td>
                <td>' . number_format($value->value,0,"",",") . '</td>
            </tr>';
            endforeach;
            $return .= '</table>';
            return $return;
        },
        'format' => 'raw'
    ],
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
            'data-confirm-title' => 'Are you sure?',
            'data-confirm-message' => 'Are you sure want to delete this item'],
    ],

];   