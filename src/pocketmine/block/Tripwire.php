<?php
/**
 * src/pocketmine/block/Tripwire.php
 *
 * @package default
 */




namespace pocketmine\block;

use pocketmine\item\Item;
use pocketmine\math\AxisAlignedBB;
use pocketmine\entity\Entity;
use pocketmine\math\Vector3;
use pocketmine\level\Level;

class Tripwire extends Flowable
{

    protected $id = self::TRIPWIRE;

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
    public function isSolid()
    {
        return false;
    }


    /**
     *
     * @return unknown
     */
    public function getName()
    {
        return "Tripwire";
    }


    /**
     *
     * @return unknown
     */
    public function getHardness()
    {
        return 0.1;
    }


    /**
     *
     * @return unknown
     */
    public function canPassThrough()
    {
        return true;
    }


    /**
     *
     * @return unknown
     */
    protected function recalculateBoundingBox()
    {
        if ($this->getSide(Vector3::SIDE_DOWN) instanceof Transparent) {
            return new AxisAlignedBB(
                $this->x,
                $this->y,
                $this->z,
                $this->x + 1,
                $this->y + 0.5,
                $this->z + 1
            );
        } else {
            return new AxisAlignedBB(
                $this->x,
                $this->y,
                $this->z,
                $this->x + 1,
                $this->y + 0.09375,
                $this->z + 1
            );
        }
    }


    /**
     *
     * @param Item    $item
     * @return unknown
     */
    public function getDrops(Item $item)
    {
        $drops = [];
        $drops[] = [Item::STRING, 0, 1];

        return $drops;
    }



    /**
     *
     * @param unknown $type
     * @return unknown
     */
    public function onUpdate($type)
    {
        if ($type === Level::BLOCK_UPDATE_NORMAL) {
            $this->recalculateBoundingBox();
        }
        return false;
    }



    /**
     * Test if tripwire is currently activated
     *
     * @return true if activated, false if not
     */
    public function isActivated()
    {
        return ($this->getDamage() & 0x04) != 0;
    }



    /**
     * Set tripwire activated state
     *
     * @param unknown $act - true if activated, false if not
     */
    public function setActivated($act)
    {
        $dat = $this->getDamage() & (0x08 | 0x03);
        if ($act) {
            $dat |= 0x04;
        }
        $this->setDamage($dat);
    }



    /**
     * Test if object triggering this tripwire directly
     *
     * @return true if object activating tripwire, false if not
     */
    public function isObjectTriggering()
    {
        return ($this->getDamage() & 0x01) != 0;
    }


    /**
     * Set object triggering state for this tripwire
     *
     * @param trig          - true if object activating tripwire, false if not
     * @param unknown $trig
     */
    public function setObjectTriggering($trig)
    {
        $dat = $this->getDamage() & 0x0E;
        if ($trig) {
            $dat |= 0x01;
        }
        $this->setDamage($dat);
    }



    /**
     *
     * @return unknown
     */
    public function __toString()
    {
        return $this->getDamage() . ($this->isActivated()?" Activated":"") . ($this->isObjectTriggering()?" Triggered":"");
    }



    /**
     *
     * @param Entity  $entity
     */
    public function onEntityCollide(Entity $entity)
    {
        $this->setActivated(true);
        $this->getLevel()->scheduleUpdate($this, 0);
        if ($this->getSide(Vector3::SIDE_EAST) instanceof Tripwire) {
            $this->getLevel()->scheduleUpdate($this->getSide(Vector3::SIDE_EAST), 0);
        }
        if ($this->getSide(Vector3::SIDE_NORTH) instanceof Tripwire) {
            $this->getLevel()->scheduleUpdate($this->getSide(Vector3::SIDE_NORTH), 0);
        }
        if ($this->getSide(Vector3::SIDE_SOUTH) instanceof Tripwire) {
            $this->getLevel()->scheduleUpdate($this->getSide(Vector3::SIDE_SOUTH), 0);
        }
        if ($this->getSide(Vector3::SIDE_WEST) instanceof Tripwire) {
            $this->getLevel()->scheduleUpdate($this->getSide(Vector3::SIDE_WEST), 0);
        }
    }



    /**
     *
     * @return unknown
     */
    public function isEntityCollided()
    {
        foreach ($this->getLevel()->getChunk($itementity->x >> 4, $itementity->z >> 4)->getEntities() as $entity) {
            if ($this->getLevel()->getBlock($entity->getPosition()) === $this) {
                return true;
            }
        }
        return false;
    }
}
