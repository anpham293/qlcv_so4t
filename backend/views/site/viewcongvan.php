<?php
$arr = explode(".",$r);
if(strtolower(end($arr))=="pdf"):?>
    <iframe style="width: 100%;height: 768px"
            src="<?=Yii::$app->urlManagerFrontend->baseUrl . $r ?>"></iframe>

<?php else:?>
    <iframe style="width: 100%;height: 768px"
            src="https://view.officeapps.live.com/op/embed.aspx?src=<?= Yii::$app->request->hostName.Yii::$app->urlManagerFrontend->baseUrl . $r ?>"></iframe>

<?php endif;?>