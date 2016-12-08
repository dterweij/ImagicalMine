<?php
/**
 * src/pocketmine/block/Diorite.php
 *
 * @package default
 */




namespace pocketmine\block;

use pocketmine\item\Item;
use pocketmine\item\Tool;

class Diorite extends Solid
{

    protected $id = 1;

    /**
     *
     * @param unknown $meta (optional)
     */
    public function __construct($meta = 3)
    {
        $this->meta = $meta;
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
        return Tool::TYPE_PICKAXE;
    }


    /**
     *
     * @return unknown
     */
    public function getName()
    {
        return "Diorite";
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
                [Item::DIORITE, $this->meta, 1],
            ];
        } else {
            return [];
        }
    }
}
