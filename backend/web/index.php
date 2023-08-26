<?php

use common\models\Admin;
use common\models\Donvi;

defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

require('/opt/lampp/htdocs/vendor/autoload.php');
require('/opt/lampp/htdocs/vendor/yiisoft/yii2/Yii.php');
require(__DIR__ . '/../../common/config/bootstrap.php');
require(__DIR__ . '/../config/bootstrap.php');

$config = yii\helpers\ArrayHelper::merge(
    require(__DIR__ . '/../../common/config/main.php'),
    require(__DIR__ . '/../../common/config/main-local.php'),
    require(__DIR__ . '/../config/main.php'),
    require(__DIR__ . '/../config/main-local.php')
);

//(new yii\web\Application($config))->run();

(new yii\web\Application($config));
if("$_SERVER[HTTP_HOST]"=="noibo.dcvn.com.vn"){
    \Yii::$app->db->dsn = 'mysql:host=karion.com.vn;dbname=qldanoibo';
}
if(!Yii::$app->user->isGuest){
    if("$_SERVER[HTTP_HOST]"=="noibo.dcvn.com.vn"){
        \Yii::$app->db->dsn = 'mysql:host=karion.com.vn;dbname=qldanoibo';
    }
    Yii::$app->db->close();

    try {
        Yii::$app->db->open();

    }catch (Exception $e){
        Yii::$app->user->logout(true);
    }

}
Yii::$app->run();