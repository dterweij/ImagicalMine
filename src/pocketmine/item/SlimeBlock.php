<?php
namespace pocketmine\block;
use pocketmine\item\Item;
use pocketmine\Player;
class SlimeBlock extends Solid{
	protected $id = self::SLIME_BLOCK;
	public function __construct(){
		
	}
	public function getHardness(){
		return 0;
	}
	public function getName(){
		return "Slime Block";
	}
	public function getDrops(Item $item){
		return [
			[Item::SLIME_BLOCK, 0, 1],
		];
	}
	
	public function onUpdate($type){
	}
	public function onActivate(Item $item, Player $player = null){
		return false;
	}
}
