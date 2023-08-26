<?php
/**
 * Created by PhpStorm.
 * User: anlai
 * Date: 03-Oct-17
 * Time: 1:37 PM
 */
$this->title = $title;
$this->context->og_type='website';
$config = \common\models\Configure::getConfig();
\johnitvn\ajaxcrud\CrudAsset::register($this);
?>
<div class="container back-white">
    <ol class="breadcrumb breadcrumb-arrow border-bot">
        <li><a href="<?php echo Yii::$app->urlManager->baseUrl ?>/" target="_self">Trang chủ</a></li>
        <li><i class="fa fa-angle-right"></i></li>
        <li>
            <a href="javascript:;"><?php echo $title ?></a>
        </li>
    </ol>
    <div class="contain">
        <h2 class="title"><?= $title ?></h2>
        <?php
        if ($type == "subcat"):
            ?>

            <?php
            if (!empty($data)):
                foreach ($data as $indexing => $product):
                    ?>
                    <?php if ($indexing % 4 == 0) echo "<div class='row' style='padding-bottom: 15px'>"; ?>
                    <div class="col-md-3 col-sm-6 col-xs-12 margin-top-10">
                        <div class="pin_item">
                            <div class="uk-text-center">
                                <h3 class="title"><a title="<?=$product->name?>" href="<?=Yii::$app->urlManager->createUrl(['site/product','path'=>$product->url,'id'=>$product->id])?>"><?=$product->name?></a></h3>
                            </div>
                            <div class="price"> <?php if ($product->sale < $product->retail) echo "<p class='pricetag'><del>" . $config['money_prefix'] . " " . number_format($product->retail, 0, '', '.') . " " . $config['money_suffix'] . " / " . $product->tag . "</del></p>"; ?>
                                <?php echo "<p class='pricetag'>" . $config['money_prefix'] . " " . number_format($product->sale, 0, '', '.') . " " . $config['money_suffix'] . " / " . $product->tag . "</p>" ?>
                                <?php if ($product->sale < $product->retail): ?>
                                    <div class="pricetags">
                                                    <span class="pricetext">- <?php echo round(($product->retail - $product->sale) * 100 / $product->retail) ?>
                                                        %</span>
                                    </div>
                                <?php endif; ?>



                            </div>
                            <div class="usage_time">
                                <?php $code = explode("/", $product->code);
                                if (count($code) == 2):
                                    ?>
                                    <p class="special-info">Băng thông: <?= $code[0] ?></p>
                                <?php else: ?>
                                    <p class="special-info"><?= $product->code ?></p>
                                <?php endif; ?>
                            </div>

                            <p class="text-align-center"><span
                                        class="anymore">
                                                        <?php
                                                        if ($product->kieudangky == '1') {
                                                        } else {
                                                            $temp = explode(' gửi ', $product->cuphap);
                                                            if (isset($temp[1]))
                                                                echo "<span class='cuphap neat'><a rel='nofollow' title='Nhắn tin' href='sms://" . $temp[1] . "?body=" . urlencode($temp[0]) . "'>" . $product->cuphap . "</a></span>";
                                                        }
                                                        ?>
                                                            </span></p>
                            <p class="pricetag"><?php echo \yii\helpers\Html::a('Chi tiết',Yii::$app->urlManager->createUrl(['site/product','path'=>$product->url,'id'=>$product->id]), ['target' => '_blank', 'class' => 'btn btn-success']) ?></p>
                        </div>
                    </div>
                    <?php if ($indexing % 4 == 3) echo "</div>" ?>
                    <?php
                endforeach;
                if (count($data) % 4 != 0) echo "</div>";
            endif; ?>
        <?php else: ?>
            <?php foreach ($data as $subcat): if(!empty($subcat['product'])):?>
                <div style="background: url(<?=Yii::$app->urlManager->baseUrl.$subcat['subcat']->image?>)" class="text-align-center namespacecontant"><a class="namespace" title="<?=$subcat['subcat']->name?>"
                                          href="<?= Yii::$app->urlManager->createUrl(['site/catlist', 'id' => $subcat['subcat']->id, 'path' => $subcat['subcat']->url]) ?>">
                        <?=$subcat['subcat']->name?>
                    </a></div>
                <?php
                if (!empty($subcat['product'])):
                    foreach ($subcat['product'] as $indexing => $product):
                        ?>
                        <?php if ($indexing % 4 == 0) echo "<div class='row' style='padding-bottom: 15px'>"; ?>
                        <div class="col-md-3 col-sm-6 col-xs-12 margin-top-10">
                            <div class="pin_item">
                                <div class="uk-text-center">
                                    <h3 class="title"><a title="<?=$product->name?>" href="<?=Yii::$app->urlManager->createUrl(['site/product','path'=>$product->url,'id'=>$product->id])?>"><?=$product->name?></a></h3>
                                </div>
                                <div class="price"> <?php if ($product->sale < $product->retail) echo "<p class='pricetag'><del>" . $config['money_prefix'] . " " . number_format($product->retail, 0, '', '.') . " " . $config['money_suffix'] . " / " . $product->tag . "</del></p>"; ?>
                                    <?php echo "<p class='pricetag'>" . $config['money_prefix'] . " " . number_format($product->sale, 0, '', '.') . " " . $config['money_suffix'] . " / " . $product->tag . "</p>" ?>
                                    <?php if ($product->sale < $product->retail): ?>
                                        <div class="pricetags">
                                                    <span class="pricetext">- <?php echo round(($product->retail - $product->sale) * 100 / $product->retail) ?>
                                                        %</span>
                                        </div>
                                    <?php endif; ?>



                                </div>
                                <div class="usage_time">
                                    <?php $code = explode("/", $product->code);
                                    if (count($code) == 2):
                                        ?>
                                        <p class="special-info">Băng thông: <?= $code[0] ?></p>
                                    <?php else: ?>
                                        <p class="special-info"><?= $product->code ?></p>
                                    <?php endif; ?>
                                </div>

                                <p class="text-align-center"><span
                                            class="anymore">
                                                        <?php
                                                        if ($product->kieudangky == '1') {
                                                        } else {
                                                            $temp = explode(' gửi ', $product->cuphap);
                                                            if (isset($temp[1]))
                                                                echo "<span class='cuphap neat'><a rel='nofollow' title='Nhắn tin' href='sms://" . $temp[1] . "?body=" . urlencode($temp[0]) . "'>" . $product->cuphap . "</a></span>";
                                                        }
                                                        ?>
                                                            </span></p>
                                <p class="pricetag"><?php echo \yii\helpers\Html::a('Chi tiết',Yii::$app->urlManager->createUrl(['site/product','path'=>$product->url,'id'=>$product->id]), ['target' => '_blank', 'class' => 'btn btn-success']) ?></p>
                            </div>
                        </div>
                        <?php if ($indexing % 4 == 3) echo "</div>" ?>
                        <?php
                    endforeach;
                    if (count($subcat['product']) % 4 != 0) echo "</div>";
                endif; ?>
            <?php endif; endforeach;?>
        <?php endif; ?>
    </div>
</div>

