<?php
/**
 * src/pocketmine/block/Carrot.php
 *
 * @package default
 */




namespace pocketmine\block;

use pocketmine\item\Item;

class Carrot extends Crops
{

    protected $id = self::CARROT_BLOCK;

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
        return "Carrot Block";
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
            $drops[] = [Item::CARROT, 0, mt_rand(1, 4)];
        } else {
            $drops[] = [Item::CARROT, 0, 1];
        }

        return $drops;
    }
}
