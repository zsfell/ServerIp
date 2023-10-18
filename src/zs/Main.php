<?php

namespace zs;

use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Server;

class Main extends PluginBase {

    public function onEnable():void {
        $this->getLogger()->info("ServerIP has been enabled");
    }

    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool {
        if ($command->getName() === "getip") {
            $url = "https://ipinfo.io/ip";

            $content = @file_get_contents($url);

            if ($content !== false) {
                $sender->sendMessage("Server IP: " . substr($content, 0, 10));
            } else {
                $sender->sendMessage("Failed to open $url");
            }

            return true;
        }
        return false;
    }
}