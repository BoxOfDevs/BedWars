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
      if(!$s instanceof Player && !$isset($args[0])){
        $s->sendMessage(C::RED."ERROR, You aren't a player or you didn't provide command arguments.");
      }else{
      	switch(strtolower($args[0])){
        	case "mk":		
					if(!isset($args[1])){
					$s->sendMessage(C::RED."/bw mk <name>");
					$s->sendMessage(C::RED."<name> can be any name specified, doesnt need to be world name");
					}else{
						$map = strtolower($args[1]);
						$level = $s->getLevel()->getName();
						$this->config->set($map[$level]);
						$this->config->save();
						$s->sendMessage(C::GREEN."Success! Now add the spawnpoints of the players! /bw add <color>");
						$this->map = $map
					}
          break;
					case "add":
					if(!isset($args[1])){
						$s->sendMessage(C::RED."/bw add <color>")
						$s->sendMessage(C::RED."Examples: Red, Yellow, Blue, Green, etc...);
					}else{
						$x = $s->getX();
						$y = $s->getY();
						$z = $s->getZ();
						$bmap = $this->config->get($this->map);
						$this->config->set(array_push($bmap, "x"[$x], "y"[$y], "z"[$z]));
					}
					break;	
				}
			}
		}
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
		
		// REWRITING THIS PART!
		
  }
  
  public function onDisable(){
    $this->getLogger()->info(C::RED."Disabled BedWars");
  }  
}
