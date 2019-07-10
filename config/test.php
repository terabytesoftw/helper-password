<?php

/**
 * Web application configuration shared by all test types
 */

$helperpassword = require __DIR__ . '/helperpassword.php';

$params = $helperpassword ?? [];

$config = [
    'id' => 'helper-password',
    'aliases' => [
        '@bower'   => '@root/node_modules',
        '@npm'   => '@root/node_modules',
        '@public' => '@root/tests/public',
        '@runtime' => '@root/tests/public/@runtime',
        '@terabytesoft/mailer/user' => '@root/src',
    ],
    'basePath' => '@root/src',
    'bootstrap' => ['log'],
    'components' => [
        'log' => [
            'traceLevel' => 'YII_DEBUG' ? 3 : 0,
            'targets' => [
                [
                    'class' => \yii\log\FileTarget::class,
                    'levels' => ['error', 'warning', 'info'],
                    'logFile' => '@runtime/logs/app.log',
                ],
            ],
        ],
    ],
    'params' => $params,
];

return $config;
