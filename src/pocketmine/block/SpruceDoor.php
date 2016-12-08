<?php
/**
 * src/pocketmine/block/SpruceDoor.php
 *
 * @package default
 */




namespace pocketmine\block;

use pocketmine\item\Item;
use pocketmine\item\Tool;

class SpruceDoor extends Door
{

    protected $id = self::SPRUCE_DOOR_BLOCK;

    /**
     *
     * @param unknown $meta (optional)
     */
    public function __construct($meta = 0)
    {
        $this->meta = $meta;
    }


    /**
     *
     * @return unknown
     */
    public function getName()
    {
        return "Spruce Door Block";
    }


    /**
     *
     * @return unknown
     */
    public function canBeActivated()
    {
        return true;
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
            [Item::SPRUCE_DOOR, 0, 1],
        ];
    }
}
