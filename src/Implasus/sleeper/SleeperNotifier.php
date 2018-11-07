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

class SleeperNotifier extends \Threaded{

    private $tS;
    private $idSleep;
    private $notification = false;
  
    final public function attachSleeper(ThreadedSleeper $sleeper, int $id): void{
      $this->tS = $sleeper;
      $this->idSleep = $id;
	}
  
	final public function getIdSleep(): int{
      return $this->idSleep;
	}

	final public function wakeUpSleeper(): void{
      assert ($this->tS !== null);
      $this->synchronized (function(): void{
        if (!$this->notification){
          $this->notification = true;
          $this->tS->wakeUp();
        }
      });
	}
  
	final public function hasNotification() : bool{
      return $this->notification;
	}
  
	final public function clearNotification(): void{
      $this->synchronized (function(): void{
        $this->notification = false;
      });
	}
}
