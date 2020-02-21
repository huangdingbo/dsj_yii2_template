<?php
return [
    'indexUrl' => '/index/index/index',
    //******************webuploader的配置项**************************
    'webuploader' => [
        // 后端处理图片的地址，value 是相对的地址
        'uploadUrl' => '/upload/img-upload/upload',
        // 多文件分隔符
        'delimiter' => ',',
        // 基本配置
        'baseConfig' => [
            'defaultImage' => 'http://img1.imgtn.bdimg.com/it/u=2056478505,162569476&fm=26&gp=0.jpg',
            'disableGlobalDnd' => true,
            'accept' => [
//                'title' => 'Images',
                'extensions' => 'gif,jpg,jpeg,bmp,png,mp4',
//                'mimeTypes' => 'image/*',
            ],
            'pick' => [
                'multiple' => false,
            ],
        ],
    ],
    // 图片默认上传的目录
    'imageUploadRelativePath' => '../web/upload-file/webupload',
    // 图片上传成功后，路径前缀
    'imageUploadSuccessPath' => '/web/upload-file/webupload',
    // 图片服务器的域名设置，拼接保存在数据库中的相对地址，可通过web进行展示
    'domain' => 'http://114.115.130.15:9527/dsj_mz_show/backend',
    //**************************webuploader配置结束*************************
];
