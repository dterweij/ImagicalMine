<?php
/**
 * src/pocketmine/block/Podzol.php
 *
 * @package default
 */




namespace pocketmine\block;

use pocketmine\item\Tool;

class Podzol extends Solid
{

    protected $id = self::PODZOL;


    public function __construct()
    {
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
        return "Podzol";
    }


    /**
     *
     * @return unknown
     */
    public function getHardness()
    {
        return 2.5;
    }
}
