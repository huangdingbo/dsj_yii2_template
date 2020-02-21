<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => '后台管理',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
        'redactor' => [
            'class' => 'yii\redactor\RedactorModule',
            'uploadDir' => './upload-file/redactor',  // 比如这里可以填写 ./uploads
            'uploadUrl' =>'/dsj_mz_show/backend/web/upload-file/redactor',
            'imageAllowExtensions'=>['jpg','png','gif','BMP','JPEG']
        ],
        //sync
        'sync' => [
            'class' => 'dsj\sync\web\Module',
        ],
        //样列模块
        'demo' => [
            'class' => 'backend\modules\demo\Module',
        ],
        //后台任务管理模块
        'bg' => [
            'class' => 'dsj\bgtask\BgModule',
        ],
        //演示数据配置模块
        'data' => [
            'class' => 'dsj\demoData\DemoDataModule',
        ],
        //后台用户管理模块
        'adminuser' => [
            'class' => 'dsj\adminuser\AdminuserModule',
        ],
        //菜单模块
        'menu' => [
            'class' => 'dsj\menu\MenuModule',
        ],
        //rbac模块
        'rbac' => [
            'class' => 'dsj\rbac\RbacModule',
        ],
        //上传模块
        'upload' => [
            'class' => 'dsj\upload\UploadModule',
        ],
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityClass' => 'dsj\adminuser\models\Adminuser',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
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
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
    ],
    'params' => $params,
    'language' => 'zh-CN',
];
