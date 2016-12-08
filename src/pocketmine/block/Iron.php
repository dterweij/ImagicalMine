<?php
/**
 * src/pocketmine/block/Iron.php
 *
 * @package default
 */




namespace pocketmine\block;

use pocketmine\item\Item;
use pocketmine\item\Tool;

class Iron extends Solid
{

    protected $id = self::IRON_BLOCK;


    public function __construct()
    {
    }


    /**
     *
     * @return unknown
     */
    public function getName()
    {
        return "Iron Block";
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
        return 5;
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
                [Item::IRON_BLOCK, 0, 1],
            ];
        } else {
            return [];
        }
    }
}
