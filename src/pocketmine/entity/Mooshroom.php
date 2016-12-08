<?php
/**
 * src/pocketmine/entity/Mooshroom.php
 *
 * @package default
 */




namespace pocketmine\entity;

use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\item\Item as drp;
use pocketmine\Player;

class Mooshroom extends Animal
{
    const NETWORK_ID = 16;

    public $height = 1.875;
    public $width = 0.891;
    public $lenght = 1.781;


    public function initEntity()
    {
        $this->setMaxHealth(10);
        parent::initEntity();
    }


    /**
     *
     * @return unknown
     */
    public function getName()
    {
        return "Mooshroom";
    }


    /**
     *
     * @param Player  $player
     */
    public function spawnTo(Player $player)
    {
        $pk = $this->addEntityDataPacket($player);
        $pk->type = Mooshroom::NETWORK_ID;

        $player->dataPacket($pk);
        parent::spawnTo($player);
    }


    /**
     *
     * @return unknown
     */
    public function getDrops()
    {
        $drops = [
            drp::get(drp::LEATHER, 0, mt_rand(0, 2))
        ];

        if ($this->getLastDamageCause() === EntityDamageEvent::CAUSE_FIRE) {
            $drops[] = drp::get(drp::COOKED_BEEF, 0, mt_rand(1, 3));
        } else {
            $drops[] = drp::get(drp::RAW_BEEF, 0, mt_rand(1, 3));
        }
        //TODO Add shearing drop red mushrooms
        return $drops;
    }
}
