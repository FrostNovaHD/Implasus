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
namespace raklib\utils;

class ConnectorAddress{

	public $ip;
	public $port;
	public $version;
	
	public function __construct(string $ip, int $port, int $version){
      $this->ip = $ip;
      if ($port < 0 or $port > 65536){
        throw new \InvalidArgumentException("Invalid port range. Cannot to continue well until it's changed.");
      }
      $this->port = $port;
      $this->version = $version;
	}

	public function getIp(): string{
      return $this->ip;
	}

	public function getPort(): int{
      return $this->port;
	}

	public function getVersion(): int{
      return $this->version;
	}
  
	public function __toString(){
      return $this->ip . " " . $this->port;
	}
  
	public function toString(): string{
      return $this->__toString();
	}
  
	public function equals(ConnectorAddress $ip): bool{
      return $this->ip === $ip->ip and $this->port === $ip->port and $this->version === $ip->version;
	}
}
