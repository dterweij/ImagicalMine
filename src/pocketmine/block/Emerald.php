<?php
/**
 * src/pocketmine/block/Emerald.php
 *
 * @package default
 */




namespace pocketmine\block;

use pocketmine\item\Item;
use pocketmine\item\Tool;

class Emerald extends Solid
{

    protected $id = self::EMERALD_BLOCK;


    public function __construct()
    {
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
     * @return unknown
     */
    public function getName()
    {
        return "Emerald Block";
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
                [Item::EMERALD_BLOCK, 0, 1],
            ];
        } else {
            return [];
        }
    }
}
