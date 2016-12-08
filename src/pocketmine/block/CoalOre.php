<?php
/**
 * src/pocketmine/block/CoalOre.php
 *
 * @package default
 */




namespace pocketmine\block;

use pocketmine\item\Item;
use pocketmine\item\Tool;

class CoalOre extends Solid
{

    protected $id = self::COAL_ORE;


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
        return "Coal Ore";
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
                [Item::COAL, 0, 1],
            ];
        } else {
            return [];
        }
    }
}
