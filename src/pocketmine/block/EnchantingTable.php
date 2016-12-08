<?php
/**
 * src/pocketmine/block/EnchantingTable.php
 *
 * @package default
 */




namespace pocketmine\block;

use pocketmine\inventory\EnchantInventory;
use pocketmine\item\Item;
use pocketmine\item\Tool;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\nbt\tag\IntTag;
use pocketmine\nbt\tag\StringTag;
use pocketmine\Player;
use pocketmine\tile\Tile;

class EnchantingTable extends Transparent
{

    protected $id = self::ENCHANTING_TABLE;


    public function __construct()
    {
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
        $this->getLevel()->setBlock($block, $this, true, true);
        $nbt = new CompoundTag("", [
                new StringTag("id", Tile::ENCHANT_TABLE),
                new IntTag("x", $this->x),
                new IntTag("y", $this->y),
                new IntTag("z", $this->z)
            ]);

        if ($item->hasCustomName()) {
            $nbt->CustomName = new StringTag("CustomName", $item->getCustomName());
        }

        if ($item->hasCustomBlockData()) {
            foreach ($item->getCustomBlockData() as $key => $v) {
                $nbt->{$key} = $v;
            }
        }

        Tile::createTile(Tile::ENCHANT_TABLE, $this->getLevel()->getChunk($this->x >> 4, $this->z >> 4), $nbt);

        return true;
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
        return 5;
    }


    /**
     *
     * @return unknown
     */
    public function getResistance()
    {
        return 6000;
    }


    /**
     *
     * @return unknown
     */
    public function getName()
    {
        return "Enchanting Table";
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
     * @param Item    $item
     * @param Player  $player (optional)
     * @return unknown
     */
    public function onActivate(Item $item, Player $player = null)
    {
        if ($player instanceof Player) {
            //TODO lock
            if ($player->isCreative()) {
                return true;
            }

            $player->addWindow(new EnchantInventory($this));
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
        if ($item->isPickaxe() >= Tool::TIER_WOODEN) {
            return [
                [$this->id, 0, 1],
            ];
        } else {
            return [];
        }
    }
}
