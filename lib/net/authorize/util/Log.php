<?php
namespace net\authorize\util;

use net\authorize\util\ANetSensitiveFields;

define ("ANET_LOG_FILES_APPEND",true);
define ("ANET_LOG_FILE","phplog");

define("ANET_LOG_DEBUG_PREFIX","DEBUG");
define("ANET_LOG_INFO_PREFIX","INFO");
define("ANET_LOG_WARN_PREFIX","WARN");
define("ANET_LOG_ERROR_PREFIX","ERROR");

//log levels
define('ANET_LOG_DEBUG',1);
define("ANET_LOG_INFO",2);
define("ANET_LOG_WARN",3);
define("ANET_LOG_ERROR",4);
//set level
define("ANET_LOG_LEVEL",ANET_LOG_DEBUG);

class Log
{
    private $sensitiveXmlTags = NULL;

    private function maskSensitiveXmlString($rawString){
        //Tag name is compulsory, can leave patterns and repalcements blank
//        $tags= array("cardCode","cardNumber","expirationDate");
//        $patterns=array("","([^0-9]*)(\d+)(\d{4})(.*)","");
        $patterns=array();
//        $replacements=array("","$1xxxx-$3$4","");
        $replacements=array();
        foreach ($this->sensitiveXmlTags as $i => $sensitiveTag){
            $tag = $sensitiveTag->tagName;
            $inputPattern = $sensitiveTag->pattern;
            $inputReplacement = "xxxx";

            if(!trim($inputPattern)) {
                $inputPattern = "(.+)"; //no need to mask null data
            }
            $pattern = "/<" . $tag . ">". $inputPattern ."<\/" . $tag . ">/";

            if(trim($sensitiveTag->replacement)) {
                $inputReplacement = $sensitiveTag->replacement;
            }
            $replacement = "<" . $tag . ">" . $inputReplacement . "</" . $tag . ">";

            $patterns [$i] = $pattern;
            $replacements[$i]  = $replacement;
        }
        $maskedString = preg_replace($patterns, $replacements, $rawString);
        return $maskedString;
    }
	
	private function getPropertiesInclBase($reflClass)
	{
		$properties = array();
		try {
			do {
				$curClassPropList = $reflClass->getProperties();
				foreach ($curClassPropList as $p) {
					$p->setAccessible(true);
				}
				$properties = array_merge($curClassPropList, $properties);
			} while ($reflClass = $reflClass->getParentClass());
		} catch (\ReflectionException $e) { }
		return $properties;
	}
	
	// recieves a ReflectionProperty and an object, and returns a masked object if its a sensitive field, else false
	private function checkAndMask($prop,$obj){
		foreach($this->sensitiveXmlTags as $i => $sensitiveTag)
		{
			echo "strcmp ". $prop->getName().'---'.$sensitiveTag->tagName . PHP_EOL;
			$inputPattern = "(.+)";
			$inputReplacement = "xxxx";

            if(trim($sensitiveTag->pattern)) {
                $inputPattern = $sensitiveTag->pattern;
            }
			$inputPattern='/'.$inputPattern.'/';
			
            if(trim($sensitiveTag->replacement)) {
                $inputReplacement = $sensitiveTag->replacement;
            }
			
			if(strcmp($prop->getName(),$sensitiveTag->tagName)==0)
			{
				echo '|||'.preg_replace($inputPattern,$inputReplacement,$prop->getValue($obj));
				$prop->setValue($obj,preg_replace($inputPattern,$inputReplacement,$prop->getValue($obj)));
				return $prop->getValue($obj);
			}
		}
		return false;
		// ($prop->getValue($obj))
	}
	
    private function maskSensitiveProperties ($obj)
    {
		// retrieve all properties of the passed object
		echo "here:";
        $reflectObj = new \ReflectionObject($obj);
        $props = $this->getPropertiesInclBase($reflectObj);

        foreach($props as $i => $prop){
            print_r($prop->getValue($obj));
			if(is_object($prop->getValue($obj))){
				echo "Is object".$prop->getName()."\n";
				//$prop->setValue($obj, null);
				$prop->setValue($obj, $this->maskSensitiveProperties($prop->getValue($obj)));
            }
			else if(is_array($prop->getValue($obj))){
				echo "Is array".$prop->getName()."\n";
				//$prop->setValue($obj, null);
				$newVals=array();
				foreach($prop->getValue($obj) as $i=>$arrEle)
				{
					$newVals[]=$this->maskSensitiveProperties($arrEle);
				}
				$prop->setValue($obj, $newVals);
            }
            else{
                echo "leaf value: " ; $prop->getValue($obj);
				$res=$this->checkAndMask($prop,$obj);
				if($res)
					$prop->setValue($obj, $res);
            }
        }

        echo "************************";
        print_r($obj);
        print_r('size...'.count($props));
		
        return $obj;
    }
	
    private function getMasked($raw)
    { //always returns string
        $messageType = gettype($raw);
        $message="";
        if ($messageType == "string") {
            $message = $this->maskSensitiveXmlString($raw);
        }
        else if($messageType == "object"){
			$obj = unserialize(serialize($raw));
			// deep copying objects http://stackoverflow.com/questions/185934/how-do-i-create-a-copy-of-an-object-in-php
			$message = print_r($this->maskSensitiveProperties($obj), true); //object to string
        }
        return $message;
    }
    public function debug($logMessage, $flags=FILE_APPEND)
    {
        if(ANET_LOG_DEBUG >= ANET_LOG_LEVEL){
            $this->log(ANET_LOG_DEBUG_PREFIX, $logMessage,$flags);
        }
    }
    public function info($logMessage, $flags=FILE_APPEND){
        if(ANET_LOG_INFO >= ANET_LOG_LEVEL) {
            $this->log(ANET_LOG_INFO_PREFIX, $logMessage,$flags);
        }
    }
    public function error($logMessage, $flags=FILE_APPEND){
        if(ANET_LOG_ERROR >= ANET_LOG_LEVEL) {
            $this->log(ANET_LOG_ERROR_PREFIX, $logMessage,$flags);
        }
    }
    private function log($logLevelPrefix, $logMessage, $flags){
        //masking
        $logMessage = $this->getMasked($logMessage);

        //debug_backtrace
        $fileName = 'n/a';
        $methodName = 'n/a';
        $lineNumber = 'n/a';
        $debugTrace = debug_backtrace();
        if (isset($debugTrace[1])) {
            $fileName = $debugTrace[1]['file'] ? $debugTrace[1]['file'] : 'n/a';
            $lineNumber = $debugTrace[1]['line'] ? $debugTrace[1]['line'] : 'n/a';
        }
        if (isset($debugTrace[2])) $methodName = $debugTrace[2]['function'] ? $debugTrace[2]['function'] : 'n/a';

        //Add timestamp, log level, method, file, line
        $logString = sprintf("\n %s %s : [%s] (%s : %s) - %s", \net\authorize\util\Helpers::now(), $logLevelPrefix,
            $methodName, $fileName, $lineNumber, $logMessage);
        file_put_contents(ANET_LOG_FILE, $logString, $flags);
    }
    public function __construct(){
        $this->sensitiveXmlTags = ANetSensitiveFields::getSensitiveXmlTags();
    }
}
?>