<?php


namespace console\modules\demo\controllers;

use console\modules\citizen\server\CommonServer;
use console\modules\citizen\server\Get123WorkOrderServer;
use dsj\components\controllers\BgController;
use dsj\components\helpers\LogHelper;
use yii\db\Query;

class WorkOrderController extends BgController
{
    private $startTime;
    private $endTime;
    private $pageSize = 100;

    public function actionIndex(){
        return function (){
            try{
                $this->endTime = date('Y-m-d H:i:s');
                if (!(new Query())->from('t_123_work_order')->select('count(*) as num')->one()['num']){
                    $this->startTime = '1970-01-01 00:00:00';
                    $this->pageSize = 1;
                }else{
                    $this->startTime = date('Y-m-d H:i:s',strtotime("$this->endTime -1 day"));
                    if (date('H') == '00'){
                        $this->startTime = date('Y-m-d H:i:s',strtotime("$this->endTime -10 day"));
                    }
                }
                $pageInfo = (new Get123WorkOrderServer())
                    ->setStartDate($this->startTime)
                    ->setEndDate($this->endTime)
                    ->setPageSize($this->pageSize)
                    ->setPage(1)
                    ->getData();
                $pages = $pageInfo['TotalPageCount'];
                $total = $pageInfo['TotalNumCount'];
                (new LogHelper())->setRoute($this->route)->setData('总页数：'.$pages . '；总条数：' . $total)->write();
                for ($i = 1;$i <= $pages;$i++){
                    try{
                        $originalData = (new Get123WorkOrderServer())
                            ->setStartDate($this->startTime)
                            ->setEndDate($this->endTime)
                            ->setPageSize($this->pageSize)
                            ->setPage($i)
                            ->getData();
                        $data = $this->dealData($originalData['Return']);
                        CommonServer::insertOrUpdateData('t_123_work_order',$data);
                    }catch (\Exception $e){
                        (new LogHelper())->setRoute($this->route)->setData('第' .$i.'页出错，错误信息：' .$e->getMessage())->write();
                        continue;
                    }

                }
            }catch (\Exception $e){
                throw new \Exception($e->getMessage());
            }
        };
    }

    private function dealData($data){
        foreach ($data as &$item){
            $item['RequestDate_day'] = date('Y-m-d',strtotime($item['RequestDate']));
            $item['RequestDate_month'] = date('Y-m',strtotime($item['RequestDate']));
            $item['RequestDate_year'] = date('Y',strtotime($item['RequestDate']));

            $item['AnswerDate_day'] = date('Y-m-d',strtotime($item['AnswerDate']));
            $item['AnswerDate_month'] = date('Y-m',strtotime($item['AnswerDate']));
            $item['AnswerDate_year'] = date('Y',strtotime($item['AnswerDate']));
        }

        return $data;
    }
}