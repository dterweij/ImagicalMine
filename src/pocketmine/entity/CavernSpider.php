<?php
/**
 * src/pocketmine/entity/CavernSpider.php
 *
 * @package default
 */




namespace pocketmine\entity;

use pocketmine\item\Item as drp;
use pocketmine\Player;

class CavernSpider extends Monster
{
    const NETWORK_ID = 40;

    public $width = 1.438;
    public $length = 1.188;
    public $height = 0.547;


    public function initEntity()
    {
        $this->setMaxHealth(12);
        parent::initEntity();
    }


    /**
     *
     * @return unknown
     */
    public function getName()
    {
        return "Cave Spider";
    }


    /**
     *
     * @param Player  $player
     */
    public function spawnTo(Player $player)
    {
        $pk = $this->addEntityDataPacket($player);
        $pk->type = CavernSpider::NETWORK_ID;

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
