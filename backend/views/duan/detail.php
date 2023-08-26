<?php

use common\models\Commentvanban;
use common\models\Duan;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset;
use johnitvn\ajaxcrud\BulkButtonWidget;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\DuannSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Chi tiết Công việc: <strong style="font-size: 16px">' . $model->ten . "</strong>";

$userlist = \common\models\Admin::find()->all();
$usercolor=[];
foreach ($userlist as $valueuser){
    $usercolor[$valueuser->id]=func::random_color();
}
CrudAsset::register($this);
/** @var Duan $model */
?>
<style>
    .media{
        margin-top: 0!important;
    }
</style>
    <div class="row">
        <div class="col-md-3 table-responsive">
            <table class="table table-striped table-hover table-bordered">
                <tr>
                    <th colspan="2">Thông tin Công việc</th>
                </tr>
                <tr>
                    <th>Công việc</th>
                    <td><?= $model->ten ?></td>
                </tr>
                <tr>
                    <th>Thông tin</th>
                    <td><?= $model->mota ?></td>
                </tr>

                <tr>
                    <th>Trạng thái</th>
                    <td><?= $model->getStatusText() ?></td>
                </tr>
                <tr>
                    <th>Tiến độ</th>
                    <td>
                        <div class="progress progress-striped active" style="position: relative">
                            <?php
                            $u = $model->getTienDo();
                            $t = \common\models\Congviec::find()->where(['duan_id'=>$model->id])->andWhere(['<>','status',3])->count();
                            $s = ($t == 0) ? 0 : round($u * 100 / $t, 2);?>
                            <div class="progress-bar progress-bar-info"  role="progressbar"
                                 aria-valuenow="<?= $u ?>" aria-valuemin="0"
                                 aria-valuemax="<?= $t ?>"
                                 style="width: <?= $s ?>%;<?php if($s==100){echo "background:#26df34";}?>">

                            </div>
                            <span style="width: 100%;display: block;position: absolute;left: 0;padding-left: 5px">
									<?= $model->getTienDoText() ?> (<?= $s ?>%) Hoàn thành </span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>Lãnh đạo phụ trách</th>
                    <td>
                        <?php
                        $data=$model;
                        $lanhdao="";
                        foreach (\yii\helpers\Json::decode($data->nguoiphutrach) as $value){
                            $admin = \common\models\Admin::findOne($value);
                            $lanhdao .= (is_null($admin)) ? "#N/A" : "<span class='text-danger'>".$admin->ten."</span>";
                        }
                        echo $lanhdao;
                        ?>
                    </td>
                </tr>

                <tr>
                    <th>Người phụ trách</th>
                    <td class="caption-subject font-blue-steel bold">
                        <?php
                        $data=$model;
                        $admin = \common\models\Admin::findOne($data->nguoitao);
                        echo (is_null($admin)) ? "#N/A" : $admin->ten;
                        ?>
                    </td>
                </tr>
                <tr>
                    <th>Phòng ban phụ trách</th>
                    <td class="caption-subject font-blue-steel bold">
                        <?php
                        $data=$model;
                        $phongban = \yii\helpers\Json::decode($data->truongphongphutrach);


                        $listphongbanname="";
                        if(is_array($phongban)){
                            foreach ($phongban as $index=> $dataphongban){
                                $admin = \common\models\Phongban::findOne($dataphongban);
                                $listphongbanname.="-".$admin->ten."<br>";

                            }
                        }else{
                            $admin = \common\models\Phongban::findOne($phongban);
                            $listphongbanname.="- ".(is_null($admin)?"Chưa giao":$admin->ten)."<br>";
                        }



                        if (Yii::$app->user->identity->username == 'Superadmin' || Yii::$app->user->can('duan/updatetruongphong')) {
                            echo ($listphongbanname=="" || is_null($data->truongphongphutrach)) ? "Chưa giao" : $listphongbanname;
                        }
                        else
                            echo ($listphongbanname=="" || is_null($data->truongphongphutrach)) ? "Chưa giao" : $listphongbanname;
                        ?>
                    </td>
                </tr>

                <tr>
                    <th>Người nhận việc</th>
                    <td>
                       <?php
                       $data=$model;
                       $return = "";
                       if($data->nguoinhanviec!=""&& !is_null($data->nguoinhanviec)){
                           foreach (\yii\helpers\Json::decode($data->nguoinhanviec) as $value){
                               $admin = \common\models\Admin::findOne($value);
                               $return.="<p class='text-danger' style='margin-bottom: 2px'>- ".$admin->ten."</p>";
                           }
                       }
                       if($data->nguoinhanviecchitiet!=""&& !is_null($data->nguoinhanviecchitiet)){
                           foreach (\yii\helpers\Json::decode($data->nguoinhanviecchitiet) as $value){
                               $admin = \common\models\Admin::findOne($value);
                               $return.="<p style='margin-bottom: 2px'>- ".$admin->ten."</p>";
                           }
                       }

                       echo $return;
                       ?>
                    </td>
                </tr>


            </table>
            <div style="border: 1px solid #ddd; padding: 5px!important;">
                <div class="todo-tasklist-devider">
                </div>
                <div class="col-xs-12" style="padding: 0">

                    <!-- TASK COMMENTS -->
                    <div class="form-group">
                        <div class="col-md-12" style="max-height: 600px; overflow-y: scroll">
                            <script>
                                function scrolldiv(e) {
                                    $('#' + e).scrollTop(1000000);
                                }

                                $(document).ready(function () {
                                    scrolldiv("media-list");
                                    scrolldiv("todotl");
                                });
                            </script>
                            <ul class="media-list" id="media-list">
                                <?php $commentvanban = Commentvanban::find()->where(['vanbandi_id' => $model->id, 'commentvanban_id' => null])->all();
                                if (!empty($commentvanban)):
                                    foreach ($commentvanban as $valueCommentvb):/** @var Commentvanban $valueCommentvb */
                                        ?>
                                        <li class="media">
                                            <div class="media-body todo-comment"
                                                 id="replyto-<?= $valueCommentvb->id ?>">
                                                <?php if ($valueCommentvb->comment != "@thuhoithuhoi@"): ?>
                                                    <?php if ($valueCommentvb->nguoicomment == Yii::$app->user->id): ?>
                                                        <button type="button" data-reply="<?= $valueCommentvb->id ?>"
                                                                style="top: 25px"
                                                                class="thuhoibutton todo-comment-btn btn btn-circle btn-default btn-xs">
                                                            &nbsp; Thu hồi &nbsp;
                                                        </button>
                                                    <?php endif; ?>
                                                    <button type="button"
                                                            user-reply="<?= $valueCommentvb->nguoicomment0->ten ?>"
                                                            data-reply="<?= $valueCommentvb->id ?>"
                                                            class="replybutton todo-comment-btn btn btn-circle btn-default btn-xs">
                                                        &nbsp; Trả lời &nbsp; <span
                                                                style="font-weight: bold"><?= $valueCommentvb->nguoicomment0->ten ?></span>
                                                        &nbsp;
                                                    </button>
                                                <?php endif; ?>
                                                <p class="todo-comment-head">
                                                    <span class="todo-comment-username"
                                                          style="color: #<?= $usercolor[$valueCommentvb->nguoicomment] ?>"><?= $valueCommentvb->nguoicomment0->ten ?></span>
                                                    &nbsp; <span
                                                            class="todo-comment-date"><?= $valueCommentvb->ngaycomment ?></span>
                                                </p>
                                                <p class="todo-text-color">
                                                    <?php if ($valueCommentvb->comment != "@thuhoithuhoi@"): ?>
                                                        <?= $valueCommentvb->comment ?>
                                                    <?php else: ?>
                                                        <span class="thuhoi"> Người đăng đã thu hồi </span>
                                                    <?php endif; ?>
                                                </p>
                                                <!-- Nested media object -->
                                                <?php if ($valueCommentvb->comment != "@thuhoithuhoi@"): ?>
                                                    <?php $commentcon = $valueCommentvb->commentvanbans;
                                                    if (!empty($commentcon)):
                                                        ?>
                                                        <?php foreach ($commentcon as $commentvanbancon): ?>
                                                        <div class="media" style="padding-left: 15px">

                                                            <div class="media-body">
                                                                <?php if ($commentvanbancon->nguoicomment == Yii::$app->user->id && $commentvanbancon->comment != "@thuhoithuhoi@"): ?>
                                                                    <button type="button"
                                                                            data-reply="<?= $commentvanbancon->id ?>"
                                                                            class="thuhoibutton todo-comment-btn btn btn-circle btn-default btn-xs">
                                                                        &nbsp; Thu hồi &nbsp;
                                                                    </button>
                                                                <?php endif; ?>
                                                                <p class="todo-comment-head">
                                                                    <span class="todo-comment-username"
                                                                          style="color: #<?= $usercolor[$commentvanbancon->nguoicomment] ?>"><?= $commentvanbancon->nguoicomment0->ten ?> <i style="color: #838383">trả lời @<?= $valueCommentvb->nguoicomment0->ten ?></i></span>
                                                                    &nbsp; <span
                                                                            class="todo-comment-date"><?= $commentvanbancon->ngaycomment ?></span>
                                                                </p>
                                                                <p class="todo-text-color">
                                                                    <?php if ($commentvanbancon->comment != "@thuhoithuhoi@"): ?>
                                                                        <?= $commentvanbancon->comment ?>
                                                                    <?php else: ?>
                                                                        <span class="thuhoi"> Người đăng đã thu hồi </span>
                                                                    <?php endif; ?>

                                                                </p>
                                                            </div>
                                                        </div>
                                                    <?php endforeach; ?>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            </div>
                                        </li>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <span class="alert alert-danger">Chưa có trao đổi nào</span>
                                <?php endif; ?>


                            </ul>
                        </div>
                    </div>
                    <!-- END TASK COMMENTS -->
                    <!-- TASK COMMENT FORM -->
                    <div class="form-group">
                        <div class="col-md-12">
                            <ul class="media-list">
                                <li class="media sss">
                                    <input type="number" class="hidden" id="replyid" value="-1">
                                    <div class="media-body" style="padding-top: 15px">
                                               <textarea
                                                       class="form-control todo-taskbody-taskdesc"
                                                       rows="4" id="commentcontent"
                                                       placeholder="Viết lời nhắn..."></textarea>
                                    </div>
                                </li>
                            </ul>
                            <button type="button" id="sendmess"
                                    class="pull-right btn btn-sm btn-circle green-haze">
                                &nbsp; Gửi &nbsp;
                            </button>
                        </div>
                    </div>

                </div>

                <div class="clearfix"></div>
            </div>
        </div>
        <div class="col-md-9">

            <?php if (is_null($model->truongphongphutrach)): ?>
                <p class="alert alert-warning">Công việc chưa được giao cho phòng ban phụ trách</p>
            <?php else: ?>
                <div class='table-responsive'>
                    <div class="congviec-index">
                        <div id="ajaxCrudDatatable">
                            <?= GridView::widget([
                                'id' => 'crud-datatable',
                                'dataProvider' => $dataProvider,
                                'filterModel' => $searchModel,
                                'responsiveWrap' => false,
                                'pjax' => true,
                                'columns' => require(__DIR__ . '/_columnscongviec.php'),
                                'toolbar' => [
                                    ['content' =>
                                        (($model->status!=1&&$model->status!=3)?Html::a('<i class="glyphicon glyphicon-plus"></i> Thêm chi tiết công việc', "/admin/congviec/create?ids=" . $model->id,
                                ['role' => 'modal-remote', 'title' => 'Tạo mới công việc', 'class' => 'btn btn-danger']):"").
                                        Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['', 'id' => $model->id],
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
                                    'heading' => '<i class="glyphicon glyphicon-list"></i> Danh sách chi tiết công việc đang thực hiện',
                                    'before' => '<em>* Thay đổi kích thước cột của bảng giống như bảng tính bằng cách kéo các cạnh cột.</em>',
                                    'after' => (Yii::$app->user->identity->username == "Superadmin" ? Html::a('<i class="glyphicon glyphicon-trash"></i>&nbsp; Xóa toàn bộ',
                                            ["congviec/bulkdelete"],
                                            [
                                                "class" => "btn btn-danger btn-xs",
                                                'role' => 'modal-remote-bulk',
                                                'data-confirm' => false, 'data-method' => false,// for overide yii data api
                                                'data-request-method' => 'post',
                                                'data-confirm-title'=>'Bạn có chắc không?',
                                                'data-confirm-message'=>'Bạn có chắc chắn muốn xóa mục này'
                                            ]) : "") .

                                        '<div class="clearfix"></div>',
                                ]
                            ]) ?>
                        </div>
                    </div>
                </div>


                <div class="clearfix"></div>
            <?php endif; ?>
        </div>
    </div>
<?php Modal::begin([
    "id" => "ajaxCrudModal",
    "footer" => "",// always need it for jquery plugin
    'options' => ["data-backdrop" => "static", "data-keyboard" => "false", 'tabindex' => false],
    'size' => 'modal-lg'
]) ?>
<?php Modal::end(); ?>
<script>
    $(document).ready(function () {
        $('.editable').editable({
            url: '/admin/site/updatecongviecstatus',
            showbuttons: false
        });

        jQuery('#pulsate-regular').pulsate({
            color: "#bf1c56"
        });
        $(document).on('click', ".replybutton", function () {
            $("#replyid").val($(this).attr("data-reply"));
            $("#commentcontent").attr("placeholder", "Đang trả lời " + $(this).attr('user-reply') + " (Nhấn ESC để hủy) ...")
        });
        $(document).on('click', ".thuhoibutton", function () {
            var valr = $(this).attr("data-reply");
            var self = $(this);
            $.confirm({
                title: 'Cảnh báo!',
                content: 'Thu hồi bình luận này!',
                buttons: {
                    confirm: function () {
                        $.ajax({
                            url: "<?=Yii::$app->urlManager->createUrl(['site/thuhoicomment'])?>",
                            type: 'post',
                            dataType: 'json',
                            data: {
                                id: valr,
                            },
                            success: function (data) {
                                if (data.type === "success") {
                                    $.alert("Đã thu hồi!");
                                    self.parent().find(".todo-text-color").html("<span class=\"thuhoi\"> Người đăng đã thu hồi </span>");
                                    self.parent().find("div.media").remove();
                                } else {
                                    $.alert("Có lỗi xảy ra, không thể thu hồi!" + data.content)
                                }
                            },
                            complete: function () {

                            }
                        });
                    },
                    cancel: function () {
                        $.alert('Bạn hủy thao tác!');
                    },

                }
            });
        });
        $(document).on('keyup', "#commentcontent", function (e) {
            if (e.keyCode === 13) {
                $("#sendmess").click();
                if (event.preventDefault) event.preventDefault(); // This should fix it
                return false; // Just a workaround for old browsers
            }
            if (e.keyCode === 27) {
                $("#commentcontent").attr("placeholder", "Viết lời nhắn ...");
                $("#replyid").val(-1);
                if (event.preventDefault) event.preventDefault(); // This should fix it
                return false; // Just a workaround for old browsers
            }
        });
        $(document).on('click', '#sendmess', function () {
            var alert = $("#media-list").find("span[class='alert alert-danger']");
            if ($("#commentcontent").val().trim() == "") {
                $.alert({
                    title: 'Cảnh báo!',
                    content: "Chưa nhập nội dung",
                });
                $("#commentcontent").val("");
                $("#commentcontent").focus();
            } else {
                var rep = $("#replyid").val();
                $.ajax({
                    url: "<?=Yii::$app->urlManager->createUrl(['site/commentvb'])?>",
                    type: 'post',
                    dataType: 'json',
                    data: {
                        comment: $("#commentcontent").val().trim(),
                        replyto: $("#replyid").val(),
                        vanbanid: <?=$model->id?>,
                    },
                    success: function (data) {
                        if (data.type === "success") {
                            console.log(rep);
                            alert.remove();
                            if (rep !== -1) {
                                $("#replyto-" + rep).append(data.content);
                            }
                            if (rep == -1) {
                                console.log(rep);
                                $("#media-list").append(data.content);
                                scrolldiv("media-list");

                            }
                        } else {
                            $.alert({
                                title: 'Cảnh báo!',
                                content: 'Không thể gửi comment!, lỗi: <pre>' + data.content + "</pre>",
                            })
                        }
                    },
                    complete: function () {
                        $("#replyid").val(-1);
                        $("#commentcontent").val("");
                    }
                });
            }
        });
        $(document).on("click",'input[name="listphongban[]"]',function () {
            var listid = [];
            $.each($('input[name="listphongban[]"]'),function (){
                if($(this).is(":checked")){
                    listid.push($(this).val());
                }
            })
            $.ajax({
                url:'/admin/site/getnhanvienphongbanforcheckbox',
                type:'post',
                dataType:'html',
                data:{
                    id:listid
                },
                beforeSend:function (){
                    block({target:"#ajaxCrudModal"});
                },
                success:function (data){
                    $(document).find("#nhanvienresult").html(data);
                    unblock("#ajaxCrudModal");
                }
            })
        })
    })
</script>
