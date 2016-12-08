<?php
/**
 * src/pocketmine/block/RedMushroom.php
 *
 * @package default
 */




namespace pocketmine\block;

use pocketmine\item\Item;
use pocketmine\level\Level;
use pocketmine\Player;

class RedMushroom extends Flowable
{

    protected $id = self::RED_MUSHROOM;


    public function __construct()
    {
    }


    /**
     *
     * @return unknown
     */
    public function getName()
    {
        return "Red Mushroom";
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
        if ($down->isTransparent() === false) {
            $this->getLevel()->setBlock($block, $this, true, true);

            return true;
        }

        return false;
    }
}
