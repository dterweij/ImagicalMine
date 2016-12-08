<?php
/**
 * src/pocketmine/block/StonePressurePlate.php
 *
 * @package default
 */




namespace pocketmine\block;

use pocketmine\item\Tool;
use pocketmine\entity\Living;
use pocketmine\item\Item;

class StonePressurePlate extends WoodenPressurePlate
{

    protected $id = self::STONE_PRESSURE_PLATE;

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
    public function getToolType()
    {
        return Tool::TYPE_PICKAXE;
    }


    /**
     *
     * @return unknown
     */
    public function getName()
    {
        return "Stone Pressure Plate";
    }


    /**
     *
     * @return unknown
     */
    public function getHardness()
    {
        return 0.5;
    }



    /**
     *
     * @return unknown
     */
    public function isEntityCollided()
    {
        foreach ($this->getLevel()->getChunk($this->x >> 4, $this->z >> 4)->getEntities() as $entity) {
            if ($entity instanceof Living && $this->getLevel()->getBlock($entity->getPosition()) === $this) {
                return true;
            }
        }
        return false;
    }


    /**
     *
     * @param Item    $item
     * @return unknown
     */
    public function getDrops(Item $item)
    {
        if ($item->isPickaxe()) {
            return [
                [$this->id, 0, 1]
            ];
        }
        return [];
    }
}
