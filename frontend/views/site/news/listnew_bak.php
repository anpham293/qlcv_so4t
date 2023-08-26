<?php
/**
 * Created by PhpStorm.
 * User: cilis
 * Date: 04-Jul-17
 * Time: 11:26 AM
 */
$numitem = Yii::$app->controller->config['post_per_page'];
$this->title = $cat;
$config = \common\models\Configure::getConfig();
$nab = Yii::$app->controller->navbar;
if (isset($data[0])) $new = $data[0];
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
        <div id="content">

            <main class="padding-top-mobile">
                <div id="blog-template" class="blog-template">
                    <div class="container">
                        <div class="row">

                            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                <?php if (isset($new)): ?>
                                    <div class="row">
                                        <!-- Begin: Nội dung blog -->
                                        <div class="col-xs-12 article-fetured nopadding">
                                            <div class="anh-blog">
                                                <a href="<?php echo Yii::$app->urlManager->createUrl(['site/news', 'catname' => func::taoduongdan($new->catNew->name), 'url' => $new->url, 'id' => $new->id]) ?>">
                                                    <img
                                                            class="blog-r-image-feature"
                                                            src="<?= Yii::$app->urlManager->baseUrl . $new->image ?>"
                                                            alt="<?= $new->title ?>"></a>
                                            </div>
                                            <div class="article-title-fetured">
                                                <h2>
                                                    <a href="<?php echo Yii::$app->urlManager->createUrl(['site/news', 'catname' => func::taoduongdan($new->catNew->name), 'url' => $new->url, 'id' => $new->id]) ?>"><?= $new->title ?></a>
                                                </h2>
                                                <p class="info-created-at-article">
                                                    <i class="fa fa-calendar"></i>
                                                    Ngày đăng <?= $new->posted_date ?>
                                                    <span>
						    <i class="fa fa-eye"></i>
                                                        <?= $new->luotxem ?> Lượt xem</span>
                                                </p>
                                                <div class="blog-content-short-description"><?= $new->brief ?></div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <div class="line-hr"></div>

                                <div class="row margin-top-20 padding-top-25 border-top" id="page">

                                    <?php foreach ($data as $index => $value): ?>
                                        <?php if ($index != 0): ?>
                                            <div class="row"
                                                 id="pagination-<?php echo $index ?>" <?php if ($index > 4) echo "style='display:none'" ?>>
                                                <div class="col-xs-4">
                                                    <img alt="Image"
                                                         src="<?= Yii::$app->urlManager->baseUrl . $value->image ?>"
                                                         class="width100">
                                                </div>
                                                <div class="col-xs-8">
                                                    <p class="newtitleright"><a title="<?= $value->title ?>"
                                                                                href="<?= Yii::$app->urlManager->createUrl(['site/news', 'id' => $value->id, 'url' => $value->url, 'catname' => func::taoduongdan($value->catNew->name)]) ?>"
                                                                                rel=""><?= $value->title ?></a></p>
                                                        <p class="info-created-at-article">
                                                            <i class="fa fa-calendar"></i>
                                                            Ngày đăng <?= $value->posted_date ?>
                                                            <span>
                                                                <i class="fa fa-eye"></i>
                                                                <?= $value->luotxem ?> Lượt xem
                                                            </span>
                                                        </p>
                                                    <p class="briefright"><?= $value->brief ?></p>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; ?>

                                    <script>
                                        $(document).ready(function () {
                                            $("#page").pagination({
                                                pagesize: 4,
                                                count: <?= (count($data) - 1)?>
                                            })
                                        })
                                    </script>
                                    <div class="clearfix"></div>

                                </div>
                                <div class="row"><img class="width100" alt="Viettel Banner" title="Viettel Banner"
                                                      src="<?= Yii::$app->urlManager->baseUrl . $config['page_banner'] ?>">
                                </div>
                            </div>

                            <!--thêm if news_recent_show and -->

                            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                <div class="blog-sidebar">
                                    <h4 class="style-03 text-align-center color-white padding-15 noibat">
                                        Các sản phẩm nổi bật
                                    </h4>
                                    <div class="margin20 noibat">
                                        <?php foreach (\common\models\Page::find()->orderBy('ord asc')->limit(5)->all() as $value): ?>
                                            <a class="displayblock" title="<?= $value->title ?>"
                                               href="<?= Yii::$app->urlManager->createUrl(['site/page', 'title' => \func::taoduongdan($value->title), 'id' => $value->id]) ?>"
                                               rel="">- <?= $value->title ?></a>
                                        <?php endforeach; ?>
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
                                                    <img alt="Image"
                                                         src="<?php if (!is_null($anh)) echo Yii::$app->urlManager->baseUrl . $anh->image; else echo Yii::$app->urlManager->baseUrl . "/images/noimg.jpg" ?>"
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
                                </div>

                                <div class="margin-top-15 noborder">
                                    <a title="Viettel Hải Phòng" rel="" href="<?= $config["ad_news_link"] ?>"><img
                                                alt="Anh Viettel"
                                                src="<?= Yii::$app->urlManager->baseUrl . $config['ad_news'] ?>"
                                                class="width100"></a>
                                </div>
                                <div class="clearfix"></div>


                            </div>

                        </div>
                    </div>
                    <script>
                        var total_page = 0, cur_page = 4;
                        var curl = 'news';
                        jQuery(document).ready(function () {
                            jQuery(document).on("click", ".loadmore a", function () {
                                cur_page += 3;
                                var html_loadmore = jQuery('.btn-loading').html();
                                jQuery('.btn-loading').html("<i class='fa fa-refresh fa-spin'></i> Vui lòng đợi trong giây lát...");
                                setTimeout(function () {
                                    jQuery.ajax({
                                        url: "<?=Yii::$app->urlManager->createUrl(['site/updatenews'])?>",
                                        data: {
                                            cat: <?= $data[0]->cat_new_id?>,
                                            cur: (cur_page - 2)
                                        },
                                        type: 'post',
                                        success: function (data) {
                                            jQuery('#list-articles').append(data);
                                            jQuery('#list-articles img').imagesLoaded(function () {
                                                jQuery('.btn-loading').html(html_loadmore);
                                                jQuery(window).resize();
                                            });
                                            if (cur_page >= total_page) {
                                                jQuery('.loadmore').remove();
                                            }
                                        }
                                    });

                                }, 1000)
                            })
                        });
                    </script>
                </div>


            </main>

        </div>
    </div>
</div>
