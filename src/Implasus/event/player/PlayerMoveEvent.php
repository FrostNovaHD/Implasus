<?php
/**
*
*
*  ___                 _                     
* |_ _|_ __ ___  _ __ | | __ _ ___ _   _ ___ 
*  | || '_ ` _ \| '_ \| |/ _` / __| | | / __|
*  | || | | | | | |_) | | (_| \__ \ |_| \__ \
* |___|_| |_| |_| .__/|_|\__,_|___/\__,_|___/
*               |_|  
*
* This program is free software: you can redistribute it and/or modify
* it under the terms of the GNU Lesser General Public License as published by
* the Free Software Foundation, either version 3 of the License, or any
* later version of this license.
*
* --==[×]==--
*
* > Team: Implasher
* > Link: http://github.com/Implasher
*
*
**/
declare(strict_types=1);
namespace Implasus\event\player;

use Implasus\event\Cancellable;
use Implasus\level\Location;
use Implasus\Player;

class PlayerMoveEvent extends PlayerBaseEvent implements Cancellable{

    private $move_From;
    private $move_To;

    public function __construct(Player $player, Location $move_From, Location $move_To){
      $this->player = $player;
      $this->moveFrom = $moveFrom;
      $this->moveTo = $moveTo;
    }

    public function getMoveFrom(): Location{
      return $this->move_From;
    }

    public function getMoveTo(): Location{
      return $this->move_To;
    }
  
    public function setMoveTo(Location $move_To): void{
      $this->move_To = $move_To;
    }
}
