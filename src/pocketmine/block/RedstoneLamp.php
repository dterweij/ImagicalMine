<?php
/**
 * src/pocketmine/block/RedstoneLamp.php
 *
 * @package default
 */




namespace pocketmine\block;

use pocketmine\item\Tool;
use pocketmine\level\Level;
use pocketmine\Player;

class RedstoneLamp extends Solid implements Redstone, RedstoneConsumer
{

    protected $id = self::REDSTONE_LAMP;


    public function __construct()
    {
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
     * @param unknown $type
     * @param unknown $power
     */
    public function onRedstoneUpdate($type, $power)
    {
        if ($type == Level::REDSTONE_UPDATE_BLOCK_UNCHARGE) {
            return;
        }
        $isC=$this->isCharged();
        if ($isC) {
            $this->BroadcastRedstoneUpdate(Level::REDSTONE_UPDATE_BLOCK_CHARGE, 1);
            $this->id = 124;
            $this->getLevel()->setBlock($this, $this, true, false);
            return;
        }
        if ($type == Level::REDSTONE_UPDATE_BLOCK_CHARGE or $this->isActivitedByRedstone() or $this->isPoweredbyBlock()) {
            $this->id = 124;
            $this->getLevel()->setBlock($this, $this, true, false);
            return;
        }
    }


    /**
     *
     * @return unknown
     */
    public function getName()
    {
        return "Redstone Lamp";
    }


    /**
     *
     * @return unknown
     */
    public function getHardness()
    {
        return 0.3;
    }
}
