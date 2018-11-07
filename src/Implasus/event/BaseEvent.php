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
namespace Implasus\event;

abstract class BaseEvent{

    private const MAXIMUM_CALL_DEPTH = 50;
    private static $callDepth = 1;

    protected $eventName = null;
    private $isCancelEvent = false;
	
    private $cancelException = "This Event is not a Cancellable.";

    final public function getEventName(): string{
      return $this->eventName ?? get_class($this);
    }

    public function isCancelEvent(): bool{
      $cancel = $this;
      if (!($cancel instanceof Cancellable)){
        throw new \BadMethodCallException($this->cancelException);
      }
      return $this->isCancelEvent;
    }

    public function setCancelEvent(bool $value = true): void{
      $cancel = $this;
      if (!($cancel instanceof Cancellable)){
        throw new \BadMethodCallException($this->cancelException);
      }
      $this->isCancel = $value;
    }

    public function callEvent(): void{
      if (self::$callDepth >= self::MAXIMUM_CALL_DEPTH){
        throw new \RuntimeException("The recursive event call has been detected, and have reached max depth of " .  self::MAXIMUM_EVENT_CALL_DEPTH . " calls.");
      }
      assert(HandlerList::getList(get_class($this)) !== null,  "Called the event should have a valid Handler list to work.");
      ++self::$callDepth;
      try{
        foreach (EventPriority::allPriority as $priority){
          $currentList = HandlerList::getList(get_class($this));
          while ($currentList !== null){
            foreach ($currentList->getPriority($priority) as $registration){
              $registration->callEvent($this);
            }
            $currentList = $currentList->getParent();
          }
        }
      } finally {
         --self::$eventCallDepth;
      }
   }
}
