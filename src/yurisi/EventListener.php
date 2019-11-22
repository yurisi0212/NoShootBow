<?php
namespace yurisi;

use pocketmine\Player;
use pocketmine\event\entity\EntityShootBowEvent;
use pocketmine\event\Listener;

class EventListener implements Listener{
        private $main;

   public function __construct(main $main)
        {
            $this->main = $main;
        }

   public function onShoot(EntityShootBowEvent $event) {
	$pworld=$event->getEntity()->getLevel();
	$world=$this->main->config->get("WORLD");
	if(strpos($world,',') === false){
		$world=$this->main->getServer()->getLevelByName($world);
		if($pworld==$world){
			$event->setCancelled();
			$event->getEntity()->sendMessage("[{$this->main->plugin}]§4許可エリアで撃てるようになります");
		}
	}else{
		$worlds=explode(",", $world);
		foreach($worlds as $wd){
			$world=$this->main->getServer()->getLevelByName($wd);
			if($pworld==$world){
				$event->setCancelled();
				$event->getEntity()->sendMessage("[{$this->main->plugin}]§4許可エリアで撃てるようになります");
			}
		}
	}
   }
}