<?php
/**
 * Created by PhpStorm.
 * User: cilis
 * Date: 03-Jul-17
 * Time: 4:00 PM
 */
/** @var \common\models\News $data */

$this->context->og_type = "article";
$this->context->og_image = Yii::$app->urlManager->baseUrl . $data->image;
$this->title = $data->title;

$config = \common\models\Configure::getConfig();
$nab = Yii::$app->controller->navbar;
?>
<div class="news-container">
    <div class="content-product">
        <div class="header-navigate">
            <div class="container">
                <ul id="breadcrumb" class="breadcrumb breadcrumb-arrow">
                    <?= $nab ?>
                </ul>
            </div>
        </div>
        <div class="container">
            <div class="col-md-9 col-sm-9 col-xs-12 ">
                <div class="row">
                    <h1><strong><?php echo $data->title; ?></strong></h1>
                    <p class="info-created-at-article">
                        <i class="fa fa-calendar"></i>
                        Ngày đăng <?= $data->posted_date ?>
                        <span>
						    <i class="fa fa-eye"></i>
                            <?= $data->luotxem ?> Lượt xem</span>
                    </p>
                    <div class="fb-like"
                         data-href="<?php echo (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>"
                         data-layout="standard" data-action="like" data-size="small" data-show-faces="true"
                         data-share="true"></div>
                    <div class="info-description-article clearfix">
                        <?php echo $data->content; ?>
                    </div>
                    <div class="fb-comments"
                         data-href="<?php echo (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>"
                         data-numposts="5"></div>
                    <div class="block-related">
                        <div class="related-items-title text-font">Các tin liên quan:</div>
                        <ul class="related-items">
                            <?php foreach ($related as $value): ?>
                                <li class="related-item">
                                    <a title="<?= $value->title ?>" rel="dofollow"
                                       href="<?= Yii::$app->urlManager->createUrl(['site/news', 'catname' => $value->catNew->url, 'url' => $value->url, 'id' => $value->id]) ?>">
                                        <?= $value->title ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
                <div class="row">
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <h4 class="style-03 text-align-center color-white padding-15 noibat">
                    Các sản phẩm nổi bật
                </h4>
                <div class="margin20 noibat">
                    <?php foreach(\common\models\Page::find()->orderBy('ord asc')->limit(5)->all() as $value):?>
                        <a class="displayblock" title="<?= $value->title ?>"
                           href="<?= Yii::$app->urlManager->createUrl(['site/page','title'=>\func::taoduongdan($value->title),'id'=>$value->id]) ?>"
                           rel="">- <?=$value->title?></a>
                    <?php endforeach;?>
                </div>
                <h4 class="style-03 text-align-center color-white padding-15">
                    Dịch vụ di động
                </h4>

                <?php foreach ($goi as $index => $value): ?>

                    <div class="listnew">
                        <a title="<?= $value->name ?>"
                           href="<?= $value->decription ?>" target="_blank"
                           rel="">
                            <div class="col-xs-6 colorviettel">
                                <?php $anh = \common\models\Anhsanpham::findOne(['product_id' => $value->id]); ?>
                                <img alt="Image" src="<?php if (!is_null($anh)) echo Yii::$app->urlManager->baseUrl . $anh->image; else echo Yii::$app->urlManager->baseUrl . "/images/noimg.jpg" ?>"
                                     class="width100">
                            </div>
                            <div class="col-xs-6 ">
                                <p class="newtitleright colorviettel fontsize-22"><?= $value->name ?></p>
                                <p class="briefright"><?= $value->cuphap ?></p>
                            </div>
                        </a>
                        <div class="clearfix"></div>
                    </div>

                <?php endforeach; ?>

                <div class="clearfix"></div>
                <h4 class="style-04 text-align-center color-white padding-15  margin-top-10">
                    Tin mới
                </h4>
                <div class="owl-carousel owl-theme" id="owl-tintuc">
                    <?php foreach ($tin as $index => $value): ?>
                        <div class="item">
                            <div class="listnew">
                                <a title="<?= $value->title ?>"
                                   href="<?= Yii::$app->urlManager->createUrl(['site/news', 'catname' => func::taoduongdan($value->catNew->name), 'url' => $value->url, 'id' => $value->id]) ?>"
                                   target="_blank"
                                   rel="">
                                    <div class="col-md-12 col-sm-12 col-xs-6 colorviettel">
                                        <?php $anh = \common\models\Anhsanpham::findOne(['product_id' => $value->id]); ?>
                                        <img alt="Image" src="<?= Yii::$app->urlManager->baseUrl . $value->image ?>"
                                             class="width100">
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-6">
                                        <p class="newtitleright colorviettel margin-top-10"><?= $value->title ?></p>
                                        <p class="briefright"><?= $value->posted_date ?></p>
                                    </div>
                                </a>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="clearfix"></div>
                <div class="margin-top-15 noborder">
                    <a title="Viettel Hải Phòng" rel="" href="<?=$config["ad_news_link"]?>"><img alt="Viettel Hải Phòng" src="<?=Yii::$app->urlManager->baseUrl.$config['ad_news']?>" class="width100"></a>
                </div>
                <div class="clearfix"></div>

            </div>
        </div>
    </div>
</div>