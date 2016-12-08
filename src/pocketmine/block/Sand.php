<?php
/**
 * src/pocketmine/block/Sand.php
 *
 * @package default
 */




namespace pocketmine\block;

use pocketmine\item\Tool;

class Sand extends Fallable
{

    protected $id = self::SAND;

    /**
     *
     * @param unknown $meta (optional)
     */
    public function __construct($meta = 0)
    {
        $this->meta = $meta;
    }


    /**
     *
     * @return unknown
     */
    public function getHardness()
    {
        return 0.5;
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
        if ($this->meta === 0x01) {
            return "Red Sand";
        }

        return "Sand";
    }
}
