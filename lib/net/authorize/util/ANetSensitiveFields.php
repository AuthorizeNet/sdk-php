<?php
namespace net\authorize\util;

use JMS\Serializer\SerializerBuilder;

define("ANET_SENSITIVE_XMLTAGS_JSON_FILE","AuthorizedNetSensitiveTagsConfig.json");
define("ANET_SENSITIVE_DATE_CONFIG_CLASS",'net\authorize\util\SensitiveDataConfigType');

class ANetSensitiveFields
{
    private static $applySensitiveTags = NULL;
    private static $sensitiveStringRegexes = NULL;

    private static function fetchFromConfigFiles(){
        if(!class_exists(ANET_SENSITIVE_DATE_CONFIG_CLASS))
            exit("Class (".ANET_SENSITIVE_DATE_CONFIG_CLASS.") doesn't exist; can't deserialize json; can't log. Exiting.");
        
		$serializer = SerializerBuilder::create()->build();

		$userConfigFilePath = ANET_SENSITIVE_XMLTAGS_JSON_FILE;
        $presentUserConfigFile = file_exists($userConfigFilePath);
		
        $configFilePath = dirname(__FILE__) . "/" . ANET_SENSITIVE_XMLTAGS_JSON_FILE;
        $useDefaultConfigFile = !$presentUserConfigFile;
		
        if ($presentUserConfigFile) { //client config for tags
            //read list of tags (and associated regex-patterns and replacements) from .json file
            $jsonFileData=file_get_contents($userConfigFilePath);
            $sensitiveDataConfig = $serializer->deserialize($jsonFileData, ANET_SENSITIVE_DATE_CONFIG_CLASS, 'json');
            
            $sensitiveTags = $sensitiveDataConfig->sensitiveTags;
            self::$sensitiveStringRegexes = $sensitiveDataConfig->sensitiveStringRegexes;
            
            if (json_last_error() === JSON_ERROR_NONE) {// JSON is valid
            }
            else{
                echo "ERROR: Invalid json in: " . $userConfigFilePath  . " json_last_error_msg : " . json_last_error_msg();
                $useDefaultConfigFile = true;
            }
        }
        
        if ($useDefaultConfigFile) { //default sdk config for tags
            if(!file_exists($configFilePath)){
                exit("ERROR: No config file: " . $configFilePath);
            }
            
            //read list of tags (and associated regex-patterns and replacements) from .json file
            $jsonFileData=file_get_contents($configFilePath);
            $sensitiveDataConfig = $serializer->deserialize($jsonFileData, ANET_SENSITIVE_DATE_CONFIG_CLASS, 'json');
            
            $sensitiveTags = $sensitiveDataConfig->sensitiveTags;
            self::$sensitiveStringRegexes = $sensitiveDataConfig->sensitiveStringRegexes;
            
            if (json_last_error() === JSON_ERROR_NONE) {
            }
            else{
                exit("ERROR: Invalid json in: " . $configFilePath  . " json_last_error_msg : " . json_last_error_msg());
            }
        }
        
        //Check for disableMask flag in case of client json.
        self::$applySensitiveTags = array();
        foreach($sensitiveTags as $sensitiveTag){
            if($sensitiveTag->disableMask){
                //skip masking continue;
            }
            else{
                array_push(self::$applySensitiveTags,$sensitiveTag);
            }
        }
    }
    
    public static function getSensitiveStringRegexes(){
        if(NULL == self::$sensitiveStringRegexes) {
            self::fetchFromConfigFiles();
        }
        return self::$sensitiveStringRegexes;
    }
    
    public static function getSensitiveXmlTags(){
        if(NULL == self::$applySensitiveTags) {
            self::fetchFromConfigFiles();
        }
        return self::$applySensitiveTags;
    }
}
