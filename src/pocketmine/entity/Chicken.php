<?php
/**
 * src/pocketmine/entity/Chicken.php
 *
 * @package default
 */




namespace pocketmine\entity;

use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\item\Item as drp;
use pocketmine\Player;

class Chicken extends Animal
{
    const NETWORK_ID = 10;

    public $width = 1;
    public $length = 0.5;
    public $height = 0.8;


    public function initEntity()
    {
        $this->setMaxHealth(4);
        parent::initEntity();
    }


    /**
     *
     * @return unknown
     */
    public function getName()
    {
        return "Chicken";
    }


    /**
     *
     * @param Player  $player
     */
    public function spawnTo(Player $player)
    {
        $pk = $this->addEntityDataPacket($player);
        $pk->type = Chicken::NETWORK_ID;

        $player->dataPacket($pk);
        parent::spawnTo($player);
    }



    /**
     *
     * @return unknown
     */
    public function getDrops()
    {
        $drops = [drp::get(drp::FEATHER, 0, mt_rand(0, 2))];

        if ($this->getLastDamageCause() === EntityDamageEvent::CAUSE_FIRE) {
            $drops[] = drp::get(drp::COOKED_CHICKEN, 0, mt_rand(1, 2));
        } else {
            $drops[] = drp::get(drp::RAW_CHICKEN, 0, mt_rand(1, 2));
        }
        return $drops;
    }
}
