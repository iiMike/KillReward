<?php

  namespace KillReward\Goldish;
  
  use pocketmine\plugin\PluginBase;
  use pocketmine\Player;
  use onebone\economyapi\EconomyAPI;

  class Main extends PluginBase implements PluginBase {
  
     public function onEnable(){
		$this->essentials = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI");
		if($this->isEconomyAPIExists() !== false){
			$this->getLogger()->info("§dLoaded with EconomyAPI");
		}
		$this->getLogger()->info("§aLoaded Successfully!");
	}
                        
      public function onPlayerDeath(PlayerDeathEvent $event){
            $player = $event->getPlayer();
            $cause = $player->getLastDamageCause();
                $killer = $cause->getDamager();
            if($killer instanceof Player){
        $this->api->addMoney($killer->getName(),25);
                $killer->sendMessage("§7(§6Kingdom§7) §bYou killed a player and got §a25 Tokens§b! Awesome!");
            }
      }
      }
