<?php
/**
 * src/pocketmine/block/Bookshelf.php
 *
 * @package default
 */




namespace pocketmine\block;

use pocketmine\item\Tool;
use pocketmine\item\Item;

class Bookshelf extends Solid
{

    protected $id = self::BOOKSHELF;


    public function __construct()
    {
    }


    /**
     *
     * @return unknown
     */
    public function getName()
    {
        return "Bookshelf";
    }


    /**
     *
     * @return unknown
     */
    public function getHardness()
    {
        return 1.5;
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
            [Item::BOOK, 0, 3],
        ];
    }
}
