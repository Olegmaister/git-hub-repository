<?php
namespace core\helpers;

class ArrayHelper
{
    public static function keyExists($key , array $array) : bool
    {
        return array_key_exists($key,$array);
    }
}