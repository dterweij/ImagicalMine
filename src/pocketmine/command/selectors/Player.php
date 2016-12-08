<?php
/**
 * src/pocketmine/command/selectors/Player.php
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
use pocketmine\command\ConsoleCommandSender;
class Player extends Selectors {
    
    /*
    @select Select nearest
    Used when parsing the contents
    */
    public function parse(string $content, $sender) : string {
        if(!$sender instanceof ConsoleCommandSender) { // some selectors are custom
            foreach($sender->getLevel()->getPlayers() as $player){
                if($player ===! $sender) {
                    $distance = $sender->distance($player);
                    if($ld === -1 or $ld > $distance){
                        $content = str_ireplace("@p ", $player->getName() . " ", $content);
                        $ld = $distance;
                    }
				}
			}
        } else {
            $content = str_ireplace("@p ", "CONSOLE ", $content);
        }
        return $content;
    }
}