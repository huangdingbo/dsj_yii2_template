<?php


namespace console\modules\demo\controllers;


use console\modules\citizen\server\CommonServer;
use console\modules\citizen\server\GetHwyInfoServer;
use dsj\components\controllers\BgController;

class HwyInfoController extends BgController
{
    public function actionIndex(){
        return function (){
            try{
                $orignData = (new GetHwyInfoServer())->getData();

                CommonServer::insertOrUpdateData('t_123_operator_information',$orignData['Return'],'UserGuid','UserGuid');
            }catch (\Exception $e){
                throw new \Exception($e->getMessage());
            }
        };
    }
}