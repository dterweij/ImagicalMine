<?php
/**
 * src/pocketmine/block/Clay.php
 *
 * @package default
 */




namespace pocketmine\block;

use pocketmine\item\Item;
use pocketmine\item\Tool;

class Clay extends Solid
{

    protected $id = self::CLAY_BLOCK;


    public function __construct()
    {
    }


    /**
     *
     * @return unknown
     */
    public function getHardness()
    {
        return 0.6;
    }


    /**
     *
     * @return unknown
     */
    public function getToolType()
    {
        return Tool::TYPE_SHOVEL;
    }


    /**
     *
     * @return unknown
     */
    public function getName()
    {
        return "Clay Block";
    }


    /**
     *
     * @param Item    $item
     * @return unknown
     */
    public function getDrops(Item $item)
    {
        return [
            [Item::CLAY, 0, 4],
        ];
    }
}
