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
		if(preg_match("/\w+/", $value) && strlen($value) > 3) {
			return true;
		}
		return false;
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
		$_SESSION['user'] = $userId;
	}
	public static function validateLogged() {
		if(isset($_SESSION['user'])) {
			return $_SESSION['user'];
		}
		header('Location: /user/login');
	}
	public static function isGuest() {
		if(isset($_SESSION['user'])) {
			return false;
		}
		return true;
	}
	public static function getUserById($id) {
		$db = Db::dbConnection();
		$sql = 'SELECT * FROM users WHERE id = :id ';
		$result = $db->prepare($sql);
		$result->bindParam(':id', $id, PDO::PARAM_STR);
		$result->setFetchMode(PDO::FETCH_ASSOC);
		$result->execute();
		
		return $result->fetch();
	}
	public static function edit($userId, $username, $password) {
		$db = Db::dbConnection();
		$sql = 'UPDATE users SET name = :name WHERE id = :id ';
		$result = $db->prepare($sql);
		$result->bindParam(':name', $username, PDO::PARAM_STR);
		$result->bindParam(':id', $userId, PDO::PARAM_STR);
		return $result->execute();
	}	
	
}
?>