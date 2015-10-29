<?php
namespace net\authorize\util;

define("ANET_SENSITIVE_XMLTAGS_JSON_FILE","AuthorizedNetSensitiveTagsConfig.json");

class ANetSensitiveFields
{
    private static $applySensitiveTags = NULL;
    private static $sensitiveStringRegexes = NULL;

    private static function fetchFromConfigFiles(){
        $configFilePath = dirname(__FILE__) . "/" . ANET_SENSITIVE_XMLTAGS_JSON_FILE;
        $userConfigFilePath = ANET_SENSITIVE_XMLTAGS_JSON_FILE;
        $presentUserConfigFile = file_exists($userConfigFilePath);
        if ($presentUserConfigFile) { //client config for tags
            //read list of tags(and associate regex-patterns and replacements) from .json file
            $jsonFileObejct = json_decode(file_get_contents($userConfigFilePath));
            $sensitiveTags = $jsonFileObejct->sensitiveTags;
            self::$sensitiveStringRegexes = $jsonFileObejct->sensitiveStringRegexes;
            if (json_last_error() === JSON_ERROR_NONE) {// JSON is valid
            }
            else{
                echo "ERROR: Invalid json in: " . $userConfigFilePath  . " json_last_error_msg : " . json_last_error_msg();
                $presentUserConfigFile = false;
            }
        }
        if (!$presentUserConfigFile) { //default sdk config for tags
            if(!file_exists($configFilePath)){
                exit("ERROR: No config file: " . $configFilePath);
            }
            $jsonFileObejct = json_decode(file_get_contents($configFilePath));
            file_put_contents($userConfigFilePath, json_encode($jsonFileObejct, JSON_PRETTY_PRINT));
            $sensitiveTags = $jsonFileObejct->sensitiveTags;
            self::$sensitiveStringRegexes = $jsonFileObejct->sensitiveStringRegexes;
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
