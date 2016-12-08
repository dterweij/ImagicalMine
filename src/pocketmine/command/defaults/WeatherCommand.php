<?php



namespace pocketmine\command\defaults;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\TranslationContainer;
use pocketmine\Player;
use pocketmine\utils\TextFormat;

class WeatherCommand extends VanillaCommand
{

    public function __construct($name)
    {
        parent::__construct(
            $name,
            "%pocketmine.command.weather.description",
            "%pocketmine.command.weather.usage"
        );
        $this->setPermission("pocketmine.command.weather.clear;pocketmine.command.weather.rain;pocketmine.command.weather.thunder");
    }

    public function execute(CommandSender $sender, $currentAlias, array $args)
    {
        if (!$this->testPermission($sender)) {
            return true;
        }

        if (count($args) > 2 || count($args) === 0) {
            $sender->sendMessage(new TranslationContainer("commands.weather.usage", [$this->usageMessage]));

            return false;
        }

        if (count($args) > 1) {
            $seconds = (int) $args[1];
        } else {
            $seconds = 600*20;
        }

        if ($sender instanceof Player) {
            $level = $sender->getLevel();
        } else {
            $level = $sender->getServer()->getDefaultLevel();
        }

        if ($args[0] === "clear") {
            if (!$sender->hasPermission("pocketmine.command.weather.clear")) {
                $sender->sendMessage(new TranslationContainer(TextFormat::RED . "%commands.generic.permission"));
                return true;
            }

            $level->setRaining(false);
            $level->setThundering(false);
            $level->setRainTime($seconds * 20);

            Command::broadcastCommandMessage($sender, new TranslationContainer("commands.weather.clear"));

            return true;
        } elseif ($args[0] === "rain") {
            if (!$sender->hasPermission("pocketmine.command.weather.rain")) {
                $sender->sendMessage(new TranslationContainer(TextFormat::RED . "%commands.generic.permission"));
                return true;
            }

            $level->setRaining(true);
            $level->setRainTime($seconds * 20);

            Command::broadcastCommandMessage($sender, new TranslationContainer("commands.weather.rain"));

            return true;
        } elseif ($args[0] === "thunder") {
            if (!$sender->hasPermission("pocketmine.command.weather.thunder")) {
                $sender->sendMessage(new TranslationContainer(TextFormat::RED . "%commands.generic.permission"));
                return true;
            }

            $level->setThundering(true);
            $level->setRainTime($seconds * 20);
            $level->setThunderTime($seconds * 20);

            Command::broadcastCommandMessage($sender, new TranslationContainer("commands.weather.thunder"));

            return true;
        } else {
            $sender->sendMessage(new TranslationContainer("commands.weather.usage",  [$this->usageMessage]));
            return false;
        }
    }
}
