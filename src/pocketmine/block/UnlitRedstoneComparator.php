<?php
/**
 * src/pocketmine/block/UnlitRedstoneComparator.php
 *
 * @package default
 */




namespace pocketmine\block;

use pocketmine\item\Item;
use pocketmine\Player;

class UnlitRedstoneComparator extends Solid
{

    protected $id = self::UNLIT_REDSTONE_COMPARATOR;

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
    public function isSolid()
    {
        return true;
    }


    /**
     *
     * @return unknown
     */
    public function getName()
    {
        return "Redstone Comparator";
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
        return 0.1;
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
            0 => 0,
            1 => 1,
            2 => 2,
            3 => 3,
        ];

        $this->meta = $faces[$player instanceof Player ? $player->getDirection() : 0];

        $this->getLevel()->setBlock($block, $this, true);
        return true;
    }


    /**
     *
     * @param Item    $item
     * @return unknown
     */
    public function getDrops(Item $item)
    {
        return [[Item::REDSTONE_COMPARATOR_ITEM, 0, 1]];
    }
}
