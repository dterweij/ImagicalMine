<?php

/**
 * src/pocketmine/command/Selectors.php
 *
 * @package default
 */




namespace pocketmine\command;
class Selectors {
    
    private $selectors = [];
    
    /*
    This is executed when executing a command
    param @content string
    */
    
    public function parse(string $content, $sender) : string {
        $selectors = $this->selectors;
        foreach($selectors as $name => $sel) {
            $content = $sel->parse($content, $sender);
        }
        return $content;
    }
    /*
    With this, plugins will be able to register selectors give us the ability to add some easilier
    */
    public function add(string $selectorName, Selectors $select) {
        $this->selectors[$selectorName] = $select;
    }
    
    
}