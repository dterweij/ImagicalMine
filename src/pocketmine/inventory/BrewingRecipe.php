<?php
/**
 * src/pocketmine/inventory/BrewingRecipe.php
 *
 * @package default
 */



namespace pocketmine\inventory;

use pocketmine\item\Item;
use pocketmine\Server;
use pocketmine\utils\UUID;

class BrewingRecipe implements Recipe
{
    private $id = null;

    /** @var Item */
    private $output;

    /** @var  Item|Item[] */
    private $potion;

    /** @var Item */
    private $ingredient;

    /**
     *
     * @param Item    $result
     * @param Item    $ingredient
     * @param Item    $potion
     */
    public function __construct(Item $result, Item $ingredient, Item $potion)
    {
        $this->output = clone $result;
        $this->ingredient = clone $ingredient;
        $this->potion = clone $potion;
    }


    /**
     *
     * @return unknown
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     *
     * @param UUID    $id
     */
    public function setId(UUID $id)
    {
        if ($this->id !== null) {
            throw new \InvalidStateException("Id is already set");
        }

        $this->id = $id;
    }


    /**
     *
     * @param Item    $item
     */
    public function setInput(Item $item)
    {
        $this->ingredient = clone $item;
    }


    /**
     *
     * @return Item
     */
    public function getInput()
    {
        return clone $this->ingredient;
    }


    /**
     *
     * @return unknown
     */
    public function getPotion()
    {
        return clone $this->potion;
    }


    /**
     *
     * @return Item
     */
    public function getResult()
    {
        return clone $this->output;
    }



    public function registerToCraftingManager()
    {
        Server::getInstance()->getCraftingManager()->registerBrewingRecipe($this);
    }
}
