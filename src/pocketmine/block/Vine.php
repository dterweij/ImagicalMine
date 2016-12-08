<?php
/**
 * src/pocketmine/block/Vine.php
 *
 * @package default
 */




namespace pocketmine\block;

use pocketmine\entity\Entity;
use pocketmine\item\Item;
use pocketmine\item\Tool;
use pocketmine\level\Level;
use pocketmine\math\AxisAlignedBB;
use pocketmine\Player;

class Vine extends Transparent
{

    protected $id = self::VINE;

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
        return false;
    }


    /**
     *
     * @return unknown
     */
    public function getName()
    {
        return "Vines";
    }


    /**
     *
     * @return unknown
     */
    public function getHardness()
    {
        return 0.2;
    }


    /**
     *
     * @return unknown
     */
    public function canPassThrough()
    {
        return true;
    }


    /**
     *
     * @return unknown
     */
    public function hasEntityCollision()
    {
        return true;
    }


    /**
     *
     * @param Entity  $entity
     */
    public function onEntityCollide(Entity $entity)
    {
        $entity->resetFallDistance();
    }


    /**
     *
     * @return unknown
     */
    protected function recalculateBoundingBox()
    {
        $f1 = 1;
        $f2 = 1;
        $f3 = 1;
        $f4 = 0;
        $f5 = 0;
        $f6 = 0;

        $flag = $this->meta > 0;

        if (($this->meta & 0x02) > 0) {
            $f4 = max($f4, 0.0625);
            $f1 = 0;
            $f2 = 0;
            $f5 = 1;
            $f3 = 0;
            $f6 = 1;
            $flag = true;
        }

        if (($this->meta & 0x08) > 0) {
            $f1 = min($f1, 0.9375);
            $f4 = 1;
            $f2 = 0;
            $f5 = 1;
            $f3 = 0;
            $f6 = 1;
            $flag = true;
        }

        if (($this->meta & 0x01) > 0) {
            $f3 = min($f3, 0.9375);
            $f6 = 1;
            $f1 = 0;
            $f4 = 1;
            $f2 = 0;
            $f5 = 1;
            $flag = true;
        }

        if (!$flag and $this->getSide(1)->isSolid()) {
            $f2 = min($f2, 0.9375);
            $f5 = 1;
            $f1 = 0;
            $f4 = 1;
            $f3 = 0;
            $f6 = 1;
        }

        return new AxisAlignedBB(
            $this->x + $f1,
            $this->y + $f2,
            $this->z + $f3,
            $this->x + $f4,
            $this->y + $f5,
            $this->z + $f6
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
        if ((!$target->isTransparent() and $target->isSolid()) || $target->getId() === Block::LEAVES || $target->getId() === Block::LEAVES2) {
            $faces = [
                0 => 0,
                1 => 0,
                2 => 1,
                3 => 4,
                4 => 8,
                5 => 2,
            ];
            if (isset($faces[$face])) {
                $this->meta = $faces[$face];
                $this->getLevel()->setBlock($block, $this, true, true);

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
        $faces = [
            1 => 2,
            2 => 5,
            3 => 4,
            4 => 3
        ];
        if ($type === Level::BLOCK_UPDATE_NORMAL) {
            if (isset($faces[$this->meta])) {
                if ($this->getSide($faces[$this->meta])->getId() instanceof Transparent && $this->getSide(Vector3::SIDE_UP) !== Block::VINE) {
                    $this->getLevel()->useBreakOn($this);
                }
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
        if ($item->isShears()) {
            return [
                [$this->id, 0, 1],
            ];
        } else {
            return [];
        }
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
