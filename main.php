<?php
require(__DIR__ . '/../components/func.php');
require(__DIR__ . '/../components/recaptchalib.php');
require(__DIR__ . '/../components/LunarSolarConverter.php');
require(__DIR__ . '/../components/tbszip_2.16/tbszip.php');

return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'modules' => [
        'auth' => [
            'class' => 'common\modules\auth\Module',
        ],

    ],

    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],

        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],


    ],
];
