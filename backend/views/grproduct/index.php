<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset; 
use johnitvn\ajaxcrud\BulkButtonWidget;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\GrproductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Grproducts');
$this->params['breadcrumbs'][] = ['name'=>$this->title,'link'=>'javascript:void(0)'];

CrudAsset::register($this);

?>
<script>
    var dem = 0;
    $(document).ready(function () {
        $(document).on('click','#btn-them-tag',function () {
            $("#taglist").append("<div id='div-tag"+dem+"'><div class='col-xs-6'><input class='form-control' type='text' name='tag[]'></div><div class='col-xs-3'><a class='btn btn-default btn-xoa-tag' data-taget='div-tag"+dem+"'><i class='fa fa-trash'></i></a></div></div>");
            dem++;
        })
        $(document).on('click','.btn-xoa-tag',function () {
            $("#"+$(this).attr('data-taget')).remove();
        })
        $(document).on('click','.btn-xoa-tag2',function () {
            $("#"+$(this).attr('data-taget')).remove();
        })
    })
</script>
<div class="grproduct-index">
    <div id="ajaxCrudDatatable">
        <?=GridView::widget([
            'id'=>'crud-datatable',
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,'responsiveWrap'=>false,
            'pjax'=>true,
            'columns' => require(__DIR__.'/_columns.php'),
            'toolbar'=> [
                ['content'=>
                    Html::a('<i class="glyphicon glyphicon-plus"></i>', ['create'],
                    ['role'=>'modal-remote','title'=> 'Create new Grproducts','class'=>'btn btn-default']).
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
                'heading' => '<i class="glyphicon glyphicon-list"></i> Grproducts',
                'before'=>'<em>* Thay đổi khoảng cách các cột bằng cách kéo thả các cạnh.</em>',
                'after'=>BulkButtonWidget::widget([
                            'buttons'=>Html::a('<i class="glyphicon glyphicon-trash"></i>&nbsp; Xóa toàn bộ',
                                ["bulkdelete"] ,
                                [
                                    "class"=>"btn btn-danger btn-xs",
                                    'role'=>'modal-remote-bulk',
                                    'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                                    'data-request-method'=>'post',
                                    'data-confirm-title'=>'Are you sure?',
                                    'data-confirm-message'=>'Are you sure want to delete this item'
                                ]),
                        ]).                        
                        '<div class="clearfix"></div>',
            ]
        ])?>
    </div>
</div>
<?php Modal::begin([
    "id"=>"ajaxCrudModal",
    "footer"=>"",// always need it for jquery plugin
])?>
<?php Modal::end(); ?>
