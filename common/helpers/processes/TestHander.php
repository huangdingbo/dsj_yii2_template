<?php


namespace common\helpers\processes;


class TestHander extends AbsMultipleProcessesHandler
{

    /**
     * @var $this->process console\helpers\MultipleProcessesHelper
     */
    public function execute()
    {
        var_dump($this->process->getIndex());
        var_dump($this->params[$this->process->getIndex()]);
    }

    public static function className()
    {
        return __CLASS__;
    }
}