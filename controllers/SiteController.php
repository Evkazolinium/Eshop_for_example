<?php
class SiteController {
	public function actionIndex() {
		
		$platforms = array();
		$platforms = Platform::getPlatformList();
		
        $genres = array();
		$genres = Genre::getGenreList();
        
		$productList = array();
		$productList = Products::getProducts(6);
		require_once(ROOT.'/views/site/index.php');
		
		return true;
	}
	public function actionContact() {
		$userEmail = '';
		$userText = '';
		$subject = '';
		$result = false;
		if(isset($_POST['submit'])) {
			$userEmail = $_POST['email'];
			$userText = $_POST['message'];
			$subject = $_POST['subject'];
			
			$errors = false;
			
			if(User::validateEmail($userEmail)) {
				$errors[] = "Неправильный Email";
			}
			if($errors == false) {
				$adminEmail = "alexey.vnu@gmail.com";
				$message = "Текст: ".$userText." от ".$userEmail;
				$result = mail($adminEmail, $subject, $message);
				$result = true;
			}
		}
		require_once(ROOT.'/views/site/contact.php');
		return true;
	}
}
?>