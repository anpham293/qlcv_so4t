<?php
/**
 * Created by PhpStorm.
 * User: cilis
 * Date: 03-Jul-17
 * Time: 4:00 PM
 */

$this->context->og_type = "article";

$this->title = "Hồ sơ sức khỏe Hành Chính";
$config = \common\models\Configure::getConfig();
$nab = Yii::$app->controller->navbar;
$vbhcs = \common\models\Congvanhanhchinh::find()->all();
?>

<div class="col-md-9 cotchinh col-fix-2-3  div_content_tq">
    <div class="section-content padding news-details">
        <div class="col-md-12">
            <div class="section border">
                <div class="section-details-title">
                    <div class="header-navigate">
                        <ul id="breadcrumb" class="breadcrumb breadcrumb-arrow">
                            <?= $nab ?>
                        </ul>
                    </div>
                </div>

                <div class="clearfix"></div>

                <div class="section-title">
                    <span>Danh sách Hồ sơ sức khỏe </span>
                </div>

                <div class="section-content">
                    <div class="section-content padding">
                        <table class="table border" cellspacing="0" rules="rows" border="1" style="border-collapse: collapse;">
                            <tbody>
                            <tr>
                                <th class="textleft" scope="col">Số/ký hiệu</th>
                                <th class="textleft" scope="col">Ngày ban hành</th>
                                <th class="textleft" scope="col">Trích yếu</th>
                                <th class="textleft" scope="col">Cơ quan ban hành</th>
                                <th class="textleft" scope="col">Đính kèm</th>
                            </tr>
                            <?php foreach ($vbhcs as $index => $vbhc): ?>
                            <?php /** @var \common\models\Congvanhanhchinh $vbhc */ ?>
                            <tr id="pagination-<?php echo $index ?>" <?php if ($index > 4) echo "style='display:none'" ?>>
                                <td class="textleft" style="width: 170px;">
                                    <a target="_blank" href="#"><?= $vbhc->sokyhieu ?></a>
                                </td>
                                <td class="textleft" style="width: 150px;"><?= $vbhc->ngaybanhanh ?></td>
                                <td class="textleft" style="width: 350px;"><?= $vbhc->trichyeu ?></td>
                                <td class="textleft" style="width: 200px;"><?= $vbhc->coquanbanhanh->ten ?></td>
                                <td class="textleft" style="width: 120px;">
                                    <i class="fa fa-cloud-download"></i>
                                        <a target="_blank" data-pjax = "0" href="<?= Yii::$app->urlManager->baseUrl.$vbhc->link?>"> <i><?=explode("\congvan\\",$vbhc->link)[1]?></i></a>
                                </td>
                            </tr>
                            <?php endforeach;?>
                            <tr class="pagination-ys">
                                <td colspan="5">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td><span>1</span></td>
                                                <td><a href="?Search=VB&amp;Page=2">2</a></td>
                                                <td><a href="?Search=VB&amp;Page=3">3</a></td>
                                                <td><a href="?Search=VB&amp;Page=4">4</a></td>
                                                <td><a href="?Search=VB&amp;Page=5">5</a></td>
                                                <td><a href="?Search=VB&amp;Page=6">6</a></td>
                                                <td><a href="?Search=VB&amp;Page=2">Tiếp</a></td>
                                                <td><a href="?Search=VB&amp;Page=430">Cuối »</a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="ms-clear"></div>
            </div>
        </div>
    </div>
</div>