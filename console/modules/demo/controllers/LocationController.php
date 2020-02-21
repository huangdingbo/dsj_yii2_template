<?php


namespace console\modules\demo\controllers;


use console\modules\citizen\server\GetPointByLocation;
use dsj\components\controllers\BgController;
use dsj\components\helpers\LogHelper;
use yii\db\Query;
use yii\helpers\ArrayHelper;

/**
 * Class LocationController
 * @package console\modules\demo\controllers
 * 根据描述内容提取地理信息，转经纬度
 */
class LocationController extends BgController
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

              $total = (new Query())->from('t_123_work_order')
                  ->where(['>=','RequestDate',$this->startTime])
                  ->andWhere(['<=','RequestDate',$this->endTime])
                  ->select('count(*) as num')
                  ->one()['num'];
              $pages = ceil($total/$this->pageSize);
              (new LogHelper())->setRoute($this->route)->setData('总页数：'.$pages . '；总条数：' . $total)->write();
              echo $pages.PHP_EOL;
              for ($i=0;$i<$pages;$i++){
                  echo $i . PHP_EOL;
                  $list = (new Query())->from('t_123_work_order')
                      ->where(['>=','RequestDate',$this->startTime])
                      ->andWhere(['<=','RequestDate',$this->endTime])
                      ->select('CaseGuid,Description')
                      ->limit($this->pageSize)
                      ->offset($i*$this->pageSize)
                      ->all();

                  foreach ($list as $item){
                      try{
                          $orignData = (new GetPointByLocation())->setUrl('/poi')->setLocation($item['Description'])->getData();

                          $data = [
                              'lng' =>  ArrayHelper::getValue($orignData,'longitude',''),
                              'lat' => ArrayHelper::getValue($orignData,'latitude',''),
                              'poi' => ArrayHelper::getValue($orignData,'analysisResult',''),
                              'math_score' => ArrayHelper::getValue($orignData,'score','100')
                          ];
                          \Yii::$app->db->createCommand()->update('t_123_work_order',$data,['CaseGuid' => $item['CaseGuid']])->execute();
                      }catch (\Exception $e){
                          (new LogHelper())->setRoute($this->route)->setData('CaseGuid:' .$item['CaseGuid'].' 出错，错误信息：' .$e->getMessage())->write();
                          continue;
                      }
                  }
              }
          }catch (\Exception $e){
              throw new \Exception($e->getMessage());
          }
        };
    }
}