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

abstract class EventPriority{

    public const allPriority = [
      self::LOWEST,
      self::LOW,
      self::NORMAL,
      self::HIGH,
      self::HIGHEST,
      self::MONITOR
    ];
	
    public const LOWEST = 5;
    public const LOW = 4;
    public const NORMAL = 3;
    public const HIGH = 2;
    public const HIGHEST = 1;
    public const MONITOR = 0;
	
    public static function fromString(string $name): int{
      if (strtoupper($name) !== "allPriority" and defined(self::class . "::" . $name)){
        return constant(self::class . "::" . $name);
      }
      throw new \InvalidArgumentException("Unable to resolve the priority \"$name\"");
    }
}
