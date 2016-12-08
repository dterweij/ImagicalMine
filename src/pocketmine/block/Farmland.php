<?php
/**
 * src/pocketmine/block/Farmland.php
 *
 * @package default
 */




namespace pocketmine\block;

use pocketmine\item\Item;
use pocketmine\item\Tool;
use pocketmine\math\AxisAlignedBB;

class Farmland extends Solid
{

    protected $id = self::FARMLAND;

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
        return "Farmland";
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
