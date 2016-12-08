<?php
/**
 * src/pocketmine/entity/Wolf.php
 *
 * @package default
 */




namespace pocketmine\entity;

use pocketmine\Player;

class Wolf extends Animal implements Tameable
{
    const NETWORK_ID = 14;

    public $height = 0.969;
    public $width = 0.5;
    public $lenght = 1.594;


    public function initEntity()
    {
        $this->setMaxHealth(8); //Untamed
        parent::initEntity();
    }


    /**
     *
     * @return unknown
     */
    public function getName()
    {
        return "Wolf";
    }



    /**
     *
     * @param Player  $player
     */
    public function spawnTo(Player $player)
    {
        $pk = $this->addEntityDataPacket($player);
        $pk->type = Wolf::NETWORK_ID;

        $player->dataPacket($pk);
        parent::spawnTo($player);
    }
}
