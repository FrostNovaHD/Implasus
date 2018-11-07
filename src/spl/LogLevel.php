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

interface LogLevel{

    const LOG_EMERGENCY = "getEmergency";
    const LOG_ALERT = "getAlert";
    const LOG_CRITICAL = "getCritical";
    const LOG_ERROR = "getError";
    const LOG_WARNING = "getWarning";
    const LOG_NOTICE = "getNotice";
    const LOG_INFO = "getInfo";
    const LOG_DEBUG = "getDebug";
}
