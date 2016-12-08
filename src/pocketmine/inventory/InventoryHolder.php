<?php
/**
 * src/pocketmine/inventory/InventoryHolder.php
 *
 * @package default
 */




namespace pocketmine\inventory;

interface InventoryHolder
{

    /**
     * Get the object related inventory
     *
     * @return Inventory
     */
    public function getInventory();
}
