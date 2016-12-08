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
use pocketmine\event\TranslationContainer;
use pocketmine\Player;
use pocketmine\utils\TextFormat;

class SummonCommand extends VanillaCommand
{

    public function __construct($name)
    {
        parent::__construct(
            $name,
            "%pocketmine.command.summon.description",
            "%commands.summon.usage",
            ["summon", "mob"]
        );
        $this->setPermission("pocketmine.command.summon");
    }

    public function execute(CommandSender $sender, $currentAlias, array $args)
    {
        if (!$this->testPermission($sender)) {
            return true;
        }

        if (count($args) < 5 or count($args) > 5) {
            $sender->sendMessage(new TranslationContainer("commands.generic.usage", [$this->usageMessage]));

            return false;
        }

        $name = strtolower($args[0]);

        if(isset($args[3])) { // xyz
            if(is_numeric($args[1]) and is_numeric($args[2]) and is_numeric($args[3])) {
                if(isset($args[4])) { // NBT
                    unset($args[0])
                    list($x, $y, $z, $nbt) = $args;
                } else {
                    unset($args[0])
                    list($x, $y, $z) = $args;
                }
            } else {
                $sender->sendMessage(new TranslationContainer("commands.generic.usage", [$this->usageMessage]));
            }
        } else { // If no coordinates specified
            list($x, $y, $z) = [$player->x, $player->y, $player->z];
        }

        switch(strtolower($name)) {
            case "bat":
            break;
            case "pig":
            break;
            case "sheep":
            break;
            case "cow":
            break;
            case "chicken":
            break;
            case "squid":
            break;
            case "mooshroom":
            break;
            case "ocelot":
            break;
            case "entityhorse":
            break;
            case "rabbit":
            break;
            case "villager":
            break;
            case "spider":
            break;
            case "pigman":
            case "zombiepigman":
            break;
            case "ender":
            break;
            case "wolf":
            break;
            case "snowman":
            case "snowgolem":
            break;
            case "irongolem":
            break;
            case "creeper":
            break;
            case "skeleton":
            break;
            case "zombie":
            break;
            case "bat":
            break;
            case "bat":
            break;
            case "bat":
            break;
            case "bat":
            break;
            case "bat":
            break;
            case "bat":
            break;
            case "bat":
            break;
            case "bat":
            break;
            case "bat":
            break;
        }

        return true;
    }
}
