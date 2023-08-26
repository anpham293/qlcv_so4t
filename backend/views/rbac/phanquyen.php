<?php

use johnitvn\ajaxcrud\CrudAsset;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel common\modules\auth\models\Search\RbacSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Phân quyền';
$this->params['breadcrumbs'][] = ['name' => $this->title, 'link' => 'javascript:void(0)'];

CrudAsset::register($this);
function controlertranslator($control)
{
    $data = [
        "ADMIN" => "Quyền Quản lý người dùng",
        "BANGIAO" => "Quyền Quản lý bàn giao nghiệm thu",
        "CONFIGURE" => "Quyền Cấu hình",
        "DATCOC" => "Quyền Quản lý đặt cọc",
        "DIADIEM" => "Quyển Quản lý địa điểm",
        "DOUONG" => "Quyền Quản lý danh sách đồ uống",
        "DOUONGPHATSINH" => "Quyền Quản lý danh sách đồ uống phát sinh",
        "KHACHHANG" => "Quyền Quản lý khách hàng",
        "LOAIMON" => "Quyền Quản lý loại món",
        "LOAITIEC" => "Quyền Quản lý loại tiệc",
        "LOG" => "Quyền Quản lý Lịch sử",
        "MON" => "Quyền Quản lý Món",
        "ORDER" => "Quyền Quản lý đặt tiệc",
        "RBAC" => "Quyền Quản lý phân quyền đặc biệt",
        "TEMPLATE" => "Quyền Quản lý template",
        "THUCDON" => "Quyền Quản lý thực đơn",
        "TRANGMIENG" => "Quyền Quản lý danh sách món tráng miệng",
        "BOPHAN" => "Quyền Quản lý phòng ban",
        "CHUONGTRINHKHUYENMAI" => "Quyền Quản lý Chương trình khuyến mại",
    ];
    if(isset($data[$control]))
        return $data[$control];
    else
        return $control;

}
function actiontranslator($action)
{
    $data = [
        "bulkdelete" => "Xóa nhiều trong danh sách",
        "create" => "Thêm mới",
        "delete" => "Xóa",
        "index" => "Truy cập trang chủ",
        "update" => "Cập nhật",
        "view" => "Xem thông tin chi tiết",
        "luuconfig" => "Lưu Thiết lập",
        "imageconfig" => "Thiết lập hình ảnh",
        "print" => "In",
        "updateactive" => "Cập nhật trạng thái hoạt động / không hoạt động",
        "changetype" => "Đổi loại",
        "checkphong" => "Kiểm tra phòng trống",
        "chonthucdon" => "Chọn thực đơn",
        "huychothd" => "Hủy chốt hợp đồng",
        "huynghiemthu" => "Hủy nghiệm thu",
        "lunarchange" => "Tính lịch âm",
        "solarchange" => "Tính lịch dương",
        "prints" => "In chứng từ",
        "themnghiemthu" => "Thêm chi tiết nghiệm thu",
        "updatestatus" => "Chỉnh Trạng thái của order (luôn tích)",
        "updatetien" => "Cập nhật tiền",
        "nghiemthu" => "Nghiệm thu và bàn giao",
        "authorization" => "Cấp quyền cho chức năng",
        "newrole" => "Thêm mới vai trò",
        "signup" => "Đăng ký",
        "thongbao" => "Thông báo",
        "update_permission" => "Cập nhật mới phân quyền",
        "user_role" => "Gán chức năng người dùng",
        "deleterole" => "Xóa vai trò hệ thống",

    ];
    if(isset($data[$action]))
        return $data[$action];
    else
        return $action;
}
?>


<div id="danhsachquyen" style="min-height: 100vh">
    <?php //echo Yii::$app->controller->renderPartial('form_pq',['roles' => $roles,
    //    'permissions' => $permissions,
    //    'yyy' => $yyy])?>
    <!--    <div class="clearfix"></div>-->
    <div class="row">
        <div class="form-group col-xs-6">
            <?php echo \yii\helpers\Html::a('<i class="fa fa-edit"></i> Cập nhật', 'javascript:void(0)', ['id' => 'edit-auth-btn', 'class' => 'btn blue']) ?>
        </div>
        <?= Html::beginForm([''], '', ['id' => 'form-role']); ?>
        <?php if (Yii::$app->user->can("rbac/newrole")): ?>
            <div class="form-group col-xs-6">
                <div class="col-xs-9">
                    <?= Html::textInput('name', '', ['class' => 'form-control', 'placeholder' => 'Tên vai trò']); ?>
                </div>
                <div class="col-xs-3">
                    <?= Html::button("Tạo mới vai trò", ['id' => 'saverole', 'class' => 'btn blue']) ?>
                </div>
            </div>
            <script>
                $(document).ready(function () {
                    $(document).on('click', '#saverole', function () {
                        if (confirm('Tạo mới role?')) {
                            $.ajax({
                                url: "<?=Yii::$app->urlManager->createUrl('rbac/newrole');?>",
                                type: 'post',
                                data: $("#form-role").serialize(),
                                complete: function () {
                                    window.location.reload();
                                }
                            })
                        }
                    })
                })
            </script>
        <?php endif; ?>
    </div>
    <?= Html::endForm() ?>
    <?php echo Html::beginForm('', '', ['id' => 'auth-form']); ?>
    <div class="auth-item-index table-responsive">
        <table class="table table-bordered table-hover">
            <tr>
                <th data-target=".allTarget" class="clickable" style="background: #6b6b6b;color: :white;">DANH SÁCH VAI TRÒ</th><th style="width: 400px!important;">TÊN VAI TRÒ CHO PHÉP</th>
                <?php foreach ($roles as $role): ?>
                    <?php if ($role->name != 'superadmin'): ?>
                        <th style="background: #6b6b6b;;color:white;text-align: center; text-transform: uppercase; width: 200px!important;"><?php echo $role->name; ?> <?php if(strtolower($role->name)!="admin" && strtolower($role->name)!="nhanvien"):?> <a class="btn btn-default btn-del-role" vals="<?=$role->name?>">Xóa</a><?php endif;?></th>
                    <?php endif; ?>
                <?php endforeach; ?>
            </tr>

            <?php $controller = ''; ?>
            <?php foreach ($permissions as $permission):
                if (strpos($permission->name, 'site') === false):
                    $temp = preg_replace('/\/(.+)/', '', $permission->name);
                    if ($temp != 'rbac' || Yii::$app->user->identity->username == 'Superadmin'):
                        if ($temp != $controller):
                            $controller = $temp;
                            echo '<tr>';
                            echo '<td data-toggle="collapse" data-target=.' . $controller . ' class="clickable" style="background-color: #f5f5f5; color: black; text-transform: uppercase; padding: 0 0 0 12px; cursor: pointer; line-height: 39px;" colspan="2">' . controlertranslator(strtoupper($controller)) . '</td>';
                            foreach ($roles as $role):
                                if ($role->name != 'superadmin'):
                                    echo '<td style="text-align: center; background-color: #f5f5f5; color: black;">' . Html::checkbox($role->name, false, ["value" => $controller, "class" => "phanquyenall"]) . '</td>';
                                endif;
                            endforeach;
                            echo '</tr>';
                        endif;
                        ?>
                        <tr>

                            <td style="padding: 0 0 0 12px; line-height: 32px;">
                                <div class="collapse <?php echo $controller ?> allTarget"><?php $dt=explode("/",$permission->name );
                                        echo actiontranslator($dt[1]);
                                ?></div>
                            </td>
                            <td style="padding: 0 0 0 12px; line-height: 32px; width: 400px!important;">
                                <div class="collapse <?php echo $controller ?> allTarget"><?php echo $permission->name;
                                    ?></div>
                            </td>
                            <?php foreach ($roles as $role): ?>
                                <?php if ($role->name != 'superadmin'): ?>
                                    <td style="text-align: center; padding: 0; line-height: 32px;">
                                        <div class="collapse <?php echo $controller ?> allTarget"><?php echo Html::checkbox($role->name, ($yyy[$permission->name][$role->name] == 1), ['value' => $permission->name, 'class' => 'phanquyen']) ?></div>
                                    </td>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </tr>
                        <?php
                    endif;
                endif;
            endforeach;
            ?>
        </table>
    </div>
    <?php echo Html::endForm(); ?>
</div>

<script>
    $(document).ready(function () {
        $(document).on('click', '#edit-auth-btn', function () {
            $.ajax({
                type: 'post',
                url: '<?php echo Yii::$app->urlManager->createUrl('rbac/authorization') ?>',
                data: {updateAction: 1},
//                beforeSend: function () {
//                    $("#danhsachquyen").html("");
//                    block({target: "#danhsachquyen"});
//                },
                success: function () {
                    location.reload();
//                    $("#danhsachquyen").html(data);
//                    unblock("#danhsachquyen");
                }
            });
        });
        $(document).on('click', '.btn-del-role', function () {
            var id = $(this).attr("vals");
            $.ajax({
                type: 'post',
                url: '<?php echo Yii::$app->urlManager->createUrl('rbac/deleterole') ?>',
                data: {id: id },
//                beforeSend: function () {
//                    $("#danhsachquyen").html("");
//                    block({target: "#danhsachquyen"});
//                },
                success: function () {
                    location.reload();
//                    $("#danhsachquyen").html(data);
//                    unblock("#danhsachquyen");
                }
            });
        })
    })
</script>
