<?php
/**
 * src/pocketmine/entity/ZombieVillager.php
 *
 * @package default
 */




namespace pocketmine\entity;

use pocketmine\Player;

class ZombieVillager extends Zombie
{
    public $width = 1.031;
    public $length = 0.891;
    public $height = 2.125;


    public function initEntity()
    {
        $this->setMaxHealth(20);
        parent::initEntity();
    }


    /**
     *
     * @return unknown
     */
    public function getName()
    {
        return "Zombie Villager";
    }


    /**
     *
     * @param Player  $player
     */
    public function spawnTo(Player $player)
    {
        $pk = $this->addEntityDataPacket($player);
        $pk->type = Zombie::NETWORK_ID;

        $player->dataPacket($pk);
        parent::spawnTo($player);
    }
}
