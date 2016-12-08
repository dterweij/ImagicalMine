<?php
/**
 * src/pocketmine/entity/Witch.php
 *
 * @package default
 */




namespace pocketmine\entity;

use pocketmine\Player;

class Witch extends Monster
{
    const NETWORK_ID = 45;

    public $width = 0.938;
    public $length = 0.672;
    public $height = 2.562;


    public function initEntity()
    {
        $this->setMaxHealth(26);
        parent::initEntity();
    }


    /**
     *
     * @return unknown
     */
    public function getName()
    {
        return "Witch";
    }


    /**
     *
     * @param Player  $player
     */
    public function spawnTo(Player $player)
    {
        $pk = $this->addEntityDataPacket($player);
        $pk->type = Witch::NETWORK_ID;

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
