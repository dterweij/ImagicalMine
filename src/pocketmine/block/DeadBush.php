<?php
/**
 * src/pocketmine/block/DeadBush.php
 *
 * @package default
 */




namespace pocketmine\block;

use pocketmine\level\Level;
use pocketmine\item\Item;
use pocketmine\Player;

class DeadBush extends Flowable
{

    protected $id = self::DEAD_BUSH;

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
        return "Dead Bush";
    }


    /**
     *
     * @param unknown $type
     * @return unknown
     */
    public function onUpdate($type)
    {
        if ($type === Level::BLOCK_UPDATE_NORMAL) {
            if ($this->getSide(0)->isTransparent() === true) {
                $this->getLevel()->useBreakOn($this);

                return Level::BLOCK_UPDATE_NORMAL;
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
        $down = $this->getSide(0);
        if ($down->getId() === self::SAND or $down->getId() === self::HARDENED_CLAY or $down->getId() === self::PODZOL) {
            $this->getLevel()->setBlock($block, $this, true, true);

            return true;
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
        if ($item->isShears()) {
            return [
                [Item::DEAD_BUSH, 0, 1],
            ];
        } else {
            return [
                [Item::STICK, 0, mt_rand(0, 3)]
            ];
        }
    }
}
