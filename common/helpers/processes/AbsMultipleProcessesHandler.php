<?php


namespace common\helpers\processes;



abstract class AbsMultipleProcessesHandler
{
    protected $process;

    protected $params;

    protected $pipe;

    public function __construct($process,$pipe,array $params = [])
    {
        $this->process = $process;

        $this->params = $params;

        $this->pipe = $pipe;
    }

    public abstract function execute();

    public abstract static function className();
}