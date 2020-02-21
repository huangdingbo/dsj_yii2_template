<?php


namespace console\modules\demo\server;


use linslin\yii2\curl\Curl;
use yii\helpers\Json;

class GetPointByLocation
{
    private $location;

    private $data;

    private $url;

    public function setLocation($location){
        $this->location = $location;

        return $this;
    }

    public function setUrl($url){
        $this->url = $url;

        return $this;
    }

    public function getData(){
        $this->requestApi();

        return $this->data;
    }

    private function requestApi(){
        $data = (new Curl())
            ->setPostParams(['query' => $this->location])
            ->post(\Yii::$app->params['getPointByLocation'].$this->url);

        $this->data = Json::decode($data,true);
    }
}