<?php
/**
 * src/pocketmine/block/EmeraldOre.php
 *
 * @package default
 */




namespace pocketmine\block;

use pocketmine\item\Item;
use pocketmine\item\Tool;

class EmeraldOre extends Solid
{

    protected $id = self::EMERALD_ORE;


    public function __construct()
    {
    }


    /**
     *
     * @return unknown
     */
    public function getName()
    {
        return "Emerald Ore";
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
        if ($item->isPickaxe() >= Tool::TIER_IRON) {
            return [
                [Item::EMERALD, 0, 1],
            ];
        } else {
            return [];
        }
    }
}
