<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset;
use johnitvn\ajaxcrud\BulkButtonWidget;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\BillSearch */
/* @var $dataProvider yii\data\ActiveDataProvider
 * @var $searchModel_DHCT common\models\search\BillSearch
 * @var $searchModel_dh common\models\search\BillSearch
 * @var $dataProvider_DHCT yii\data\ActiveDataProvider
 * @var $dataProvider_dh yii\data\ActiveDataProvider
 */

$this->title = 'Bills';
$this->params['breadcrumbs'][] = ['name' => $this->title, 'link' => 'javascript:void(0)'];

CrudAsset::register($this);

?>
<div class="bill-index">
    <div id="ajaxCrudDatatable">
        <?= GridView::widget([
            'id' => 'crud-datatable',
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'pjax' => true,
            'pjaxSettings' => ['options' => ['enablePushState' => false]],
            'columns' => [
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
                    'attribute' => 'name',
                ],
                [
                    'class' => '\kartik\grid\DataColumn',
                    'attribute' => 'std',
                    'value'=>function($data){
                        /** @var $data \common\models\Bill */
                        return \common\models\Deliveryaddress::getdt($data->address);
                    }

                ],
               /* [
                    'class' => '\kartik\grid\DataColumn',
                    'attribute' => 'email',

                ],*/
//                [
//                    'class'=>'\kartik\grid\DataColumn',
//                    'attribute'=>'content',
//                ],
                [
                    'class' => '\kartik\grid\DataColumn',
                    'attribute' => 'address',
                    'value'=>function($data){
                        /** @var $data \common\models\Bill */
                        return \common\models\Deliveryaddress::getaddress($data->address);

                    }
                ],
                [
                    'class' => '\kartik\grid\DataColumn',
                    'attribute' => 'order_time',
                    'value'=>function($data){
                        return date("d/m/Y H:m:s", strtotime($data->order_time));
                    }
                ],
                [
                    'class' => '\kartik\grid\DataColumn',
                    'attribute' => 'status',
                    'value' => function ($data) {
                        if ($data->status == '1' || $data->status == '2')
                            return func::trangthai($data->status);
                        return Html::dropDownList("hoadon[{$data->id}]",
                            $data->status, [
                                '0' => 'Đang chờ xử lý',
                                '2' => 'Hủy đơn hàng',
                                '1' => 'Giao hàng thành công'],
                            ['class' => "btn-trangthai form-control",'id'=>$data->id]);
                    },
                    'filter' => \yii\helpers\Html::activeDropDownList($searchModel, 'status',
                        ['0' => 'Đang chờ xử lý',
                            '1' => 'Giao hàng thành công', '2' => 'Hủy đơn hàng'],
                        ['prompt' => 'All', 'class' => 'form-control']
                    ),
                    'format' => 'raw'

                ],
                [
                    'attribute' => 'id',
                    'label' => 'View',
                    'filter' => false,
                    'value' => function ($data) {
                        /** @var $data \common\models\Bill */
                        return Html::button("<i class=\"glyphicon glyphicon-eye-open\"></i>", ['class' => 'btn btn-grey btn-sm btn-outlined btn-view-cthd', 'id' => "hoadon-{$data->id}"]);

                    },
                    'format' => 'raw',
                    'contentOptions' => ['style' => 'text-align:center']
                ],
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
            'toolbar'=> [
                ['content'=>
                    Html::a('<i class="glyphicon glyphicon-plus"></i>', ['create'],
                        ['role'=>'modal-remote','title'=> 'Create new Brands','class'=>'btn btn-default']).
                    Html::a('<i class="glyphicon glyphicon-repeat"></i>', [''],
                        ['data-pjax'=>1, 'class'=>'btn btn-default', 'title'=>'Reset Grid']).
                    '{toggleData}'.
                    '{export}'
                ],
            ],
            'striped' => true,
            'condensed' => true,
            'responsive' => true,
            'panel' => [
                'type' => 'primary',
                'heading' => '<i class="glyphicon glyphicon-list"></i> Bills',
                'before' => '<em>*Resize table columns just like a spreadsheet by dragging the column edges.</em>',
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
    "id"=>"ajaxCrudModal",
    "footer"=>"",// always need it for jquery plugin
    "size"=>Modal::SIZE_LARGE
])?>
<?php Modal::end(); ?>


<?php Modal::begin([
    "id" => "ajaxCrudModal",
    "footer" => "",// always need it for jquery plugin
]) ?>

<?php Modal::end(); ?>
<!--grid chi tiết đơn đặt hàng-->
<?php \yii\bootstrap\Modal::begin(['id' => 'modal-chitet-donhang', 'size' => \yii\bootstrap\Modal::SIZE_LARGE]) ?>
<h3 style="text-align: center">ĐƠN ĐẶT HÀNG CỦA KHÁCH HÀNG</h3>
<?php \yii\widgets\Pjax::begin(['enablePushState' => false, 'id' => 'grid-CTDDH']);

?>
<h4>ĐƠN HÀNG</h4>
<?= GridView::widget([
    'tableOptions' => ['class' => 'table table-striped table-bordered table-hover'],
    'summary' => false,
    'dataProvider' => $dataProvider_dh,
    'filterModel' => $searchModel_dh,
    //'filterModel' => $searchModel_dh,
    'columns' => [

        [
            'label' => 'Tên công ty',

            'headerOptions' => ['style' => 'width:150px', 'class' => 'text-center'],
            'value'=>function($data){
                /** @var $data \common\models\Bill */
                return $data->name;
            }
        ],

        [
            'label' => 'Địa chỉ',

            'headerOptions' => ['style' => 'width:180px', 'class' => 'text-center'],
            'value'=>function($data){
                /** @var $data \common\models\Bill */
                return \common\models\Deliveryaddress::getaddress($data->address);
            }
        ],
        [

            'label' => 'Số điện thoại',

            'headerOptions' => ['style' => 'width:120px', 'class' => 'text-center'],
            'value'=>function($data){
                /** @var $data \common\models\Bill */
                return \common\models\Deliveryaddress::getdt($data->address);
            }

        ],
        [
            'label' => 'Ngày đặt',

            'headerOptions' => ['style' => 'width:100px', 'class' => 'text-center'],
            'value' => function ($data) {
                /** @var $data \common\models\Bill */
                return date("d/m/Y", strtotime($data->order_time));
            },
        ],

        [
            'label' => 'Shipping fee',
            'headerOptions' => ['style' => 'width:80px', 'class' => 'text-center'],
            'value' => function ($data) {
                $config = \common\models\search\Configure::getConfig();
                /** @var $data \common\models\Bill */
                return $config['money_suffix']." ".number_format($data->shipping_fee,2,',','.');
            },
        ],

        [
            'label' => 'VAT',
            'contentOptions' => ['class' => 'text-center'],
            'headerOptions' => ['style' => 'width:80px', 'class' => 'text-center'],
            'value' => function ($data) {
                /** @var $data \common\models\Bill */
                return ($data->vat==''?'0%':$data->vat);
            },
        ],

        [
            'label' => 'Tổng tiền',
            'headerOptions' => ['style' => 'width:120px', 'class' => 'text-center'],
            'value' => function ($data) {
                $config = \common\models\search\Configure::getConfig();
                /** @var $data \common\models\Bill */
                $tongtien=$data->total+$data->shipping_fee;
                if ($data->vat !=''){
                    $tongtien = $tongtien + ($data->total*$data->vat)/100;
                }
                return $config['money_suffix']." ".number_format($tongtien, 2, '.', '');
            }
        ],
    ],
]); ?>
<hr>
<h4>CHI TIẾT ĐƠN HÀNG</h4>
<?= GridView::widget([
    'tableOptions' => ['class' => 'table table-striped table-bordered table-hover'],
    'dataProvider' => $dataProvider_DHCT,
    'filterModel' => $searchModel_DHCT,
    //'filterModel' => $searchModel_DHCT,
    'summary' => false,
    'columns' => [
        [
            'label' => 'Hình ảnh',
            'contentOptions' => ['class' => 'text-center'],
            'headerOptions' => ['style' => 'width:100px', 'class' => 'text-center'],
            'value' => function ($data) {
                /** @var $data \common\models\BillProduct */
                return Html::img(Yii::$app->urlManagerFrontend->baseUrl . \common\models\Product::getImageDefault($data->product->id), ['width' => '50px']);
            },
            'format' => 'raw'
        ],


        [
            'attribute' => 'sanpham_id',
            'contentOptions' => ['class' => 'text-center'],
            'headerOptions' => ['style' => 'width:150px', 'class' => 'text-center'],
            'label' => 'Tên sản phẩm',
            'value' => function ($data) {
                /** @var  $data \common\models\BillProduct */
                return $data->product->name  . "<p style='color:red;'>$data->thongso</p>";
            },
            'format' => 'raw'
        ],

        [
            'attribute' => 'soluong',
            'contentOptions' => ['class' => 'text-center'],
            'headerOptions' => ['style' => 'width:70px', 'class' => 'text-center'],
            'label' => 'Số lượng',
            'value' => function ($data) {
                /** @var $data \common\models\BillProduct */
                return $data->quantity;
            },
            'format' => 'raw'
        ],

        [
            'attribute' => 'dongia',
            'contentOptions' => ['class' => 'text-center'],
            'label' => 'Đơn giá',
            'headerOptions' => ['style' => 'width:120px', 'class' => 'text-center'],
            'value' => function ($data) {
                $config = \common\models\search\Configure::getConfig();
                /** @var $data \common\models\BillProduct */
                return $config['money_suffix']." ".number_format($data->sale, 2, '.', '');
            }
        ],

        [
            'attribute' => 'thanhtien',
            'contentOptions' => ['class' => 'text-center'],
            'headerOptions' => ['style' => 'width:120px', 'class' => 'text-center'],
            'label' => 'Thành tiền',
            'value' => function ($data) {
                $config = \common\models\search\Configure::getConfig();
                /** @var $data \common\models\BillProduct */
                return $config['money_suffix']." ".number_format(($data->quantity * $data->sale), 2, '.', '');
            }
        ],
    ],
]); ?>
<?php \yii\widgets\Pjax::end(); ?>
<?php \yii\bootstrap\Modal::end() ?>
<!--End grid chi tiết đơn đặt hàng-->

