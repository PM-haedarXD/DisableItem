<?php

declare(strict_types=1);

namespace haedarXD\DisableItem;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\block\BlockPlaceEvent;
use pocketmine\event\player\PlayerItemUseEvent;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\event\entity\EntityItemPickupEvent;
use pocketmine\event\server\CommandEvent;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\inventory\CreativeInventory;
use pocketmine\scheduler\ClosureTask;
use pocketmine\player\Player;
use pocketmine\utils\TextFormat;
use pocketmine\utils\Config;

class Main extends PluginBase implements Listener {

    private Config $config;
    private array $disabledItems = [];
    private bool $blockPlace;
    private bool $blockUse;
    private bool $blockPickup;
    private bool $blockCommand;
    private bool $removeCreative;
    private bool $showMessage;
    private string $message;

    public function onEnable(): void {
        $this->saveDefaultConfig();
        $this->config = new Config($this->getDataFolder() . "config.yml", Config::YAML);

        $this->disabledItems = $this->config->get("disabled-items", []);
        $this->blockPlace = $this->config->get("block-place", true);
        $this->blockUse = $this->config->get("block-use", true);
        $this->blockPickup = $this->config->get("block-pickup", true);
        $this->blockCommand = $this->config->get("block-command", true);
        $this->removeCreative = $this->config->get("remove-creative", true);
        $this->showMessage = $this->config->get("show-message", false);
        $this->message = $this->config->get("message", "This item is disabled");

        $this->getServer()->getPluginManager()->registerEvents($this, $this);

        if ($this->removeCreative) {
            $this->getScheduler()->scheduleDelayedTask(new ClosureTask(function(): void {
                $this->removeFromCreative();
            }), 20);
        }
    }

    private function checkItem(string $itemName, int $itemId): bool {
        foreach ($this->disabledItems as $disabled) {
            $disabled = strtolower((string) $disabled);
            if (
                str_contains(strtolower($itemName), $disabled) ||
                (string) $itemId === $disabled
            ) {
                return true;
            }
        }
        return false;
    }

    private function removeFromCreative(): void {
        $creative = CreativeInventory::getInstance();
        foreach ($creative->getAll() as $item) {
            if ($this->checkItem($item->getVanillaName(), $item->getTypeId())) {
                $creative->remove($item);
            }
        }
    }

    public function onJoin(PlayerJoinEvent $event): void {
        if (!$this->removeCreative) return;
        $this->removeFromCreative();
    }

    public function onPlace(BlockPlaceEvent $event): void {
        if (!$this->blockPlace) return;
        $item = $event->getItem();
        if ($this->checkItem($item->getVanillaName(), $item->getTypeId())) {
            $event->cancel();
            if ($this->showMessage) {
                $event->getPlayer()->sendMessage(TextFormat::RED . $this->message);
            }
        }
    }

    public function onItemUse(PlayerItemUseEvent $event): void {
        if (!$this->blockUse) return;
        $item = $event->getItem();
        if ($this->checkItem($item->getVanillaName(), $item->getTypeId())) {
            $event->cancel();
            if ($this->showMessage) {
                $event->getPlayer()->sendMessage(TextFormat::RED . $this->message);
            }
        }
    }

    public function onInteract(PlayerInteractEvent $event): void {
        if (!$this->blockUse) return;
        $item = $event->getItem();
        if ($this->checkItem($item->getVanillaName(), $item->getTypeId())) {
            $event->cancel();
            if ($this->showMessage) {
                $event->getPlayer()->sendMessage(TextFormat::RED . $this->message);
            }
        }
    }

    public function onPickup(EntityItemPickupEvent $event): void {
        if (!$this->blockPickup) return;
        $item = $event->getItem();
        if ($this->checkItem($item->getVanillaName(), $item->getTypeId())) {
            $event->cancel();
        }
    }

    public function onCmd(CommandEvent $event): void {
        if (!$this->blockCommand) return;
        $parts = preg_split('/\s+/', strtolower($event->getCommand()), -1, PREG_SPLIT_NO_EMPTY);
        if ($parts === false || count($parts) < 3) return;
        if (($parts[0] === "give" || $parts[0] === "minecraft:give") && isset($parts[2])) {
            $itemName = $parts[2];
            $itemId = is_numeric($itemName) ? (int) $itemName : 0;
            if ($this->checkItem($itemName, $itemId)) {
                $event->cancel();
                if ($this->showMessage) {
                    $sender = $event->getSender();
                    if ($sender instanceof Player) {
                        $sender->sendMessage(TextFormat::RED . $this->message);
                    }
                }
            }
        }
    }
}
