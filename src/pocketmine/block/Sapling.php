<?php
/**
 * src/pocketmine/block/Sapling.php
 *
 * @package default
 */




namespace pocketmine\block;

use pocketmine\item\Item;
use pocketmine\level\generator\object\Tree;
use pocketmine\level\Level;
use pocketmine\Player;
use pocketmine\utils\Random;

class Sapling extends Flowable
{
    const OAK = 0;
    const SPRUCE = 1;
    const BIRCH = 2;
    const JUNGLE = 3;
    const ACACIA = 4;
    const DARK_OAK = 5;

    protected $id = self::SAPLING;

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
    public function getName()
    {
        static $names = [
            0 => "Oak Sapling",
            1 => "Spruce Sapling",
            2 => "Birch Sapling",
            3 => "Jungle Sapling",
            4 => "Acacia Sapling",
            5 => "Dark Oak Sapling",
            6 => "",
            7 => "",
        ];
        return $names[$this->meta & 0x07];
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
        if ($down->getId() === self::GRASS or $down->getId() === self::DIRT or $down->getId() === self::PODZOL) {
            $this->getLevel()->setBlock($block, $this, true, true);

            return true;
        }

        return false;
    }


    /**
     *
     * @param Item    $item
     * @param Player  $player (optional)
     * @return unknown
     */
    public function onActivate(Item $item, Player $player = null)
    {
        if ($item->getId() === Item::DYE and $item->getDamage() === 0x0F) { //Bonemeal
            //TODO: change log type
            Tree::growTree($this->getLevel(), $this->x, $this->y, $this->z, new Random(mt_rand()), $this->meta & 0x07);
            if (($player->gamemode & 0x01) === 0) {
                $item->count--;
            }

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
            if ($this->getSide(0)->isTransparent() === true) {
                $this->getLevel()->useBreakOn($this);

                return Level::BLOCK_UPDATE_NORMAL;
            }
        } elseif ($type === Level::BLOCK_UPDATE_RANDOM) { //Growth
            if (mt_rand(1, 7) === 1) {
                if (($this->meta & 0x08) === 0x08) {
                    Tree::growTree($this->getLevel(), $this->x, $this->y, $this->z, new Random(mt_rand()), $this->meta & 0x07);
                } else {
                    $this->meta |= 0x08;
                    $this->getLevel()->setBlock($this, $this, true);

                    return Level::BLOCK_UPDATE_RANDOM;
                }
            } else {
                return Level::BLOCK_UPDATE_RANDOM;
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
            [$this->id, $this->meta & 0x07, 1],
        ];
    }
}
