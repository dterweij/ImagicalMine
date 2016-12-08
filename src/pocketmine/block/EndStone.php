<?php
/**
 * src/pocketmine/block/EndStone.php
 *
 * @package default
 */




namespace pocketmine\block;

use pocketmine\item\Tool;

class EndStone extends Solid
{

    protected $id = self::END_STONE;


    public function __construct()
    {
    }


    /**
     *
     * @return unknown
     */
    public function getName()
    {
        return "End Stone";
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
        return 3;
    }
}
