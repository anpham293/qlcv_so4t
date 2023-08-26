<?php

use common\models\Admin;
use common\models\Commentvanban;
use common\models\Filedinhkem;
use common\models\Loaivanban;
use common\models\Tiendocongviec;
use common\models\Vanbanden;
use common\models\Vanbandi;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Vanbandi */

$userlist = Admin::find()->all();
$usercolor=[];
foreach ($userlist as $valueuser){
    $usercolor[$valueuser->id]=func::random_color();
}
$checkhoanthanhtiendo=empty(Tiendocongviec::find()->where(['tencongviec'=>"Hoàn thành công việc" , 'noidung'=>"Hoàn thành công việc" , "nguoicapnhat"=>Yii::$app->user->id,'vanbandi_id'=>$model->id])->all());

?>
<style>
    .tab-pane{
        padding-top: 15px;
    }
    .tab-pane .tab-pane{
        padding-top: 5px;
    }
    li.media{
        padding: 5px;
    }
    li.media:nth-child(odd) {
        background:#fff6f6;
    }
    #tabcomment .col-md-12, #tabcomment .col-xs-12{
        padding: 0;
    }
    li.media.sss{
        background: none!important;
    }
    li.media:not(.sss){
        margin: 0;
        border-bottom: 1px solid #ddd;
    }
    .todo-comment-username i, .thuhoi{
        color: #ddd;
        font-weight: 100;
    }
    div.media{
        padding-left: 50px;
    }
    div.media .media-body{
        border-top: 1px solid #ddd!important;
    }
    div.media div.media-body:hover .thuhoibutton{
        display: block!important;
        top: 25px;
    }
    div.media-body{
        position: relative;
    }
</style>
<div class="row" id="vbdidiv">
    <div class="col-md-12">
        <div class="tabbable-line tabbable-full-width">
            <ul class="nav nav-tabs">
                <li class="active">
                    <a data-toggle="tab" href="#tabttvanban" >
                        <span class="caption-subject bold uppercase font-green-haze"> Thông tin Hồ sơ sức khỏe đi</span>
                    </a>
                </li>
                <li>
                    <a data-toggle="tab" href="#tabcapnhat" data-access="<?=$model->id?>" access-type="tiendo" class="updatenotice">
                        <span class="caption-subject bold uppercase font-red-flamingo"> Cập nhật tiến độ công việc</span></a>
                </li>
                <li>
                    <a data-toggle="tab" href="#tabcomment" data-access="<?=$model->id?>" access-type="traodoi" class="updatenotice">
                        <span class="caption-subject bold uppercase font-purple-intense"> Trao đổi </span></a>
                </li>

            </ul>
            <div class="tab-content">
                <div id="tabttvanban" class="tab-pane active">
                    <div class="vanban-view row">

                        <div class="col-md-6">
                            <div class="portlet-title">
                                <div class="caption font-red-intense">
                                    <i class="icon-speech font-red-intense"></i>
                                    <span class="caption-subject bold uppercase"> Thông tin Hồ sơ sức khỏe đi</span>
                                    <span class="caption-helper"></span>
                                </div>

                            </div>
                            <?= DetailView::widget([
                                'model' => $model,
                                'attributes' => [

                                    [
                                        'label' => 'Tên Hồ sơ sức khỏe',
                                        'value' => function ($data) {
                                            /** @var $data Vanbandi */
                                            return $data->vanban->ten;
                                        }
                                    ],
                                    [
                                        'label' => 'Người gửi',
                                        'value' => function ($data) {
                                            /** @var $data Vanbandi */
                                            return $data->from0->ten;
                                        }
                                    ],
                                    'ngaygui',
                                    [
                                        'label' => 'Loại Hồ sơ sức khỏe',
                                        'value' => function ($data) {
                                            /** @var $data Vanbandi */
                                            return $data->vanban->loaivanban->ten;
                                        }
                                    ],
                                    [
                                        'label' => 'Số hiệu Hồ sơ sức khỏe',
                                        'value' => function ($data) {
                                            /** @var $data Vanbandi */
                                            return $data->vanban->sovanban . "/" . $data->vanban->kyhieu;
                                        }
                                    ],
                                    [
                                        'label' => 'File Hồ sơ sức khỏe',
                                        'value' => function ($data) {
                                            /** @var $data Vanbandi */
                                            return "<a href='" . Yii::$app->urlManagerFrontend->baseUrl . $data->vanban->filevanban . "' data-pjax=\"0\" download><i class='fa fa-cloud-download'></i></a>";
                                        },
                                        'format' => 'raw'
                                    ],
                                    [
                                        'label' => 'Là Hồ sơ sức khỏe trả lời',
                                        'value' => function ($data) {
                                            /** @var $data Vanbandi */
                                            return ($data->isvanbantraloi) ? "<i class='fa fa-check-circle'></i> Trả lời Hồ sơ sức khỏe " . $data->vanbantraloi->vanban->ten : "Không";
                                        },
                                        'format' => 'raw'
                                    ],
                                    [
                                        'label' => 'Yêu cầu cập nhật tiến độ công việc',
                                        'value' => function ($data) {
                                            /** @var $data Vanbandi */

                                            return ($data->yeucaucapnhattiendo) ? "<i class='fa fa-check-circle'></i>" : "Không";
                                        },
                                        'format' => 'raw'
                                    ],
                                    [
                                        'label' => 'Người tạo',
                                        'value' => function ($data) {
                                            /** @var $data Vanbandi */
                                            return $data->vanban->admin->ten;
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
                                    <?php foreach (Filedinhkem::find()->where(['vanban_id' => $model->vanban->id])->all() as $value): ?>
                                        <tr>
                                            <td><a href="<?= Yii::$app->urlManagerFrontend->baseUrl . $value->link ?>"
                                                   download><i class="fa fa-cloud-download"></i> <?= $value->ten ?></a>
                                            </td>

                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="portlet-title">
                                <div class="caption font-red-intense">
                                    <i class="icon-speech font-red-intense"></i>
                                    <span class="caption-subject bold uppercase"> Người nhận</span>
                                    <span class="caption-helper"></span>
                                </div>
                                <table class="table table-striped table-bordered detail-view">
                                    <tbody>
                                    <tr>
                                        <th>Stt</th>
                                        <th>Người nhận</th>
                                        <th>Loại tiếp nhận</th>
                                        <th>Trạng thái</th>
                                        <th></th>
                                    </tr>
                                    <?php
                                    if($model->from!=Yii::$app->user->id)
                                        $nguoinhanlist=Vanbanden::find()->where(['vanbandi_id' => $model->id,'admin_id'=>Yii::$app->user->id])->all();
                                    else
                                        $nguoinhanlist = Vanbanden::find()->where(['vanbandi_id' => $model->id])->all();
                                    ?>
                                    <?php foreach ($nguoinhanlist as $index => $valuevanbanden):/** @var Vanbanden $valuevanbanden */ ?>
                                        <tr>
                                            <td><?= $index + 1 ?></td>
                                            <td><?= $valuevanbanden->admin->ten ?></td>
                                            <td><?php

                                                switch ($valuevanbanden->type) {
                                                    case 0:
                                                        echo "Nhận để biết";
                                                        break;
                                                    case 1:
                                                        echo "Giao việc";
                                                        break;
                                                    case 2:
                                                        echo "Yêu cầu trả lời bằng Hồ sơ sức khỏe";
                                                        break;
                                                }

                                                ?></td>
                                            <td><?= ($valuevanbanden->status == 0) ? "<span class=\"badge badge-danger\">Đã nhận, Chưa xem</span>" : (($valuevanbanden->status==1)?"<span class=\"badge badge-warning\">Đã xem, chưa xử lý</span>":"<span class=\"badge badge-success\">Đã hoàn thành</span>") ?></td>
                                            <td><?php if($valuevanbanden->type==1 && $valuevanbanden->status==2):?> <a class="huyhoanthanh" data-id="<?=$valuevanbanden->id?>" style="text-decoration: none; color: red"><i class="glyphicon glyphicon-flash"></i> Hủy - Yêu cầu bổ sung</a> <?php endif;?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <?php
                             $arr = explode(".",$model->vanban->filevanban);
                             if(strtolower(end($arr))=="pdf"):?>
                                <iframe style="width: 100%;height: 768px"
                                        src="<?=Yii::$app->urlManagerFrontend->baseUrl . $model->vanban->filevanban ?>"></iframe>

                            <?php else:?>
                                <iframe style="width: 100%;height: 768px"
                                        src="https://view.officeapps.live.com/op/embed.aspx?src=<?= Yii::$app->request->hostName.Yii::$app->urlManagerFrontend->baseUrl . $model->vanban->filevanban ?>"></iframe>

                            <?php endif;?>
                        </div>
                        <div class="clearfix"></div>

                    </div>
                </div>
                <input id="vbid" class="hidden" value="<?=$model->id?>">
                <div id="tabcapnhat" class="tab-pane table-responsive">
                    <?php if ($model->yeucaucapnhattiendo): ?>

                        <div class="todo-content">
                            <div class="portlet light">
                                <!-- PROJECT HEAD -->
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-bar-chart font-green-sharp hide"></i>
                                        <span class="caption-helper">Thông tin:</span> &nbsp; <span
                                                class="caption-subject font-green-sharp bold uppercase">Cập nhật tiến độ công việc</span>
                                    </div>

                                </div>
                                <!-- end PROJECT HEAD -->
                                <?php $randColor = ['green', 'red', 'blue', 'purple', 'yellow'] ?>
                                <div class="portlet-body">
                                    <div class="row">
                                        <div class="<?php if($model->from!=Yii::$app->user->id && $checkhoanthanhtiendo) echo "col-md-7"?> col-xs-12">
                                            <div style="padding: 15px 0">
                                                <div class="tabbable-line tabbable-full-width">
                                                    <?php if($model->from!=Yii::$app->user->id && $nguoinhanlist[0]->type!=1):?>
                                                        <span class="alert alert-danger">Bạn không được giao việc, không yêu cầu cập nhật tiến độ</span>
                                                    <?php endif;?>
                                                    <ul class="nav nav-tabs">
                                                        <?php foreach ($nguoinhanlist as $index => $valuevanbanden):/** @var Vanbanden $valuevanbanden */ ?>
                                                            <?php if ($valuevanbanden->type == 1):$listTiendo = Tiendocongviec::find()->where(['vanbandi_id' => $model->id, 'nguoicapnhat' => $valuevanbanden->admin_id])->orderBy('id desc')->all(); ?>

                                                                <li class="<?php if ($index == 0) echo "active"; ?>">
                                                                    <a data-toggle="tab"
                                                                       href="#tiendo<?= $valuevanbanden->id . $valuevanbanden->admin_id ?>"
                                                                       style="color: #fff;text-decoration: none!important;font-size: 15px !important;padding: 8px 10px;background-color: #87a9c7 !important;">
                                                                        <?= $valuevanbanden->admin->ten ?> <span
                                                                                class="badge badge-success badge-active"
                                                                                style="background-color: #ffffff !important;    margin-top: 1px !important;color: #637b89 !important;"> <?= count($listTiendo) ?> </span>
                                                                    </a>
                                                                </li>

                                                            <?php endif;endforeach; ?>
                                                    </ul>
                                                </div>

                                            </div>
                                            <?php foreach ($nguoinhanlist as $index => $valuevanbanden):/** @var Vanbanden $valuevanbanden */ ?>
                                                <?php if ($valuevanbanden->type == 1):$listTiendo = Tiendocongviec::find()->where(['vanbandi_id' => $model->id, 'nguoicapnhat' => $valuevanbanden->admin_id])->all(); ?>
                                                    <div id="tiendo<?= $valuevanbanden->id . $valuevanbanden->admin_id ?>"
                                                         class="tab-pane ">
                                                        <div class="scroller" id="scroller"
                                                             style="max-height: 600px; overflow-y: scroll"
                                                             data-height="600px" data-always-visible="0"
                                                             data-rail-visible="0" data-handle-color="#dae3e7">
                                                            <div class="todo-tasklist" id="todotl">
                                                                <?php
                                                                if (!empty($listTiendo)):
                                                                    foreach ($listTiendo as $valueTiendo):/** @var Tiendocongviec $valueTiendo */
                                                                        $rand = rand(0, 4); ?>
                                                                        <div class="todo-tasklist-item todo-tasklist-item-border-<?= $randColor[$rand] ?>">

                                                                            <div class="todo-tasklist-item-title">
                                                                                <?= $valueTiendo->tencongviec ?>
                                                                            </div>
                                                                            <div class="todo-tasklist-item-text">
                                                                                <?= $valueTiendo->noidung ?>
                                                                            </div>
                                                                            <div class="todo-tasklist-controls pull-left">
                                                                            <span class="todo-tasklist-date"><i
                                                                                        class="fa fa-calendar"></i><?= $valueTiendo->ngaygui ?></span>

                                                                            </div>
                                                                        </div>
                                                                    <?php endforeach; else: ?>
                                                                    <span class="alert alert-danger">Chưa có cập nhật tiến độ nào</span>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endif; endforeach; ?>
                                        </div>
                                        <?php if($model->from!=Yii::$app->user->id && $checkhoanthanhtiendo):?>
                                            <div class="col-md-5 col-xs-12">
                                                <div class="form">
                                                    <div class="form-group">
                                                        <div class="col-md-8 col-sm-8">
                                                            <div class="todo-taskbody-user">

                                                                <span class="todo-username pull-left"><?=Yii::$app->user->identity->ten?></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 col-sm-4">
                                                            <div class="todo-taskbody-date pull-right">
                                                                <button type="button" id="hoanthanhtiendo" class="todo-username-btn btn btn-circle btn-default btn-xs" data-using="<?=$model->id?>">&nbsp; Hoàn thành &nbsp;</button>
                                                            </div>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                    <!-- END TASK HEAD -->
                                                    <!-- TASK TITLE -->
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <input type="text" class="form-control todo-taskbody-tasktitle" id="tencongviec" placeholder="Tên công việc...">
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                    <!-- TASK DESC -->
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <textarea class="form-control todo-taskbody-taskdesc" id="noidungcongviec" rows="8" placeholder="Mô tả chi tiết nội dung công việc..."></textarea>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                    <!-- END TASK DESC -->
                                                    <!-- TASK DUE DATE -->

                                                    <!-- TASK TAGS -->
                                                    <div class="form-actions right todo-form-actions">
                                                        <button class="btn btn-circle btn-sm green-haze btn-gui-congviec" data-using="<?=$model->id?>">Gửi</button>
                                                        <button class="btn btn-circle btn-sm btn-default btn-clear-congviec">Clear</button>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif?>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php else: ?>
                        <div class="caption font-red-intense">
                            <i class="icon-speech font-red-intense"></i>
                            <span class="caption-subject bold uppercase"> Hồ sơ sức khỏe không yêu cầu cập nhật tiến độ</span>
                            <span class="caption-helper"></span>
                        </div>
                    <?php endif; ?>

                </div>
                <div id="tabcomment" class="tab-pane">
                    <div class="todo-tasklist-devider">
                    </div>
                    <div class="col-xs-12">

                        <!-- TASK COMMENTS -->
                        <div class="form-group">
                            <div class="col-md-12" style="max-height: 600px; overflow-y: scroll">
                                <script>
                                    function scrolldiv(e){
                                        $('#'+e).scrollTop(1000000);
                                    }
                                    $(document).ready(function () {
                                        scrolldiv("media-list");
                                        scrolldiv("todotl");
                                    });
                                </script>
                                <ul class="media-list" id="media-list">
                                    <?php $commentvanban = Commentvanban::find()->where(['vanbandi_id'=>$model->id,'commentvanban_id'=>null])->all();if(!empty($commentvanban)):
                                        foreach ($commentvanban as $valueCommentvb):/** @var Commentvanban $valueCommentvb */
                                    ?>
                                    <li class="media">
                                        <div class="media-body todo-comment" id="replyto-<?=$valueCommentvb->id?>">
                                            <?php if($valueCommentvb->comment!="@thuhoithuhoi@"):?>
                                            <?php if($valueCommentvb->nguoicomment==Yii::$app->user->id):?>
                                                    <button type="button" data-reply="<?=$valueCommentvb->id?>" style="top: 25px"
                                                            class="thuhoibutton todo-comment-btn btn btn-circle btn-default btn-xs">
                                                        &nbsp; Thu hồi &nbsp;
                                                    </button>
                                            <?php endif;?>
                                            <button type="button" user-reply="<?=$valueCommentvb->nguoicomment0->ten?>" data-reply="<?=$valueCommentvb->id?>"
                                                    class="replybutton todo-comment-btn btn btn-circle btn-default btn-xs">
                                                &nbsp; Trả lời &nbsp; <span style="font-weight: bold"><?=$valueCommentvb->nguoicomment0->ten?></span> &nbsp;
                                            </button>
                                            <?php endif;?>
                                            <p class="todo-comment-head">
                                                <span class="todo-comment-username" style="color: #<?=$usercolor[$valueCommentvb->nguoicomment]?>"><?=$valueCommentvb->nguoicomment0->ten?></span>
                                                &nbsp; <span
                                                        class="todo-comment-date"><?=$valueCommentvb->ngaycomment?></span>
                                            </p>
                                            <p class="todo-text-color">
                                                <?php if($valueCommentvb->comment!="@thuhoithuhoi@"):?>
                                                    <?=$valueCommentvb->comment?>
                                                <?php else:?>
                                                    <span class="thuhoi"> Người đăng đã thu hồi </span>
                                                <?php endif;?>
                                            </p>
                                            <!-- Nested media object -->
                                            <?php if($valueCommentvb->comment!="@thuhoithuhoi@"):?>
                                            <?php $commentcon = $valueCommentvb->commentvanbans;
                                                if(!empty($commentcon)):
                                            ?>
                                                <?php foreach ($commentcon as $commentvanbancon):?>
                                                    <div class="media">

                                                        <div class="media-body">
                                                            <?php if($commentvanbancon->nguoicomment==Yii::$app->user->id && $commentvanbancon->comment!="@thuhoithuhoi@"):?>
                                                                <button type="button" data-reply="<?=$commentvanbancon->id?>"
                                                                        class="thuhoibutton todo-comment-btn btn btn-circle btn-default btn-xs">
                                                                    &nbsp; Thu hồi &nbsp;
                                                                </button>
                                                            <?php endif;?>
                                                            <p class="todo-comment-head">
                                                                <span class="todo-comment-username" style="color: #<?=$usercolor[$commentvanbancon->nguoicomment]?>"><?=$commentvanbancon->nguoicomment0->ten?> <i>trả lời <?=$valueCommentvb->nguoicomment0->ten?></i></span>
                                                                &nbsp; <span
                                                                        class="todo-comment-date"><?=$commentvanbancon->ngaycomment?></span>
                                                            </p>
                                                            <p class="todo-text-color">
                                                                <?php if($commentvanbancon->comment!="@thuhoithuhoi@"):?>
                                                                    <?=$commentvanbancon->comment?>
                                                                <?php else:?>
                                                                    <span class="thuhoi"> Người đăng đã thu hồi </span>
                                                                <?php endif;?>

                                                            </p>
                                                        </div>
                                                    </div>
                                                <?php endforeach;?>
                                            <?php endif;?>
                                            <?php endif;?>
                                        </div>
                                    </li>
                                    <?php endforeach;?>
                                    <?php else:?>
                                        <span class="alert alert-danger">Chưa có trao đổi nào</span>
                                    <?php endif;?>


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

                </div>
            </div>


        </div>
    </div>
</div>


<div class="clearfix"></div>
