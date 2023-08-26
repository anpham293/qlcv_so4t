<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset;
use johnitvn\ajaxcrud\BulkButtonWidget;
use yii\widgets\Pjax;


/* @var $this yii\web\View */
/* @var $searchModel common\models\search\CatnewSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Chuyên mục tin tức';
$this->params['breadcrumbs'][] = ['name'=>$this->title,'link'=>'javascript:void(0)'];
CrudAsset::register($this);
?>

<div class="catnew-index col-sm-12 col-xs-12">
    <div class="portlet box green">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-comments"></i>Danh sách chuyên mục
            </div>
            <div class="tools">
                <a href="javascript:;" class="reload"></a>
                <?php echo  Html::a('<i class="glyphicon glyphicon-plus"></i>', ['create?'],
                    ['role'=>'modal-remote','title'=> 'Thêm mới Chuyên mục','style'=>'color:white'])?>
            </div>
        </div>
        <div class="portlet-body ">
            <div class="dd" id="nestable_list_1">
                <?php Pjax::begin(); ?>
                <ol class="dd-list"><?php echo func::createCatnew('null',$data);?></ol>
                <?php Pjax::end(); ?>
            </div>
        </div>
    </div>
</div>

<div class="row hidden">
    <div class="col-md-12">
        <h3>Serialised Output (per list)</h3>
        <textarea id="nestable_list_1_output" class="form-control col-md-12 margin-bottom-10"></textarea>
    </div>
</div>

<script>
    $(document).ready(function () {
        $(".catnew-index").dragDropMenu('nestable_list_1','nestable_list_1_output','catnew/updateord');
    })
</script>

<?php Modal::begin([
    "id"=>"ajaxCrudModal",
    "footer"=>"",// always need it for jquery
    "size"=>'modal-lg'
])?>
<?php Modal::end(); ?>



<script>
    $(document).ready(function () {
        $(document).on('click','.reload',function () {
            window.location.reload();
        });

        $(document).on('click','.btn-xoa-catnew',function () {
            if(confirm('Xác nhận xóa menu cùng các menu con?'))
                $.ajax({
                    url: "catnew/deletecatnew",
                    type: "post",
                    dataType: "json",
                    data: {
                        id: $(this).attr('data-id')
                    },
                    beforeSend: function () {
                        block({target: "#nestable_list_1"});
                    },
                    success: function (data) {
                        window.location.reload();
                    },
                    complete: function () {
                        unblock("#nestable_list_1");
                    }
                })
        })

        $(document).on('click', '.active_checkbox', function () {
            $.ajax({
                url: "<?=Yii::$app->urlManager->createUrl('catnew/updateactive')?>",
                type: "post",
                data: {
                    id: $(this).attr('data-id'),
                },
                success: function (data) {

                }
            })
        })
    })
</script>
