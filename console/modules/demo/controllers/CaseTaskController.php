<?php


namespace console\modules\demo\controllers;


use console\modules\citizen\server\CommonServer;
use console\modules\citizen\server\Get123CaseTaskServer;
use dsj\components\controllers\BgController;
use yii\db\Query;

class CaseTaskController extends BgController
{
    private $startTime;
    private $endTime;
    private $pageSize = 100;

    public function actionIndex(){
        return function (){
           try{
               $this->endTime = date('Y-m-d H:i:s');
               if (!(new Query())->from('t_123_task_list')->select('count(*) as num')->one()['num']){
                   $this->startTime = '1970-01-01 00:00:00';
                   $this->pageSize = 1;
               }else{
                   $this->startTime = date('Y-m-d H:i:s',strtotime("$this->endTime -1 day"));
                   if (date('H') == '00'){
                       $this->startTime = date('Y-m-d H:i:s',strtotime("$this->endTime -10 day"));
                   }
               }

               $total = (new Query())->from('t_123_work_order')
                   ->where(['>=','RequestDate',$this->startTime])
                   ->andWhere(['<=','RequestDate',$this->endTime])
                   ->select('count(*) as num')
                   ->one()['num'];
               $pages = ceil($total/$this->pageSize);
               (new LogHelper())->setRoute($this->route)->setData('总页数：'.$pages . '；总条数：' . $total)->write();
               for ($i=0;$i<$pages;$i++){
                   $list = (new Query())->from('t_123_work_order')
                       ->where(['>=','RequestDate',$this->startTime])
                       ->andWhere(['<=','RequestDate',$this->endTime])
                       ->select('CaseGuid')
                       ->limit($this->pageSize)
                       ->offset($i*$this->pageSize)
                       ->all();
                   foreach ($list as $item){
                       try{
                           $orignData = (new Get123CaseTaskServer())->setCaseGuid($item['CaseGuid'])->getData();
                           if (empty($orignData['Return'])){
                               continue;
                           }
                           $data = $this->dealData($orignData['Return']);

                           CommonServer::insertOrUpdateData('t_123_task_list',$data,'TaskGuid','TaskGuid');
                       }catch (\Exception $e){
                           (new LogHelper())->setRoute($this->route)->setData('id:' .$item['CaseGuid'].' 出错，错误信息：' .$e->getMessage())->write();
                           continue;
                       }
                   }
               }
           }catch (\Exception $e){
               throw new \Exception($e->getMessage());
           }
        };
    }

    private function dealData($data){
        foreach ($data as &$item){
            $item['CreateDate_day'] = date('Y-m-d',strtotime($item['CreateDate']));
            $item['CreateDate_month'] = date('Y-m',strtotime($item['CreateDate']));
            $item['CreateDate_year'] = date('Y',strtotime($item['CreateDate']));

            $item['SignInDate_day'] = date('Y-m-d',strtotime($item['SignInDate']));
            $item['SignInDate_month'] = date('Y-m',strtotime($item['SignInDate']));
            $item['SignInDate_year'] = date('Y',strtotime($item['SignInDate']));

            $item['FeedBackDate_day'] = date('Y-m-d',strtotime($item['FeedBackDate']));
            $item['FeedBackDate_month'] = date('Y-m',strtotime($item['FeedBackDate']));
            $item['FeedBackDate_year'] = date('Y',strtotime($item['FeedBackDate']));

            $item['FeedBackAllowDate_day'] = date('Y-m-d',strtotime($item['FeedBackAllowDate']));
            $item['FeedBackAllowDate_month'] = date('Y-m',strtotime($item['FeedBackAllowDate']));
            $item['FeedBackAllowDate_year'] = date('Y',strtotime($item['FeedBackAllowDate']));
        }

        return $data;
    }
}