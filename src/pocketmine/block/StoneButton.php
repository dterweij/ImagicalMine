<?php
/**
 * src/pocketmine/block/StoneButton.php
 *
 * @package default
 */




namespace pocketmine\block;

use pocketmine\item\Tool;

class StoneButton extends WoodenButton
{
    protected $id = self::STONE_BUTTON;

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
    public function getName()
    {
        return "Stone Button";
    }



    /**
     *
     * @return unknown
     */
    public function getToolType()
    {
        return Tool::TYPE_PICKAXE;
    }
}
