<?php
/**
 * src/pocketmine/block/Lava.php
 *
 * @package default
 */




namespace pocketmine\block;

use pocketmine\entity\Effect;
use pocketmine\entity\Entity;
use pocketmine\event\entity\EntityCombustByBlockEvent;
use pocketmine\event\entity\EntityDamageByBlockEvent;
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\item\Item;
use pocketmine\Player;
use pocketmine\Server;

class Lava extends Liquid
{

    protected $id = self::LAVA;

    /**
     *
     * @param unknown $meta (optional)
     */
    public function __construct($meta = 0)
    {
        $this->meta = $meta;
    }


    /**
     *
     * @return unknown
     */
    public function getLightLevel()
    {
        return 15;
    }


    /**
     *
     * @return unknown
     */
    public function getName()
    {
        return "Lava";
    }


    /**
     *
     * @param Entity  $entity
     */
    public function onEntityCollide(Entity $entity)
    {
        $entity->fallDistance *= 0.5;
        if (!$entity->hasEffect(Effect::FIRE_RESISTANCE)) {
            $ev = new EntityDamageByBlockEvent($this, $entity, EntityDamageEvent::CAUSE_LAVA, 4);
            $entity->attack($ev->getFinalDamage(), $ev);
        }

        $ev = new EntityCombustByBlockEvent($this, $entity, 15);
        Server::getInstance()->getPluginManager()->callEvent($ev);
        if (!$ev->isCancelled()) {
            $entity->setOnFire($ev->getDuration());
        }

        $entity->resetFallDistance();
    }


    /**
     *
     * @param Item    $item
     * @param Block   $block
     * @param Block   $target
     * @param unknown $face
     * @param unknown $fx
     * @param unknown $fy
     * @param unknown $fz
     * @param Player  $player (optional)
     * @return unknown
     */
    public function place(Item $item, Block $block, Block $target, $face, $fx, $fy, $fz, Player $player = null)
    {
        $ret = $this->getLevel()->setBlock($this, $this, true, false);
        $this->getLevel()->scheduleUpdate($this, $this->tickRate());

        return $ret;
    }
}
