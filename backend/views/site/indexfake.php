<html lang="en" data-bs-theme-mode="light"><!--begin::Head-->
<head>
    <title>Hệ thống quản lý Công việc</title>


    <!--begin::Fonts(mandatory for all pages)-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700"><!--end::Fonts-->

    <!--begin::Vendor Stylesheets(used for this page only)-->
    <link href="/admin/metronic8/demo10/assets/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet"
          type="text/css">
    <!--end::Vendor Stylesheets-->


    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    <link href="/admin/metronic8/demo10/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css">
    <link href="/admin/metronic8/demo10/assets/css/style.bundle.css" rel="stylesheet" type="text/css">
    <link href="/admin/themes/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css">
    <!--end::Global Stylesheets Bundle-->

    <!--Begin::Google Tag Manager -->
</head>
<!--end::Head-->

<!--begin::Body-->
<body id="kt_body" class="page-bg">
<!--begin::Theme mode setup on page load-->
<script>
    var defaultThemeMode = "light";
    var themeMode;

    if (document.documentElement) {
        if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
            themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
        } else {
            if (localStorage.getItem("data-bs-theme") !== null) {
                themeMode = localStorage.getItem("data-bs-theme");
            } else {
                themeMode = defaultThemeMode;
            }
        }

        if (themeMode === "system") {
            themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
        }

        document.documentElement.setAttribute("data-bs-theme", themeMode);
    }
</script>
<!--end::Theme mode setup on page load-->
<!--Begin::Google Tag Manager (noscript) -->
<!--End::Google Tag Manager (noscript) -->

<!--begin::Main-->
<!--begin::Root-->
<div class="d-flex flex-column flex-root">
    <!--begin::Page-->
    <div class="page launcher sidebar-enabled d-flex flex-row flex-column-fluid me-lg-5" style="height: 100vh"
         id="kt_page">
        <!--begin::Content-->
        <div class="d-flex flex-row-fluid">
            <!--begin::Container-->
            <div class="d-flex flex-column flex-row-fluid align-items-center">
                <!--begin::Menu-->
                <div class="d-flex flex-column flex-column-fluid mb-5 mb-lg-10">
                    <!--begin::Brand-->
                    <div class="d-flex flex-center pt-10 pt-lg-0 mb-10 mb-lg-0 h-lg-225px">
                        <!--begin::Sidebar toggle-->
                        <div class="btn btn-icon btn-active-color-primary w-30px h-30px d-lg-none me-4 ms-n15"
                             id="kt_sidebar_toggle">
                            <i class="icon-bell" style="color: white;font-size: 30px"></i></div>
                        <!--end::Sidebar toggle-->
                        <span style="color: white;
    text-transform: uppercase;
    margin-right: 10px;
    font-weight: bold;
    font-size: 28px;">PHẦN MỀM QUẢN LÝ CÔNG VIỆC</span>

                        <!--begin::Logo-->
                        <a href="/admin">
                            <img alt="Logo" src="/images/logo/logo-techber-wihte.png" class="h-70px">
                        </a>
                        <?php echo \yii\helpers\Html::beginForm(['site/logout', 'post'], 'post', ['style' => 'margin:0']) . '<button style="color:white;font-size: 30px;background-color: transparent; background-repeat: no-repeat; border: none; cursor: pointer; overflow: hidden; outline: none;" type="submit"><i class="icon-logout logoutbtn"></i></button>' . \yii\helpers\Html::endForm() ?>
                        <script>
                            $(document).ready(function () {
                                $(document).on('click', '.logoutbtn', function () {
                                    $(".btn-submit").click();
                                })
                            })
                        </script>

                        <!--end::Logo-->
                    </div>
                    <!--end::Brand-->
                    <!--begin::Row-->
                    <div class="row g-7 w-xxl-850px">
                        <!--begin::Col-->
                        <div class="col-xxl-5">
                            <!--begin::Card-->
                            <div class="card border-0 shadow-none h-lg-100" style="background-color: #A838FF">
                                <!--begin::Card body-->
                                <div class="card-body d-flex flex-column flex-center pb-0 pt-15">
                                    <!--begin::Wrapper-->
                                    <div class="px-10 mb-10">
                                        <!--begin::Heading-->
                                        <h3 class="text-white mb-2 fw-bolder ttext-center text-uppercase mb-6">Các công
                                            việc</h3>
                                        <!--end::Heading-->

                                        <!--begin::List-->
                                        <div class="mb-7">
                                            <!--begin::Item-->
                                            <div class="d-flex align-items-center mb-2">
                                                <i class="ki-duotone ki-black-right fs-4 text-white opacity-75 me-3"></i>
                                                <span class="text-white opacity-75">Quản lý các Công việc đang thực hiện</span>
                                            </div>
                                            <!--end::Item-->

                                            <!--begin::Item-->
                                            <div class="d-flex align-items-center mb-2">
                                                <i class="ki-duotone ki-black-right fs-4 text-white opacity-75 me-3"></i>
                                                <span class="text-white opacity-75">Theo dõi tiến độ thực hiện</span>
                                            </div>
                                            <!--end::Item-->

                                            <!--begin::Item-->
                                            <div class="d-flex align-items-center mb-2">
                                                <i class="ki-duotone ki-black-right fs-4 text-white opacity-75 me-3"></i>
                                                <span class="text-white opacity-75">Báo cáo</span>
                                            </div>
                                            <!--end::Item-->
                                        </div>
                                        <!--end::List-->

                                        <!--begin::Link-->
                                        <a href="/admin/site/quantri"
                                           class="btn btn-hover-rise text-white bg-white bg-opacity-10 text-uppercase fs-7 fw-bold">Truy
                                            cập</a>
                                        <!--end::Link-->
                                    </div>
                                    <!--end::Wrapper-->

                                    <!--begin::Illustrations-->
                                    <img class="mw-100 h-225px mx-auto mb-lg-n18"
                                         src="/admin/metronic8/demo10/assets/media/misc/1087815.png">
                                    <!--end::Illustrations-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Card-->
                        </div>
                        <!--end::Col-->

                        <!--begin::Col-->
                        <div class="col-xxl-7">
                            <!--begin::Row-->
                            <div class="row g-lg-7">
                                <!--begin::Col-->
                                <div class="col-sm-6">
                                    <!--begin::Card-->
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#kt_modal_create_project"
                                       class="card border-0 shadow-none min-h-200px mb-7"
                                       style="background-color: #F9666E">
                                        <!--begin::Card body-->
                                        <div class="card-body d-flex flex-column flex-center text-center">
                                            <!--begin::Illustrations-->
                                            <img class="mw-100 h-100px mb-7 mx-auto"
                                                 src="/admin/metronic8/demo10/assets/media/misc/637786-200.png">
                                            <!--end::Illustrations-->

                                            <!--begin::Heading-->
                                            <h4 class="text-white fw-bold text-uppercase">Quản lý danh mục</h4>
                                            <!--end::Heading-->
                                        </div>
                                        <!--end::Card body-->
                                    </a>
                                    <!--end::Card-->
                                </div>
                                <!--end::Col-->

                                <!--begin::Col-->
                                <div class="col-sm-6">
                                    <!--begin::Card-->
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#kt_modal_create_account"
                                       class="card border-0 shadow-none min-h-200px mb-7"
                                       style="background-color: #35D29A">
                                        <!--begin::Card body-->
                                        <div class="card-body d-flex flex-column flex-center text-center">
                                            <!--begin::Illustrations-->
                                            <img class="mw-100 h-100px mb-7 mx-auto"
                                                 src="/admin/metronic8/demo10/assets/media/misc/users.png">
                                            <!--end::Illustrations-->

                                            <!--begin::Heading-->
                                            <h4 class="text-white fw-bold text-uppercase">Quản lý tài khoản</h4>
                                            <!--end::Heading-->
                                        </div>
                                        <!--end::Card body-->
                                    </a>
                                    <!--end::Card-->
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Row-->

                            <!--begin::Card-->
                            <div class="card border-0 shadow-none min-h-200px" style="background-color: #D5D83D">
                                <!--begin::Card body-->
                                <div class="card-body d-flex flex-center flex-wrap">
                                    <!--begin::Illustrations-->
                                    <img class="mw-100 h-200px me-4 mb-5 mb-lg-0"
                                         src="/admin/metronic8/demo10/assets/media/misc/pack-of-dollars-money-clipart-design-illustration-free-png.webp">
                                    <!--end::Illustrations-->

                                    <!--begin::Wrapper-->
                                    <div class="d-flex flex-column align-items-center align-items-md-start flex-grow-1"
                                         data-bs-theme="light">
                                        <!--begin::Heading-->
                                        <h3 class="text-gray-900 fw-bolder text-uppercase mb-5">Quản lý tài chính</h3>
                                        <!--end::Heading-->

                                        <!--begin::List-->
                                        <div class="text-gray-800 mb-5 text-center text-md-start">
                                            Quản lý tài chính theo Công việc<br>
                                        </div>
                                        <!--end::List-->

                                        <!--begin::Link-->
                                        <a href="/admin/duan/taichinh"
                                           class="btn btn-hover-rise text-gray-900 text-uppercase fs-7 fw-bold"
                                           style="background-color: #EBEE51">Truy cập</a>
                                        <!--end::Link-->
                                    </div>
                                    <!--end::Wrapper-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Card-->
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->
                </div>
                <!--end::Menu-->
                <!--begin::Footer-->

                <!--end::Footer-->
            </div>
            <!--begin::Content-->
        </div>
        <!--begin::Content-->

        <!--begin::Sidebar-->
        <div id="kt_sidebar" class="sidebar px-5 py-5 py-lg-8 px-lg-11" data-kt-drawer="true"
             data-kt-drawer-name="sidebar" data-kt-drawer-activate="{default: true, lg: false}"
             data-kt-drawer-overlay="true" data-kt-drawer-width="375px" data-kt-drawer-direction="end"
             data-kt-drawer-toggle="#kt_sidebar_toggle">

            <!--begin::Header-->
            <div class="d-flex flex-stack mb-5 mb-lg-8" id="kt_sidebar_header">
                <!--begin::Title-->
                <h2 class="text-white">Các thông báo mới</h2>
                <!--end::Title-->

                <!--begin::Menu-->

            </div>
            <!--end::Header-->

            <!--begin::Body-->
            <div class="mb-5 mb-lg-8" id="kt_sidebar_body">
                <!--begin::Scroll-->
                <div class="hover-scroll-y me-n6 pe-6" id="kt_sidebar_body" data-kt-scroll="true"
                     data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_sidebar_header, #kt_sidebar_footer"
                     data-kt-scroll-wrappers="#kt_page, #kt_sidebar, #kt_sidebar_body" data-kt-scroll-offset="0">
                    <!--begin::Timeline items-->
                    <div class="timeline">
                        <?php

                        $notification = \common\models\Notification::find()->where(['reciever' => Yii::$app->user->id, 'isseen' => 'false'])->orderBy("id desc")->limit(20)->all();
                        if (count($notification) < 20) {
                            $notification = array_merge($notification, \common\models\Notification::find()->where(['reciever' => Yii::$app->user->id])->orderBy("id desc")->limit(20 - count($notification))->all());
                        }
                        ?>
                        <?php $return = "";
                        if (!empty($notification)): ?>
                            <?php
                            $new = 0;

                            foreach ($notification as $notice) {
                                /** @var \common\models\Notification $notice */
                                $return .= '<div class="timeline-item">
                            <!--begin::Timeline line-->
                            <div class="timeline-line w-40px"></div>
                            <!--end::Timeline line-->

                            <!--begin::Timeline icon-->
                            <div class="timeline-icon symbol symbol-circle symbol-40px">
                                <div class="symbol-label">
                                    <i class="ki-duotone ki-pointers fs-2 text-white"><span class="path1"></span><span
                                                class="path2"></span><span class="path3"></span></i></div>
                            </div>
                            <!--end::Timeline icon-->

                            <!--begin::Timeline content-->
                            <div class="timeline-content mb-10 mt-n2">
                                <!--begin::Timeline heading-->
                                <div class="pe-3">
                                    <!--begin::Title-->
                                    <div class="fs-5 text-white fw-semibold mb-2 mt-5">' . $notice->content . ' ' . (($notice->isseen) ? "<span class='badge badge-success fs-8 fw-bold'>Đã xem</span>" : "<span class='badge badge-danger fs-8 fw-bold'>Mới</span>") . '</div>
                                    <!--end::Title-->

                                    <!--begin::Description-->
                                    <div class="d-flex align-items-center mt-1 fs-6">
                                        <!--begin::Info-->
                                        <div class="text-white opacity-50 me-2 fs-7">' . $notice->time . ' - From: ' . $notice->sendername . '</div>
                                        <!--end::Info-->

                                        <a class="text-success fs-7 fw-bold updateseen"  targets="' . $notice->id . '" href="' . $notice->url . '">Xem</a>
                                    </div>
                                    <!--end::Description-->
                                </div>
                                <!--end::Timeline heading-->
                            </div>
                            <!--end::Timeline content-->
                        </div>';

                                if (!$notice->isseen) {
                                    $new++;
                                }
                                if (!$notice->issent):
                                    $notice->issent = true;
                                    $notice->update();
                                    ?>
                                    <script>
                                        $(document).ready(function () {
                                            toastr["info"]('<a class="updateseen" targets="<?=$notice->id?>" href="<?=$notice->url?>" style="padding:10px;background:#ffffff1f;display:block;"><span class="subject"><span class="time"><?=$notice->time?></span> </span><span class="message"><?=$notice->content?></span></a>', "<?=$notice->type?>");
                                        });
                                    </script>

                                <?php endif;
                            }
                            ?>
                        <?php endif; ?>
                        <?= $return ?>
                    </div>
                    <!--end::Timeline items-->
                </div>
                <!--end::Scroll-->
            </div>
            <!--end::Body-->

            <!--begin::Footer-->

            <!--end::Footer-->
        </div>
        <!--end::Sidebar--></div>
    <!--end::Page-->    </div>
<!--end::Root-->
<!--end::Main-->
<!--begin::Engage drawers-->


<!--end::Engage drawers-->

<!--begin::Engage toolbar-->
<div class="engage-toolbar d-flex position-fixed px-5 fw-bold zindex-2 top-50 end-0 transform-90 mt-5 mt-lg-20 gap-2">


</div>
<!--end::Engage toolbar--><!--begin::Scrolltop-->
<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
    <i class="ki-duotone ki-arrow-up"><span class="path1"></span><span class="path2"></span></i></div>
<!--end::Scrolltop-->

<!--begin::Modals-->
<!--begin::Modal - Create Project-->
<div class="modal fade" id="kt_modal_create_project" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-fullscreen p-9">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header header-bg">
                <!--begin::Modal title-->
                <h2 class="text-black">
                    Quản lý danh mục
                    <small class="ms-2 fs-7 fw-normal text-gray-700">Tạo mới, quản lý, chỉnh sửa các mục</small>
                </h2>
                <!--end::Modal title-->

                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-color-black btn-active-color-primary" data-bs-dismiss="modal">
                    <i class="icon-close"></i></div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->

            <!--begin::Modal body-->
            <div class="modal-body scroll-y m-5">
                <!--begin::Stepper-->
                <div class="stepper stepper-links d-flex flex-column" id="kt_modal_create_project_stepper">
                    <!--begin::Container-->
                    <div class="container">
                        <!--begin::Nav-->

                        <!--end::Nav-->

                        <!--begin::Form-->

                        <!--begin::Type-->
                        <div class="current" data-kt-stepper-element="content">
                            <!--begin::Wrapper-->
                            <div class="w-100">
                                <!--begin::Heading-->
                                <div class="pb-7 pb-lg-12">
                                    <!--begin::Title-->
                                    <h1 class="fw-bold text-dark">Hệ thống danh mục</h1>
                                    <!--end::Title-->

                                    <!--begin::Description-->
                                    <div class="text-muted fw-semibold fs-4">
                                        Các chức năng bạn
                                        <a href="#" class="link-primary fw-bold">có quyền truy cập</a>
                                    </div>
                                    <!--end::Description-->
                                </div>
                                <!--end::Heading-->

                                <!--begin::Input group-->
                                <div class="row mb-15" data-kt-buttons="true">
                                    <!--begin::Option-->
                                    <?php if (Yii::$app->user->can('phongban/index')): ?>
                                        <a href="/admin/phongban"
                                           class="btn btn-outline btn-outline-dashed btn-active-light-primary d-flex text-start col-12 col-md-6 active">
                                            <!--begin::Input-->
                                            <input class="btn-check" type="radio" checked="checked" name="project_type"
                                                   value="1">
                                            <!--end::Input-->

                                            <!--begin::Label-->
                                            <span class="d-flex">
                    <!--begin::Icon-->
                    <i class="ki-duotone ki-profile-circle fs-3hx"><span class="path1"></span><span
                                class="path2"></span><span class="path3"></span></i>                    <!--end::Icon-->

                                                <!--begin::Info-->
                    <span class="ms-4">
                        <span class="fs-3 fw-bold text-gray-900 mb-2 d-block">Danh mục phòng ban</span>

                        <span class="fw-semibold fs-4 text-muted">
                            Quản lý các phòng ban
                        </span>
                    </span>
                                                <!--end::Info-->
                </span>
                                            <!--end::Label-->
                                        </a>
                                    <?php endif; ?>
                                    <!--end::Option-->

                                    <?php if (Yii::$app->user->can('thongsoduan/index')): ?>
                                        <!--begin::Option-->
                                        <a href="/admin/thongsoduan"
                                           class="btn btn-outline btn-outline-dashed btn-active-light-primary d-flex text-start col-12 col-md-6">
                                            <!--begin::Input-->
                                            <input class="btn-check" type="radio" name="project_type" value="2">
                                            <!--end::Input-->

                                            <!--begin::Label-->
                                            <span class="d-flex">

                                            <!--begin::Info-->
                    <span class="ms-4">
                        <span class="fs-3 fw-bold text-gray-900 mb-2 d-block">Thông số Công việc</span>

                        <span class="fw-semibold fs-4 text-muted">
                            Quản lý các thông số Công việc
                        </span>
                    </span>
                                                <!--end::Info-->
                </span>
                                            <!--end::Label-->
                                        </a>
                                        <!--end::Option-->
                                    <?php endif; ?>

                                    <?php if (Yii::$app->user->can('chucvu/index')): ?>
                                        <!--begin::Option-->
                                        <a href="/admin/chucvu"
                                           class="btn btn-outline btn-outline-dashed btn-active-light-primary d-flex text-start col-12 col-md-6">
                                            <!--begin::Input-->
                                            <input class="btn-check" type="radio" name="project_type" value="2">
                                            <!--end::Input-->

                                            <!--begin::Label-->
                                            <span class="d-flex">

                                            <!--begin::Info-->
                    <span class="ms-4">
                        <span class="fs-3 fw-bold text-gray-900 mb-2 d-block">Chức vụ</span>

                        <span class="fw-semibold fs-4 text-muted">
                            Quản lý các chức vụ trong cơ quan tổ chức
                        </span>
                    </span>
                                                <!--end::Info-->
                </span>
                                            <!--end::Label-->
                                        </a>
                                        <!--end::Option-->
                                    <?php endif; ?>

                                    <?php if (Yii::$app->user->can('loaiduan/index')): ?>
                                        <!--begin::Option-->
                                        <a href="/admin/loaiduan"
                                           class="btn btn-outline btn-outline-dashed btn-active-light-primary d-flex text-start col-12 col-md-6">
                                            <!--begin::Input-->
                                            <input class="btn-check" type="radio" name="project_type" value="2">
                                            <!--end::Input-->

                                            <!--begin::Label-->
                                            <span class="d-flex">

                                            <!--begin::Info-->
                    <span class="ms-4">
                        <span class="fs-3 fw-bold text-gray-900 mb-2 d-block">Loại Công việc</span>

                        <span class="fw-semibold fs-4 text-muted">
                            Quản lý các loại Công việc, công việc theo quy trình định dạng sẵn theo từng loại Công việc...
                        </span>
                    </span>
                                                <!--end::Info-->
                </span>
                                            <!--end::Label-->
                                        </a>
                                        <!--end::Option-->
                                    <?php endif; ?>

                                    <?php if (Yii::$app->user->can('hangmucchiphi/index')): ?>
                                        <!--begin::Option-->
                                        <a href="/admin/hangmucchiphi"
                                           class="btn btn-outline btn-outline-dashed btn-active-light-primary d-flex text-start col-12 col-md-6">
                                            <!--begin::Input-->
                                            <input class="btn-check" type="radio" name="project_type" value="2">
                                            <!--end::Input-->

                                            <!--begin::Label-->
                                            <span class="d-flex">

                                            <!--begin::Info-->
                    <span class="ms-4">
                        <span class="fs-3 fw-bold text-gray-900 mb-2 d-block">Hạng mục chi phí</span>

                        <span class="fw-semibold fs-4 text-muted">
                            Quản lý các hạng mục chi phí...
                        </span>
                    </span>
                                                <!--end::Info-->
                </span>
                                            <!--end::Label-->
                                        </a>
                                        <!--end::Option-->
                                    <?php endif; ?>
                                </div>
                                <!--end::Input group-->


                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Type-->
                        <!--begin::Settings-->

                        <!--end::Complete-->
                        <!--end::Form-->
                    </div>
                    <!--begin::Container-->
                </div>
                <!--end::Stepper-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<!--end::Modal - Create Project--><!--begin::Modal - Create account-->
<div class="modal fade" id="kt_modal_create_account" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-fullscreen p-9">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header header-bg">
                <!--begin::Modal title-->
                <h2 class="text-black">
                    Quản lý tài khoản
                    <small class="ms-2 fs-7 fw-normal text-gray-700"> Và phân quyền hệ thống</small>
                </h2>
                <!--end::Modal title-->

                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-color-black btn-active-color-primary" data-bs-dismiss="modal">
                    <i class="icon-close"></i></div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->

            <!--begin::Modal body-->
            <div class="modal-body scroll-y m-5">
                <!--begin::Stepper-->
                <div class="stepper stepper-links d-flex flex-column" id="kt_create_account_stepper">


                    <!--begin::Form-->

                    <!--begin::Step 1-->
                    <div class="current" data-kt-stepper-element="content">
                        <!--begin::Wrapper-->
                        <div class="w-100">
                            <!--begin::Heading-->
                            <div class="pb-10 pb-lg-15">
                                <!--begin::Title-->
                                <h2 class="fw-bold d-flex align-items-center text-dark">
                                    Quản lý tài khoản


                                    <span class="ms-1" data-bs-toggle="tooltip"
                                          title="Billing is issued based on your selected account typ">
	<i class="ki-duotone ki-information-5 text-gray-500 fs-6"><span class="path1"></span><span
                class="path2"></span><span class="path3"></span></i></span></h2>
                                <!--end::Title-->

                                <!--begin::Notice-->
                                <div class="text-muted fw-semibold fs-4">
                                    Các chức năng bạn
                                    <a href="#" class="link-primary fw-bold">có quyền truy cập</a>
                                </div>
                                <!--end::Notice-->
                            </div>
                            <!--end::Heading-->

                            <!--begin::Input group-->
                            <div class="fv-row">
                                <!--begin::Row-->
                                <div class="row">
                                    <!--begin::Col-->
                                    <?php if (Yii::$app->user->can('rbac/signup')): ?>
                                        <a href="/admin/rbac/signup" class="col-lg-6">
                                            <!--begin::Option-->
                                            <input type="radio" class="btn-check" name="account_type" value="corporate"
                                                   id="kt_create_account_form_account_type_corporate">
                                            <label onclick="window.location.replace('/admin/rbac/signup')"
                                                   class="btn btn-outline btn-outline-dashed btn-active-light-primary p-7 d-flex align-items-center"
                                                   for="kt_create_account_form_account_type_corporate">
                                                <i class="ki-duotone ki-briefcase fs-3x me-5"><span
                                                            class="path1"></span><span class="path2"></span></i>
                                                <!--begin::Info-->
                                                <span class="d-block fw-semibold text-start">
                        <span class="text-dark fw-bold d-block fs-4 mb-2">Tạo tài khoản</span>
                        <span class="text-muted fw-semibold fs-6">Thêm mới tài khoản</span>
                    </span>
                                                <!--end::Info-->
                                            </label>
                                            <!--end::Option-->
                                        </a>
                                    <?php endif; ?>

                                    <?php if (Yii::$app->user->can('rbac/authorization')): ?>
                                        <a href="/admin/rbac/authorization" class="col-lg-6">
                                            <!--begin::Option-->
                                            <input type="radio" class="btn-check" name="account_type" value="corporate"
                                                   id="kt_create_account_form_account_type_corporate">
                                            <label onclick="window.location.replace('/admin/rbac/authorization')"
                                                   class="btn btn-outline btn-outline-dashed btn-active-light-primary p-7 d-flex align-items-center"
                                                   for="kt_create_account_form_account_type_corporate">
                                                <i class="ki-duotone ki-briefcase fs-3x me-5"><span
                                                            class="path1"></span><span class="path2"></span></i>
                                                <!--begin::Info-->
                                                <span class="d-block fw-semibold text-start">
                        <span class="text-dark fw-bold d-block fs-4 mb-2">Phân quyền theo vai trò</span>
                        <span class="text-muted fw-semibold fs-6">Quyền truy cập theo vai trò</span>
                    </span>
                                                <!--end::Info-->
                                            </label>
                                            <!--end::Option-->
                                        </a>
                                    <?php endif; ?>

                                    <?php if (Yii::$app->user->can('rbac/user_role')): ?>
                                        <a href="/admin/rbac/user_role" class="col-lg-6">
                                            <!--begin::Option-->
                                            <input type="radio" class="btn-check" name="account_type" value="corporate"
                                                   id="kt_create_account_form_account_type_corporate">
                                            <label onclick="window.location.replace('/admin/rbac/user_role')"
                                                   class="btn btn-outline btn-outline-dashed btn-active-light-primary p-7 d-flex align-items-center"
                                                   for="kt_create_account_form_account_type_corporate">
                                                <i class="ki-duotone ki-briefcase fs-3x me-5"><span
                                                            class="path1"></span><span class="path2"></span></i>
                                                <!--begin::Info-->
                                                <span class="d-block fw-semibold text-start">
                        <span class="text-dark fw-bold d-block fs-4 mb-2">Phân vai trò người dùng</span>
                        <span class="text-muted fw-semibold fs-6">Phân quyền vai trò hệ thống cho tài khoản người dùng</span>
                    </span>
                                                <!--end::Info-->
                                            </label>
                                            <!--end::Option-->
                                        </a>
                                    <?php endif; ?>

                                    <?php if (Yii::$app->user->can('admin/index')): ?>
                                        <a href="/admin/admin/index" class="col-lg-6">
                                            <!--begin::Option-->
                                            <input type="radio" class="btn-check" name="account_type" value="corporate"
                                                   id="kt_create_account_form_account_type_corporate">
                                            <label onclick="window.location.replace('/admin/admin/index')"
                                                   class="btn btn-outline btn-outline-dashed btn-active-light-primary p-7 d-flex align-items-center"
                                                   for="kt_create_account_form_account_type_corporate">
                                                <i class="ki-duotone ki-briefcase fs-3x me-5"><span
                                                            class="path1"></span><span class="path2"></span></i>
                                                <!--begin::Info-->
                                                <span class="d-block fw-semibold text-start">
                        <span class="text-dark fw-bold d-block fs-4 mb-2">Danh sách tài khoản</span>
                        <span class="text-muted fw-semibold fs-6">Danh sách tài khoản người dùng thuộc hệ thống</span>
                    </span>
                                                <!--end::Info-->
                                            </label>
                                            <!--end::Option-->
                                        </a>
                                    <?php endif; ?>

                                    <!--end::Col-->

                                    <!--begin::Col-->

                                    <!--end::Col-->
                                </div>
                                <!--end::Row-->
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Wrapper-->                        </div>
                    <!--end::Step 1-->

                    <!--begin::Step 2-->

                    <!--end::Actions-->

                    <!--end::Form-->
                </div>
                <!--end::Stepper-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<!--end::Modal - Create project-->            <!--end::Modals-->

<!--begin::Javascript-->
<script>
    var hostUrl = "/admin/metronic8/demo10/assets/";        </script>

<!--begin::Global Javascript Bundle(mandatory for all pages)-->
<script src="/admin/metronic8/demo10/assets/plugins/global/plugins.bundle.js"></script>
<script src="/admin/metronic8/demo10/assets/js/scripts.bundle.js"></script>
<!--end::Global Javascript Bundle-->

<!--begin::Vendors Javascript(used for this page only)-->
<script src="/admin/metronic8/demo10/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js"></script>

<!--end::Vendors Javascript-->

<!--begin::Custom Javascript(used for this page only)-->
<script src="/admin/metronic8/demo10/assets/js/custom/utilities/modals/create-project/type.js"></script>
<script src="/admin/metronic8/demo10/assets/js/custom/utilities/modals/create-project/budget.js"></script>
<script src="/admin/metronic8/demo10/assets/js/custom/utilities/modals/create-project/settings.js"></script>
<script src="/admin/metronic8/demo10/assets/js/custom/utilities/modals/create-project/team.js"></script>
<script src="/admin/metronic8/demo10/assets/js/custom/utilities/modals/create-project/targets.js"></script>
<script src="/admin/metronic8/demo10/assets/js/custom/utilities/modals/create-project/files.js"></script>
<script src="/admin/metronic8/demo10/assets/js/custom/utilities/modals/create-project/complete.js"></script>
<script src="/admin/metronic8/demo10/assets/js/custom/utilities/modals/create-project/main.js"></script>
<script src="/admin/metronic8/demo10/assets/js/custom/utilities/modals/create-account.js"></script>
<!--end::Custom Javascript-->
<!--end::Javascript-->


</body><!--end::Body--></html>