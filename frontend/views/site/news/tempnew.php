<?php foreach ($data as $index =>$value):
    if($index>=$cur && $index <=($cur+2)):
        ?>
        <li class="clearfix">
            <div class="blog-item-image">

                <a href="<?php echo Yii::$app->urlManager->createUrl(['site/news','catname'=>func::taoduongdan($value->catNew->name),'url'=>$value->url,'id'=>$value->id])?>">
                    <img src="<?= Yii::$app->urlManager->baseUrl.$value->image?>" alt="<?= $value->title?>"></a>

            </div>
            <div class="blog-item-title">
                <a href="<?php echo Yii::$app->urlManager->createUrl(['site/news','catname'=>func::taoduongdan($value->catNew->name),'url'=>$value->url,'id'=>$value->id])?>" title="<?= $value->title?>">
                    <h2><?= $value->title?></h2>
                </a>
                <p>
                    Ngày: <?= $value->posted_date?>
                </p>
                <div class="blog-content-short-description"><?= $value->brief?></div>
            </div>
        </li>
        <hr>
    <?php endif;
endforeach;
?>


<!--    Đoàn Thanh niên + Liên hiệp Phụ nữ     -->
    <div id="van-hoa">
        <?php foreach ($catnews as $index => $catnew): if($index>1):?>
            <?php  /** @var \common\models\Catnew $catnew */?>
            <div class="col-md-6 fix-with-1-3">
                <div class="section border section-chuyenmuc fix-section">
                    <div class="section-title" href="<?=$catnew->urlGenerator()?>"><?=$catnew->name?></div>
                    <div class="section-content padding-lr-10" id="tc-tindiaphuong">
                        <?php $news = \common\models\News::find()->where('active = 1 and home=1 and cat_new_id = '.$catnew->id)->limit($config['news_lastest'])->all();?>
                        <?php if(isset($news[0])): $newTemp = $news[0]; /** @var \common\models\News $newTemp */ ?>
                            <div class="media small-media">
                                <a href="<?=$newTemp->urlGenerator()?>" class="media-left"
                                   title="<?=$newTemp->title?>" _self="">
                                    <img src="<?=Yii::$app->urlManager->baseUrl.$newTemp->image?>"
                                         class="media-object">
                                </a>
                                <div class="media-body">
                                    <a href="<?=$newTemp->urlGenerator()?>" class="media-title"
                                       title="<?=$newTemp->title?>"><?=$newTemp->title?></a>
                                </div>
                                <div class="datechuyenmuc"><?=$newTemp->posted_date?></div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endif;?>
        <?php endforeach;?>

    </div>
<div class="ms-clear"></div>
