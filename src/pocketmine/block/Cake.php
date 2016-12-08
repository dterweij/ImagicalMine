<?php
/**
 * src/pocketmine/block/Cake.php
 *
 * @package default
 */




namespace pocketmine\block;

use pocketmine\item\Item;
use pocketmine\level\Level;
use pocketmine\math\AxisAlignedBB;
use pocketmine\Player;

class Cake extends Transparent
{

    protected $id = self::CAKE_BLOCK;

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
    public function canBeActivated()
    {
        return true;
    }


    /**
     *
     * @return unknown
     */
    public function getHardness()
    {
        return 0.5;
    }


    /**
     *
     * @return unknown
     */
    public function getName()
    {
        return "Cake Block";
    }


    /**
     *
     * @return unknown
     */
    protected function recalculateBoundingBox()
    {
        $f = (1 + $this->getDamage() * 2) / 16;

        return new AxisAlignedBB(
            $this->x + $f,
            $this->y,
            $this->z + 0.0625,
            $this->x + 1 - 0.0625,
            $this->y + 0.5,
            $this->z + 1 - 0.0625
        );
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
        $down = $this->getSide(0);
        if ($down->getId() !== self::AIR) {
            $this->getLevel()->setBlock($block, $this, true, true);

            return true;
        }

        return false;
    }


    /**
     *
     * @param unknown $type
     * @return unknown
     */
    public function onUpdate($type)
    {
        if ($type === Level::BLOCK_UPDATE_NORMAL) {
            if ($this->getSide(0)->getId() === self::AIR) { //Replace with common break method
                $this->getLevel()->setBlock($this, new Air(), true);

                return Level::BLOCK_UPDATE_NORMAL;
            }
        }

        return false;
    }


    /**
     *
     * @param Item    $item
     * @return unknown
     */
    public function getDrops(Item $item)
    {
        return [];
    }


    /**
     *
     * @param Item    $item
     * @param Player  $player (optional)
     * @return unknown
     */
    public function onActivate(Item $item, Player $player = null)
    {
        if ($player instanceof Player and $player->getFood() < 20) {
            ++$this->meta;

            $player->setFood($player->getFood() + 2);

            if ($this->meta >= 0x06) {
                $this->getLevel()->setBlock($this, new Air(), true);
            } else {
                $this->getLevel()->setBlock($this, $this, true);
            }

            return true;
        }

        return false;
    }
}
