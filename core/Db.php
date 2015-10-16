<?php
class Db {
	public static function dbConnection() {
		$parametrsPath = ROOT.'/config/db_params.php';
		$params = include($parametrsPath);
		
		$db = new PDO("mysql:host={$params['host']};dbname={$params['dbname']}", 
					$params['user'], 
					$params['password']);
		$db->exec("set names utf8");
		return $db;
	}
}
?>