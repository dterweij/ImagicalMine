<?php
/**
 * src/pocketmine/block/Workbench.php
 *
 * @package default
 */




namespace pocketmine\block;

use pocketmine\item\Item;
use pocketmine\item\Tool;
use pocketmine\Player;

//TODO: check orientation
class Workbench extends Solid
{

    protected $id = self::WORKBENCH;

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
        return 2.5;
    }


    /**
     *
     * @return unknown
     */
    public function getName()
    {
        return "Crafting Table";
    }


    /**
     *
     * @return unknown
     */
    public function getToolType()
    {
        return Tool::TYPE_AXE;
    }


    /**
     *
     * @param Item    $item
     * @param Player  $player (optional)
     * @return unknown
     */
    public function onActivate(Item $item, Player $player = null)
    {
        if ($player instanceof Player) {
            $player->craftingType = 1;
        }

        return true;
    }


    /**
     *
     * @param Item    $item
     * @return unknown
     */
    public function getDrops(Item $item)
    {
        return [
            [$this->id, 0, 1],
        ];
    }
}
