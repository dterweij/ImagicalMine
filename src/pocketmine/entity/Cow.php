<?php
/**
 * src/pocketmine/entity/Cow.php
 *
 * @package default
 */




namespace pocketmine\entity;

use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\item\Item as drp;
use pocketmine\Player;

class Cow extends Animal
{
    const NETWORK_ID = 11;

    public $width = 0.75;
    public $height = 1.562;
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
        return "Cow";
    }


    /**
     *
     * @param Player  $player
     */
    public function spawnTo(Player $player)
    {
        $pk = $this->addEntityDataPacket($player);
        $pk->type = Cow::NETWORK_ID;

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
        $drops = [
            drp::get(drp::LEATHER, 0, mt_rand(0, 2))
        ];

        if ($this->getLastDamageCause() === EntityDamageEvent::CAUSE_FIRE) {
            $drops[] = drp::get(drp::COOKED_BEEF, 0, mt_rand(1, 3));
        } else {
            $drops[] = drp::get(drp::RAW_BEEF, 0, mt_rand(1, 3));
        }

        return $drops;
    }
}
