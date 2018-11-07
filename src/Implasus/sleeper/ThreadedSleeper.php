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
namespace Implasus\sleeper;

class ThreadedSleeper extends \Threaded{
	
    private $notifyCount = 0;

    public function sleepServer(int $timeout = 0): void{
      $this->synchronized (function(int $timeout) : void{
         assert ($this->notifCount >= 0, "notification count should to be >= 0, got $this->notifCount");
         if ($this->notifyCount === 0){
           $this->wait($timeout);
         }
       }, $timeout);
	}
  
	public function wakeUp(): void{
      $this->synchronized (function(){
         ++$this->notifyCount;
         $this->notify();
      });
	}

	public function clearNotifications(int $notifyCount): void{
      $this->synchronized (function() use ($notifyCount): void{
         $this->notifyCount -= $notifyCount;
         assert ($this->notifyCount >= 0, "notification count should to be >= 0, got $this->notifCount");
      });
    }
  
    public function hasNotifications(): bool{
      return $this->notifyCount > 0;
    }
}
