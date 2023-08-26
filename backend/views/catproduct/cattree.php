<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset;
use johnitvn\ajaxcrud\BulkButtonWidget;
use yii\widgets\Pjax;


/* @var $this yii\web\View */
/* @var $searchModel common\models\search\MenuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Danh mục sản phẩm';
$this->params['breadcrumbs'][] = ['name' => $this->title, 'link' => 'javascript:void(0)'];

CrudAsset::register($this);

?>
<em style="padding-left: 15px; margin-bottom: 10px; color: red; display: inline-block; font-size: 15px">Dấu '*' nghĩa là danh mục đó có sản phẩm trực tiếp!</em>

<?php Pjax::begin(); ?>
<div class="catproduct-index col-xs-12">
    <div class="portlet box green">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-comments"></i>Cây danh mục
            </div>
            <div class="tools">
                <a href="javascript:;" class="reload">
                </a>
                <?php echo Html::a('<i class="glyphicon glyphicon-plus"></i>', ['taomoi'],
                    ['role' => 'modal-remote', 'title' => 'Create new catproduct', 'style' => 'color:white']) ?>
            </div>
        </div>
        <div class="portlet-body ">
            <div class="dd" id="nestable_list_1">
                <ol class="dd-list">
                    <?php echo func::createCatProductDragMenu('null', $data); ?>
                </ol>
            </div>
        </div>
    </div>
</div>
<?php Pjax::end(); ?>

<div class="row hidden">
    <div class="col-xs-12">
        <h3>Serialised Output (per list)</h3>
        <textarea id="nestable_list_1_output" class="form-control col-md-12 margin-bottom-10"></textarea>
    </div>
</div>

<script>
    $(document).ready(function () {
        $(".catproduct-index").dragDropMenu('nestable_list_1', 'nestable_list_1_output', 'updatett');
    })
</script>
<?php Modal::begin([
    "id" => "ajaxCrudModal",
    "footer" => "",// always need it for jquery plugin
    "size" => 'modal-lg',

]) ?>
<?php Modal::end(); ?>
<script>
    $(document).ready(function () {

        $(document).on('click', '.active_checkbox', function () {
            $.ajax({
                url: "<?=Yii::$app->urlManager->createUrl('catproduct/updateactive')?>",
                type: "post",
                data: {
                    id: $(this).attr('data-id'),
                },
                success: function (data) {

                }
            })
        })

        $(document).on('click', '.menu_checkbox', function () {
            $.ajax({
                url: "<?=Yii::$app->urlManager->createUrl('catproduct/updatemenu')?>",
                type: "post",
                data: {
                    id: $(this).attr('data-id'),
                },
                success: function (data) {

                }
            })
        })

        $(document).on('click', '.home_checkbox', function () {
            $.ajax({
                url: "<?=Yii::$app->urlManager->createUrl('catproduct/updatehome')?>",
                type: "post",
                data: {
                    id: $(this).attr('data-id'),
                },
                success: function (data) {

                }
            })
        })

        $(document).on('click', '.reload', function () {
            window.location.reload();
        });

        $(document).on('click', '.btn-xoa-menu', function () {
            if (confirm('Xác nhận xóa danh mục cùng các danh mục con?'))
                $.ajax({
                    url: "deletecat",
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
    })
</script>
