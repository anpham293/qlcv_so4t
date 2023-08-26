<?php

use \yii\web\Request;
$request = new Request();
$baseUrl = str_replace('/backend/web','/admin',$request->baseUrl);
$homeUrl = str_replace("/admin",'',$baseUrl);
require('/opt/lampp/htdocs/vendor/yexcel/Yexcel.php');
require_once('/opt/lampp/htdocs/vendor/PHPExcel/Classes/PHPExcel/IOFactory.php');
require_once('/opt/lampp/htdocs/vendor/PHPExcel/Classes/PHPExcel.php');
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
        'gridview' => [
            'class' => '\kartik\grid\Module',
            'downloadAction' => 'gridview/export/download',
            ],
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
            'baseUrl' => $baseUrl,
            'cookieValidationKey' => '[LuFYCE3t8YhPj7jxbP5t]',
        ],
        'user' => [
            'identityClass' => 'common\models\Admin',
//            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_backendUser', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'myphamsdev',
            'savePath' => sys_get_temp_dir(),
        ],
        'log' => [
            'traceLevel' => 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],

        'urlManager' => [
            'baseUrl' => $baseUrl,
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '' => 'site/index',
                'dang-nhap-admin' => 'site/login',
                '<controller:\w+>/' => '<controller>/index',
                '<controller:\w+>/<action:\w+>/' => '<controller>/<action>',

            ],
        ],
        'urlManagerFrontend'=>[
            'baseUrl' => $homeUrl,
            'enablePrettyUrl' => true,
            'class' => 'yii\web\UrlManager',
            'showScriptName'=>false,
            'hostInfo' => '/',
            'suffix'=>'.html',
            'rules' => [
                '' => 'site/index',
                '<catname>/<url>-n<id:\d+>'=>'site/news',
                '<catname>-l<id:\d+>'=>'site/listnews',
                '<path>-p<id:\d+>'=>'product/product',
                '<path>-s<id:\d+>'=>'product/detailproduct',
                '<title>-b<id:\d+>'=>'site/page',
                'error'=>'site/error',
                'lien-he' => 'site/contact',
                'gioi-thieu' => 'site/about',
                'dang-ky' => 'site/signup',
                'dang-nhap' => 'site/login',
                'thanh-toan'=>'product/payment',
                'addtocart'=>'product/addtocart',
                'cart'=>'product/giohang',
                'tim-kiem'=>'site/search',
                'action-delete'=>'product/xoagiohang',
                '<controller:\w+>/<action:\w+>/' => '<controller>/<action>',
            ],
        ],
    ],
        'on beforeRequest' => function ($event) {
            if(!Yii::$app->request->isSecureConnection){
                $url = Yii::$app->request->getAbsoluteUrl();
                $url = str_replace('http:', 'https:', $url);
                Yii::$app->getResponse()->redirect($url);
                Yii::$app->end();
            }
        },
    'params' => $params,
];
