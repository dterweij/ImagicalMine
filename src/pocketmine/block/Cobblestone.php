<?php
/**
 * src/pocketmine/block/Cobblestone.php
 *
 * @package default
 */




namespace pocketmine\block;

use pocketmine\item\Item;
use pocketmine\item\Tool;

class Cobblestone extends Solid
{

    protected $id = self::COBBLESTONE;


    public function __construct()
    {
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
        return "Cobblestone";
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
     * @param Item    $item
     * @return unknown
     */
    public function getDrops(Item $item)
    {
        if ($item->isPickaxe() >= Tool::TIER_WOODEN) {
            return [
                [Item::COBBLESTONE, 0, 1],
            ];
        } else {
            return [];
        }
    }
}
