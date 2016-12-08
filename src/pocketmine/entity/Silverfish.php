<?php
/**
 * src/pocketmine/entity/Silverfish.php
 *
 * @package default
 */




namespace pocketmine\entity;

use pocketmine\Player;

class Silverfish extends Monster
{
    const NETWORK_ID = 39;

    public $height = 0.438;
    public $width = 0.609;
    public $lenght = 1.094;


    public function initEntity()
    {
        $this->setMaxHealth(8);
        parent::initEntity();
    }


    /**
     *
     * @return unknown
     */
    public function getName()
    {
        return "Silverfish";
    }


    /**
     *
     * @param Player  $player
     */
    public function spawnTo(Player $player)
    {
        $pk = $this->addEntityDataPacket($player);
        $pk->type = Silverfish::NETWORK_ID;

        $player->dataPacket($pk);
        parent::spawnTo($player);
    }


    /**
     *
     * @return unknown
     */
    public function getDrops()
    {
        $drops = [];
        return $drops;
    }
}
