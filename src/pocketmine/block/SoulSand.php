<?php
/**
 * src/pocketmine/block/SoulSand.php
 *
 * @package default
 */




namespace pocketmine\block;

use pocketmine\item\Tool;
use pocketmine\math\AxisAlignedBB;

class SoulSand extends Solid
{

    protected $id = self::SOUL_SAND;


    public function __construct()
    {
    }


    /**
     *
     * @return unknown
     */
    public function getName()
    {
        return "Soul Sand";
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
            $this->y + 1 - 0.125,
            $this->z + 1
        );
    }
}
