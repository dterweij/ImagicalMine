<?php
/**
 * src/pocketmine/block/SlimeBlock.php
 *
 * @package default
 */




namespace pocketmine\block;

use pocketmine\math\AxisAlignedBB;

class SlimeBlock extends Transparent
{

    protected $id = self::SLIME_BLOCK;


    public function __construct()
    {
    }


    /**
     *
     * @return unknown
     */
    public function getName()
    {
        return "Slime Block";
    }


    /**
     *
     * @return unknown
     */
    public function getHardness()
    {
        return 0.1;
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
