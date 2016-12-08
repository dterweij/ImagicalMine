<?php
/**
 * src/pocketmine/block/StoneWall.php
 *
 * @package default
 */




namespace pocketmine\block;

use pocketmine\item\Tool;
use pocketmine\math\AxisAlignedBB;
use pocketmine\math\Vector3;

class StoneWall extends Transparent
{
    const NONE_MOSSY_WALL = 0;
    const MOSSY_WALL = 1;

    protected $id = self::STONE_WALL;

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
    public function isSolid()
    {
        return false;
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
    public function getHardness()
    {
        return 2;
    }


    /**
     *
     * @return unknown
     */
    public function getName()
    {
        if ($this->meta === 0x01) {
            return "Mossy Cobblestone Wall";
        }

        return "Cobblestone Wall";
    }


    /**
     *
     * @return unknown
     */
    protected function recalculateBoundingBox()
    {
        $north = $this->canConnect($this->getSide(Vector3::SIDE_NORTH));
        $south = $this->canConnect($this->getSide(Vector3::SIDE_SOUTH));
        $west = $this->canConnect($this->getSide(Vector3::SIDE_WEST));
        $east = $this->canConnect($this->getSide(Vector3::SIDE_EAST));

        $n = $north ? 0 : 0.25;
        $s = $south ? 1 : 0.75;
        $w = $west ? 0 : 0.25;
        $e = $east ? 1 : 0.75;

        if ($north and $south and !$west and !$east) {
            $w = 0.3125;
            $e = 0.6875;
        } elseif (!$north and !$south and $west and $east) {
            $n = 0.3125;
            $s = 0.6875;
        }

        return new AxisAlignedBB(
            $this->x + $w,
            $this->y,
            $this->z + $n,
            $this->x + $e,
            $this->y + 1.5,
            $this->z + $s
        );
    }


    /**
     *
     * @param Block   $block
     * @return unknown
     */
    public function canConnect(Block $block)
    {
        return ($block->getId() !== self::COBBLE_WALL and $block->getId() !== self::FENCE_GATE) ? $block->isSolid() and !$block->isTransparent() : true;
    }
}
