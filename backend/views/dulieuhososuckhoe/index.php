<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset;
use johnitvn\ajaxcrud\BulkButtonWidget;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\DulieuhososuckhoeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Hồ sơ sức khỏe';
$this->params['breadcrumbs'][] = ['name' => $this->title, 'link' => 'javascript:void(0)'];

CrudAsset::register($this);
?>
<style>

</style>
<form action="/admin/dulieuhososuckhoe/export" enctype="multipart/form-data" method ="post" id="form0s" class="hidden">
    <textarea name="idlist" id="listids"></textarea>
    <input type="text" name="type" id="types">
    <button type="submit" id="submitbutton">sub</button>
</form>
<div class="dulieuhososuckhoe-index">
    <div id="ajaxCrudDatatable">
        <?= GridView::widget([
            'id' => 'crud-datatable',
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'pjax' => true,
            'columns' => require(__DIR__ . '/_columns.php'),
            'toolbar' => [
                ['content' =>

                    Html::a('<i class="glyphicon glyphicon-repeat"></i>', [''],
                        ['data-pjax' => 1, 'class' => 'btn btn-default', 'title' => 'Reset Grid']) .
                    Html::a('Phân trang', 'javascript:void(0)',
                        ['class' => 'btn btn-default']) .
                    Html::numberInput('DulieuhososuckhoeSearch[mahogiadinh]', $dataProvider->pagination->pageSize,
                        ['data-pjax' => 1, 'class' => 'btn btn-default', 'id' => 'pagesizefilter', 'title' => 'Reset Grid', 'placeholder' => 'Số bản ghi / trang']) .
                    '{toggleData}'. '<div class="btn-group">
<button id="w1" class="btn btn-default dropdown-toggle ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only ui-state-hover" title="Trích xuất" data-toggle="dropdown" role="button" aria-expanded="true"><span class="ui-button-text"><i class="glyphicon glyphicon-export"></i>  <span class="caret"></span></span></button>

<ul id="w2" class="dropdown-menu dropdown-menu-right"><li role="presentation" class="dropdown-header">Xuất dữ liệu</li>
<li><a class="a-export" data-type="excel"> <i class="fa fa-file-excel-o"></i> Excel </a></li>
<li><a class="a-export" data-type="word"> <i class="fa fa-file-word-o"></i> File Word Quyết định </a></li>
</ul>
</div>'
                ],
            ],
            'striped' => true,
            'condensed' => true,
            'responsive' => true,
            'panel' => [
                'type' => 'primary',
                'heading' => '<i class="glyphicon glyphicon-list"></i> Dữ liệu hồ sơ sức khỏe',
                'before' => '<em>* Resize table columns just like a spreadsheet by dragging the column edges.</em>',
                'after' =>
                    '<div class="clearfix"></div>',
            ]
        ]) ?>
    </div>
</div>
<?php Modal::begin([
    "id" => "ajaxCrudModal",
    "footer" => "",// always need it for jquery plugin
    'size' => 'modal-full'
]) ?>
<?php Modal::end(); ?>

<script>
    var statusArray = [];
    $(document).ready(function () {
        $(document).on('change', '#pagesizefilter', function () {
            var self = $(this);
            $.ajax({
                url: "<?=Yii::$app->urlManager->createUrl(['dulieuhososuckhoe/changepagesize'])?>",
                type: 'get',
                data: {
                    size: self.val()
                },
                complete: function () {
                    $.pjax.reload({container: "#crud-datatable-pjax"});
                }
            });

        });
        $(document).on('change', '.kv-row-checkbox', function () {
            var self = $(this);
            var status = self.attr('checked');
            var value = self.val();
            if (status != undefined) {
                statusArray.push(value);
            } else {
                statusArray = $.grep(statusArray, function (checkedValue) {
                    return checkedValue != value;
                });
            }
        });
        $(document).on('change', '.select-on-check-all', function () {
            var self = $(this);
            var status = self.attr('checked');
            if (status != undefined) {
                $.each($(".kv-row-checkbox"), function (indexss, valuess) {

                    if ($(this).attr('checked') != undefined) {
                        var dulieu = $(this).val();
                        statusArray = $.grep(statusArray, function (checkedValue) {
                            return checkedValue != dulieu;
                        });
                        statusArray.push($(this).val());
                    }
                });
            } else {
                $.each($(".kv-row-checkbox"), function (indexss, valuess) {
                    if ($(this).attr('checked') == undefined) {
                        var dulieu = $(this).val();
                        statusArray = $.grep(statusArray, function (checkedValue) {
                            return checkedValue != dulieu;
                        });
                    }
                });
            }
        });
        $(document).on('pjax:end', function (e) {
            $.each(statusArray, function (index, value) {
                $("input[type='checkbox'][value='" + value + "']").attr('checked', 'checked');
            })
        });

        $(document).on('click',".a-export",function () {
            var type = $(this).attr('data-type');
            $("#form0s #types").val(type);

            $.confirm({
                title: 'Confirm!',
                content: 'Xuất báo cáo!',
                buttons: {

                    confirm: function () {
                        $("#form0s textarea").val(JSON.stringify(statusArray));

                        $("#form0s").submit();
                    },
                    cancel: function () {
                        $.alert('Bạn đã hủy thao tác!');
                    },

                }
            });
        })
    })
</script>
