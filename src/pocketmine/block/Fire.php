<?php
/**
 * src/pocketmine/block/Fire.php
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
use pocketmine\level\Level;
use pocketmine\Server;

class Fire extends Flowable
{

    protected $id = self::FIRE;

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
    public function hasEntityCollision()
    {
        return true;
    }


    /**
     *
     * @return unknown
     */
    public function getName()
    {
        return "Fire Block";
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
     * @param Item    $item
     * @return unknown
     */
    public function isBreakable(Item $item)
    {
        return false;
    }


    /**
     *
     * @return unknown
     */
    public function canBeReplaced()
    {
        return true;
    }


    /**
     *
     * @param Entity  $entity
     */
    public function onEntityCollide(Entity $entity)
    {
        if (!$entity->hasEffect(Effect::FIRE_RESISTANCE)) {
            $ev = new EntityDamageByBlockEvent($this, $entity, EntityDamageEvent::CAUSE_FIRE, 1);
            $entity->attack($ev->getFinalDamage(), $ev);
        }

        $ev = new EntityCombustByBlockEvent($this, $entity, 8);
        Server::getInstance()->getPluginManager()->callEvent($ev);
        if (!$ev->isCancelled()) {
            $entity->setOnFire($ev->getDuration());
        }
    }


    /**
     *
     * @param Item    $item
     * @return unknown
     */
    public function getDrops(Item $item)
    {
        return [];
    }


    /**
     *
     * @param unknown $type
     * @return unknown
     */
    public function onUpdate($type)
    {
        if ($type === Level::BLOCK_UPDATE_NORMAL) {
            for ($s = 0; $s <= 5; ++$s) {
                $side = $this->getSide($s);
                if ($side->getId() !== self::AIR and !($side instanceof Liquid)) {
                    return false;
                }
            }
            $this->getLevel()->setBlock($this, new Air(), true);

            return Level::BLOCK_UPDATE_NORMAL;
        } elseif ($type === Level::BLOCK_UPDATE_RANDOM) {
            if ($this->getSide(0)->getId() !== self::NETHERRACK) {
                $this->getLevel()->setBlock($this, new Air(), true);

                return Level::BLOCK_UPDATE_NORMAL;
            }
        }

        return false;
    }
}
