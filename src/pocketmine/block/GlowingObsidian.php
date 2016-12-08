<?php
/**
 * src/pocketmine/block/GlowingObsidian.php
 *
 * @package default
 */




namespace pocketmine\block;

use pocketmine\item\Item;
use pocketmine\item\Tool;

class GlowingObsidian extends Solid
{

    protected $id = self::GLOWING_OBSIDIAN;

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
        return "Glowing Obsidian";
    }



    /**
     *
     * @return unknown
     */
    public function getHardness()
    {
        return 6;
    }


    /**
     *
     * @return unknown
     */
    public function getLightLevel()
    {
        return 12;
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
        if ($item->isPickaxe() >= Tool::TIER_DIAMOND) {
            return [
                [Item::OBSIDIAN, 0, 1],
            ];
        } else {
            return [];
        }
    }
}
