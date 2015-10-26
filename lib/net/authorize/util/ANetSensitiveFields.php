<?php
namespace net\authorize\util;

define("ANET_SENSITIVE_XMLTAGS_JSON_FILE","AuthorizedNetSensitiveTagsConfig.json");

class ANetSensitiveFields
{
    private static function getDefaulSensitiveXmlTags(){
//        return array( //format for each element: array(tag name, regex-pattern, regex-replacement)
//            array("tagName" => "cardCode","pattern" => "","replacement" => "","disableMask"=>false),
//            array("tagName" => "cardNumber","pattern" => "([^0-9]*)(\d+)(\d{4})(.*)","replacement" => "$1xxxx-$3$4","disableMask"=>false),
//            array("tagName" => "expirationDate","pattern" => "","replacement" => "","disableMask"=>false)
//        );
        return array( //format for each element: array(tag name, regex-pattern, regex-replacement)
            new SensitiveTag("cardCode"),
            new SensitiveTag("cardNumber","(\d+)(\d{4})","$1xxxx-$3$4",false),
            new SensitiveTag("expirationDate")
        );
    }
    public static function getSensitiveXmlTags(){
        $sensitiveTags = array();
        $configFilePath = dirname(__FILE__) . "/" . ANET_SENSITIVE_XMLTAGS_JSON_FILE;
        $userConfigFile = ANET_SENSITIVE_XMLTAGS_JSON_FILE;
        $presentUserConfigFile = file_exists($userConfigFile);
        if ($presentUserConfigFile) { //client config for tags
            //read list of tags(and associate regex-patterns and replacements) from .json file
            $jsonFileObejct = json_decode(file_get_contents($userConfigFile));
            $sensitiveTags = $jsonFileObejct["sensitiveTags"];
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
            $sensitiveTags = $jsonFileObejct->sensitiveTags;
            if (json_last_error() === JSON_ERROR_NONE) {
            }
            else{
                exit("ERROR: Invalid json in: " . $configFilePath  . " json_last_error_msg : " . json_last_error_msg());
            }
        }
        //Check for disableMask flag in case of client json.
        $applySensitiveTags = array();
        foreach($sensitiveTags as $sensitiveTag){
            if($sensitiveTag->disableMask){
                //skip masking continue;
            }
            else{
                array_push($applySensitiveTags,$sensitiveTag);
            }        }
        return $applySensitiveTags;
    }
}
