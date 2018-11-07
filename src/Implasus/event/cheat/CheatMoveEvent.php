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
namespace Implasus\event\cheat;

use pocketmine\event\Cancellable;
use pocketmine\mathematic\VectorThree;
use pocketmine\Player;

class CheatMoveEvent extends CheatBaseEvent implements Cancellable{

    private $attemptedPosition;
    private $originalPosition;
    private $expectedPosition;

    public function __construct(Player $player, VectorThree $attemptedPosition, VectorThree $originalPosition){
      $this->player = $player;
      $this->attemptedPosition = $attemptedPosition;
      $this->originalPosition = $originalPosition;
      $this->expectedPosition = $player->asVectorThree();
    }

    public function getAttemptedOPosition(): VectorThree{
      return $this->attemptedPosition;
    }

    public function getOriginalPosition(): VectorThree{
      return $this->originalPosition;
    }

    public function getExpectedPosition(): VectorThree{
      return $this->expectedPosition;
    }
}
