#Made by the FlamingPE Team
<?php
namespace FlamingPE\ParticlesPM;
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\plugin\Plugin;
use pocketmine\level\particle\HeartParticle;
use pocketmine\math\Vector3;
use pocketmine\scheduler\PluginTask;
class Main extends PluginBase implements Listener{
  public function onEnable(){
    $this->getServer()->getScheduler()->scheduleRepeatingTask(new ParticlesPM($this), 10);
  }
}
class ParticlesPlus extends PluginTask {
  public function __construct($plugin)
  {
    $this->plugin = $plugin;
    parent::__construct($plugin);
  }
  public function onRun($tick){
    $level = $this->plugin->getServer()->getDefaultLevel();
    $spawn = $this->plugin->getServer()->getDefaultLevel()->getSafeSpawn();
    $r = rand(1,300);
    $g = rand(1,300);
    $b = rand(1,300);
    $x = $spawn->getX();
    $y = $spawn->getY();
    $z = $spawn->getZ();
    $center = new Vector3($x, $y, $z);
    $radius = 0.5;
    $count = 100;
    $particle = new HeartParticle($center, $r, $g, $b, 1);
                for($yaw = 0, $y = $center->y; $y < $center->y + 4; $yaw += (M_PI * 2) / 20, $y += 1 / 20){
                  $x = -sin($yaw) + $center->x;
                  $z = cos($yaw) + $center->z;
                  $particle->setComponents($x, $y, $z);
                  $level->addParticle($particle);
}
  }
}
