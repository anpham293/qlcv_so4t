<?php

use common\models\Configure;
$config=Configure::getConfig();
/** @var \common\models\Khaibaoyte $model */
?>
    <div style="height: 49vh;vertical-align: middle;">
    <h1 style="text-align: center">TỜ KHAI Y TẾ CÁ NHÂN</h1>
    <div class="text-center">
        DỮ LIỆU KHAI BÁO Y TẾ CÁ NHÂN CỦA BẠN ĐÃ ĐƯỢC LƯU TRỮ THÀNH CÔNG
    </div>
    <div class="red-title text-center">
    Xin cám ơn. Mọi thắc mắc hoặc yêu cầu hỗ trợ xin liên hệ Holine: <?=$config['contact_hotline']?>, Email: <?=$config['contact_email']?>
    </div>
    <div class="col-xs-12"style="text-align: center;font-size: 26px;font-weight: bold; color: #3c763d ;padding-bottom: 25px">

        <div>QR Y Tế</div>
        <div><?=$model->loaikhaibao?></div>
        <div id="qr" style="margin: auto;"></div>
        <style>#qr table{
                margin: auto!important;
            }</style>
    </div>
        <?php function generateHtml($left,$right){
            return'  <div class="row">
            <div class="col-xs-6" style="text-align: right; font-weight: bold">'.$left.'</div>
            <div class="col-xs-6" style="text-align: left">'.$right.'</div>
        </div>';
        }?>
    <div class="container">
        <?=generateHtml("Họ và tên",$model->hovaten)?>
        <?=generateHtml("Ngày khai báo",$model->ngaykhaibao)?>
        <?=generateHtml("Ngày sinh",$model->ngaysinh."/".$model->thangsinh."/".$model->namsinh)?>
        <?=generateHtml("Giới tính",$model->gioitinh)?>
        <?=generateHtml("Địa chỉ",$model->diachi.", ".$model->xaphuonghktt.", ".$model->quanhuyenhktt.", ".$model->tinhthanhphohktt)?>
        <?=generateHtml("Số điện thoại",$model->sodienthoai)?>
        <?=generateHtml("Lý do đến viện",$model->lydodenvien)?>
        <?=generateHtml("Người thân 1",$model->nguoithan1)?>
        <?=generateHtml("Người thân 2",$model->nguoithan2)?>
        <?=generateHtml("Phòng ban công tác (nếu là NV y tế)",$model->khoaphonglamviec)?>
        <?=generateHtml("Dấu hiệu",$model->getDauHieu())?>
        <?=generateHtml("Dịch tễ",$model->getYeuToDichTe())?>

    </div>
    <div class="container">
        <div class="alert alert-success"><p><a class="btn btn-success" href="<?=Yii::$app->urlManager->createUrl(['site/download','id'=>$model->id])?>">In tờ khai</a></p><i>Cám ơn bạn đã khai báo y tế! Đây là đường dẫn và Mã QR Y Tế truy cập thông tin y tế của bạn: <a style="font-weight: bold" href="<?="http://$_SERVER[HTTP_HOST]".Yii::$app->urlManager->createUrl(['site/canhan','code'=>$model->privatekey])?>"><?=$model->privatekey?></a> </i></div>
    </div>
    <script>
        $(document).ready(function () {
            $('#qr').qrcode({
                render: "table",
                text: "<?="http://$_SERVER[HTTP_HOST]".Yii::$app->urlManager->createUrl(['site/canhan','code'=>$model->privatekey])?>"
            });

        })
    </script>
        <div class="clearfix" style="text-align: center;margin: 20px auto"> <a href="/" class="btn btn-success">Tiếp tục khai báo</a></div>
