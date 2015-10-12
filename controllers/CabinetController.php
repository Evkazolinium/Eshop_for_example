<?php 
class CabinetController {
	public function actionIndex() {
		$userId = User::validateLogged();
		$user = User::getUserById($userId);
		require_once (ROOT.'/views/cabinet/index.php');
		return true;
	}
	public function actionEdit() {
		$userId = User::validateLogged();
		$user = User::getUserById($userId);
		$result = false;
		$username = $user['name'];
		if(isset($_POST['submit'])) {
			$username = $_POST['username'];
			$password = $_POST['password'];
			$confirm_password = $_POST['confirm-password'];
			
			$errors = false;
			if(!User::validateUsername($username)) {
				$errors[] = "Имя должно быть больше 5 символов";
			}
			
			if($errors == false) {
				$result = User::edit($userId, $username, $password);
			}
		}
		require_once(ROOT.'/views/cabinet/edit.php');
		return true;
	}
}
?>