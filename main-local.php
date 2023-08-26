<?php
return [
    'components' => [
        /*'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=tpcnukco_fooddb',
            'username' => 'tpcnukco_admin',
            'password' => '+8V{Lm_ZDU1~',
            'charset' => 'utf8',
        ], */
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=ctyhungmanh',
            'username' => 'userweb',
            'password' => 'A2CmCu5zS0f3a5kI',
            'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.gmail.com',
                'username' => 'DC Tech.coltd@gmail.com',
                'password' => 'eleixammqdtnkzqv',
                'port' => '465',
                'encryption' => 'ssl',
            ],
        ],
    ],
];
