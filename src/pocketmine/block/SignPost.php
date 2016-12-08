<?php
/**
 * src/pocketmine/block/SignPost.php
 *
 * @package default
 */




namespace pocketmine\block;

use pocketmine\item\Item;
use pocketmine\item\Tool;
use pocketmine\level\Level;
use pocketmine\Player;
use pocketmine\math\Vector3;

class SignPost extends Transparent
{

    protected $id = self::SIGN_POST;

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
    public function getHardness()
    {
        return 1;
    }


    /**
     *
     * @return unknown
     */
    public function isSolid()
    {
        return false;
    }


    /**
     *
     * @return unknown
     */
    public function getName()
    {
        return "Sign Post";
    }


    /**
     *
     * @return unknown
     */
    public function getBoundingBox()
    {
        return null;
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
        if ($face !== 0) {
            $faces = [
                2 => 2,
                3 => 3,
                4 => 4,
                5 => 5,
            ];
            if (!isset($faces[$face])) {
                $this->meta = floor((($player->yaw + 180) * 16 / 360) + 0.5) & 0x0F;
                $this->getLevel()->setBlock($block, Block::get(Item::SIGN_POST, $this->meta), true);

                return true;
            } else {
                $this->meta = $faces[$face];
                $this->getLevel()->setBlock($block, Block::get(Item::WALL_SIGN, $this->meta), true);

                return true;
            }
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
            if ($this->getSide(Vector3::SIDE_DOWN)->getId() === Block::AIR) {
                $this->getLevel()->useBreakOn($this);

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
        return [
            [Item::SIGN, 0, 1],
        ];
    }


    /**
     *
     * @return unknown
     */
    public function getToolType()
    {
        return Tool::TYPE_AXE;
    }
}
