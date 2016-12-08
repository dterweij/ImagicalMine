<?php
/**
 * src/pocketmine/inventory/Recipe.php
 *
 * @package default
 */




namespace pocketmine\inventory;

use pocketmine\utils\UUID;

interface Recipe
{

    /**
     *
     * @return \pocketmine\item\Item
     */
    public function getResult();


    public function registerToCraftingManager();

    /**
     *
     * @return UUID
     */
    public function getId();
}
