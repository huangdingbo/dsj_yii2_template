<?php


namespace console\controllers;

use dsj\bgtask\models\BgTask;
use dsj\components\helpers\CommandHelper;
use dsj\components\helpers\LogHelper;
use yii\console\Controller;
use yii\console\ExitCode;

/**
 * Class MainController
 * @package console\controllers
 * 主进程
 *
 */
class MainController extends  Controller
{
    protected $interval = 10;

    public $project = null;

    public function options($actionID)
    {
        return ['project'];
    }

    public function optionAliases()
    {
        return ['p' => 'project'];
    }

    public function actionIndex(){
        //检查主进程是否在运行,在运行就退出
        if (CommandHelper::getInstance()->checkMainIsRun()){
            return ExitCode::OK;
        }

        while (1){
            $model = new BgTask();
            //执行需要执行的任务列表
            $this->execute($model->getNeedExecList());
            sleep($this->interval);
        }
    }

    protected function execute($list){
        foreach ($list as $item){
            try{
                CommandHelper::getInstance()->setCommand('php yii ' . $item['program'])->execYiiAsBack();
                \Yii::$app->manager_db->createCommand()->update('bg_task',['pid' => CommandHelper::getInstance()->getPid()],['id' => $item['id']])->execute();
                (new LogHelper())->setRoute($this->route)->setFileName('main_run.txt')->setData('执行命令:' . 'php yii ' . $item['program'])->write();
            }catch (\Exception $e){
                (new LogHelper())->setRoute($this->route)->setFileName('main_error.txt')->setData($e->getMessage())->write();
                continue;
            }
        }
    }
}