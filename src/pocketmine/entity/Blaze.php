<?php
/**
 * src/pocketmine/entity/Blaze.php
 *
 * @package default
 */




namespace pocketmine\entity;

use pocketmine\Player;
use pocketmine\item\Item as drp;

class Blaze extends Monster
{
    const NETWORK_ID = 43;

    public $height = 1.5;
    public $width = 1.25;
    public $lenght = 0.906;


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
        return "Blaze";
    }


    /**
     *
     * @param Player  $player
     */
    public function spawnTo(Player $player)
    {
        $pk = $this->addEntityDataPacket($player);
        $pk->type = Blaze::NETWORK_ID;

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
            drp::get(drp::BLAZE_ROD, 0, mt_rand(0, 1))
        ];
    }
}
