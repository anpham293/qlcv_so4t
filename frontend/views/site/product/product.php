<?php
/**
 * Created by PhpStorm.
 * User: anlai
 * Date: 02-Oct-17
 * Time: 10:19 AM
 */
$this->title = $data->name;
?>
<div class="pad10">
    <div class="container t">
        <ol class="breadcrumb breadcrumb-arrow border-bot">
            <li><a href="<?php echo Yii::$app->urlManager->baseUrl ?>/" target="_self">Trang chủ</a></li>
            <li><i class="fa fa-angle-right"></i></li>
            <li>
                <a href="<?= Yii::$app->urlManager->createUrl(['site/catlist', 'id' => $breadcrumb->id, 'path' => $breadcrumb->url]) ?>"><?php echo $breadcrumb->name ?></a>
            </li>
            <li><i class="fa fa-angle-right"></i></li>
            <li><a href="javascript:void(0)" class="active"><?php echo $data->name ?></a></li>
        </ol>
        <div class="product-content">
            <div class="row">
                <div class="col-xs-12 col-md-6">
                    <?php if (!is_null($anhsanpham) && is_file(Yii::getAlias('@root') . $anhsanpham->image)): ?>
                        <img alt="Image" src="<?= Yii::$app->urlManager->baseUrl . $anhsanpham->image ?>" class="img-product">
                    <?php else: ?>
                        <img alt="noimg" src="<?= Yii::$app->urlManager->baseUrl ?>/images/noimg.jpg" class="img-product">
                    <?php endif; ?>
                </div>
                <div class="col-xs-12 col-md-6">
                    <h2 class="style-03 text-align-center color-white">
                        <?= $data->name ?>
                    </h2>
                    <p class="margin-top-15"><i class="fa fa-eye"></i> <?= $data->luotxem ?> lượt xem
                    </p>
                    <div class="fb-like"
                         data-href="<?php echo (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>"
                         data-layout="standard" data-action="like" data-size="small" data-show-faces="true"
                         data-share="true"></div>
                    <div class="margin-top-10">
                        <?= $data->brief; ?>
                        <div class="dangkydiv">

                            <?php if ($data->cuphap != "" && !is_null($data->cuphap)): ?>
                                <span class="hoac hidden-xs"> hoặc
                        <span class="anymore">
                        <?php
                        if($data->kieudangky=='3') echo "Quý khách đăng ký tại các cửa hàng Viettel";
                        if ($data->kieudangky == '1') echo "gọi tới <span class='cuphap'><a rel='nofollow' title='Gọi ngay' href='tel:" . $data->cuphap . "'>" . $data->cuphap . " (Bấm để gọi ngay)</a></span> để được tư vấn.";
                        else {
                            $temp = explode(' gửi ', $data->cuphap);
                            echo "nhắn tin theo cú pháp <span class='cuphap'><a rel='nofollow' title='Nhắn tin' href='sms://" . $temp[1] . "?body=" . urlencode($temp[0]) . "'>" . $data->cuphap . "</a></span>";
                        }
                        ?>
                            </span>
                            </span>

                                <p class="hidden-lg hidden-md hidden-sm visible-xs">Hoặc <span class="anymore">
                        <?php
                        if($data->kieudangky=='3') echo "Quý khách đăng ký tại các cửa hàng Viettel";
                        if ($data->kieudangky == '1') echo "gọi tới <span class='cuphap'><a rel='nofollow' title='Gọi ngay' href='tel:" . $data->cuphap . "'>" . $data->cuphap . " </a></span> để được tư vấn.";
                        else {
                            $temp = explode(' gửi ', $data->cuphap);
                            echo "nhắn tin theo cú pháp <span class='cuphap'><a rel='nofollow' title='Nhắn tin' href='sms://" . $temp[1] . "?body=" . urlencode($temp[0]) . "'>" . $data->cuphap . " (Bấm để nhắn ngay)</a></span>";
                        }
                        ?>
                            </span></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<div class="clearfix"></div>
<div class="pad10">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-xs-12 preproduct nopadding padding-right-10">
                <div class="t padding-15">
                    <?= $data->decription ?>


                </div>
                <div class="fb-comments"
                     data-href="<?php echo (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>"
                     data-numposts="5"></div>
            </div>

        </div>

    </div>
</div>
<div class="clearfix"></div>
