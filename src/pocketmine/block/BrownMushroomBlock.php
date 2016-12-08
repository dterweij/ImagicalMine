<?php
/**
 * src/pocketmine/block/BrownMushroomBlock.php
 *
 * @package default
 */




namespace pocketmine\block;

use pocketmine\item\Item;
use pocketmine\item\Tool;

class BrownMushroomBlock extends Solid
{

    protected $id = self::BROWN_MUSHROOM_BLOCK;

    /**
     *
     * @param unknown $meta (optional)
     */
    public function __construct($meta = 15)
    {
        $this->meta = $meta;
    }


    /**
     *
     * @return unknown
     */
    public function getToolType()
    {
        return Tool::TYPE_AXE;
    }


    /**
     *
     * @return unknown
     */
    public function getName()
    {
        return "Brown Mushroom Block";
    }


    /**
     *
     * @return unknown
     */
    public function getHardness()
    {
        return 0.1;
    }



    /**
     *
     * @param Item    $item
     * @return unknown
     */
    public function getDrops(Item $item)
    {
        $drops = [];
        if (mt_rand(1, 20) === 1) { //Brown Mushrooms
            $drops[] = [Item::BROWN_MUSHROOM, $this->meta & 0x03, 1];
        }
        return $drops;
    }
}
