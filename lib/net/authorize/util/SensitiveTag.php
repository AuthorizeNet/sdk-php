<?php
namespace net\authorize\util;

class SensitiveTag
{
    public $tagName;
    public $pattern;
    public $replacement;
    public $disableMask;

    public function __construct($tagName, $pattern="", $replace="",$disableMask = false){
        $this->tagName = $tagName;
        $this->pattern=$pattern;
        $this->replacement = $replace;
        $this->disableMask = $disableMask;
    }
}
?>