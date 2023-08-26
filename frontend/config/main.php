<?php

use \yii\web\Request;
$request = new Request();
$baseUrl = str_replace('/frontend/web','',$request->baseUrl);
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'cookieValidationKey' => '[XQV155EvgFTfLJ6GrJHV]',
            'csrfParam' => '_csrf-frontend',
            'baseUrl' => $baseUrl,
        ],

        'user' => [
            'identityClass' => 'common\models\User',
//            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_frontendUser', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'PHPFRONTSESSID',
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
            'suffix'=>'.html',
            'rules' => [
                '' => 'site/index',
                '<catname>/<url>-n<id:\d+>'=>'site/news',
                '<catname>-l<id:\d+>'=>'site/listnews',
                '<catname>-vb<id:\d+>'=>'site/listvanban',
                '<name>-g<id:\d+>'=>'site/listgroup',
                '<path>-p<id:\d+>'=>'product/product',
                '<path>-br<id:\d+>'=>'product/brand',
                '<path>-s<id:\d+>'=>'product/detailproduct',
                '<title>-b<id:\d+>'=>'site/page',
                '<name>-album<id:\d+>'=>'site/album',
                'album'=>'site/listalbum',
                'thong-tin-y-te'=>'site/canhan',
                'an-sinh-xa-hoi' => 'site/dienthoai',
                'doanh-nghiep' => 'site/doanhnghiep ',
                'error'=>'site/error',
                'dang-ky-thanh-cong'=>'site/success',
                'lien-he' => 'site/contact',
                'gioi-thieu' => 'site/about',
                'tim-kiem'=>'site/search',
                '<controller:\w+>/<action:\w+>/' => '<controller>/<action>',
            ],
        ],

    ],
	'on beforeRequest' => function ($event) {
            if(Yii::$app->request->isSecureConnection){
                $url = Yii::$app->request->getAbsoluteUrl();
                $url = str_replace('https:', 'http:', $url);
                Yii::$app->getResponse()->redirect($url);
                Yii::$app->end();
            }
    },
    'params' => $params,
];
