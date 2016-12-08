<?php
/**
 * src/pocketmine/block/HardenedClay.php
 *
 * @package default
 */




namespace pocketmine\block;

use pocketmine\item\Tool;

class HardenedClay extends Solid
{

    protected $id = self::HARDENED_CLAY;


    public function __construct()
    {
    }


    /**
     *
     * @return unknown
     */
    public function getName()
    {
        return "Hardened Clay";
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
    public function getHardness()
    {
        return 1.25;
    }
}
