<?php
/**
 * src/pocketmine/block/EndPortalFrame.php
 *
 * @package default
 */




namespace pocketmine\block;

use pocketmine\item\Item;
use pocketmine\math\AxisAlignedBB;
use pocketmine\Player;

class EndPortalFrame extends Solid
{

    protected $id = self::END_PORTAL_FRAME;

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
        return 1;
    }


    /**
     *
     * @return unknown
     */
    public function getName()
    {
        return "End Portal Frame";
    }


    /**
     *
     * @return unknown
     */
    public function getHardness()
    {
        return -1;
    }


    /**
     *
     * @return unknown
     */
    public function getResistance()
    {
        return 18000000;
    }


    /**
     *
     * @param Item    $item
     * @return unknown
     */
    public function isBreakable(Item $item)
    {
        return false;
    }


    /**
     *
     * @return unknown
     */
    protected function recalculateBoundingBox()
    {
        return new AxisAlignedBB(
            $this->x,
            $this->y,
            $this->z,
            $this->x + 1,
            $this->y + (($this->getDamage() & 0x04) > 0 ? 1 : 0.8125),
            $this->z + 1
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
        $faces = [
            0 => 3,
            1 => 2,
            2 => 1,
            3 => 0
        ];
        $this->meta = $faces[$player instanceof Player ? $player->getDirection() : 0] & 0x01;
        $this->getLevel()->setBlock($block, $this, true, true);

        return true;
    }


    //TODO Implement ender portal when implemented on client
}
