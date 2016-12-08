<?php
/**
 * src/pocketmine/block/Cactus.php
 *
 * @package default
 */




namespace pocketmine\block;

use pocketmine\entity\Entity;
use pocketmine\event\block\BlockGrowEvent;
use pocketmine\event\entity\EntityDamageByBlockEvent;
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\item\Item;
use pocketmine\level\Level;
use pocketmine\math\AxisAlignedBB;
use pocketmine\math\Vector3;
use pocketmine\Player;
use pocketmine\Server;

class Cactus extends Transparent
{

    protected $id = self::CACTUS;

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
    public function getHardness()
    {
        return 0.4;
    }


    /**
     *
     * @return unknown
     */
    public function hasEntityCollision()
    {
        return true;
    }


    /**
     *
     * @return unknown
     */
    public function getName()
    {
        return "Cactus";
    }


    /**
     *
     * @return unknown
     */
    protected function recalculateBoundingBox()
    {
        return new AxisAlignedBB(
            $this->x + 0.0625,
            $this->y + 0.0625,
            $this->z + 0.0625,
            $this->x + 0.9375,
            $this->y + 0.9375,
            $this->z + 0.9375
        );
    }


    /**
     *
     * @param Entity  $entity
     */
    public function onEntityCollide(Entity $entity)
    {
        $ev = new EntityDamageByBlockEvent($this, $entity, EntityDamageEvent::CAUSE_CONTACT, 1);
        $entity->attack($ev->getFinalDamage(), $ev);
    }


    /**
     *
     * @param unknown $type
     * @return unknown
     */
    public function onUpdate($type)
    {
        if ($type === Level::BLOCK_UPDATE_NORMAL) {
            $down = $this->getSide(0);
            $up = $this->getSide(1);
            if ($down->getId() !== self::SAND and $down->getId() !== self::CACTUS) {
                $this->getLevel()->scheduleUpdate($this, 0);
            } else {
                for ($side = 2; $side <= 5; ++$side) {
                    $b = $this->getSide($side);
                    if (!$b->canBeFlowedInto() && $b->getId() !== Block::SNOW_LAYER) {
                        // Snow can be stacked to a full block beside a cactus without destroying the cactus.
                        $this->getLevel()->useBreakOn($this);
                    }
                }
            }
        } elseif ($type === Level::BLOCK_UPDATE_RANDOM) {
            if ($this->getSide(0)->getId() !== self::CACTUS) {
                if ($this->meta == 0x0F) {
                    for ($y = 1; $y < 3; ++$y) {
                        $b = $this->getLevel()->getBlock(new Vector3($this->x, $this->y + $y, $this->z));
                        if ($b->getId() === self::AIR) {
                            Server::getInstance()->getPluginManager()->callEvent($ev = new BlockGrowEvent($b, new Cactus()));
                            if (!$ev->isCancelled()) {
                                $this->getLevel()->setBlock($b, $ev->getNewState(), true);
                                break;
                            }
                        }
                    }
                    $this->meta = 0;
                    $this->getLevel()->setBlock($this, $this);
                } else {
                    ++$this->meta;
                    $this->getLevel()->setBlock($this, $this);
                }
            }
        } elseif ($type === Level::BLOCK_UPDATE_SCHEDULED) {
            $this->getLevel()->useBreakOn($this);
        }

        return false;
    }


    /**
     *
     * @param Item    $item
     * @param Block   $block
     * @param Block   $target
     * @param unknown $face
     * @param unknown $fx
     * @param unknown $fy
     * @param unknown $fz
     * @param Player  $player (optional)
     * @return unknown
     */
    public function place(Item $item, Block $block, Block $target, $face, $fx, $fy, $fz, Player $player = null)
    {
        $down = $this->getSide(0);
        if ($down->getId() === self::SAND or $down->getId() === self::CACTUS) {
            $block0 = $this->getSide(2);
            $block1 = $this->getSide(3);
            $block2 = $this->getSide(4);
            $block3 = $this->getSide(5);
            if (($block0->getId() === Block::AIR || $block0->getId() === Block::SNOW_LAYER) and ($block1->getId() === Block::AIR || $block1->getId() === Block::SNOW_LAYER) and ($block2->getId() === Block::AIR || $block2->getId() === Block::SNOW_LAYER) and ($block3->getId() === Block::AIR || $block3->getId() === Block::SNOW_LAYER)) { // Snow can be stacked to a full block beside a cactus without destroying the cactus.
                $this->getLevel()->setBlock($this, $this, true);

                return true;
            }
        }

        return false;
    }


    /**
     *
     * @param Item    $item
     * @return unknown
     */
    public function getDrops(Item $item)
    {
        return [
            [$this->id, 0, 1],
        ];
    }
}
