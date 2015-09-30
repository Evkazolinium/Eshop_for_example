<?php
class User {
	public static function register($username, $email, $password) {
		$db = Db::dbConnection();
		$sql = 'INSERT INTO users (name, email, password) VALUES (:username, :email, :password)';
		$result = $db->prepare($sql);
		$result->bindParam(':username', $username, PDO::PARAM_STR);
		$result->bindParam(':email', $email, PDO::PARAM_STR);
		$result->bindParam(':password', $password, PDO::PARAM_STR);
		return $result->execute();
		
	}
	public static function validateUsername($value) {
		return strlen($value) > 5;
	}
	public static function validatePassword($value) {
		return strlen($value) > 3;
	}
	public static function comparPassword($pass_1, $pass_2) {
		return !$pass_1 == $pass_2;
	}
	public static function validateEmail($value) {
		return filter_var($value, FILTER_VALIDATE_EMAIL);
	}
	public static function validateEmailExist($value) {
		$db = Db::dbConnection();
		$sql = 'SELECT COUNT(*) FROM users WHERE email = :email ';
		$result = $db->prepare($sql);
		$result->bindParam(':email', $value, PDO::PARAM_STR);
		$result->execute();
		
		if($result->fetchColumn()){
			return true;
		}
		return false;
	}
	public static function validateUserData($email, $password) {
		$db = Db::dbConnection();
		$sql = 'SELECT * FROM users WHERE email = :email AND password = :password ';
		$result = $db->prepare($sql);
		$result->bindParam(':email', $email, PDO::PARAM_STR);
		$result->bindParam(':password', $password, PDO::PARAM_STR);
		$result->execute();
		$user = $result->fetch();
		if($user){
			return $user['id'];
		}
		return false;
	}
	
	public static function auth($userId) {
		session_start();
		$_SESSION['user'] = $userId;
	}
}
?>