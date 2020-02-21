<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/../framework/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
            'itemTable' => '{{%rbac_item}}',
            'itemChildTable' => '{{%rbac_item_child}}',
            'assignmentTable' => '{{%rbac_assignment}}',
            'ruleTable' => '{{%rbac_rule}}',
            'defaultRoles' => ['default'],
        ],
    ],
];
