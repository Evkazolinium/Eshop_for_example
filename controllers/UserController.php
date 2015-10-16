<?php
class UserController {
	public function actionRegister() {
		$result = false;
		$username = '';
		$password = '';
		$email = '';
		$confirm_password = '';
		if(isset($_POST['submit'])) {
			$username = $_POST['username'];
			$password = $_POST['password'];
			$email = $_POST['email'];
			$confirm_password = $_POST['confirm-password'];
			
			$errors = false;
			if(!User::validateUsername($username)) {
				$errors[] = "Имя должно быть больше 5 символов и не должно содержать пробелы";
			}
			
			if(!User::validateEmail($email)) {
				$errors[] = "Неккоректный email";
			}
			
			if(User::validateEmailExist($email)) {
				$errors[] = "Такой email уже существует";
			}
			
			if(!User::validatePassword($password)) {
				$errors[] = "Пароль должен быть больше 3 символов";
			}
			
			if(!User::comparPassword($password, $confirm_password)) {
				$errors[] = "Пароли не совпадают";
			}
			
			if($errors == false) {
				$result = User::register($username, $email, $password);
			}
		}
		require_once(ROOT.'/views/user/register.php');
		return true;
	}
	public function actionLogin() {
		$result = false;
		$password = '';
		$email = '';
		if(isset($_POST['submit'])) {
			$password = $_POST['password'];
			$email = $_POST['email'];
			
			$errors = false;
			
			if(!User::validateEmail($email)) {
				$errors[] = "Неккоректный email";
			}
			
			if(!User::validatePassword($password)) {
				$errors[] = "Пароль должен быть больше 3 символов";
			}
			
			$userId = User::validateUserData($email, $password);
			
			if($userId == false) {
				$errors[] = "Некорректные данные для входа на сайт";
			}else{
				User::auth($userId);
				header("Location: /cabinet/");
			}
			
		}
		require_once(ROOT.'/views/user/login.php');
		return true;
	}
	public function actionLogout() {
		unset($_SESSION['user']);
		header("Location: /");
	}
	
}
?>