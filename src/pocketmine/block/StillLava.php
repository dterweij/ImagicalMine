<?php
/**
 * src/pocketmine/block/StillLava.php
 *
 * @package default
 */




namespace pocketmine\block;

class StillLava extends Lava
{

    protected $id = self::STILL_LAVA;

    /**
     *
     * @return unknown
     */
    public function getName()
    {
        return "Still Lava";
    }
}
