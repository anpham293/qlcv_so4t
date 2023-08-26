<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset;
use johnitvn\ajaxcrud\BulkButtonWidget;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\OfficeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Offices';
$this->params['breadcrumbs'][] = ['name' => $this->title, 'link' => 'javascript:void(0)'];

CrudAsset::register($this);

?>
<div class="office-index">
    <div id="ajaxCrudDatatable">
        <?= GridView::widget([
            'id' => 'crud-datatable',
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'pjax' => true,
            'pjaxSettings' => ['options' => ['enablePushState' => false]],
            'summary' => 'Từ {begin} đến {end}/ Tổng {totalCount} bản ghi',
            'columns' => [
                [
                    'class' => 'kartik\grid\CheckboxColumn',
                    'width' => '20px',
                ],
                [
                    'class' => 'kartik\grid\SerialColumn',
                    'width' => '30px',
                    'header' => 'STT',
                ],
                // [
                // 'class'=>'\kartik\grid\DataColumn',
                // 'attribute'=>'id',
                // ],
                [
                    'class' => '\kartik\grid\DataColumn',
                    'attribute' => 'name',
                ],
                [
                    'class' => '\kartik\grid\DataColumn',
                    'attribute' => 'address',
                ],
                [
                    'class' => '\kartik\grid\DataColumn',
                    'attribute' => 'phone',
                ],
//                [
//                    'class'=>'\kartik\grid\DataColumn',
//                    'attribute'=>'fax',
//                ],
                [
                    'class' => '\kartik\grid\DataColumn',
                    'attribute' => 'email',
                ],
                [
                    'class' => '\kartik\grid\DataColumn',
                    'attribute' => 'ord',
                    'value' => function ($data) {
                        return Html::numberInput('', $data->ord, ['control' => 'office', 'vals' => $data->id, 'class' => "ord-change form-control", 'min' => 0]);
                    },
                    'format' => 'raw',
                    'headerOptions' => ['style' => 'text-align:center; width:100px'],
                    'contentOptions' => ['style' => 'text-align:center'],
                    'filter' => false
                ],
                [
                    'class' => '\kartik\grid\DataColumn',
                    'attribute' => 'active',
                    'value' => function ($data) {
                        return ($data->active == 1) ? "<a control='office' vals=" . $data->id . " class=\"active-change glyphicon glyphicon-ok text-success\"></a>" : "<a control='office' vals=" . $data->id . " class=\"active-change glyphicon glyphicon-remove text-danger\"></a>";
                    },

                    'filter' => Html::dropDownList('OfficeSearch[active]', $searchModel->active, \yii\helpers\ArrayHelper::map([['id' => 0, 'name' => 'Không'], ['id' => 1, 'name' => 'Có']], 'id', 'name'), ['class' => 'form-control', 'prompt' => '']),
                    'format' => 'raw',
                    'headerOptions' => ['style' => 'text-align:center; width:100px'],
                    'contentOptions' => ['style' => 'text-align:center'],
                ],
                // [
                // 'class'=>'\kartik\grid\DataColumn',
                // 'attribute'=>'lang_id',
                // ],
                [
                    'class' => 'kartik\grid\ActionColumn',
                    'dropdown' => false,
                    'vAlign' => 'middle',
                    'urlCreator' => function ($action, $model, $key, $index) {
                        return Url::to([$action, 'id' => $key]);
                    },
                    'viewOptions' => ['class' => 'hidden'],
                    'updateOptions' => ['role' => 'modal-remote', 'title' => 'Update', 'data-toggle' => 'tooltip'],
                    'deleteOptions' => ['role' => 'modal-remote', 'title' => 'Delete',
                        'data-confirm' => false, 'data-method' => false,// for overide yii data api
                        'data-request-method' => 'post',
                        'data-toggle' => 'tooltip',
                        'data-confirm-title' => 'Are you sure?',
                        'data-confirm-message' => 'Are you sure want to delete this item'],
                ],

            ],
            'toolbar' => [
                ['content' =>
                    Html::a('<i class="glyphicon glyphicon-plus"></i>', ['create'],
                        ['role' => 'modal-remote', 'title' => 'Create new Offices', 'class' => 'btn btn-default']) .
                    Html::a('<i class="glyphicon glyphicon-repeat"></i>', [''],
                        ['data-pjax' => 1, 'class' => 'btn btn-default', 'title' => 'Reset Grid']) .
                    '{toggleData}' .
                    '{export}'
                ],
            ],
            'striped' => true,
            'condensed' => true,
            'responsive' => true,
            'panel' => [
                'type' => 'primary',
                'heading' => '<i class="glyphicon glyphicon-list"></i> Danh sách văn phòng',
//                'before'=>'<em>* Thay đổi khoảng cách các cột bằng cách kéo thả các cạnh.</em>',
                'after' => BulkButtonWidget::widget([
                        'buttons' => Html::a('<i class="glyphicon glyphicon-trash"></i>&nbsp; Xóa toàn bộ',
                            ["bulkdelete"],
                            [
                                "class" => "btn btn-danger btn-xs",
                                'role' => 'modal-remote-bulk',
                                'data-confirm' => false, 'data-method' => false,// for overide yii data api
                                'data-request-method' => 'post',
                                'data-confirm-title' => 'Bạn chắc chắn muốn xóa?',
                                'data-confirm-message' => 'Bạn muốn xóa mục này?'
                            ]),
                    ]) .
                    '<div class="clearfix"></div>',
            ]
        ]) ?>
    </div>
</div>
<?php Modal::begin([
    "id" => "ajaxCrudModal",
    "footer" => "",// always need it for jquery plugin
]) ?>
<?php Modal::end(); ?>
