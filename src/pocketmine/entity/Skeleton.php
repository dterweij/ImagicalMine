<?php
/**
 * src/pocketmine/entity/Skeleton.php
 *
 * @package default
 */




namespace pocketmine\entity;

use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\event\entity\EntityExplodeEvent;
use pocketmine\item\Item as drp;
use pocketmine\nbt\tag\IntTag;
use pocketmine\Player;

class Skeleton extends Monster implements ProjectileSource
{
    const NETWORK_ID = 34;

    public $height = 2;
    public $width = 0.781;
    public $lenght = 0.875;


    public function initEntity()
    {
        $this->setMaxHealth(20);
        parent::initEntity();

        if (!isset($this->namedtag->Profession)) {
            $this->setSkeletonType(1);
        }
    }


    /**
     *
     * @return unknown
     */
    public function getName()
    {
        return "Skeleton";
    }


    /**
     *
     * @param Player  $player
     */
    public function spawnTo(Player $player)
    {
        $pk = $this->addEntityDataPacket($player);
        $pk->type = Skeleton::NETWORK_ID;

        $player->dataPacket($pk);
        parent::spawnTo($player);
    }


    /**
     *
     * @param unknown $type
     */
    public function setSkeletonType($type)
    {
        $this->namedtag->SkeletonType = new IntTag("SkeletonType", $type);
    }


    /**
     *
     * @return unknown
     */
    public function getSkeletonType()
    {
        return $this->namedtag["SkeletonType"];
    }


    /**
     *
     * @return unknown
     */
    public function getDrops()
    {
        $drops = [
            drp::get(drp::ARROW, 0, mt_rand(0, 2)),
            drp::get(drp::BONE, 0, mt_rand(0, 2))
        ];

        if ($this->lastDamageCause instanceof EntityDamageByEntityEvent and $this->lastDamageCause->getEntity() instanceof Player) {
            if (mt_rand(0, 199) < 5) {
                $drops[] = drp::get(drp::BOW, 0, 1);
            }
        }

        if ($this->lastDamageCause instanceof EntityExplodeEvent and $this->lastDamageCause->getEntity() instanceof ChargedCreeper) {
            drp::get(drp::SKULL, 0, 1);
        }

        return $drops;
    }
}
