<?php
/**
 * src/pocketmine/block/Sponge.php
 *
 * @package default
 */




namespace pocketmine\block;

class Sponge extends Solid
{

    protected $id = self::SPONGE;


    public function __construct()
    {
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
    public function getName()
    {
        return "Sponge";
    }
}
