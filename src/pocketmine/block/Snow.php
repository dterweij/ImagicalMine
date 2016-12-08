<?php
/**
 * src/pocketmine/block/Snow.php
 *
 * @package default
 */




namespace pocketmine\block;

use pocketmine\item\Tool;

class Snow extends Solid
{

    protected $id = self::SNOW_BLOCK;


    public function __construct()
    {
    }


    /**
     *
     * @return unknown
     */
    public function getHardness()
    {
        return 0.2;
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
     * @return unknown
     */
    public function getName()
    {
        return "Snow Block";
    }
}
