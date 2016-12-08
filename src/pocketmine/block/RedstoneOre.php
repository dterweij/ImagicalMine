<?php
/**
 * src/pocketmine/block/RedstoneOre.php
 *
 * @package default
 */




namespace pocketmine\block;

use pocketmine\item\Item;
use pocketmine\item\Tool;
use pocketmine\level\Level;

class RedstoneOre extends Solid
{

    protected $id = self::REDSTONE_ORE;


    public function __construct()
    {
    }


    /**
     *
     * @return unknown
     */
    public function getName()
    {
        return "Redstone Ore";
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
     * @param unknown $type
     * @return unknown
     */
    public function onUpdate($type)
    {
        if ($type === Level::BLOCK_UPDATE_NORMAL or $type === Level::BLOCK_UPDATE_TOUCH) {
            $this->getLevel()->setBlock($this, Block::get(Item::GLOWING_REDSTONE_ORE, $this->meta), false, true);

            return Level::BLOCK_UPDATE_WEAK;
        }

        return false;
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
        if ($item->isPickaxe() >= Tool::TIER_IRON) {
            return [
                [Item::REDSTONE_DUST, 0, mt_rand(4, 5)],
            ];
        } else {
            return [];
        }
    }
}
