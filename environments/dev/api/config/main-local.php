<?php

$config = [
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '',
        ],
    ],
    'db' => [
        'class' => 'yii\db\Connection',
        // 主库的配置
        'dsn' => 'mysql:host=114.116.176.128;dbname=dsj_mz_show;port=3306',
        'username' => 'root',
        'password' => '1234',
        // 从库的通用配置
        'slaveConfig' => [
            'username' => 'root',
            'password' => '1234',
            'attributes' => [
                // 使用一个更小的连接超时
                PDO::ATTR_TIMEOUT => 10,
            ],
        ],
        // 从库的配置列表
        'slaves' => [
            ['dsn' => 'mysql:host=114.115.146.215;dbname=dsj_mz_show;port=3306'],
        ],
    ],
];

if (!YII_ENV_TEST) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
