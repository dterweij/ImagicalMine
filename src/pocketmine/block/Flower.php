<?php
/**
 * src/pocketmine/block/Flower.php
 *
 * @package default
 */




namespace pocketmine\block;

use pocketmine\item\Item;
use pocketmine\level\Level;
use pocketmine\math\Vector3;
use pocketmine\Player;

class Flower extends Flowable
{

    const TYPE_POPPY = 0;
    const TYPE_BLUE_ORCHID = 1;
    const TYPE_ALLIUM = 2;
    const TYPE_AZURE_BLUET = 3;
    const TYPE_RED_TULIP = 4;
    const TYPE_ORANGE_TULIP = 5;
    const TYPE_WHITE_TULIP = 6;
    const TYPE_PINK_TULIP = 7;
    const TYPE_OXEYE_DAISY = 8;

    protected $id = self::RED_FLOWER;

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
        static $names = [
            self::TYPE_POPPY => "Poppy",
            self::TYPE_BLUE_ORCHID => "Blue Orchid",
            self::TYPE_ALLIUM => "Allium",
            self::TYPE_AZURE_BLUET => "Azure Bluet",
            self::TYPE_RED_TULIP => "Red Tulip",
            self::TYPE_ORANGE_TULIP => "Orange Tulip",
            self::TYPE_WHITE_TULIP => "White Tulip",
            self::TYPE_PINK_TULIP => "Pink Tulip",
            self::TYPE_OXEYE_DAISY => "Oxeye Daisy",
            9 => "Unknown",
            10 => "Unknown",
            11 => "Unknown",
            12 => "Unknown",
            13 => "Unknown",
            14 => "Unknown",
            15 => "Unknown"
        ];
        return $names[$this->meta];
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
        if ($down->getId() === Block::GRASS or $down->getId() === Block::DIRT or $down->getId() === Block::PODZOL) {
            $this->getLevel()->setBlock($block, $this, true);

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
            if ($this->getSide(Vector3::SIDE_DOWN)->isTransparent() or !$this->getSide(Vector3::SIDE_DOWN)->isSolid()) {
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
            [$this->id, $this->meta, 1]
        ];
    }
}
