<?php
/**
 * src/pocketmine/block/Transparent.php
 *
 * @package default
 */




namespace pocketmine\block;

abstract class Transparent extends Block
{

    /**
     *
     * @return unknown
     */
    public function isTransparent()
    {
        return true;
    }
}
