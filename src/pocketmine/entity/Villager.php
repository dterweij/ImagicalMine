<?php
/**
 * src/pocketmine/entity/Villager.php
 *
 * @package default
 */




namespace pocketmine\entity;

use pocketmine\nbt\tag\IntTag;
use pocketmine\Player;

class Villager extends Creature implements NPC, Ageable
{
    const NETWORK_ID = 15;

    const PROFESSION_FARMER = 0;
    const PROFESSION_LIBRARIAN = 1;
    const PROFESSION_PRIEST = 2;
    const PROFESSION_BLACKSMITH = 3;
    const PROFESSION_BUTCHER = 4;
    const PROFESSION_GENERIC = 5;

    public $width = 0.938;
    public $length = 0.609;
    public $height = 2;

    /**
     *
     * @return unknown
     */
    public function getName()
    {
        return "Villager";
    }



    protected function initEntity()
    {
        $this->setMaxHealth(20);
        parent::initEntity();

        if (!isset($this->namedtag->Profession)) {
            $this->setProfession(mt_rand(0, 5));
        }
    }


    /**
     *
     * @param Player  $player
     */
    public function spawnTo(Player $player)
    {
        $pk = $this->addEntityDataPacket($player);
        $pk->type = Villager::NETWORK_ID;

        $player->dataPacket($pk);
        parent::spawnTo($player);
    }


    /**
     * Sets the villager profession
     *
     * @param unknown $profession
     */
    public function setProfession($profession)
    {
        $this->namedtag->Profession = new IntTag("Profession", $profession);
    }


    /**
     *
     * @return unknown
     */
    public function getProfession()
    {
        return $this->namedtag["Profession"];
    }


    /**
     *
     * @return unknown
     */
    public function isBaby()
    {
        return $this->getDataFlag(self::DATA_AGEABLE_FLAGS, self::DATA_FLAG_BABY);
    }
}
