<?php
/**
 * src/pocketmine/block/Planks.php
 *
 * @package default
 */




namespace pocketmine\block;

use pocketmine\item\Tool;

class Planks extends Solid
{
    const OAK = 0;
    const SPRUCE = 1;
    const BIRCH = 2;
    const JUNGLE = 3;
    const ACACIA = 4;
    const DARK_OAK = 5;

    protected $id = self::WOODEN_PLANKS;

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
        return 2;
    }


    /**
     *
     * @return unknown
     */
    public function getToolType()
    {
        return Tool::TYPE_AXE;
    }


    /**
     *
     * @return unknown
     */
    public function getName()
    {
        static $names = [
            self::OAK => "Oak Wood Planks",
            self::SPRUCE => "Spruce Wood Planks",
            self::BIRCH => "Birch Wood Planks",
            self::JUNGLE => "Jungle Wood Planks",
            self::ACACIA => "Acacia Wood Planks",
            self::DARK_OAK => "Dark Oak Wood Planks",
            "",
            ""
        ];
        return $names[$this->meta & 0x07];
    }
}
