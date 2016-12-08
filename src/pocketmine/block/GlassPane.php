<?php
/**
 * src/pocketmine/block/GlassPane.php
 *
 * @package default
 */




namespace pocketmine\block;

use pocketmine\item\Item;

class GlassPane extends Thin
{

    protected $id = self::GLASS_PANE;


    public function __construct()
    {
    }


    /**
     *
     * @return unknown
     */
    public function getName()
    {
        return "Glass Pane";
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
