<?php
/**
 * Created by PhpStorm.
 * User: cilis
 * Date: 03-Jul-17
 * Time: 4:00 PM
 */

$this->context->og_type = "article";

$this->title = $album->name_vi;
$config = \common\models\Configure::getConfig();
$nab = Yii::$app->controller->navbar;

?>

<div class="col-md-9 cotchinh col-fix-1-2  div_content_tq" id="tc-LeftDiv">
    <div class="section-details-title">
        <div id="album">
            <div class="col-md-12">
                <div class="section border">
                    <div class="mvc-site-map">
                        <ul id="breadcrumb" class="breadcrumb breadcrumb-arrow">
                            <?= $nab ?>
                        </ul>
                    </div>
                    <div class="single-content">
                        <h1 class="single-title"></h1>
                        <div id="gallery">
                            <?php foreach ($data as $value): ?>
                                <div class="img-post">
                                    <div class="img-thumb-post">
                                        <a href="<?= Yii::$app->urlManager->baseUrl . $value->image ?>">
                                            <img src="<?= Yii::$app->urlManager->baseUrl . $value->image ?>" alt="<?= $value->name ?>" style="display: block; margin: 2% auto;">
                                        </a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ms-clear"></div>
    </div>
</div>