<?php
/**
 * src/pocketmine/block/PackedIce.php
 *
 * @package default
 */




namespace pocketmine\block;

use pocketmine\item\Item;
use pocketmine\item\Tool;

class PackedIce extends Transparent
{

    protected $id = self::PACKED_ICE;


    public function __construct()
    {
    }


    /**
     *
     * @return unknown
     */
    public function getName()
    {
        return "Packed Ice";
    }


    /**
     *
     * @return unknown
     */
    public function getHardness()
    {
        return 0.5;
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
     * @param Item    $item
     * @return unknown
     */
    public function getDrops(Item $item)
    {
        return [];
    }
}
