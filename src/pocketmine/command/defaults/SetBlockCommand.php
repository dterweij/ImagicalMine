<?php

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
namespace pocketmine\command\defaults;

use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\command\ConsoleCommandSender;
use pocketmine\math\Vector3;
use pocketmine\Server;
use pocketmine\item\ItemBlock;
use pocketmine\item\Item;
use pocketmine\block\Block;
use pocketmine\level\Level;
use pocketmine\event\TranslationContainer;
use pocketmine\utils\TextFormat;

class SetBlockCommand extends VanillaCommand{
	public function __construct($name){
		parent::__construct(
			$name,
			"%pocketmine.command.setblock.description",
			"%commands.setblock.usage"
		);
		$this->setPermission("pocketmine.command.setblock");
	}
	public function execute(CommandSender $sender, $currentAlias, array $args){
		if(!$this->testPermission($sender)){
			return true;
		}
		if(!isset($args[3])) {
			$sender->sendMessage(new TranslationContainer("commands.generic.usage", [$this->usageMessage]));
		} else {
            if($sender instanceof ConsoleCommandSender) {
                $level = Server::getInstance()->getDefaultLevel();
            } else {
                $level = $sender->getLevel();
            }
			$x = $args[0];
			$y = $args[1];
			$z = $args[2];
			if(Item::fromString($args[3]) instanceof ItemBlock){
				$level->setBlock(new Vector3($x, $y, $z), new Block(Item::fromString($args[3])->getId(), Item::fromString($args[3])->getDamage()));
				Command::broadcastCommandMessage($sender, new TranslationContainer("%commands.setblock.success", [$x, $y, $z, Item::fromString($args[3])->getName()]));
			}
		}
	}
}