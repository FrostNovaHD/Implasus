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

class SleeperHandler{

    private $tS;
    private $notifier = [];
    private $handler = [];
    private $nextIdSleep = 0;
  
    public function __construct(){
      $this->tS = new ThreadedSleeper();
    }
	
    public function getTS(): ThreadedSleeper{
      return $this->tS;
    }

    public function addNotifier(SleeperNotifier $notifier, callable $handler) : void{
      $id = $this->nextIdSleep++;
      $notifier->attachSleeper($this->tS, $id);
      $this->notifiers[$id] = $notifier;
      $this->handlers[$id] = $handler;
	}

	public function removeNotifier(SleeperNotifier $notifier): void{
      unset ($this->notifier[$notifier->getIdSleep()], $this->handler[$notifier->getIdSleep()]);
	}

    public function sleepUntil(float $uTime): void{
      while (true){
        $this->processNotifications();
        $sleepTimer = (int) (($uTime - microtime(true)) * 1000000);
        if ($sleepTimer > 0){
          $this->tS->sleepServer($sleepTimer);
        } else {
          break;
        }
      }
	}

    public function sleepUntilNotification(): void{
      $this->tS->sleepServer(0);
      $this->processNotifications();
	}

    public function processNotifications(): void{
      while ($this->tS->hasNotifications()){
        $processed = 0;
        foreach ($this->notifier as $id => $notifier){
          if ($notifier->hasNotification()){
            ++$processed;
            $notifier->clearNotification();
            if (isset($this->notifier[$id])){
              assert (isset ($this->handler[$id]));
              $this->handler[$id]();
            }
          }
        }
        assert ($processed > 0);
        $this->tS->clearNotifications($processed);
      }
	}
}
