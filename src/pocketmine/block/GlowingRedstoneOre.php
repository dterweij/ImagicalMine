<?php
/**
 * src/pocketmine/block/GlowingRedstoneOre.php
 *
 * @package default
 */




namespace pocketmine\block;

use pocketmine\item\Item;
use pocketmine\level\Level;

class GlowingRedstoneOre extends RedstoneOre
{

    protected $id = self::GLOWING_REDSTONE_ORE;

    /**
     *
     * @return unknown
     */
    public function getName()
    {
        return "Glowing Redstone Ore";
    }


    /**
     *
     * @return unknown
     */
    public function getLightLevel()
    {
        return 9;
    }


    /**
     *
     * @param unknown $type
     * @return unknown
     */
    public function onUpdate($type)
    {
        if ($type === Level::BLOCK_UPDATE_SCHEDULED or $type === Level::BLOCK_UPDATE_RANDOM) {
            $this->getLevel()->setBlock($this, Block::get(Item::REDSTONE_ORE, $this->meta), false, false);

            return Level::BLOCK_UPDATE_WEAK;
        }

        return false;
    }
}
