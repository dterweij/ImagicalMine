<?php
/**
 * src/pocketmine/block/Flowable.php
 *
 * @package default
 */




namespace pocketmine\block;

abstract class Flowable extends Transparent
{

    /**
     *
     * @return unknown
     */
    public function canBeFlowedInto()
    {
        return true;
    }


    /**
     *
     * @return unknown
     */
    public function getHardness()
    {
        return 0;
    }


    /**
     *
     * @return unknown
     */
    public function getResistance()
    {
        return 0;
    }


    /**
     *
     * @return unknown
     */
    public function isSolid()
    {
        return false;
    }


    /**
     *
     * @return unknown
     */
    public function getBoundingBox()
    {
        return null;
    }
}
