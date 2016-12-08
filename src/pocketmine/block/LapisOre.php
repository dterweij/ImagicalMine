<?php
/**
 * src/pocketmine/block/LapisOre.php
 *
 * @package default
 */




namespace pocketmine\block;

use pocketmine\item\Item;
use pocketmine\item\Tool;

class LapisOre extends Solid
{

    protected $id = self::LAPIS_ORE;


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
        return "Lapis Lazuli Ore";
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
                [Item::DYE, 4, mt_rand(4, 8)],
            ];
        } else {
            return [];
        }
    }
}
