<?php
/**
 * src/pocketmine/block/Dirt.php
 *
 * @package default
 */




namespace pocketmine\block;

use pocketmine\item\Item;
use pocketmine\item\Tool;
use pocketmine\Player;

class Dirt extends Solid
{

    protected $id = self::DIRT;


    public function __construct()
    {
    }


    /**
     *
     * @return unknown
     */
    public function canBeActivated()
    {
        return true;
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
        return "Dirt";
    }


    /**
     *
     * @param Item    $item
     * @param Player  $player (optional)
     * @return unknown
     */
    public function onActivate(Item $item, Player $player = null)
    {
        if ($item->isHoe()) {
            $item->useOn($this);
            $this->getLevel()->setBlock($this, Block::get(Item::FARMLAND, 0), true);

            return true;
        }

        return false;
    }
}
