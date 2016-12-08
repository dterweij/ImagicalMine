<?php
/**
 * src/pocketmine/entity/PigZombie.php
 *
 * @package default
 */




namespace pocketmine\entity;

use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\item\Item as drp;
use pocketmine\Player;

class PigZombie extends Monster
{
    const NETWORK_ID = 36;

    public $height = 2.03;
    public $width = 1.031;
    public $lenght = 1.125;


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
        return "Zombie Pigman";
    }


    /**
     *
     * @param Player  $player
     */
    public function spawnTo(Player $player)
    {
        $pk = $this->addEntityDataPacket($player);
        $pk->type = PigZombie::NETWORK_ID;

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
            drp::get(drp::ROTTEN_FLESH, 0, mt_rand(0, 1)),
        ];

        if ($this->lastDamageCause instanceof EntityDamageByEntityEvent and $this->lastDamageCause->getEntity() instanceof Player) {
            if (mt_rand(0, 199) < 5) {
                switch (mt_rand(0, 2)) {
                case 0:
                    $drops[] = drp::get(drp::GOLD_INGOT, 0, 1);
                    break;
                case 1:
                    $drops[] = drp::get(drp::GOLDEN_SWORD, 0, 1);
                    break;
                case 2:
                    $drops[] = drp::get(drp::GOLD_NUGGET, 0, 1);
                    break;
                }
            }
        }
        return $drops;
    }
}
