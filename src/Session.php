<?php

namespace Pachel\Functions;

class Session
{
    private static $ff = "pa_session";
    public static function set($key,$value){
        $_SESSION[self::$ff][$key] = $value;
    }
    public static function get($key){
        if (isset($_SESSION[self::$ff][$key])){
            return $_SESSION[self::$ff][$key];
        }
        return null;
    }
}