<?php
/**
 * src/pocketmine/block/StillWater.php
 *
 * @package default
 */




namespace pocketmine\block;

class StillWater extends Water
{

    protected $id = self::STILL_WATER;

    /**
     *
     * @return unknown
     */
    public function getName()
    {
        return "Still Water";
    }
}
