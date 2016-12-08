<?php
/**
 * src/pocketmine/block/BrickStairs.php
 *
 * @package default
 */




namespace pocketmine\block;

use pocketmine\item\Tool;

class BrickStairs extends Stair
{

    protected $id = self::BRICK_STAIRS;

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
    public function getHardness()
    {
        return 2;
    }


    /**
     *
     * @return unknown
     */
    public function getResistance()
    {
        return 30;
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
        return "Brick Stairs";
    }
}
