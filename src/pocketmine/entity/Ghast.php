<?php
/**
 * src/pocketmine/entity/Ghast.php
 *
 * @package default
 */




namespace pocketmine\entity;

use pocketmine\item\Item as drp;
use pocketmine\Player;

class Ghast extends Monster
{
    const NETWORK_ID = 41;

    public $width = 4.5;
    public $length = 4.5;
    public $height = 4.5;

    public static $range = 16;
    public static $speed = 0.25;
    public static $jump = 1.8;
    public static $mindist = 3;


    public function initEntity()
    {
        $this->setMaxHealth(10);
        parent::initEntity();
    }


    /**
     *
     * @return unknown
     */
    public function getName()
    {
        return "Ghast";
    }


    /**
     *
     * @param Player  $player
     */
    public function spawnTo(Player $player)
    {
        $pk = $this->addEntityDataPacket($player);
        $pk->type = Ghast::NETWORK_ID;

        $player->dataPacket($pk);
        parent::spawnTo($player);
    }


    /**
     *
     * @return unknown
     */
    public function getDrops()
    {
        return [
            drp::get(drp::GHAST_TEAR, 0, mt_rand(0, 1)),
            drp::get(drp::GUNPOWDER, 0, mt_rand(0, 2))
        ];
    }
}
