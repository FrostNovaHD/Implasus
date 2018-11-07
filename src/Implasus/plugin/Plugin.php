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
namespace Implasus\plugin;

use Implasus\command\CommandExecutor;
use Implasus\scheduler\TaskScheduler;
use Implasus\Server;

interface Plugin extends CommandExecutor{

    public function __construct(PluginLoader $loader, Server $server, PluginInfo $info, string $dataFolder, string $file);

    public function isStarted(): bool;

    public function onStateChanged(bool $state): void;

    public function isStopped(): bool;

    public function getDataInFolder(): string;

    public function getInfo(): PluginInfo;

    public function onServer(): Server;

    public function getName(): string;

    public function setLogger(): PluginLogger;

    public function getLoadPlugin();

    public function onScheduler(): TaskScheduler;
}
