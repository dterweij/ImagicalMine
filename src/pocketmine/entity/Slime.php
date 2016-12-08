<?php
/**
 * src/pocketmine/entity/Slime.php
 *
 * @package default
 */




namespace pocketmine\entity;

use pocketmine\item\Item as drp;
use pocketmine\Player;

class Slime extends Living
{
    const NETWORK_ID = 37;

    const DATA_SIZE = 16;

    public $height = 2;
    public $width = 2;
    public $lenght = 2;


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
        return "Slime";
    }


    /**
     *
     * @param Player  $player
     */
    public function spawnTo(Player $player)
    {
        $pk = $this->addEntityDataPacket($player);
        $pk->type = Slime::NETWORK_ID;

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
            drp::get(drp::SLIMEBALL, 0, mt_rand(0, 2))
        ];
    }
}
