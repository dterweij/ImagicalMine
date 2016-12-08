<?php
/**
 * src/pocketmine/command/RemoteConsoleCommandSender.php
 *
 * @package default
 */




namespace pocketmine\command;

use pocketmine\event\TextContainer;

class RemoteConsoleCommandSender extends ConsoleCommandSender
{

    /** @var string */
    private $messages = "";

    /**
     *
     * @param unknown $message
     */
    public function sendMessage($message)
    {
        if ($message instanceof TextContainer) {
            $message = $this->getServer()->getLanguage()->translate($message);
        } else {
            $message = $this->getServer()->getLanguage()->translateString($message);
        }

        $this->messages .= trim($message, "\r\n") . "\n";
    }


    /**
     *
     * @return unknown
     */
    public function getMessage()
    {
        return $this->messages;
    }


    /**
     *
     * @return unknown
     */
    public function getName()
    {
        return "Rcon";
    }
}
