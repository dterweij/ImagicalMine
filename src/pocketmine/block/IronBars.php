<?php
/**
 * src/pocketmine/block/IronBars.php
 *
 * @package default
 */




namespace pocketmine\block;

use pocketmine\item\Item;
use pocketmine\item\Tool;

class IronBars extends Thin
{

    protected $id = self::IRON_BARS;


    public function __construct()
    {
    }


    /**
     *
     * @return unknown
     */
    public function getName()
    {
        return "Iron Bars";
    }


    /**
     *
     * @return unknown
     */
    public function getHardness()
    {
        return 5;
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
     * @param Item    $item
     * @return unknown
     */
    public function getDrops(Item $item)
    {
        if ($item->isPickaxe() >= Tool::TIER_WOODEN) {
            return [
                [Item::IRON_BARS, 0, 1],
            ];
        } else {
            return [];
        }
    }
}
