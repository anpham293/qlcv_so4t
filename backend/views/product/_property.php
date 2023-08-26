<?php
/**
 * Created by PhpStorm.
 * User: Duong_IT
 * Date: 7/14/2017
 * Time: 9:54 PM
 */
?>
<?php foreach ($properties as $thongso): ?>
    <div class="row">
        <div class="col-md-12">
            <button class="btn btn-success click-thongso" style="margin-bottom: 10px"
                    id="btn-attribute-<?=$thongso->id?>" giatri="<?=$thongso->id?>" types ="<?= $thongso->type?>"><?= $thongso->name ?></button>
            <input type="hidden" name="index-sanpham-<?=$thongso->id?>" id="index-sanpham-<?=$thongso->id?>" value="0">
            <table class="table table-striped table-bordered" id="table-them-<?=$thongso->id?>">
                <thead>
                <tr>
                    <th style="text-align: center">Tên thuộc tính</th>
                    <th style="text-align: center">Trạng thái</th>
                    <th style="text-align: center">Giá cộng thêm</th>
                    <th style="text-align: center">Giá mặc định</th>
                    <th style="text-align: center">code</th>
                    <th style="text-align: center">Xóa</th>
                </tr>
                </thead>
                <tbody>
                <tr class="emptyRow">
                    <td colspan="6"><p>chưa nhập thông tin</p></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
<?php endforeach; ?>
