<?php

namespace yurisi;

use pocketmine\Server;

use pocketmine\plugin\PluginBase;

use pocketmine\utils\Config;

use pocketmine\event\Listener;

class main extends PluginBase implements Listener{

   public $plugin= "NoShootBow" ;

   public function onEnable() {
	$this->getServer()->getPluginManager()->registerEvents(new EventListener($this), $this);
	$this->getLogger()->info("{$this->plugin}を起動しました。");
	if(!file_exists($this->getDataFolder())){
	mkdir($this->getDataFolder(), 0777);
	}
	$this->config = new Config($this->getDataFolder() . "option.yml", Config::YAML ,array(
		"WORLD"=>"world"
	));
   }
   public function onDisable() {
		$this->getLogger()->info("{$this->plugin}を正常に終了しました。");
   }
}
