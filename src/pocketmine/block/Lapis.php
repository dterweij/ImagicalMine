<?php
/**
 * src/pocketmine/block/Lapis.php
 *
 * @package default
 */




namespace pocketmine\block;

use pocketmine\item\Item;
use pocketmine\item\Tool;

class Lapis extends Solid
{

    protected $id = self::LAPIS_BLOCK;


    public function __construct()
    {
    }


    /**
     *
     * @return unknown
     */
    public function getName()
    {
        return "Lapis Lazuli Block";
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
                [Item::LAPIS_BLOCK, 0, 1],
            ];
        } else {
            return [];
        }
    }
}
