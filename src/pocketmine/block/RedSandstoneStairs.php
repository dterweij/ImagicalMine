<?php
/**
 * src/pocketmine/block/RedSandstoneStairs.php
 *
 * @package default
 */




namespace pocketmine\block;

use pocketmine\item\Item;
use pocketmine\item\Tool;

class RedSandstoneStairs extends SandstoneStairs
{

    protected $id = self::RED_SANDSTONE_STAIRS;

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
        return "Red Sandstone Stairs";
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
                [Item::RED_SANDSTONE_STAIRS, $this->meta & 0x03, 1]
            ];
        } else {
            return [];
        }
    }
}
