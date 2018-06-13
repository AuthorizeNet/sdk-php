<?php
namespace net\authorize\api\contract\v1;
use Symfony\Component\Yaml\Yaml;

class Mapper{
	private $classes = array();
	private $dir = "../../yml/v1/";

	function __construct() {
		$files = scandir($this->dir);
		foreach ($files as $file) {
			//echo "filename:" . $file . "\n";
			// Elementing the ..
			if($file != "." && $file != ".." ){
				$value = Yaml::parseFile($this->dir.$file);
				//var_dump($value);
				//array_push($classes, $value);
				//var_dump($classes);
				//echo $value['net\authorize\api\contract\v1\ANetApiRequestType']['properties']['merchantAuthentication']['type']."\n";
				$key = key($value);
				$this->classes[$key] = $value[$key];
				//break;
			}
		}
	}

	// public function getClass(string $classname, string $property){

	// 	if(isset($this->classes[$classname]['properties'][$property]['type'])){
	// 		return $this->classes[$classname]['properties'][$property]['type'];
	// 	}
	// 	else if ($property == "refId" || $property == "sessionToken" ){
	// 			return 'string';
	// 	}
	// 	else if ($property == "messages" ){
	// 			return 'net\authorize\api\contract\v1\MessagesType';
	// 	}
	// 	else{
	// 		echo "Error finding in YAML - ".$classname." ".$property."\n";
	// 		return 'string';
	// 	}
	// 	// return $this->classes[$classname]['properties'][$property]['type'];
	// }

	public function getClass(string $class, string $property){

		$obj = new MapperObj;


		if(isset($this->classes[$classname]['properties'][$property]['type'])){
			$className = $this->classes[$class]['properties'][$property]['type'];
            if(substr( $classname, 0, 5 ) === "array"){
                $classname = ltrim($classname, 'array<');
                $classname = rtrim($classname, '>');
                $obj->isArray = true;

                if(isset($this->classes[$classname]['properties'][$property]['xml_list']['entry_name'])){
					// echo $file."\t\t\t\t\t\t\t\t\t";
					// echo $propKey." :: ".$prop['serialized_name']." - ".$prop['xml_list']['entry_name']." - ".$prop['xml_list']['inline'];
					// echo "\n";
					$obj->isInlineArray = $this->classes[$classname]['properties'][$property]['xml_list']['inline'];
					$obj->arrayEntryname = $this->classes[$classname]['properties'][$property]['xml_list']['entry_name'];
				}
            }
            $obj->className = $className;
            $obj->isCustomDefined = stripos($className, '\\') !== false;

			return $obj;
		}
		else if(get_parent_class($classname)){
			return getClass(get_parent_class($classname), $property)
		}
		// else if ($property == "refId" || $property == "sessionToken" ){
		// 		return 'string';
		// }
		// else if ($property == "messages" ){
		// 		return 'net\authorize\api\contract\v1\MessagesType';
		// }
		else{
			echo "Error finding in YAML - ".$classname." ".$property."\n";
			$obj->className = 'string';
			return $obj;
		}
		// return $this->classes[$classname]['properties'][$property]['type'];
	}
}
//echo $classes['net\authorize\api\contract\v1\ANetApiRequestType']['properties']['merchantAuthentication']['type']."\n";

//$value = Yaml::parseFile('/*.yaml');

?>
