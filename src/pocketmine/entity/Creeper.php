<?php
/**
 * src/pocketmine/entity/Creeper.php
 *
 * @package default
 */




namespace pocketmine\entity;

use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\event\entity\EntityExplodeEvent;
use pocketmine\item\Item as drp;
use pocketmine\nbt\tag\IntTag;
use pocketmine\Player;

class Creeper extends Monster implements Explosive
{
    const NETWORK_ID = 33;


    public function initEntity()
    {
        $this->setMaxHealth(20);
        parent::initEntity();

        if (!isset($this->namedtag->Powered)) {
            $this->setPowered(1);
        }
    }


    /**
     *
     * @return unknown
     */
    public function getName()
    {
        return "Creeper";
    }


    /**
     *
     * @param Player  $player
     */
    public function spawnTo(Player $player)
    {
        $pk = $this->addEntityDataPacket($player);
        $pk->type = Creeper::NETWORK_ID;

        $player->dataPacket($pk);
        parent::spawnTo($player);
    }



    public function explode()
    {
        //TODO: CreeperExplodeEvent
    }


    /**
     *
     * @param unknown $value
     */
    public function setPowered($value)
    {
        $this->namedtag->Powered = new IntTag("Powered", $value);
    }


    /**
     *
     * @return unknown
     */
    public function isPowered()
    {
        return $this->namedtag["Powered"];
    }


    /**
     *
     * @return unknown
     */
    public function getDrops()
    {
        $drops = [];
        if ($this->lastDamageCause instanceof EntityDamageByEntityEvent and $this->lastDamageCause->getEntity() instanceof Player) {
            $drops = [
                drp::get(drp::GUNPOWDER, 0, mt_rand(0, 2))
            ];
        }

        if ($this->lastDamageCause instanceof EntityExplodeEvent and $this->lastDamageCause->getEntity() instanceof ChargedCreeper) {
            $drops = [
                drp::get(drp::SKULL, 4, 1)
            ];
        }

        return $drops;
    }
}
