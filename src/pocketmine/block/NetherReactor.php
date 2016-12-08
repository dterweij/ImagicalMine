<?php
/**
 * src/pocketmine/block/NetherReactor.php
 *
 * @package default
 */




namespace pocketmine\block;

use pocketmine\item\Item;
use pocketmine\item\Tool;

class NetherReactor extends Solid
{

    protected $id = self::NETHER_REACTOR;

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
        return "Nether Reactor";
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
    public function canBeActivated()
    {
        return false;
    }


    /**
     *
     * @param Item    $item
     * @return unknown
     */
    public function getDrops(Item $item)
    {
        $drops = [];
        if ($item->isPickaxe() >= Tool::TIER_WOODEN) {
            $drops[] = [Item::DIAMOND, 0, 3];
            $drops[] = [Item::IRON_INGOT, 0, 6];
        }
        return $drops;
    }
}
