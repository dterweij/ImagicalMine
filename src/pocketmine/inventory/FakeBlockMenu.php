<?php
/**
 * src/pocketmine/inventory/FakeBlockMenu.php
 *
 * @package default
 */




namespace pocketmine\inventory;

use pocketmine\level\Position;

class FakeBlockMenu extends Position implements InventoryHolder
{

    private $inventory;

    /**
     *
     * @param Inventory $inventory
     * @param Position  $pos
     */
    public function __construct(Inventory $inventory, Position $pos)
    {
        $this->inventory = $inventory;
        parent::__construct($pos->x, $pos->y, $pos->z, $pos->level);
    }


    /**
     *
     * @return unknown
     */
    public function getInventory()
    {
        return $this->inventory;
    }
}
