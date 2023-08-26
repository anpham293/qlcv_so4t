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
$new = \common\models\News::find()->all();

?>

<div class="col-md-9 cotchinh col-fix-1-2  div_content_tq" id="tc-LeftDiv">
    <div class="ms-webpart-zone ms-fullWidth">
        <div id="MSOZoneCell_WebPartctl00_ctl39_g_f5619613_e2c0_4223_9f58_f2476931e3bc" class="s4-wpcell-plain ms-webpartzone-cell ms-webpart-cell-vertical ms-fullWidth ">
            <div class="ms-webpart-chrome ms-webpart-chrome-vertical ms-webpart-chrome-fullWidth ">
                <div webpartid="f5619613-e2c0-4223-9f58-f2476931e3bc" haspers="false" id="WebPartctl00_ctl39_g_f5619613_e2c0_4223_9f58_f2476931e3bc" width="100%" class="ms-WPBody noindex " allowdelete="false" allowexport="false" style="">
                    <div id="ctl00_ctl39_g_f5619613_e2c0_4223_9f58_f2476931e3bc">

                        <style>
                            .section-content ul > li::before {content: none;}
                            .newDesc {max-height: 66px;height: 66px;}
                            .paging {margin: 10px 0 10px;overflow: auto;float: right;}
                            .paging span {cursor: pointer;display: block;float: left;margin-right: 5px;padding: 4px 8px;text-decoration: none;background: #be1e2d;border: 1px solid #be1e2d;color: #FFF;overflow: visible;}
                            .paging a, .paging a:link, .paging a:visited {background: #FFF;border: 1px solid #ddd;color: #333;cursor: pointer;display: block;float: left;margin-right: 5px;padding: 4px 8px;text-decoration: none;}
                            .paging a:hover, .paging a.current {background: #be1e2d;border: 1px solid #be1e2d;color: #FFF;overflow: visible;}
                            .paging a:hover, .paging a.current {background: #be1e2d;border: 1px solid #be1e2d;color: #FFF;overflow: visible;}
                        </style>

                        <div class="col-md-12">
                            <div class="section border">
                                <div class="section-details-title">
                                    <div class="mvc-site-map">
                                        <ul id="breadcrumb" class="breadcrumb breadcrumb-arrow">
                                            <?= $nab ?>
                                        </ul>
                                    </div>
                                </div>
                                <div class="section-content">
                                    <div class="section-content padding">
                                        <div class="search-result">
                                            <div>
                                                <?php if (isset($new)): ?>
                                                    <table class="ms-listviewtable" cellspacing="0" style="border-style: None; width: 100%; border-collapse: collapse;">
                                                        <tbody id="page">
                                                        <?php foreach ($new as $index => $value): ?>
                                                            <tr id="pagination-<?php echo $index ?>" <?php if ($index > 10) echo "style='display:none'" ?>>
                                                                <td class="tdImage">
                                                                    <div class="wrapNewsImg">
                                                                        <img src="<?= Yii::$app->urlManager->baseUrl . $value->image ?>">
                                                                    </div>
                                                                </td>
                                                                <div class="clearfix"></div>
                                                                <td class="tdContent">
                                                                    <a href="<?= Yii::$app->urlManager->createUrl(['site/news', 'id' => $value->id, 'url' => $value->url, 'catname' => func::taoduongdan($value->catNew->name)]) ?>" title="<?= $value->title ?>" class="hplTitle"><?= $value->title ?></a>
                                                                    <div class="newsDatePublish">
                                                                        <?= $value->posted_date ?>
                                                                    </div>
                                                                    <div class="newDesc" style="overflow-wrap: break-word;"><?= $value->brief ?></div>
                                                                </td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                        <script>
                                                            $(document).ready(function () {
                                                                $("#page").pagination({
                                                                    pagesize: 10,
                                                                    count: <?= (count($data) - 1)?>
                                                                })
                                                            })
                                                        </script>

                                                        </tbody>
                                                    </table>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ms-clear"></div>
                </div>
            </div>
        </div>
    </div>
</div>