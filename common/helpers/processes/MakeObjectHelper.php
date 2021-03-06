<?php


namespace common\helpers\processes;


use ReflectionClass;

class MakeObjectHelper
{
    public static function make($className,$params = []){

        $ref = new ReflectionClass($className);

        return $ref->newInstanceArgs($params);
    }
}