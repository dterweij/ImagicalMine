<?php
/**
 * src/pocketmine/block/NetherBrickStairs.php
 *
 * @package default
 */




namespace pocketmine\block;

use pocketmine\item\Tool;

class NetherBrickStairs extends Stair
{

    protected $id = self::NETHER_BRICKS_STAIRS;

    /**
     *
     * @return unknown
     */
    public function getName()
    {
        return "Nether Bricks Stairs";
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
    public function getToolType()
    {
        return Tool::TYPE_PICKAXE;
    }


    /**
     *
     * @param unknown $meta (optional)
     */
    public function __construct($meta = 0)
    {
        $this->meta = $meta;
    }
}
