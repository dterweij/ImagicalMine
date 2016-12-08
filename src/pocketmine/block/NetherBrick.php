<?php
/**
 * src/pocketmine/block/NetherBrick.php
 *
 * @package default
 */




namespace pocketmine\block;

use pocketmine\item\Item;
use pocketmine\item\Tool;

class NetherBrick extends Solid
{

    protected $id = self::NETHER_BRICKS;


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
        return "Nether Bricks";
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
                [Item::NETHER_BRICKS, 0, 1],
            ];
        } else {
            return [];
        }
    }
}
