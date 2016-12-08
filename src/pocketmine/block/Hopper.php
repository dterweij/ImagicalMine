<?php
/**
 * src/pocketmine/block/Hopper.php
 *
 * @package default
 */




namespace pocketmine\block;

use pocketmine\nbt\NBT;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\nbt\tag\ListTag;
use pocketmine\nbt\tag\IntTag;
use pocketmine\nbt\tag\StringTag;
use pocketmine\tile\Hopper as TileHopper;
use pocketmine\item\Item;
use pocketmine\item\Tool;
use pocketmine\Player;
use pocketmine\tile\Tile;

class Hopper extends Transparent
{

    protected $id = self::HOPPER;

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
        return "Hopper";
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
    public function getToolType()
    {
        return Tool::TYPE_PICKAXE;
    }


    /**
     *
     * @return unknown
     */
    public function canBeActivated()
    { //At the moment disable, prevent servers crash (For devs, put true if you want check error)
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
        if ($player instanceof Player) {
            $t = $this->getLevel()->getTile($this);
            $hopper = null;
            if ($t instanceof TileHopper) {
                $hopper = $t;
            } else {
                $nbt = new CompoundTag("", [
                        new ListTag("Items", []),
                        new StringTag("id", Tile::HOPPER),
                        new IntTag("x", $this->x),
                        new IntTag("y", $this->y),
                        new IntTag("z", $this->z)
                    ]);
                $nbt->Items->setTagType(NBT::TAG_Compound);
                $hopper = Tile::createTile("Hopper", $this->getLevel()->getChunk($this->x >> 4, $this->z >> 4), $nbt);
            }

            if (isset($hopper->namedtag->Lock) and $hopper->namedtag->Lock instanceof StringTag) {
                if ($hopper->namedtag->Lock->getValue() !== $item->getCustomName()) {
                    return true;
                }
            }

            $player->addWindow($hopper->getInventory());
        }

        return true;
    }


    /**
     *
     * @param Item    $item
     * @return unknown
     */
    public function getDrops(Item $item)
    {
        $drops = [];
        if ($item->isPickaxe() >= Tool::TIER_WOODEN) {
            $drops [] = [Item::HOPPER, 0, 1];
        }

        return $drops;
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
            1 => 4,
            2 => 2,
            3 => 0,
        ];

        $hopper = null;
        $this->meta = $faces[$player instanceof Player ? $player->getDirection() : 0] & 0x01;

        $this->getLevel()->setBlock($block, $this, true, true);
        $nbt = new CompoundTag("", [
                new ListTag("Items", []),
                new StringTag("id", Tile::HOPPER),
                new IntTag("x", $this->x),
                new IntTag("y", $this->y),
                new IntTag("z", $this->z)
            ]);
        $nbt->Items->setTagType(NBT::TAG_Compound);

        if ($item->hasCustomName()) {
            $nbt->CustomName = new StringTag("CustomName", $item->getCustomName());
        }

        if ($item->hasCustomBlockData()) {
            foreach ($item->getCustomBlockData() as $key => $v) {
                $nbt->{$key} = $v;
            }
        }

        Tile::createTile("Hopper", $this->getLevel()->getChunk($this->x >> 4, $this->z >> 4), $nbt);

        return true;
    }
}
