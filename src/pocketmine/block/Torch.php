<?php
/**
 * src/pocketmine/block/Torch.php
 *
 * @package default
 */




namespace pocketmine\block;

use pocketmine\item\Item;
use pocketmine\level\Level;
use pocketmine\Player;

class Torch extends Flowable
{

    protected $id = self::TORCH;

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
        return 15;
    }


    /**
     *
     * @return unknown
     */
    public function getName()
    {
        return "Torch";
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
                0 => 0,
            ];

            if ($this->getSide($faces[$side])->isTransparent() === true and !($side === 0 and ($below->getId() === self::FENCE or $below->getId() === self::COBBLE_WALL))) {
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
            $this->getLevel()->setBlock($block, $this, true, true);

            return true;
        } elseif ($below->isTransparent() === false or $below->getId() === self::FENCE or $below->getId() === self::COBBLE_WALL) {
            $this->meta = 0;
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
        return [
            [$this->id, 0, 1],
        ];
    }
}
