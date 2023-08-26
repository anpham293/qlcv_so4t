<?php
/**
 * Created by PhpStorm.
 * User: cilis
 * Date: 03-Jul-17
 * Time: 4:00 PM
 */

$this->context->og_type = "article";

$this->title = "Album ảnh";
$config = \common\models\Configure::getConfig();
$nab = Yii::$app->controller->navbar;

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
                <div class="col-md-12">
                    <?php foreach ($data as $albumchitiet): ?>
                        <div class="col-lg-6 com-md-6 col-sm-12">
                            <div class="owl-item">
                                <div class="post post-image">
                                    <div class="entry-header">
                                        <a href="<?= Yii::$app->urlManager->createUrl(['site/album', 'name' => func::taoduongdan($albumchitiet->name_vi), 'id' => $albumchitiet->id]) ?>" title="<?= $albumchitiet->name_vi ?>" rel="fancybox-qnp0">
                                            <div class="entry-thumbnail">
                                                <h3 class="entry-title nomart" style="text-align:center"><?= $albumchitiet->name_vi ?></h3>
                                                <img class="img-responsive" width="50%" height="50%" src="<?= Yii::$app->urlManager->baseUrl . $albumchitiet->image ?>" alt="<?= $albumchitiet->name_vi ?>">
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                    <div class="clearfix"></div>
                </div>
                <div class="ms-clear"></div>
            </div>
        </div>
    </div>
</div>
