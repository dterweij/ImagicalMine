<?php

/*
 *
 *  _                       _           _ __  __ _
 * (_)                     (_)         | |  \/  (_)
 *  _ _ __ ___   __ _  __ _ _  ___ __ _| | \  / |_ _ __   ___
 * | | '_ ` _ \ / _` |/ _` | |/ __/ _` | | |\/| | | '_ \ / _ \
 * | | | | | | | (_| | (_| | | (_| (_| | | |  | | | | | |  __/
 * |_|_| |_| |_|\__,_|\__, |_|\___\__,_|_|_|  |_|_|_| |_|\___|
 *                     __/ |
 *                    |___/
 *
 * This program is a third party build by ImagicalMine.
 *
 * ImagicalMine is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * @author ImagicalMine Team
 * @link http://forums.imagicalcorp.ml/
 *
 *
*/

namespace pocketmine\network\protocol;

#include <rules/DataPacket.h>


class ChangeDimensionPacket extends DataPacket{
	const NETWORK_ID = Info::CHANGE_DIMENSION_PACKET;

	const DIMENSION_OVERWORLD = 0;
	const DIMENSION_NETHER = 1;

	public $dimension;
	public $x;
	public $y;
	public $z;
	public $unknown; //bool

	public function decode(){

	}

	public function encode(){
		$this->reset();
		$this->putVarInt($this->dimension);
		$this->putVector3f($this->x, $this->y, $this->z);
		$this->putBool($this->unknown);
	}

}