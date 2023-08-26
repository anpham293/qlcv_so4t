<?php
/**
 * Created by PhpStorm.
 * User: cilis
 * Date: 03-Jul-17
 * Time: 4:00 PM
 */

$this->context->og_type = "article";
$this->context->og_image = $data->seo_keyword;
 if($data->seo_title=="" || is_null($data->seo_title)){
    
                $this->title = $data->title;
            }
            else{
               
                $this->title = $data->seo_title;
            }

$config = \common\models\Configure::getConfig();
$nab = Yii::$app->controller->navbar;

?>

<div class="col-md-9 cotchinh col-fix-2-3  div_content_tq">
    <div class="section-content padding news-details">
        <div class="col-md-12">
            <div class="section border">
                <div class="section-details-title">
                    <div class="mvc-site-map">
                        <ul id="breadcrumb" class="breadcrumb breadcrumb-arrow">
                            <?= $nab ?>
                        </ul>
                    </div>
                </div>
                <div id="news">

                    <style type="text/css">
                        .a:visited {
                            color: #333;
                        }

                        .txt_tag {
                            display: inline;
                            background: #f1f1f1;
                            padding: 0 10px;
                            height: 20px;
                            color: #939393;
                            float: left;
                            font: 400 11px/20px arial;
                            margin: 5px 5px 0 0;
                        }

                        .txt_tag:hover {
                            background-position: initial;
                            background-image: initial;
                            background-size: initial;
                            background-attachment: initial;
                            background-origin: initial;
                            background-clip: initial;
                            background-color: rgb(226, 226, 226);
                            background-repeat: repeat;
                        }

                        .btnHidden {
                            display: none;
                        }

                        .infoUser {
                            font-weight: 700 !important;
                            font-size: 12px !important;
                        }
                    </style>

                    <div id="ctl00_ctl39_g_e20135cc_4aad_4359_9c5c_11cbb950f1c8_ctl00_panContent" class="chitiettintuc">

                        <div class="news-list-title">
                            <hr>
                                <div class="col-xs-12 col-md-12 col-sm-12">
                                    <?php echo $data->content; ?>
                                    <div class="fb-like"
                                         data-href="<?php echo (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>"
                                         data-layout="standard" data-action="like" data-size="small" data-show-faces="true"
                                         data-share="true"></div>
                                    <div class="fb-comments"
                                         data-href="<?php echo (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>"
                                         data-numposts="5"></div>
                                </div>

                            <style>
                                .section-content ul > li::before {
                                    content: none;
                                }

                                .newDesc {
                                    max-height: 66px;
                                    height: 66px;
                                }

                                .maincontainer {
                                }

                                .paginationjs {
                                    line-height: 1.6;
                                    font-size: 14px;
                                    box-sizing: initial;
                                }

                                .paginationjs:after {
                                    display: table;
                                    content: " ";
                                    clear: both;
                                }

                                .paginationjs .paginationjs-pages ul {
                                    float: right;
                                    margin: 0;
                                    padding: 0;
                                }

                                .paginationjs .paginationjs-pages ul li {
                                    margin: 2px !important;
                                    padding: 0 !important;
                                }

                                .paginationjs .paginationjs-pages li:first-child, .paginationjs .paginationjs-pages li:first-child > a {
                                    border-radius: 3px 0 0 3px;
                                }

                                .paginationjs .paginationjs-pages li {
                                    float: left;
                                    border-right: none;
                                    list-style: none;
                                }

                                .paginationjs .paginationjs-pages li > a {
                                    min-width: 26px;
                                    height: 28px;
                                    line-height: 28px;
                                    display: block;
                                    background: #fff;
                                    font-size: 14px;
                                    color: #333;
                                    text-decoration: none;
                                    text-align: center;
                                    border: 1px solid #ddd;
                                    margin-left: 0px !important;
                                    padding-top: 0px !important;
                                }

                                .paginationjs .paginationjs-pages li.disabled > a {
                                    opacity: .3;
                                }

                                .paginationjs .paginationjs-pages li:first-child, .paginationjs .paginationjs-pages li:first-child > a {
                                    border-radius: 3px 0 0 3px;
                                }

                                .paginationjs .paginationjs-pages li.active > a {
                                    height: 28px;
                                    line-height: 28px;
                                    background: #be1e2d;
                                    color: #fff;
                                    border: 1px solid #be1e2d;
                                }
                            </style>
                        </div>
                        <div class="news-list-title" style="margin: 2%!important;">
                            <div id="data-container" class="maincontainer">
                                <strong>Các tin nổi bật </strong>
                                <ul class="bullet-circle"  id="TinDaDangXemThem">
                                    <?php foreach ($tin as $index => $value): ?>
                                        <li>
                                            <a href="<?= Yii::$app->urlManager->createUrl(['site/news', 'catname' => func::taoduongdan($value->catNew->name), 'url' => $value->url, 'id' => $value->id]) ?>">
                                                <?= $value->title ?>
                                                <span class="publish-date"><?= $value->posted_date ?></span>
                                            </a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ms-clear"></div>
            </div>
        </div>
    </div>
</div>