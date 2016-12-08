<?php
/**
 * src/pocketmine/entity/Sheep.php
 *
 * @package default
 */




namespace pocketmine\entity;

use pocketmine\item\Item as ItemItem;
use pocketmine\Player;

class Sheep extends Animal implements Colorable
{
    const NETWORK_ID = 13;

    public $lenght = 1.484;
    public $width = 0.719;
    public $height = 1.406;


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
        return "Sheep";
    }


    /**
     *
     * @param Player  $player
     */
    public function spawnTo(Player $player)
    {
        $pk = $this->addEntityDataPacket($player);
        $pk->type = Sheep::NETWORK_ID;

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
            ItemItem::get(ItemItem::WOOL, 0, 1) //haven't found Network IDs for coloured sheeps (not wools) so can't check the color of the sheep.
        ];
    }
}
