<?php
namespace net\authorize\util;

class LogFactory
{
    private static $logger = NULL;
    public static function getLog($classType){
        if(NULL == self::$logger){
            self::$logger = new Log();
        }
        return self::$logger;
    }
}
?>