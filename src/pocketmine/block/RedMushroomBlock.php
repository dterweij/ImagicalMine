<?php
/**
 * src/pocketmine/block/RedMushroomBlock.php
 *
 * @package default
 */




namespace pocketmine\block;

use pocketmine\item\Item;
use pocketmine\item\Tool;

class RedMushroomBlock extends Solid
{

    protected $id = self::RED_MUSHROOM_BLOCK;

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
        return "Red Mushroom Block";
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
        if (mt_rand(1, 20) === 1) { //Red Mushrooms
            $drops[] = [Item::RED_MUSHROOM, $this->meta & 0x03, 1];
        }
        return $drops;
    }
}
