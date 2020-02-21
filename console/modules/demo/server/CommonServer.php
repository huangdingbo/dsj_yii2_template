<?php


namespace console\modules\demo\server;


use yii\db\Query;

class CommonServer
{
    public static function insertOrUpdateData($table,$data,$dataKey = 'CaseGuid',$tableKey = 'CaseGuid'){
        $insertList = [];
        $updateList = [];
        $keyArr = [];
        foreach ($data as $item){
            echo $item[$dataKey] . PHP_EOL;
            if ((new Query())->from($table)->where([$tableKey => $item[$dataKey]])->one()){
               $updateList[] = $item;
            }else{
               $insertList[] = $item;
            }
            if (!$keyArr){
                foreach ($item as $key => $value){
                    $keyArr[] = $key;
                }
            }
        }
        \Yii::$app->db->createCommand()->batchInsert($table,$keyArr,$insertList)->execute();
        foreach ($updateList as $item){
            \Yii::$app->db->createCommand()->update($table,$item,[$tableKey => $item[$dataKey]])->execute();
        }
    }
}