<?php 
class CabinetController {
	public function actionIndex() {
		$userId = User::validateLogged();
		echo $userId;
		require_once (ROOT.'/views/cabinet/index.php');
		return true;
	}
}
?>