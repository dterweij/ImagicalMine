<?php
/**
 * src/pocketmine/block/Wheat.php
 *
 * @package default
 */




namespace pocketmine\block;

use pocketmine\item\Item;

class Wheat extends Crops
{

    protected $id = self::WHEAT_BLOCK;

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
        return "Wheat Block";
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
            $drops[] = [Item::WHEAT, 0, 1];
            $drops[] = [Item::WHEAT_SEEDS, 0, mt_rand(0, 3)];
        } else {
            $drops[] = [Item::WHEAT_SEEDS, 0, 1];
        }

        return $drops;
    }
}
