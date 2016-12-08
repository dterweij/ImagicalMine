<?php
/**
 * src/pocketmine/entity/Spider.php
 *
 * @package default
 */




namespace pocketmine\entity;

use pocketmine\item\Item as drp;
use pocketmine\Player;

class Spider extends Monster
{
    const NETWORK_ID = 35;

    public $width = 2.062;
    public $length = 1.703;
    public $height = 0.781;


    public function initEntity()
    {
        $this->setMaxHealth(16);
        parent::initEntity();
    }


    /**
     *
     * @return unknown
     */
    public function getName()
    {
        return "Spider";
    }


    /**
     *
     * @param Player  $player
     */
    public function spawnTo(Player $player)
    {
        $pk = $this->addEntityDataPacket($player);
        $pk->type = Spider::NETWORK_ID;

        $player->dataPacket($pk);
        parent::spawnTo($player);
    }


    /**
     *
     * @return unknown
     */
    public function getDrops()
    {
        return[
            drp::get(drp::STRING, 0, mt_rand(0, 2)),
            drp::get(drp::SPIDER_EYE, 0, mt_rand(0, 1))
        ];
    }
}
