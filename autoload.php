<?php
/**
* @deprecated since version 1.9.8
* @deprecated Always use composer generated autoload.php, by requiring vendor/autoload.php instead of autoload.php
* @deprecated require "autoload.php"; --> require "vendor/autoload.php";
*/
trigger_error('Custom autoloader is deprecated, use composer generated "vendor/autoload.php" instead of "autoload.php" .', E_USER_DEPRECATED);

/**
 * Custom SPL autoloader for the AuthorizeNet SDK
 *
 * @package AuthorizeNet
 */

spl_autoload_register(function($className) {
    static $classMap;

    if (!isset($classMap)) {
        $classMap = require __DIR__ . DIRECTORY_SEPARATOR . 'classmap.php';
    }

    if (isset($classMap[$className])) {
        include $classMap[$className];
    }
});
