<?php
namespace net\authorize\util;

define("ANET_SENSITIVE_XMLTAGS_JSON_FILE","AuthorizedNetSensitiveTagsConfig.json");

class ANetSensitiveFields
{
    private static $sensitiveTags = NULL;
    private static $sensitiveStringRegexes = NULL;

    private static function fetchFromConfigFiles(){
        $configFilePath = dirname(__FILE__) . "/" . ANET_SENSITIVE_XMLTAGS_JSON_FILE;
        $userConfigFile = ANET_SENSITIVE_XMLTAGS_JSON_FILE;
        $presentUserConfigFile = file_exists($userConfigFile);
        if ($presentUserConfigFile) { //client config for tags
            //read list of tags(and associate regex-patterns and replacements) from .json file
            $jsonFileObejct = json_decode(file_get_contents($userConfigFile));
            self::$sensitiveTags = $jsonFileObejct->sensitiveTags;
            self::$sensitiveStringRegexes = $jsonFileObejct->sensitiveStringRegexes;
            if (json_last_error() === JSON_ERROR_NONE) {// JSON is valid
            }
            else{
                echo "ERROR: Invalid json in: " . $userConfigFile  . " json_last_error_msg : " . json_last_error_msg();
                $presentUserConfigFile = false;
            }
        }
        if (!$presentUserConfigFile) { //default sdk config for tags
            if(!file_exists($configFilePath)){
                exit("ERROR: No config file: " . $configFilePath);
            }
            $jsonFileObejct = json_decode(file_get_contents($configFilePath));
            self::$sensitiveTags = $jsonFileObejct->sensitiveTags;
            self::$sensitiveStringRegexes = $jsonFileObejct->sensitiveStringRegexes;
            if (json_last_error() === JSON_ERROR_NONE) {
            }
            else{
                exit("ERROR: Invalid json in: " . $configFilePath  . " json_last_error_msg : " . json_last_error_msg());
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
        if(NULL == self::$sensitiveTags) {
            self::fetchFromConfigFiles();
        }
        return self::$sensitiveTags;
    }
}
