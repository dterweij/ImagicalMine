<?php
/**
 * src/pocketmine/block/IronTrapdoor.php
 *
 * @package default
 */




namespace pocketmine\block;

use pocketmine\item\Item;
use pocketmine\item\Tool;
use pocketmine\math\AxisAlignedBB;
use pocketmine\Player;
use pocketmine\level\sound\DoorSound;

class IronTrapdoor extends Transparent implements Redstone
{

    protected $id = self::IRON_TRAPDOOR;

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
        return "Iron Trapdoor";
    }


    /**
     *
     * @return unknown
     */
    public function getHardness()
    {
        return 3;
    }


    /**
     *
     * @return unknown
     */
    public function canBeActivated()
    {
        return false;
    }


    /**
     *
     * @return unknown
     */
    protected function recalculateBoundingBox()
    {
        $damage = $this->getDamage();

        $f = 0.1875;

        if (($damage & 0x08) > 0) {
            $bb = new AxisAlignedBB(
                $this->x,
                $this->y + 1 - $f,
                $this->z,
                $this->x + 1,
                $this->y + 1,
                $this->z + 1
            );
        } else {
            $bb = new AxisAlignedBB(
                $this->x,
                $this->y,
                $this->z,
                $this->x + 1,
                $this->y + $f,
                $this->z + 1
            );
        }

        if (($damage & 0x04) > 0) {
            if (($damage & 0x03) === 0) {
                $bb->setBounds(
                    $this->x,
                    $this->y,
                    $this->z + 1 - $f,
                    $this->x + 1,
                    $this->y + 1,
                    $this->z + 1
                );
            } elseif (($damage & 0x03) === 1) {
                $bb->setBounds(
                    $this->x,
                    $this->y,
                    $this->z,
                    $this->x + 1,
                    $this->y + 1,
                    $this->z + $f
                );
            }
            if (($damage & 0x03) === 2) {
                $bb->setBounds(
                    $this->x + 1 - $f,
                    $this->y,
                    $this->z,
                    $this->x + 1,
                    $this->y + 1,
                    $this->z + 1
                );
            }
            if (($damage & 0x03) === 3) {
                $bb->setBounds(
                    $this->x,
                    $this->y,
                    $this->z,
                    $this->x + $f,
                    $this->y + 1,
                    $this->z + 1
                );
            }
        }

        return $bb;
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
        if (($target->isTransparent() === false or $target->getId() === self::SLAB) and $face !== 0 and $face !== 1) {
            $faces = [
                2 => 0,
                3 => 1,
                4 => 2,
                5 => 3,
            ];
            $this->meta = $faces[$face] & 0x03;
            if ($fy > 0.5) {
                $this->meta |= 0x08;
            }
            $this->getLevel()->setBlock($block, $this, true, true);

            return true;
        }

        return false;
    }



    /**
     *
     * @param unknown $type
     * @param unknown $power
     */
    public function onRedstoneUpdate($type, $power)
    {
        if (!($this->isActivitedByRedstone()) and $this->meta >= 4) {
            $this->meta = $this->meta-4;
        }

        if ($this->isActivitedByRedstone() and $this->meta < 4) {
            $this->meta = $this->meta+4;
        }
        $this->getLevel()->setBlock($this, $this);
        $this->getLevel()->addSound(new DoorSound($this));
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
     * @return unknown
     */
    public function getToolType()
    {
        return Tool::TYPE_PICKAXE;
    }
}
