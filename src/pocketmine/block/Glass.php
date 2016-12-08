<?php
/**
 * src/pocketmine/block/Glass.php
 *
 * @package default
 */




namespace pocketmine\block;

use pocketmine\item\Item;

class Glass extends Transparent
{

    protected $id = self::GLASS;


    public function __construct()
    {
    }


    /**
     *
     * @return unknown
     */
    public function getName()
    {
        return "Glass";
    }


    /**
     *
     * @return unknown
     */
    public function getHardness()
    {
        return 0.3;
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
