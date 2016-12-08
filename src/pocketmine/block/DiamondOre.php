<?php
/**
 * src/pocketmine/block/DiamondOre.php
 *
 * @package default
 */




namespace pocketmine\block;

use pocketmine\item\Item;
use pocketmine\item\Tool;

class DiamondOre extends Solid
{

    protected $id = self::DIAMOND_ORE;


    public function __construct()
    {
    }


    /**
     *
     * @return unknown
     */
    public function getHardness()
    {
        return 3;
    }


    /**
     *
     * @return unknown
     */
    public function getName()
    {
        return "Diamond Ore";
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
        if ($item->isPickaxe() >= Tool::TIER_IRON) {
            return [
                [Item::DIAMOND, 0, 1],
            ];
        } else {
            return [];
        }
    }
}
