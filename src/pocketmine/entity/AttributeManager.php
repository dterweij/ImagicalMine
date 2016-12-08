<?php
/**
 * src/pocketmine/entity/AttributeManager.php
 *
 * @package default
 */




namespace pocketmine\entity;

use pocketmine\Player;

class AttributeManager
{

    const MAX_HEALTH = 0;
    const MAX_HUNGER = 1;

    const EXPERIENCE = 2;
    const EXPERIENCE_LEVEL = 3;
    const MOVEMENTSPEED = 4;

    /** @var Attribute[] */
    protected $attributes = [];

    /** @var Player */
    protected $player;

    /**
     *
     * @param unknown $player
     */
    public function __construct($player)
    {
        $this->player = $player;
    }



    public function init()
    {
        self::addAttribute(self::MAX_HEALTH, "generic.health", 0, 20, 20, true);
        self::addAttribute(self::MAX_HUNGER, "player.hunger", 0, 20, 20, true);
        self::addAttribute(self::EXPERIENCE, "player.experience", 0, 24791, 0, true);
        self::addAttribute(self::EXPERIENCE_LEVEL, "player.level", 0, 24791, 0, true);
        self::addAttribute(self::MOVEMENTSPEED, "generic.movementSpeed", 0, 24791, 0.1, true);
    }


    /**
     *
     * @return unknown
     */
    public function getPlayer()
    {
        return $this->getPlayer();
    }


    /**
     *
     * @param int     $id
     * @param string  $name
     * @param float   $minValue
     * @param float   $maxValue
     * @param float   $defaultValue
     * @param bool    $shouldSend   (optional)
     * @return Attribute
     */
    public function addAttribute($id, $name, $minValue, $maxValue, $defaultValue, $shouldSend = false)
    {
        if ($minValue > $maxValue or $defaultValue > $maxValue or $defaultValue < $minValue) {
            throw new \InvalidArgumentException("Invalid ranges: min value: $minValue, max value: $maxValue, $defaultValue: $defaultValue");
        }

        return $this->attributes[(int) $id] = new Attribute($id, $name, $minValue, $maxValue, $defaultValue, $shouldSend, $this->player);
    }


    /**
     *
     * @param unknown $id
     * @return null|Attribute
     */
    public function getAttribute($id)
    {
        return isset($this->attributes[$id]) ? $this->attributes[$id] : null;
    }


    /**
     *
     * @param unknown $name
     * @return null|Attribute
     */
    public function getAttributeByName($name)
    {
        foreach ($this->attributes as $a) {
            if ($a->getName() === $name) {
                return $a;
            }
        }

        return null;
    }



    public function sendAll()
    {
        foreach ($this->attributes as $attribute) {
            $attribute->send();
        }
    }



    public function resetAll()
    {
        foreach ($this->attributes as $attribute) {
            $attribute->setValue($attribute->getDefaultValue());
        }
    }
}
