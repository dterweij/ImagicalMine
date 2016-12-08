<?php
/**
 * src/pocketmine/block/LitRedstoneTorch.php
 *
 * @package default
 */




namespace pocketmine\block;

use pocketmine\item\Item;
use pocketmine\level\Level;
use pocketmine\Player;
use pocketmine\math\Vector3;

class LitRedstoneTorch extends Flowable implements Redstone, RedstoneSource
{

    protected $id = self::LIT_REDSTONE_TORCH;

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
    public function getLightLevel()
    {
        return 7;
    }


    /**
     *
     * @return unknown
     */
    public function getName()
    {
        return "Redstone Torch";
    }



    /**
     *
     * @return unknown
     */
    public function getPower()
    {
        return 16;
    }



    /**
     *
     * @param unknown $type
     * @param unknown $power
     */
    public function BroadcastRedstoneUpdate($type, $power)
    {
        for ($side = 1; $side <= 5; $side++) {
            $around=$this->getSide($side);
            $this->getLevel()->setRedstoneUpdate($around, Block::REDSTONEDELAY, $type, $power);
        }
    }



    /**
     *
     * @param unknown $type
     * @param unknown $power
     */
    public function onRedstoneUpdate($type, $power)
    {
        if ($type === Level::REDSTONE_UPDATE_PLACE or $type === Level::REDSTONE_UPDATE_LOSTPOWER) {
            $this->BroadcastRedstoneUpdate(Level::REDSTONE_UPDATE_PLACE, $this->getPower());
        }
        if ($type === Level::REDSTONE_UPDATE_BLOCK_CHARGE) {
            $this->id = 75;
            $this->getLevel()->setBlock($this, $this, true, false);
            $this->BroadcastRedstoneUpdate(Level::REDSTONE_UPDATE_BREAK, 16);
            return;
        }
        return;
    }



    /**
     *
     * @param unknown $type
     * @return unknown
     */
    public function onUpdate($type)
    {
        if ($type === Level::BLOCK_UPDATE_NORMAL) {
            $below = $this->getSide(0);
            $side = $this->getDamage();
            $faces = [
                1 => 4,
                2 => 5,
                3 => 2,
                4 => 3,
                5 => 0,
                6 => 0,
                0 => 0
            ];

            if ($this->getSide($faces[$side])->isTransparent() === true and !($side === 0 and ($below->getId() === self::FENCE or $below->getId() === self::COBBLE_WALL))) {
                $this->getLevel()->useBreakOn($this);
                $this->getLevel()->scheduleUpdate($this->getSide(Vector3::SIDE_UP), 2);
                return Level::BLOCK_UPDATE_NORMAL;
            }

            if ($this->getSide($faces[$side])->getPower() > 0) {
                $this->getLevel()->setBlock($this, Block::get(Block::UNLIT_REDSTONE_TORCH));
                $this->getLevel()->scheduleUpdate($this->getSide(Vector3::SIDE_UP), 2);
                return Level::REDSTONE_UPDATE_BLOCK_UNCHARGE;
            }
        } elseif ($type === Level::BLOCK_UPDATE_SCHEDULED) {
            $side = $this->getDamage();
            $faces = [
                1 => 4,
                2 => 5,
                3 => 2,
                4 => 3,
                5 => 0,
                6 => 0,
                0 => 0
            ];
            if ($this->getSide($faces[$side])->getPower() > 0) {
                $this->getLevel()->setBlock($this, Block::get(Block::UNLIT_REDSTONE_TORCH));
                $this->getLevel()->scheduleUpdate($this->getSide(Vector3::SIDE_UP), 2);
                return Level::REDSTONE_UPDATE_BLOCK_UNCHARGE;
            }
        }

        return false;
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
        $below = $this->getSide(0);
        if ($target->isTransparent() === false and $face !== 0) {
            $faces = [
                1 => 5,
                2 => 4,
                3 => 3,
                4 => 2,
                5 => 1,
            ];
            $this->meta = $faces[$face];
            if ($target->isCharged()) {
                $this->id = 75;
                $this->getLevel()->setBlock($block, $this);
                return;
            }
            $this->getLevel()->setBlock($block, $this);
            $this->BroadcastRedstoneUpdate(Level::REDSTONE_UPDATE_PLACE, $this->getPower());
            $this->getLevel()->scheduleUpdate($this->getSide(Vector3::SIDE_UP), 2);// 2 ticks = 1 redstone tick

            return true;
        } elseif ($below->isTransparent() === false or $below->getId() === self::FENCE or $below->getId() === self::COBBLE_WALL) {
            $this->meta = 0;
            if ($target->isCharged()) {
                $this->id = 75;
                $this->getLevel()->setBlock($block, $this);
                return;
            }
            $this->getLevel()->setBlock($block, $this);
            $this->BroadcastRedstoneUpdate(Level::REDSTONE_UPDATE_PLACE, $this->getPower());
            $this->getLevel()->scheduleUpdate($this->getSide(Vector3::SIDE_UP), 2);
            return true;
        }

        return false;
    }


    /**
     *
     * @param Item    $item
     * @return unknown
     */
    public function onBreak(Item $item)
    {
        $oBreturn = $this->getLevel()->setBlock($this, new Air());
        $this->BroadcastRedstoneUpdate(Level::REDSTONE_UPDATE_BREAK, $this->getPower());
        return $oBreturn;
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
}
