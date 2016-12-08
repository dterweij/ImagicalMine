<?php
/**
 * src/pocketmine/block/Cauldron.php
 *
 * @package default
 */




namespace pocketmine\block;

use pocketmine\item\Item;
use pocketmine\item\Tool;
use pocketmine\Player;

class Cauldron extends Solid
{

    protected $id = self::CAULDRON;

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
        return "Cauldron";
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
     * @return unknown
     */
    public function getHardness()
    {
        return 2;
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
        if ($item->isPickaxe() >= Tool::TIER_WOODEN) {
            return [[$this->id, 0, 1]];
        } else {
            return[];
        }
    }
}
