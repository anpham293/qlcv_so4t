<?php

$config = [
    'language' => 'vi',
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'HhEi4_qTtd9XGghmEOeX2M3KO6NawH9n',
        ],
    ],
];


if (!YII_ENV_TEST) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        'allowedIPs'=>['127.0.0.1',"::1",'27.72.173.170'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'allowedIPs'=>['127.0.0.1',"::1",'27.72.173.170'],
    ];
}

return $config;
