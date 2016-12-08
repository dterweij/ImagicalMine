<?php
/**
 * src/pocketmine/inventory/CraftingInventory.php
 *
 * @package default
 */




namespace pocketmine\inventory;

/**
 * Manages crafting operations
 * This class includes future methods for shaped crafting
 *
 * TODO: add small matrix inventory
 */
class CraftingInventory extends BaseInventory
{

    /** @var Inventory */
    private $resultInventory;

    /**
     *
     * @throws \Exception
     * @param InventoryHolder $holder
     * @param Inventory       $resultInventory
     * @param InventoryType   $inventoryType
     */
    public function __construct(InventoryHolder $holder, Inventory $resultInventory, InventoryType $inventoryType)
    {
        if ($inventoryType->getDefaultTitle() !== "Crafting") {
            throw new \InvalidStateException("Invalid Inventory type, expected CRAFTING or WORKBENCH");
        }
        $this->resultInventory = $resultInventory;
        parent::__construct($holder, $inventoryType);
    }


    /**
     *
     * @return Inventory
     */
    public function getResultInventory()
    {
        return $this->resultInventory;
    }


    /**
     *
     * @return unknown
     */
    public function getSize()
    {
        return $this->getResultInventory()->getSize() + parent::getSize();
    }
}
