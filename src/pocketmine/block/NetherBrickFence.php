<?php
/**
 * src/pocketmine/block/NetherBrickFence.php
 *
 * @package default
 */



namespace pocketmine\block;

use pocketmine\item\Item;
use pocketmine\item\Tool;

class NetherBrickFence extends Transparent
{

    protected $id = self::NETHER_BRICK_FENCE;

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
     * @param Item    $item
     * @return unknown
     */
    public function getBreakTime(Item $item)
    {
        if ($item instanceof Air) {
            //Breaking by hand
            return 10;
        } else {
            // Other breaktimes are equal to woodfences.
            return parent::getBreakTime($item);
        }
    }


    /**
     *
     * @return unknown
     */
    public function getHardness()
    {
        return 2;
    }



    /**
     *
     * @return unknown
     */
    public function getToolType()
    {
        return Tool::TYPE_PICKAXE;
    }



    /**
     *
     * @return unknown
     */
    public function getName()
    {
        return "Nether Brick Fence";
    }



    /**
     *
     * @param Block   $block
     * @return unknown
     */
    public function canConnect(Block $block)
    {
        //TODO: activate comments when the NetherBrickFenceGate class has been created.
        return ($block instanceof NetherBrickFence /* or $block instanceof NetherBrickFenceGate */) ? true : $block->isSolid() and !$block->isTransparent();
    }


    /**
     *
     * @param Item    $item
     * @return unknown
     */
    public function getDrops(Item $item)
    {
        if ($item->isPickaxe() >= Tool::TIER_WOODEN) {
            return [
                [$this->id, $this->meta, 1],
            ];
        } else {
            return [];
        }
    }
}
