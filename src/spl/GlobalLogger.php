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

final class GlobalLogger{

    private function __construct(){
    }

    private static $logger = null;
  
    public static function getGlobal(): \Logger{
      if (self::$logger === null){
        self::$logger = new BasicLogger();
      }
      return self::$logger;
    }

    public static function setGlobal(\Logger $logger): void{
      self::$logger = $logger;
    }
}
