<?php


namespace Klefiu;


class Config
{
    static $configVals = [];

    public static function read($name)
    {
        return self::$configVals[$name];
    }

    public static function write($name, $value)
    {
        self::$configVals[$name] = $value;
    }

    public static function clear() {
        self::$configVals = null;
        self::$configVals = [];
    }

}