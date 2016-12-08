<?php
/**
 * src/pocketmine/block/Beetroot.php
 *
 * @package default
 */




namespace pocketmine\block;

use pocketmine\item\Item;

class Beetroot extends Crops
{

    protected $id = self::BEETROOT_BLOCK;

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
        return "Beetroot Block";
    }


    /**
     *
     * @param Item    $item
     * @return unknown
     */
    public function getDrops(Item $item)
    {
        $drops = [];
        if ($this->meta >= 0x07) {
            $drops[] = [Item::BEETROOT, 0, 1];
            $drops[] = [Item::BEETROOT_SEEDS, 0, mt_rand(0, 3)];
        } else {
            $drops[] = [Item::BEETROOT_SEEDS, 0, 1];
        }

        return $drops;
    }
}
