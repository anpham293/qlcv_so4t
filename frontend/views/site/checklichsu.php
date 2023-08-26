<?php
$this->context->og_type = 'website';


$config = \common\models\Configure::getConfig();

/** @var \common\models\Khaibaoyte $model */

use common\models\Dantoc;
use common\models\Dulieuhososuckhoe;
use common\models\Phuongxa;
use common\models\Quanhuyen;
use common\models\Quoctich;
use common\models\Tinhthanh;
use common\models\Tongiao;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\widgets\ActiveForm;

?>

<div class="container" style="padding: 20px 0">
    <div class="form-group">
        <label class="control-label">Nhập số điện thoại</label>
        <input class="form-control" type="text" id="sdtinput"/>
        <a class="btn btn-success" style="margin: 5px auto" id="kiemtrasss">Kiểm tra</a>
        <table class="table table-hover table-striped table-bordered" id="table-ketqua">
            <tr>
                <th>Ngày khai báo</th>
                <th>Thông tin khai báo</th>
<!--                <th>QR Code</th>-->
            </tr>
            <tbody id="boddy">

            </tbody>
        </table>
    </div>

</div>

<script>
    $(document).on('click', '#kiemtrasss', function () {
        $.ajax({
            url: "<?=Yii::$app->urlManager->createUrl(['site/getlichsu'])?>",
            type: "post",
            dataType: "json",
            data: {
                sdt: $("#sdtinput").val()
            },
            beforeSend: function () {
                $("#boddy").html("");
            },
            success: function (datas) {
                $.each(datas,function(index,value){
                    $("#boddy").append("<tr><td>"+value.ngaykhaibao+"</td><td>"+value.data+"</td>" +
                        // "<td id='qr-"+value.qrcode+"'></td>" +
                        "</tr>");
                    // $("#qr-"+value.qrcode).qrcode({
                    //     render: "table",
                    //     text: "http://$_SERVER[HTTP_HOST]"/thong-tin-y-te.html?code="+value.qrcode
                    // })
                });
            }
        })
    })
</script>
