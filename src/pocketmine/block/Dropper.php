<?php
/**
 * src/pocketmine/block/Dropper.php
 *
 * @package default
 */



namespace pocketmine\block;

use pocketmine\item\Item;
use pocketmine\item\Tool;
use pocketmine\nbt\NBT;
use pocketmine\nbt\tag\{CompoundTag, ListTag, IntTag, StringTag};
use pocketmine\Player;
use pocketmine\tile\Tile;
use pocketmine\tile\Dropper as TileDropper;

class Dropper extends Solid{
	protected $id = self::DROPPER;

	/**
	 *
	 * @param unknown $meta (optional)
	 */
	public function __construct($meta = 0) {
		$this->meta = $meta;
	}


	/**
	 *
	 * @return unknown
	 */
	public function getName() {
		return "Dropper";
	}



	/**
	 *
	 * @return unknown
	 */
	public function getToolType() {
		return Tool::TYPE_PICKAXE;
	}



	/**
	 *
	 * @return unknown
	 */
	public function canBeActivated() {
		return false;
	}


	/**
	 *
	 * @return unknown
	 */
	public function getHardness() {
		return 3.5;
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
	public function place(Item $item, Block $block, Block $target, $face, $fx, $fy, $fz, Player $player = null) {
		$faces = [
			0 => 4,
			1 => 2,
			2 => 5,
			3 => 3,
		];
		$this->meta = $faces[$player instanceof Player ? $player->getDirection() : 0];
		$this->getLevel()->setBlock($block, $this, true, true);
		$nbt = new CompoundTag("", [
				new ListTag("Items", []),
				new StringTag("id", Tile::DROPPER),
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
		Tile::createTile("Dropper", $this->getLevel()->getChunk($this->x >> 4, $this->z >> 4), $nbt);
		return true;
	}


	/**
	 *
	 * @param Item    $item
	 * @param Player  $player (optional)
	 * @return unknown
	 */
	public function onActivate(Item $item, Player $player = null) {
		if ($player instanceof Player) {
			$t = $this->getLevel()->getTile($this);
			$dropper = null;
			if ($t instanceof TileDropper) {
				$dropper = $t;
			}else {
				$nbt = new CompoundTag("", [
						new ListTag("Items", []),
						new StringTag("id", Tile::DROPPER),
						new IntTag("x", $this->x),
						new IntTag("y", $this->y),
						new IntTag("z", $this->z)
					]);
				$nbt->Items->setTagType(NBT::TAG_Compound);
				$dropper = Tile::createTile("Dropper", $this->getLevel()->getChunk($this->x >> 4, $this->z >> 4), $nbt);
			}
			if (isset($dropper->namedtag->Lock) and $dropper->namedtag->Lock instanceof StringTag) {
				if ($dropper->namedtag->Lock->getValue() !== $item->getCustomName()) {
					return true;
				}
			}
			$player->addWindow($dropper->getInventory());
		}
		return true;
	}


	/**
	 *
	 * @param Item    $item
	 * @return unknown
	 */
	public function getDrops(Item $item) {
		$drops = [];
		if ($item->isPickaxe() >= Tool::TIER_WOODEN) {
			$drops [] = [$this->id, 0, 1];
		}

		return $drops;
	}


}
