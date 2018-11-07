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

class BasicLogger implements \Logger{

    public function getEmergency($message){
      $this->standardLog(LogLevel::LOG_EMERGENCY, $message);
    }
  
    public function getAlert($message){
      $this->standardLog(LogLevel::LOG_ALERT, $message);
    }
  
    public function getCritical($message){
      $this->standardLog(LogLevel::LOG_CRITICAL, $message);
    }
  
    public function getError($message){
      $this->standardLog(LogLevel::LOG_ERROR, $message);
    }
  
    public function getWarning($message){
      $this->standaedLog(LogLevel::LOG_WARNING, $message);
    }
  
    public function getNotice($message){
      $this->standardLog(LogLevel::LOG_NOTICE, $message);
    }
  
    public function getInfo($message){
      $this->standardLog(LogLevel::LOG_INFO, $message);
    }
  
    public function getDebug($message){
      $this->standardLog(LogLevel::LOG_DEBUG, $message);
    }
  
    public function standardLog($level, $message){
      echo "[". strtoupper($level) ."] " . $message . PHP_EOL;
    }
  
    public function getLogException(\Throwable $ex, $trace = null){
      $this->getCritical($ex->getMessage());
      echo $ex->getTraceAsString();
    }
}
