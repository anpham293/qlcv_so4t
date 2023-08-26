<ul class="page-sidebar-menu page-sidebar-menu-closed " data-keep-expanded="false" data-auto-scroll="true"
    data-slide-speed="200"
    xmlns="http://www.w3.org/1999/html">
    <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
    <li class="sidebar-toggler-wrapper">
        <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
        <div class="sidebar-toggler">
        </div>
        <!-- END SIDEBAR TOGGLER BUTTON -->
    </li>
    <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->


        <li class="<?php if ((Yii::$app->controller->id == 'site' && Yii::$app->controller->action->id=='quantri')||Yii::$app->controller->id == 'duan' && Yii::$app->controller->action->id!="taichinh") echo 'open' ?>">
            <a href="javascript:;">
                <i class="icon-home"></i>
                <span class="title">Công việc</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu" <?php if ((Yii::$app->controller->id == 'site' && Yii::$app->controller->action->id=='quantri')||Yii::$app->controller->id == 'duan' && Yii::$app->controller->action->id!="taichinh")  echo 'style="display:block"' ?>>


                    <?php foreach (\common\models\Phongban::find()->where('id<>2')->orderBy('ord asc')->all() as $value):?>
                    <li class="<?php if (Yii::$app->controller->id == 'site' && Yii::$app->controller->action->id == 'quantri' && isset($_GET['phongbanid']) && $_GET['phongbanid']==$value->id) echo 'active' ?>">
                        <a href="<?= Yii::$app->urlManager->baseUrl ?>/site/quantri?phongbanid=<?=$value->id?>">
                            <i class="glyphicon glyphicon-list-alt"></i>
                                <?=$value->ten?>
                            </a>
                    </li>
                    <?php endforeach;?>



            </ul>
        </li>



    <?php if (Yii::$app->user->can('duan/taichinh')): ?>
        <li class="<?php if (Yii::$app->controller->id == 'duan'||Yii::$app->controller->action->id == 'taichinh') echo 'open' ?>">
            <a href="<?php echo Yii::$app->urlManager->createUrl('duan/taichinh') ?>">
                <i class="icon-trophy"></i>
                <span class="title">Tài chính</span>
            </a>
        </li>
    <?php endif?>
    <?php if (Yii::$app->user->can('hangmucchiphi/index')): ?>
        <li class="<?php if (Yii::$app->controller->id == 'hangmucchiphi') echo 'open' ?>">
            <a href="<?php echo Yii::$app->urlManager->createUrl('hangmucchiphi/index') ?>">
                <i class="icon-film"></i>
                <span class="title">Hạng mục chi phí</span>
            </a>
        </li>
    <?php endif?>

    <?php if (Yii::$app->user->can('phongban/index') ||Yii::$app->user->can('loaiduan/index') ||Yii::$app->user->can('thongsoduan/index') || Yii::$app->user->can('chucvu/index')|| Yii::$app->user->can('chucvu/index')): ?>
        <li class="<?php if (Yii::$app->controller->id == 'loaivanban'
            ||Yii::$app->controller->id == 'thongsoduan'
            ||Yii::$app->controller->id == 'phongban'
            ||Yii::$app->controller->id == 'chucvu'
            ||Yii::$app->controller->id == 'loaiduan'
        ) echo 'open' ?>">
            <a href="javascript:;">
                <i class="glyphicon glyphicon-th-list"></i>
                <span class="title">Quản lý danh mục</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu" <?php if (Yii::$app->controller->id == 'phongban' || Yii::$app->controller->id == 'loaiduan' || Yii::$app->controller->id == 'chucvu' || Yii::$app->controller->id == 'chucvu') echo 'style="display:block"' ?>>

                <?php if ( Yii::$app->user->can('loaiduan/index')): ?>
                    <li class="<?php if (Yii::$app->controller->id == 'loaiduan' &&Yii::$app->controller->action->id == 'index') echo 'active' ?>">
                        <a href="<?php echo Yii::$app->urlManager->createUrl('loaiduan/index') ?>">
                            <i class="glyphicon glyphicon-list-alt"></i>
                            Quản lý danh mục loại Công việc</a>
                    </li>
                <?php endif; ?>
                <?php if ( Yii::$app->user->can('phongban/index')): ?>
                    <li class="<?php if (Yii::$app->controller->id == 'phongban' &&Yii::$app->controller->action->id == 'index') echo 'active' ?>">
                        <a href="<?php echo Yii::$app->urlManager->createUrl('phongban/index') ?>">
                            <i class="glyphicon glyphicon-list-alt"></i>
                            Quản lý danh mục phòng ban</a>
                    </li>
                <?php endif; ?>
                <?php if ( Yii::$app->user->can('thongsoduan/index')): ?>
                    <li class="<?php if (Yii::$app->controller->id == 'thongsoduan' &&Yii::$app->controller->action->id == 'index') echo 'active' ?>">
                        <a href="<?php echo Yii::$app->urlManager->createUrl('thongsoduan/index') ?>">
                            <i class="glyphicon glyphicon-list-alt"></i>
                            Quản lý thông số Công việc</a>
                    </li>
                <?php endif; ?>

                <?php if (Yii::$app->user->can('chucvu/index')): ?>
                    <li class="<?php if (Yii::$app->controller->id == 'chucvu'&&Yii::$app->controller->action->id == 'index') echo 'active' ?>">
                        <a href="<?php echo Yii::$app->urlManager->createUrl('chucvu/index') ?>">
                            <i class="glyphicon glyphicon-briefcase"></i>
                            Quản lý danh mục chức vụ</a>
                    </li>
                <?php endif; ?>


            </ul>
        </li>
    <?php endif; ?>



    <!---------------------------------------------------------------------------------------------------------------------------------------->
    <?php if (Yii::$app->user->can('rbac/authorization') || Yii::$app->user->can('admin/index')): ?>
        <li class="<?php if (Yii::$app->controller->id == 'rbac'||Yii::$app->controller->id == 'admin') echo 'open' ?>">
            <a href="javascript:;">
                <i class="icon-user"></i>
                <span class="title">Quản lý phân quyền</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu" <?php if (Yii::$app->controller->id == 'rbac' || Yii::$app->controller->id == 'rbac' || Yii::$app->controller->id == 'admin') echo 'style="display:block"' ?>>

                <?php if (Yii::$app->user->can('rbac/signup')): ?>
                    <li class="<?php if (Yii::$app->controller->action->id == 'signup') echo 'active' ?>">
                        <a href="<?php echo Yii::$app->urlManager->createUrl('rbac/signup') ?>">
                            <i class="icon-bar-chart"></i>
                            Tạo tài khoản</a>
                    </li>
                <?php endif; ?>

                <?php if (Yii::$app->user->can('rbac/authorization')): ?>
                    <li class="<?php if (Yii::$app->controller->action->id == 'authorization') echo 'active' ?>">
                        <a href="<?php echo Yii::$app->urlManager->createUrl('rbac/authorization') ?>">
                            <i class="icon-bar-chart"></i>
                            Cập nhật quyền theo vai trò</a>
                    </li>
                <?php endif; ?>
                <?php if (Yii::$app->user->can('rbac/user_role')): ?>
                    <li class="<?php if (Yii::$app->controller->action->id == 'user_role') echo 'active' ?>">
                        <a href="<?php echo Yii::$app->urlManager->createUrl('rbac/user_role') ?>">
                            <i class="icon-bulb"></i>
                            Phân vai trò người dùng</a>
                    </li>
                <?php endif; ?>
                <?php if (Yii::$app->user->can('admin/index')): ?>

                    <li class="<?php if (Yii::$app->controller->id == 'admin') echo 'active' ?>">
                        <a href="<?php echo Yii::$app->urlManager->createUrl('admin/index') ?>">
                            <i class="icon-bulb"></i>
                            Danh sách người dùng</a>
                    </li>
                <?php endif; ?>
            </ul>
        </li>
    <?php endif; ?>


</ul>