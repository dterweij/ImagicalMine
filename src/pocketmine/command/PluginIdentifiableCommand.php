<?php
/**
 * src/pocketmine/command/PluginIdentifiableCommand.php
 *
 * @package default
 */




namespace pocketmine\command;

interface PluginIdentifiableCommand
{

    /**
     *
     * @return \pocketmine\plugin\Plugin
     */
    public function getPlugin();
}
