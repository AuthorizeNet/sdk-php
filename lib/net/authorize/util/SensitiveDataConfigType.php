<?php
namespace net\authorize\util;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;

$type=new Type;
$serializedName=new SerializedName(array("value"=>"Loading-SerializedName-Class"));
//to do: use Doctrine\Common\Annotations\AnnotationRegistry::registerAutoloadNamespace to auto load classes

class SensitiveDataConfigType
{
	/**
     * @Type("array<net\authorize\util\SensitiveTag>")
	 * @SerializedName("sensitiveTags")
     */
	public $sensitiveTags;
	
	/**
     * @Type("array<string>")
	 * @SerializedName("sensitiveStringRegexes")
     */
	public $sensitiveStringRegexes;
}
?>