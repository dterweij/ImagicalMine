<?php
/**
 * src/pocketmine/block/Coal.php
 *
 * @package default
 */




namespace pocketmine\block;

use pocketmine\item\Item;
use pocketmine\item\Tool;

class Coal extends Solid
{

    protected $id = self::COAL_BLOCK;


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
        return "Coal Block";
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
                [Item::COAL_BLOCK, 0, 1],
            ];
        } else {
            return [];
        }
    }
}
