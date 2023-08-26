<?php
use yii\helpers\Html;

$notification = \common\models\Notification::find()->where(['reciever'=>Yii::$app->user->id,'isseen'=>'false'])->orderBy("id desc")->limit(20)->all();
if(count($notification)<20){
    $notification = array_merge($notification,\common\models\Notification::find()->where(['reciever'=>Yii::$app->user->id])->orderBy("id desc")->limit(20-count($notification))->all());
}
?>
<ul class="nav navbar-nav pull-right" >
    <li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar" style="width: 50px">
        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
           data-close-others="true">
            <i class="icon-bell"></i>
            <?php if(!empty($notification)):?>
                <?php
                $new=0;
                $return = "";
            foreach ($notification as $notice){ /** @var \common\models\Notification $notice */
                $return.='<li style="'.(($notice->isseen)?"":"background:#d6fdd3").'">
                            <a class="updateseen" targets="'.$notice->id.'" href="'.$notice->url.'">
                                                <span class="subject">
									<span class="from">
									'.$notice->sendername.' </span>
									<span class="time">'.$notice->time.' </span>
									</span>
                                <span class="message">
									'.$notice->content.'</span>
                            </a>
                        </li>';
                if(!$notice->isseen){
                    $new++;
                }
            iF(!$notice->issent):
                $notice->issent=true;
                $notice->update();
                ?>
                <script>
                    $(document).ready(function() {
                        toastr["info"]('<a class="updateseen" targets="<?=$notice->id?>" href="<?=$notice->url?>" style="padding:10px;background:#ffffff1f;display:block;"><span class="subject"><span class="time"><?=$notice->time?></span> </span><span class="message"><?=$notice->content?></span></a>', "<?=$notice->type?>");
                    });
                </script>

            <?php endif;
            }if($new>0):
            ?>
            <span class="badge badge-default" id="countnoti"><?=$new?></span>
            <?php endif;endif;?>
        </a>
        <?php if(!empty($notification)):?>
            <script>
                $(document).ready(function () {
                    $(document).on('click','.updateseen',function () {
                        var self=$(this);
                        $.ajax({
                            url:"<?=Yii::$app->urlManager->createUrl(['site/updateseen'])?>",
                            data:{
                                id:self.attr("targets")
                            },
                            type:"post"
                        })
                    })
                })
            </script>
        <ul class="dropdown-menu">
            <li class="external">
                <h3>Bạn có <span id="countnoti2" class="bold"><?=$new?></span><span class="bold"> Thông báo mới</span></h3>
            </li>
            <li>
                <div class="slimScrollDiv" style="max-height: 80vh;
    overflow-y: scroll;">
                    <ul class="dropdown-menu-list scroller" id="appends">
                        <?=$return?>
                    </ul>
                </div>
            </li>
        </ul>
        <?php endif?>

    </li>
    <li class="dropdown dropdown-user">
        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
           data-close-others="true">
            <span class="username username-hide-on-mobile"><?= Yii::$app->user->identity->username ?></span>
            <i class="fa fa-angle-down"></i>
        </a>
        <ul class="dropdown-menu dropdown-menu-default">
            <li>
                <a href="javascript:void(0)" class="logoutbtn"><i class="icon-key"></i>Đăng xuất</a>
                <a href="<?= Yii::$app->urlManager->createUrl('site/changepassword') ?>"><i
                            class="icon-rocket"></i>Đổi mật khẩu</a>
            </li>
        </ul>
    </li>
    <!-- END USER LOGIN DROPDOWN -->
    <!-- BEGIN QUICK SIDEBAR TOGGLER -->
    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
    <li class="dropdown dropdown-quick-sidebar-toggler">
        <a href="javascript:void(0)" class="dropdown-toggle">
            <i class="icon-logout logoutbtn"></i>
        </a>
        <?php echo Html::beginForm(['site/logout', 'post']) . Html::submitButton('s', ['class' => 'hidden btn-submit']) . Html::endForm() ?>
        <script>
            $(document).ready(function () {
                $(document).on('click', '.logoutbtn', function () {
                    $(".btn-submit").click();
                })
            })
        </script>
    </li>
    <!-- END QUICK SIDEBAR TOGGLER -->
</ul>
