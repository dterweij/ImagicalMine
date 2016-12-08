<?php
/**
 * src/pocketmine/inventory/ContainerInventory.php
 *
 * @package default
 */




namespace pocketmine\inventory;

use pocketmine\math\Vector3;
use pocketmine\network\protocol\ContainerClosePacket;
use pocketmine\network\protocol\ContainerOpenPacket;
use pocketmine\Player;

abstract class ContainerInventory extends BaseInventory
{

    /**
     *
     * @param Player  $who
     */
    public function onOpen(Player $who)
    {
        parent::onOpen($who);
        $pk = new ContainerOpenPacket();
        $pk->windowid = $who->getWindowId($this);
        $pk->type = $this->getType()->getNetworkType();
        $pk->slots = $this->getSize();
        $holder = $this->getHolder();
        if ($holder instanceof Vector3) {
            $pk->x = $holder->getX();
            $pk->y = $holder->getY();
            $pk->z = $holder->getZ();
        } else {
            $pk->x = $pk->y = $pk->z = 0;
        }

        /*if($holder instanceof Tile){
            $pk->entityId = $holder->getId();
        }*/

        $who->dataPacket($pk);

        $this->sendContents($who);
    }


    /**
     *
     * @param Player  $who
     */
    public function onClose(Player $who)
    {
        $pk = new ContainerClosePacket();
        $pk->windowid = $who->getWindowId($this);
        $who->dataPacket($pk);
        parent::onClose($who);
    }
}
