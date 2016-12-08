<?php
/**
 * src/pocketmine/block/BrewingStand.php
 *
 * @package default
 */




namespace pocketmine\block;


use pocketmine\item\Item;
use pocketmine\item\Tool;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\nbt\tag\IntTag;
use pocketmine\nbt\tag\StringTag;
use pocketmine\Player;
use pocketmine\tile\Tile;
use pocketmine\tile\BrewingStand as TileBrewingStand;
use pocketmine\math\Vector3;

class BrewingStand extends Transparent{

	protected $id = self::BREWING_STAND_BLOCK;

	/**
	 *
	 * @param unknown $meta (optional)
	 */
	public function __construct($meta = 0) {
		$this->meta = $meta;
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
		if ($block->getSide(Vector3::SIDE_DOWN)->isTransparent() === false) {
			$this->getLevel()->setBlock($block, $this, true, true);
			$nbt = new CompoundTag("", [
					new StringTag("id", Tile::BREWING_STAND),
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

			Tile::createTile(Tile::BREWING_STAND, $this->getLevel()->getChunk($this->x >> 4, $this->z >> 4), $nbt);

			return true;
		}
		return false;
	}


	/**
	 *
	 * @return unknown
	 */
	public function canBeActivated() {
		return true;
	}


	/**
	 *
	 * @return unknown
	 */
	public function getHardness() {
		return 3;
	}


	/**
	 *
	 * @return unknown
	 */
	public function getName() : string{
		return "Brewing Stand";
	}


	/**
	 *
	 * @param Item    $item
	 * @param Player  $player (optional)
	 * @return unknown
	 */
	public function onActivate(Item $item, Player $player = null) {
		if ($player instanceof Player) {
			//TODO lock
			if ($player->isCreative()) {
				return true;
			}

			$t = $this->getLevel()->getTile($this);

			if ($t instanceof TileBrewingStand) {
				$player->addWindow($t->getInventory());
			}
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
			$drops[] = [Item::BREWING_STAND, 0, 1];
		}

		return $drops;
	}


}
