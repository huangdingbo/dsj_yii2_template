<?php


namespace console\modules\demo\controllers;


use yii\console\Controller;
use yii\db\Query;

class CaseStatusController extends Controller
{
    private $isAll = 1;
    private $startTime;
    private $endTime;
    private $pageSize = 100;

    public function actionIndex(){
        $this->endTime = date('Y-m-d H:i:s');
        if ($this->isAll == 1){
            $this->startTime = '1970-01-01 00:00:00';
        }else{
            $this->startTime = date('Y-m-d H:i:s',strtotime("$this->endTime -2 day"));
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

        for ($i=0;$i<$pages;$i++){
            $list = (new Query())->from('t_123_work_order')
                ->where(['>=','RequestDate',$this->startTime])
                ->andWhere(['<=','RequestDate',$this->endTime])
                ->select('CaseGuid,RequestDate')
                ->limit($this->pageSize)
                ->offset($i*$this->pageSize)
                ->all();
            foreach ($list as $item){
                $detailList = (new Query())->from('t_123_task_list')
                    ->where(['CaseGuid' => $item['CaseGuid']])
                    ->select('FeedBackDate,FeedBackAllowDate')
                    ->all();
                var_dump($detailList);exit;
            }
        }
//        $list = (new Query())->from('t_123_work_order as t')
//            ->leftJoin('t_123_task_list as l','t.CaseGuid = l.CaseGuid')
//            ->where(['>=','t.RequestDate',$this->startTime])
//            ->andWhere(['<=','t.RequestDate',$this->endTime])
//            ->select('t.RequestDate,l.FeedBackDate,l.FeedBackAllowDate')
//            ->limit($this->pageSize)
//
//            ->orderBy('t.id asc')
//            ->all();
//        var_dump($list);exit;
    }
}