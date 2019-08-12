<?php

namespace App\Maxserv_opdracht;
use PDO;

class DBConnection {
	
	static $_instance;
	private $_db;
	private $_host = 'localhost';
	private $_user = 'root';
	private $_pass = '';
	
	private function __construct($database){
		try {
			$this->_db = new PDO("mysql:host={$this->_host};dbname=$database", $this->_user, $this->_pass);
		}
		catch (PDOException $e) {
			echo $e->getMessage();
		}
	}
	private function __clone(){}
	private function __sleep(){}
	private function __wakeup(){}
	
	static public function getInstance($database) {
		if(!isset(self::$_instance)){
			self::$_instance = new DBConnection($database);
		}
		return self::$_instance;
	}
	
	public function getConnection() {
		return $this->_db;
	}
}