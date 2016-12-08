<?php
/**
 * src/pocketmine/entity/MagmaCube.php
 *
 * @package default
 */




namespace pocketmine\entity;

use pocketmine\item\Item as drp;
use pocketmine\Player;

class MagmaCube extends Living
{
    const NETWORK_ID = 42;

    public $width = 2;
    public $length = 2;
    public $height = 2;


    public function initEntity()
    {
        //$this->setMaxHealth(10); //TODO Size
        parent::initEntity();
    }


    /**
     *
     * @return unknown
     */
    public function getName()
    {
        return "Magma Cube";
    }


    /**
     *
     * @param Player  $player
     */
    public function spawnTo(Player $player)
    {
        $pk = $this->addEntityDataPacket($player);
        $pk->type = MagmaCube::NETWORK_ID;

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
            drp::get(drp::MAGMA_CREAM, 0, mt_rand(0, 2))
        ];
    }
}
