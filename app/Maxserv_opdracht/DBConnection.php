<?php

namespace App\Maxserv_opdracht;
use PDO;

class DBConnection 
{
	
	/*  
		Singleton database connection class
		LET OP: Authenticatie verloopt via de database verbinding van Laravel zelf, de instellingen daarvoor zijn te vinden in .env in de root folder
		Deze class wordt gebruikt voor alle database bewerkingen van zelf-geschreven code
	*/
	
	
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