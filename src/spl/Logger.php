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

interface Logger{

    public function getEmergency($message);

    public function getAlert($message);

    public function getCritical($message);
  
    public function getError($message);
	
    public function getWarning($message);

    public function getNotice($message);
	
    public function getInfo($message);
  
    public function getDebug($message);

    public function getLog($level, $message);

    public function getLogException(\Throwable $ex, $trace = null);
}
