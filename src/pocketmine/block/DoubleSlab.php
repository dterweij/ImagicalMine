<?php
/**
 * src/pocketmine/block/DoubleSlab.php
 *
 * @package default
 */




namespace pocketmine\block;

use pocketmine\item\Item;
use pocketmine\item\Tool;

class DoubleSlab extends Solid
{

    protected $id = self::DOUBLE_SLAB;

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
        static $names = [
            0 => "Stone",
            1 => "Sandstone",
            2 => "Wooden",
            3 => "Cobblestone",
            4 => "Brick",
            5 => "Stone Brick",
            6 => "Nether Brick",
            7 => "Quartz",
        ];
        return "Double " . $names[$this->meta & 0x07] . " Slab";
    }


    /**
     *
     * @param Item    $item
     * @return unknown
     */
    public function getDrops(Item $item)
    {
        if ($item->isPickaxe() >= Tool::TIER_WOODEN) {
            return [
                [Item::SLAB, $this->meta & 0x07, 2],
            ];
        } else {
            return [];
        }
    }
}
