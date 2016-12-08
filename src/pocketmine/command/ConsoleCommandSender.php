<?php
/**
 * src/pocketmine/command/ConsoleCommandSender.php
 *
 * @package default
 */




namespace pocketmine\command;

use pocketmine\event\TextContainer;
use pocketmine\permission\PermissibleBase;
use pocketmine\permission\PermissionAttachment;
use pocketmine\plugin\Plugin;
use pocketmine\Server;
use pocketmine\utils\MainLogger;

class ConsoleCommandSender implements CommandSender
{

    private $perm;


    public function __construct()
    {
        $this->perm = new PermissibleBase($this);
    }


    /**
     *
     * @param \pocketmine\permission\Permission|string $name
     * @return bool
     */
    public function isPermissionSet($name)
    {
        return $this->perm->isPermissionSet($name);
    }


    /**
     *
     * @param \pocketmine\permission\Permission|string $name
     * @return bool
     */
    public function hasPermission($name)
    {
        return $this->perm->hasPermission($name);
    }


    /**
     *
     * @param Plugin  $plugin
     * @param string  $name   (optional)
     * @param bool    $value  (optional)
     * @return \pocketmine\permission\PermissionAttachment
     */
    public function addAttachment(Plugin $plugin, $name = null, $value = null)
    {
        return $this->perm->addAttachment($plugin, $name, $value);
    }


    /**
     *
     * @param PermissionAttachment $attachment
     * @return void
     */
    public function removeAttachment(PermissionAttachment $attachment)
    {
        $this->perm->removeAttachment($attachment);
    }



    public function recalculatePermissions()
    {
        $this->perm->recalculatePermissions();
    }


    /**
     *
     * @return \pocketmine\permission\PermissionAttachmentInfo[]
     */
    public function getEffectivePermissions()
    {
        return $this->perm->getEffectivePermissions();
    }
    
    
    
    public function sendPopup(string $message, $title = null) { // This will send an notify to the person
    switch(true) {
            
            
            
            case stristr(PHP_OS, 'DAR'): // Mac
            exec('osascript -e \'display notification "' . $message . '" with title "' . $title . '"\'');
            exec('osascript -e \'beep\'');
            break;
            
            
            case stristr(PHP_OS, 'WIN'): // Windows
            exec("cscript MessageBox.vbs {$message}");
            break;
            
            
            case stristr(PHP_OS, "LINUX"): // Linux
            exec('notify-send "' . $message . '"');
            break;
        }
    }
    
    public function sendTip(string $message, $title = null, array $buttons = ["Close"] /*For MACOSX and Linux*/) { // This will send an alert to the owner
        switch(true) {
            
            
            
            case stristr(PHP_OS, 'DAR'): // Mac
            exec('osascript -e \'display dialog "' . $message . '" with icon note buttons {"' . implode('", "', $buttons) . '"} default button {"' . $buttons[0] . '"}\'');
            break;
            
            
            case stristr(PHP_OS, 'WIN'): // Windows
            $message = htmlspecialchars($message);
            exec("mshta javascript:alert('{$message}');window.close();");
            break;
            
            
            case stristr(PHP_OS, "LINUX"): // Linux
            exec('dialog --title "' . $title . '"  --nook--cancel-label "Ok" --msgbox "' . $message . '" off 2> $FICHTMP');
            break;
        }
    }
    /**
     *
     * @return bool
     */
    public function isPlayer()
    {
        return false;
    }


    /**
     *
     * @return \pocketmine\Server
     */
    public function getServer()
    {
        return Server::getInstance();
    }


    /**
     *
     * @param string  $message
     */
    public function sendMessage($message)
    {
        if ($message instanceof TextContainer) {
            $message = $this->getServer()->getLanguage()->translate($message);
        } else {
            $message = $this->getServer()->getLanguage()->translateString($message);
        }

        foreach (explode("\n", trim($message)) as $line) {
            MainLogger::getLogger()->info($line);
        }
    }


    /**
     *
     * @return string
     */
    public function getName()
    {
        return "CONSOLE";
    }


    /**
     *
     * @return bool
     */
    public function isOp()
    {
        return true;
    }


    /**
     *
     * @param bool    $value
     */
    public function setOp($value)
    {
    }
}
