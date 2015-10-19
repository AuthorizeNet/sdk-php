<?php
namespace net\authorize\util;

define("ANET_SENSITIVE_XMLTAGS_JSON_FILE","AuthorizedNetSensitiveTags.json");

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
        if (file_exists(ANET_SENSITIVE_XMLTAGS_JSON_FILE)) {
            //read list of tags(and associate regex-patterns and replacements) from .json file
            $sensitiveTags = json_decode(file_get_contents(ANET_SENSITIVE_XMLTAGS_JSON_FILE));
        }
        else {
            // if not present, create a local file
            $sensitiveTags = self::getDefaulSensitiveXmlTags();
            file_put_contents(ANET_SENSITIVE_XMLTAGS_JSON_FILE, json_encode($sensitiveTags, JSON_PRETTY_PRINT));
        }
        $applySensitiveTags = array();
        foreach($sensitiveTags as $sensitiveTag){
            if($sensitiveTag->disableMask){
                //skip masking continue;
            }
            else{
                array_push($applySensitiveTags,$sensitiveTag);
            }
            echo "applying: "; print_r($sensitiveTag);
        }
        return $applySensitiveTags;
    }
}
