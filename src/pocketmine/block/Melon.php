<?php
/**
 * src/pocketmine/block/Melon.php
 *
 * @package default
 */




namespace pocketmine\block;

use pocketmine\item\Item;
use pocketmine\item\Tool;

class Melon extends Transparent
{

    protected $id = self::MELON_BLOCK;


    public function __construct()
    {
    }


    /**
     *
     * @return unknown
     */
    public function getName()
    {
        return "Melon Block";
    }


    /**
     *
     * @return unknown
     */
    public function getHardness()
    {
        return 1;
    }


    /**
     *
     * @return unknown
     */
    public function getToolType()
    {
        return Tool::TYPE_AXE;
    }


    /**
     *
     * @param Item    $item
     * @return unknown
     */
    public function getDrops(Item $item)
    {
        return [
            [Item::MELON_SLICE, 0, mt_rand(3, 7)],
        ];
    }
}
