<?php
/**
 * src/pocketmine/block/Glowstone.php
 *
 * @package default
 */




namespace pocketmine\block;

use pocketmine\item\Item;
use pocketmine\item\Tool;

class Glowstone extends Transparent
{

    protected $id = self::GLOWSTONE_BLOCK;


    public function __construct()
    {
    }


    /**
     *
     * @return unknown
     */
    public function getName()
    {
        return "Glowstone";
    }


    /**
     *
     * @return unknown
     */
    public function getHardness()
    {
        return 0.3;
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
     * @return unknown
     */
    public function getLightLevel()
    {
        return 15;
    }


    /**
     *
     * @param Item    $item
     * @return unknown
     */
    public function getDrops(Item $item)
    {
        return [
            [Item::GLOWSTONE_DUST, 0, mt_rand(2, 4)],
        ];
    }
}
