<?php


namespace console\modules\demo\server;


use DOMDocument;
use linslin\yii2\curl\Curl;
use yii\helpers\Json;

abstract class AbsGet123Server
{
    protected $data = null;

    abstract public function getParams();

    abstract public function getDataKey();

    protected function requestApi(){
        $this->data = (new Curl()) ->setOption(CURLOPT_HTTPHEADER,Array("Content-Type:text/xml; charset=utf-8"))
            ->setRawPostData($this->getParams())
            ->post(\Yii::$app->params['urlFor12345']);
    }

    protected function dealData(){
        $obj = (new DOMDocument());

        $obj->loadXML($this->data);

        $data = $obj->getElementsByTagName($this->getDataKey());

        $this->data = Json::decode($data->item(0)->nodeValue,true);
    }

    public function getData(){
        $this->requestApi();
        $this->dealData();
        return $this->data;
    }
}