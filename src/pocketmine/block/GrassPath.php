<?php
/**
 * src/pocketmine/block/GrassPath.php
 *
 * @package default
 */




namespace pocketmine\block;

use pocketmine\item\Item;
use pocketmine\item\Tool;
use pocketmine\math\AxisAlignedBB;

class GrassPath extends Transparent
{

    protected $id = self::GRASS_PATH;


    public function __construct()
    {
    }


    /**
     *
     * @return unknown
     */
    public function getName()
    {
        return "Grass Path";
    }


    /**
     *
     * @return unknown
     */
    public function getToolType()
    {
        return Tool::TYPE_SHOVEL;
    }


    /**
     *
     * @return unknown
     */
    protected function recalculateBoundingBox()
    {
        return new AxisAlignedBB(
            $this->x,
            $this->y,
            $this->z,
            $this->x + 1,
            $this->y + 0.9375,
            $this->z + 1
        );
    }


    /**
     *
     * @return unknown
     */
    public function getHardness()
    {
        return 0.6;
    }


    /**
     *
     * @param Item    $item
     * @return unknown
     */
    public function getDrops(Item $item)
    {
        return [
            [Item::DIRT, 0, 1],
        ];
    }
}
