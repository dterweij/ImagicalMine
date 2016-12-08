<?php
/**
 * src/pocketmine/block/FenceGate.php
 *
 * @package default
 */




namespace pocketmine\block;

use pocketmine\item\Item;
use pocketmine\item\Tool;
use pocketmine\math\AxisAlignedBB;
use pocketmine\Player;
use pocketmine\level\sound\DoorSound;

class FenceGate extends Transparent implements Redstone
{

    protected $id = self::FENCE_GATE;

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
        return "Oak Fence Gate";
    }


    /**
     *
     * @return unknown
     */
    public function getHardness()
    {
        return 2;
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
     * @return unknown
     */
    public function getToolType()
    {
        return Tool::TYPE_AXE;
    }


    /**
     *
     * @return unknown
     */
    protected function recalculateBoundingBox()
    {
        if (($this->getDamage() & 0x04) > 0) {
            return null;
        }

        $i = ($this->getDamage() & 0x03);
        if ($i === 2 or $i === 0) {
            return new AxisAlignedBB(
                $this->x,
                $this->y,
                $this->z + 0.375,
                $this->x + 1,
                $this->y + 1.5,
                $this->z + 0.625
            );
        } else {
            return new AxisAlignedBB(
                $this->x + 0.375,
                $this->y,
                $this->z,
                $this->x + 0.625,
                $this->y + 1.5,
                $this->z + 1
            );
        }
    }


    /**
     *
     * @param Item    $item
     * @param Block   $block
     * @param Block   $target
     * @param unknown $face
     * @param unknown $fx
     * @param unknown $fy
     * @param unknown $fz
     * @param Player  $player (optional)
     * @return unknown
     */
    public function place(Item $item, Block $block, Block $target, $face, $fx, $fy, $fz, Player $player = null)
    {
        $faces = [
            0 => 3,
            1 => 0,
            2 => 1,
            3 => 2,
        ];
        $this->meta = $faces[$player instanceof Player ? $player->getDirection() : 0] & 0x03;
        $this->getLevel()->setBlock($block, $this, true, true);

        return true;
    }


    /**
     *
     * @param Item    $item
     * @return unknown
     */
    public function getDrops(Item $item)
    {
        return [
            [$this->id, 0, 1],
        ];
    }


    /**
     *
     * @param Item    $item
     * @param Player  $player (optional)
     * @return unknown
     */
    public function onActivate(Item $item, Player $player = null)
    {
        $this->getLevel()->setBlock($this, $this, true);
        $this->getLevel()->addSound(new DoorSound($this));
        return true;
    }



    /**
     *
     * @param unknown $type
     * @param unknown $power
     */
    public function onRedstoneUpdate($type, $power)
    {
        $ACT = $this->isActivitedByRedstone();
        $ISC = $this->isCharged();
        $IPB = $this->isPoweredbyBlock();
        if (($ACT or $ISC or $IPB) and $this->meta < 4) {
            $this->meta = $this->meta+4;
        }
        if (!$ACT and !$ISC and !$IPB and $this->meta >= 4) {
            $this->meta = $this->meta-4;
        }

        $this->getLevel()->setBlock($this, $this);
        $this->getLevel()->addSound(new DoorSound($this));
    }
}
