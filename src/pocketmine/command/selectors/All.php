<?php
/**
 * src/pocketmine/command/selectors/All.php
 *
 * @package default
 */


/*
 *
 *  _                       _           _ __  __ _
 * (_)                     (_)         | |  \/  (_)
 *  _ _ __ ___   __ _  __ _ _  ___ __ _| | \  / |_ _ __   ___
 * | | '_ ` _ \ / _` |/ _` | |/ __/ _` | | |\/| | | '_ \ / _ \
 * | | | | | | | (_| | (_| | | (_| (_| | | |  | | | | | |  __/
 * |_|_| |_| |_|\__,_|\__, |_|\___\__,_|_|_|  |_|_|_| |_|\___|
 *                     __/ |
 *                    |___/
 *
 * This program is a third party build by ImagicalMine.
 *
 * PocketMine is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * @author ImagicalMine Team
 * @link http://forums.imagicalcorp.net/
 *
 *
*/

namespace pocketmine\command\selectors;
use pocketmine\command\Selectors;
use pocketmine\Server;
class All extends Selectors {
    
    /*
    @select All players of the server
    Used when parsing the contents
    */
    public function parse(string $content, $sender) : string {
        if(strpos($content, "@a")) {
            foreach(Server::getInstance()->getOnlinePlayers() as $player) {
                Server::getInstance()->dispatchCommand($sender, $content);
            }
            return "";
        } else {
            return $content;
        }
    }
}