<?php

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
    // cya later code
  }
  
  public function onEnable(){
    // cya later code
  }  
  
  public function onCommand(CommandSender $s, Command $cmd, $label, array $args){ //wut
    if(strtolower($cmd->getName() == "bw")){
      if(!$s instanceof Player){
        $s->sendMessage(C::RED."This Command Can Only by used by Players");
      }else{
        if(isset($args[0]){
          switch(strtolower($args[0])){
            case "mk":
            break;
      
            case "del":
            break;
      
            case "edit":
            break;
        
            case "as":
            break;
      
            case "rs":
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
    //$color;
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
            $wpl->sendMessage(C::RED."$pname Destroyed $color Team Bed!");
          }
        }else{
          $pl->sendMessage(C::RED."Error!");
        }
      }
    }
  }
  
  public function onDisable(){
    // cya later code
  }  
  
}
