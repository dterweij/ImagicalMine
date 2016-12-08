<?php
/**
 * src/pocketmine/block/Cobweb.php
 *
 * @package default
 */




namespace pocketmine\block;

use pocketmine\entity\Entity;
use pocketmine\item\Item;
use pocketmine\item\Tool;

class Cobweb extends Flowable
{

    protected $id = self::COBWEB;


    public function __construct()
    {
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
        return "Cobweb";
    }


    /**
     *
     * @return unknown
     */
    public function getHardness()
    {
        return 4;
    }


    /**
     *
     * @return unknown
     */
    public function getToolType()
    {
        return Tool::TYPE_SWORD;
    }


    /**
     *
     * @param Entity  $entity
     */
    public function onEntityCollide(Entity $entity)
    {
        $entity->resetFallDistance();
    }


    /**
     *
     * @param Item    $item
     * @return unknown
     */
    public function getDrops(Item $item)
    {
        if ($item->isShears() || $item->isSword() >= Tool::TIER_WOODEN) {
            return [
                [Item::STRING, 0, 1]
            ];
        } else {
            return[];
        }
    }
}
