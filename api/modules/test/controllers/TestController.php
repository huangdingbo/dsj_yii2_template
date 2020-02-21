<?php

namespace api\modules\test\controllers;

use dsj\components\controllers\ApiController;

/**
* Default controller for the `test` module
*/
class TestController extends ApiController
{
/**
* 使用代码生成器生成的默认方法
*/
    public function actionIndex()
    {
        return ['data' => '请完成正常逻辑'];
    }
}