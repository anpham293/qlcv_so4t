<table class="table table-bordered table-hover table-striped">
    <tr><th>Cán bộ</th><td>Xử lý chính</td><td>Phối hợp</td></tr>
<?php

foreach ($data as $value):?>
    <tr><th style="background: #e76070" colspan="3"><?=$value['phongban']->ten?></th></tr>
    <?php foreach ($value['nhanvien'] as $nhanvien):?>
        <tr><th><?=$nhanvien->ten."<br><span class='help-block' style='margin: 0'>".$nhanvien->chucVu->ten."</span>"?></th>
            <td style="text-align: center"><input type="radio" name="nhanvieninput[<?=$nhanvien->id?>]" value="xulychinh"></td>
            <td style="text-align: center"><input type="radio" name="nhanvieninput[<?=$nhanvien->id?>]" value="phoihop"></td>
        </tr>
    <?php endforeach;?>
<?php endforeach;?>
</table>