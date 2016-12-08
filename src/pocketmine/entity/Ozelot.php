<?php
/**
 * src/pocketmine/entity/Ozelot.php
 *
 * @package default
 */




namespace pocketmine\entity;

use pocketmine\Player;

class Ozelot extends Animal implements Tameable
{
    const NETWORK_ID = 22;

    public $width = 0.312;
    public $length = 2.188;
    public $height = 0.75;

    public static $range = 10;
    public static $speed = 0.8;
    public static $jump = 1;
    public static $mindist = 10;


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
        return "Ocelot";
    }


    /**
     *
     * @param Player  $player
     */
    public function spawnTo(Player $player)
    {
        $pk = $this->addEntityDataPacket($player);
        $pk->type = Ozelot::NETWORK_ID;

        $player->dataPacket($pk);
        parent::spawnTo($player);
    }


    /**
     *
     * @return unknown
     */
    public function getDrops()
    {
        return [];
    }
}
