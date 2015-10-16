<?php
namespace net\authorize\util;

define ("ANET_LOG_FILES_APPEND",true);
define ("ANET_LOG_FILE","phplog");
define("ANET_LOG_DEBUG_PREFIX","DEBUG");
define("ANET_LOG_INFO_PREFIX","INFO");
define("ANET_LOG_ERROR_PREFIX","ERROR");

define('ANET_LOG_DEBUG',false);
define("ANET_LOG_INFO",true);
define("ANET_LOG_ERROR",true);

class Log
{
    private function maskSensitiveString($rawString){
        $this->debug("\n Start masking \n");
        //Tag name is compulsory, can leave patterns and repalcements blank
        $tags= array("cardCode","cardNumber","expirationDate");
        $patterns=array("","([^0-9]*)(\d+)(\d{4})(.*)","");
        $replacements=array("","$1xxxx-$3$4","");

        foreach ($patterns as $i => $inputPattern) {
            $tag=$tags[$i];
            if(!trim($inputPattern)) {
                $inputPattern = "(.+)"; //no need to mask null data
            }
            $pattern = "/<" . $tag . ">". $inputPattern ."<\/" . $tag . ">/";
            $this->debug("\npattern used: " . $pattern);

            $inputReplacement = "xxxx";
            if(trim($replacements[$i])) {
                $inputReplacement = $replacements[$i];
            }
            $replacement = "<" . $tag . ">" . $inputReplacement . "</" . $tag . ">";
            $this->debug("\nreplace string:" . $replacement);

            $patterns[$i]=$pattern;
            $replacements[$i]=$replacement;
        }
        $maskedString = preg_replace($patterns, $replacements, $rawString);
        $this->debug( "\nreplaced: " . $maskedString . "\n\n");
        return $maskedString;
    }
    private function getMasked($raw)
    {
        $messageType = gettype($raw);
        $this->debug("Mesage Raw Type: ". $messageType);
        $message="";
        if ($messageType == "string") {
            $message = $this->maskSensitiveString($raw);
        }
        return $message;
    }
    public function debug($logMessage)
    {
        if(ANET_LOG_DEBUG==1){
            echo ANET_LOG_DEBUG_PREFIX . ": " //. \net\authorize\util\Helpers::now(). ":"
                . "$logMessage" . "\n"; //print to console
        }
    }
    public function info($logMessage, $flags=FILE_APPEND){
//        echo  ANET_LOG_INFO_PREFIX . ": " . \net\authorize\util\Helpers::now() . ":" . "$logMessage" . "\n"; //print to console

        if(ANET_LOG_INFO==1) {
            //masking
            $logMessage = $this->getMasked($logMessage);
            //time reference
            $logString = ANET_LOG_INFO_PREFIX . ": " . \net\authorize\util\Helpers::now() . ":" . "$logMessage" . "\n"; //print to console

            file_put_contents(ANET_LOG_FILE, "$logString", $flags);
            echo $logString; //REMOVE
        }
    }
    public function error($logMessage, $flags=FILE_APPEND){
        if(ANET_LOG_ERROR==1) {
            //masking
            $logMessage = $this->getMasked($logMessage);
            //time reference
            $logString = ANET_LOG_ERROR_PREFIX . ": " . \net\authorize\util\Helpers::now() . ":" . "$logMessage" . "\n"; //print to console

            file_put_contents(ANET_LOG_FILE, "$logString", $flags);
            echo $logString; //REMOVE
        }
    }


}

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