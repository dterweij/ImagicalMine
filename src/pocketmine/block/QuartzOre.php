<?php
/**
 * src/pocketmine/block/QuartzOre.php
 *
 * @package default
 */




namespace pocketmine\block;

use pocketmine\item\Item;
use pocketmine\item\Tool;

class QuartzOre extends Solid
{

    protected $id = self::QUARTZ_ORE;


    public function __construct()
    {
    }


    /**
     *
     * @return unknown
     */
    public function getName()
    {
        return "Nether Quartz Ore";
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
    public function getHardness()
    {
        return 3;
    }


    /**
     *
     * @param Item    $item
     * @return unknown
     */
    public function getDrops(Item $item)
    {
        if ($item->isPickaxe() >= Tool::TIER_STONE) {
            return [
                [Item::QUARTZ, 0, 1],
            ];
        } else {
            return [];
        }
    }
}
