<?php
/**
 * src/pocketmine/entity/Enderman.php
 *
 * @package default
 */




namespace pocketmine\entity;

use pocketmine\Player;

class Enderman extends Monster
{
    //implements InventoryHolder{
    const NETWORK_ID = 38;

    public $height = 2.875;
    public $width = 1.094;
    public $lenght = 0.5;


    public function initEntity()
    {
        $this->setMaxHealth(40);
        parent::initEntity();
    }


    /**
     *
     * @return unknown
     */
    public function getName()
    {
        return "Enderman";
    }


    /**
     *
     * @param Player  $player
     */
    public function spawnTo(Player $player)
    {
        $pk = $this->addEntityDataPacket($player);
        $pk->type = Enderman::NETWORK_ID;

        $player->dataPacket($pk);
        parent::spawnTo($player);
    }
}
