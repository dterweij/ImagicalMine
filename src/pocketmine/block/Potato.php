<?php
/**
 * src/pocketmine/block/Potato.php
 *
 * @package default
 */




namespace pocketmine\block;

use pocketmine\item\Item;

class Potato extends Crops
{

    protected $id = self::POTATO_BLOCK;

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
        return "Potato Block";
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
            $drops[] = [Item::POTATO, 0, mt_rand(1, 4)];
        } else {
            $drops[] = [Item::POTATO, 0, 1];
        }

        return $drops;
    }
}
