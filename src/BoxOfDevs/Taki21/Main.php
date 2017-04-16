<?php

// CREATED BY TAKI21 plz dont eat meh

namespace BoxOfDevs\Taki21;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Server;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\event\Listener;
use pocketmine\math\Vector3;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat as C;
use pocketmine\utils\Config;
use pocketmine\level\Level;
use pocketmine\level\Position;
use pocketmine\event\block\BlockBreakEvent;
use pocketmine\event\block\BlockPlaceEvent;
use pocketmine\block\Block;

class Main extends Pluginbase implements Listener { // pretty sure this is how u do it...
  
  public function onLoad(){
    $this->getLogger()->info(C::GOLD."Loading Bedwars...");
  }
  
  public function onEnable(){
    $this->getServer()->getPluginManager()->registerEvents($this,$this);
		$this->getLogger()->info(C::GREEN."BedWars - (By Taki21), Enabled.");
		@mkdir($this->getDataFolder());
		$this->config = new Config($this->getDataFolder(). "config.yml", Config::YAML);
  }  
  
  public function onCommand(CommandSender $s, Command $cmd, $label, array $args){ 
    if(strtolower($cmd->getName() == "bw")){
      if(!$s instanceof Player){
        $s->sendMessage(C::RED."This Command Can Only by used by Players");
      }else{
        if(isset($args[0]){
          switch(strtolower($args[0])){
            case "mk":
							if(!isset($args[1]));
								$s->sendMessage(C::RED."/bw mk <name>");
								$s->sendMessage(C::RED."<name> can be any name specified, doesnt need to be world name");
							}else{
								$map = strtolower($args[1]);
								$level = $s->getLevel()->getName();
								$this->config->set();
							}
            break;
      
            case "del":
							
            break;
      
            case "edit":
            break;
        
            case "as":
            break;
      
            case "ds":
            break;
          
            case "tp":
            break;
        
            case "mkgen":
            break;
        
            case "delgen":
            break;
              
            case "help":
            break;
          }
        }else{
          $s->sendMessage(C::RED."Please Provide Arguments or do /bw help");
        }
      }  
    }
    return true;
  }
           
  public function bedDestruction(BlockBreakEvent $block){
    /*
    Red Bed Data = 0
    Blue Bed Data = 1
    Gold Bed Data = 2
    Green Bed Data = 3
    Yellow Bed Data = 4
    Aqau Bed Data = 5
    White Bed Data = 6
    Black Bed Data = 7
    */
    
    // TOO LAZY TO USE SWITCH I LIEK COPY AND PASTE OK?!  
	  
    $b = $block->getBlock();
    $pl = $block->getPlayer();
    $pname = $pl->getName();
    $bname = $b->getName();
    $lvl = strtolower($pl->getLevel()->getName());
    $clvl = $this->config->get("worlds");
    foreach($clvl as $world){
      if($bname == "Bed" && $lvl == $world){
        if($world instanceof Level){
          foreach($world->getPlayers() as $wpl){
            $beds = $this->config->get("$lvl_beds");
            foreach($beds as $bed){
              $dmg = $bname->getDamage();
              if($dmg == 0){
                $wpl->sendMessage(C::RED."$pname Destroyed Red Teams Bed!");
              }else{
                if($dmg == 1){
                  $wpl->sendMessage(C::RED."$pname Destroyed Blue Teams Bed!");
                }else{
                  if($dmg == 2){
                    $wpl->sendMessage(C::RED."$pname Destroyed Gold Teams Bed!");
                  }else{
                    if($dmg == 3){
                      $wpl->sendMessage(C::RED."$pname Destroyed Green Teams Bed!");
                    }else{
                      if($dmg == 4){
                        $wpl->sendMessage(C::RED."$pname Destroyed Yellow Teams Bed!");
                      }else{
                        if($dmg == 5){
                          $wpl->sendMessage(C::RED."$pname Destroyed Aqua Teams Bed!");
                        }else{
                          if($dmg == 6){
                            $wpl->sendMessage(C::RED."$pname Destroyed White Teams Bed!");
                          }else{
                            if($dmg == 7){
                              $wpl->sendMessage(C::RED."$pname Destroyed Black Teams Bed!");
                            }
                          }
                        }
                      }
                    }
                  }
                }
              }
            }
          }
        }else{
          $pl->sendMessage(C::RED."Error!");
        }
      }
    }
  }
  
  public function onDisable(){
    $this->getLogger()->info(C::RED."Disabled BedWars");
  }  
}
