<?php
/**
 * src/pocketmine/block/LitRedstoneLamp.php
 *
 * @package default
 */




namespace pocketmine\block;

use pocketmine\item\Tool;
use pocketmine\item\Item;
use pocketmine\level\Level;
use pocketmine\Player;

class LitRedstoneLamp extends Solid implements Redstone, RedstoneConsumer
{

    protected $id = self::LIT_REDSTONE_LAMP;


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
     */
    public function onUpdate($type)
    {
        if (!$this->isActivitedByRedstone() and !$this->isCharged() and !$this->isPoweredbyBlock()) {
            $this->id=123;
            $this->getLevel()->setBlock($this, $this, true, false);
            $this->BroadcastRedstoneUpdate(Level::REDSTONE_UPDATE_BLOCK_UNCHARGE, 0);
        }
    }


    /**
     *
     * @param unknown $type
     * @param unknown $power
     */
    public function onRedstoneUpdate($type, $power)
    {
        if ($type == Level::REDSTONE_UPDATE_BLOCK_CHARGE) {
            return;
        }
        $isC=$this->isCharged();
        if ($isC) {
            $this->BroadcastRedstoneUpdate(Level::REDSTONE_UPDATE_BLOCK_CHARGE, 1);
            return;
        }
        if (!$this->isActivitedByRedstone() and !$isC and !$this->isPoweredbyBlock()) {
            $this->id=123;
            $this->getLevel()->setBlock($this, $this, true, true);
            return;
        }
        return;
    }



    /**
     *
     * @return unknown
     */
    public function getName()
    {
        return "Lit Redstone Lamp";
    }


    /**
     *
     * @return unknown
     */
    public function getHardness()
    {
        return 0.3;
    }



    /**
     *
     * @return unknown
     */
    public function getLightLevel()
    {
        return 15;
    }


    /**
     *
     * @param Item    $item
     * @return unknown
     */
    public function getDrops(Item $item)
    {
        $drops = [];
        $drops[] = [Item::REDSTONE_LAMP, 0, 1];
        return $drops;
    }
}
