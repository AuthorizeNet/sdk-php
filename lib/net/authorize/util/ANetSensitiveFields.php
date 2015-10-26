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
            new SensitiveTag("cardNumber","([^0-9]*)(\d+)(\d{4})(.*)","$1xxxx-$3$4",false),
            new SensitiveTag("expirationDate")
        );
    }
    public static function getSensitiveXmlTags(){
        $sensitiveTags = array();
        $configFilePath = dirname(__FILE__) . "/" . ANET_SENSITIVE_XMLTAGS_JSON_FILE;
        $userConfigFilePath = ANET_SENSITIVE_XMLTAGS_JSON_FILE;
        if (file_exists($userConfigFilePath)) { //client config for tags
            //read list of tags(and associate regex-patterns and replacements) from .json file
            $sensitiveTags = json_decode(file_get_contents($configFilePath));
            if (json_last_error() === JSON_ERROR_NONE) {// JSON is valid
            }
            else{
                echo "ERROR: Invalid json in: " . $userConfigFilePath  . " json_last_error_msg : " . json_last_error_msg();
                return self::getDefaulSensitiveXmlTags();
            }
        }
        else if (file_exists($configFilePath)) { //default sdk config for tags
            $sensitiveTags = json_decode(file_get_contents($configFilePath));
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
