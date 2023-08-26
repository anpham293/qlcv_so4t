<?php
$this->context->og_type='website';
$config = \common\models\Configure::getConfig();
?>

<section id="slider" class="slider-parallax revslider-wrap ohidden clearfix slider-parallax-visible">

    <div class="tp-banner-container">
        <div class="owl-carousel owl-theme" id="headerowl-carousel">
            <?php foreach ($slides as $slide): ?>
                <div class="item itemcarow">
                    <a target="_blank" title="<?=$slide->name?>" href="<?=$slide->url?>"><img alt="<?=$slide->name?>" src="<?= Yii::$app->urlManager->baseUrl . $slide->image ?>">
                    </a>
                </div>
            <?php endforeach; ?>

        </div>
    </div>


    <!-- END REVOLUTION SLIDER -->

</section>
<section id="content" style="background: url(https://4g.viettel-haiphong.net/images/partner/1507237658-020a880a4a8fe7515c7fd9d344d136f5bce55a461.jpg) 100% 100%;background-repeat: no-repeat;
    background-attachment: fixed;">

    <div class="content-wrap">
        <div class="mainsec">
            <div id="gioithieu">
                <div class="container">
                    <p class="text-align-center texthead">Ưu điểm của mạng 4G</p>
                    <p class="text-align-center">
                        <?= $config['contact_slogan1']?>

                    </p>
                    <p class="text-align-center">
                        <?= $config['contact_slogan2']?>
                    </p>
                    <p class="text-align-center">
                    <img src="<?=Yii::$app->urlManager->baseUrl?>/images/9_9_1_Cac goi 4G.jpg" class="width50t"></p>
                    <h2 class="text-align-center">Làm sao để sử dụng 4g</h2>
                    <div class="step-block">
                        <ul class="list-unstyled list-inline">
                            <li>
                                <a href="<?=Yii::$app->urlManager->createUrl('site/dienthoai')?>"><img
                                            src="<?php echo Yii::$app->urlManager->baseUrl ?>/images/device-4g.png"
                                            alt="Kiểm tra thiết bị hỗ trợ 4G" class="ef">
                                    <p class="gtitle">Kiểm tra thiết bị hỗ trợ 4G</p></a>

                            </li>
                            <li><img src="<?php echo Yii::$app->urlManager->baseUrl ?>/images/arrow.png" alt="arrow"
                                     class="step-arrow"></li>
                            <li>
                                <a target="_blank" href="https://shop.viettel.vn/sim-so/haiphong" rel="nofollow"><img
                                            src="<?php echo Yii::$app->urlManager->baseUrl ?>/images/sim-4g.png" alt="Mua hoặc đổi sim 4G"
                                            class="ef">
                                    <p class="gtitle">Mua hoặc đổi sim 4G</p></a>

                            </li>
                            <li><img src="<?php echo Yii::$app->urlManager->baseUrl ?>/images/arrow.png"
                                   alt="arrow"  class="step-arrow"></li>
                            <li>
                                <a href="#4Gpro"><img
                                            src="<?php echo Yii::$app->urlManager->baseUrl ?>/images/fee-4g.png" alt="Các gói cước 4G"
                                            class="ef">
                                    <p class="gtitle">Các gói cước 4G</p></a>

                            </li>
                        </ul>
                    </div>
                    <div class="step-block">
                        <p><a target="_blank" class="sim" href="https://shop.viettel.vn/sim-so/haiphong" rel="nofollow" title="Mua sim"><i
                                    class="fa fa-hand-o-right sim2"></i> Mua sim 4G</a></p>
                        <p><a target="_blank" class="sim" href="https://shop.viettel.vn/doi-sim-4g-ctv/haiphong" rel="nofollow"
                           title="Mua sim"><i class="fa fa-hand-o-right sim2"></i> Đổi sim
                            4G</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div id="4Gpro"></div>
        <?php $numad = 1; ?>
        <?php if (!empty($sanpham)): $count = 0; ?>
            <?php foreach ($sanpham as $index => $sanphams): ?>
                <div class="mainsec">
                    <?php if (($count == 2) && isset($adv[0])): ?>
                        <a href="<?= $adv[0]->url ?>" title="<?= $adv[0]->name ?>">
                            <img alt="<?=$adv[0]->name?>" class="width100" src="<?= Yii::$app->urlManager->baseUrl . $adv[0]->image ?>">
                        </a>
                        <div class="banner">
                            <img class="img-banner" src="<?= Yii::$app->urlManager->baseUrl ?>/images/bk2.png"
                                 title="4G" alt="4G Viettel">
                            <div class="container">
                                Các dịch vụ khác của Viettel Hải Phòng
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="container clearfix">
                        <!-- end banner -->

                        <div class="clear"></div>
                        <!---product_four_items-->

                        <!---end product_four_items-->
                        <div class="row">
                            <div class="col-lg-12 col-sm-12 col-xs-12">
                                <div class="listowl">
                                    <div class="fancy-title title-border text-align-center">

                                        <h4><a rel="" class="fontsize-22 title2 texthead" title="<?= $index ?>"
                                               href="<?= Yii::$app->urlManager->createUrl(['site/catlist', 'id' => $sanphams[0]->cat_product_id, 'path' => $sanphams[0]->catProduct->url]) ?>"><?php echo $index ?>
                                            </a>
                                        </h4>
                                        <div class="viewmore hidden-xs">
                                            <a class=" btn" title="<?= $index ?>"
                                               href="<?= Yii::$app->urlManager->createUrl(['site/catlist', 'id' => $sanphams[0]->cat_product_id, 'path' => $sanphams[0]->catProduct->url]) ?>">
                                                Xem thêm
                                            </a>
                                        </div>
                                    </div>
                                    <div class="owl-carousel owl-theme"
                                         id="product-<?php echo func::taoduongdan($index) ?>">
                                        <?php foreach ($sanphams as $indexing => $chitietsp): ?>
                                            <div class="item">

                                                <div class="itemlist">
                                                    <a target="_blank" class=" displayblock itemname style-0<?php echo ($indexing % 5) + 1 ?>"
                                                       href="<?= $chitietsp->decription ?>"><?= $chitietsp->name ?></a>
                                                    <div class="contain15">
                                                        <a class="displayblock" href="<?= $chitietsp->decription ?>" target="_blank">
                                                        <?php $code = explode("/", $chitietsp->code);
                                                        if (count($code) == 2):
                                                            ?>
                                                            <p class="special-info">Băng thông: <?= $code[0] ?></p>
                                                        <?php else: ?>
                                                            <p class="special-info"><?= $chitietsp->code ?></p>
                                                        <?php endif; ?>
                                                        <?php if ($chitietsp->sale < $chitietsp->retail) echo "<p class='pricetag'><del>" . $config['money_prefix'] . " " . number_format($chitietsp->retail, 0, '', '.') . " " . $config['money_suffix'] . " / " . $chitietsp->tag . "</del></p>"; ?>
                                                        <?php echo "<p class='pricetag'>" . $config['money_prefix'] . " " . number_format($chitietsp->sale, 0, '', '.') . " " . $config['money_suffix'] . " / " . $chitietsp->tag . "</p>" ?>
                                                        <?php if ($chitietsp->sale < $chitietsp->retail): ?>
                                                            <div class="pricetags">
                                                    <span class="pricetext">- <?php echo round(($chitietsp->retail - $chitietsp->sale) * 100 / $chitietsp->retail) ?>
                                                        %</span>
                                                            </div>
                                                        <?php endif; ?>
                                                        <?php if ($chitietsp->hot == 1): ?>
                                                            <div class="hot">
                                                                <span class="hottext">HOT</span>
                                                            </div>
                                                        <?php endif; ?>

                                                        <p class="pricetag"><?php echo \yii\helpers\Html::button('Chi tiết', ['target' => '_blank', 'class' => 'btn btn-datmua']) ?></p>
                                                        </a>
                                                        <p class="text-align-center"><span
                                                                    class="anymore">
                                                        <?php
                                                        if ($chitietsp->kieudangky == '1') {
                                                        } else {
                                                            $temp = explode(' gửi ', $chitietsp->cuphap);
                                                            echo "<span class='cuphap'><a rel='nofollow' title='Nhắn tin' href='sms://" . $temp[1] . "?body=" . urlencode($temp[0]) . "'>" . $chitietsp->cuphap . "</a></span>";
                                                        }
                                                        ?>
                                                            </span></p>

                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                    <div class="margin-top-15 visible-xs text-align-center">
                                        <a class=" btn" title="<?= $index ?>"
                                           href="<?= Yii::$app->urlManager->createUrl(['site/catlist', 'id' => $sanphams[0]->cat_product_id, 'path' => $sanphams[0]->catProduct->url]) ?>">
                                            Xem thêm
                                        </a>
                                    </div>
                                    <script>
                                        $(document).ready(function () {
                                            $("#product-<?php echo func::taoduongdan($index)?>").owlCarousel({
                                                items: 4,
                                                loop: false,
                                                nav: true,
                                                autoHeight: true,
                                                autoplay: false,
                                                margin: 10,
                                                navText: ['<i class="fa fa-angle-left fontsize-50"></i>', '<i class="fa fa-angle-right fontsize-50"></i>'],
                                                responsive: {
                                                    0: {items: 1},
                                                    480: {items: 1},
                                                    768: {items: 2},
                                                    992: {items: 3},
                                                    1200: {items: 4}
                                                }
                                            });
                                        })
                                    </script>
                                </div>
                                <?php if ($count > 1): ?>
                                    <div class="banner-wrapper">
                                        <?php for ($i = $numad; $i < $numad + 2; $i++): if (isset($adv[$i])): ?>
                                            <div class="col-xs-6 noleftpadding bottommargin-sm banner-img bottom-margin">
                                                <a class="banner-link  not-animated"
                                                   href="<?= Yii::$app->urlManager->baseUrl . $adv[$i]->url ?>"
                                                   data-animate="fadeIn<?php if ($i == $numad) echo "Left"; else if ($i == ($numad + 1)) echo "Down"; else if ($i == ($numad + 2)) echo "Right"; else echo "Up" ?>">
                                                    <img src="<?= Yii::$app->urlManager->baseUrl . $adv[$i]->image ?>"
                                                         alt="<?=$adv[$i]->name;?>">
                                                </a>
                                            </div>
                                        <?php endif;endfor; ?>
                                    </div>
                                    <?php $numad += 2; endif; ?>

                            </div>
                        </div>
                        <div class="clear"></div>


                    </div>
                </div>
                <?php $count++; endforeach; ?>
        <?php endif; ?>

        <!--advertisement-->
        <div class="section notopborder nobottomborder nomargin nopadding nobg footer-stick advertisement">
            <div class="container clearfix">
                <?php if (!empty($news)): ?>
                    <div class="tintuc">
                        <h3 style="text-align: center;text-transform: uppercase">Tin tức về Viettel Hải Phòng</h3>
                        <div class="col-md-6 col-sm-4 col-xs-12">
                            <a href="<?= Yii::$app->urlManager->createUrl(['site/news', 'id' => $news[0]->id, 'url' => $news[0]->url, 'catname' => func::taoduongdan($news[0]->catNew->name)]) ?>"
                               rel=""
                               title="<?= $news[0]->title ?>">
                                <img alt="<?= $news[0]->title ?>"
                                     src="<?= Yii::$app->urlManager->baseUrl . $news[0]->image ?>" class="width100">
                                <p class="newtitle"><?= $news[0]->title ?></p>
                            </a>
                            <p class="brief" style="color: black"><?= $news[0]->brief ?></p>
                        </div>
                        <div class="col-md-6 col-sm-8 col-xs-12" id="page">
                            <?php foreach ($news as $index => $value): ?>
                                <?php if ($index != 0): ?>
                                    <div class="row listnew" id="pagination-<?php echo $index ?>">
                                        <div class="col-sm-4 col-xs-12">
                                            <img alt="<?= $value->title ?>"
                                                 src="<?= Yii::$app->urlManager->baseUrl . $value->image ?>"
                                                 class="width100">
                                        </div>
                                        <div class="col-sm-8 col-xs-12">
                                            <p class="newtitleright"><a title="<?= $value->title ?>"
                                                                        href="<?= Yii::$app->urlManager->createUrl(['site/news', 'id' => $value->id, 'url' => $value->url, 'catname' => func::taoduongdan($value->catNew->name)]) ?>"
                                                                        rel=""><?= $value->title ?></a></p>
                                            <p class="briefright"><?= $value->brief ?></p>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                            <?php if (isset($news[0])): ?>
                                <?= \yii\helpers\Html::a('Xem thêm', Yii::$app->urlManager->createUrl(['site/listnews', 'id' => $news[0]->cat_new_id, 'catname' => \func::taoduongdan($news[0]->catNew->name)]), ['class' => 'btn width100']) ?>
                            <?php endif; ?>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                <?php endif; ?>
                <div class="fancy-title title-border title-center topmargin-sm">
                    <h4>CÁC ĐỐI TÁC CỦA VIETTEL HẢI PHÒNG</h4>
                </div>

                <!--<div id="oc-images" class="owl-carousel image-carousel">-->
                <!--<div id="oc-clients" class="owl-carousel image-carousel clients-grid grid-6 nobottommargin clearfix">-->
                <div id="oc-clients-full" class="owl-carousel image-carousel owl-theme">
                    <?php foreach ($partners as $partner): ?>
                        <a href="<?= $partner->url ?>" target="_blank" rel="nofollow" title="<?= $partner->name ?>"><img
                                    alt="<?= $partner->name ?>"
                                    src="<?= Yii::$app->urlManager->baseUrl . $partner->image ?>"></a>
                    <?php endforeach; ?>
                </div>
                <div class="col-md-5 col-xs-12 nobottommargin topmargin">
                    <a href="/collections/all"><img
                                data-lazyload-pd="<?= Yii::$app->urlManager->baseUrl ?>/images/chi-nhanh-viettel-hai-phong.jpg"
                                alt="Image" class="nobottommargin width100" src=""></a>
                    <div class="heading-block topmargin-lg margin-top60">
                        <h3><strong>Tập đoàn viễn thông quân đội Viettel - Chi nhánh Hải Phòng</strong></h3>
                        <span><?= $config['contact_address'] ?></span>
                    </div>

                    <p> Nhà cung cấp
                        dịch vụ di động, internet, truyền hình và giải pháp CNTT hàng đầu tại Hải Phòng, bao gồm: <br>
                        <i class="fa fa-caret-right"></i> Dịch vụ internet / truyền hình <strong>Cáp quang
                            Viettel</strong>.<br>
                        <i class="fa fa-caret-right"></i> Dịch vụ di động / <strong>4G</strong>.<br>
                        <i class="fa fa-caret-right"></i> <strong>Giải pháp công nghệ thông tin / phần mềm quản lý /
                            website</strong>.<br>
                        .....<br>
                        <a href="" title="Xem thêm">Xem thêm</a>
                    </p>

                    <div id="widget-subscribe-form3-result" data-notify-type="success" data-notify-msg=""></div>
                </div>
                <div class="col-md-7 col-xs-12 nobottommargin col_last">
                    <div class="topmargin-lg margin-top60">
                        <a href="javascript:void(0)"><h3><strong>Danh sách cửa hàng Viettel tại Hải Phòng</strong></h3>
                        </a>

                    </div>
                    <style>
                        #listss td h3, #listss th h3 {
                            font-size: 14px !important;
                        }
                    </style>
                    <table class='table table-hover table-bordered' id="listss">
                        <tbody>
                        <tr>
                            <td style="background: #1caf9a;text-align: center;">
                                <strong style="color: white;">STT</strong>
                            </td>
                            <td style="background: #1caf9a;text-align: center;">
                                <strong style="color: white;">TÊN CỬA HÀNG</strong>
                            </td>
                            <td style="background: #1caf9a;text-align: center;">
                                <strong style="color: white;">ĐỊA CHỈ</strong>
                            </td>

                        </tr>
                        <tr>
                            <td>
                                <h3>1</h3>
                            </td>
                            <td>
                                <h3>CHTT An Dương</h3>
                            </td>
                            <td>
                                <h3>Số nhà 79 đường 351 Thôn 4 An Dương An Dương Hải Phòng</h3>
                            </td>

                        </tr>
                        <tr>
                            <td>
                                <h3>2</h3>
                            </td>
                            <td>
                                <h3>CHTT Cát Hải</h3>
                            </td>
                            <td>
                                <h3>217 Đường 1/4 Thị trấn Cát Bà, Hải Phòng</h3>
                            </td>

                        </tr>
                        <tr>
                            <td>
                                <h3>3</h3>
                            </td>
                            <td>
                                <h3>CHTT Dương Kinh</h3>
                            </td>
                            <td>
                                <h3>Số 936 Phạm Văn Đồng, Dương Kinh, Hải Phòng</h3>
                            </td>

                        </tr>
                        <tr>
                            <td>
                                <h3>4</h3>
                            </td>
                            <td>
                                <h3>CHTT Kiến Thụy</h3>
                            </td>
                            <td>
                                <h3>80C Cầu Đen, Thị trấn Núi Đối, Kiến Thụy, Hải Phòng</h3>
                            </td>

                        </tr>
                        <tr>
                            <td>
                                <h3>5</h3>
                            </td>
                            <td>
                                <h3>CHTT Lê Chân</h3>
                            </td>
                            <td>
                                <h3>Số 295 Trần Nguyên Hãn, Lê Chân, Hải Phòng</h3>
                            </td>

                        </tr>
                        <tr>
                            <td>
                                <h3>6</h3>
                            </td>
                            <td>
                                <h3>CHTT Ngô Quyền</h3>
                            </td>
                            <td>
                                <h3>Số 2 Lạch Tray, Ngô Quyền, Hải Phòng</h3>
                            </td>

                        </tr>
                        <tr>
                            <td>
                                <h3>7</h3>
                            </td>
                            <td>
                                <h3>CHTT Hải An</h3>
                            </td>
                            <td>
                                <h3>223 Lạch tray, Ngô Quyền, Hải Phòng</h3>
                            </td>

                        </tr>
                        <tr>
                            <td>
                                <h3>8</h3>
                            </td>
                            <td>
                                <h3>CHTT Thủy Nguyên</h3>
                            </td>
                            <td>
                                <h3>145 Phố Mới, Thủy Sơn, Thủy Nguyên, HP</h3>
                            </td>

                        </tr>
                        <tr>
                            <td>
                                <h3>9</h3>
                            </td>
                            <td>
                                <h3>CHTT Tiên Lãng</h3>
                            </td>
                            <td>
                                <h3>16 khu 1 TT Tiên Lãng Tiên Lãng Hải Phòng</h3>
                            </td>

                        </tr>
                        <tr>
                            <td>
                                <h3>10</h3>
                            </td>
                            <td>
                                <h3>CHTT Đồ Sơn</h3>
                            </td>
                            <td>
                                <h3>68 Lý Thánh Tông, Vạn Sơn, Đồ Sơn, Hải Phòng</h3>
                            </td>

                        </tr>
                        <tr>
                            <td>
                                <h3>11</h3>
                            </td>
                            <td>
                                <h3>CHTT An Lão</h3>
                            </td>
                            <td>
                                <h3>32 Ngô Quyền, TT An Lão, Hải Phòng</h3>
                            </td>

                        </tr>
                        </tbody>
                    </table>


                </div>
            </div>
            <div class="container">

            </div>
        </div>
        <!--end advertisement-->
        <div class="clearfix"></div>
    </div>

</section>
