<?php
/**
 * src/pocketmine/entity/ThrownExpBottle.php
 *
 * @package default
 */



/* Thanks Genisys */
namespace pocketmine\entity;

use pocketmine\level\format\FullChunk;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\network\protocol\AddEntityPacket;
use pocketmine\Player;
use pocketmine\level\particle\GenericParticle;

class ThrownExpBottle extends Projectile
{
    const NETWORK_ID = 68;

    public $width = 0.25;
    public $length = 0.25;
    public $height = 0.25;

    protected $gravity = 0.1;
    protected $drag = 0.05;

    /**
     *
     * @param FullChunk   $chunk
     * @param CompoundTag $nbt
     * @param Entity      $shootingEntity (optional)
     */
    public function __construct(FullChunk $chunk, CompoundTag $nbt, Entity $shootingEntity = null)
    {
        parent::__construct($chunk, $nbt, $shootingEntity);
    }


    /**
     *
     * @return unknown
     */
    public function getName()
    {
        return "Thrown Exp Bottle";
    }


    /**
     *
     * @param unknown $currentTick
     * @return unknown
     */
    public function onUpdate($currentTick)
    {
        if ($this->closed) {
            return false;
        }

        $this->timings->startTiming();

        $hasUpdate = parent::onUpdate($currentTick);

        if ($this->age > 1200 or $this->isCollided) {
            $this->kill();
            $this->close();
            $hasUpdate = true;
        }

        if ($this->onGround) {
            $this->kill();
            $this->close();
            $this->getLevel()->addParticle(new GenericParticle($this, 25, 5));
            $this->getLevel()->addExperienceOrb($this->add(0, 1, 0), mt_rand(3, 11));
        }

        $this->timings->stopTiming();

        return $hasUpdate;
    }


    /**
     *
     * @param Player  $player
     */
    public function spawnTo(Player $player)
    {
        $pk = new AddEntityPacket();
        $pk->type = ThrownExpBottle::NETWORK_ID;
        $pk->eid = $this->getId();
        $pk->x = $this->x;
        $pk->y = $this->y;
        $pk->z = $this->z;
        $pk->speedX = $this->motionX;
        $pk->speedY = $this->motionY;
        $pk->speedZ = $this->motionZ;
        $pk->metadata = $this->dataProperties;
        $player->dataPacket($pk);

        parent::spawnTo($player);
    }
}
