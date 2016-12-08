<?php
/**
 * src/pocketmine/block/RedSandstone.php
 *
 * @package default
 */




namespace pocketmine\block;

use pocketmine\item\Item;
use pocketmine\item\Tool;

class RedSandstone extends Solid
{

    const NORMAL = 0;
    const CHISELED = 1;
    const SMOOTH = 2;

    protected $id = self::RED_SANDSTONE;

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
    public function getHardness()
    {
        return 0.8;
    }


    /**
     *
     * @return unknown
     */
    public function getName()
    {
        static $names = [
            self::NORMAL => "Red Sandstone",
            self::CHISELED => "Chiseled Red Sandstone",
            self::SMOOTH => "Smooth Red Sandstone"
        ];
        return $names[$this->meta & 0x01];
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
        if ($item->isPickaxe() >= Tool::TIER_WOODEN) {
            return [
                [Item::RED_SANDSTONE, $this->meta & 0x03, 1],
            ];
        } else {
            return [];
        }
    }
}
