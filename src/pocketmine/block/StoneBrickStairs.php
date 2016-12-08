<?php
/**
 * src/pocketmine/block/StoneBrickStairs.php
 *
 * @package default
 */




namespace pocketmine\block;

use pocketmine\item\Tool;

class StoneBrickStairs extends Stair
{

    protected $id = self::STONE_BRICK_STAIRS;

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
    public function getHardness()
    {
        return 1.5;
    }


    /**
     *
     * @return unknown
     */
    public function getName()
    {
        return "Stone Brick Stairs";
    }
}
