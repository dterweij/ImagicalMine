<?php
/**
 * src/pocketmine/block/DaylightDetector.php
 *
 * @package default
 */




namespace pocketmine\block;

use pocketmine\item\Item;
use pocketmine\level\Level;
use pocketmine\Player;

class DaylightDetector extends Transparent implements Redstone, RedstoneSwitch
{

    protected $id = self::DAYLIGHT_DETECTOR;

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
        return "Daylight Detector";
    }


    /**
     *
     * @return unknown
     */
    public function isRedstone()
    {
        return true;
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
     * @param unknown $type
     * @return unknown
     */
    public function onUpdate($type)
    {
        if ($type === Level::BLOCK_UPDATE_SCHEDULED || $type === Level::BLOCK_UPDATE_NORMAL) {
            $this->power=$this->getLightLevel();
            $this->getLevel()->setBlock($this, $this, true, true);
            $this->getLevel()->scheduleUpdate($this, 50);
            $this->BroadcastRedstoneUpdate(Level::REDSTONE_UPDATE_NORMAL, $this->getPower());
        }
        return false;
    }


    /**
     *
     * @param Item    $item
     * @param Player  $player (optional)
     */
    public function onActivate(Item $item, Player $player = null)
    {
        $this->id=self::DAYLIGHT_DETECTOR_INVERTED;
        $this->getLevel()->setBlock($this, $this, true);
        $this->BroadcastRedstoneUpdate(Level::REDSTONE_UPDATE_NORMAL, $this->getPower());
    }


    /**
     *
     * @param Item    $item
     * @return unknown
     */
    public function getDrops(Item $item)
    {
        return [[self::DAYLIGHT_DETECTOR, 0, 1]];
    }
}
