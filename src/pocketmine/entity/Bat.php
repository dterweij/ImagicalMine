<?php
/**
 * src/pocketmine/entity/Bat.php
 *
 * @package default
 */




namespace pocketmine\entity;

use pocketmine\Player;

class Bat extends Animal
{
    const NETWORK_ID = 19;

    public $width = 0.469;
    public $length = 0.484;
    public $height = 0.5;

    public static $range = 16;
    public static $speed = 0.25;
    public static $jump = 1.8;
    public static $mindist = 3;


    public function initEntity()
    {
        $this->setMaxHealth(6);
        parent::initEntity();
    }


    /**
     *
     * @return unknown
     */
    public function getName()
    {
        return "Bat";
    }


    /**
     *
     * @param Player  $player
     */
    public function spawnTo(Player $player)
    {
        $pk = $this->addEntityDataPacket($player);
        $pk->type = Bat::NETWORK_ID;

        $player->dataPacket($pk);
        parent::spawnTo($player);
    }
}
