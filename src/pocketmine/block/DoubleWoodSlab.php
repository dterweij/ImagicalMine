<?php
/**
 * src/pocketmine/block/DoubleWoodSlab.php
 *
 * @package default
 */




namespace pocketmine\block;

use pocketmine\item\Item;
use pocketmine\item\Tool;

class DoubleWoodSlab extends Solid
{

    protected $id = self::DOUBLE_WOOD_SLAB;

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
        return Tool::TYPE_AXE;
    }


    /**
     *
     * @return unknown
     */
    public function getName()
    {
        static $names = [
            0 => "Oak",
            1 => "Spruce",
            2 => "Birch",
            3 => "Jungle",
            4 => "Acacia",
            5 => "Dark Oak",
            6 => "",
            7 => ""
        ];
        return "Double " . $names[$this->meta & 0x07] . " Wooden Slab";
    }


    /**
     *
     * @param Item    $item
     * @return unknown
     */
    public function getDrops(Item $item)
    {
        return [
            [Item::WOOD_SLAB, $this->meta & 0x07, 2],
        ];
    }
}
