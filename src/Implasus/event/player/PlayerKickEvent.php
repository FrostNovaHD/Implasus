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
use Implasus\language\TextContainer;
use Implasus\Player;

class PlayerKickEvent extends PlayerBaeeEvent implements Cancellable{

    protected $message;
    protected $reason;
	
    public function __construct(Player $player, $message, string $reason){
      $this->player = $player;
      $this->message = $message;
      $this->reason = $reason;
    }

    public function setAnnounceKick($message): void{
      $this->message = $message;
    }
	
    public function getAnnounceKick(){
      return $this->message;
    }
  
    public function setReason(string $reason): void{
      $this->reason = $reason;
    }
  
    public function getReason(): string{
      return $this->reason;
    }
}
