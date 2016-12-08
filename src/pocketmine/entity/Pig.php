<?php
/**
 * src/pocketmine/entity/Pig.php
 *
 * @package default
 */




namespace pocketmine\entity;

use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\item\Item as drp;
use pocketmine\Player;

class Pig extends Animal implements Rideable
{
    const NETWORK_ID = 12;

    public $width = 0.625;
    public $height = 1;
    public $lenght = 1.5;


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
        return "Pig";
    }


    /**
     *
     * @param Player  $player
     */
    public function spawnTo(Player $player)
    {
        $pk = $this->addEntityDataPacket($player);
        $pk->type = Pig::NETWORK_ID;

        $player->dataPacket($pk);
        parent::spawnTo($player);
    }


    /**
     *
     * @return unknown
     */
    public function isBaby()
    {
        return $this->getDataFlag(self::DATA_AGEABLE_FLAGS, self::DATA_FLAG_BABY);
    }


    /**
     *
     * @return unknown
     */
    public function getDrops()
    {
        $drops = [];
        if ($this->getLastDamageCause() === EntityDamageEvent::CAUSE_FIRE) {
            $drops[] = drp::get(drp::COOKED_PORKCHOP, 0, mt_rand(1, 3));
        } else {
            $drops[] = drp::get(drp::RAW_PORKCHOP, 0, mt_rand(1, 3));
        }
        return $drops;
    }
}
