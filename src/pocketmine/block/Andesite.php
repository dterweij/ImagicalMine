<?php

namespace pocketmine\block;

use pocketmine\item\Item;
use pocketmine\item\Tool;

class Andesite extends Solid
{

    protected $id = 1;

    public function __construct($meta = 5)
    {
        $this->meta = $meta;
    }

    public function getHardness()
    {
        return 1.5;
    }
    public function getToolType()
    {
        return Tool::TYPE_PICKAXE;
    }
    public function getName()
    {
        return "Andesite";
    }
    public function getDrops(Item $item)
    {
        if ($item->isPickaxe() >= Tool::TIER_WOODEN) {
            return [
                [Item::ANDESITE, $this->meta, 1],
            ];
        } else {
            return [];
        }
    }
}
