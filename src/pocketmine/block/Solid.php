<?php
/**
 * src/pocketmine/block/Solid.php
 *
 * @package default
 */




namespace pocketmine\block;

abstract class Solid extends Block
{

    /**
     *
     * @return unknown
     */
    public function isSolid()
    {
        return true;
    }
}
