<?php
/**
 * src/pocketmine/block/Water.php
 *
 * @package default
 */




namespace pocketmine\block;

use pocketmine\entity\Entity;
use pocketmine\item\Item;
use pocketmine\Player;

class Water extends Liquid
{

    protected $id = self::WATER;

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
    public function getName()
    {
        return "Water";
    }


    /**
     *
     * @param Entity  $entity
     */
    public function onEntityCollide(Entity $entity)
    {
        $entity->resetFallDistance();
        if ($entity->fireTicks > 0) {
            $entity->extinguish();
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
