<?php
/**
 * src/pocketmine/block/SpruceWoodStairs.php
 *
 * @package default
 */




namespace pocketmine\block;

use pocketmine\item\Item;
use pocketmine\item\Tool;

class SpruceWoodStairs extends Stair
{

    protected $id = self::SPRUCE_WOOD_STAIRS;

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
        return "Spruce Wood Stairs";
    }


    /**
     *
     * @return unknown
     */
    public function getToolType()
    {
        return Tool::TYPE_AXE;
    }


    /**
     *
     * @param Item    $item
     * @return unknown
     */
    public function getDrops(Item $item)
    {
        return [
            [$this->id, 0, 1],
        ];
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
        return 15;
    }
}
