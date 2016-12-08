<?php
/**
 * src/pocketmine/block/CobblestoneStairs.php
 *
 * @package default
 */




namespace pocketmine\block;

use pocketmine\item\Tool;

class CobblestoneStairs extends Stair
{

    protected $id = self::COBBLESTONE_STAIRS;

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
        return "Cobblestone Stairs";
    }
}
