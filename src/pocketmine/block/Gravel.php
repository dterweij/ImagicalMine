<?php
/**
 * src/pocketmine/block/Gravel.php
 *
 * @package default
 */




namespace pocketmine\block;

use pocketmine\item\Item;
use pocketmine\item\Tool;

class Gravel extends Fallable
{

    protected $id = self::GRAVEL;


    public function __construct()
    {
    }


    /**
     *
     * @return unknown
     */
    public function getName()
    {
        return "Gravel";
    }


    /**
     *
     * @return unknown
     */
    public function getHardness()
    {
        return 0.6;
    }


    /**
     *
     * @return unknown
     */
    public function getToolType()
    {
        return Tool::TYPE_SHOVEL;
    }


    /**
     *
     * @param Item    $item
     * @return unknown
     */
    public function getDrops(Item $item)
    {
        if (mt_rand(1, 10) === 1) {
            return [
                [Item::FLINT, 0, 1],
            ];
        }

        return [
            [Item::GRAVEL, 0, 1],
        ];
    }
}
