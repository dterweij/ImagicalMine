<?php
/**
 * src/pocketmine/block/SandstoneStairs.php
 *
 * @package default
 */




namespace pocketmine\block;

use pocketmine\item\Tool;

class SandstoneStairs extends Stair
{

    protected $id = self::SANDSTONE_STAIRS;

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
        return 0.8;
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
        return "Sandstone Stairs";
    }
}
